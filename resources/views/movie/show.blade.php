@extends('layouts.app')

@section('title','映画詳細')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            {{-- ここにmovieHeaderの一覧 --}}
            {{-- @foreach($movies as $movieInfo) --}}
            <div class="card">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>title</th>
                            <th>content</th>
                            <th></th>
                        </tr>
                        @foreach ($movies as $movie)
                            <tr>
                                <th>{{$movie->movie_title}}</th>
                                <th>{{$movie->main_character}}<br>
                                    @if($movie->sub_character)
                                    {{$movie->sub_character}}
                                    @endif</th>
                                <th><form action="/movie/show/{{$movie->id}}" method='get'>
                                    @csrf
                                    <input type="submit" value="詳細"></form>
                                    <form action="/movie/edit/{{$movie->id}}" method='get'>
                                        @csrf
                                        <input type="submit" value="編集">
                                    </form>
                                    <form action="/movie/delete/{{$movie->id}}" method='post'>
                                        @csrf
                                        <input type="submit" value="削除">
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- @endforeach --}}
        </div>
        <div class="col-9">
            <div class="col-12 col-md-8 offset-1 offset-md 2">
                <div class="card">
                    <div class="card-header">
                        映画の記録アプリ
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>タイトル</th><td>{{$selectedMovieInfo->movie_title}}</td>
                            </tr>
                            <tr>
                                <th>主演</th><td>{{$selectedMovieInfo->main_character}}</td>
                            </tr>
                            <tr>
                                <th>助演</th><td>{{$selectedMovieInfo->sub_character}}</td>
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
    </div>
</div>
@endsection
