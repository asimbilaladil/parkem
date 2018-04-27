<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add</strong> <small>Admin</small>
                            </div>
                            <form action="<?php echo site_url('Admin/save') ?>" method="post">
                                
                            
                                <div class="card-body card-block">
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Full Name</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input  required name="fullname" class="form-control" type="text">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Email</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-mail"></i></div>
                                            <input required name="email" class="form-control" type="email">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Username</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                            <input required name="username" class="form-control" type="text">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Password</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-pin"></i></div>
                                            <input  required name="password" class="form-control" type="password">
                                        </div>
                                        
                                    </div>
                                   <div class="form-group col-md-4">
                                      <button type="submit" class="btn btn-outline-primary btn-lg pull-right">Save</button>
                                    </div>
                                
                                </div>
                            </form>
                        </div>
                    </div>

           



                </div>


            </div><!-- .animated -->
        </div>