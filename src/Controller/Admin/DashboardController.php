<?php

namespace App\Controller\Admin;

use App\Entity\Noms;
use App\Entity\Prenoms;
use App\Entity\Users;
use Symfony\UX\Chartjs\Model\Chart;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private ChartBuilderInterface $chartBuilder,
    ){}

    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        $chart = $this->chartBuilder->createChart(Chart::TYPE_LINE);
        // ...set chart data and options somehow

        return $this->render('admin/dashboard.html.twig', [
            'chart' => $chart,
        ]);
        
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Walanda 0.0.1')
            // by default EasyAdmin displays a black square as its default favicon;
            // use this method to display a custom favicon: the given path is passed
            // "as is" to the Twig asset() function:
            // <link rel="shortcut icon" href="{{ asset('...') }}">
            ->setFaviconPath('favicon.svg')
            // the domain used by default is 'messages'
            ->setTranslationDomain('my-custom-domain')

            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
            ->setTextDirection('ltr')

            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()

            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
            ->renderSidebarMinimized()

            ->disableDarkMode()

            ->setLocales(['fr', 'en']);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu('Blog', 'fa fa-article')->setSubItems([
            MenuItem::linkToCrud('Noms', 'fa fa-tags', Noms::class),
            MenuItem::linkToCrud('Prénoms', 'fa fa-file-text', Prenoms::class),
            //MenuItem::linkToCrud('Comments', 'fa fa-comment', Comment::class),
        ]);
        //->setSubItems([
        //    yield MenuItem::linkToCrud('Noms','fas fa-bars',Noms::class),
        //    yield MenuItem::linkToCrud('Prénom','fas fa-bars',Prenoms::class)
        //]);
        yield MenuItem::linkToCrud('Utilisateurs','fas fa-users', Users::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
