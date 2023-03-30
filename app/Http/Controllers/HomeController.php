<?php

namespace App\Http\Controllers;

use App\Message;
use App\Job;
use App\Module;
use App\Applicant;
use App\Application;
use App\User;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::select('board.*', 'users.name')->join('users', 'users.id', '=', 'board.user_id')->paginate(5);
        return view('home')->with(compact('jobs'));
    }

    public function job_update(Request $request){
        if($request->alphabet == 1 && $request->alphabet == 1){
            $jobs = Job::select('board.*', 'users.name')
                    ->join('users', 'users.id', '=', 'board.user_id')
                    ->orderBy('board.title', 'ASC')
                    ->orderBy('board.created_at', 'DESC')
                    ->paginate(5);
        }elseif($request->alphabet == 1 && $request->chronology == 0){
            $jobs = Job::select('board.*', 'users.name')
                    ->join('users', 'users.id', '=', 'board.user_id')
                    ->orderBy('board.title', 'ASC')
                    ->paginate(5);
        }elseif($request->alphabet == 0 && $request->chronology == 1){
            $jobs = Job::select('board.*', 'users.name')
                    ->join('users', 'users.id', '=', 'board.user_id')
                    ->orderBy('board.created_at', 'DESC')
                    ->paginate(5);
        }else{
            $jobs = Job::select('board.*', 'users.name')->join('users', 'users.id', '=', 'board.user_id')->paginate(5);
        }
        return view('job_update')->with(compact('jobs'));
    }

    public function job_detail(Request $request){
        $job = Job::find($request->id);
        $bids = Application::where('user_id', Auth::user()->id)->where('board_id', $request->id)->get();
        return view('job_detail')->with(compact('job', 'bids'));
    }

    public function apply_job(Request $request){
        $this->validate($request,[
            'description' => 'required|max:3000',
        ]);

        $dataStore=[
            'board_id' => $request->board_id,
            'user_id' => Auth::user()->id,
            'description' => $request->description,
        ];
        Application::create($dataStore);
        return redirect('/')->withErrors(['error' => 'Successfully applied!']);
    }

    public function post_job(){
    	return view('post_job');
    }

    public function save_job(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'required|string|max:3000',
        ]);
        $dataStore=[
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ];
        Job::create($dataStore);
        return redirect('home');
    }

    public function users(){
        $users = User::where('type', 0)->paginate(10);
        return view('users')->with(compact('users'));
    }

    public function edit_user(Request $request){
        $user = User::find($request->id);
        return view('edit_user')->with(compact('user'));
    }

    public function update_user(Request $request){
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
        $dataStore=[
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        User::where('id', $request->id)->update($dataStore);
        return redirect('users')->withErrors(['error' => 'Successfully updated!']);
    }

    public function delete_user(Request $request){
        User::where('id', $request->id)->delete();
        Message::where('user_id', $request->id)->delete();
        return redirect('users')->withErrors(['error' => 'Successfully deleted!']); 
    }

    public function modules(){
        $modules = Module::select('module.*', 'users.name')->join('users', 'users.id', '=', 'module.user_id')->paginate(5);
        return view('module')->with(compact('modules'));
    }

    public function module_detail(Request $request){
        $module = Module::find($request->id);
        $applicants = Applicant::select('applicant.*', 'users.name')->join('users', 'users.id', '=', 'applicant.user_id')->where('applicant.module_id', $request->id)->orderBy('applicant.created_at', 'DESC')->get();
        $bids = Applicant::where('user_id', Auth::user()->id)->where('module_id', $request->id)->get();
        return view('module_detail')->with(compact('module', 'applicants', 'bids'));
    }

    public function place_bid(Request $request){
        $this->validate($request,[
            'description' => 'required|max:3000',
            'attachment' => 'required|mimes:doc,pdf,docx,zip|max:2048',
        ]);

        $path = '';

        $folder_path = public_path('uploads');

        if($request->attachment){
            $extension = $request->file('attachment')->getClientOriginalExtension();
            $name = $request->file('attachment')->getClientOriginalName();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $name = strtolower(Str::slug($name));
            $name = $name .'_'. time() . '.' . $extension;
            $request->file('attachment')->move($folder_path, $name);
            $path = 'uploads/'.$name;
        }

        $dataStore=[
            'module_id' => $request->module_id,
            'user_id' => Auth::user()->id,
            'description' => $request->description,
            'path' => $path,
        ];
        Applicant::create($dataStore);
        return redirect('modules')->withErrors(['error' => 'Successfully replied!']);
    }

    public function create_module(Request $request){
        return view('create_module');
    }

    public function save_module(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'required|string|max:3000',
        ]);
        $dataStore=[
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ];
        Module::create($dataStore);
        return redirect('modules');
    }
}
