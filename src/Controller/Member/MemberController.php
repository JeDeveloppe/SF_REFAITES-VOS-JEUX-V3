<?php

namespace App\Controller\Member;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Repository\AdresseRepository;
use App\Repository\ConfigurationRepository;
use App\Repository\DocumentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MemberController extends AbstractController
{
    /**
     * @Route("/membre", name="app_member")
     */
    public function index(): Response
    {
        return $this->render('member/index.html.twig', [
            'controller_name' => 'MemberController',
        ]);
    }

    /**
     * @Route("/membre/historique", name="app_member_historique")
     */
    public function membreHistorique(
        Security $security,
        DocumentRepository $documentRepository,
        ConfigurationRepository $configurationRepository): Response
    {
        $user = $security->getUser();

        $documents = $documentRepository->findDocumentsFromUser($user);

        $configurations = $configurationRepository->findAll();
        $configuration = $configurations[0];

        return $this->render('member/historique.html.twig', [
            'user' => $user,
            'documents' => $documents,
            'configurations' => $configuration
        ]);
    }

    /**
     * @Route("/membre/mon-compte", name="app_member_compte")
     */
    public function membreCompte(Request $request, UserRepository $userRepository, Security $security): Response
    {
        $user = $security->getUser();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->add($user);
            return $this->redirectToRoute('app_member_compte', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('member/compte.html.twig', [
            'controller_name' => 'MemberController',
            'form' => $form->createView()
        ]);
    }
}
