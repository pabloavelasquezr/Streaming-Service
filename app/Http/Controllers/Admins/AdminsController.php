<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Admin;
use App\Models\Category\Category;
use App\Models\Episode\Episode;
use App\Models\Show\Show;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class AdminsController extends Controller
{
    // view login
    public function viewLogin()
    {
        return view('admins.login');
    }

    // check login
    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'Email or password is incorrect']);
    }

    public function index()
    {
        $shows = Show::select()->count();
        $episodes = Episode::select()->count();
        $admins = Admin::select()->count();
        $categories = Category::select()->count();

        return view('admins.index', compact('shows', 'episodes', 'admins', 'categories'));
    }

    public function allAdmins()
    {
        $allAdmins = Admin::select()->orderBy('id', 'desc')->get();
        return view('admins.alladmins', compact('allAdmins'));
    }

    public function createAdmins()
    {
        return view('admins.createadmins');
    }

    public function storeAdmins(Request $request)
    {
        $storeAdmins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($storeAdmins) {
            return Redirect::route('admins.all')->with(['success' => 'Admin created successfully']);
        }
    }

    public function allShows()
    {
        $allShows = Show::select()->orderBy('id', 'desc')->get();
        return view('admins.allshows', compact('allShows'));
    }

    public function createShows()
    {
        $categories = Category::all();
        return view('admins.createshows', compact('categories'));
    }

    public function storeShows(Request $request)
    {
        // Request()->validate([

        $this->validate($request, [
            'name' => 'required|max:40',
            'image' => 'required|max:600',
            'description' => 'required|max:40',
            'type' => 'required|max:40',
            'studios' => 'required|max:40',
            'date_aired' => 'required||max:40',
            'status' => 'required|max:40',
            'genere' => 'required|max:40',
            'duration' => 'required|max:40',
            'quality' => 'required|max:40'
        ]);

        $destinationPath = 'assets/img/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);        

        $storeShows = Show::create([
            'name' => $request->name,
            'image' => $myimage,
            'description' => $request->description,
            'type' => $request->type,
            'studios' => $request->studios,
            'date_aired' => $request->date_aired,
            'status' => $request->status,
            'genere' => $request->genere,
            'duration' => $request->duration,
            'quality' => $request->quality
        ]);

        if ($storeShows) {
            return Redirect::route('shows.all')->with(['success' => 'Show created successfully']);
        }
    }

    public function deleteShows($id)
    {
        $show = Show::find($id);
        
        if (File::exists(public_path('assets/img/' . $show->image))) {
            File::delete(public_path('assets/img/' . $show->image));
            $show->delete();
        } else {
            //dd('File does not exists.');
        }
        
        if ($show) {
            return Redirect::route('shows.all')->with(['delete' => 'Show deleted successfully']);
        }
    }
}
