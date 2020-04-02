<div class="table-responsive">
    <table class="table" id="schedules-table">
        <thead>
            <tr>
                <th>Data da consulta</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($schedules as $schedules)
            <tr>
                <td>{{ $schedules->consultation_date->format('d/m/Y H:i:s') }}</td>
                <td>{{ $schedules->patients->name }}</td>
                <td>{{ $schedules->doctors->name }}</td>
                <td>
                    {!! Form::open(['route' => ['schedules.destroy', $schedules->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('schedules.show', [$schedules->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('schedules.edit', [$schedules->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
