@extends('adminPanelAsociacion')

@section('navBar')
@parent
@endsection

@section('sideBar')
@parent
@endsection


<?php
use App\asociacion;
use App\usuario;
$asociacionId = Auth::id();

if($asociacionId){
    $asociacion = asociacion::find($asociacionId);
    $numUsuarios = usuario::where('id_asociacion','=',$asociacionId)->count();

}
?>


@section('Contenido')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Creación de Usuarios</h4>
            </div>
            @if ( Session::has('send') )
            <div class="alert alert-success margin-b-30">
                {{Session::get('send')}}
            </div>
            @endif

            @if (count($errors) > 0)
            <div class="alert alert-danger margin-b-30">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="panel panel-info">
            <div class="panel-heading"> Formulario de Creación  </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="createUser" method="post" class="form-horizontal" enctype="multipart/form-data" files=true >
                        {!! csrf_field() !!}
                        <input type="text" name="id" hidden value="{{ Auth::id() }}">
                        <div class="form-body">
                            <h3 class="box-title">Imagen del Usuario</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Imagen</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name='avatar'  required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="box-title">Información Personal</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nombre</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" placeholder="" required>
                                        </div>

                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">Apellidos</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="apellidos" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Fecha de Nacimiento</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control complex-colorpicke" id="datepicker-autoclose" name="fechaNacimiento" placeholder="mm/dd/yyyy">
                                                <span class="input-group-addon"><i class="icon-calender"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <h3 class="box-title">Datos de Contacto</h3>
                            <hr class="m-t-0 m-b-40">
                            <!--/row-->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Contraseña</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="password" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Telefono de Contacto</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="telefono" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success">Enviar</button>
                                            <button type="button" class="btn btn-default">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('footer')
@parent
@endsection



