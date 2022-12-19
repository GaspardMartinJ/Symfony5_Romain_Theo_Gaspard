<?php

namespace App\Controller;

use App\Entity\ClientMateriel;
use App\Form\ClientMaterielType;
use App\Repository\ClientMaterielRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/materiel')]
class ClientMaterielController extends AbstractController
{
    #[Route('/', name: 'app_client_materiel_index', methods: ['GET'])]
    public function index(ClientMaterielRepository $clientMaterielRepository): Response
    {
        return $this->render('client_materiel/index.html.twig', [
            'client_materiels' => $clientMaterielRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_client_materiel_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ClientMaterielRepository $clientMaterielRepository): Response
    {
        $clientMateriel = new ClientMateriel();
        $form = $this->createForm(ClientMaterielType::class, $clientMateriel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientMaterielRepository->save($clientMateriel, true);

            return $this->redirectToRoute('app_client_materiel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client_materiel/new.html.twig', [
            'client_materiel' => $clientMateriel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_materiel_show', methods: ['GET'], requirements: ["id" => "\d+"])]
    public function show(ClientMateriel $clientMateriel): Response
    {
        return $this->render('client_materiel/show.html.twig', [
            'client_materiel' => $clientMateriel,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_client_materiel_edit', methods: ['GET', 'POST'], requirements: ["id" => "\d+"])]
    public function edit(Request $request, ClientMateriel $clientMateriel, ClientMaterielRepository $clientMaterielRepository): Response
    {
        $form = $this->createForm(ClientMaterielType::class, $clientMateriel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientMaterielRepository->save($clientMateriel, true);

            return $this->redirectToRoute('app_client_materiel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client_materiel/edit.html.twig', [
            'client_materiel' => $clientMateriel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_materiel_delete', methods: ['POST'], requirements: ["id" => "\d+"])]
    public function delete(Request $request, ClientMateriel $clientMateriel, ClientMaterielRepository $clientMaterielRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clientMateriel->getId(), $request->request->get('_token'))) {
            $clientMaterielRepository->remove($clientMateriel, true);
        }

        return $this->redirectToRoute('app_client_materiel_index', [], Response::HTTP_SEE_OTHER);
    }
}
