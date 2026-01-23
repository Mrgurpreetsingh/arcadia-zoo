<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
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
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email', 'Email'),
            ChoiceField::new('role', 'Role')
                ->setChoices([
                    'Admin' => 'admin',
                    'Veterinaire' => 'veterinaire',
                    'Employe' => 'employe',
                ]),
            CollectionField::new('veterinaryReports', 'Rapports veterinaires')
                ->onlyOnDetail(),
            CollectionField::new('foodConsumptions', 'Consommations alimentaires')
                ->onlyOnDetail(),
            CollectionField::new('reviews', 'Avis')
                ->onlyOnDetail(),
        ];
    }
}
