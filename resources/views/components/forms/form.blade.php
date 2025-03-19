<div class="form-container">
    <h1>{{$title}}</h1>
    <form action="{{$route}}" method="{{$method}}">
        @csrf
        {{$slot}}
        <button>{{$button}}</button>
    </form>
</div>