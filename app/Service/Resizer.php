<?php

namespace App\Service;

class Resizer implements ResizerInterface
{
    public function __construct(
        private array $params = [
            'method' => 'cover',
            'width' => 70,
            'height' => 70,
        ]
    ) {
        self::setApiKey(env('TINIFY_SECRET'));
    }

    public function setApiKey(string $key): void
    {
         \Tinify\setKey($key);
    }

    public function resizeFromBuffer(string $fileName, string $file, string $path, ?array $params = null): void
    {
        $resultData = \Tinify\fromBuffer($file);
        $resized = $resultData->resize($params ?? $this->params );
        $resized->toFile($path);
    }
}
