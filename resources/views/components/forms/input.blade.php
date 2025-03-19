<div class="input-block">
    <label for="{{$name}}">{{$text}}</label>
    <input id="{{$name}}" type="{{$type}}" name="{{$name}}" value="{{$value}}" {{$required? "required" : '' }}>
    @error($name)
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
</div>