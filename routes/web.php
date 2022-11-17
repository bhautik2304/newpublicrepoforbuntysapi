<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v15.0/105174718920448/messages');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"messaging_product\": \"whatsapp\", \"to\": \"917046764724\", \"type\": \"template\", \"template\": { \"name\": \"hello_world\", \"language\": { \"code\": \"en_US\" } } }");

$headers = array();
$headers[] = 'Authorization: Bearer EAAJdYOYR8MEBAF7Xikhu9CsowCfFk970hYCZCt397oMgagKIyHJQqW27UUWJqVgXBkEJtKSctZC0DToRbcTQJEjjUQySnaIcHZCsZBwhjjz3V0ZCh0Htg27ZAi2p7iZCAZAT1wzIIViz8Y2tQBxiXZCEz56SzZA0mhhIgTzYquHZAcnIKp8IXbdo9LqQ3k5yrD7KBXv8aP1MkMDJN3SXZB1S69SB9MEfdG6131EZD';
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

curl_close($ch);
return $result;
});

Route::get('/info',function (){
    return view('welcome');
});
