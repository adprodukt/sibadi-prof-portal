<div class="input-block">
    <label class="@error($name) red @enderror" for="{{$name}}">{{$text}}@if ($required)*@endif</label>
    <input class="@error($name) error @enderror" id="{{$name}}" type="{{$type}}" name="{{$name}}" value="{{old($name) ?? $value}}" {{$required? "required" : '' }}>
    @error($name)
        <span class="alert alert-danger red">{{ $message }}</span>
    @enderror
</div>