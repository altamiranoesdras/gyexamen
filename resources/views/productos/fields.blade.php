<!-- Tipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_id', 'Tipo Id:') !!}
    {!! Form::number('tipo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>
