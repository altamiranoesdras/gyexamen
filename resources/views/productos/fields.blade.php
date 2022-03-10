<!-- Tipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_id','Tipo:') !!}
    {!!
        Form::select(
            'tipo_id',
            select(\App\Models\ProductoTipo::class,'nombre','id',null)
            , null
            , ['id'=>'tipos','class' => 'form-control','style'=>'width: 100%']
        )
    !!}
</div>
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>
