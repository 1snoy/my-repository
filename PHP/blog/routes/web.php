<?php
use Illuminate\Support\Facades\Auth;
use App\instructions;
use App\User;
use App\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    return view('welcome');
})->name('home1');


Route::any('instructions', function (Request $request) {
    $action=$request->input('action');

    // dd($action);
    $findtext=$request->input('findtext');
    // dd($findtext);
    if(Auth::check() and auth()->user()->is_banned==1){
        return redirect()->route('home1');
    }
    else{
        if ($action=='find' and $findtext!=null) {
            $instructions=instructions::where('title','LIKE','%'.$findtext.'%')->get();
            // dd($instructions);
        } else {
            $instructions=instructions::all();
            // dd($instructions);
        }
        return view('instructions',['instructions'=>$instructions]);
    }
});
Route::any('add_instruction', function (Request $request) {

    $action=$request->input('action');
    // dd($action);
    $title=$request->input('title');
    $file_content=$request->file('content');
    $has_file_image = $request->hasFile('content');
    // dd($action);
    if(Auth::check() and auth()->user()->is_banned==1){
        return redirect()->route('home1');
    }
    else{
        if ($action=='add' and $title!=null and $has_file_image) {
            $instructions=new instructions;
            $instructions->title=$title;
            $file_name = $title.'_'.$file_content->getClientOriginalName();
            $instructions->content=$file_name;
            $instructions->save();
            $destination_path = public_path().'/pdf/';
            $file_content->move($destination_path, $file_name);
            // dd($request->file('content'));
            return redirect()->route('add_instruction');
        }
    }
    return view('add_instruction');
})->name('add_instruction');

Route::any('instructions/{id}', function ($id,Request $request) {

    $action=$request->input('action');
    $comment=$request->input('comment');
    $id_instruction=$request->input('id_instruction');
    if(Auth::check() and auth()->user()->is_banned==1){
        return redirect()->route('home1');
    }
    else{
        if ($action=='comment' and $comment!=null and $id_instruction!=null) {
            $comments=new comments;
            $comments->comment=$comment;
            $comments->id_instruction=$id_instruction;
            $comments->save();
            // dd($action);
        }
        $instruction=instructions::where('id',$id)->get();
    }
    return view('instruction',['instruction'=>$instruction,['id'=>$id]]);
});
Route::any('admin_panel',function(Request $request){
    $action=$request->input('action');
    $id=$request->input('id');
    $title=$request->input('title');
    $file_content=$request->file('content');
    $has_file_image = $request->hasFile('content');
    $name=$request->input('name');
    $email=$request->input('email');
    $password=$request->input('password');
    $is_admin=$request->input('is_admin');
    if(Auth::check() and auth()->user()->is_banned==0 and auth()->user()->is_admin=1){
        if ($action=='add' and $title!=null and $has_file_image) {
        $instructions=new instructions;
            $instructions->title=$title;
            $file_name = $title.'_'.$file_content->getClientOriginalName();
            $instructions->content=$file_name;
            $instructions->admin_on=1;
            $instructions->save();
            $destination_path = public_path().'/pdf/';
            $file_content->move($destination_path, $file_name);
            // dd($request->file('content'));
            return redirect()->route('admin_panel');
        }
        if ($action=='allow' and $id!=null) {
            DB::update('update instructions set admin_on = 1 where id = ?', [$id]);
            return redirect()->route('admin_panel');
        }
        if ($action=='delete_instruction' and $id!=null) {
            instructions::find($id)->delete();
            return redirect()->route('admin_panel');
        }
        if ($action=='delete_user' and $id!=null) {
            User::find($id)->delete();
            return redirect()->route('admin_panel');
        }
        if($action=='create' and $name!=null and $email!=null and $password!=null){
            // dd($is_admin);
            if($is_admin=='on'){
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'is_admin' => 1,
                ]);
            }else{
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),

                ]);
            }

            return redirect()->route('admin_panel');
        }
        if ($action=='ban_user' and $id!=null) {
            $usr=User::find($id);
            $usr->is_banned=1;
            $usr->save();
            return redirect()->route('admin_panel');
        }
        if ($action=='unban_user' and $id!=null) {
            $usr=User::find($id);
            $usr->is_banned=0;
            $usr->save();
            return redirect()->route('admin_panel');
        }
        $instructions=instructions::where('admin_on',0)->get();
        return view('admin_panel',['instructions'=>$instructions,'all_users'=>User::all(),'all_instruction'=>instructions::all(),'all_users_banned'=>User::where('is_banned',1)->get(),'all_users_nbanned'=>User::where('is_banned',0)->get()]);

    }
    else{
        return redirect()->route('home1');
    }
})->name('admin_panel');

Route::get('instructions_pdf/{id}', function($id){
    if(Auth::check() and auth()->user()->is_banned==1){
        return redirect()->route('home1');
    }else{
        $instruction_array = instructions::find($id);
        $filename = $instruction_array->content;
        $filePath = public_path().'/pdf/';
        $file = $filePath."".$filename;
        return response()->download($file);
    }

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home2');
