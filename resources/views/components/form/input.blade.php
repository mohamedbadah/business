@props(['type'=>'text','value'=>'','name','label'=>false,'id'=>''])
<div class="form-group">
    @if ($label)
    <label for="{{$id}}">{{$label}}</label>
    @endif
    <input type="{{$type}}" name="{{$name}}" id="{{$id}}" value="{{old($name,$value)}}"
      {{$attributes->class([
        'form-control',
        'is-invalid'=>$errors->has($name)
      ])}}
    />
        @error($name)
            <li class="invalid-feedback">{{$message}}</li>
        @enderror
</div>