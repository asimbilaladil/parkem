<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                            <div class="col-md-4">
                                <strong class="card-title ">Register Number Plates</strong>
                            </div>    
                            <div class="col-md-8">
                                <a href="<?php echo site_url('Register_Number_Plates/Add') ?>"><button type="button" class="btn btn-outline-success pull-right"><i class="fa fa-plus"></i>&nbsp; Add</button></a>
                                
                            </div>
                            <div class="col-md-4">
                                <label> Filter By Lot </label>
                                   <select onchange="filterLot()" class="form-control" id="lotName">
                                       <option>Select Lot</option>
                                       <?php foreach ($data['lotData'] as $key => $value) {
                                           echo "<option value='$value->id'>$value->name</option>";
                                       } ?>
                                   </select>

                                
                            </div>
                            <div class="col-md-4">
                                <label> Filter By Blacklist </label>
                                   <select onchange="filterBlacklist()" class="form-control" id="blacklist">
                                        <option>Select Blacklist</option>
                                        <option>Blacklist</option>
                                        <option>Non Blacklist</option>
                                   </select>

                                
                            </div>                            
                            <div class="col-md-12">
                                <br>
                                 <table class="table-striped" id="registerNumberPlatesTable">
                                    <thead>

                                      <tr>
                                        <th>Lot Name</th>
                                        <th>Unit Name</th>
                                        <th>Unit Pin</th>
                                        <th>Number Plate</th>
                                        <th>Register Date</th>
                                        <th>Register Time</th>
                                        <th>Blacklist</th>
                                        <th style="display: none;">Blacklist Filter</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['register_number_plates'] as $item){ ?>
                                      <tr>
                                        <td><?php echo $item->lotName; ?></td>
                                        <td><?php echo ($item->unitName == null? '' : $item->unitName); ?></td>
                                        <td><?php echo ($item->unitPin == null? '' : $item->unitPin); ?></td>
                                        <td><?php echo $item->numberPlate; ?></td>
                                        <td><?php echo date("d-m-Y",$item->timeIn); ?></td>
                                        <td><?php echo date("h:i:s A",$item->timeIn); ?></td>
                                        <td> 
                                            <?php if( $item->blacklist_id == null ){ ?>
                                                <a  href="<?php echo site_url('Register_Number_Plates/addBlacklist?id='.$item->register_plates_id); ?>" ><span style=" color: #28a745; "><i class="fa fa-check"></i></span></a>
                                            <?php } else {?>
                                                <a  href="<?php echo site_url('Register_Number_Plates/removeBlacklist?id='.$item->blacklist_id); ?>"><span style=" color: #b92222; "><i class="fa fa-times"></i></span></a>

                                            <?php } ?>

                                        </td>
                                        <td style="display: none;" ><?php echo ($item->blacklist_id == null ? 'no' : 'yes'); ?></td>

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
<script type="text/javascript">
    

    var table = $('#registerNumberPlatesTable').DataTable();

    var filterLot = function filterLot(){
        var lotName = $('#lotName option:selected').text();

        if(lotName == 'Select Lot'){
            table
                 .search( '' )
                 .columns().search( '' )
                 .draw();

        } else {
            table
                .column(0)
                .search( lotName )
                .draw(); 
        }

    }

    var filterBlacklist = function filterBlacklist(){
        var blacklist = $('#blacklist option:selected').text();
        
        if(blacklist == 'Select Blacklist'){
            table
                 .search( '' )
                 .columns().search( '' )
                 .draw();

        } else if (blacklist == 'Blacklist') {

            table
                .column(7)
                .search('yes')
                .draw(); 
        } else if(blacklist == 'Non Blacklist') {
            console.log(blacklist)
            table
                .column(7)
                .search('no')
                .draw(); 
        }

    }    


</script>        