<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\LeadCreatedEvent;
use App\Events\ReportEvent;
use App\Listeners\LeadCreatedListeners;
use App\Listeners\ReportListener;
use App\Events\LeadActivityCreatedEvent;
use App\Listeners\LeadActivityCreatedLisener;



class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        LeadCreatedEvent::class => [
            LeadCreatedListeners::class,
        ],
       
        LeadActivityCreatedEvent::class => [
            LeadActivityCreatedLisener::class,
            ],
    ];
    

    public function boot()
    {
        parent::boot();
    }
}
