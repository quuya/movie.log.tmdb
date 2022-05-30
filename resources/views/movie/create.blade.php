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
                            <td>content</td>
                            {{-- <th>{{$movieInfo->title}}</th>
                            <td>{{$movieInfo->main_character}}</td> --}}
                        </tr>
                    </tbody>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
        <div class="col-8">
            <div class="col-10 col-md-8 offset-1 offset-md 2">
                <form action='/movie/create' method='post'>
                @csrf
                <div class="card">
                    <input name='movie_title' value='titleを入力'>
                    <input name='main_character' value='主演'>
                    <input name='sub_character' value='副演'>
                    <h3>あらすじ</h3>
                    <textarea name='story'></textarea>
                    <h3>感想</h3>
                    <textarea name='impression'></textarea>
                    <h3>友達に話したいこと</h3>
                    <textarea name='talk_point'></textarea>
                    <input type='submit' value='記録する'>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
