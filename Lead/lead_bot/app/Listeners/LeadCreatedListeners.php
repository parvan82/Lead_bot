<?php
namespace App\Listeners;

use App\Events\LeadCreatedEvent;
use App\Models\LeadActivity;
use App\Events\LeadActivityCreatedEvent;


class LeadCreatedListeners
{

    public function handle(LeadCreatedEvent $event)
    {
        $lead = $event->lead;

        $LeadActivity=LeadActivity::create([
            'lead_id' => $lead->id,
            'user_id' => null,
            'description' => null,
            'action' => 'Lead created'
        ]);
        event(new LeadActivityCreatedEvent($LeadActivity));
    }

}


