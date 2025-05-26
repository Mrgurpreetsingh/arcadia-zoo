<?php

namespace App\Security;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class AppAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
        private LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function supports(Request $request): bool
    {
        $this->logger->debug('Test logger in supports method');
        $isSupported = $request->isMethod('POST') && $request->attributes->get('_route') === self::LOGIN_ROUTE;
        $this->logger->debug('Checking authenticator support', [
            'method' => $request->getMethod(),
            'path_info' => $request->getPathInfo(),
            'request_uri' => $request->getRequestUri(),
            'route' => $request->attributes->get('_route'),
            'is_supported' => $isSupported,
            'attributes' => $request->attributes->all(),
        ]);
        return $isSupported;
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');
        $password = $request->request->get('password', '');
        $csrfToken = $request->request->get('_csrf_token', '');

        $this->logger->debug('Authenticating user', [
            'email' => $email,
            'password' => $password ? '[provided]' : '[empty]',
            'csrf_token' => $csrfToken,
            'payload' => $request->request->all(),
        ]);

        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $email);

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($password),
            [
                new CsrfTokenBadge('authenticate', $csrfToken),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $this->logger->info('Authentication successful', [
            'user' => $token->getUserIdentifier(),
        ]);

        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        $roles = $token->getRoleNames();
        if (in_array('ROLE_ADMIN', $roles)) {
            return new RedirectResponse($this->urlGenerator->generate('admin'));
        } elseif (in_array('ROLE_VET', $roles)) {
            return new RedirectResponse($this->urlGenerator->generate('vet'));
        } elseif (in_array('ROLE_EMPLOYEE', $roles)) {
            return new RedirectResponse($this->urlGenerator->generate('employee'));
        }

        return new RedirectResponse($this->urlGenerator->generate('app_home'));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        $this->logger->error('Authentication failed', [
            'error' => $exception->getMessage(),
            'email' => $request->request->get('email'),
        ]);

        return parent::onAuthenticationFailure($request, $exception);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}