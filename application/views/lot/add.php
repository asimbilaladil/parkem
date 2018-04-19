
<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add</strong> <small>Lot</small>
                            </div>
                            <form action="<?php echo site_url('Lot/save') ?>" method="post">
                                
                            
                                <div class="card-body card-block">
                                    <div class="form-group col-md-6">
                                        <label class=" form-control-label col-md-12">Name</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input  required name="name" class="form-control" type="text">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class=" form-control-label col-md-12">Contact</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-pin"></i></div>
                                            <input  required name="contact" class="form-control" type="text">
                                        </div>
                                        
                                    </div>                                    
                                    <div class="form-group col-md-6">
                                        <label class=" form-control-label col-md-12">Hour</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-mail"></i></div>
                                            <input required name="hour" class="form-control" type="number">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class=" form-control-label col-md-12">Day</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                            <input required name="day" class="form-control" type="number">
                                        </div>
                                       
                                    </div>
                                   
                                    <div class="form-group col-md-6">
                                        <label class=" form-control-label col-md-12">Unit</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-pin"></i></div>
                                            <select onchange="showHide();" name="unit" id="unit" class="form-control">
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>

                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-6" id="pinBox" style="display: none;">
                                        <label class=" form-control-label col-md-12">Pin</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-pin"></i></div>
                                            <input id="pin"  name="pin" class="form-control" type="number">
                                        </div>
                                        
                                    </div>
                                     <input id="lng"  name="lng" class="form-control" type="hidden">
                                      <input id="lat"  name="lat" class="form-control" type="hidden">
                                    <div class="col-lg-10">
                            <div class="card" style=" margin-left: 15px; ">
                                <div class="card-header">
                                    <h4>Lot Map</h4>
                                </div>
                                <div style="height: 250px" id="map" class="gmap_unix card-body">
                                   
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>                                                                                         
                                    
                      
                                   <div class="form-group col-md-10">
                                      <button type="submit" class="btn btn-outline-primary btn-lg pull-right">Save</button>
                                    </div>
                                
                                </div>
                            </form>
                        </div>
                    </div>

           



                </div>


            </div><!-- .animated -->
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <script>
 var showHide = function showHide(){
    var unit = $('#unit').val();
    if(unit == 'yes'){
        $('#pinBox').show();
    } else {
        $('#pinBox').hide();
        $('#pin').val('');

    }
 }
      // The following example creates a marker in Stockholm, Sweden using a DROP
      // animation. Clicking on the marker will toggle the animation between a BOUNCE
      // animation and no animation.

      var marker;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 59.325, lng: 18.070}
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: {lat: 59.327, lng: 18.067}
        });
        marker.addListener('click', toggleBounce);
        google.maps.event.addListener(marker, 'dragend', function(event) {
                $('#lat').val(event.latLng.lat())
                $('#lng').val(event.latLng.lng())
                
        });  
      }

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }

    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCux8E5j2vMYKpkJ33BAWTVIuRuLvFCEKU&callback=initMap">
    </script>