<!--     TEMPLATE     -->
@extends('layouts.app')
@section('content')
<div class="container">
<!---------------------->

<form action="{{ url('/employee/'.$empleado->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('employee.form',['modo'=>'Editar'])

</form>

</div>
@endsection