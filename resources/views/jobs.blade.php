@extends('layouts.parent')

@section('header', "Профессии, представители которых имеются в резюме")

@section('main')
    <table>
        <th>Профессия</th>
        @foreach($result as $row)
            <tr>
                <td>{{$row->staff}}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('tohome')
    <li class="added"><a href="{{route('home')}}">На главную</a></li>
@endsection