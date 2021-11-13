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
<div class="card" style="width: 100%;">
    <div class="card-header">
        <div class="col-sc d-flex flex-row justify-content-between ">
            <form method="get" action="{{ route('home') }}">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                <div type="button" class="input-group-text"><a class="text-white" href="{{ route('submit')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search mr-2" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></a>
                </div>
            </div>
                  <div><input type="text" name="keyword" class="form-control border" id="inlineFormInputGroup" placeholder="キーワードを入力"></div>
                    
                </div>
            </form>
            <div class="pr-2"><a href="{{ route('submit')}}"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
              </svg></a>
            </div>
        </div>
        
    </div>

    <table class="table">
        <tbody>
            @foreach ($notes as $note)
            <tr>
                <td class="left">{{$note->title}}</td>
                <td><a class="btn btn-primary" href="{{ route('submit', ['id' => $note->id])}}">編集</a></td>
                <td>
                    <form method="POST" action="home/{{ $note->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $notes->links() }}
@endsection