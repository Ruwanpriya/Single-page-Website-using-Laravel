
@extends('backend.layout')
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')
    <section class="content-header">
      <h1>
        Dashboard
        <small>Categories</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Categories</li>
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

           

            <div class="col-sm-6">

              <form method="post"action="{{url('addCategory')}}">
               {{csrf_field()}}
               <input type="hidden"name="tbl"value="{{encrypt('categories')}}">
        
               

                <div class="form-group">
                   <label>Title</label>
                   <input type="text"name="title"class="form-control">
                </div>

                <div class="form-group">
                   <label>Status</label>
                  <select class="form-control"name="status">
                    <option>on</option>
                    <option>off</option>
                  </select>
                </div>

                <div class ="form-group">
                  <button class="btn btn-success">Add Category</button>
                </div>
              
              </form>
            </div>


            <div class="col-sm-5">
              <p><strong>View All Categories</strong></p>
                   <table class="table table-striped table-dark">
                     <thead>
                       <tr>
                         <th>SN</th>
                         <th>Title</th>
                         <th>Status</th>
                         <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                      @foreach($data as $key=>$category)
                     <tr>
                         <td>{{++$key}}</td>
                         <td>{{$category->title}}</td>
                         <td>{{$category->status}}</td>
                         <td><a href="{{url('editCategory')}}/{{$category->cid}}"class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>&nbsp;
                         <a href="{{url('deleteCategory')}}/{{$category->cid}}"class="btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                     </tr>
                     @endforeach
                     </tbody>

                   </table>
            </div>
          
      </div>
</section>  

                
@stop  


