<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                            <div class="col-md-2">
                                <strong class="card-title ">Blacklist</strong>
                            </div>    
                            <div class="col-md-10">
                                <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-outline-success pull-right"><i class="fa fa-plus" ></i>&nbsp; Add</button>
                                
                            </div>
                            <div class="col-md-12">
                                <br>
                                 <table class="table-striped" id="adminUserTable">
                                    <thead>

                                      <tr>
                                        <th>Number Plate</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['blacklist'] as $item){ ?>
                                      <tr>
                                        <td><?php echo $item->number_plate; ?></td>

                                        <td>
                                            <a href="<?php echo site_url('Blacklist/removeBlacklist?id='.$item->blacklist_id); ?>"><span><i class="fa fa-trash"></i></span></a></td>
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Blacklist Number Plate</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('Blacklist/blacklistNumber'); ?>" class="form-inline">
            <div class="form-group">
              <label for="focusedInput">Number Plate: </label>
              <input class="form-control" id="number_plate" type="text" name="number_plate">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" >Save</button>
      </div>
       </form>
    </div>


  </div>
</div>        
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    
$(document).ready(function() {
    $('#adminUserTable').DataTable();
} );

</script>        