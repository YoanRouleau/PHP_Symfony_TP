<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Class DashboardController
 * @package App\Controller\Admin
 *
 * @IsGranted("ROLE_ADMIN", message="No access! Get out!")
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Tp');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),
            // Users
            MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-users', User::class),

            // Posts
            MenuItem::section('Posts'),
            MenuItem::linkToCrud('Posts', 'fa fa-file-alt', Post::class),

            // Comments
            MenuItem::section('Comments'),
            MenuItem::linkToCrud('Comments', 'fa fa-comments', Comment::class),

        ];
    }
}
