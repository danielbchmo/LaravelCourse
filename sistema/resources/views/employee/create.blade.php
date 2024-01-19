Creation Employee Form
<form action=" {{ url('/employee') }} " method="post" enctype="multipart/form-data">
    @csrf

    <label for="Nombre">Nombre </label>
    <input type="text" name="Nombre"> <br>

    <label for="ApellidoPaterno">Apellido Paterno </label>
    <input type="text" name="ApellidoPaterno"> <br>

    <label for="ApellidoMaterno">Apellido Materno </label>
    <input type="text" name="ApellidoMaterno"> <br>

    <label for="Correo">Correo </label>
    <input type="email" name="Correo"> <br>

    <label for="Foto">Foto </label>
    <input type="file" name="Foto"> <br>

    <input type="submit" value="Guardar datos">
</form>