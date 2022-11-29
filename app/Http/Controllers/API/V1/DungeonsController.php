<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\APIHelperV1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DungeonsController extends Controller
{
    public function getDungeons(Request $request) {
        APIHelperV1::check($request);

        $name = $request->input('name');

        $api = ProfileController::profile($request);
        $cute = $api['cute_name'];

        $response = APIHelperV1::dungeons($name, $cute);

        return json_decode($response, true);
    }
}
