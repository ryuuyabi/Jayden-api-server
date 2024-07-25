<?php

namespace App\Services;

use App\Enums\S3Dir;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class Image
{
    private Storage $storage;
    private S3Dir $dir;

    public function __construct(S3Dir $dir)
    {
        $this->storage = Storage::disk('s3');
        $this->dir = $dir;
    }

    public function upload(UploadedFile $image): string
    {
        $path = $this->storage->putFile($this->dir->value, $image, 'public');
        $s3_url = $this->storage->url($path);
        $s3_upload_file_name = explode("/", $s3_url)[5];
        $s3_path = $this->dir->value . '/' . $s3_upload_file_name;
        return $s3_path;
    }
}
