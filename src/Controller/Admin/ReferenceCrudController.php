<?php

namespace App\Controller\Admin;

use App\Entity\Reference;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReferenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reference::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextField::new('company', 'Entreprise'),
            TextEditorField::new('description', 'Description'),
        ];
    }

}
