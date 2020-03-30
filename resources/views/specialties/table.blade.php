<div class="table-responsive">
    <table class="table" id="specialties-table">
        <thead>
            <tr>
                <th>Descrição</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($specialties as $specialties)
            <tr>
                <td>{{ $specialties->description }}</td>
                <td>
                    {!! Form::open(['route' => ['specialties.destroy', $specialties->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('specialties.show', [$specialties->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('specialties.edit', [$specialties->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
