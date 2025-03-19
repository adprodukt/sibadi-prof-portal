<form action="{{$route}}" method="{{($method == 'GET')? 'GET' : 'POST'}}">
    @if ($method !== 'GET')
        @csrf
        @method($method)
    @endif
    {{$slot}}
</form>