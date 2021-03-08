@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Domaine
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($domaine, ['route' => ['domaines.update', $domaine->id], 'method' => 'patch']) !!}

                        @include('domaines.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection