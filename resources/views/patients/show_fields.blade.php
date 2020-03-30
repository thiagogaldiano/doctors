<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    <p>{{ $patients->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $patients->email }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Endereço:') !!}
    <p>{{ $patients->address }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'Cidade:') !!}
    <p>{{ $patients->city }}</p>
</div>

<!-- State Field -->
<div class="form-group">
    {!! Form::label('state', 'Estado:') !!}
    <p>{{ $patients->state }}</p>
</div>

<!-- Cep Field -->
<div class="form-group">
    {!! Form::label('cep', 'Cep:') !!}
    <p>{{ $patients->cep }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Telefone:') !!}
    <p>{{ $patients->phone }}</p>
</div>

