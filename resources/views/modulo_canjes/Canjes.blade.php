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
            <h1 class="card-title">LISTA DE CANJES</h1>
            <div class="card-tools">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Nuevo +</button>
              <a href="{{ url('inicio') }}" class="btn btn-secondary">VOLVER</a>

            </div>
          </div>


          <div class="card-body">
            <!--Tarjeta_BODY-->
            <!--Tabla-->
            <table id="example1" class="table table-bordered table-striped table-responsive">
              <!--Tabla_CABEZA-->
              <thead class=" text-center bg-danger blue text-white ">
                <tr>

                  <th>Codigo</th>
                  <th>Fecha Registro</th>
                  <th>Tipo Registro</th>
                  <th>Rtn Registro</th>
                  <th>Nombre Farmacia</th>
                  <th>Dni Paciente</th>
                  <th>Nombre Paciente</th>
                  <th>Apellido Paciente</th>
                  <th>Nombre Producto</th>
                  <th>Cantidad</th>
                  <th>Estado Canje</th>
                  <th>Comentarios</th>
                  <th>Fecha Creacion</th>
                  <th>Creado Por</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <!--Tabla_BODY-->
              <tbody>
                @foreach ($Canjes as $Canje)
                <tr>
                  <td>{{ $Canje["id_registro"]}}</td>
                  <td>{{ \Carbon\Carbon::parse($Canje["fecha_registro"])->format('d/m/Y H:i:s');}}</td>
                  <td>{{ $Canje["tipo_registro"]}}</td>
                  <td>{{ $Canje["rtn_farmacia"]}}</td>
                  <td>{{ $Canje["nombre_farmacia"]}}</td>
                  <td>{{ $Canje["dni_paciente"]}}</td>
                  <td>{{ $Canje["nombre_paciente"]}}</td>
                  <td>{{ $Canje["apellido_paciente"]}}</td>
                  <td>{{ $Canje["nombre_producto"]}}</td>
                  <td>{{ $Canje["cantidad"]}}</td>
                  <td>{{ $Canje["estado_canje"]}}</td>
                  <td>{{ $Canje["comentarios"]}}</td>
                  <td>{{ $Canje["fecha_creacion"]}}</td>
                  <td>{{ $Canje["creado_por"]}}</td>
                  <td> <a class="btn btn-info" href="{{
                  route('pdf.download',               
                  ['title'=>'PDF Canje',
                  'id_registro'=>$Canje["id_registro"],
                  'fecha_registro'=>\Carbon\Carbon::parse($Canje["fecha_registro"])->format('d/m/Y H:i:s'),
                  'tipo_registro'=>$Canje["tipo_registro"],
                  'rtn_farmacia'=>$Canje["rtn_farmacia"],
                  'nombre_farmacia'=>$Canje["nombre_farmacia"],
                  'dni_paciente'=>$Canje["dni_paciente"],
                  'nombre_paciente'=>$Canje["nombre_paciente"],
                  'apellido_paciente'=>$Canje["apellido_paciente"],
                  'nombre_producto'=>$Canje["nombre_producto"],
                  'cantidad'=>$Canje["cantidad"],
                  'estado_canje'=>$Canje["estado_canje"],
                  'comentarios'=>$Canje["comentarios"],
                  'fecha_creacion'=>$Canje["fecha_creacion"],
                  'creado_por'=>$Canje["creado_por"]]) 
                  }}" class="btn">Descargar PDF</a></td>
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
<div x-data='dataHandler(@json($Facturas),@json($tblpaciente), @json($tblproducto), @json($Canjes))'>
  <script>
    function dataHandler(facturas, pacientes, productos, canjes) {
      return {
        canjeHabilitado: false
        , registroSeleccionado: false
        , farmaciaSeleccionada: false
        , obs: 'NINGUNO'
        , pacienteSeleccionado: false
        , estadoCanjeSeleccionado: false
        , comentariosSeleccionado: false
        , cantidadCanjes: 0
        , canjeMensaje: ''
        , pacienteId: ''
        , productoId: ''
        , productoNombre: ''
        , pacienteNombre: ''
        , emailPaciente: ''
        , verificarCanje: function() {
          console.log(94, facturas, pacientes, productos, canjes)
          const pacienteSeleccionado = pacientes.find(p => p.id_paciente == this.pacienteId);
          const productoSeleccionado = productos.find(p => p.id_producto == this.productoId);
          const {
            escala = 0, canjes_max_anual = 0, canje = 0
          } = productoSeleccionado
          this.emailPaciente = pacienteSeleccionado.email.toLowerCase();
          this.pacienteNombre = pacienteSeleccionado.nombre_paciente + ' ' + pacienteSeleccionado.apellido_paciente
          this.productoNombre = productoSeleccionado.nombre_producto
          const facturasSeleccionada = facturas.filter(f => f.dni_paciente == pacienteSeleccionado.dni_paciente && f.nombre_producto == productoSeleccionado.nombre_producto);
          const productosComprados = facturasSeleccionada.reduce((acc, v) => {
            return acc + v.cantidad_producto
          }, 0)
          if (!productosComprados) {
            this.canjeHabilitado = false;
            this.canjeMensaje = 'El paciente no ha comprado el producto, no puede canjear';
            return
          }
          const canjesPaciente = canjes.filter(c => c.dni_paciente == pacienteSeleccionado.dni_paciente && c.nombre_producto == productoSeleccionado.nombre_producto).length;
          console.log(111, canjesPaciente, canjes_max_anual)
          if (canjesPaciente >= canjes_max_anual) {
            this.canjeMensaje = 'El paciente ya alcanzo el maximo de canjes';
            return;
          }
          const productosCanjeados = canjesPaciente * escala
          const productosRestantes = productosComprados - productosCanjeados;
          if (productosRestantes < escala) {
            this.canjeHabilitado = false;
            this.canjeMensaje = 'El paciente no puede canjear, le faltan ' + (escala - productosRestantes) + ' unidades';
            return
          }
          if (productosRestantes >= escala) {
            this.canjeHabilitado = true;
            this.canjeMensaje = 'El paciente puede canjear';
            this.cantidadCanjes = canje
            return;
          }
        }
      }
    }

  </script>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Agregar Un Nuevo Registro Canje</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="agregar_registrocanje" method="post">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="">Tipo Registro</label>
                  <select id="registro" name="registro" class="form-control" @change='registroSeleccionado = true' required>
                    <option>SELECCIONA</option>
                    @foreach ($tblregistro as $tbl)
                    <option value="{{ $tbl['id_tipo_registro']}}">{{$tbl["tipo_registro"]}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label for="">Farmacia</label>
                  <select id="farmacia" name="farmacia" class="form-control" @change='farmaciaSeleccionada = true' required>
                    <option>SELECCIONA</option>
                    @foreach ($tblfarmacia as $tbl)
                    <option value="{{ $tbl['id_farmacia']}}">{{$tbl["rtn_farmacia"]}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label for="">Paciente</label>
                  <select id="paciente" name="paciente" x-model="pacienteId" class="form-control" @change='pacienteSeleccionado = true; productoId && verificarCanje();' required>
                    <option>SELECCIONA</option>
                    @foreach ($tblpaciente as $tbl)
                    <option value="{{ $tbl['id_paciente']}}">{{$tbl["dni_paciente"]}}</option>
                    @endforeach
                  </select>
                </div>
              </div>


              <div class="col-12">
                <div class="form-group">
                  <label for="">Producto</label>
                  <select :disabled="!pacienteSeleccionado" id="producto" name="producto" class="form-control" x-model="productoId" @change='verificarCanje()' required>
                    <option>SELECCIONA</option>
                    @foreach ($tblproducto as $tbl)
                    <option value="{{ $tbl['id_producto']}}">{{$tbl["nombre_producto"]}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div :class="{'alert alert-warning w-full': !canjeHabilitado, 'alert alert-success w-full': canjeHabilitado}" role="alert" x-text="canjeMensaje" :hidden="!canjeMensaje"></div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="">Cantidad</label>
                  <input type="text" id="cantidad" name="cantidad" class="form-control" x-model="cantidadCanjes" required>
                </div>
              </div>

              <input type="hidden" id="email" name="email" class="form-control" x-model="emailPaciente">
              <input type="hidden" id="productoNombre" name="productoNombre" class="form-control" x-model="productoNombre">
              <input type="hidden" id="pacienteNombre" name="pacienteNombre" class="form-control" x-model="pacienteNombre">



              <div class="col-12">
                <div class="form-group">
                  <label for="">Estado Canje</label>
                  <select id="estadocanje" name="estadocanje" class="form-control" @change="estadocanjeSeleccionado = true" required>
                    <option>SELECCIONA</option>
                    @foreach ($tblestadocanje as $tbl)
                    <option value="{{ $tbl['id_estado_canje']}}">{{$tbl["estado_canje"]}}</option>
                    @endforeach
                  </select>
                </div>
              </div>



              <div class="col-12">
                <div class="form-group">
                  <label for="">Comentarios</label>
                  <input type="text" id="comentarios" name="comentarios" x-model="obs" class="form-control" required>
                </div>
              </div>


            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-primary" :disabled="!canjeHabilitado || !registroSeleccionado || !farmaciaSeleccionada || !estadocanjeSeleccionado">AGREGAR</button>
          </div>
        </form>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<!-- /.modal -->
@endsection()
