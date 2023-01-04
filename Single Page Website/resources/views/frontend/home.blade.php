<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>infoTECH</title>
<link rel="icon" href="{{url('setups/favic.png')}}/{{$setups->logo}}" type="image/png">
<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css"> 
<link href="{{asset('frontend/css/font-awesome.css')}}" rel="stylesheet" type="text/css"> 
<link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet" type="text/css">
 

<script src="{{asset('js/respond-1.1.0.min.js')}}"></script>
<script src="{{asset('js/html5shiv.js')}}"></script>
<script src="{{asset('js/html5element.js')}}"></script>


<script type="text/javascript" src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-scrolltofixed.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.nav.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.isotope.js')}}"></script>
<script type="text/javascript" src="{{asset('js/wow.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

</head>




<body>
  

<!--Header_section-->
<header id="header_wrapper">
  <div class="container">
    <div class="header_box">
      <div class="logo"><a href="#"><img src="{{asset('setups')}}/{{$setups->logo}}" alt="logo"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
			  <li class="active"><a href="#hero_section" class="scroll-link">Home</a></li>
        @foreach($cats as $cat)
			  <li class="text-uppercase"><a href="#{{$cat->slug}}" class="scroll-link">{{$cat->title}}</a></li>
        @endforeach
        <li class="text-uppercase"><a href="#contact" class="scroll-link">contact</a></li>
			 
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 

<!--Hero_Section-->
<section id="hero_section" class="top_cont_outer">
  <div class="hero_wrapper">
    <div class="container">
      <div class="hero_section">
        <div class="row">
          <div class="col-lg-5 col-sm-7">
            <div class="top_left_cont zoomIn wow animated"> 
              <h2 class="text-uppercase">{{$home->title}}</h2>
              <p>{!!$home->description!!}</p>
              <a href="{{$home->link}}" class="read_more2">Read more</a> </div>
          </div>
          <div class="col-lg-7 col-sm-5">
			<img src="{{asset('contents')}}/{{$home->logo}}" class="zoomIn wow animated" alt="" />
		  </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Hero_Section--> 
</br>
<section id="{{$about->slug}}"><!--Aboutus-->
<div class="inner_wrapper">
  <div class="container">
    <h2>About Us</h2>
    <div class="inner_section">
	<div class="row">
      <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"><img src="{{asset('contents')}}/{{$about->logo}}" class="img-circle delay-03s animated wow zoomIn" alt=""></div>
      	<div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
        	<div class=" delay-01s animated fadeInDown wow animated">
			<h3>{{$about->title}}</h3><br/> 
            {!!$about->description!!}

</div>
<div class="work_bottom"> <span>Want to know more..</span> <a href="{{$about->link}}" class="contact_btn">Contact Us</a> </div>       
	   </div>
      	
      </div>
	  
      
    </div>
  </div> 
  </div>
</section>
<!--Aboutus--> 




<!--Service-->
<section  id="{{$services->slug}}">
  <div class="container">
    <h2>Services</h2>
    <div class="service_wrapper">
      <div class="row">
        @foreach ($services as $service)
        <div class="col-lg-4">
          <div class="service_block">
            <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa fa-{{$service->icon}}"></i></span> </div>
            <h3 class="animated fadeInUp wow">{{$service->title}}</h3>
            <p class="animated fadeInDown wow">{!! $service->description !!}</p>
          </div>
        </div>
        @endforeach
      </div>
	    
    </div>
  </div>
</section>
<!--Service-->




<!-- Portfolio -->

<section id="{{$portfolio->slug}}" class="content"> 
  
  <!-- Container -->
  <div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
      <h2>Portfolio</h2>
    </div>
    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
  <div class="portfolio-top"></div>
  
  <!-- Portfolio Filters -->
  <div class="portfolio"> 
    
    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li><a id="all" href="#" data-filter="*" class="active">
          <h5>All</h5>
          </a></li>
          @foreach($portcats as $cats)
        <li><a class="" href="#" data-filter=".{{$cats->slug}}">
          <h5>{{$cats->title}}</h5>
          </a></li>
          @endforeach
        
      </ul>
    </div>
    <!--/Portfolio Filters --> 
    
    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper"> 
      
       @foreach($portfolio as $port)
      <!-- Portfolio Item -->
      <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   {{$port->class}} isotope-item">
        <div class="portfolio_img"> <img src="{{asset('portfolios')}}/{{$port->logo}}"  alt="Portfolio 1"> </div>        
        <div class="item_overlay">
          <div class="item_info"> 
            <h4 class="project_name">{{$port->title}}</h4>
          </div>
        </div>
        </div>
      <!--/Portfolio Item --> 
      @endforeach
      
     
      <!--/Portfolio Item --> 
      
    </div>
    <!--/Portfolio Wrapper --> 
    
  </div>
  <!--/Portfolio Filters -->
  
  <div class="portfolio_btm"></div>
  
  
  <div id="project_container">
    <div class="clear"></div>
    <div id="project_data"></div>
  </div>
 
  
</section>
<!--/Portfolio --> 

<section class="page_section" id="{{$clients->slug}}"><!--page_section-->
  <h2>Clients</h2>
<!--page_section-->
<div class="client_logos"><!--client_logos-->
  <div class="container">
    <ul class="fadeInRight animated wow">
      @foreach ($clients->take(4) as $client)
      <li><a href="{{$client->link}}"><img src="{{asset('clients')}}/{{$client->logo}}" alt=""></a></li>
      @endforeach
    </ul>
  </div>
</div>
</section>
<!--client_logos-->

<section class="page_section team" id="{{$teams->slug}}"><!--main-section team-start-->
  <div class="container">
    <h2>Team</h2>
    <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
    <div class="team_section clearfix">
      @foreach ($teams as $team)
      <div class="team_area">
        <div class="team_box wow fadeInDown delay-03s">
          <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
          <img src="{{asset('teams')}}/{{$team->logo}}" alt="">
          <ul>
            @foreach($team->teamurl as $key=>$url)
            <li><a href="{{$url}}" class="fa fa-{{$team->font[$key]}}"></a></li>
            @endforeach
            
          </ul>
        </div>
        <h3 class="wow fadeInDown delay-03s">{{$team->name}}</h3>
        <span class="wow fadeInDown delay-03s">{{$team->designation}}</span>
        <p class="wow fadeInDown delay-03s">{{$team->intro}}</p>
      </div>
      @endforeach
     
    </div>
  </div>
</section>
<!--/Team-->
<!--Footer-->
<footer class="footer_wrapper" id="contact">
  <div class="container">
    <section class="page_section contact" id="contact">
      <div class="contact_section">
        <h2>Contact Us</h2>
        <div class="row">
          <div class="col-lg-4">
            
          </div>
          <div class="col-lg-4">
           
          </div>
          <div class="col-lg-4">
          
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 wow fadeInLeft">	
		 <div class="contact_info">
                            <div class="detail">
                                <h4>InfoTech HQ</h4>
                                <p>{{$setups->address}}</p>
                            </div>
                            <div class="detail">
                                <h4>call us</h4>
                                <p>{{$setups->contact}}</p>
                            </div>
                            <div class="detail">
                                <h4>Email us</h4>
                                <p>{{$setups->email}}</p>
                            </div> 
                        </div>
       		  
			  
          
          <ul class="social_links">
            @foreach($socials as $key=>$social)
            <li class="{{$fa[$key]}}"><a href="{{$social}}"><i class="fa fa-{{$fa[$key]}}"></i></a></li>
            @endforeach
            
          </ul>
        </div>
        <div class="col-lg-8 wow fadeInLeft delay-06s">
              <form method="post"action="{{url('sendMessage#contact')}}">
               {{csrf_field()}}
               <input type="hidden"name="tbl"value="{{encrypt('contacts')}}">
        
               

                <div class="form-group">
                  
                   <input class="input-text" type="text"name="name"placeholder="Your Name *"class="form-control">
                   @error('name')
                   <div class="alert alert-danger  role=alert ">{{$message}}
                   <a class="close"data-dismiss="alert">&times;</a>
                   </div>
                   @enderror
                </div>

                <div class="form-group">
                  
                   <input class="input-text"type="email"name="email"placeholder="Your Email *"class="form-control">
                   @error('email')
                   <div class="alert alert-danger  role=alert ">{{$message}} 
                    <a class="close"data-dismiss="alert">&times;</a></div>
                   @enderror
                </div>

                <div class="form-group">
                  
                   <textarea class="input-text text-area"name="message"placeholder="Your Message *"class="form-control"></textarea>
                   @error('message')
                   <div class="alert alert-danger  role=alert ">{{$message}}
                   <a class="close"data-dismiss="alert">&times;</a>
                   </div>
                   @enderror
                </div>


                <div class ="form-group">
                
                  <button class="input-btn">Send Message</button>
                  @if(Session::get('message'))
              <div class="col-sm-8">
                <div class="alert alert-success alert-dismissable">
                  {{session::get('message')}}
                  <a class="close"data-dismiss="alert">&times;</a>
                </div>
              </div>
                  @endif
                
                </div>
              </form>
              
            </div>
        </div>
      </div>
    </section>
  </div>
  <div class="container">
    <div class="footer_bottom"><span>Copyright © {{date('Y')}} by <a href="https://InfoTech.com">InfoTech</a></span> </div>
  </div>


  <style>
 .service_block{margin-bottom: 30px;}
 .error{font-weight:bold;}
 #loader{display:none;}
    </style>


  <script>
    $('#sendMessage').click(function(){
      checkName();
      checkEmail();
      checkMessage();
      if (userError ==false && emailError ==false &&  messageError==false){
       alert('success');
       $.ajax({
        type:"get",
        url="{{url('sendMesage')}}"
        data:{name:usename,email:email,message:message},
        beforeSend :function(){
          $('#loader').show();
        },
        success:function(data){
          $("#success-message").html(data);
          setTimeout(function(){
            $("#success-message").fadeOut(slow);
          },10000);
          $("#your-name").val('');
          $("#your-email").val('');
          $("#your-message").val('');
        },
        complete :function(data){
          $('#loader').hide();
        }
       })
      }
        else{
          return false;

        }
      
    })
    $('#your-name').focusout(function(){
      checkName();
    })
    $('#your-email').focusout(function(){
      checkEmail();
    })
    $('#your-message').focusout(function(){
      checkMessage();
    })
    function checkName(){
       username=$('#your-name').val();
       if (username.length<3){
        userError=true;
        $('.userError').html('<p>Invalid Username</p>');
       }
       else{
        userError=false;
        $('.userError').html('');
       }
    }
    function checkEmail(){
       email=$('#your-email').val();
       apos=email.indexOf('@');
       dotpos=email.lastIndexOf('.');
       lastpos=email.length-1;
       
       if(email.length<5||apos<2||dotpos-apos<2||lastpos-dotpos<2||lastpos-dotpos>3){
        emailError=true;
        $('.emailError').html('<p>Invalid Email</p>');
       }
       else{
        emailError=false;
        $('.emailError').html('');
       }
       }
    
    function checkMessage(){
      message=$('#your-message').val();
       if (message.length<2){
        messageError=true;
        $('.messageError').html('<p>Message too short</p>');
       }
       else{
        messageError=false;
        $('.messageError').html('');
       }
    }
  </script>

</footer>



</body>
</html>