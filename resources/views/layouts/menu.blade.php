@permission('view.users')
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Usuários</span></a>
</li>
@endpermission

@permission('view.doctors')
<li class="{{ Request::is('doctors*') ? 'active' : '' }}">
    <a href="{{ route('doctors.index') }}"><i class="fa fa-edit"></i><span>Médicos</span></a>
</li>
@endpermission

@permission('view.specialties')
<li class="{{ Request::is('specialties*') ? 'active' : '' }}">
    <a href="{{ route('specialties.index') }}"><i class="fa fa-edit"></i><span>Especialidades</span></a>
</li>
@endpermission

@permission('view.patients')
<li class="{{ Request::is('patients*') ? 'active' : '' }}">
    <a href="{{ route('patients.index') }}"><i class="fa fa-edit"></i><span>Pacientes</span></a>
</li>
@endpermission

@permission('view.schedules')
<li class="{{ Request::is('schedules*') ? 'active' : '' }}">
    <a href="{{ route('schedules.index') }}"><i class="fa fa-edit"></i><span>Agendamentos</span></a>
</li>
@endpermission

@role('admin')
<li>
    <a href="/doctors-json" target="_blank"><i class="fa fa-edit"></i><span>Doctors JSON</span></a>
</li>
@endrole


