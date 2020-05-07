@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
              
                    {{ Form::open(['route' => 'filtrar', 'method' => 'GET']) }}
                    <div class="row">
                        <div class="col-4">
                                <label>Email</label>
                                {!! Form::text("email", null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            
                        </div>
                        <div class="col-4">
                                <label>Teléfono</label>
                                {!! Form::text("telefono", null, ['class' => 'form-control', 'placeholder' => 'Teléfono']) !!}
                                   
                        </div>
                        <div class="col-4">
                                <label>Estado</label>
                                {!! Form::select("estado",$estados, null, ['class' => 'form-control', 'placeholder' => 'seleccione']) !!}

                        </div>
                        <div class="col-md-1" style="margin-top: 25px;">
                            <button type="submmit" class="btn btn-success">
                                Filtrar
                            </button>
                        </div>
                        <div class="col-md-1" style="margin-top: 25px;">
                            <button type="button" class="btn btn-primary" onclick="leads.limpiar()">
                                limpiar filtros
                            </button>
                        </div>

                    </div>
                    {{ Form::close() }}

                           
                    <br>
                
                    <div class="table-responsive">
                        <table class="table data-table" id="tabla">
                        <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>programa</th>
                                    <th>Observación</th>
                                    <th>estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if( empty($leads) )
                                No hay registros
                            @else
                            @foreach($leads as $lead)
                                <tr>
                                    <td><strong>{{$lead->nombres}}</strong></td>
                                    <td><strong>{{$lead->apellidos}}</strong></td>
                                    <td><strong>{{$lead->email}}</strong></td>
                                    <td><strong>{{$lead->telefono}}</strong></td>
                                    <td><strong>{{$lead->programa}}</strong></td>
                                    <td><strong>{{$lead->observacion}}</strong></td>
                                    <td><strong>{{$lead->estado}}</strong></td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="leads.cambiarEstado({{$lead->id}})">Gestionar</button>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <h5><span class="label label-default">Observación</span></h5>
                    <input type="text" id="observacion" class="form-control" >
                </div>
                              
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="leads.actualizar()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- modal -->

<script type="text/javascript">
 

let leads = new Leads();

function Leads() {
    let idlead;
    this.cambiarEstado = function(id) {
        idlead = id;
       
    };

    this.actualizar = function() {
        let observacion = $('#observacion').val();
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id': idlead,
                'observacion': observacion
            },
            url: '/actualizarlead',
            type: 'put',
            success: function(response){
                console.log(response);
					location.reload();

                
            },
            error: function(e){

            }
        })
    };

    this.limpiar = function() {
        location.assign("/home");
    }


}

</script>


@endsection
