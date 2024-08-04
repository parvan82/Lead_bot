<?php

namespace App\Services;

use App\Services\IExtraction;

class PhoneExtraction implements IExtraction
{
    public function extract($text)
    {
        $phonePattern = '/شماره تماس:\s*(\+?\d+)/';
        preg_match($phonePattern, $text, $phoneMatches);

        return $phoneMatches[1] ?? '';
    }
}