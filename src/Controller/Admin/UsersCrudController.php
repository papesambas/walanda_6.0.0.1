<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersCrudController extends AbstractCrudController
{
    public function __construct(private UserPasswordHasherInterface $PasswordHasher,
    private EntityRepository $entityRepository)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto,
     EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $userId = $this->getUser()->getId();
        $qb = $this->entityRepository->createQueryBuilder($searchDto,$entityDto,$fields,$filters);
        $qb->andWhere('entity.id != :userId')->setParameter('userId', $userId);
        return $qb;
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
        yield AssociationField::new("nom", "Nom")->hideOnIndex();
        yield AssociationField::new("prenom")->hideOnIndex();
        yield TextField::new("fullname")->onlyOnIndex();
        yield TextField::new('username');
        yield EmailField::new("email");
        yield TextField::new("adresse")->hideOnIndex();
        yield DateField::new("createdAt")->onlyOnDetail();
        yield DateField::new("updatedAt")->onlyOnDetail();
        yield TextField::new("password")->setFormType(PasswordType::class)->onlyWhenCreating();
        yield ChoiceField::new('roles', 'Roles')
            ->allowMultipleChoices()
            ->autocomplete()
            ->setChoices(['User' => 'ROLE_USER',
                        'Parent' => "ROLE_PARENT",
                        'Elève' => "ROLE_ELEVE",
                        'Enseignant' => "ROLE_EDUCATEUR",
                        'Surveillant' => "ROLE_SURVEILLANT",
                        'Secrétaire' => "ROLE_SECRETAIRE",
                        'Caissier' => "ROLE_CAISSE",
                        'Logistique' => "ROLE_LOGISTIQUE",
                        'Comptable' => "ROLE_COMPTABLE",
                        'Financier' => "ROLE_FINANCE",
                        'Commercial' => "ROLE_COMMERCIAL",
                        'Directeur' => "ROLE_DIRECTION",
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
        yield BooleanField::new('isVerified')->hideOnForm();
        yield BooleanField::new('isActif')->hideOnForm();
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

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $users = $entityInstance;
        $plainPassword = $users->getPassword();
        $passwordHasher = $this->PasswordHasher->hashPassword($users, $plainPassword);
        $users->setPassword($passwordHasher);
        parent::persistEntity($entityManager, $entityInstance);
    }
        
}
