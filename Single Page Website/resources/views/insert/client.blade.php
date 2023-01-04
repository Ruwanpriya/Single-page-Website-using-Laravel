
@extends('backend.layout')

@section('content')
    <section class="content-header">
      <h1>
        Dashboard
        <small>Add New Client</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Add New Client</li>
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

             <form method="post"action="{{url('addClient')}}"enctype="multipart/form-data">
                {{csrf_field()}}
               <input type="hidden"name="tbl"value="{{encrypt('clients')}}">

              

               

                <div class="form-group">    
               <input type="file"accept="image/*"name="logo"id="file"onchange="loadFile(event)"
                style="display:none;">
               <p><label for="file"style="cursor:pointer;">Upload Client Image</label></p>
               <p><img id="output"width="200"/></p>
              </div>


              <div class="form-group">
                <label>Link</label>
                 <input type="text"name="link"class="form-control">
              </div>

                

                <div class="form-group">
                   <label>Status</label>
                  <select class="form-control"name="status"> 
                    
                    <option>on</option>
                    <option>off</option>
                    
                  </select>
                </div>

                
                 
                   <div class ="form-group">
                   <button class="btn btn-success">Add Client</button>
                 </div>
              </form>
           </div>
           <div class="col-sm-6">
              <p><strong>View All Clients</strong></p>
                   <table class="table table-bordered">
                     <thead>
                       <tr>
                         <th>SN</th>
                         <th>Image</th>
                         <th>Link</th>
                         <th>Status</th>
                         <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                      @if(count($data) > 0)
                      @foreach($data as $key=>$client)
                     <tr>
                         <td>{{++$key}}</td>
                         <td><img src="{{asset('clients')}}/{{$client->logo}}"></td>
                         <td>{{$client->link}}</td>
                         <td>{{$client->status}}</td>
                         <td><a href="{{url('editclient')}}/{{$client->clid}}"class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>&nbsp;
                         <a href="{{url('deleteClient')}}/{{$client->clid}}"class="btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                     </tr>
                     @endforeach
                     @else
                     <tr>
                        <td colspan="4">No Clients Found</td>
                     </tr>
                     @endif
                     </tbody>

                   </table>
            </div>
     </div>
</section>  

               <script>
                  var loadFile=function(event){
                      var image=document.getElementById('output');
                      image.src=URL.createObjectURL(event.target.files[0]);
                  };
               </script>

               <style>
                .table{
                  background:#333;
                  color: #fff;
                }
               </style>


 
                 

                 
@stop   