<?php

namespace App\Controller\Admin;

use App\Entity\VeterinaryReport;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class VeterinaryReportCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VeterinaryReport::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('etat', 'État'),
            TextField::new('nourriture', 'Nourriture'),
            IntegerField::new('quantite', 'Quantité'),
            DateTimeField::new('datePassage', 'Date de passage'),
            TextEditorField::new('details', 'Détails'),
            AssociationField::new('animal', 'Animal'),
            AssociationField::new('user', 'Utilisateur'),
        ];
    }
}