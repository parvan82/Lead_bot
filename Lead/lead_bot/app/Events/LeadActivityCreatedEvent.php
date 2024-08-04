<?php 

namespace App\Events;

use App\Models\LeadActivity;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LeadActivityCreatedEvent
{
    use Dispatchable, SerializesModels;
        
    public $leadActivity;

    public function __construct(LeadActivity $leadActivity)
    {
        $this->leadActivity = $leadActivity;      
    }
}
