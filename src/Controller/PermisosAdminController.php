<?php

namespace App\Controller;

use App\Entity\PermisosAdmin;
use App\Form\PermisosAdminType;
use App\Repository\PermisosAdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/permisos/admin')]
class PermisosAdminController extends AbstractController
{
    #[Route('/', name: 'app_permisos_admin_index', methods: ['GET'])]
    public function index(PermisosAdminRepository $permisosAdminRepository): Response
    {
        return $this->render('permisos_admin/index.html.twig', [
            'permisos_admins' => $permisosAdminRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_permisos_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $permisosAdmin = new PermisosAdmin();
        $form = $this->createForm(PermisosAdminType::class, $permisosAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($permisosAdmin);
            $entityManager->flush();

            return $this->redirectToRoute('app_permisos_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('permisos_admin/new.html.twig', [
            'permisos_admin' => $permisosAdmin,
            'form' => $form,
        ]);
    }

    #[Route('/{idpermisosAdmin}', name: 'app_permisos_admin_show', methods: ['GET'])]
    public function show(PermisosAdmin $permisosAdmin): Response
    {
        return $this->render('permisos_admin/show.html.twig', [
            'permisos_admin' => $permisosAdmin,
        ]);
    }

    #[Route('/{idpermisosAdmin}/edit', name: 'app_permisos_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PermisosAdmin $permisosAdmin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PermisosAdminType::class, $permisosAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_permisos_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('permisos_admin/edit.html.twig', [
            'permisos_admin' => $permisosAdmin,
            'form' => $form,
        ]);
    }

    #[Route('/{idpermisosAdmin}', name: 'app_permisos_admin_delete', methods: ['POST'])]
    public function delete(Request $request, PermisosAdmin $permisosAdmin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$permisosAdmin->getIdpermisosAdmin(), $request->request->get('_token'))) {
            $entityManager->remove($permisosAdmin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_permisos_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
