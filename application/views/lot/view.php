
<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>View</strong> <small>Lot</small>
                            </div>
                            
                                <div class="card-body card-block">
                                    <?php foreach ($data['lotData'] as $key => $value) {
                                        # code...
                                     ?>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-4">Name</label>

                                        <label class=" form-control-label col-md-4"><?php echo $value->name; ?></label>

                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-4">Address</label>

                                        <label class=" form-control-label col-md-4"><?php echo $value->address; ?></label>
                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-4">Hour</label>

                                        <label class=" form-control-label col-md-4"><?php echo $value->hour; ?></label>
                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-4">Day</label>

                                        <label class=" form-control-label col-md-4"><?php echo $value->day; ?></label>
                                       
                                    </div>                                    
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-4">Contact</label>

                                        <label class=" form-control-label col-md-4"><?php echo $value->contact; ?></label>
                                       
                                    </div>                                     
                                    
                                   <?php } ?>
                                
                                </div>
 
                            
                                <div class="card-body card-block">
                                                           
                                     
                                                                                                            
                                    <div class="unitDiv form-group col-md-12">
                                        
                                        <?php foreach ($data['unitData'] as $key => $value) {
                                            # code...
                                         ?>

                                        <div class="childUnit_<?php echo $key; ?>">
                                            <div class="form-group col-md-5">
                                                <label class=" form-control-label col-md-12">Unit #</label>
                                                <div class="input-group col-md-8">
                                                   
                                                   <label class=" form-control-label col-md-12"><?php echo $value->name; ?></label>
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
     


   