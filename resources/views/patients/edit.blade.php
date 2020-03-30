@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Paciente
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($patients, ['route' => ['patients.update', $patients->id], 'method' => 'patch']) !!}

                        @include('patients.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
