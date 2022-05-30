@extends('layouts.app')

@section('title','トップページ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            {{-- ここにmovieHeaderの一覧 --}}
            {{-- @foreach($movies as $movieInfo) --}}
            <div class="card">
                <div class="table">
                    <tbody>
                        <tr>
                            <th>title</th>
                            <th>content</th>
                            {{-- <th>{{$movieInfo->title}}</th>
                            <td>{{$movieInfo->main_character}}</td> --}}
                        </tr>
                        @foreach ($movies as $movie)
                            <tr>
                                <td>{{$movie->movie_title}}</td>
                                <td>{{$movie->main_character}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </div>
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
