@php
    use Carbon\Carbon;
@endphp
<ul class="users-list">
    @foreach ($days as $day)
        <li>
            <div class="list-info">
                <h2 class="list-name">{{$day->title || 'asd'}} 
                    @if ($day->status)
                        <span class="green">Опубликованный</span>
                    @else
                        <span class="red">Скрытый</span>
                    @endif
                </h2>
                <ul class="list-info-body">
                    <li>
                        <div>{{Carbon::createFromFormat('Y-m-d', $day->date)->translatedFormat('d F')}} в {{$day->time}} </div>
                    </li>
                    <li>
                        <div>Направление:</div>
                        <div>{{(isset($day->directinons->direction))? $day->directinons->direction : 'Для всех'}}</div>
                    </li>
                    <li>
                        <div>Адрес:</div>
                        <div>{{$day->address}}</div>
                    </li>
                </ul>
            </div>
            <div class="list-action">
                @php
                    $routeParameters = [
                        'id' => $day->id
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
                @if ($day->status)
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