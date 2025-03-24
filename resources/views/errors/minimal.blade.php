<x-layout>
    <x-slot:title>
        @yield('title')
    </x-slot>
    <section class="error-section">
        <h1>@yield('code')</h1>
        <div class="">
            @yield('message')
        </div>
        <div>
            Воспользуйтесь навигационным меню или вернитесь на <a style="text-decoration: underline" href="{{route('page.index')}}">главную страницу</a>
        </div>
    </section>
</x-layout>
