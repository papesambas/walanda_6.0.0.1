<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('des Utilisateurs')
            ->setEntityLabelInSingular('un Utilisateur')
            ->setDefaultSort(['username'=>'ASC','email'=>'ASC','createdAt' => 'ASC'])
            ->setSearchFields(['username', 'nom', 'prenom', 'etablissement.designation']);
            //->setDefaultSort(['nom' => 'ASC'], ['prenom' => 'ASC'], ['username' => 'ASC'], ['createdAt' => 'ASC']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->setPermission(Action::DETAIL, 'ROLE_ADMIN')
        ->setPermission(Action::EDIT,'ROLE_SUPERADMIN')
        ->setPermission(Action::NEW, 'ROLE_ADMIN')
        ->setPermission(Action::DELETE, 'ROLE_SUPERADMIN')
        ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new("nom")->hideOnIndex();
        yield TextField::new("prenom")->hideOnIndex();
        yield TextField::new("fullname")->onlyOnIndex();
        yield TextField::new('username');
        yield EmailField::new("email");
        yield TextField::new("adresse")->hideOnIndex();
        yield DateField::new("createdAt")->onlyOnDetail();
        yield DateField::new("updatedAt")->onlyOnDetail();
        yield ChoiceField::new('roles', 'Roles')
            ->allowMultipleChoices()
            ->autocomplete()
            ->setChoices(['User' => 'ROLE_USER',
                        'Parent' => "ROLE_PARENT",
                        'Elève' => "ROLE_ELEVE",
                        'Enseignant' => "ROLE_EDUCAT",
                        'Surveillant' => "ROLE_SURVEI",
                        'Secrétaire' => "ROLE_SECRET",
                        'Caissier' => "ROLE_CAISSE",
                        'Logistique' => "ROLE_LOGIST",
                        'Comptable' => "ROLE_COMPTA",
                        'Financier' => "ROLE_FINAN",
                        'Commercial' => "ROLE_COMMER",
                        'Directeur' => "ROLE_DIRECT",
                        'Admin' => 'ROLE_ADMIN',
                        'SuperAdmin' => 'ROLE_SUPERADMIN',
            ]
    );
        /*yield ChoiceField::new('roles')->setChoices([
            'Utilisateur' => "ROLE_USER",
            'Enseignant' => "ROLE_EDUCAT",
            'Surveillant' => "ROLE_SURVEI",
            'Secrétaire' => "ROLE_SECRET",
            'Caissier' => "ROLE_CAISSE",
            'Logistique' => "ROLE_LOGIST",
            'Comptable' => "ROLE_COMPTA",
            'Financier' => "ROLE_FINAN",
            'Commercial' => "ROLE_COMMER",
            'Directeur' => "ROLE_DIRECT",
            'Administrateur' => "ROLE_ADMIN",
            'Super Administrateur' => "ROLE_SUPERADMIN",
        ])->hideOnIndex()->setPermission("ROLE_ADMIN");*/
        yield EmailField::new('email')->hideOnIndex();
        yield BooleanField::new('isVerified');
        yield BooleanField::new('isActif');
        yield DateField::new('iscreatedAt')->onlyOnDetail();
        //yield AssociationField::new('etablissement');
       /* yield IdField::new("id");
        yield TextField::new("nom")->hideOnIndex();
        yield TextField::new("prenom")->hideOnIndex();
        yield TextField::new("fullname")->onlyOnIndex();
        yield EmailField::new("email");
        yield TextField::new("adresse")->hideOnIndex();
        yield BooleanField::new("isActif")->onlyOnIndex();
        yield BooleanField::new("isVerified")->onlyOnIndex();
        yield DateField::new("createdAt")->hideOnForm();
        yield DateField::new("updatedAt")->hideOnForm();*/
    }
        
}
