<x-layout>
    <section class="section-main section-users"> 
        <h1 class="h1 row">Дни открытых дверей 

            @if (isset($USER) && !isset($moderator))
                <x-forms.action-button
                    method="GET"
                    button="Панель управления"
                    route="{{route('days.index')}}"
                ></x-forms.action-button>
            @elseif (isset($moderator))
                <x-forms.action-button
                    method="GET"
                    button="Добавить"
                    route="{{route('days.create')}}"
                ></x-forms.action-button>
           @endif
        </h1>
        @if (isset($moderator))
            <x-days.list :days="$days"></x-days.list>
        @endif
    </section>
    
   
</x-layout>