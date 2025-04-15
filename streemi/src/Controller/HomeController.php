<?php

namespace App\Controller;

use App\Repository\MediaRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function home(
        MovieRepository $movieRepository,
    ): Response
    {
        $movies = $movieRepository->findAll();

        return $this->render('index.html.twig', [
            'movies' => $movies,
            'showLeftMenu' => true,
            'showRightSidebar' => true
        ]);
    }

    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {
        return $this->render('admin/admin.html.twig');
    }

    #[Route('/admin/add-films', name: 'app_admin_add_films')]
    public function adminAddFilms(): Response
    {
        return $this->render('admin/admin_add_films.html.twig');
    }

    #[Route('/admin/films', name: 'app_admin_films')]
    public function adminFilms(): Response
    {
        return $this->render('admin/admin_films.html.twig');
    }

    #[Route('/admin/users', name: 'app_admin_users')]
    public function adminUsers(): Response
    {
        return $this->render('admin/admin_users.html.twig');
    }

    #[Route('/category', name: 'app_category')]
    public function category(): Response
    {
        return $this->render('media/category.html.twig');
    }

    #[Route('/detail/{id}', name: 'app_detail')]
    public function detail(string $id, MovieRepository $movieRepository): Response
    {
        $movie = $movieRepository->find($id);
        return $this->render('media/detail.html.twig', [
            'movie' => $movie,
            'showLeftMenu' => true,
            'showRightSidebar' => true
        ]);
    }

    #[Route('/detail-serie', name: 'app_detail_serie')]
    public function detailSerie(): Response
    {
        return $this->render('media/detail_serie.html.twig');
    }

    #[Route('/discover', name: 'app_discover')]
    public function discover(): Response
    {
        return $this->render('media/discover.html.twig');
    }

    #[Route('/forgot', name: 'app_forgot')]
    public function forgot(): Response
    {
        return $this->render('auth/forgot.html.twig', [
            'showLeftMenu' => false,
            'showRightSidebar' => false
        ]);
    }

    #[Route('/lists', name: 'app_lists')]
    public function lists(): Response
    {
        return $this->render('media/lists.html.twig');
    }

    #[Route('/register', name: 'app_register')]
    public function register(): Response
    {
        return $this->render('auth/register.html.twig', [
            'showLeftMenu' => false,
            'showRightSidebar' => false
        ]);
    }

    #[Route('/subscriptions', name: 'app_subscriptions')]
    public function subscriptions(): Response
    {
        return $this->render('subscriptions/subscriptions.html.twig');
    }

    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('auth/login.html.twig', [
            'showLeftMenu' => false,
            'showRightSidebar' => false
        ]);
    }

    #[Route('/reset', name: 'app_reset')]
    public function reset(): Response
    {
        return $this->render('auth/reset.html.twig', [
            'showLeftMenu' => false,
            'showRightSidebar' => false
        ]);
    }

    #[Route('/confirm', name: 'app_confirm')]
    public function confirm(): Response
    {
        return $this->render('auth/confirm.html.twig', [
            'showLeftMenu' => false,
            'showRightSidebar' => false
        ]);
    }

    #[Route('/upload', name: 'app_upload')]
    public function upload(): Response
    {
        return $this->render('media/upload.html.twig');
    }
}
