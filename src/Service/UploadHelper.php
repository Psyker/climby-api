<?php

namespace App\Service;

use App\Entity\PhotoMedia;
use App\Entity\VideoMedia;
use App\Enum\MediaType;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadHelper
{
    private $uploadsPath;
    private $mimeTypeHelper;

    public function __construct(string $uploadsPath, MimeTypeHelper $mimeTypeHelper)
    {
        $this->uploadsPath = $uploadsPath;
        $this->mimeTypeHelper = $mimeTypeHelper;
    }

    public function uploadMedia(UploadedFile $uploadedFile): array
    {
        $fileMimeType = $uploadedFile->getMimeType();
        $destination = $this->getPathFromFileType($fileMimeType);
        $originFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = Urlizer::urlize($originFilename) . '-' . uniqid('', true) . '.' . $uploadedFile->guessExtension();
        $uploadedFile->move($destination, $newFilename);

        return [
            'filename' => $newFilename,
            'mimeType' => $fileMimeType,
            'mediaType' => $this->mimeTypeHelper->getMediaTypeFromMimeType($fileMimeType)
        ];
    }

    public function getPathFromFileType(string $mimeType): string
    {
        $fileType = $this->mimeTypeHelper->getMediaTypeFromMimeType($mimeType);
        if ($fileType === MediaType::VIDEO) {
            return $this->uploadsPath . DIRECTORY_SEPARATOR . VideoMedia::STORAGE_DIR;
        }

        if ($fileType === MediaType::PHOTO) {
            return $this->uploadsPath . DIRECTORY_SEPARATOR . PhotoMedia::STORAGE_DIR;
        }

        throw new \LogicException(sprintf('This mimeType (%s) does not corresponds to any media type.', $mimeType));
    }
}