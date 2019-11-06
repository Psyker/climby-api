<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClimbingWayController extends AbstractController
{
    /**
     * @Route("/api/upload", name="upload_test", methods={"POST"})
     */
    public function uploadAction(Request $request)
    {
        dump($request);

        return $this->json([]);
    }
}
