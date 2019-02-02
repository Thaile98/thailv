<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/posts/test',function(){
	$request = new Psr7\Request('GET', 'http://codetest.abc/api/posts/1', ['Authentication' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik1VVTBNVUl6TnpKRE5ERXhRekl6TWpoQ05EUkZRemN4TWpORk5FSTRRakpEUVRBMU5FTXpOZyJ9.eyJpc3MiOiJodHRwczovL3Bvc3RzYXBpLmF1dGgwLmNvbS8iLCJzdWIiOiJCN2JqWEg2WHVJME5Jd09adTBzV2I3UkxhSUJTdmYxWkBjbGllbnRzIiwiYXVkIjoiaHR0cHM6Ly9wb3N0YXBpLmNvbSIsImlhdCI6MTU0MzUwOTIwNywiZXhwIjoxNTQzNTk1NjA3LCJhenAiOiJCN2JqWEg2WHVJME5Jd09adTBzV2I3UkxhSUJTdmYxWiIsImd0eSI6ImNsaWVudC1jcmVkZW50aWFscyJ9.bLMe4OCV4iJ8Z5nyCoM3taXke85TdRRvX8mAie_xdD9EF9NUaiX5xdDLQ2lAYgltMrvcGvHc21ig09bs48XSg_5UM5mkSxZ7fUOO5X1piHgaR7JDER8TxMzfGLyoJNNYEZsv56y10ReNPbVqzhS__4o2i5l1m7D0jrQLDls9uEmRltHXHoqE6srBmYbT8KgdBTTDWccLkfodLSF89Sk52X6opNpZwkSqEWbHgNj9-jFuFU9A3N3eaEazJEllt7rOpKaq9F8jMOcquAFvfIshebixNc4jbcpxGT5BevYP24eZvR6RivVCUPjzzOs_E1ACcO5D3nnKrbaSv-DHYn4ocw']);
	// $client = new Client([
	//     'base_uri' => 'http://codetest.abc/',	
	// ]);
	// $headers = ['X-Foo' => 'Bar'];
	// $response = $client->request('GET', 'api/posts/1',$headers);
	$header = $request->getHeaders();
	dd($header);
});
Route::group(['prefix' => 'posts','middleware'=>'auth'], function ()
{
	Route::get('',  ['uses' => 'PostController@getList']);

	Route::get('/{id}', ['uses' => 'PostController@findOne']);

	Route::post('/create', ['uses' => 'PostController@create']);

	Route::delete('/delete/{id}', ['uses' => 'PostController@delete']);

	Route::put('/update/{id}', ['uses' => 'PostController@update']);
});