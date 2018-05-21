<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                            <div class="col-md-12">
                                <strong class="card-title ">Citation</strong>
                                <br><br>
                            </div>    

                            <div class="col-md-4">
                                <label> Filter By Payment Status </label>
                                   <select onchange="filterPaymentStatus()" class="form-control" id="paymentStatus">
                                       <option value="Select Status">Select Status</option>
                                       <option value="yes">paid</option>
                                       <option value="no">unpaid</option>
                                       
                                   </select>

                                
                            </div>
                            <div class="col-md-12">
                                <br>
                                 <table class="table-striped" id="citationTable">
                                    <thead>

                                      <tr>
                                        <th>Citation</th>
                                        <th>Operator</th>
                                        <th>Number Plate</th>
                                        <th>Lot</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Payment Status</th>

                                        <th style="display: none;">Payment Filter</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['citations'] as $item){ ?>
                                      <tr>
                                        <td>C-<?php echo $item->id; ?></td>
                                        <td><?php echo $item->operatorName; ?></td>
                                        <td>
                                            <div class="hover_img">
                                                 <a href="#"><?php echo $item->numberPlate; ?>
                                                 <span>
                                                    <img src="<?php echo $item->carImage; ?>" 
                                                     alt="image" height="200" /></span></a>
                                            </div>

                                        </td>
                                        <td><?php echo $item->lotName; ?></td>
                                        <td><?php echo date("Y-m-d",$item->timestamp); ?></td>
                                        <td><?php echo date("h:i:s A",$item->timestamp); ?></td>                                        
                                        <td><?php echo $item->paymentStatus; ?></td>
                                        <td style="display: none;"><?php echo ($item->paymentStatus == 'paid' ? 'yes' : 'no'  ); ?></td>
                                        
                                      </tr>
                                        <?php } ?>
                                     
                                    </tbody>
                                  </table>                                
                            </div>

                        </div>
                       
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<style type="text/css">
    .hover_img a { position:relative; }
.hover_img a span { position:absolute; display:none; z-index:99; }
.hover_img a:hover span { display:block; }

</style>
<script type="text/javascript">
    


    var table = $('#citationTable').DataTable();

    var filterPaymentStatus = function filterPaymentStatus(){

        var paymentStatus = $('#paymentStatus option:selected').val();

        if(paymentStatus == 'Select Status'){

            table
                 .search( '' )
                 .columns().search( '' )
                 .draw();

        } else {

            table
                .column(7)
                .search( paymentStatus )
                .draw(); 
        }

    }



</script>        