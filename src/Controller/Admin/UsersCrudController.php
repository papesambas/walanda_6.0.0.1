<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new("id");
        yield TextField::new("nom")->hideOnIndex();
        yield TextField::new("prenom")->hideOnIndex();
        yield TextField::new("fullname")->onlyOnIndex();
        yield EmailField::new("email");
        yield TextField::new("adresse")->hideOnIndex();
        yield BooleanField::new("isActif")->onlyOnIndex();
        yield BooleanField::new("isVerified")->onlyOnIndex();
        yield DateField::new("createdAt")->hideOnForm();
        yield DateField::new("updatedAt")->hideOnForm();
    }
        */
}
