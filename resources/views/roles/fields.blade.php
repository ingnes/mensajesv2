<div class="form-group col-6">
    <label class="form-label" for="name">Nombre </label>
    <input class="form-control" type="text" name="name" id="name" value="{{ $rol->name ?? old('name') }}"/>
    @if ($errors->first('name'))
        <span class="alert alert-danger btn btn-sm">{{ $errors->first('name') }}</span> 
    @endif                              
</div>

<div class="form-group col-6">
    <label class="form-label" for="display_name"> Rol </label>
    <input class="form-control" autocomplete="true" type="display_name" name="display_name" id="display_name" value="{{ $rol->display_name ?? old('display_name') }}"/>
    @if ($errors->first('display_name'))
        <span class="alert alert-danger btn btn-sm"> {{ $errors->first('display_name') }}</span>
    @endif
</div>

<div class="form-group col-6">
    <label class="form-label" for="description"> Descripcion </label>
    <input class="form-control" autocomplete="true" type="description" name="description" id="description" value="{{ $rol->description ?? old('description') }}"/>
    @if ($errors->first('description'))
        <span class="alert alert-danger btn btn-sm"> {{ $errors->first('description') }}</span>
    @endif
</div> 

<div class="col-6">
    <button type="submit" class="btn btn-success btn-md">{{ $btnText }}</button>
</div>