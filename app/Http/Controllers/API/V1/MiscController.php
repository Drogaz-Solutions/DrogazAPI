<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\APIHelperV1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MiscController extends Controller
{
    public function bazaar() {

        $api = new APIHelperV1();
        $response = $api->bazaar();
        $response = json_decode($response, true);

        return $response;
    }
}
