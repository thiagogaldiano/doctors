@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Médicos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($doctors, ['route' => ['doctors.update', $doctors->id], 'method' => 'patch']) !!}

                        @include('doctors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
