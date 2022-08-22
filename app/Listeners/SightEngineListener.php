<?php

namespace App\Listeners;

use App\Events\SightEngineEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

class SightEngineListener
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\SightEngineEvent  $event
     * @return void
     */
    public function handle(SightEngineEvent $event)
    {
        return $event;
    }
}
