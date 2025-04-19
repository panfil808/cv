@extends('layouts.parent')

@section('header', $header)

@section('main')
    <table>
        <th>ФИО</th>
        <th>Стаж</th>
        @foreach($result as $row)
            <tr>
                <td>{{$row->FIO}}</td>
                <td>{{$row->Stage}}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('tohome')
    <li class="added"><a href="{{route('home')}}">На главную</a></li>
@endsection