<x-layout>
    <x-forms.form-page
        title="Редактирование пользователя"
        button="Обновить"
        method="PUT"
        route="{{route('users.update', ['id' => $user->id])}}"
    >
        <x-forms.input text="Логин" name="login" :value="$user->login"></x-forms.input>
        <x-forms.input text="Email" name="email" type="email" :value="$user->email"></x-forms.input>
        <x-forms.input text="ФИО" name="name" :value="$user->name"></x-forms.input>
    </x-forms.form-page>
</x-layout>