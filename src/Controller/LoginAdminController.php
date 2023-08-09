<?php

namespace App\Controller;

use App\Entity\LoginAdmin;
use App\Form\LoginAdminType;
use App\Repository\LoginAdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/login/admin')]
class LoginAdminController extends AbstractController
{
    #[Route('/', name: 'app_login_admin_index', methods: ['GET'])]
    public function index(LoginAdminRepository $loginAdminRepository): Response
    {
        return $this->render('login_admin/index.html.twig', [
            'login_admins' => $loginAdminRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_login_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $loginAdmin = new LoginAdmin();
        $form = $this->createForm(LoginAdminType::class, $loginAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($loginAdmin);
            $entityManager->flush();

            return $this->redirectToRoute('app_login_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('login_admin/new.html.twig', [
            'login_admin' => $loginAdmin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_login_admin_show', methods: ['GET'])]
    public function show(LoginAdmin $loginAdmin): Response
    {
        return $this->render('login_admin/show.html.twig', [
            'login_admin' => $loginAdmin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_login_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LoginAdmin $loginAdmin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LoginAdminType::class, $loginAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_login_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('login_admin/edit.html.twig', [
            'login_admin' => $loginAdmin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_login_admin_delete', methods: ['POST'])]
    public function delete(Request $request, LoginAdmin $loginAdmin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$loginAdmin->getId(), $request->request->get('_token'))) {
            $entityManager->remove($loginAdmin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_login_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
