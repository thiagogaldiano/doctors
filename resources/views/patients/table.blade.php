<div class="table-responsive">
    <table class="table" id="patients-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($patients as $patients)
            <tr>
                <td>{{ $patients->name }}</td>
                <td>{{ $patients->email }}</td>
                <td>{{ $patients->phone }}</td>
                <td>
                    {!! Form::open(['route' => ['patients.destroy', $patients->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('patients.show', [$patients->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('patients.edit', [$patients->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
