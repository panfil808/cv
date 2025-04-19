@extends('layouts.parent')

@section('main')
    <h1>Программист</h1>
    <div class="pinline1">
        <img class="pic" src="{{asset('img/' . $pic)}}">
    </div>

    <p class="pinline second">
    {{$name}}

    <br>
    Телефон: 
    {{$phoneNumber}}

    </p>

    <p  class="pinline third">
    {{$occupation}}
    <br>

    Стаж: 
    {{$exp}}

    </p>
@endsection