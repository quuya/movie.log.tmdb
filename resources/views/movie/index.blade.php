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
                                <th>{{$movie->main_character}}</th>
                                <th><form action="/movie/show/{{$movie->id}}" method='get'>
                                    @csrf
                                    <input type="submit" value="more"></form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- @endforeach --}}
        </div>
        <div class="col-8">
            <div class="col-10 col-md-8 offset-1 offset-md 2">
                <div class="card">
                    映画の記録アプリ
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
