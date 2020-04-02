<!-- Consultation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('consultation_date', 'Data da consulta:') !!}
    {!! Form::text('consultation_date', null, ['class' => 'form-control','id'=>'consultation_date']) !!}
</div>

<!-- Patients Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patients_id', 'Paciente:') !!}
    {!! Form::select('patients_id', array(), null, ['class' => 'form-control','id'=>'patients_id']) !!}
</div>

<!-- Doctors Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doctors_id', 'Médico:') !!}
    {!! Form::select('doctors_id', array(), null, ['class' => 'form-control','id'=>'doctors_id']) !!}
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

        $("#doctors_id").select2({
            placeholder: "Selecione o médico",
            ajax: {
                url: '/doctors-ajax',
                dataType: 'json',
                data: function (params) {
                    var query = {
                        term: params.term
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $("#patients_id").select2({
            placeholder: "Selecione o paciente",
            ajax: {
                url: '/patients-ajax',
                dataType: 'json',
                data: function (params) {
                    var query = {
                        term: params.term
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

    </script>
@endpush
