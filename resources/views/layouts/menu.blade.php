<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Usuários</span></a>
</li>

<li class="{{ Request::is('doctors*') ? 'active' : '' }}">
    <a href="{{ route('doctors.index') }}"><i class="fa fa-edit"></i><span>Médicos</span></a>
</li>

<li class="{{ Request::is('specialties*') ? 'active' : '' }}">
    <a href="{{ route('specialties.index') }}"><i class="fa fa-edit"></i><span>Especialidades</span></a>
</li>

<li class="{{ Request::is('patients*') ? 'active' : '' }}">
    <a href="{{ route('patients.index') }}"><i class="fa fa-edit"></i><span>Pacientes</span></a>
</li>

<li class="{{ Request::is('schedules*') ? 'active' : '' }}">
    <a href="{{ route('schedules.index') }}"><i class="fa fa-edit"></i><span>Agendamentos</span></a>
</li>

