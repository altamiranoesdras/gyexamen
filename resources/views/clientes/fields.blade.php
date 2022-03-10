<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Dpi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dpi', 'Dpi:') !!}
    {!! Form::text('dpi', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
    {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control','id'=>'fecha_nacimiento']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_nacimiento').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo', 'Correo:') !!}
    {!! Form::text('correo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Departamento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departamento_id', 'Departamento Id:') !!}
    {!! Form::number('departamento_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Municipio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipio_id', 'Municipio Id:') !!}
    {!! Form::number('municipio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- No Asociado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_asociado', 'No Asociado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('no_asociado', 0) !!}
        {!! Form::checkbox('no_asociado', '1', null) !!}
    </label>
</div>


<!-- Usuario Crea Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario_crea', 'Usuario Crea:') !!}
    {!! Form::number('usuario_crea', null, ['class' => 'form-control']) !!}
</div>

<!-- Usuario Actualiza Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario_actualiza', 'Usuario Actualiza:') !!}
    {!! Form::number('usuario_actualiza', null, ['class' => 'form-control']) !!}
</div>
