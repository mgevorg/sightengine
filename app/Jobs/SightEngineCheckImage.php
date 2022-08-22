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
use Illuminate\Support\Facades\Storage;

class SightEngineCheckImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $path;
    public $type;
    public $models;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($path, $type, $models)
    {
        $this->path = $path;
        $this->type = $type;
        $this->models = $models;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        $params = array(
            'media' => curl_file_create($this->path),
            'models' => $this->models,
            'api_user' => env('SIGHTENGINE_API_USER'),
            'api_secret' => env('SIGHTENGINE_API_SECRET')
        );

        $ch = curl_init('https://api.sightengine.com/1.0/check.json');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $response = curl_exec($ch);
        curl_close($ch);
          
        $output = json_decode($response, true);

        event(new SightEngineEvent(SightEngineData::create([
            'data' => $response,
            'type' => $this->type,
            'request' => $this->path
        ])));
    }
}
