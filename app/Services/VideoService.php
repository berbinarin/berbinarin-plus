<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class VideoService
{
    /**
     * Memvalidasi dan mengubah URL menjadi format embed.
     */
    public function formatEmbedUrl(string $url)
    {
        // 1. Validasi: Pastikan link mengandung domain youtube atau google drive
        if (!$this->isValidPlatform($url)) {
            // Melempar error jika link bukan YT atau Drive
            throw ValidationException::withMessages([
                'video_url' => 'Format link tidak valid! Gunakan link YouTube atau Google Drive yang benar.'
            ]);
        }

        // 2. Logika YouTube
        if (str_contains($url, 'youtube.com') || str_contains($url, 'youtu.be')) {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
            return isset($match[1]) ? "https://www.youtube.com/embed/" . $match[1] : null;
        }

        // 3. Logika Google Drive
        if (str_contains($url, 'drive.google.com')) {
            return str_replace(['/view', '/edit'], '/preview', $url);
        }

        return null;
    }

    /**
     * Cek apakah URL berasal dari platform yang didukung.
     */
    private function isValidPlatform(string $url): bool
    {
        return str_contains($url, 'youtube.com') || 
               str_contains($url, 'youtu.be') || 
               str_contains($url, 'drive.google.com');
    }
}