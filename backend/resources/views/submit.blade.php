@extends('layouts.app')

@section('css')
<style>
    header {
        height: 50px;
        background-color: rgb(92, 68, 2);
        padding-left: 20px;
        font-size: large;
        color: rgb(255, 251, 251);
    }

    .title {
        position: absolute;
        top: 10px;
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
<form method="POST" action="{{ route('submit', ['id' => $memo->id])}}">
    @csrf
    <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$memo->title}}">
    </div>
    <div class="form-group">
        <label for="content">内容</label>
        <input type="text" class="form-control" id="content" name="content" value="{{$memo->content}}">
    </div>
    <a href="{{ route('home')}}" class="btn btn-primary">戻る</a>
    <button type="submit" class="btn btn-success">追加</button>
</form>
@endsection