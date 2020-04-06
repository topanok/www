<?php

namespace Framework\Filesystem\Api;

interface FileUploaderInterface
{
    /** Set file from request */
    public function setFile($file): void;

    /** Path where upload file */
    public function setDir(string $path): void;

    /** Add allow formats for uploading files */
    public function addAllowedFormats(array $allowedFormats): void;

    /** Get size for uploading files in MB */
    function getSize(): int;

    /** Set max size for uploading files in MB */
    function setMaxSize(int $size): void;

    /** Return file mime type, for example image/jpeg */
    function getMimeType(): string;

    /** Upload file to the filesystem */
    function uploadFile(): bool;
}