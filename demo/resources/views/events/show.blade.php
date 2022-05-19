@extends('layouts.app')

@section('content')
<div class="container mt-30">
    <div class="row" >
    <div class="row ">
            
            <label class="h1 col-10" >Event Details</label> 
           <a href="{{route('home')}}" class="col-2 center" > <div  role="button" class="button  btn-primary text-center">Home</div></a>
            <hr/>
        </div>
<form class="was-validated" action="" method=""> 
 
    @if(isset($event))
    
    <input type="hidden" value="{{$event->id}}" name="id">
    @endif
  <div class="mb-3">
    <label for="validationText" class="form-label">Event Name</label>
    <input  type ="text" class="form-control " value="{{$event->name}}" disabled/>
    <div class="invalid-feedback">
      Please Enter Event Name.
    </div>
  </div>
 
  <div class="mb-3">
    <label for="validationText" class="form-label">Event Start At</label>
    <input  type ="text" class="form-control" value="{{$event->startAt}}" disabled/>
    <div class="invalid-feedback">
      Please Enter Event start DateTime.
    </div>
  </div>

  <div class="mb-3">
    <label for="validationText" class="form-label">Event End At</label>
    <input  type ="text" class="form-control"  value="{{$event->endAt}}" disabled/>
    <div class="invalid-feedback">
      Please Enter Event End DateTime.
    </div>
  </div>
  
  <div class="mb-3">
    <label for="validationText" class="form-label">Event Slug</label>
    <input  type ="text" class="form-control " id="event_slug" value="{{$event->slug}}" disabled />
  </div>
  
</form>
    </div>
</div>
@endsection