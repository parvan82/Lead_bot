<?php

namespace App\Services;

use App\Services\IExtraction;

class EmailExtraction implements IExtraction
{
    public function extract($text)
    {
        $emailPattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/u';
        preg_match($emailPattern, $text, $emailMatches);
        return $emailMatches[0] ?? '';
    }
}