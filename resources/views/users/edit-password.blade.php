<x-layout>
    <x-forms.form-page
        title="Редактирование пользователя"
        button="Обновить"
        method="PATCH"
        route="{{route('users.updatePassword', ['id' => $id])}}"
    >
        <x-forms.input text="Новый пароль" name="password" type="password"></x-forms.input>
    </x-forms.form-page>
</x-layout>