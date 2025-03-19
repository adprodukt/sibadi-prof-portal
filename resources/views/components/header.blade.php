<header>
    <div class="logo">
        <a href="https://sibadi.org/" target="_blank">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Лого">
        </a>
    </div>
    <div class="menu">
        <nav class="main-menu">
            <ul>
                <li><a href="{{route('page.index')}}">Дни открытых дверей</a></li>  
                @if (isset($USER))  
                    @if($USER->role === 1)
                        <li><a href="{{route('users')}}">Пользователи</a></li> 
                    @endif        
                        <li><a href="{{route('profile')}}">Профиль</a></li> 
                @endif
            </ul>
        </nav>
        <div class="user-menu">
            @if (!isset($USER))
                <span>
                    <a href="{{route('page.login')}}">Войти</a>
                </span>                
            @else
                <span>
                    <a href="{{route('logout')}}">Выход</a>
                </span> 
            @endif
            
        </div>
    </div>
   
</header>