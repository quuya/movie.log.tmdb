@extends('layouts.app')

@section('title','映画詳細')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 col-md-8 offset-1 offset-md 2">
            <div class="card">
                <table class="table">
                    <tr>
                        <th>タイトル</th><td>{{$selectedMovieInfo->movie_title}}</td>
                    </tr>
                    <tr>
                        <th>主演</th><td>{{$selectedMovieInfo->main_character}}</td>
                    </tr>
                    <tr>
                        <th>副演</th><td>{{$selectedMovieInfo->sub_character}}</td>
                    </tr>
                    <tr>
                        <th>あらすじ</th><td><textarea cols='60' rows='5'>{{$selectedMovieInfo->story}}</textarea></td>
                    </tr>
                    <tr>
                        <th>感想</th><td><textarea cols='60' rows='6'>{{$selectedMovieInfo->impression}}</textarea></td>
                    </tr>
                    <tr>
                        <th>友達に話したいこと</th><td><textarea cols='60' rows='6'>{{$selectedMovieInfo->talk_point}}</textarea></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
