<?php

namespace App\Http\Controllers;

use App\Http\Resources\PositionCollection;
use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {
        $posirions = Position::all();
        if (count($posirions) === 0) {
            return response()->json([
                "success" => false,
                "message" => "Positions not found"
            ], 422);
        }
        return new PositionCollection($posirions);
    }
}
