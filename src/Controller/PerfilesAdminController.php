<?php

namespace App\Controller;

use App\Entity\PerfilesAdmin;
use App\Form\PerfilesAdminType;
use App\Repository\PerfilesAdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/perfiles/admin')]
class PerfilesAdminController extends AbstractController
{
    #[Route('/', name: 'app_perfiles_admin_index', methods: ['GET'])]
    public function index(PerfilesAdminRepository $perfilesAdminRepository): Response
    {
        return $this->render('perfiles_admin/index.html.twig', [
            'perfiles_admins' => $perfilesAdminRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_perfiles_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $perfilesAdmin = new PerfilesAdmin();
        $form = $this->createForm(PerfilesAdminType::class, $perfilesAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($perfilesAdmin);
            $entityManager->flush();

            return $this->redirectToRoute('app_perfiles_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('perfiles_admin/new.html.twig', [
            'perfiles_admin' => $perfilesAdmin,
            'form' => $form,
        ]);
    }

    #[Route('/{idperfilesAdmin}', name: 'app_perfiles_admin_show', methods: ['GET'])]
    public function show(PerfilesAdmin $perfilesAdmin): Response
    {
        return $this->render('perfiles_admin/show.html.twig', [
            'perfiles_admin' => $perfilesAdmin,
        ]);
    }

    #[Route('/{idperfilesAdmin}/edit', name: 'app_perfiles_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PerfilesAdmin $perfilesAdmin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PerfilesAdminType::class, $perfilesAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_perfiles_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('perfiles_admin/edit.html.twig', [
            'perfiles_admin' => $perfilesAdmin,
            'form' => $form,
        ]);
    }

    #[Route('/{idperfilesAdmin}', name: 'app_perfiles_admin_delete', methods: ['POST'])]
    public function delete(Request $request, PerfilesAdmin $perfilesAdmin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$perfilesAdmin->getIdperfilesAdmin(), $request->request->get('_token'))) {
            $entityManager->remove($perfilesAdmin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_perfiles_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
