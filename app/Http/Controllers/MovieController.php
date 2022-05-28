<?php

namespace App\Http\Controllers;

use App\Models\movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = movie::all();
        return view('movie',['movies'=>$movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ここでapiでmovieInfoを取ってきたい
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $movieInfo = new movie;
        $movieInfo->user_id = $id;
        $movieInfo->movie_title = $request->movie_title;
        $movieInfo->main_character = $request->main_character;
        $movieInfo->sub_character = $request->sub_character;
        $movieInfo->story = $request->story;
        $movieInfo->impression = $request->impression;
        $movieInfo->talk_point = $request->talk_point;
        $movieInfo->save();
        return redirect('movie.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(movie $movie,$id)
    {
        $selectedMovieInfo = movie::where('id',$id)->first();
        return view('movie.show',['selectedMovieInfo'=>$selectedMovieInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedMovieInfo = movie::findOrFail($id);
        return view('movie.edit',['selectedMovieInfo'=>$selectedMovieInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movie $movie)
    {
        $movie = movie::findOrFail($id);
        $movie->story = $request->story;
        $movie->impression = $request->impression;
        $movie->talk_point = $request->talk_point;
        $movie->save();
        return redirect('movie.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(movie $movie,$id)
    {
        movie::fidOrFail($id)->delete();
        return redirect('movie');
    }
}
