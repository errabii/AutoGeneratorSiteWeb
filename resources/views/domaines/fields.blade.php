<!-- Nomd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomD', 'Nom Domaine:') !!}
    {!! Form::text('nomD', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('domaines.index') !!}" class="btn btn-default">Cancel</a>
</div>
