<div class="row">
	<div class="span8 offset2">
	<form action="" method="POST" class="form-horizontal" id="payment-form">
		<?php foreach ($_GET as $key => $val): ?>
			<input type="hidden" name="<?=$key?>" value="<?=$val?>">
		<?php endforeach ?>
		<fieldset>
			<legend>Support the Tour</legend>
	  <div class="form-row">
	  	<div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text" size="20" name="name" value="<?=$this->name?>"/>
              </div>
            </div>
	  	<div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="text" size="20" name="name" value="<?=$this->email?>"/>
              </div>
            </div>
	  	<div class="control-group">
              <label class="control-label">Card Number</label>
              <div class="controls">
                <input type="text" size="20" name="cardnumber" required/>
              </div>
            </div>
	  	<div class="control-group">
              <label class="control-label" >CVC</label>
              <div class="controls">
                <input type="text" size="4"  name="cvc" required/>
              </div>
            </div>
	  	<div class="control-group">
              <label class="control-label" >Expiration (MM/YYYY)</label>
              <div class="controls">
	      		<input type="text" class="span2" size="2" name="exp-month" required/>
			    <span> / </span>
			    <input type="text" class="span2" size="4" name="exp-year" required/>
              </div>
		 <button type="submit" class="btn">Join the Journey!</button>  	
		</fieldset>
	</form>
</div>
</div>