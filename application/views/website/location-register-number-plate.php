  

                <?php foreach ($data['data'] as  $value) {
                    # code...
                 ?>
                <?php if($data['data'][0]->unit_id === null) { ?>


                        <div class="form-group">
                            <label>Number Plate</label>
                            <input required type="text" class="form-control" placeholder="Number Plate" name="number_plate">
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button>
         

           
                <?php } else { 


                ?>


                    <div class="form-group">
                                <p> <input onchange="loadUnitForm()" type="checkbox" id="unitCheckbox"> Visiting a specific Unit?</p>
                    </div>
                    <div class="unitForm">
                        
                        <div class="form-group">
                            <label>Number Plate</label>
                            <input required type="text" class="form-control" placeholder="Number Plate" name="number_plate">
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button>
                    </div>
                       <?php } ?>
                        
        

                <?php } ?>