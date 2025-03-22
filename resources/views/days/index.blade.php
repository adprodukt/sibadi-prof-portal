<x-layout>
    <section class="section-main section-users"> 
        <div class="form-search">
        
        </div>
    </section>
    @if (isset($USER))
        <x-forms.action-button
            method="GET"
            button="Панель управления"
            route="{{route('days.index')}}"
        ></x-forms.action-button>
    @endif
   
</x-layout>