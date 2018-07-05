<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    // $mostApprovals = DB::select("SELECT * FROM articlerecord LIMIT 20");
    $mostVoteds = DB::select("SELECT *,SUM(isuseful+notuseful) as total from articlerecord GROUP BY id ORDER BY total DESC LIMIT 10");
    $newVotes = DB::select("SELECT * from articlerecord ORDER by id DESC LIMIT 10");
    return view('index',['mostVoteds'=>$mostVoteds,'newVotes'=>$newVotes]);
});

Route::post('/search',function(Request $request){
    $searchText=($request->input('searchText'));
    $results = DB::table('articlerecord')->where('articleurl',$searchText)->get();
    return view('searchView',['results'=>$results]);
});

Route::auth();

Route::get('/home', 'HomeController@index');


//api
Route::group(['prefix' => 'api', 'middleware' => 'cors'],function(){
    //?articleurl=
    Route::get('/init','initController@init'); 
    Route::get('/vote/useful','voteController@useful');
    Route::get('/vote/notuseful','voteController@notuseful');
});
