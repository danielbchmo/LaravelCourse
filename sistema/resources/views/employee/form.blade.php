<h1> {{ $modo }} empleado</h1>

<div class="form-group">
<label for="Nombre">Nombre </label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:'' }}">
</div>

<div class="form-group">
    <label for="ApellidoPaterno">Apellido Paterno </label>
    <input type="text" class="form-control" name="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:'' }}">
</div>

<div class="form-group">
    <label for="ApellidoMaterno">Apellido Materno </label>
    <input type="text" class="form-control" name="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:'' }}">
</div>

<div class="form-group">
    <label for="Correo">Correo </label>
    <input type="email" class="form-control" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}">
</div>

<div class="form-group">
    <label for="Foto">Foto </label>
    @if(isset($empleado->Foto))
        <img src=" {{ asset('storage').'/'.$empleado->Foto }} " alt="" width="100px">
    @endif
    <input class="form-control" type="file" name="Foto" value="">
</div>

    <br>
    <input type="submit" value="{{ $modo }} datos" class="btn btn-dark">
    <a href=" {{ url('employee/') }}" class="btn btn-primary">Regresar</a>