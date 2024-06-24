<?php

namespace App\Service;

use App\Entity\AnneeScolaires;
use App\Entity\Meres;
use App\Entity\Peres;
use App\Entity\Classes;
use App\Entity\Statuts;
use App\Entity\Departements;
use App\Entity\LieuNaissance;
use App\Entity\LieuNaissances;
use App\Entity\EcoleProvenances;
use App\Repository\ElevesRepository;
use App\Repository\FraisScolaritesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class fraisScolaritesService
{
    public function __construct(private RequestStack $requestStack, private FraisScolaritesRepository $fraisScolaritesRepos, private PaginatorInterface $paginator)

    {
    }

    public function getPaginatedFraisScolarites(?AnneeScolaires $anneeScolaires, ?Classes $classes = null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $fraisQuery = $this->fraisScolaritesRepos->findForPagination($anneeScolaires, $classes);
        return $this->paginator->paginate($fraisQuery, $page, $limit);
    }

    public function getPaginatedFraisScolaritesRetards(?AnneeScolaires $anneeScolaires, ?Classes $classes = null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $fraisQuery = $this->fraisScolaritesRepos->findFraisScolaritesEnRetard($anneeScolaires, $classes);
        return $this->paginator->paginate($fraisQuery, $page, $limit);
    }


    public function getReglement(?AnneeScolaires $anneeScolaires, ?Classes $classes = null)
    {
        $totalReglement = $this->fraisScolaritesRepos->getTotalReglement($anneeScolaires, $classes);

        return $totalReglement;
    }

    public function getTotalScolarite(?AnneeScolaires $anneeScolaires, ?Classes $classes = null)
    {
        $totalFrais = $this->fraisScolaritesRepos->getTotalScolarite($anneeScolaires, $classes);

        return $totalFrais;
    }

    public function getTotalSolde(?AnneeScolaires $anneeScolaires, ?Classes $classes = null)
    {
        $totalFrais = $this->fraisScolaritesRepos->getTotalSolde($anneeScolaires, $classes);

        return $totalFrais;
    }

    public function getTotalScolariteRetards(?AnneeScolaires $anneeScolaires, ?Classes $classes = null)
    {
        $totalFrais = $this->fraisScolaritesRepos->getTotalScolariteRetards($anneeScolaires, $classes);

        return $totalFrais;
    }

    public function getTotalSoldeRetards(?AnneeScolaires $anneeScolaires, ?Classes $classes = null)
    {
        $totalFrais = $this->fraisScolaritesRepos->getTotalSoldeRetards($anneeScolaires, $classes);

        return $totalFrais;
    }
}