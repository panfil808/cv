@extends('layouts.parent')

@section('header', $header)

@section('main')
    @if($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form enctype="multipart/form-data" method="post" action="{{route('store')}}">
        {{csrf_field()}}
        <label>ФИО
            <input type="text" name="fullName" value="{{isset($editJob) ? $editJob->editName : old('fullName')}}">
        </label>
        <label>Профессия
            <select name="staff">
                @foreach($jobs as $job)
                    <option value="{{$job->id}}"
                            @if(old('staff') == $job->id) selected @endif>
                        {{$job->staff}}
                    </option>
                @endforeach
            </select>
        </label>
        <label>Телефон
            <input type="text" name="phone" placeholder="xx-xx-xx"
                   value="{{isset($editJob) ? $editJob->editPhone : old('phone')}}">
        </label>
        <label>Стаж (лет)
            <input type="number" name="exp" min="0" value="{{isset($editJob) ? $editJob->editExp : old('exp')}}">
        </label>
        <label>
            <input type="file" name="photo" accept="image/jpeg">
        </label>
        <button type="submit">Добавить резюме</button>
    </form>
@endsection

@section('tohome')
    <li class="added"><a href="{{route('home')}}">На главную</a></li>
@endsection
