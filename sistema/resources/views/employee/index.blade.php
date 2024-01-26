@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif

<a href=" {{ url('employee/create') }}">Registrar nuevo empleado</a>
<br><br>

<table class="table table-light">

  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>Foto</th>
      <th>Nombre</th>
      <th>Apellido Paterno</th>
      <th>Apellido Materno</th>
      <th>Correo</th>
      <th>Acciones</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($empleados as $empleado)
    <tr>
      <td>{{ $empleado->id }}</td>

      <td>
        <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="" width="100px">
      </td>
      
      <td>{{ $empleado->Nombre }}</td>
      <td>{{ $empleado->ApellidoPaterno }}</td>
      <td>{{ $empleado->ApellidoMaterno }}</td>
      <td>{{ $empleado->Correo }}</td>
      <td>
        
        <a href="{{ url('/employee/'.$empleado->id.'/edit') }}">
        Editar
        </a>
        |

        <form action="{{ url('/employee/'.$empleado->id) }} " method="post">
          @csrf
          {{ method_field('DELETE') }}
          <input type="submit" value="Borrar" onclick="return confirm('Quieres borrar?')">

        </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>