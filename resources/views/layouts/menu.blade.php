<li class="{{ Request::is('domaines*') ? 'active' : '' }}">
    <a href="{!! route('domaines.index') !!}"><i class="fa fa-edit"></i><span>Domaines</span></a>
</li>
<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{!! route('clients.index') !!}"><i class="fa fa-edit"></i><span>Clients</span></a>
</li><li class="{{ Request::is('configs*') ? 'active' : '' }}">
    <a href="{!! route('configs.index') !!}"><i class="fa fa-edit"></i><span>Configs</span></a>
</li>

