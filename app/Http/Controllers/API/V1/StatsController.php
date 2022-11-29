<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\APIHelperV1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function getSkills(Request $request) {
        APIHelperV1::check($request);

        $api = ProfileController::profile($request);

        $skills = $api['data']['weight']['senither']['skill'];

        return $skills;
    }

    public function getCollections(Request $request) {
        APIHelperV1::check($request);

        $api = ProfileController::profile($request);

        //show all collections with names
        $collections = $api['raw']['collection'];


        return $collections;
    }
}
