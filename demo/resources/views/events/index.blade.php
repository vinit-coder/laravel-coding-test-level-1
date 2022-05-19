
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="header ">
        <div class="row">
        <div class="row ">
            
            <label class="h1 col-10" >Events List</label> 
           <a href="{{route('create.event')}}" class="col-2 center" > <div  role="button" class="button  btn-success text-center">Add New Event</div></a>
            <hr/>
        </div>
        
        </div>
     
    </div>
    <div class="container">

    <table id="table" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>S.N</th>
            <th>Name</th>
                <th>Slug</th>
                <th>Start At</th>
                <th>End At</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
    </div>
</div>
@endsection

@push('js')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>   
   var table = $('#table').DataTable({
        processing: true,
        serverSide: false,
        ajax: "{{ route('index.events') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'name'},
            {data: 'slug'},
            {data: 'startAt'},
            {data: 'endAt'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
 
</script>
@endpush