
@extends('backend.layout')

@section('content')
    <section class="content-header">
      <h1>
        Dashboard
        <small>Add New Team Member</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Add New Team Member</li>
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

             <form method="post"action="{{url('addMember')}}"enctype="multipart/form-data">
                {{csrf_field()}}
               <input type="hidden"name="tbl"value="{{encrypt('teams')}}">

              <div class="form-group">
                <label>Name</label>
                 <input type="text"name="name"placeholder=""class="form-control">
              </div>

              <div class="form-group">
                <label>Designation</label>
                 <input type="text"name="designation"placeholder=""class="form-control">
              </div>

               <div class="form-group">
                 <label>Intro</label>
                 <textarea name="intro"class="form-control"rows="10"></textarea>
                </div>

                <div class="form-group">    
               <input type="file"accept="image/*"name="logo"id="file"onchange="loadFile(event)"
                style="display:none;">
               <p><label for="file"style="cursor:pointer;">Upload Profile Image</label></p>
               <p><img id="output"width="200"/></p>
              </div>


              <div class="form-group">
                  <label>Social Profile Links</label>
                </div>

                <div id="socialGroup">
                  <div class="form-group socialField">
                     <input type="text"name="social[]" class="form-control">
                     <a href="#"class="btn btn-warning addField"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
                    
                    <div class="alert alert-danger" id="socialError">
                      <strong>Sorry!</strong>You've already reach the maximum number of fields for social profile links.
                    </div>
                

                

                <div class="form-group">
                   <label>Status</label>
                  <select class="form-control"name="status"> 
                    
                    <option>on</option>
                    <option>off</option>
                    
                  </select>
                </div>

                
                
                   <div class ="form-group">
                   <button class="btn btn-success">Add Member</button>
                 </div>
              </form>
           </div>
         
     </div>
</section>  

               <script>
                  var loadFile=function(event){
                      var image=document.getElementById('output');
                      image.src=URL.createObjectURL(event.target.files[0]);
                  };
               </script>

<script src="{{asset('ckeditor\ckeditor.js')}}"></script>
<script>
  CKEDITOR.replace('description');

 </script>               
                 <script>
                 fieldCounter=1;
                    $('.addField').click(function(e){
                        e.preventDefault();
                        fieldCounter++;
                        if( fieldCounter <= 5){
                            
                      var newField = $(document.createElement('div')).attr('class','form-group');
                      newField.after().html('<label>Social Profile Links</label><input type="text" name="social[]"class="form-control"></div>');
                      newField.appendTo('#socialGroup');


                        }else{
                            $('#socialError').show();
                        }

                    })
               </script>

                <style>
                    .socialField{
                        position:relative;}

                    .addField{
                        position:absolute;
                        top:0;
                        right:0;}

                        #socialError{
                            display:none;

                        }
                 </style>            

                 
@stop   