<link href="https://www.jqueryscript.net/demo/Searchable-Dropdown-Select-jQuery-Selectstyle/src/selectstyle.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .select2-selection { height: auto !important;}

    </style>

<style type="text/css">
    
#header_area {
    height: 100px;
    background-color: #272c33;
    box-shadow: 0 4px 8px rgba(0, 0, 0, .08);
    border-bottom: 1px solid #DDD
}

#header_area .logo {
    margin: 8px 0 0 10px
}

#nav_area {
    height: 60px;
    line-height: 60px;
    text-align: right;
    float: right;
    padding-right: 20px
}

#nav_area i {
    color: #FFF;
    vertical-align: middle;
    font-size: 1.7em
}

#nav_area a,
#settings_menu a {
    color: #FFF;
    text-decoration: none;
    padding: 2px 10px;
    display: inline-block;
    text-transform: uppercase;
    font-weight: 300;
    font-size: .8em
}

#content_tabs {
    background-color: #272c33;
    padding: 10px .5em 0 .5em;
    border-bottom: 1px solid #272c33
}

#content_tabs a {
    display: inline-block;
    text-decoration: none;
    padding: 0 1em 6px 1em;
    border-bottom: 4px solid transparent;
    color: #FFF
}

#content_tabs a.selected {
    border-bottom-color: #e8f1fc
}

</style>


<div id="header_area">
            <div class="wrapper">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" style="text-align:  center;">
                    <img style="width:  50%;" src="<?php echo base_url('includes/website/assets/img/ParkemLong.png'); ?>" alt="Logo" class="logo">
                </div>
                <div class="col-sm-4"></div>
                <div id="nav_area">
                    <!-- <span><a href="/" class="home_link">Home</a></span> -->
                
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>

<div id="content_area">
            <div id="content_header"></div>
            <div id="content_tabs">
                <a href="<?php echo site_url(''); ?>">Map</a>
                <a href="<?php echo site_url('Location'); ?>"  class="selected">Location ID</a>
                <a href="<?php echo site_url('Payment'); ?>" >Pay Citation</a>
                <a style="font-size: 15px; float: right;" href="<?php echo site_url('Admin'); ?>" <i class="fa fa-user fa-2x" id="settings_menu_toggle"></i> Admin </a>
            </div>
            <div id="content_messages">
            </div>
            <div id="content">    
<div class="col-sm-12">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h1>Number Plate Register</h1>
                </div>
                
                <div class="login-form col-sm-12">
                    <form id="unitForm" action="<?php echo site_url('Register/saveNumberPlate') ?>" method="post">

                            <div class="form-group ">
                                <label>Lot</label>
                                <select onchange="loadForm()"  class=" responsiveSelect2 form-control" id="id" name="id"  data-live-search="true">
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
  var registerNumberPlate = function registerNumberPlate(){
        var lot_id = $('#id').val();
        var number_plate = $('#number_plate').val();
        var unit_name = $('#unit_name').val(); 

            $.ajax({
                url: "<?php echo site_url('Register/saveNumberPlate') ?>",
                type: "POST",
                data: {
                    'id': lot_id,
                    'number_plate':number_plate,
                    'unit_name' : unit_name

                },
                success: function(response) {
                    $('#id').val('');
                    $('#number_plate').val('');
                    $('#unit_name').val(''); 
                    $('#unit_pin').val(''); 
                    
                    alert("Your number plate register successfully");
                               
                },
                error: function() {
                }
            });
      
         
    } 
</script>

