<?php

namespace App\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIHelperV1 extends Controller
{
    public function fetchPlayer($name) {
        //API: https://sky.shiiyu.moe/api/v2/

        $url = 'https://sky.shiiyu.moe/api/v2/profile/' . $name;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'User-Agent: SkyblockStats'
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function bazaar() {
        $url = 'https://sky.shiiyu.moe/api/v2/bazaar';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'User-Agent: SkyblockStats'
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public static function dungeons($name, $cute) {
        $url = 'https://sky.shiiyu.moe/api/v2/dungeons/' . $name . '/' . $cute;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'User-Agent: SkyblockStats'
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    
    public static function nbtread($string) {
        $items = base64_decode($string[1]);

        $gzipReader = new \Aternos\Nbt\IO\Reader\GZipCompressedStringReader($items, \Aternos\Nbt\NbtFormat::JAVA_EDITION);
        $tag = \Aternos\Nbt\Tag\Tag::load($gzipReader);

        return $tag;
    }

    public static function check($request) {
        $request->validate([
            'name' => 'required'
        ]);
    }
}
