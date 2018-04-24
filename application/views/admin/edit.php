<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit</strong> <small>Admin</small>
                            </div>
                            <form action="<?php echo site_url('Admin/update') ?>" method="post">
                                
                            
                                <div class="card-body card-block">
                                    <?php foreach ($data['userData'] as $key => $value) {
                                        # code...
                                     ?>
                                    <input value="<?php echo $value->id; ?>"  name="id" class="form-control" type="hidden">

                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Full Name</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input value="<?php echo $value->fullname; ?>" required name="fullname" class="form-control" type="text">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Email</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-mail"></i></div>
                                            <input value="<?php echo $value->email; ?>" required name="email" class="form-control" type="email">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Username</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                            <input value="<?php echo $value->username; ?>" required name="username" class="form-control" type="text">
                                        </div>
                                       
                                    </div>
                                  
                                   <div class="form-group col-md-4">
                                      <button type="submit" class="btn btn-outline-primary btn-lg pull-right">Save</button>
                                    </div>
                                      <?php }
                                        # code...
                                     ?>
                                
                                </div>
                            </form>
                        </div>
                    </div>

           



                </div>


            </div><!-- .animated -->
        </div>