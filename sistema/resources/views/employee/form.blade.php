<label for="Nombre">Nombre </label>
    <input type="text" name="Nombre" value="{{ $empleado->Nombre }}"> <br>

    <label for="ApellidoPaterno">Apellido Paterno </label>
    <input type="text" name="ApellidoPaterno" value="{{ $empleado->ApellidoPaterno }}"> <br>

    <label for="ApellidoMaterno">Apellido Materno </label>
    <input type="text" name="ApellidoMaterno" value="{{ $empleado->ApellidoMaterno }}"> <br>

    <label for="Correo">Correo </label>
    <input type="email" name="Correo" value="{{ $empleado->Correo }}"> <br>

    <label for="Foto">Foto </label>
    {{ $empleado->Foto }}
    
    <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="" width="100px">

    <input type="file" name="Foto" value=""> <br>

    <input type="submit" value="Guardar datos"><br>
