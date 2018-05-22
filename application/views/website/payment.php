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
            console.log("HERE")
        }
    </script>