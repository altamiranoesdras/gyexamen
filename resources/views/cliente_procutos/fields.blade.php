<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente:') !!}
    {!! Form::number('cliente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Producto Tipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producto_tipo_id', 'Producto Tipo:') !!}
    {!! Form::number('producto_tipo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Producto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producto_id', 'Producto:') !!}
    {!! Form::number('producto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Contacto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_contacto', 'Fecha Contacto:') !!}
    {!! Form::date('fecha_contacto', null, ['class' => 'form-control','id'=>'fecha_contacto']) !!}
</div>


<!-- Fecha Probable Adquiere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_probable_adquiere', 'Fecha Probable Adquiere:') !!}
    {!! Form::date('fecha_probable_adquiere', null, ['class' => 'form-control','id'=>'fecha_probable_adquiere']) !!}
</div>


<!-- Acuerdo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('acuerdo', 'Acuerdo:') !!}
    {!! Form::textarea('acuerdo', null, ['class' => 'form-control']) !!}
</div>

