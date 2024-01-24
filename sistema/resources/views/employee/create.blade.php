<form action=" {{ url('/employee') }} " method="post" enctype="multipart/form-data">
    @csrf
    @include('employee.form')
</form>