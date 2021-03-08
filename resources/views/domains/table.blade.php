<table class="table table-responsive" id="domains-table">
    <thead>
        <tr>
            <th>Nomd</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($domains as $domain)
        <tr>
            <td>{!! $domain->nomD !!}</td>
            <td>
                {!! Form::open(['route' => ['domains.destroy', $domain->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('domains.show', [$domain->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('domains.edit', [$domain->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>