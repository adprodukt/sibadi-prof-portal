<div class="input-block">
    @if ($text != '')
        <label class="@error($name) red @enderror" for="{{$name}}">{{$text}}@if ($required)*@endif</label>
    @endif
    
    <input 
        class="@error($name) error @enderror" 
        id="{{$name}}" 
        type="{{$type}}" 
        name="{{$name}}" 
        value="{{old($name) ?? $value}}" {{$required? "required" : '' }} 
        placeholder="{{$placeholder}}">
    @error($name)
        <span class="alert alert-danger red">{{ $message }}</span>
    @enderror
</div>