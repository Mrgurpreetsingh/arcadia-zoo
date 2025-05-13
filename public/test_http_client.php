<?php
require dirname(__DIR__).'/vendor/autoload.php';
use Symfony\Component\HttpClient\HttpClient;
$client = HttpClient::create(['cafile' => 'C:\php\cacert.pem']);
$response = $client->request('GET', 'https://example.com');
echo $response->getStatusCode() === 200 ? 'Requête réussie !' : 'Échec : ' . $response->getStatusCode();