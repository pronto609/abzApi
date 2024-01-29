<?php

namespace App\Service;

interface ResizerInterface
{
    public function setApiKey(string $key): void;

    public function resizeFromBuffer(string $fileName, string $file, string $path, ?array $params = null): void;
}
