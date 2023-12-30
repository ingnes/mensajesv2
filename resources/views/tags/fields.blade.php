<div class="form-group col-6">
    <label class="form-label" for="name">Nombre </label>
    <input class="form-control" type="text" name="name" id="name" value="{{ $tag->name ?? old('name') }}"/>
    @if ($errors->first('name'))
        <span class="alert alert-danger btn btn-sm">{{ $errors->first('name') }}</span> 
    @endif                              
</div>

<div class="form-group col-6">
    <label class="form-label" for="descripcion"> Descripcion </label>
    <input class="form-control" autocomplete="true" type="descripcion" name="descripcion" id="descripcion" value="{{ $tag->descripcion ?? old('descripcion') }}"/>
    @if ($errors->first('descripcion'))
        <span class="alert alert-danger btn btn-sm"> {{ $errors->first('descripcion') }}</span>
    @endif
</div> 

<div class="col-6">
    <button type="submit" class="btn btn-success btn-md">{{ $btnText }}</button>
</div>