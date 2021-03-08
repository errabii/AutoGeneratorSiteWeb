<table class="table table-responsive" id="domaines-table">
    <thead>
        <tr>
            <th>Nom Domaine</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($domaines as $domaine)
        <tr>
            <td>{!! $domaine->nomD !!}</td>
            <td>
                {!! Form::open(['route' => ['domaines.destroy', $domaine->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('domaines.show', [$domaine->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('domaines.edit', [$domaine->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>