<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Prenoms;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class prenomsEntityListener
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

    public function prePersist(Prenoms $prenom, LifecycleEventArgs $arg): void
    {
        /*$user = $user = $this->tokenStorage->getToken()->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $prenom
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getPrenomsSlug($prenom));
    }

    public function preUpdate(Prenoms $prenom, LifecycleEventArgs $arg): void
    {
        $user = $this->tokenStorage->getToken()->getUser();
        /*if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $prenom
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getPrenomsSlug($prenom));
    }


    private function getPrenomsSlug(Prenoms $prenom): string
    {
        $slug = mb_strtolower($prenom->getDesignation() . '' . $prenom->getId() . '' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
