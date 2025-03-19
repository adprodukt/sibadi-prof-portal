<x-forms.form :route="$route" :method="$method">
    {{$slot}}
    @switch($type)
        @case("success")
            <button class="success-but">{{$button}}</button>
            @break
        @case("remove")
            <button class="remove-but"">{{$button}}</button>
            @break
        @default
            <button>{{$button}}</button>
    @endswitch
    
</x-forms.form>
