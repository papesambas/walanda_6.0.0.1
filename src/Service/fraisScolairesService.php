<?php

namespace App\Service;

use App\Entity\Classes;
use App\Entity\AnneeScolaires;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\FraisScolairesRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class fraisScolairesService
{
    public function __construct(private RequestStack $requestStack, private FraisScolairesRepository $fraisScolairesRepos, private PaginatorInterface $paginator)

    {
    }

    public function getFrais(?AnneeScolaires $anneeScolaires, ?Classes $classes = null)
    {
        $totalFrais = $this->fraisScolairesRepos->getTotalFrais($anneeScolaires, $classes);

        return $totalFrais;
    }

    public function getSolde(?AnneeScolaires $anneeScolaires, ?Classes $classes = null)
    {
        $totalFrais = $this->fraisScolairesRepos->getTotalSoldes($anneeScolaires, $classes);

        return $totalFrais;
    }
}
