<nav style="background-color: #000000;" class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm p-3 mb-5">

    <div class="dropdown" id="user-nav">
        <a style="text-decoration:none; color: white" class="nav-link dropdown-toggle" href="#" id="navbarUsuario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->login}}
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @csrf
            <li><a class="dropdown-item" href="{{ route ('logout')}}">Sair</a></li>
            <li><a class="dropdown-item" href="{{ route('home')}}">Consultas</a></li>

            <li><a class="dropdown-item" href="{{ route ('listaPaciente')}}">Pacientes</a></li>

            @if(Auth::user()->hasRole('admin'))
            <li><a class="dropdown-item" href="{{ route ('listaMedico')}}">Médicos</a></li>
            @endif
        </ul>
    </div>
</nav>