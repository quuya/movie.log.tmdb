@extends('layouts.app')

@section('title','トップページ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
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
                                        <input type="submit" value="詳細">
                                    </form>
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
        <div class="col-8">
            <div class="col-12 col-md-8 offset-1 offset-md 2">
                <div class="card" >
                    <div class="card-body" style="margin:10px;">
                        <h1>映画の記録アプリ</h1>
                        <form action="/movie/create" method="get">
                            <input name="title" placeholder="映画のタイトル">
                            <input type="submit" value="検索">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
