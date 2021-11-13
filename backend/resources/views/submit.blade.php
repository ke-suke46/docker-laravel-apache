@extends('layouts.app')

@section('css')
<style>
    header {
        height: 50px;
        background-color: rgb(92, 68, 2);
        color: white;
        padding-left: 20px;
        font-size: large;
    }

    .title {
        top: 10px;
        padding: 10px 7px 0px 0px;
    }

    .card {
        margin-top: 40px;
    }

    .left {
        width: 70%;
    }

    
</style>
@endsection

@section('content')
<form method="POST" action="{{ route('submit', ['id' => $note->id])}}">
    @csrf
    <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$note->title}}">
    </div>
    <div class="form-group">
        <label for="content">内容</label>
        <input type="text" class="form-control" id="content" name="content" value="{{$note->content}}">
    </div>
    <a href="{{ route('home')}}" class="btn btn-primary">戻る</a>
    <button type="submit" class="btn btn-success">追加</button>
</form>
@endsection