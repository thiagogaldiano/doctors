<!-- Consultation Date Field -->
<div class="form-group">
    {!! Form::label('consultation_date', 'Data da consulta:') !!}
    <p>{{ $schedules->consultation_date }}</p>
</div>

<!-- Patients Id Field -->
<div class="form-group">
    {!! Form::label('patients_id', 'Paciente:') !!}
    <p>{{ $schedules->patients->name }}</p>
</div>

<!-- Doctors Id Field -->
<div class="form-group">
    {!! Form::label('doctors_id', 'Médico:') !!}
    <p>{{ $schedules->doctors->name }}</p>
</div>

<!-- Descriptions Field -->
<div class="form-group">
    {!! Form::label('descriptions', 'Descrição:') !!}
    <p>{{ $schedules->descriptions }}</p>
</div>

