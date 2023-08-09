<?php

namespace App\Controller;

use App\Entity\Permiso;
use App\Form\PermisoType;
use App\Repository\PermisoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/permiso')]
class PermisoController extends AbstractController
{
    #[Route('/', name: 'app_permiso_index', methods: ['GET'])]
    public function index(PermisoRepository $permisoRepository): Response
    {
        return $this->render('permiso/index.html.twig', [
            'permisos' => $permisoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_permiso_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $permiso = new Permiso();
        $form = $this->createForm(PermisoType::class, $permiso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($permiso);
            $entityManager->flush();

            return $this->redirectToRoute('app_permiso_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('permiso/new.html.twig', [
            'permiso' => $permiso,
            'form' => $form,
        ]);
    }

    #[Route('/{idpermiso}', name: 'app_permiso_show', methods: ['GET'])]
    public function show(Permiso $permiso): Response
    {
        return $this->render('permiso/show.html.twig', [
            'permiso' => $permiso,
        ]);
    }

    #[Route('/{idpermiso}/edit', name: 'app_permiso_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Permiso $permiso, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PermisoType::class, $permiso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_permiso_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('permiso/edit.html.twig', [
            'permiso' => $permiso,
            'form' => $form,
        ]);
    }

    #[Route('/{idpermiso}', name: 'app_permiso_delete', methods: ['POST'])]
    public function delete(Request $request, Permiso $permiso, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$permiso->getIdpermiso(), $request->request->get('_token'))) {
            $entityManager->remove($permiso);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_permiso_index', [], Response::HTTP_SEE_OTHER);
    }
}
