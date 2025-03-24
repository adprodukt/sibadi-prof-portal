@php
    use Carbon\Carbon;
@endphp
<x-layout>
    <section class="section-main section-users"> 
        <h1 class="h1 row">Дни открытых дверей 

            @if (isset($USER) && !isset($moderator))
                <x-forms.action-button
                    method="GET"
                    button="Панель управления"
                    route="{{route('days.index')}}"
                ></x-forms.action-button>
            @elseif (isset($moderator))
                <x-forms.action-button
                    method="GET"
                    button="Добавить"
                    route="{{route('days.create')}}"
                ></x-forms.action-button>
           @endif
        </h1>
        @if (isset($moderator))
            <div class="form-search">
                <x-forms.form route="{{route('days.index')}}" method="GET">
                    <x-forms.select name="status" :required="false">
                        <option value="" disabled selected hidden>Выберите статус</option>
                        <option value="1">Опубликованные</option>
                        <option value="0">Скрытые</option>
                        <option value="-">Прошедшие</option>
                    </x-forms.select>
                    <x-forms.input type="text" name="search" placeholder="Найти" :required="false"></x-forms.input>
                    <x-forms.input type="date" name="date" :required="false"></x-forms.input>
                    <button name="action" value="search">Найти</button>
                    <button>Сброс</button>
                </x-forms.form>
            </div>
        @endif
       
        <ul class="users-list">
            @if ($days->count() == 0 )
                <li>
                    <div class="list-info">
                        <h2 class="list-name">{{(isset($moderator))? 'Результатов нет' : "В ближайшее время дней дней открытых дверей не будет"}}</h2>
                    </div>
                </li>
            @endif
            @foreach ($days as $day)
            @php
                $boolDate = Carbon::parse($day->date)->isFuture() || Carbon::parse($day->date)->isToday();
            @endphp
                <li>
                    <div class="list-info">
                        <h2 class="list-name">{{$day->title ?? 'asd'}} 
                            @if (isset($moderator))
                                @if ($boolDate)
                                    @if ($day->status)
                                        <span class="green">Опубликованный</span>
                                    @else
                                        <span class="red">Скрытый</span>
                                    @endif
                                @else
                                    <span class="red">Прошедший</span>
                                @endif
                            @else
                                <span class="green">Обязательная регистрация</span>
                            @endif
                            
                            
                        </h2>
                        <ul class="list-info-body">
                            <li>
                                <div>{{Carbon::createFromFormat('Y-m-d', $day->date)->translatedFormat('d F')}} в {{$day->time}} </div>
                            </li>
                            <li>
                                <div>Направление:</div>
                                
                                <div>{{(isset($day->direction_id))? $day->direction->direction : 'Для всех'}}</div>
                            </li>
                            <li>
                                <div>Адрес:</div>
                                <div>{{$day->address}}</div>
                            </li>
                            <li class="column">
                                <div>Что вас ждет:</div>
                                <div>{{$day->description}}</div>
                            </li>
                        </ul>
                    </div>
                    <div class="list-action">
                        @php
                            $routeParameters = [
                                'id' => $day->id
                            ];
                        @endphp
                        @if(isset($moderator))
                            @if ($boolDate)
                                <x-forms.action-button
                                    method="GET"
                                    button="Редактировать"
                                    route="{{route('days.edit', $routeParameters)}}"
                                ></x-forms.action-button>
                                @if ($day->status)
                                    <x-forms.action-button
                                        type="remove"
                                        method="PATCH"
                                        button="Скрыть"
                                        route="{{route('days.status', $routeParameters)}}"
                                    ></x-forms.action-button>
                                @else
                                    <x-forms.action-button
                                        type="success"
                                        method="PATCH"
                                        button="Опубликовать"
                                        route="{{route('days.status', $routeParameters)}}"
                                    ></x-forms.action-button>
                                    <x-forms.action-button
                                        type="remove"
                                        method="DELETE"
                                        button="Удалить"
                                        route="{{route('days.delete', $routeParameters)}}"
                                    ></x-forms.action-button>
                                @endif
                            @endif
                        @else
                            <x-forms.action-button
                                method="GET"
                                button="Зарегистрироваться"
                                route="{{route('days.edit', $routeParameters)}}"
                            ></x-forms.action-button>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>

    </section>
    
   
</x-layout>