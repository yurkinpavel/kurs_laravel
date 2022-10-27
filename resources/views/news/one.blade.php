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

@section('link')
@if($news['link'])
<p class="text-center"><a href="{{$news['link']}}" target="_blank">Новость в источнике</a></p>
@endif
@endsection



@section('content')
<div class="mt-2 p-2 col-6 m-auto">
    @if ($news)
    @if (!$news['is_private'])
    <div class="card  mt-2 mx-2">
        <img src="/storage/{{$news['image']}}" class="card-img-top" alt="{{$news['title']}}">
        <div class="card-body">
            <h5 class="card-title  text-center ">{{$news['title']}}</h5>
            <p class="card-text">{!!$news['text']!!}</p>
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
@include('components.menu')
@endsection

@section('footer')
@include('components.footer')
@endsection