<?php

namespace App\Services\SightEngineService;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use App\Jobs\SightEngineCheckImage;
use App\Jobs\SightEngineCheckText;
use App\Jobs\SightEngineCheckVideo;
use App\Services\SightEngineService\Http\Contracts\SightEngineServiceInterface;
use Illuminate\Support\Facades\Http;
use App\Models\External\SightEngineData;

class SightEngineService implements SightEngineServiceInterface
{
    public function checkImage($path, $params)
    {
        SightEngineCheckImage::dispatch($path, 'image', $params);
    }
    
    public function checkText($text, $params)
    {

        SightEngineCheckText::dispatch($text, 'text', $params);
    }

    public function checkVideo($path,$params)
    {
        SightEngineCheckVideo::dispatch($path, 'video', $params);
    }
}

