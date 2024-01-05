@extends('adminlte::page')

@section('title', 'Componentes')

@section('content_header')
    <h5 class="text-center alert alert-info col-md-6">Listar componentes</h5>
@stop

@section('content')

<div class="row">

    {{-- With prepend slot --}}
    <x-adminlte-input name="use" label="Usuario" placeholder="Usuario" label-class="text-lightblue" fgroup-class="col-md-6">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
</div>

<div class="row">
    {{-- Email type --}}
    <x-adminlte-input name="email" type="email" placeholder="Ingrese su email" fgroup-class="col-md-6"/>

</div>


<div class="row">
    
    {{-- With a link on the bottom slot and old support enabled --}}
    <x-adminlte-input name="iPostalCode" label="Postal Code" placeholder="postal code" fgroup-class="col-md-6"
        enable-old-support>
        <x-slot name="prependSlot">
            <div class="input-group-text text-olive">
                <i class="fas fa-map-marked-alt"></i>
            </div>
        </x-slot>
        <x-slot name="bottomSlot">
            <a href="#">Search your postal code here</a>
        </x-slot>
    </x-adminlte-input>

</div>

<div class="row">

    {{-- With multiple slots and lg size --}}
    <x-adminlte-input name="iSearch" label="Search" placeholder="search" igroup-size="lg" fgroup-class="col-md-6">
        <x-slot name="appendSlot">
            <x-adminlte-button theme="outline-danger" label="Go!"/>
        </x-slot>
        <x-slot name="prependSlot">
            <div class="input-group-text text-danger">
                <i class="fas fa-search"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
</div>


<div class="row">
    {{-- With slots, sm size and feedback disabled --}}
    <x-adminlte-textarea name="taMsg" label="Message" rows=5 igroup-size="sm"
        label-class="text-primary" placeholder="Write your message..."
        fgroup-class="col-md-6" disable-feedback>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-lg fa-comment-dots text-primary"></i>
            </div>
        </x-slot>
        <x-slot name="appendSlot">
            <x-adminlte-button theme="primary" icon="fas fa-paper-plane" label="Send"/>
        </x-slot>
    </x-adminlte-textarea>

</div>


{{-- With multiple slots, and plugin config parameter --}}
@php
    $config = [
        "placeholder" => "Select multiple options...",
        "allowClear" => true,
    ];
@endphp

<div class="row">
    {{-- With prepend slot, label and data-placeholder config --}}
    <x-adminlte-select2 name="sel2Vehicle" label="Vehicle" label-class="text-lightblue"
        igroup-size="lg" data-placeholder="Select an option..." fgroup-class="col-md-6">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="fas fa-car-side"></i>
            </div>
        </x-slot>
        <option/>
        <option>Vehicle 1</option>
        <option>Vehicle 2</option>
    </x-adminlte-select2>

</div>

<div class="row">

    <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Categories"
        label-class="text-danger" igroup-size="sm" :config="$config" multiple  fgroup-class="col-md-6">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-red">
                <i class="fas fa-tag"></i>
            </div>
        </x-slot>
        <x-slot name="appendSlot">
            <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
        </x-slot>
        <option>Sports</option>
        <option>News</option>
        <option>Games</option>
        <option>Science</option>
        <option>Maths</option>
    </x-adminlte-select2>
</div>

{{-- Placeholder, time only and prepend icon --}}
@php
$config = ['format' => 'DD-MM-YYYY'];
@endphp

<div class="row">
    <x-adminlte-input-date name="idTimeOnly" label="Fecha" :config="$config" placeholder="Selecciona una fecha..." fgroup-class="col-md-6">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="fas fa-clock"></i>
            </div>
        </x-slot>
    </x-adminlte-input-date>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <x-adminlte-button class="btn-primary btn-sm" type="submit" label="Registrar" theme="success" icon="fas fa-lg fa-save"/>
    </div>

</div>

@endsection