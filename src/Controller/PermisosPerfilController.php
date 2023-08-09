<?php

namespace App\Controller;

use App\Entity\PermisosPerfil;
use App\Form\PermisosPerfilType;
use App\Repository\PermisosPerfilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/permisos/perfil')]
class PermisosPerfilController extends AbstractController
{
    #[Route('/', name: 'app_permisos_perfil_index', methods: ['GET'])]
    public function index(PermisosPerfilRepository $permisosPerfilRepository): Response
    {
        return $this->render('permisos_perfil/index.html.twig', [
            'permisos_perfils' => $permisosPerfilRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_permisos_perfil_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $permisosPerfil = new PermisosPerfil();
        $form = $this->createForm(PermisosPerfilType::class, $permisosPerfil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($permisosPerfil);
            $entityManager->flush();

            return $this->redirectToRoute('app_permisos_perfil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('permisos_perfil/new.html.twig', [
            'permisos_perfil' => $permisosPerfil,
            'form' => $form,
        ]);
    }

    #[Route('/{idpermisosPerfil}', name: 'app_permisos_perfil_show', methods: ['GET'])]
    public function show(PermisosPerfil $permisosPerfil): Response
    {
        return $this->render('permisos_perfil/show.html.twig', [
            'permisos_perfil' => $permisosPerfil,
        ]);
    }

    #[Route('/{idpermisosPerfil}/edit', name: 'app_permisos_perfil_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PermisosPerfil $permisosPerfil, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PermisosPerfilType::class, $permisosPerfil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_permisos_perfil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('permisos_perfil/edit.html.twig', [
            'permisos_perfil' => $permisosPerfil,
            'form' => $form,
        ]);
    }

    #[Route('/{idpermisosPerfil}', name: 'app_permisos_perfil_delete', methods: ['POST'])]
    public function delete(Request $request, PermisosPerfil $permisosPerfil, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$permisosPerfil->getIdpermisosPerfil(), $request->request->get('_token'))) {
            $entityManager->remove($permisosPerfil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_permisos_perfil_index', [], Response::HTTP_SEE_OTHER);
    }
}
