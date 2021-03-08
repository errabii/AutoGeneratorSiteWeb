<!-- Nomd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomD', 'Nomd:') !!}
    {!! Form::text('nomD', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('domains.index') !!}" class="btn btn-default">Cancel</a>
</div>
