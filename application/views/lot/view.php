
<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add</strong> <small>Lot</small>
                            </div>

                                
                            
                                <div class="card-body card-block">
                                    <div class="form-group col-md-6">
                                        <label class=" form-control-label col-md-12">Name</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input  required name="name" class="form-control" type="text">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group col-md-6" >
                                        <label class=" form-control-label col-md-12">Address</label>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-addon"><i class="fa fa-pin"></i></div>
                                            
                                            <input name="address" id="pac-input" class="form-control" type="text" placeholder="Search Box">
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
                                 
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Contact</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-pin"></i></div>
                                            <input  required name="contact" class="form-control" type="text">
                                        </div>
                                        
                                    </div>                                         
                                     
                                                                                                            
                                    <div class="unitDiv form-group col-md-12">
                                        
                                        <?php foreach ($data['unitData'] as $key => $value) {
                                            # code...
                                         ?>

                                        <div class="childUnit_<?php echo $key; ?>">
                                            <div class="form-group col-md-5">
                                                <label class=" form-control-label col-md-12">Unit #</label>
                                                <div class="input-group col-md-8">
                                                   
                                                   <label class=" form-control-label col-md-12"><?php echo $value->unit; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class=" form-control-label col-md-12">Pin </label>
                                                <div class="input-group col-md-8">
                                                   
                                                    <label class=" form-control-label col-md-12"><?php echo $value->pin; ?> </label>
                                                </div>
                                            </div>                                            

                                        </div>
                                        <?php } ?>
                                
                                </div>

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
     


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCux8E5j2vMYKpkJ33BAWTVIuRuLvFCEKU&libraries=places&callback=initAutocomplete">
    </script>