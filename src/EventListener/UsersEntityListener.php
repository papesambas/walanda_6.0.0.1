<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Users;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class UsersEntityListener
{
    private $security;
    private $Slugger;
    private $tokenStorage;

    public function __construct(Security $security, SluggerInterface $Slugger, TokenStorageInterface $tokenStorage)
    {
        $this->security = $security;
        $this->Slugger = $Slugger;
        $this->tokenStorage = $tokenStorage;
    }

    public function prePersist(Users $users, LifecycleEventArgs $arg): void
    {
        /*$user = $user = $this->tokenStorage->getToken()->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $users
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getPrenomsSlug($users));
    }

    public function preUpdate(Users $users, LifecycleEventArgs $arg): void
    {
        /*$user = $this->tokenStorage->getToken()->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $users
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getPrenomsSlug($users));
    }


    private function getPrenomsSlug(Users $users): string
    {
        $slug = mb_strtolower($users->getUsername() . '' . $users->getId() . '' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
