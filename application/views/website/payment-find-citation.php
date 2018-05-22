<div class="citation-form">
	<div class="form-group">
         <div class="col-sm-4"></div>
         <button type="button" onclick="goBack()" class="btn btn-info btn-flat m-b-30 m-t-30 col-sm-4"><span class="fa fa-arrow-circle-left"></span> Back</button>
        
    </div>        
    <?php if(empty($data['citation'])){ ?>
	<div class="form-group">
        <h3 style="text-align:  center;color:  red;">Sorry no data found.</h3>
       
    </div>
    <?php } ?>
   <?php foreach ($data['citation'] as $key => $value) { ?>                 
    
    <div class="form-group col-sm-12 ">
    	<div class="col-sm-2"></div>
    	<div class="col-sm-8" ><img src="<?php echo $value->carImage; ?>"></div>
       	<div class="col-sm-2"></div>
    </div>
    <br>
    <div class="form-group">
        <label>Citation No</label>
        <input disabled type="text" class="form-control" value="C-<?php echo $value->id; ?>" >
        <input  type="hidden" class="form-control" id="citationNO" name="citationNO" value="<?php echo $value->id; ?>">
    </div>
    <div class="form-group">
        <label>Number Plate</label>
        <input disabled type="text" class="form-control"   value="<?php echo $value->numberPlate; ?>">
    </div>
	<div class="form-group">
        <label>Amount</label>
        <input disabled type="text" class="form-control"  value="<?php echo ( strtotime('+14 days', $value->timestamp) >  strtotime(date('Y-m-d')) ? 75 : 150 ) ; ?>$">
        <input  type="hidden" class="form-control" id="citationAMOUNT" name="citationAMOUNT">
    </div> 
  
	<div class="form-group">
        <label>Date</label>
        <input disabled type="text" class="form-control"  value="<?php echo date("Y-m-d",$value->timestamp); ?>">
        
    </div> 
	<div class="form-group">
        <label>Time</label>
        <input disabled type="text" class="form-control"  value="<?php echo date("H:i:s A",$value->timestamp); ?>">
        
    </div>     
    <div class="col-sm-3" ></div>  
    <?php if($value->paymentStatus == 'unpaid'){ ?> 
    	<img onclick="submitPayment()" class="col-sm-6" style="cursor: pointer; height: 45px; " src="<?php echo base_url("includes/website/assets/img/"); ?>PayPal-PayNow-Button.png">   
	<?php } else { ?>

	<?php }  ?>
		<img  class="col-sm-6" style="cursor: pointer; height: 45px; " src="<?php echo base_url("includes/website/assets/img/"); ?>paid.png">   
   	<?php } ?>
    
                    
</div>