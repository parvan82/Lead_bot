<?php

namespace App\Services;

use App\Services\IExtraction;

class URLExtraction implements IExtraction
{
    public function extract($text)
    {
        $urlPattern = '/صفحه: (https?:\/\/[^\s]+)/u';
        preg_match($urlPattern, $text, $urlMatches);
        return $urlMatches[1] ?? '';
    }
}
