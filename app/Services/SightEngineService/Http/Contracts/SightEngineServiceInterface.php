<?php

namespace App\Services\SightEngineService\Http\Contracts;

interface SightEngineServiceInterface
{
    public function checkImage($image, $params);

    public function checkText($text, $params);

    public function CheckVideo($video, $params);
}