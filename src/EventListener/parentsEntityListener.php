<?php

namespace App\EventListener;

use App\Entity\Cercles;
use App\Entity\Parents;
use LogicException;
use App\Entity\Peres;
use App\Entity\Personnels;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class parentsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Parents $parents, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $parents
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getPeresSlug($parents));
    }

    public function preUpdate(Parents $parents, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $parents
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getPeresSlug($parents));
    }

    private function getPeresSlug(Parents $parents): string
    {
        $slug = mb_strtolower($parents->getPere() . '-' . $parents->getMere(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
