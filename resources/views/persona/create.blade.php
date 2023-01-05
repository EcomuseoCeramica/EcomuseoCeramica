@extends('layouts.PlantillaFondoAdmin')

@section('content')

<h1 class="text-white"><i class="fas fa-edit"></i>Crear Asociado</h1>
<br>
<div class="row">


        <div class="col-md-12 mb-4">
            <div class="card" > 

                <form class="row g-3" style="margin:15px;" role="form" method="POST"  action="{{ route('personas.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4">
                            <label for="validationDefault01" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="Nombre"  required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" name="Apellido1"  required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" name="Apellido2"  required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefaultUsername" class="form-label">Correo</label>
                            <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            <input type="email" class="form-control" name="Correo"  aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault03" class="form-label">Telefono</label>
                            <input type="number" min="1" max="999999999" class="form-control" name="Telefono" required>
                        </div>
                        <div class="col-3">
                            <br>
                            <br>
                            <label for="validationDefault04" class="form-label">Tipo Persona</label>
                            <br>
                            <label for="">Artesano <input type="checkbox" name="Tipo_Persona" id="check" value="Artesano"  onchange="javascript:showContent()" /> </label>
                            <!-- <br>
                            <label for="">Artesano y Cocinero <input type="checkbox" name="Tipo_Persona" id="check2" value="Artesano y Cocinero"  onchange="javascript:showContent2()" /> </label> -->
                            <br>
                            <label for="">Cocinero<input type="checkbox" name="Tipo_Persona"  value="Cocinero" ></label>
                            <br>
                            <label for="">Guia<input type="checkbox" name="Tipo_Persona"   value="Guia" ></label>
                            <br>
                        
                        </div>
                        <div id="content2" style="display: none;" class="col-md-3">
                            <br>
                            <br>
                            <label for="validationDefault04" class="form-label">Tipo Artesania</label>
                            <select class="form-select" name="Tipo_Artesania" >
                                        <option value=""> </option>
                                        <option value="Con Sello">Con Sello </option>
                                        <option value="Replica">Replica</option>
                                        
                                        
                            </select>
                        </div>
                        <div id="content" style="display: none;" class="col-md-3">
                            <br>
                            <br>
                            <label for="validationDefault04" class="form-label">Tipo Artesania</label>
                            <select class="form-select" name="Tipo_Artesania" >
                                        <option value=""> </option>
                                        <option value="Con Sello">Con Sello </option>
                                        <option value="Replica">Replica</option>
                                        
                                        
                            </select>
                        </div>
                        <div class="col-12">
                        <br><br>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <a href="{{ route('personas.index') }}" class="btn btn-danger" > Cancelar</a>

                        </div>
                </form>


            </div>
        </div>

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
    function showContent2() {
        cont = document.getElementById("check");
        element = document.getElementById("content2");
        check = document.getElementById("check2");
        if(cont.checked)
        {
            element.style.display='none';
            
        }else if (check.checked) {
            element.style.display='block';
            
        }
        else {
            element.style.display='none';
        }
    }
</script>
@endsection


