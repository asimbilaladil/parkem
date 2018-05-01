<link href="https://www.jqueryscript.net/demo/Searchable-Dropdown-Select-jQuery-Selectstyle/src/selectstyle.css" rel="stylesheet" type="text/css">

<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h1>Number Plate Register</h1>
                </div>
                
                <div class="login-form">
                    <form action="<?php echo site_url('Register/saveNumberPlate') ?>" method="post">
                        <div class="form-group">
                            <label>Lot</label>
                            <select class="form-control" id="" name="id"  data-live-search="true">
                                <?php foreach ($data['data'] as  $value) {
                                    # code...
                                ?>
                                <option selected  value="<?php echo $value->id; ?>" ><?php echo $value->name; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Number Plate</label>
                            <input required type="text" class="form-control" placeholder="Number Plate" name="number_plate">
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Save</button>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Searchable-Dropdown-Select-jQuery-Selectstyle/src/selectstyle.js"></script>

<script type="text/javascript">
    



</script>

