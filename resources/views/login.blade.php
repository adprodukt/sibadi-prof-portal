<x-layout>
    <x-forms.form
        title="Форма авторизации"
        button="Авторизоваться"
        route="{{route('login')}}"
    >
        <x-forms.input text="Логин" name="login"></x-forms.input>
        <x-forms.input text="Пароль" name="password" type="password"></x-forms.input>
    </x-forms.form>
</x-layout>