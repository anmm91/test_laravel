<?php

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
//    session()->put('ahmed','hello ahmed');
//    session()->put('lila','hello lila');
//    session()->forget('lila');
//    session()->flash('ahmed','hello ahmed');
//    session()->push('ahmed','hello ahmed');
//    session()->forget('ahmed','hello ahmed');
    session()->put('ahmed','hello ahmed');
//    session()->regenerate('10');
//    session()->put('lila','hello lila');
//    session()->flush();
    return view('welcome');
});
// basic routes
Route::get('/test',function (){

    echo 'good';

});

// some times need to register route that respond with multiple http verbs
Route::match(['get','post'],'/match',function (){
    echo 'match methods<br>';
    if(csrf_token()==session()->token()){
        echo 'will done';
    }
//    echo request()->route()->getActionMethod();
//    request()->route()->getAction();
    var_dump(request()->all(),session()->token());
//    return request()->old('name');


});

Route::get('/ahmed',function (){

    echo '
            <form method="post" action="/match">
                 <input type="hidden" value="'.csrf_token().'" name="_token">
                 <input type="text"  name ="user" >
                <input type="submit" value="send" name="send">
            </form>

    ';



});

// redirect
\Illuminate\Support\Facades\Route::get('there',function (){
    echo 'from redirect route';
});

\Illuminate\Support\Facades\Route::redirect('/here','/there');

//view route
\Illuminate\Support\Facades\Route::view('/view','welcome',array('ahmed'=>'hello world'));
//===================================================================================================
//=========================================================
//=======================

//route paramter
//1-required paramter
//one paramter
Route::get('param/{id}',function ($i){
    echo 'single paramter '.$i;
});
// multi paramter
\Illuminate\Support\Facades\Route::get('param/{id}/param/{name}',function ($i,$n){

    echo 'multi paramter: the id is: ' .$i .' and the name is : '. $n;
});
//2-optional paramter
Route::get('optional/{name?}',function ($name='lila'){   // lila represent default value
    if(request()->has('name')){

        echo 'the name in url is : ' .$name;
        var_dump(request()->all());
    }else{
        echo 'the default name is : ' .$name;

    }
});


//3-regular expression constraint
Route::get('regular/{id}',function ($i){
    echo 'the id is : ' .$i;

})->where('id','[0-9]+');


Route::get('regular/{id}/{name}',function ($i,$n){
    echo 'multi paramter: the id is: ' .$i .' and the name is : '. $n;

})->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);

//4-global constraint
Route::get('user/{id}',function ($i){
    echo 'the user id is : ' .$i;
});

//5-encoded forward slash
Route::get('encode/{search}',function ($s){

    echo 'the back slash is explicitly allow : ' .$s ;
})->where('search','.*');

//=======================================================================================================
//==============================================================================
//===============================================
//named routes
Route::get('a/b/c/d/route',function (){
    echo 'hello named routes';
})->name('route');


Route::get('call',function (){

    return 'x';
});


//using named function to inspect current route using middle ware

Route::get('check',function (){

    echo '<br>good job.<br>';
})->name('name')->middleware('check-named-method');

//=============================================================================================
//======================================================================
//====================================================
//route group
//1-middlware
Route::middleware('')->group(function (){


});

//2-namespace
Route::namespace('Admin')->group(function (){

    Route::get('admin','AdminController@test');
});

//3-sub domain
Route::domain('{account}.test_laravel.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {

    })->name('dd');
});
Route::get('ffg',function (){
    return route('dd');
});
//4-prefix
Route::prefix('test')->group(function (){

    Route::get('pre',function (){
        echo 'good job from prefix ';
    });
});

//5-route name prefix
Route::name('admin.')->group(function () {
    Route::get('user', function () {
        // Route assigned name "admin.users"...
        echo 'good job from using name prefix';
    })->name('users');
});
Route::get('good',function (){
    return redirect()->route('admin.users');
});

//=========================================================================================
//==========================================================
//====================================
Route::get('customers', [
    'uses' => 'Admin\AdminController@test',
    'as' => 'test'
]);
Route::get('game',function (){
    return redirect()->route('test');
});


Route::group( ['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    Route::group(['as' => 'user.'], function(){

        Route::get('custom', [
            'as' => 'custom',
            'uses' => 'UserController@custom'
        ]);

        // Results in admin.user.custom

    });


    Route::resource('user', 'UserController');
    // Route names
    // admin.admin.user.index
    // admin.admin.user.create
    // admin.admin.user.store
    // etc..
});

Route::group(['prefix'=>'ahmed','as'=>'tharwat.'],function (){

    Route::get('abcd',['as'=>'tharwat',function (){
        echo 'good job';
    }]);


});
Route::get('ab',function (){
    return redirect()->route('tharwat.tharwat');
});
// use (as) to make return with route
Route::group(['as'=>'cpanel::'],function (){

    Route::get('pepole',['as'=>'ali',function(){

        return route('cpanel::ali');
    }]);


});

//Route::fallback(function () {
//    //
//});
Route::get('cc',function (){
    $action = Route::currentRouteAction();
    echo $action;
});


//===========================================================================================
//=================================================
//===========================
//form method spoofing
Route::get('/form',function (){

    return '<form method="post" action="/lila">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <input type="text" name="name">
            <input type="submit" value="send">

        </form>';



});
Route::delete('/lila',function (){

    var_dump(request()->all(),session()->getName(),session()->token(),session()->getDrivers(),session()->previousUrl());
});
//========================================================================================================
//=================================================================
//==============================================
//route model binding
//1-implicit binding
Route::get('implicit/{user}',function (App\User $user){
    var_dump($user);
});

//2-explicit binding
//Route::get('profile/{user}', function (App\User $user) {
//    return $user->email;
//});
Route::get('explicit/{user}',function (App\User $user){
    var_dump($user);
});
//======================================================================================================
//================================================================================
//===================================================
                                     // middle ware section

Route::group(['middleware'=>'check-age'],function (){

    Route::get('age',function (){
        echo 'good job';
        return '<form method="post" action="/lila">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <input type="text" name="name">
            <input type="submit" value="send">

        </form>';
    });


});


Route::get('fr',function (){
    return '<form method="post" action="/lila">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <input type="text" name="name">
            <input type="submit" value="send">

        </form>';
})->middleware('check-age');


Route::get('role',function (){

    echo  '  good job!!!';

})->middleware('check-role:admin,editor,author');
//======================================================================================================
//=======================================================================================
//======================================================================
                             // csrf token section

Route::get('csrf',function (){
    return '<form method="post" action="/lila">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <input type="text" name="name">
            <input type="submit" value="send">

        </form>';
});
Route::get('delete-csrf',function (){
    return '<form method="post" action="/lila">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <input type="text" name="name">
            <input type="submit" value="send">

        </form>';
});

Route::get('ajax',function (){
    return view('test');
});
Route::get('ajax-test',function (){
    return 'good job';
});
//=======================================================================================================
//====================================================================================
//=======================================================
//=============================== controller class section

//basic controller
Route::get('cont/{user}','TestController@test');

//basic controller with namespace
Route::namespace('Test')->group(function (){
    Route::get('namespace','TestController@test');
});
//single action controller
Route::get('invoke','TestController');
// controller with middleware
Route::get('middlware','testcontroller@mid');
Route::get('lila','testcontroller@lila');
// resources
Route::resources([
    'player'=>'PlayerController',
    'actor'=>'ActorController',
    'tennis'=>'TennisController'
]);

//partial resources
Route::resource('partial','PartialController')->only(['index']);
//api resource
Route::apiResource('api','PartialController');
//naming routes
Route::get('ali',function (){
    return redirect()->route('naming.test');
});
Route::resource('naming','PartialController')->names([
    'index'=>'naming.test'
]);

//http request
Route::get('request','TestController@check');

Route::get('files',function (){
    return view('form');

});

Route::post('files','TestController@files');
//===========================================================================================================
//--LOAD THE VIEW--//
Route::get('/link', function () {
    $links = \App\Link::all();
    return view('laracrud')->with('links', $links);
});
use Illuminate\Http\Request;
//--CREATE a link--//
Route::post('/links', function (Request $request) {
    $link = \App\Link::create($request->all());
    return Response::json($link);
});

//--GET LINK TO EDIT--//
Route::get('/links/{link_id?}', function ($link_id) {
    $link = \App\Link::find($link_id);
    return Response::json($link);
});

//--UPDATE a link--//
//use Illuminate\Http\Request;
Route::put('/links/{link_id}', function (Request $request, $link_id) {
    $link = \App\Link::find($link_id);

    $link->url = $request->url;
    $link->description = $request->description;

    $link->save();

    return Response::json($link);
//    echo 'ffff';
});
Route::get('en',function (){
    return '<form method="post" action="/links/5">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <input type="text" name="name">
            <input type="submit" value="send">

        </form>';
});
//--DELETE a link--//
Route::delete('/links/{link_id?}', function ($link_id) {
    $link = \App\Link::destroy($link_id);
    return Response::json($link);
});

//==================================================================================================
//==============================================================
//==============================================
//===============================response section
Route::get('response',function (){
//    return response('good job !!','200',['Content-Type'=>'text/plain']);
//    return response('good job !!','200',['Content-Type'=>'text/html']);
//    return response('good job !!','200',['Content-Type'=>'application/octet-stream']);
//    return response('good job !!','200',['Content-Type'=>'application/json']);
//    return response('good job !!','200',['Content-Type'=>'application/pdf']);
//    return response('good job !!','200',['Content-Type'=>'image/[png,jpeg,gif]']);

//        return response('good job')->header('Content-Type','text/plain')->header('X-Header-One','text/html');

//    return response('good job !!')->header('Content-Type','text/plain')->cookie('ahmed','good job',1);
//    return redirect()->away('https://www.google.com');
//    return response()->download('images\uploads\1578005388411153731.jpeg');
    return response()->file('images\uploads\1578005388411153731.jpeg');
});

//=======================================================================================
//=========================================
//================================ view section
Route::get('samir',function (){
    if(\Illuminate\Support\Facades\View::exists('tesft')){

    }
    return view('test',['name'=>'ahmed']);
});
//=======================================================================================
//=============================================================
//========================================= url generation
Route::get('url',function (){
//    $post=App\User::findOrFail(1);
//    var_dump($post);
//    return url('/post/'.$post->id);
//    return url()->current();
//    return url()->full();
//    return url()->previous();
});
//=================================================================================================
//===================================================================================
//============================================ session section ===

Route::get('session',function (){
    return '<form method="post" action="session">

            <input type="hidden" name="_token" value="'.csrf_token().'">
            <input type="text" name="name">
            <input type="submit" value="send">

        </form>';
});

Route::post('session',function (){
//    return request()->session()->get('key','default');
//    return request()->all();
//    if(request()->session()->has('name')){
//        return 'good';
//    }
//    $request->session()->put('key', 'value');
});

//==================================================================
//===================================================
//============================== validation section
Route::get('validate','TestController@validated');
Route::post('validate','TestController@postValidated')->name('messi');

//============================================================================================
//=========================================================
//===================================== blade section

Route::get('blade',function (){
    return view('index');
});
Auth::routes(['verify' => true]);
Route::get('v', function () {
    // Only verified users may enter...
    return 'good from verfied';
})->middleware('verified');
Route::group(['middleware'=>['auth:web','verified']],function (){

    Route::get('v/v',function (){
        return 'good skipped the auth and verified middleware';
    });
});
Route::get('adel',function (){

//    var_dump(auth()->guard('web'));
//    var_dump(auth()->user()->id);
//    var_dump(\request()->user()->name);
//    if(auth()->check()){
//        return 'you are logged';
//    }else{
//        return 'not logged';
//    }
    return 'good';
})->middleware('auth:web');
//===============================================================================================
//=============================================================
//==============================(manually login)
Route::get('manual/login','TestController@manualLogin');
Route::post('manual/login','TestController@postManualLogin');
Route::get('/home', 'HomeController@index')->name('home');
//================================================================================================
//==============================================================
//========================================(encryption)
Route::get('cipher',function (){
//    $encryption=encrypt('ahmed');        //with serilization
//    $encryption=decrypt('ahmed');
    $encryption=\Illuminate\Support\Facades\Crypt::encryptString('ahmed');
    $decrypted = Crypt::decryptString($encryption);
    return $decrypted;
});
Route::get('hash',function (){

//    $hash=\Illuminate\Support\Facades\Hash::make('ahmed');
//    $hash=bcrypt('ahmed');
//    $hash=bcrypt('ahmed');
    $hash=bcrypt('ahmed',[ 'rounds' => 12]);
    return $hash;
});
//============================================================================
//=======================================================
//==================================
//Route::get('flight',function (){
//
//    $users=\App\User::all();
////    echo $users;
////    return $users;                //return json collection instance
//
//});
Route::get('flight','TestController@eloquent');
Route::get('insert/model','TestController@insert');
Route::get('insert-model','TestController@insert');
Route::get('update/model','TestController@update');
Route::get('update-model','TestController@update');
Route::post('json',function (){
   return responseJson('200','good','good');
});

Route::get('delete/model','TestController@delete');
Route::get('soft/model','TestController@softDelete');
Route::get('global/scope','TestController@globalScope');
Route::get('phone','TestController@relationOne');
Route::get('morph','TestController@relationMorph');
Route::get('existence','TestController@relationExistence');
Route::get('existence/again','RelationController@relationExistence');
Route::get('absence','TestController@relationAbsence');
Route::get('absence/again','RelationController@relationAbsence');
Route::get('count','TestController@relationCount');
Route::get('count/again','RelationController@relationCount');
