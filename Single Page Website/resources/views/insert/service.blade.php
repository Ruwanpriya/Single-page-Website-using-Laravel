
@extends('backend.layout')

@section('content')
    <section class="content-header">
      <h1>
        Dashboard
        <small>Add new Service</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Add new Service</li>
      </ol>
    </section>

    <section class="content">
      

      <div class="row">
           @if(Session::get('message'))
              <div class="col-sm-12">
                <div class="alert alert-success alert-dismissable">
                  {{session::get('message')}}
                  <a class="close"data-dismiss="alert">&times;</a>

                </div>
             </div>
           @endif

            @if($errors->any())
              <div class="alert alert-danger alert-dismissable">
              <a class="close"data-dismiss="alert">&times;</a>
                <ul>
                 @foreach ($errors->all() as $error)
                 <li> {{ $error }}</li>
                
                 @endforeach
                 
                </ul>
                
              </div>
            @endif

            <div class="col-sm-12">

             <form method="post"action="{{url('addService')}}">
                {{csrf_field()}}
               <input type="hidden"name="tbl"value="{{encrypt('services')}}">

              <div class="form-group">
                <label>Title</label>
                 <input type="text"name="title"placeholder=""class="form-control">
              </div>

               <div class="form-group">
                 <label>Description</label>
                 <textarea name="description"class="form-control"rows="10"></textarea>
                </div>

                
                <div class="form-group">
                  <label>Icon</label>
                  <input type="text"name="icon"class="form-control">
                </div>

                <div class="form-group">
                   <label>Status</label>
                  <select class="form-control"name="status"> 
                    
                    <option>on</option>
                    <option>off</option>
                    
                  </select>
                </div>

                
                
                   <div class ="form-group">
                   <button class="btn btn-success">Add Service</button>
                 </div>
              </form>
           </div>
         
     </div>
</section>  

               

<script src="{{asset('ckeditor\ckeditor.js')}}"></script>
<script>
  CKEDITOR.replace('description');

 </script>               
                 
                 

                 
@stop   