<?php

namespace App\Controller;

use App\Entity\ClientMagasin;
use App\Form\ClientMagasinType;
use App\Repository\ClientMagasinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/magasin')]
class ClientMagasinController extends AbstractController
{
    #[Route('/', name: 'app_client_magasin_index', methods: ['GET'])]
    public function index(ClientMagasinRepository $clientMagasinRepository): Response
    {
        return $this->render('client_magasin/index.html.twig', [
            'client_magasins' => $clientMagasinRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_client_magasin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ClientMagasinRepository $clientMagasinRepository): Response
    {
        $clientMagasin = new ClientMagasin();
        $form = $this->createForm(ClientMagasinType::class, $clientMagasin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientMagasinRepository->save($clientMagasin, true);

            return $this->redirectToRoute('app_client_magasin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client_magasin/new.html.twig', [
            'client_magasin' => $clientMagasin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_magasin_show', methods: ['GET'], requirements: ["id" => "\d+"])]
    public function show(ClientMagasin $clientMagasin): Response
    {
        return $this->render('client_magasin/show.html.twig', [
            'client_magasin' => $clientMagasin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_client_magasin_edit', methods: ['GET', 'POST'], requirements: ["id" => "\d+"])]
    public function edit(Request $request, ClientMagasin $clientMagasin, ClientMagasinRepository $clientMagasinRepository): Response
    {
        $form = $this->createForm(ClientMagasinType::class, $clientMagasin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientMagasinRepository->save($clientMagasin, true);

            return $this->redirectToRoute('app_client_magasin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client_magasin/edit.html.twig', [
            'client_magasin' => $clientMagasin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_magasin_delete', methods: ['POST'], requirements: ["id" => "\d+"])]
    public function delete(Request $request, ClientMagasin $clientMagasin, ClientMagasinRepository $clientMagasinRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clientMagasin->getId(), $request->request->get('_token'))) {
            $clientMagasinRepository->remove($clientMagasin, true);
        }

        return $this->redirectToRoute('app_client_magasin_index', [], Response::HTTP_SEE_OTHER);
    }
}
