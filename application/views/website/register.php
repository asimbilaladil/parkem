<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h1>Number Plate Register</h1>
                </div>
                <?php foreach ($data['data'] as  $value) {
                    # code...
                 ?>
                <div class="login-form">
                    <form action="<?php echo site_url('Website/saveNumberPlate') ?>" method="post">
                        <div class="form-group">
                            <label>Lot</label>
                            <input disabled value="<?php echo $data['data'][0]->name; ?>" type="text" class="form-control"  name="lot">
                            <input disabled value="<?php echo $data['data'][0]->id; ?>" type="hidden" class="form-control"  name="lot">
                        </div>
                        <div class="form-group">
                            <label>Number Plate</label>
                            <input required type="text" class="form-control" placeholder="Number Plate" name="number_plate">
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Save</button>
                       <?php } ?>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

