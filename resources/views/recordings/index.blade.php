<x-layout>
    <section class="section-main section-users"> 
        <h1 class="h1 row">Зарегистрированные участники
        </h1>
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
       
        <ul class="users-list">
            @if ($recordings->count() == 0 )
                <li>
                    <div class="list-info">
                        <h2 class="list-name">{{'Результатов нет'}}</h2>
                    </div>
                </li>
            @endif
            @foreach ($recordings as $recording)
                <li>
                    <div class="list-info">
                        <h2 class="list-name">{{$recording->name}}</h2>
                        <ul class="list-info-body">
                            <li>
                                <div>Email:</div>
                                <div>{{$recording->email}}</div>
                            </li>
                            <li>
                                <div>Номер телефона:</div>
                                <div>{{$recording->phone}}</div>
                            </li>
                            <li>
                                <div>Название учебного заведения:</div>
                                <div>{{$recording->name_institution}}</div>
                            </li>
                            <li>
                                <div>Уровень образовательной организации:</div>
                                <div>{{$recording->educational_institution->educational_institution}}</div>
                            </li>
                            <li>
                                <div>Класс:</div>
                                <div>{{$recording->course->course}}</div>
                            </li>
                        </ul>
                    </div>
                    <div class="list-action">
                        
                    </div>
                </li>
            @endforeach
        </ul>

    </section>
    
   
</x-layout>