<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\External\SightEngineData;
use App\Events\SightEngineEvent;

class SightEngineCheckText implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $type;
    public $mode;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $type, $mode)
    {
        $this->data = $data;
        $this->type = $type;
        $this->mode = $mode;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $params = array(
            'text' => $this->data,
            'lang' => 'en, zh, nl, fr, de, it, pt, es, sv, tl',
            'mode' => $this->mode,
            'api_user' => env('SIGHTENGINE_API_USER'),
            'api_secret' => env('SIGHTENGINE_API_SECRET'),
          );
          
          $ch = curl_init('https://api.sightengine.com/1.0/text/check.json');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
          $response = curl_exec($ch);
          curl_close($ch);
        //   $output = json_decode($response, true);
        $output = $response;

        event(new SightEngineEvent(SightEngineData::create([
            'data' => $response,
            'type' => $this->type,
            'request' => $this->data
        ])));

    }
}
