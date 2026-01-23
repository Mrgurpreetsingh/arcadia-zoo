<?php

namespace App\Controller\Admin;

use App\Entity\FoodConsumption;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class FoodConsumptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FoodConsumption::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('date', 'Date'),
            TimeField::new('heure', 'Heure'),
            TextField::new('nourriture', 'Nourriture'),
            IntegerField::new('quantite', 'Quantite'),
            AssociationField::new('animal', 'Animal'),
            AssociationField::new('user', 'Utilisateur'),
        ];
    }
}
