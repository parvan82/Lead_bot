<?php


namespace App\Services;

class Parser
{
    protected $regularExtraction;
    protected $phoneExtraction;
    protected $urlExtraction;
    protected $emailExtraction;

    public function __construct(
        RequestExtraction $regularExtraction,
        PhoneExtraction   $phoneExtraction,
        URLExtraction     $urlExtraction,
        EmailExtraction   $emailExtraction
    )
    {
        $this->regularExtraction = $regularExtraction;
        $this->phoneExtraction = $phoneExtraction;
        $this->urlExtraction = $urlExtraction;
        $this->emailExtraction = $emailExtraction;
    }

    public function parse($text)
    {
        $description = $this->regularExtraction->extract($text);
        $phoneNumber = $this->phoneExtraction->extract($text);
        $url = $this->urlExtraction->extract($text) ?: null;
        $email = $this->emailExtraction->extract($text) ?: null;

        return [
            'description' => $description,
            'phone_number' => $phoneNumber,
            'lead_source_id' => $url,
            'email' => $email,
        ];
    }
}
