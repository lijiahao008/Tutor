@extends ('layouts.app')

@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="fname" name="name" type="text" placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div class="panel panel-default">
                    <div class="text-center header">Our Office</div>
                    <div class="panel-body text-center">
                        <h4>Address</h4>
                        <div>
                        2900 Bedford Ave<br />
                        Brooklyn NY<br />
                        #(718) 951 5000<br />
                        </div>
                        <hr />
                        <div id="map1" class="map">
                             <div id="map-container" class="col-md-6"></div>
 
                            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
                            <!-- Include all compiled plugins (below), or include individual files as needed -->
                            <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
                            <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
                                <script>    
                             
                                  function init_map() {
                                    var var_location = new google.maps.LatLng(40.6310,-73.9544);
                             
                                    var var_mapoptions = {
                                      center: var_location,
                                      zoom: 16
                                    };
                             
                                    var var_marker = new google.maps.Marker({
                                        position: var_location,
                                        map: var_map,
                                        title:"Venice"});
                             
                                    var var_map = new google.maps.Map(document.getElementById("map-container"),
                                        var_mapoptions);
                             
                                    var_marker.setMap(var_map); 
                             
                                  }
                             
                                  google.maps.event.addDomListener(window, 'load', init_map);
                             
                                </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .map {
        min-width: 300px;
        min-height: 300px;
        width: 200%;
        height: 100%;
    }

    .header {
        background-color: #F5F5F5;
        color: #36A0FF;
        height: 70px;
        font-size: 27px;
        padding: 10px;
    }

    #map-container { 
        height: 300px 
    }
    </style>

@endsection