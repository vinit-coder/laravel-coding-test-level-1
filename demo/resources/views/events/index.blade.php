<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
</head>
<body>
    <div class="header ">
     <h1>Events List</h1>
    </div>
    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                
                <th>Name</th>
                <th>Slug</th>
                <th>Start At</th>
                <th>End At</th>
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>



   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
<script>
   
   

    $('#table').DataTable( {
                "processing": true,
                "serverSide": false,
                "ajax": "{{route('events.index')}}",
                "columns": [
                    
                    { "data": "name" },
                    { "data": "slug" },
                    { "data": "startAt" },
                    { "data": "endAt" },
                    { "data": "id",
                        render: (data,type,row) => {
                            
                            return "<a role ='button' class = 'edit_btn' href ='/events/"+data+"' data-id='"+data+"'>Edit</a> | <a role = 'button' class = 'delete_btn'  data-id='"+data+"'>Delete</a>";
                        }
                    }

                ]
 } );


</script>

</body>
</html>