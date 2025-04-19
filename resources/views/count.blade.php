@extends('layouts.parent')

@section('header', "Общее число резюме в базе")

@section('main')
    <table>
        <th>Общее число резюме</th>
        <tr>
            <td>{{$result}}</td>
        </tr>
    </table>
@endsection

@section('tohome')
    <li class="added"><a href="{{route('home')}}">На главную</a></li>
@endsection