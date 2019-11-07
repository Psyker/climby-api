<?php

namespace App\Controller;

use App\Entity\ClimbingWay;
use App\Form\ClimbingWayType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ClimbingWayController
 * @package App\Controller
 * @Route("/api/climbing_way")
 */
class ClimbingWayController extends ApiController
{
    /**
     * @Route("/create", name="create_climbing_way", methods={"POST"})
     */
    public function create(Request $request, FormFactoryInterface $formFactory, EntityManagerInterface $em): Response
    {
        $climbingWay = new ClimbingWay();
        $form = $formFactory->create(ClimbingWayType::class, $climbingWay);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em->persist($climbingWay);
            $em->flush();

            return $this->json($climbingWay, Response::HTTP_CREATED);
        }

        return $this->json(['message' => 'Malformed request.', 'errors' => $this->createFormErrors($form)]);
    }

}
