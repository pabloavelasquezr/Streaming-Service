<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Models\Show\Show;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function animeDetails($id)
    {
        $show = Show::find($id);

        $randomShows = Show::select()->orderBy('id', 'desc')->take(5)
            ->where('id', '!=', $id)
            ->get();
        
        $comments = Comment::select()->orderBy('id', 'desc')->take(8)
            ->where('show_id', $id)
            ->get();

        return view('shows.anime-details', compact('show', 'randomShows', 'comments'));
    }
}
