@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Config
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($config, ['route' => ['configs.update', $config->id], 'method' => 'patch']) !!}

                        @include('configs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection