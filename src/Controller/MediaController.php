<?php

namespace App\Controller;

use App\Entity\PhotoMedia;
use App\Entity\VideoMedia;
use App\Enum\MediaType;
use App\Service\UploadHelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MediaController
 * @package App\Controller
 * @Route("/api")
 */
class MediaController extends ApiController
{
    /**
     * @Route("/upload", name="upload_media")
     */
    public function upload(Request $request, UploadHelper $uploadHelper, EntityManagerInterface $em): JsonResponse
    {
        $uploadedFile = $request->files->get('media');
        if ($uploadedFile) {
            $media = null;
            $fileInfos = $uploadHelper->uploadMedia($uploadedFile);
            if ($fileInfos['mediaType'] === MediaType::VIDEO) {
                $media = (new VideoMedia())
                    ->setFilename($fileInfos['filename'])
                    ->setMimeType($fileInfos['mimeType']);
            }

            if ($fileInfos['mediaType'] === MediaType::PHOTO) {
                $media = (new PhotoMedia())
                    ->setFilename($fileInfos['filename'])
                    ->setMimeType($fileInfos['mimeType']);
            }

            if (!$media) {
                throw new \LogicException('Failed to upload media.');
            }

            $em->persist($media);
            $em->flush();

            return $this->json($media, Response::HTTP_CREATED);
        }

        return $this->json([
            'message' => 'There is not file to upload.',
            'code' => Response::HTTP_BAD_REQUEST
        ], Response::HTTP_BAD_REQUEST);
    }
}
