<?php 
    
    $unitName = explode( ',' , $data['data'][0]->unit_name);
    $unitId = explode( ',' ,$data['data'][0]->unit_id);
?>                        
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
                            <input required type="text" id="number_plate" class="form-control" placeholder="Number Plate" name="number_plate">
                        </div>
                        
                        <button onclick="verifyPin()" type="button" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button>