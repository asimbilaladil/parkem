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
                    <form   id="unitForm" action="<?php echo site_url('Register/saveNumberPlate') ?>" method="post">
                        <div class="form-group">
                            <label>Lot</label>
                            <input disabled value="<?php echo $data['data'][0]->name; ?>" type="text" class="form-control"  name="name">
                            <input id="id" value="<?php echo $data['data'][0]->id; ?>" type="hidden" class="form-control"  name="id">
                        </div>
                        <div class="registerForm">
                            
                                    
                            <div class="form-group">
                                <p> <input onchange="loadUnitForm()" type="checkbox" id="unitCheckbox"> Visiting a specific Unit?</p>
                            </div>
                            <div class="unitForm">
                                
                                <div class="form-group">
                                    <label>Number Plate</label>
                                    <input required type="text" class="form-control" placeholder="Number Plate" id="number_plate" name="number_plate">
                                </div>
                                
                                <button type="button" onclick="registerNumberPlate()" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button>
                            </div>
                        </div>  
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
                    //$( "#unitForm" ).submit();
                    registerNumberPlate();
                } else {
                    $('#unit_pin').addClass("is-invalid")
                }
            },
            error: function() {
            }
        });        
    }
    var loadForm = function loadForm(){
        var lot_id = $('#id').val();
        $.ajax({
            url: "<?php echo site_url('Location/getFormHTML') ?>",
            type: "POST",
            data: {
                'id': lot_id
            },
            success: function(response) {
                $('.registerForm').html(response)
               
            },
            error: function() {
            }
        });         
    }

    var loadUnitForm = function loadUnitForm(){
        var lot_id = $('#id').val();
        if($('#unitCheckbox').is(":checked")){
            $.ajax({
                url: "<?php echo site_url('Location/getUnitFormHTML') ?>",
                type: "POST",
                data: {
                    'id': lot_id
                },
                success: function(response) {
                    $('.unitForm').html(response)
                   
                },
                error: function() {
                }
            });
       } else {
            loadForm();
       }
         
    } 
    var registerNumberPlate = function registerNumberPlate(){
        var lot_id = $('#id').val();
        var number_plate = $('#id').val();
        var unit_name = $('#unit_name').val(); 

            $.ajax({
                url: "<?php echo site_url('Register/saveNumberPlate') ?>",
                type: "POST",
                data: {
                    'lot_id': lot_id,
                    'number_plate':number_plate,
                    'unit_name' : unit_name

                },
                success: function(response) {
                    $('#id').val('');
                    $('#id').val('');
                    $('#unit_name').val(''); 
                               
                },
                error: function() {
                }
            });
      
         
    }      
</script>