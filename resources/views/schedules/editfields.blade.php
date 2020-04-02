<!-- Consultation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('consultation_date', 'Data da consulta:') !!}
    {!! Form::text('consultation_date', $schedules->consultation_date->format('d/m/Y H:i:s'), ['class' => 'form-control','id'=>'consultation_date']) !!}
</div>

<!-- Patients Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patients_id', 'Paciente:') !!}
    {!! Form::select('patients_id', array($schedules->patients->id=>$schedules->patients->name), $schedules->patients->name, ['class' => 'form-control','id'=>'patients_id','selected']) !!}
</div>

<!-- Doctors Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doctors_id', 'Médico:') !!}
    {!! Form::select('doctors_id', array($schedules->doctors->id=>$schedules->doctors->name), $schedules->doctors->name, ['class' => 'form-control','id'=>'doctors_id','selected']) !!}
</div>

<!-- Descriptions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descriptions', 'Descrição:') !!}
    {!! Form::textarea('descriptions', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('schedules.index') }}" class="btn btn-default">Cancelar</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#consultation_date').datetimepicker({
            format: 'DD/MM/YYYY HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        });

    </script>
@endpush
