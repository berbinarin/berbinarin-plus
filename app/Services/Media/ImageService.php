<?php

namespace App\Services\Media;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class ImageService
{
    /**
     * ImageService ini digunakan untuk compress, resize, dan menyimpan gambar dalam format WebP.
     *
     * @param $file (File dari Request)
     * @param string $path (Folder tujuan, misal: 'banners')
     * @param int|null $width (Lebar yang diinginkan)
     * @param int|null $height (Tinggi yang diinginkan/Crop)
     * @return string (Nama file yang disimpan)
     */

    // Fungsi ini mengunggah gambar, mengubah ukurannya, dan menyimpannya dalam format WebP
    public function upload($file, string $path, int $width = null, int $height = null)
    {
        $filename = time() . '_' . \Illuminate\Support\Str::random(10) . '.webp';

        $image = Image::read($file);

        if ($width && $height) {
            $image->cover($width, $height);
        } elseif ($width) {
            $image->scale(width: $width);
        }

        $encoded = $image->toWebp(80);

        // Simpan ke storage/app/public/{path}/
        $storagePath = storage_path("app/public/{$path}/" . $filename);

        if (!file_exists(dirname($storagePath))) {
            mkdir(dirname($storagePath), 0755, true);
        }

        $encoded->save($storagePath);

        return $filename;
    }

    /**
     * Fungsi ini menghapus gambar dari storage,saat dia update maupun delete
     */
    public function delete(string $path, string $filename)
    {
        $storagePath = storage_path("app/public/{$path}/" . $filename);
        if (file_exists($storagePath)) {
            unlink($storagePath);
        }
    }
}
