@extends ('layouts.app')

@section('content')


<hr>
<div class="container">
	<div class="row">
  		<div class="col-sm-10"><h1>{{$student->first_name}}</h1>
        @if (Auth::user()->id == $student->user_id)

        @else
          {!! Form::open(['route' => ['matches.store'], 'method' => 'POST']) !!}

          {!! Form::submit('Match', ['class' => 'btn btn-success btn-lg', 'style'=>'margin-top: 20px;']) !!}

          {!! Form::close() !!}
        @endif
      </div>
        @if (Storage::disk('local')->has($student->last_name . '-' . $student->id . '.jpg'))
          <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="{{ route('student.photo', ['filename' => $student->last_name . '-' . $student->id . '.jpg']) }}"></a></div>
        @endif
        
      


  </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              
          <ul class="list-group">
            <li class="list-group-item text-muted">Profile</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Education Level</strong></span> {{$student->education_level}}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Date Of Birth</strong></span> {{$student->date_of_birth}}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Phone Number</strong></span> {{$student->phone_number}}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Address</strong></span> {{$student->address}}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Zip Code</strong></span> {{$student->zip}}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Interested subject</strong></span> {{$student->subject}}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Member Since</strong></span> {{date('M j, Y', strtotime($student->created_at)) }}</li>
          </ul> 

          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
          
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home" data-toggle="tab">Matching Histories</a></li>
            <li><a href="#messages" data-toggle="tab">Messages</a></li>
          </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Label 1</th>
                      <th>Label 2</th>
                      <th>Label 3</th>
                      <th>Label </th>
                      <th>Label </th>
                      <th>Label </th>
                    </tr>
                  </thead>
                  <tbody id="items">
                    <tr>
                      <td>1</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                    </tr>
                     <tr>
                      <td>8</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                    </tr>
                  </tbody>
                </table>
                <hr>
                <div class="row">
                  <div class="col-md-4 col-md-offset-4 text-center">
                  	<ul class="pagination" id="myPager"></ul>
                  </div>
                </div>
              </div><!--/table-resp-->
              
              <hr>
              

              
              <div class="table-responsive">
                <div class="panel panel-default">
                  <div class="panel-heading">Nearby Students</div>
                    <div class="panel-body">
                      <div id="map">
                      
                      </div>
                    </div>
                </div>
              </div>
              
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
               
               <ul class="list-group">
                  <li class="list-group-item text-muted">Inbox</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Here is your a link to the latest summary report from the..</a> 2.13.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  
                </ul> 
               
             </div><!--/tab-pane-->
             
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
<script> 
        var addresses = []; 
        var names = [];
        var ids = []; 
</script>
  @foreach ($nearby_students as $nearby_student)
    <script>
      addresses.push("{{$nearby_student->address}}"+" "+"{{$nearby_student->zip}}");
      names.push("{{$nearby_student->first_name}}");
      ids.push("{{$nearby_student->id}}");
    </script>
  @endforeach
<script>
  function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
    document.body.appendChild(script);
  }
  window.onload = loadScript;

function initialize() {
    window.map = new google.maps.Map(document.getElementById('map'), {
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();
    var bounds = new google.maps.LatLngBounds();

  function placeMarker( address, name, id ) {

    $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='
      +address+'&sensor=false', null, function (data) {
      var p = data.results[0].geometry.location
      var latlng = new google.maps.LatLng(p.lat, p.lng);
      var marker = new google.maps.Marker({
                  position: latlng,
                  map: map
                });
      bounds.extend(marker.position);
    
      google.maps.event.addListener(marker, 'click', function(){
          infowindow.close(); // Close previously opened infowindow
          infowindow.setContent('<a href="../students/'+id+'">'+name+'</a>');
          infowindow.open(map, marker);
      });
    });
  }
          
  for (i = 0; i < addresses.length; i++) {
      var name = names[i].toString();
      var id = ids[i].toString();
    placeMarker(addresses[i],name,id);
  }

    map.fitBounds(bounds);
}


</script>
<style>
#map {
            width: 500px;
            height: 200px;
        }
</style>




<script>
        
  $(document).ready(function() {
    /* pagination */
    $.fn.pageMe = function(opts){
        var $this = this,
            defaults = {
                perPage: 7,
                showPrevNext: false,
                numbersPerPage: 1,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);
        
        var listElement = $this;
        var perPage = settings.perPage; 
        var children = listElement.children();
        var pager = $('.pagination');
        
        if (typeof settings.childSelector!="undefined") {
            children = listElement.find(settings.childSelector);
        }
        
        if (typeof settings.pagerSelector!="undefined") {
            pager = $(settings.pagerSelector);
        }
        
        var numItems = children.size();
        var numPages = Math.ceil(numItems/perPage);

        pager.data("curr",0);
        
        if (settings.showPrevNext){
            $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
        }
        
        var curr = 0;
        while(numPages > curr && (settings.hidePageNumbers==false)){
            $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
            curr++;
        }
      
        if (settings.numbersPerPage>1) {
           $('.page_link').hide();
           $('.page_link').slice(pager.data("curr"), settings.numbersPerPage).show();
        }
        
        if (settings.showPrevNext){
            $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
        }
        
        pager.find('.page_link:first').addClass('active');
        if (numPages<=1) {
            pager.find('.next_link').hide();
        }
        pager.children().eq(1).addClass("active");
        
        children.hide();
        children.slice(0, perPage).show();
        
        pager.find('li .page_link').click(function(){
            var clickedPage = $(this).html().valueOf()-1;
            goTo(clickedPage,perPage);
            return false;
        });
        pager.find('li .prev_link').click(function(){
            previous();
            return false;
        });
        pager.find('li .next_link').click(function(){
            next();
            return false;
        });
        
        function previous(){
            var goToPage = parseInt(pager.data("curr")) - 1;
            goTo(goToPage);
        }
         
        function next(){
            goToPage = parseInt(pager.data("curr")) + 1;
            goTo(goToPage);
        }
        
        function goTo(page){
            var startAt = page * perPage,
                endOn = startAt + perPage;
            
            children.css('display','none').slice(startAt, endOn).show();
            
            if (page>=1) {
                pager.find('.prev_link').show();
            }
            else {
                pager.find('.prev_link').hide();
            }
            
            if (page<(numPages-1)) {
                pager.find('.next_link').show();
            }
            else {
                pager.find('.next_link').hide();
            }
            
            pager.data("curr",page);
           
            if (settings.numbersPerPage>1) {
              $('.page_link').hide();
              $('.page_link').slice(page, settings.numbersPerPage+page).show();
          }
          
            pager.children().removeClass("active");
            pager.children().eq(page+1).addClass("active");  
        }
    };

    $('#items').pageMe({pagerSelector:'#myPager',childSelector:'tr',showPrevNext:true,hidePageNumbers:false,perPage:5});
    /****/
 });
        
</script>

@endsection