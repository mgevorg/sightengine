<?php

namespace App\Services\SightEngineService\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function test()
    {
        app('external.sightengine-service')->checkText("cazzo Porca Eva", 'standard');
        app('external.sightengine-service')->checkVideo("https://file-examples.com/storage/fe5467a6a163010b197fb20/2017/04/file_example_MP4_480_1_5MG.mp4", 'nudity');
        app('external.sightengine-service')->checkImage("https://image.shutterstock.com/image-photo/word-example-written-on-magnifying-260nw-1883859943.jpg", 'nudity,wad,offensive,text-content,gore,text,qr-content');
    }
}


