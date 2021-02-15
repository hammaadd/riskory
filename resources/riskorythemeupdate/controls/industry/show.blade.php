@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('industry.index')}}">Industries</a></li>
      <li class="breadcrumb-item active" aria-current="page">View</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center mb-4">
    <div class="col-md-8 col-sm-12 col-lg-6">
     <div class="card shadow border-left-primary">
         <div class="card-header text-center">
         <span class="text-center">Industry View  <i class="fas fa-industry text-primary"></i></span>
         </div>
         <div class="card-body">
            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top">
                <h1 class="lead"><span class="badge badge-primary">Name: </span> {{$industry->name}}</h1>
            </div>

            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top">
                <h1 class="lead"><span class="badge badge-primary">Note: </span> {{$industry->note}}</h1>
            </div>

            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top">
                <h1 class="lead"><span class="badge badge-primary">Status: </span>
                    @if($industry->status==0)
                    <span class="text-danger">Inactive</span>
                    @elseif($industry->status==1)
                    <span class="text-success">Active</span>
                    @endif</h1>
            </div>

            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top">
                <h1 class="lead"><span class="badge badge-primary">Parent: </span>
                    @if(!empty($industry->parent_id))
                    {{$industry->parent->name}}
                    @else
                    None
                    @endif
                </h1>
            </div>

            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top">
                <h1 class="lead"><span class="badge badge-primary">Created By: </span> {{$industry->user->name}}</h1>
            </div>

            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top">
                <h1 class="lead"><span class="badge badge-primary">Created At: </span> {{$industry->created_at}}</h1>
            </div>

            

            

            
               
         </div>
         <div class="card-footer text-muted d-flex justify-content-center">
            <form action="{{route('industry.destroy',$industry->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  
               
             
            <a href="{{route('industry.edit',$industry->id)}}" class="btn btn-warning btn-sm mx-2" ><i class="fas fa-pen"></i></a>
            <button class="btn btn-outline-danger btn-sm mx-2" onclick="return confirm('Do you really want to delete this industry?')"><i class="fas fa-trash"></i></button>
        </form>
        </div>
       </div>
    </div>
 </div>




@endsection