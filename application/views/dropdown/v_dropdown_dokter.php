<option value="0" ></option>
<?php
 foreach ($dokter->result() as $option): ?>
     <option value="<?php echo $option->nama; ?>" > <?php echo $option->nama; ?></option>    
<?php endforeach; ?>
