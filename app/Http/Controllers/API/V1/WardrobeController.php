<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\APIHelperV1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WardrobeController extends Controller
{
    public function getCurrentArmor(Request $request) {
        APIHelperV1::check($request);

        $api = ProfileController::profile($request);

        $armor = array_values($api['items']['armor']);

        return $armor;
    }

    public function getWardrobe(Request $request) {
        APIHelperV1::check($request);

        $api = ProfileController::profile($request);

        $wardrobe = array_values($api['raw']['wardrobe_contents']);

        $items = APIHelperV1::nbtread($wardrobe);

        return $items;
    }
}
