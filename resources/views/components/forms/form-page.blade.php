<div class="form-container">
    <h1>{{$title}}</h1>
    <x-forms.form :route="$route" :method="$method">
        {{$slot}}
        <button>{{$button}}</button>
    </x-forms.form>
</div>