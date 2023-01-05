@extends('layouts.PlantillaFondoAdmin')

@section('buscar') 
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          
          <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input name="buscar" class="form-control" placeholder="Search" type="text" value="{{$buscar}}">
          </div>
          
        </form> 
        
    
@endsection

@section('content')
@php

$cont2 = 1;

@endphp
<br>
<br>
        <div class="row align-items-start" >
          <div class="col"  >
          <h2 class="text-white"><i  class="fas fa-user"></i>  Lista de Asociado </h2>
          </div>
        </div>
        
            <div >
                <p align="right">
                    <a  href="{{ route('personas.create') }}" class=  "btn bg-gradient-success"> <i class="fas fa-plus"></i> Crear</a>
                </p>
            </div>
            <div class="card">
              <div class="table-responsive">

              <table class="table align-items-center mb-0">
        <thead align="center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Ocupación</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
    <tbody align="center">
       @foreach ($personas as $persona)
       <!-- {{$cont2 ++}} -->
           <tr>
            <td>{{$persona->id}}</td>
            <td>{{$persona->Nombre}}</td>
            <td>{{$persona->Apellido1}}</td>
            <td>{{$persona->Apellido2}}</td>
            <td>{{$persona->Telefono}}</td>
            <td>{{$persona->Tipo_Persona}}</td>
            <td>
                <form class="form-eliminar" action="{{ route('personas.destroy',$persona->id) }}" method ="POST">
                <button type="button" class="btn bg-gradient-info"data-bs-toggle="modal" data-bs-target="#modal2-{{ $cont2 }}">
                <i id="EditImg" class="fas fa-info"></i>
                </button>
                <a href="/personas/{{$persona->id}}/edit"  class="btn bg-gradient-warning btn-sm"  type ="button"href=""><i id="EditImg" class="fas fa-edit"></i></a>
                @csrf
                {{method_field('DELETE')}}
                <button  submit="button" class="btn bg-gradient-danger btn-sm"><i id="EditImg" class="fas fa-trash"></i></button>
                
                </form>
               
            </td>
           </tr>

           <div class="modal fade" id="modal2-{{ $cont2 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Infromación Artesano</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                        <h5 class="d-inline">ID: </h5><h5 class="d-inline">   &nbsp; {{$persona->id}}</h5>
                        <br>
                        <h5 class="d-inline">Nombre: </h5> <h5 class="d-inline">&nbsp; {{$persona->Nombre}}</h5>
                        <br>
                        <h5 class="d-inline">Primer Apellido:  </h5><h5 class="d-inline">&nbsp; {{$persona->Apellido1}} </h5>
                        <br>
                        <h5 class="d-inline">Segundo Apellido:   </h5><h5 class="d-inline">&nbsp; {{$persona->Apellido2}}</h5>
                        <br>
                        <h5 class="d-inline">Correo:  </h5><h5 class="d-inline">{{$persona->Correo}}  </h5>
                        <br>
                        <h5 class="d-inline">Telefono:   </h5> <h5 class="d-inline"> {{$persona->Telefono}}</h5>
                        <br>
                        <h5 class="d-inline">Ocupación: </h5> <h5 class="d-inline">{{$persona->Tipo_Persona}}</h5>
                        <br>
                        <h5 class="d-inline">Tipo Artesania: </h5><h5 class="d-inline">{{$persona->Tipo_Artesania}}</h5>
                     
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            
          </div>
        </div>
    </div>
       @endforeach 
    </tbody>
    </table>
    

              </div>

            </div>
            <div style="margin-top:45px;">
            {{ $personas->links()}}
            </div>
            
    
@stop

@section('js')

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        otro= document.getElementById("check2")
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>
    
<script type="text/javascript">

$('.form-eliminar').submit(function(e) {
    
  e.preventDefault();
  Swal.fire({
  title: 'Esta seguro de que desea eliminar el registro?',
  text: "No se pueden revertir los cambios!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminar!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Eliminado!',
      'Su registro ha sido eliminado.',
      'success',
      
    )
    this.submit();
  }
})

})



</script>

@endsection




