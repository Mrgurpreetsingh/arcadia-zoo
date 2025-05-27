<?php

namespace App\Controller\Admin;

/*use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        dump($pageName); // 👈 pour voir si la méthode est bien atteinte
    exit;            // 👈 pour stopper l’exécution juste après
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email', 'Email'),
           // ArrayField::new('roles', 'Rôles'),
            ChoiceField::new('role', 'Rôle')
                ->setChoices([
                    'Admin' => 'admin',
                    'Vétérinaire' => 'veterinaire',
                    'Employé' => 'employe',
                ]),
            CollectionField::new('veterinaryReports', 'Rapports vétérinaires')
                ->onlyOnDetail(),
            CollectionField::new('foodConsumptions', 'Consommations alimentaires')
                ->onlyOnDetail(),
            CollectionField::new('reviews', 'Avis')
                ->onlyOnDetail(),
        ];
    }
}*/