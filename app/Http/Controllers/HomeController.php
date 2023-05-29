<?php

namespace App\Http\Controllers;

use App\ImageUploads\Images;
use App\Models\Facilities;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Tutorial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('fronted');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->user_type == 0){
            return $this->fronted();
        } elseif (Auth::user()->user_type == 1){
            return view('home');
        }
    }

    public function slider()
    {
        return view('slider');
    }

    public function fronted()
    {
        $images = Slider::active()->get();
        $services = Service::where('is_active', '=', 1)
            ->get();
        $facilities = Facilities::active()->get();
        return view('frontend.home', compact('images', 'services', 'facilities'));
    }
    public function drop_portfolio()
    {
        return view('frontend.drop_portfolio');
    }

    public function upload(Request $request)
    {
        $user = Auth::user()->id;
        $file_handler = new Images();
        $current_time = Carbon::now()->toDateTimeString();
        $file_name = str_replace(array(':', ' ', '-'), '_', $current_time) . '_' .rand(100, 999);
        $cv_file_path = $file_handler->uploadFile($request->file('upload_file'), $file_name);

        $portfolio = Portfolio::create([
            'user_id' => $user,
            'developer_type' => $request->type,
            'cv' => $cv_file_path,
        ]);
        return $this->cv_list();
    }
    public function tutorial()
    {
        $tutorial_html = Tutorial::where('subject_type', '=', 1)
            ->get();
        $tutorial_js = Tutorial::where('subject_type', '=', 2)
            ->get();
        $tutorial_css = Tutorial::where('subject_type', '=', 3)
            ->get();
        $tutorial_bootstrap = Tutorial::where('subject_type', '=', 4)
            ->get();
        return view('frontend.programming_tutorial', compact('tutorial_html', 'tutorial_js', 'tutorial_css', 'tutorial_bootstrap'));
    }

    public function video_play($id)
    {
        $tutorial = Tutorial::find($id);
        return view('frontend.video_play', compact('tutorial'));
    }

    public function cv_list()
    {
        $frontend_cv = Portfolio::with('users')
            ->where('developer_type', '=', 1)
            ->get();
        $backend_cv = Portfolio::with('users')
            ->where('developer_type', '=', 2)
            ->get();
        return view('frontend.cv_list', compact('frontend_cv', 'backend_cv'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
