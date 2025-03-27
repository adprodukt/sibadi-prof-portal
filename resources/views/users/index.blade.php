<x-layout>
    <section class="section-main section-users"> 
        <h1 class="h1 row">Список пользователей 
            <x-forms.action-button
                method="GET"
                button="Создать"
                route="{{route('users.create')}}"
            ></x-forms.action-button>
        </h1>
        <div class="form-search">
            <x-forms.form route="{{route('users')}}" method="GET">
                <select name="status">
                    <option value="" disabled selected hidden>Выберите статус</option>
                    <option value="1">Активные</option>
                    <option value="0">Заблокированные</option>
                </select>
                <input type="text" name="search" placeholder="Найти">
                <button name="action" value="search">Найти</button>
                <button>Сброс</button>
            </x-forms.form>
        </div>
        <ul class="users-list">
            @foreach ($users as $user)
                <li>
                    <div class="list-info">
                        <h2 class="list-name">{{$user->name}} 
                            @if ($user->status)
                                <span class="green">active</span>
                            @else
                                <span class="red">inactive</span>
                            @endif
                        </h2>
                        <ul class="list-info-body">
                            <li>
                                <div>Логин:</div>
                                <div>{{$user->login}}</div>
                            </li>
                            <li>
                                <div>Email:</div>
                                <div>{{$user->email}}</div>
                            </li>
                        </ul>
                    </div>
                    <div class="list-action">
                        @php
                            $routeParameters = [
                                'id' => $user->id
                            ];
                        @endphp
                        <x-forms.action-button
                            method="GET"
                            button="Редактировать"
                            route="{{route('users.edit', $routeParameters)}}"
                        ></x-forms.action-button>
                        <x-forms.action-button
                            method="GET"
                            button="Сбросить пароль"
                            route="{{route('users.editPassword', $routeParameters)}}"
                        ></x-forms.action-button>
                        @if ($user->status)
                            <x-forms.action-button
                                type="remove"
                                method="PATCH"
                                button="Заблокировать"
                                route="{{route('users.status', $routeParameters)}}"
                            ></x-forms.action-button>
                        @else
                            <x-forms.action-button
                                type="success"
                                method="PATCH"
                                button="Разблокировать"
                                route="{{route('users.status', $routeParameters)}}"
                            ></x-forms.action-button>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</x-layout>