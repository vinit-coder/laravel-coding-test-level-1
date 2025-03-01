
@extends('layouts.app')

@section('content')
<div class="container mt-30">
    <div class="row" >
    <h1>Edit Event Details</h1>
<form class="was-validated" action="{{route('update.event', $event->id)}}" method="POST"> 
  @csrf
  @method('PUT')
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

  @php
$startAt = new DateTime($event->startAt);
$startAt = $startAt->format('Y-m-d\TH:i:s');
$endAt = new DateTime($event->endAt);
$endAt= $endAt->format('Y-m-d\TH:i:s');

 @endphp

 
  <div class="mb-3">
    <label for="validationText" class="form-label">Event Start At</label>
    <input  type ="datetime-local" class="form-control " id="start_at" value="{{$startAt}}"  name="startAt" placeholder="required Date-Time" required/>
    <div class="invalid-feedback">
      Please Enter Event start DateTime.
    </div>
  </div>

  <div class="mb-3">
    <label for="validationText" class="form-label">Event End At</label>
    <input  type ="datetime-local" class="form-control " id="end_at" placeholder="required Date-Time"  value="{{$endAt}}" name="endAt" required/>
    <div class="invalid-feedback">
      Please Enter Event End DateTime.
    </div>
  </div>

  <div class="mb-3">
    <label for="validationText" class="form-label">Event Slug</label>
    <input  type ="text" class="form-control " id="event_slug" value="{{$event->slug}}" name="slug" placeholder="Slug" />
  </div>
  <div class="mb-3">
    <div class="row">
    <div class="col-10">
    <button class="btn btn-primary " type="submit" >Submit form</button>
    </div>
   
    <a role="button" width="100%" href="/" class="btn btn-danger col-2"  >Cancel</a>


    </div>
    
  </div>
</form>
    </div>
</div>
@endsection