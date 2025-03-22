<div class="input-block">
    <label class="@error($name) red @enderror" for="{{$name}}">{{$text}}@if ($required)*@endif</label>
    <select class="@error($name) error @enderror" name="{{$name}}" id="{{$name}}" {{$required? "required" : '' }}>
        {{$slot}}
    </select>
    
    @error($name)
        <span class="alert alert-danger red">{{ $message }}</span>
    @enderror
</div>