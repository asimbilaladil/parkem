<style type="text/css">
    
    err

</style>
<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h1>Number Plate Register</h1>
                </div>
                <?php foreach ($data['data'] as  $value) {
                    # code...
                 ?>
                <?php if($data['data'][0]->unit_id === null) { ?>
                <div class="login-form">
                    <form action="<?php echo site_url('Register/saveNumberPlate') ?>" method="post">
                        <div class="form-group">
                            <label>Lot</label>
                            <input disabled value="<?php echo $data['data'][0]->name; ?>" type="text" class="form-control"  name="name">
                            <input  value="<?php echo $data['data'][0]->id; ?>" type="hidden" class="form-control"  name="id">
                        </div>
                        <div class="form-group">
                            <label>Number Plate</label>
                            <input required type="text" class="form-control" placeholder="Number Plate" name="number_plate">
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Save</button>
         
                                
                    </form>
                </div>
                <?php } else { 
                            
                            $unitName = explode( ',' , $data['data'][0]->unit_name);
                            $unitId = explode( ',' ,$data['data'][0]->unit_id);

                ?>
                <div class="login-form">
                    <form id="unitForm" action="<?php echo site_url('Register/saveNumberPlate') ?>" method="post">
                        <div class="form-group">
                            <label>Lot</label>
                            <input disabled value="<?php echo $data['data'][0]->name; ?>" type="text" class="form-control"  name="name">
                            <input id="id" value="<?php echo $data['data'][0]->id; ?>" type="hidden" class="form-control"  name="id">
                        </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <select id="unit_name" name="unit_name" class="form-control" > 
                                <?php for ($i=0; $i < count( $unitName ) ; $i++) {?>
                                <option value="<?php echo $unitId[$i]; ?>"><?php echo $unitName[$i]; ?></option>
                                <?php } ?>
                            </select>
                        </div>                        
                        <div class="form-group">
                            <label>Unit Pin</label>
                            <input required type="password" class="form-control" placeholder="Unit Pin" id="unit_pin" name="unit_pin">
                        </div>
                        <div class="form-group">
                            <label>Number Plate</label>
                            <input required type="text" class="form-control" placeholder="Number Plate" name="number_plate">
                        </div>
                        
                        <button onclick="verifyPin()" type="button" class="btn btn-success btn-flat m-b-30 m-t-30">Save</button>
                       <?php } ?>
                        
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">
    
    var verifyPin = function verifyPin() {
        var id = $('#id').val();
        var unit_id = $('#unit_name').val(); 
        var unit_pin = $('#unit_pin').val(); 
        $.ajax({
            url: "<?php echo site_url('Register/verifyPin') ?>",
            type: "POST",
            data: {
                'id': id,
                'unit_id': unit_id,
                'unit_pin' : unit_pin
            },
            success: function(response) {
                if(response){
                    $( "#unitForm" ).submit();
                } else {
                    $('#unit_pin').addClass("is-invalid")
                }
            },
            error: function() {
            }
        });        
    }

</script>