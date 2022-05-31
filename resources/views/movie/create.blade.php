@extends('layouts.app')

@section('title','記録ページ')

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
            <div class="col-12 col-md-10 offset-1 offset-md 2">
                <form action='/movie/create' method='post'>
                @csrf
                <div class="card">
                    <h3>タイトル</h3>
                    <input name='movie_title' >
                    <h3>主演</h3>
                    <input name='main_character' >
                    <h3>助演</h3>
                    <input name='sub_character'>
                    <h3>あらすじ</h3>
                    <textarea name='story' cols='60' rows='6'></textarea>
                    <h3>感想</h3>
                    <textarea name='impression' cols='60' rows='6'></textarea>
                    <h3>友達に話したいこと</h3>
                    <textarea name='talk_point' cols='60' rows='6'></textarea>
                    <input type='submit' value='記録する'>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
