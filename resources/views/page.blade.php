@extends('layouts.parent')

@section('header', $header)

@section('main')
    <table>
        <th>ФИО</th>
        <th>Профессия</th>
        <th>Телефон</th>
        <th>Стаж</th>
        <th>Аватар</th>
        <th colspan="2">Действия</th>
        @foreach($result as $row)
            <tr>
                <td>{{$row->FIO}}</td>
                <td>{{$row->staff->staff}}</td>
                <td>{{$row->Phone}}</td>
                <td>{{$row->Stage}}</td>
                <td><img src="{{asset('img/' . $row->Image)}}">
                <td><a href="#">Редактировать</a></td>
                <td><a href="#">Удалить</a></td>
            </tr>
        @endforeach
    </table>
@endsection

@section('menupart')
    <li><a href="">Резюме по возрасту</a></li>
@endsection