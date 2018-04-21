<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add</strong> <small>Unit</small>
                            </div>
                            <form action="<?php echo site_url('Unit/save') ?>" method="post">
                                
                            
                                <div class="card-body card-block">
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Name</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input required name="unit" class="form-control" type="text">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Lot</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-mail"></i></div>
                                            <select id='lot' name='lot' class='custom-select'>
                                             <?php foreach ($data['lots']  as  $value) {
                                                 # code...
                                             ?>
                                             <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?> </option>
                                             <?php } ?>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class=" form-control-label col-md-12">Pin</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                            <input required name="pin" class="form-control" type="number">
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Custom-Searchable-Select-List-Customselect/src/jquery-customselect.js"></script>

        <link href="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Custom-Searchable-Select-List-Customselect/src/jquery-customselect.css" rel="stylesheet" />

        <script type="text/javascript">
            $(function() {
              $("#lot").customselect();
            });
        </script>