<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            DateField::new('startedAt', 'Début' ),
            DateField::new('endedAt', 'Fin'),
            TextField::new('link', 'Lien'),
            TextEditorField::new('description', 'Description'),
            AssociationField::new('education', 'Formation'),
            AssociationField::new('experience', 'Experience'),
            imageField::new('image', 'Photo') ->setBasePath('uploads')

                ->setUploadDir('public/uploads')

                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

        ];
    }

}
