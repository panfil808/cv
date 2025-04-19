<html>
    <head>
        <link rel=stylesheet href="{{asset('css/style.css')}}" type='text/css'>
        <title>@yield('header', "Резюме специалиста")</title>
    </head>
    <body>
        <div class="header">
            @yield('header', "Резюме специалиста")
            <div id="logo"></div>
        </div>

        <div class="leftcol">
            @yield('main')
        </div>

        <div class="rightcol">
            <ul class="menu">
                <li class="new"><a href="{{route('create')}}">Добавить резюме</a></li>
                <li><a href="">Вакансии</a></li>
                <li><a href="">Резюме по профессиям</a></li>
                @yield('menupart')
                <li><a href="">Избранное резюме</a></li>
                <li class="added"><a href="{{route('between')}}">Фамилии людей, имеющих стаж от 5 до 15 лет</a></li>
                <li class="added"><a href="{{route('prog')}}">Фамилии и стаж людей с профессией Программист</a></li>
                <li class="added"><a href="{{route('count')}}">Общее число резюме в базе</a></li>
                <li class="added"><a href="{{route('job')}}">Профессии, представители которых имеются в резюме</a></li>
                @yield('tohome')
            </ul>
        </div>
        <div class="footer">&copy; Copyright {{date('Y')}}</div>
    </body>
</html>