@extends('layouts.app')

@section('title','編集ページ')

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
                    <div class="card-header">タイトル      {{$selectedMovieInfo->movie_title}}</div>
                    <div class="card-body">
                        <table class="table">
                            <form action="movie/edit/{{$selectedMovieInfo->id}}" method="post">@csrf
                                <tr>
                                    <th>主演</th>
                                    <td>
                                    {{$selectedMovieInfo->main_character}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>助演</th>
                                    <td>
                                        {{$selectedMovieInfo->sub_character}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>あらすじ</th>
                                    <td>
                                        <textarea name="story" value="{{$selectedMovieInfo->story}}" cols='60' rows='5'>{{$selectedMovieInfo->story}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>感想</th>
                                    <td>
                                        <textarea name="impression" cols='60' rows='6' value="{{$selectedMovieInfo->impression}}">{{$selectedMovieInfo->impression}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Point</th>
                                    <td>
                                        <textarea name="talk_point" cols='60' rows='6' value="{{$selectedMovieInfo->talk_point}}">{{$selectedMovieInfo->talk_point}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th><input type="submit" value="更新"></th>

                                </tr>
                            </form>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



