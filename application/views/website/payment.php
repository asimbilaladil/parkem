
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
    
#header_area {
    height: 100px;
    background-color: #272c33;
    box-shadow: 0 4px 8px rgba(0, 0, 0, .08);
    border-bottom: 1px solid #DDD
}

#header_area .logo {
    margin: 4px 0 0 10px
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
                   <table>
                            <tr>
                                <td style=" width: 35%; ">
                                    
                                </td>
                                <td style="text-align: center; width: 50%; border: 0px solid black;" >
                                    <a href="/select-lot/"><img style="width:  42%;" src="<?php echo base_url('includes/website/assets/img/ParkemLong.png'); ?>" alt="Logo" class="logo"></a>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                        </table>
                <div id="nav_area">
                    <!-- <span><a href="/" class="home_link">Home</a></span> -->
                  
                </div>
                

            </div>
        </div>

<div id="content_area">
            <div id="content_header"></div>
            <div id="content_tabs">
                <a href="<?php echo site_url(''); ?>">Map</a>
                <a href="<?php echo site_url('Location'); ?>">Location ID</a>
                <a href="<?php echo site_url('Payment'); ?>"  class="selected">Pay Citation</a>
                <a style="font-size: 20px; float: right;" href="<?php echo site_url('Admin'); ?>" <i class="fa fa-user fa-2x" id="settings_menu_toggle"></i> Admin </a>
            </div>
            <div id="content_messages">
            </div>
            <div id="content">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h1>Payment</h1>
                </div>
                <div class="firstForm">

                    <div class="find-form">
                        
                        <div class="form-group">
                            <label>Citation No</label>
                            <input required type="text" class="form-control" placeholder="Citation No" id="citationNO" name="citationNO">
                        </div>
                        
                        <button type="button" onclick="findCitation()" class="btn btn-info btn-flat m-b-30 m-t-30 col-sm-12"><span class="fa fa-search"></span> Search</button>


                        
                       
                            
                        
                    </div>
                </div>
                <div class="secondForm">
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <script type="text/javascript">
        

        var findCitation = function findCitation(){
            var citationNO = $('#citationNO').val();
            citationNO = citationNO.split('-');

            if( citationNO != '' && citationNO.length == 2 && citationNO[1] != '' ){
                
                $.ajax({
                    url: "<?php echo site_url('Payment/findCitation') ?>",
                    type: "POST",
                    data: {
                        'id': citationNO[1]
                    },
                    success: function(response) {
                        
                       $('.secondForm').html(response);
                       $('.firstForm').hide();
                    },
                    error: function() {
                    }
                });
            }

        }
        var goBack = function goBack(){
            $('.secondForm').html('');
            $('.firstForm').show();
        }
        var submitPayment = function submitPayment(){
            $('#submitForm').click();
        }
        var payCitation = function payCitation(){
            var citationNO = $('#citation_no').val();
            
            if( citationNO != '' ){
                window.location = "<?php echo site_url('Payment/process') ?>?citationNO="+citationNO;

               
            }

        }
    </script>