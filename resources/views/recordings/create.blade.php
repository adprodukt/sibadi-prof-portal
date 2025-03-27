<x-layout>
    <x-forms.form-page
        :title="$day->getTitle()"
        button="Зарегистрироваться"
        route="{{route('recordings.store', ['id' => $day->id])}}"
    >   
        <x-forms.input text="ФИО" name="name"></x-forms.input>
        <x-forms.input text="Номер телефона" name="phone"></x-forms.input>
        <x-forms.input text="Email" type="email" name="email"></x-forms.input>
        <x-forms.input text="Название учебного заведения" name="name_institution"></x-forms.input>
        <x-forms.select name="educational_institution_id" text="Уровень образования" :required="false">
            @foreach ($educational_institutions as $educational_institution)
                <option 
                    @if(old('educational_institution_id') == $educational_institution->id) selected @endif 
                    value="{{$educational_institution->id}}"
                    >
                        {{$educational_institution->educational_institution}}
                    </option>
            @endforeach
        </x-forms.select>
        <x-forms.select name="course_id" text="Класс" :required="false">
            @foreach ($courses as $course)
                <option @if(old('course_id') == $course->id) selected @endif value="{{$course->id}}">{{$course->course}}</option>
            @endforeach
        </x-forms.select>
    </x-forms.form-page>
</x-layout>