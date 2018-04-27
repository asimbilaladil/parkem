<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>View</strong> <small>Admin</small>
                            </div>

                                

                            
                                <div class="card-body card-block">
                                    <?php foreach ($data['userData'] as $key => $value) {
                                        # code...
                                     ?>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-4">Full Name</label>

                                        <label class=" form-control-label col-md-4"><?php echo $value->fullname; ?></label>

                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-4">Email</label>

                                        <label class=" form-control-label col-md-4"><?php echo $value->email; ?></label>
                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-4">Username</label>

                                        <label class=" form-control-label col-md-4"><?php echo $value->username; ?></label>
                                       
                                    </div>
                                    
                                   <?php } ?>
                                
                                </div>

                        </div>
                    </div>

           



                </div>


            </div><!-- .animated -->
        </div>