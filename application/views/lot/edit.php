
<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit</strong> <small>Lot</small>
                            </div>
                            <form action="<?php echo site_url('Lot/update') ?>" method="post">
                                
                            <?php foreach ($data['lotData'] as $key => $value) {?>
                            <input   name="id" class="form-control" type="hidden" value="<?php echo $value->id; ?>">
                                <div class="card-body card-block">
                                    <div class="form-group col-md-6">
                                        <label class=" form-control-label col-md-12">Name</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input  required name="name" class="form-control" type="text" value="<?php echo $value->name; ?>">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group col-md-6" >
                                        <label class=" form-control-label col-md-12">Address</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-pin"></i></div>
                                            
                                            <input name="address" id="pac-input" class="form-control" type="text" placeholder="Search Box"  value="<?php echo $value->address; ?>">
                                        </div>
                                        
                                    </div>                                    
                                                                  
                                    <div class="form-group col-md-6">
                                        <label class=" form-control-label col-md-12">Hour</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-mail"></i></div>
                                            <input required name="hour" class="form-control" type="number"  value="<?php echo $value->hour; ?>">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class=" form-control-label col-md-12">Day</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                            <input required name="day" class="form-control" type="number"  value="<?php echo $value->day; ?>">
                                        </div>
                                       
                                    </div>
                                 
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Contact</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-pin"></i></div>
                                            <input  required name="contact" class="form-control" type="text"  value="<?php echo $value->contact; ?>">
                                        </div>
                                        
                                    </div>                                         
                                     <input id="lng"  name="lng" class="form-control" type="hidden" value="<?php echo $value->lng; ?>" >
                                      <input id="lat"  name="lat" class="form-control" type="hidden" value="<?php echo $value->lat; ?>">
                                                                                                            
                                    <div class="unitDiv form-group col-md-12">
                                        <?php foreach ($data['unitData'] as $key => $value) {
                                            # code...
                                         ?>

                                            <div class="childUnit_<?php echo $key; ?>">

                                                <div class="form-group col-md-5"><label class=" form-control-label col-md-12">Unit #</label><div class="input-group col-md-8"><div class="input-group-addon"><i class="fa fa-user"></i></div><input value="<?php echo $value->name; ?>" name="unit[]" class="form-control" type="text"></div></div>

                                               <div class="form-group col-md-5"><label class=" form-control-label col-md-12">Pin</label> <div class="input-group col-md-8"><div class="input-group-addon"><i class="fa fa-usd"></i></div><input name="pin[]" class="form-control" type="number" value="<?php echo $value->pin; ?>"></div></div>

                                               <div class="form-group col-md-2"><label class=" form-control-label col-md-12"></label><div class="input-group col-md-8"><button id="deleteUnitButton" onclick="removeUnits(<?php echo $key; ?>)" type="button" class="btn btn-outline-danger btn-lg">Delete </button></div></div>

                                            </div>
                                        <?php } ?>
                                    </div>
                                   <div class="form-group col-md-10">

                                      <button style=" margin-left: 10px; " onclick="addUnits()" type="button" class="btn btn-outline-success btn-lg pull-right">Add Unit</button> 
                                    </div>
                                   
                                                              
                      
                                   <div class="form-group col-md-10">
                                      <button type="submit" class="btn btn-outline-primary btn-lg pull-right">Save</button>
                                    </div>
                                
                                </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>

           



                </div>


            </div><!-- .animated -->
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
    .unitDiv{
    max-height: 250px;
    overflow-y: scroll;
}

</style>
<script>
    var count = <?php echo count($data['unitData']); ?>;
    function addUnits(){
        count++;
        var unitHTML = '<div class="childUnit_'+count+'"><div class="form-group col-md-5"><label class=" form-control-label col-md-12">Unit #</label><div class="input-group col-md-8"><div class="input-group-addon"><i class="fa fa-user"></i></div><input name="unit[]" class="form-control" type="text"></div></div><div class="form-group col-md-5"><label class=" form-control-label col-md-12">Pin</label> <div class="input-group col-md-8"><div class="input-group-addon"><i class="fa fa-usd"></i></div><input name="pin[]" class="form-control" type="number"></div></div><div class="form-group col-md-2"><label class=" form-control-label col-md-12"></label><div class="input-group col-md-8"><button id="deleteUnitButton"  onclick="removeUnits('+count+')" type="button" class="btn btn-outline-danger btn-lg">Delete </button></div></div></div>';
        $('.unitDiv').append(unitHTML)

    }
    function removeUnits(id){
        $( ".childUnit_"+id ).remove();
        
             
    }
    function initAutocomplete() {


        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);




        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          } else {
            var lat = places[0].geometry.location.lat();
            // get lng
            var lng = places[0].geometry.location.lng();

            $('#lat').val(lat)
            $('#lng').val(lng)   


          }






        });
    }
</script>      


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCux8E5j2vMYKpkJ33BAWTVIuRuLvFCEKU&libraries=places&callback=initAutocomplete">
    </script>