<x-layout>
    <x-forms.form-page
        title="Создание дня открытых дверей"
        button="Создавть"
        route="{{route('days.store')}}"
    >   
        <x-forms.input text="Заголовок" name="title" :required="false"></x-forms.input>
        <x-forms.input text="Время" name="time" type="time"></x-forms.input>
        <x-forms.input text="Дата" name="date" type="date"></x-forms.input>
        <x-forms.input text="Адрес" name="address"></x-forms.input>
        <x-forms.textarea text="Описание" name="description"></x-forms.textarea>
        <x-forms.select name="direction_id" text="Напраеление/Институт" :required="false">
            <option value="">Для всех</option>
            @foreach ($directions as $direction)
                <option @if(old('direction_id') == $direction->id) selected @endif value="{{$direction->id}}">{{$direction->direction}}</option>
            @endforeach
        </x-forms.select>
    </x-forms.form-page>
</x-layout>