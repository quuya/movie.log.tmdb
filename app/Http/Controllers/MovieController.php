<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $movies = Movie::all();
        $searchMovieTitle = $request->title;
        return view('movie.index',['movies'=>$movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $movies = Movie::all();

        // ここでapiでmovieInfoを取ってきたい
        $movie_title = $request->title;
        $movieDefaultInfo = Http::get('https://api.themoviedb.org/3/search/movie?api_key=9509519374a4c7f4f07a6e58e1a7ec68&language=ja-JA&query='.$movie_title.'&page=1&include_adult=false&offset=0');
        $movieDefaultInfo = mb_convert_encoding($movieDefaultInfo,"UTF-8");
        $movieDefaultInfo = $movieDefaultInfo["results"][0];
        return view('movie.create',['movies'=>$movies,'movieDefaultInfo'=>$movieDefaultInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $id = Auth::id();
        $movieInfo = new Movie;
        $movieInfo->user_id = $id;
        $movieInfo->movie_title = $request->movie_title;
        $movieInfo->main_character = $request->main_character;
        $movieInfo->sub_character = $request->sub_character;
        $movieInfo->story = $request->story;
        $movieInfo->impression = $request->impression;
        $movieInfo->talk_point = $request->talk_point;
        $movieInfo->save();
        return redirect('movie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie,$id)
    {
        $movies = Movie::all();
        $selectedMovieInfo = Movie::where('id',$id)->first();
        return view('movie.show',['selectedMovieInfo'=>$selectedMovieInfo,'movies'=>$movies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movies = Movie::all();
        $selectedMovieInfo = Movie::findOrFail($id);
        return view('movie.edit',['selectedMovieInfo'=>$selectedMovieInfo,'movies'=>$movies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $editedMovieInfo = Movie::findOrFail($id);
        $editedMovieInfo->impression = $request->impression;
        $editedMovieInfo->story = $request->story;
        $editedMovieInfo->talk_point = $request->talk_point;
        $editedMovieInfo->save();
        return redirect('movie.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function delete(Movie $movie,$id)
    {
        Movie::findOrFail($id)->delete();
        return redirect('movie');
    }
}
