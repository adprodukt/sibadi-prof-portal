<div class="input-block">
    @if ($text != '')
        <label class="@error($name) red @enderror" for="{{$name}}">{{$text}}@if ($required)*@endif</label>
    @endif
    <textarea class="@error($name) error @enderror" name="{{$name}}" id="{{$name}}" {{$required? "required" : '' }}>{{old($name) ?? $value}}</textarea>
    @error($name)
        <span class="alert alert-danger red">{{ $message }}</span>
    @enderror
</div>