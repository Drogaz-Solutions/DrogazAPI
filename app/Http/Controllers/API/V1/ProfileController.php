<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\APIHelperV1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public static function profile(Request $request) {
        APIHelperV1::check($request);

        $name = $request->input('name');
        $api = new APIHelperV1();
        $response = $api->fetchPlayer($name);

        $profile = json_decode($response, true);

        $currentProfile = null;
        foreach ($profile['profiles'] as $profile) {
            if ($profile['current']) {
                $currentProfile = $profile;
                break;
            }
        } 

        return $currentProfile;
    }

}
