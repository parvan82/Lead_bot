<?php

namespace App\Services;

class RequestExtraction implements IExtraction
{
    public function extract($string)
    {
        $patterns = [
            'state' => '/استان:\s*.+\((\d+)\)/',
            'area_code' => '/پیش شماره:\s*(\d+)/',
            'phone_number'=> '/شماره انتخابی:\s*(\d+)/',
            'number_request'=>'/شماره درخواستی:\s*(\d+)/'
        ];

        $result = [];
        foreach ($patterns as $key => $pattern) {
            preg_match($pattern, $string, $matches);
            $result[$key] = $matches[1] ?? null;
        }

        if (!empty($result['area_code'])) {
            return "متقاضی درخواست شماره {$result['state']}{$result['area_code']}{$result['phone_number']} را دارد";
        } else {
            return "متقاضی درخواست خط 4 رقمی با شماره درخواستی {$result['number_request']}";
        }
    
        return $result;
    }
}