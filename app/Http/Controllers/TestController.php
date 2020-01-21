<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Country;
use App\Flight;
use App\Http\Requests\StoreBlogPost;
use App\Image;
use App\Phone;
use App\Post;
use App\Role;
use App\Soft;
use App\Tag;
use App\Teacher;
use App\User;
use App\Video;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TestController extends Controller
{
    public function test(\App\User $user){
        echo $user->email;
        echo ' good job from test controller !!';
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        echo 'good job in single action controller using magic method invoke';
    }
    public function __construct()
    {
//        $this->middleware('check-age')->only('mid');
//        $this->middleware('check-age')->except('mid');

    }
    public function mid(){
        echo 'good from middlware with controller';
    }
    public function lila(){
        $this->middleware(function ($request,$next){
            if($request->age > 30){
                echo 'fffffffff';
            }

                return $next($request);

        });

    }
    public function check(Request $request){
//        return \request()->input('name');
//        return $request->input('name') ;
//        return $request->path() ;
//        if ($request->is('request')) {
//            return 'good job';
//        }else{
//            return 'wrong';
//        }
//        return $request->url();
//        return $request->fullUrl();
//        return $request->method();
//        if($request->isMethod('get')){
//            return 'good job !!';
//        }
//        return 'wrong';

//        return $request->all();
//        return $request->input('age');
//        return $request->input('age',10);
//        return $request->query();
//        return $request->age;
//        return $request->only('age','id');
////        return $request->except('name');
//        if($request->has(['name','id'])){
//            return 'good job';
//        }
//        return 'wrong';
//        if($request->filled(['name','id'])){
//            return 'good job';
//        }
//        return 'wrong';
       var_dump( $request->flash());
    }
    public function files(Request $request){
//        return $request->file('file');
//        var_dump($_FILES);
//        return $request->file('file'); // return temp path
//        var_dump($request->file('file')); //retuen details
//        if($request->hasFile('file')){        //return true if has file
//            echo 'good';
//        }
//        return $request->file->path();
//        return $request->file->extension();
//        $path = $request->file->store('images');
//        $path = $request->file('file')->store('images', 's3');
//        $path = $request->file->storeAs('images', 'ahmed.jpg');
//        var_dump($path);
        if($request->hasFile('file')){

            $file=$request->file('file');
            $path=public_path();
            $dest=$path.'/images/uploads';
            $ext=$request->file('file')->extension();
            $name=time() . rand(1,900000000). '.' .$ext;
            $file->move($dest,$name);
//            $request->file('file')->store('uploads');

        }
    }

    public function validated(){
        return view('test1');
    }
//    public function postValidated(StoreBlogPost $request){
//        //validate
////        return $request->all();
////        $validateDate=$request->validate([
////            "name"=>'bail|required',
////            "email"=>'required',
//////            "number"=>'nullable|date',
////            "number"=>'nullable',
//
////        ]);
//        $validated = $request->validated();
//        return $validated;
//
//    }
//
//public function postValidated(Request $request){
//        // manually validators
////    $validator=Validator::make($request->all(),[
////        "name"=>'bail|required',
////            "email"=>'required',
////
////            "number"=>'nullable',
////
////    ]);
////if($validator->fails()){
//////    return redirect('validate')->withErrors($validator,'login');
////    $errors=$validator->errors();
////    echo $errors->first('name');
////}
//$rules=["name"=>'bail|required',
//           "email"=>'required',
//
//            "number"=>'nullable',];
//$messages=[
//    'name.required'=>'ggggggggggggg',
//];
//
//    $validator=Validator::make($request->all(),$rules,$messages);
//    if($validator->fails()){
//        return redirect('validate')->withErrors($validator);
//    }
//}
public function postValidated(Request $request){
//        $this->validate($request->all());
//    $rules=['name'=>'required|min:5'];
//    $messages=['name.required'=>'ffffff'];
//        $this->validate($request,$rules,$messages);
    $name=$request->file('name');
return var_dump($_FILES);
}
    public function manualLogin(){

        return view('manual');

    }
    public function postManualLogin(Request $request){
//        var_dump($request->all());
//        $credential=$request->only(['email','password']);
//        Auth::attempt($credential);
//        $email=$request->input('email');
//        $password=$request->input('password');
//        $remember=$request->input('remember');
//        Auth::attempt(['email'=>$email,'password'=>$password,'active'=>1],$remember);
//        return redirect('/home');
        return $request->all();
    }
    public function eloquent(){
//        $users=User::toSql();
//        return view('flight',compact('users'));
//        return view('flight')->with('users',$users);
//        return view('flight',['users'=>$users]);
//        $users=User::where('active',1)->toSql();
//        $users=User::where('active',1)->orderBy('name','asc')->take(2)->toSql();
//        var_dump($users);
//        $users=User::where('active',1)->first();
//        $users=User::where('active',1)->first();
//        $users->name='ali';
//        $users->refresh();
//       $users= User::chunk(4,function ($users){
//           foreach ($users as $user){
////                return $user;
//           }
//        });
//        $users=User::where('active',1)->get()->chunk('7');
//       var_dump($users);
//        foreach (User::where('active',1)->get() as $user){
//            return $user;
//        }
//            $users=User::find(1);
//            $users=User::findorfail(11);
//            $users=User::findorfail(11);
//            $users=User::find([1,6,5]);
//        $users=User::where('active',1)->count();
//        $users=User::where('active',1)->max('id');
//        $users=User::max('created_at');
        $users=User::sum('id');
        return View::make('flight',['users'=>$users]);
    }
    public function insert(){
//        $flight=new Flight();
//        $flight->name='french';
//        $flight->save();

        //using create method
//        Flight::create(['name'=>'cairo','active'=>0]);
//        return view('flight');

        //insert using save
        //1-create object
//        $flight=new Flight();
//        $flight->name='test';
//        $flight->save();
        //insert using create
        Flight::create(['name'=>'test1','active'=>0]);
        //return view
        return view('flight');
    }
    public function update(){
//        $flight=Flight::findorfail(1);
//        $flight->name='germany';
//        $flight->save();
//        $flight=Flight::where('name','french')->where('active',1)->update(['id'=>10]);
//        $flight=Flight::where('name','french')->where('active',1)->update(['active'=>0]);
//        $flight=Flight::where('name','brazil')->where('active',0)->update(['name'=>'dubia']);
//        $flight->update(['name'=>'usa','active'=>0]);
//        return view('flight');

        //update using save
        //1-give record
//        $flight=Flight::findorfail(1);
        //insert
//        $flight->name='test2';
//        $flight->save();
        //mass update
//        $flight=Flight::where('id',1)->where('active',0)->update(['name'=>'test3']);
        $flight=Flight::findorfail(1);
        $flight->update(['name'=>'test4','active'=>1]);
        //return
        return view('flight');
    }
    public function delete(){
//        $flight=Flight::find(1);
//        $deleted=$flight->delete();

        //deleting model by key
//        $deleted=Flight::destroy(10);
//        $deleted=Flight::destroy(11,12);
//        $deleted=Flight::destroy(collect([13,14]));

        //delete by query
//        $deleted=Flight::where('id',15)->delete();
        //mass delete
//        $deleted=Flight::where('id',18)->where('active',0)->delete();
//        if($deleted){
//            return 'deleted';
////        }
        $soft=Soft::withTrashed()->find(3);
//        $soft=Soft::where('id',1)->first();
//        $deleted=$soft->delete();
//        $deleted=Soft::where('id',2);
//$d=Soft::withTrashed()->where('id',3)->first();
//        if($d->trashed()){
//            return 'deleted';
//        }
//        $soft=Soft::withTrashed()->get();
//        $soft=Soft::where('id',2)->get();
//        $soft=Soft::onlyTrashed()->get();
        $soft->forceDelete();
//        return $soft;
//        if($soft->trashed()){
//            return 'trashed';
//        }
    }

    public function softDelete(){
//        $soft=Soft::find(4);
//        $soft->delete();

        // check trashed or not
//        $soft=Soft::withTrashed()->find(4);
//        if($soft->trashed()){
//            return 'trashed';
//        }

        // return all with trashed
//        $soft=Soft::withTrashed()->get();
        // return only trashed

//        $soft=Soft::onlyTrashed()->get();
        //restore soft delete to convert to ordinary
        $soft=Soft::withTrashed()->find(4)->restore();

        // permant delete
        Soft::find(4)->forceDelete();
//        return $soft;
    }

    public function globalScope(){
//        $user=User::withoutGlobalScope(\App\Scopes\AgeScope::class)->get();
//        $user=User::all();
//        $user=User::withoutGlobalScope('id')->get();

        // call to local scope
//        $user=User::name()->get();
        // call to dynamic scope
//        $user=User::OfType('ahmed')->get();
//        return $user;
        //comparing between model
        $user=new User();
        $soft=new Soft();
            if($user->is($soft)){
                return 'identical';
            }else{
                return 'not identical';
            }
    }

    public function relationOne(){
//        $user=new User();

//        return $user->find(1)->phone;       //means need all  phone with id =1
//        return $user->find(2)->phone;       //means need all  phone with id =2
//        return Phone::find(1)->user()->get();       //means user with phone id =1
//        return Phone::find(1)->user;       //means user with phone id =1
//        return Post::find(1)->user;
//        foreach (User::find(1)->posts as $post){
//
//        };
//        return $post->where('id',2)->get();
//        foreach (User::find(1)->roles as $role){
////           return $role->test->desc;
//           return $role->pivot->desc;
//        }
//        $user= User::with('roles')->get();
//        $user=new User();
//        $user= $user->roles()->get();
//        return $user;
//        foreach ($user->flatMap->roles as  $role){
//            return $role->test->desc;
//        }
//        return Role::find(2)->users;
        return Country::find(1)->posts;
    }
    public function relationMorph(){

        //retrive data
//        $article=Article::find(1);
//        return $article->image;
        //retrive parent
//        $image=Image::find(1);
//        return $image->imageable;

        // one to many
        //1-return all comments for video number 1
//        $video=Video::find(1);
//        return $video->comments;

        //2-return all comments for article nummber 1
//        $article=Article::find(1);
//        return $article->comments;

        //3-
//        $comment=Comment::find(3);
//        return $comment->commentable;


        //polymorph many to many
//        $article=Article::find(1);
//        return $article->tags;

        //return with owner of polymorphic relation
        $tag=Tag::find(2);
        return $tag->videos;
//        return $tag->articles;

        //create
//        $image=new Image();
//        $image->imageable()->create(['url'=>'ffffff','imageable_id'=>2,'imageable_type'=>'gg']);
    }
    public function relationExistence(){
        //return teacher has one course at least
//        $teacher=Teacher::has('courses')->get();
//        return $teacher;
        // at least two course
//        $teacher=Teacher::has('courses','>=',2)->get();
//        return $teacher;
//        $teacher=Teacher::whereHas('courses',function ($query){
//           $query->where('name','like','%c');
//        })->get();
//        return $teacher;

        //return teachers with at least 2 courses name containig (%c)
        $teacher=Teacher::whereHas('courses',function ($query){
           $query->where('name','like','%c');

        },'>=',2)->get();
        return $teacher;
    }
    public function relationAbsence(){
        //retrive teachers doent have courses
        $teacher=Teacher::doesntHave('courses')->toSql();
        //customize
        $teacher=Teacher::whereDoesntHave('courses',function ($query){
            $query->where('name','like','%c');
        })->get();
        $teacher=Teacher::whereDoesntHave('courses.student',function ($query){
            $query->where('id',1);
        })->get();
        return $teacher;
    }
    public function relationCount(){
        $teachers=Teacher::withCount('courses')->get();
        $teachers=Teacher::withCount(['courses','students'=>function($query){
            $query->where('id',1);
        }])->get();
        $teachers=Teacher::withCount([
            'courses',
            'courses as test_course_count'=>function($query){
            $query->where('id','>',0);
            }
        ])->get();

        return $teachers[0]->courses_count;
//        return $teachers[0]->courses_count;
//        return $teachers[0]->students_count;
//        return $teachers[1]->courses_count;
//        foreach ($teachers as $teacher){
//        }
    }
}
