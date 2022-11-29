<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\APIHelperV1;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\ProfileController;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function getPets(Request $request) {

        APIHelperV1::check($request);

        $api = ProfileController::profile($request);

        $pets = array_values($api['raw']['pets']);

        return $pets;
    }
}
