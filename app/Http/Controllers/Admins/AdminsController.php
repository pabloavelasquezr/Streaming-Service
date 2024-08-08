<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Admin;
use App\Models\Category\Category;
use App\Models\Episode\Episode;
use App\Models\Show\Show;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use App\Models\Comment\Comment;
use App\Models\Following\Following;

class AdminsController extends Controller
{
    // assets path image
    private $assetsImgPath = 'assets/img/';
    //private $assetsImgPath = '../../assets/img/';

    private $assetsThumbnailsPath = 'assets/thumbnails/';
    //private $assetsThumbnailsPath = '../../assets/thumbnails/';

    private $assetsVideosPath = 'assets/videos/';
    //private $assetsVideosPath = '../../assets/videos/';


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
        // error message
        return back()->withInput($request->only('email', 'remember_me'))->withErrors(['email' => 'Invalid email or password']);
    }

    // logout
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
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
        $allShows = Show::select('shows.id', 'shows.name', 'shows.image', 'shows.type', 'shows.date_aired', 'shows.status', 'shows.genere', 'shows.created_at')
        ->leftjoin('followings', 'shows.id', '=', 'followings.show_id')
        ->leftjoin('comments', 'shows.id', '=', 'comments.show_id')
        ->leftjoin('episodes', 'shows.id', '=', 'episodes.show_id')
        ->groupBy('shows.id', 'shows.name', 'shows.image', 'shows.type', 'shows.date_aired', 'shows.status', 'shows.genere', 'shows.created_at')
        ->selectRaw('count(distinct followings.id) as followings')
        ->selectRaw('count(distinct comments.id) as comments')
        ->selectRaw('count(distinct episodes.id) as episodes')
        ->orderBy('shows.id', 'desc')->get();
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
            'description' => 'required|max:600',
            'type' => 'required|max:40',
            'studios' => 'required|max:40',
            'date_aired' => 'required||max:40',
            'status' => 'required|max:40',
            'genere' => 'required|max:40',
            'duration' => 'required|max:40',
            'quality' => 'required|max:40'
        ]);

        $destinationPath = $this->assetsImgPath;
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


    //editshows
    public function editShows($id)
    {
        $show = Show::find($id);
        $categories = Category::all();
        return view('admins.editshows', compact('show', 'categories'));
    }

    public function updateShows(Request $request, $id)
    {
        $show = Show::find($id);
        $show->name = $request->name;
        $show->description = $request->description;
        $show->type = $request->type;
        $show->studios = $request->studios;
        $show->date_aired = $request->date_aired;
        $show->status = $request->status;
        $show->genere = $request->genere;
        $show->duration = $request->duration;
        $show->quality = $request->quality;

        if ($request->hasFile('image')) {
            $destinationPath = $this->assetsImgPath;
            $myimage = $request->image->getClientOriginalName();
            $request->image->move(public_path($destinationPath), $myimage);
            $show->image = $myimage;
        }

        $show->save();

        if ($show) {
            return Redirect::route('shows.all')->with(['success' => 'Show updated successfully']);
        }
    }

    public function deleteShows($id)
    {
        $show = Show::find($id);
        
        if (File::exists(public_path($this->assetsImgPath . $show->image))) {
            File::delete(public_path($this->assetsImgPath . $show->image));
            $show->delete();
        } else {
            //dd('File does not exists.');
        }
        
        if ($show) {
            return Redirect::route('shows.all')->with(['delete' => 'Show deleted successfully']);
        }
    }


    public function allCategories()
    {
        $allCategories = Category::select('categories.id', 'categories.name')
        ->leftjoin('shows', 'shows.genere', '=', 'categories.name')
        ->groupBy('categories.id', 'categories.name')
        ->selectRaw('count(shows.genere) as shows')
        ->orderBy('categories.id', 'desc')
        ->get();
        return view('admins.allcategories', compact('allCategories'));
    }

    public function createCategories()
    {
        return view('admins.createcategories');
    }

    public function storeCategories(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:40',
        ]);
        $storeCategories = Category::create([
            'name' => $request->name,
        ]);

        if ($storeCategories) {
            return Redirect::route('categories.all')->with(['success' => 'Category created successfully']);
        }
    }

    public function deleteCategories($id)
    {
        $category = Category::find($id);
        $category->delete();
        if ($category) {
            return Redirect::route('categories.all')->with(['delete' => 'Category deleted successfully']);
        }
    }

    public function allEpisodes()
    {
        // $allEpisodes = Episode::select()->orderBy('id', 'desc')->get();
        // return view('admins.allepisodes', compact('allEpisodes'));


        $allEpisodes = Episode::select('episodes.*', 'shows.name as show_name')
        ->join('shows', 'episodes.show_id', '=', 'shows.id')
        ->orderBy('episodes.id', 'desc')
        ->get();

        return view('admins.allepisodes', compact('allEpisodes'));
    }

    public function createEpisodes()
    {
        $shows = Show::all();
        return view('admins.createepisodes', compact('shows'));
    }

    public function storeEpisodes(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:40',
            'thumbnail' => 'required|max:600',
            'video' => 'required',
            'show_id' => 'required|max:40',
        ]);

        $destinationPath = $this->assetsThumbnailsPath;
        $myimage = $request->thumbnail->getClientOriginalName();
        $request->thumbnail->move(public_path($destinationPath), $myimage);

        $destinationPathVideo = $this->assetsVideosPath;
        $myvideo = $request->video->getClientOriginalName();
        $request->video->move(public_path($destinationPathVideo), $myvideo);

        $storeEpisodes = Episode::create([
            'episode_name' => $request->name,
            'thumbnail' => $myimage,
            'video' => $myvideo,
            'show_id' => $request->show_id,
        ]);

        if ($storeEpisodes) {
            return Redirect::route('episodes.all')->with(['success' => 'Episode created successfully']);
        }
    }
    // edit episodes
    public function editEpisodes($id)
    {
        $episode = Episode::find($id);
        $shows = Show::all();
        return view('admins.editepisodes', compact('episode', 'shows'));
    }
    // update episodes
    public function updateEpisodes(Request $request, $id)
    {
        $episode = Episode::find($id);
        $episode->episode_name = $request->name;
        $episode->show_id = $request->show_id;

        if ($request->hasFile('thumbnail')) {
            $destinationPath = $this->assetsThumbnailsPath;
            $myimage = $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path($destinationPath), $myimage);
            $episode->thumbnail = $myimage;
        }

        if ($request->hasFile('video')) {
            $destinationPathVideo = $this->assetsVideosPath;
            $myvideo = $request->video->getClientOriginalName();
            $request->video->move(public_path($destinationPathVideo), $myvideo);
            $episode->video = $myvideo;
        }

        $episode->save();

        if ($episode) {
            return Redirect::route('episodes.all')->with(['success' => 'Episode updated successfully']);
        }
    }
    // delete episodes
    public function deleteEpisodes($id)
    {
        $episode = Episode::find($id);
        
        if (File::exists(public_path($this->assetsThumbnailsPath . $episode->thumbnail)) && File::exists(public_path($this->assetsVideosPath . $episode->video))) {
            File::delete(public_path($this->assetsThumbnailsPath . $episode->thumbnail));
            File::delete(public_path($this->assetsVideosPath . $episode->video));
            $episode->delete();
        } else {
            //dd('File does not exists.');
        }
        
        if ($episode) {
            return Redirect::route('episodes.all')->with(['delete' => 'Episode deleted successfully']);
        }
    }

    // allUsers
    public function allUsers()
    {
        $allUsers = User::select('users.id','users.name', 'users.email', 'users.image')
        ->leftjoin('comments', 'comments.user_name', '=', 'users.name')
        ->leftjoin('followings', 'followings.user_id', '=', 'users.id')
        ->groupBy('users.id', 'users.name', 'users.email', 'users.image')
        ->selectRaw('count(distinct comments.id) as comments')
        ->selectRaw('count(distinct followings.id) as followings')
        ->orderBy('users.id', 'desc')
        ->get();
        return view('admins.allusers', compact('allUsers'));
    }

    // allFollowings
    public function allFollowings()
    {
        $allFollowings = Following::select('followings.*', 'users.name')
        ->leftjoin('users', 'users.id', '=', 'followings.user_id')
        ->orderBy('followings.id', 'desc')
        ->get();
        return view('admins.allfollowings', compact('allFollowings'));
    }

    // allComments
    public function allComments()
    {
        $allComments = Comment::select('comments.*', 'shows.name as show_name')
        ->leftjoin('shows', 'shows.id', '=', 'comments.show_id')
        ->orderBy('comments.id', 'desc')
        ->get();
        return view('admins.allcomments', compact('allComments'));
    }
}
