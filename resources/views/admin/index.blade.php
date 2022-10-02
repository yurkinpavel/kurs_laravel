 @extends('layouts.main')

 @php
 $title='Админка'
 @endphp

 @section('title')
 {{$title}}
 @endsection

 @section('header')
 <h1 class="display-4 text-center">{{$title}}</h1>
 @endsection


 @section('menu')
 @include('admin.menu')
 @endsection

 @section('content')
 <div class="mt-2 p-2 col-6 text-center m-auto">
     <div class="card mt-2 mx-2">
         <div class="card-body">
             <h5 class="card-title">{{$title}}</h5>
             <p class="card-text">Настройки и вкладки админки</p>

         </div>
     </div>
 </div>
 @endsection

 @section('footer')
 @include('footer')
 @endsection