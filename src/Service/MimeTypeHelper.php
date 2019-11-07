<?php


namespace App\Service;


use App\Enum\MediaType;

class MimeTypeHelper
{

    public const VIDEO_MIME_TYPES = [
        'video/mp4'
    ];

    public const IMAGE_MIME_TYPES = [
        'image/jpeg',
    ];

    public function getMediaTypeFromMimeType(string $mimeType): string
    {
        if (in_array($mimeType, self::VIDEO_MIME_TYPES, true)) {
            return MediaType::VIDEO;
        }

        if (in_array($mimeType, self::IMAGE_MIME_TYPES, true)) {
            return MediaType::PHOTO;
        }

        throw new \RuntimeException('Could not determine authorized mime type.');
    }
}