@extends('layouts.app')

@if (!$news)
@section('title')
{{$title='Извините, нет такой новости'}}
@endsection
@section('content')
<div class="mt-2 p-2 text-center col-6 m-auto text-dark bg-warning">
    <div class="p-3 mb-2">Извините, нет такой новости</div>
</div>
@endsection
@else
@section('title')
{{$title=$news['title']}}
@endsection
@section('content')
<div class="mt-2 p-2 text-center col-6 m-auto">
    @if ($news)
    @if (!$news['is_private'])
    <div class="card  mt-2 mx-2">
        <img src="https://s00.yaplakal.com/pics/pics_original/5/0/7/14969705.jpg" class="card-img-top" alt="панорама">
        <div class="card-body">
            <h5 class="card-title">{{$news['title']}}</h5>
            <p class="card-text">{{$news['text']}}</p>
        </div>
    </div>
    @else
    <h5>Зарегистрируйтесь для просмотра</h5>
    @endif


    @else
    <h5>Такой новости не существует</h5>
    @endif

</div>
@endsection
@endif

@section('header')
<h1 class="text-center">{{$title}}</h1>
@endsection

@section('menu')
@include('menu')
@endsection



@section('footer')
@include('footer')
@endsection