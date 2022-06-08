<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function getAllPost(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        return $response->json();
    }

    public function getPostById($id){
        $post = Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);
        return $post->json();
    }

    // public static function getMovieInfo(Request $request){
    //     $movie_title = $request->title;
    //     $movieInfo = Http::get('https://api.themoviedb.org/3/search/movie?api_key=9509519374a4c7f4f07a6e58e1a7ec68&language=ja-JA&query='.$movie_title.'&page=1&include_adult=false');
    //     $movieInfo = mb_convert_encoding($movieInfo,"UTF-8");
    //     return $movieInfo;
    // }
}
