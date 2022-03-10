<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    {!! Form::number('cliente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Producto Tipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producto_tipo_id', 'Producto Tipo Id:') !!}
    {!! Form::number('producto_tipo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Producto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producto_id', 'Producto Id:') !!}
    {!! Form::number('producto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Contacto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_contacto', 'Fecha Contacto:') !!}
    {!! Form::date('fecha_contacto', null, ['class' => 'form-control','id'=>'fecha_contacto']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_contacto').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Fecha Probable Adquiere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_probable_adquiere', 'Fecha Probable Adquiere:') !!}
    {!! Form::date('fecha_probable_adquiere', null, ['class' => 'form-control','id'=>'fecha_probable_adquiere']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_probable_adquiere').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Acuerdo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('acuerdo', 'Acuerdo:') !!}
    {!! Form::textarea('acuerdo', null, ['class' => 'form-control']) !!}
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
