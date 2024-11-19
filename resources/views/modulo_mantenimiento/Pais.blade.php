@extends ('layouts.principal')

@section('content')

<br>
<div value="{{$con=0}}"></div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!--Tarjeta-->
        <div class="card">
          <!--Tarjeta_CABEZA-->
          <div class="card-header">
            <h1 class="card-title">LISTA DE PAISES</h1>
            <div class="card-tools">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Nuevo +</button>
              <a href="{{ url('inicio') }}" class="btn btn-secondary">VOLVER</a>

            </div>
          </div>


          <div class="card-body">
            <!--Tarjeta_BODY-->
            <!--Tabla-->
            <table id="example1" class="table table-bordered table-striped  ">
              <!--Tabla_CABEZA-->
              <thead class=" text-center bg-danger blue text-white ">
                <tr>
                   
                  <th>Codigo</th>
                  <th>Pais</th>
                  <th>Estado</th>
                  <th>Fecha Creacion</th>
                  <th>Creado Por</th>
                  <th>Accion</th>

                </tr>
              </thead>
              <!--Tabla_BODY-->
              <tbody>
                @foreach ($Paises as $Pais)
                <tr>
                   
                  <td>{{ $Pais["id_pais"]}}</td>
                  <td>{{ $Pais["nombre_pais"]}}</td>
                  <td>{{ $Pais["estado"]}}</td>
                  <td>{{ $Pais["fecha_creacion"]}}</td>
                  <td>{{ $Pais["creado_por"]}}</td>
                                      
                  <th>
                    <div class="btn-group" role="group" aria-label="Basic example">

                      <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-editor-{{$Pais['id_pais']}}">Actualizar <i class="bi bi-pencil-fill"></i> </a>

                    </div>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!--FIN_Tabla-->
          </div>
        </div>
        <!--FIN_Tarjeta-->
      </div>
    </div>
  </div>
</section>

<!--MODAL EDITAR-->
@foreach ($Paises as $Pais)
<div class="modal fade" id="modal-editor-{{$Pais['id_pais']}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Actualizar PAIS</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="editar_pais" method="post">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <input type="hidden" id="cod" name="cod" class="form-control" value="{{ $Pais['id_pais']}}" required>

            <div class="col-12">
              <div class="form-group">
                <label for="">Pais</label>
                <input type="text" id="pais" name="pais" class="form-control" value="{{$Pais['nombre_pais']}}" required>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label for="">Estado</label>
                <select id="estdo" name="estdo" class="form-control" requied>
                  @foreach ($tblestado as $tbl)
                  <option value="{{ $tbl['id_estado']}}">{{$tbl["estado"]}}</option>
                  @endforeach
                </select>
              </div>
            </div>



          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

<!--AGREGAR TIPO ENTIDAD-->



<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">


      <div class="modal-header">
        <h4 class="modal-title">AGREGAR UN PAIS</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="agregar_pais" method="post">
        @csrf
        <div class="modal-body">
          <div class="row">

            <div class="col-12">
              <div class="form-group">
                <label for="">Pais</label>
                <input type="text" id="pais" name="pais" class="form-control" required>
              </div>
            </div>


            <div class="col-12">
              <div class="form-group">
                <label for="">Estado</label>
                <select id="estdo" name="estdo" class="form-control" requied>
                  <option>SELECCIONA</option>
                  @foreach ($tblestado as $tbl)
                  <option value="{{ $tbl['id_estado']}}">{{$tbl["estado"]}}</option>
                  @endforeach
                </select>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-primary">AGREGAR</button>
        </div>
      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection()
