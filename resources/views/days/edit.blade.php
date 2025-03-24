<x-layout>
    <x-forms.form-page
        title="Рекатирование дня открытых дверей"
        button="Обновить"
        route="{{route('days.update', ['id'=> $day->id])}}"
        method="put"
    >   
        <x-forms.input text="Заголовок" name="title" :required="false" value="{{$day->title}}"></x-forms.input>
        <x-forms.input text="Время" name="time" type="time" value="{{$day->time}}"></x-forms.input>
        <x-forms.input text="Дата" name="date" type="date" value="{{$day->date}}"></x-forms.input>
        <x-forms.input text="Адрес" name="address" value="{{$day->address}}"></x-forms.input>
        <x-forms.textarea text="Описание" name="description" value="{{$day->description}}"></x-forms.textarea>
        <x-forms.select name="direction_id" text="Напраеление/Институт" :required="false">
            <option value="">Для всех</option>
            @foreach ($directions as $direction)
                <option @if(old('direction_id') == $direction->id || $direction->id == $day->direction_id) selected @endif value="{{$direction->id}}">{{$direction->direction}}</option>
            @endforeach
        </x-forms.select>
    </x-forms.form-page>
</x-layout>