@extends('layouts.PlantillaFondoAdmin')



@section('content')

<br>
<br>

<h1 class="text-white"><i class="fas fa-edit"></i>Editar Asociado</h1>

<br>

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card" > 
        <form style="margin:15px;"  action="/personas/{{$persona->id}}" method="post">
            @csrf    
            {{method_field('PUT')}}
            <div class="mb-3">
                <label for="" class="form-label"> Nombre</label>
                <input id="Nombre" name="Nombre" type="text" class="form-control" value="{{$persona->Nombre}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Primer Apelldio</label>
                <input id="Apellido1" name="Apellido1" type="text" class="form-control" value="{{$persona->Apellido1}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Segundo Apelldio</label>
                <input id="Apellido2" name="Apellido2" type="text" class="form-control" value="{{$persona->Apellido2}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Correo</label>
                <input id="Correo" name="Correo" type="email" class="form-control" value="{{$persona->Correo}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Telefono</label>
                <input id="Telefono" name="Telefono" type="text" class="form-control" value="{{$persona->Telefono}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Tipo Persona</label>
                <select name="Tipo_Persona" id="Tipo_Persona">
                <option value="Artesano">Artesano </option>
                <option value="Cocinero">Cocinero</option>
                <option value="Guia">Guia</option>
                <option value="Artesano y Cocinero">Artesano y Cocinero</option>
                </select>
            
            </div>
            <a href="/personas" class="btn btn-secondary" tabindex="5"> Cancelar</a>
            <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
            </form>
        </div>
    </div>
</div>



            

    
@stop

