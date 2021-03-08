<table class="table table-responsive" id="configs-table">
    <thead>
        <tr>
        <th>Protocole</th>
        <th>Nom Site</th>
        <th>Url admin</th>
        <th>Description Site</th>
        <th>Nom Admin</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($configs as $config)
        <tr>
            <td>{!! $config->protocole !!}</td> 
            <td><a href="http://localhost/{!! $config->nom_site !!}" target="_blank">{!! $config->nom_site !!}</a></td>
            <td><a href="http://localhost/{!! $config->nom_site !!}/wp-admin/" target="_blank">{!! $config->nom_site !!}/admin/</a></td>
            <td>{!! $config->description_site !!}</td>
            <td>{!! $config->nom_admin !!}</td>
            <td>{!! $config->email !!}</td>
            <td>
                {!! Form::open(['route' => ['configs.destroy', $config->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('configs.show', [$config->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('configs.edit', [$config->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>