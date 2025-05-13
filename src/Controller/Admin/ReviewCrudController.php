<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Review::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('pseudo', 'Pseudo'),
            TextField::new('commentaire', 'Commentaire'),
            BooleanField::new('valide', 'Validé'),
            DateTimeField::new('dateCreation', 'Date de création')->setFormat('dd/MM/yyyy HH:mm'),
            AssociationField::new('user', 'Utilisateur'),
        ];
    }
}
