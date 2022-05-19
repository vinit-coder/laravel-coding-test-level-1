@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="header ">
        <div class="row">
        <div class="row ">
            
            <label class="h1 col-10" >External Users</label> 
           <a href="/events" class="col-2 center" > <div  role="button" class="button  btn-primary text-center">Home</div></a>
            <hr/>
        </div>
        
        </div>
     
    </div>
    <div class="container">

                    
<table class="table bordered-table">



    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Username</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Website</td>
            <td>Address</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>
   
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->username}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->phone}}</td>
    <td>{{$user->website}}</td>
    <td>{{($user->address->street)}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</table>
</div>

@endsection