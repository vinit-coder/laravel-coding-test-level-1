<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="header">
       
    </div>

<div class="container mt-30">
    <div class="row" >
    <h1>Edit Event Details</h1>
<form class="was-validated">
    @if(isset($event))
    
    <input type="hidden" value="{{$event->id}}" name="id">
    @endif
  <div class="mb-3">
    <label for="validationText" class="form-label">Event Name</label>
    <input  type ="text" class="form-control " id="event_name" name= "name" value="{{$event->name}}" placeholder="required name" required/>
    <div class="invalid-feedback">
      Please Enter Event Name.
    </div>
  </div>
 
  <div class="mb-3">
    <label for="validationText" class="form-label">Event Start At</label>
    <input  type ="datetime-local" class="form-control " id="start_at" value=""  name="startAt" placeholder="required Date-Time" required/>
    <div class="invalid-feedback">
      Please Enter Event start DateTime.
    </div>
  </div>

  <div class="mb-3">
    <label for="validationText" class="form-label">Event End At</label>
    <input  type ="datetime-local" class="form-control " id="end_at" placeholder="required Date-Time" name="endAt" required/>
    <div class="invalid-feedback">
      Please Enter Event End DateTime.
    </div>
  </div>
  
  <div class="mb-3">
    <label for="validationText" class="form-label">Event Slug</label>
    <input  type ="text" class="form-control " id="event_slug" value="{{$event->slug}}" name="slug" placeholder="Slug" />
  </div>
  <div class="mb-3">
    <button class="btn btn-primary" type="submit" disabled>Submit form</button>
  </div>
</form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>