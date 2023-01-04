
@extends('backend.layout')

@section('content')
    <section class="content-header">
      <h1>
        Dashboard
        <small>Website Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Website Settings</li>
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

            @if($data =='')

            <div class="col-sm-6">

              <form method="post"action="{{url('addSettings')}}"enctype="multipart/form-data">
               {{csrf_field()}}
               <input type="hidden"name="tbl"value="{{encrypt('setup')}}">
        
               <div class="form-group">    
                  <input type="file"accept="image/*"name="logo"id="file"onchange="loadFile(event)"
                     style="display:none;">
                    <p><label for="file"style="cursor:pointer;">Upload Images</label></p>
                    <p><img id="output"width="200"/></p>
                </div>

                <div class="form-group">
                   <label>Site Title</label>
                   <input type="text"name="meta_title"class="form-control">
                </div>

                <div class="form-group">
                   <label>Address</label>
                   <input type="text"name="address"class="form-control">
                </div>

                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text"name="contact"class="form-control">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email"name="email"class="form-control">
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

                <div class ="form-group">
                  <button class="btn btn-success">Update</button>
                </div>
              
        
              </form>
            </div>
          @else
            <div class="col-sm-6">

             <form method="post"action="{{url('addSettings')}}"enctype="multipart/form-data">
                {{csrf_field()}}
               <input type="hidden"name="tbl"value="{{encrypt('setups')}}">

              <div class="form-group">    
               <input type="file"accept="image/*"name="logo"id="file"onchange="loadFile(event)"
                style="display:none;">
               <p><label for="file"style="cursor:pointer;">Upload Logo</label></p>
               <p><img id="output"src= "{{asset('setups')}}/{{$data->logo}}"/></p>
              </div>
 
              <div class="form-group">
                <label>Site Title</label>
                 <input type="text"name="meta_title"value="{{$data->meta_title}}"class="form-control">
              </div>

               <div class="form-group">
                 <label>Address</label>
                 <input type="text"name="address"value="{{$data->address}}"class="form-control">
                </div>

                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text"name="contact"value="{{$data->contact}}"class="form-control">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email"name="email"value="{{$data->email}}"class="form-control">
                 </div>

                <div class="form-group">
                   <label>Social Profile Links</label>
                </div>

                <div id="socialGroup">
                  @foreach($socials as $social)
                   <div class="form-group socialField">
                   <input type="text"name="social[]"value="{{$social}}" class="form-control">
                   <a href="#"class="btn btn-warning addField"><i class="fa fa-plus"></i></a>
                   </div>
                   @endforeach
                   </div>
      
                 <div class="alert alert-danger" id="socialError">
                    <strong>Sorry!</strong>You've already reach the maximum number of fields for social profile links.
                </div>

                 <div class ="form-group">
                   <button class="btn btn-success">Create</button>
                 </div>


              </form>
           </div>
         @endif
     </div>
</section>  

               <script>
                  var loadFile=function(event){
                      var image=document.getElementById('output');
                      image.src=URL.createObjectURL(event.target.files[0]);
                  };


                  fieldCounter=1;
                    $('.addField').click(function(){
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