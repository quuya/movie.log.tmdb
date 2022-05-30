@extends('layouts.app')

@section('title','映画詳細')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 col-md-8 offset-1 offset-md 2">
            <div class="table">
                <tr>
                    <th>タイトル</th><td>{{$selectedmovieInfo->title}}</td>
                </tr>
                <tr>
                    <th>主演</th><td>{{$selectedmovieInfo->main_character}}</td>
                </tr>
                <tr>
                    <th>副演</th><td>{{$selectedmovieInfo->sub_character}}</td>
                </tr>
                <tr>
                    <th>あらすじ</th><td><textarea>{{$selectedmovieInfo->story}}</textarea></td>
                </tr>
                <tr>
                    <th>感想</th><td><textarea>{{$selectedmovieInfo->impression}}</textarea></td>
                </tr>
                <tr>
                    <th>友達に話したいこと</th><td><textarea>{{$selectedmovieInfo->talk_point}}</textarea></td>
                </tr>
            </div>
        </div>
    </div>
</div>
@endsection
