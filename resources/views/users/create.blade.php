<x-layout>
    <x-forms.form-page
        title="Регистраци пользователя"
        button="Зарегистрировать"
        route="{{route('users.store')}}"
    >
        <x-forms.input text="Логин" name="login"></x-forms.input>
        <x-forms.input text="Пароль" name="password" type="password"></x-forms.input>
        <x-forms.input text="Email" name="email" type="email"></x-forms.input>
        <x-forms.input text="ФИО" name="name"></x-forms.input>
    </x-forms.form-page>
</x-layout>