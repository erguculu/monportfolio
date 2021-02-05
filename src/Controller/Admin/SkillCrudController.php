<?php

namespace App\Controller\Admin;

use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SkillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Skill::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            IntegerField::new('level', 'Niveau (de 1 à 10)'),
            imageField::new('image', 'Photo') ->setBasePath('uploads')

                ->setUploadDir('public/uploads')

                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

        ];
    }

}
