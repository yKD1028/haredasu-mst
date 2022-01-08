<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use \GuzzleHttp\Client;

class GooglemapController extends Controller
{
  public function index(Request $request)
  {
    $client = new \GuzzleHttp\Client();
    $api_key = config("app.MIX_GOOGLE_MAPS_API");

    $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" . $request->lat . "," . $request->lng . "&language=ja&key=" . $api_key . "";
    $method = "GET";

    // 接続
    $client = new Client();
    // $client = Http::get($url);

    $response = $client->request($method, $url);

    $posts = $response->getBody();
    $posts = json_decode($posts, true); //jsonに変換

    return $posts;
  }

  public function wether(Request $request)
  {
    Log::info(‘ログ出力テスト’);
    $client = new \GuzzleHttp\Client();
    $url ="https://www.jma.go.jp/bosai/forecast/data/forecast/"+$request+"0000.json";
    $method = "GET";

    // 接続
    $client = new Client();
    $response = $client->request($method, $url);

    $posts = $response->getBody();
    $posts = json_decode($posts, true); //jsonに変換

    return $posts;
  }
}
