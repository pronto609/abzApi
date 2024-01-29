<?php

namespace App\Http\Controllers;

use App\Http\Resources\TokenResource;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Shetabit\TokenBuilder\Facade\TokenBuilder;
class TokenController extends Controller
{
    public function index()
    {
        $date = Carbon::now()->addMinutes(40);
        $tokenObject = TokenBuilder::setUniqueId($this->generateUnicToken())->setUsageLimit(1)->setExpireDate($date)->build();
        $data = [];
        if ($tokenObject->token) {
            $data['success'] = true;
            $data['token'] = $tokenObject->token;
        }
        return new TokenResource($data);
    }

    private function generateUnicToken()
    {
        $plainTextToken = sprintf(
            '%s%s',
            $tokenEntropy = Str::random(40),
            hash('crc32b', $tokenEntropy)
        );
        return hash('sha256', $plainTextToken);
    }
}
