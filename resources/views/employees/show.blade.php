@extends('dashboard')
@section('content')

<div class="card-header">
    <button type="button" class="btn btn-info" style="float: right"; onclick="window.location='{{ URL::route('employees'); }}'" ><i class="fa fa-arrow-left"></i> Back </button>
</div>
<div class="card-body">
   <h5>  Employee Details </h5>
</div>


                                          
@endsection