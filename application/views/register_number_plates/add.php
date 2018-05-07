<link href="https://www.jqueryscript.net/demo/Searchable-Dropdown-Select-jQuery-Selectstyle/src/selectstyle.css" rel="stylesheet" type="text/css">
 
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">
    <style type="text/css">
        .select2-selection { height: auto !important;}

    </style>
<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Register</strong> <small>Number Plate</small>
                            </div>
                           
                                
                            
                                <div class="card-body card-block">
                                    <div class="login-form">
                                        <form id="unitForm" action="<?php echo site_url('Register_Number_Plates/saveNumberPlate') ?>" method="post">
                                            <div class="form-group">
                                                <label>Lot</label>
                                                <select onchange="loadForm()" class="responsiveSelect2 form-control" id="id" name="id"  data-live-search="true">
                                                    <option selected >Search Lot </option>
                                                    <?php foreach ($data['data'] as  $value) {
                                                        # code...
                                                    ?>
                                                    <option   value="<?php echo $value->id; ?>" ><?php echo $value->name; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="registerForm">
                                                
                                            </div>
                                           

                                            
                                        </form>
                                    </div>
                                
                                </div>
                            
                        </div>
                    </div>

           



                </div>


            </div><!-- .animated -->
        </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<script type="text/javascript">
    $(".responsiveSelect2").select2();

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