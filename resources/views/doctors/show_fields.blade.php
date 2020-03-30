<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    <p>{{ $doctors->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $doctors->email }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Endereço:') !!}
    <p>{{ $doctors->address }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'Cidade:') !!}
    <p>{{ $doctors->city }}</p>
</div>

<!-- State Field -->
<div class="form-group">
    {!! Form::label('state', 'Estado:') !!}
    <p>{{ $doctors->state }}</p>
</div>

<!-- Cep Field -->
<div class="form-group">
    {!! Form::label('cep', 'Cep:') !!}
    <p>{{ $doctors->cep }}</p>
</div>

<!-- Specialty Id Field -->
<div class="form-group">
    {!! Form::label('specialty_id', 'Specialtys:') !!}
    <p>{{ $doctors->specialty->description }}</p>
</div>

