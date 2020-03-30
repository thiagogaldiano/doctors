@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agendamentos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($schedules, ['route' => ['schedules.update', $schedules->id], 'method' => 'patch']) !!}

                        @include('schedules.editfields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
