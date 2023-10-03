<option value="0" ></option>
<?php
 foreach ($merk->result() as $option): ?>
     <option value="<?php echo $option->merk; ?>" > <?php echo $option->merk; ?></option>    
<?php endforeach; ?>
