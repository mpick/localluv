
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
	<form action="" method="POST" class="form-horizontal" id="payment-form">
		<?php foreach ($_GET as $key => $val): ?>
			<input type="hidden" name="<?=$key?>" value="<?=$val?>">
		<?php endforeach ?>
		<fieldset>
			<p><legend>Support the Tour</legend></p>
	  <div class="form-row">
	  	<div class="control-group">
              <p><label class="control-label">Name</label></p>
              <div class="controls">
                <p><input type="text" size="20" name="name" class='form-control' style="width:300px" value="<?=$this->name?>"/></p>
              </div>
            </div>
	  	<div class="control-group">
              <p><label class="control-label">Card Number</label></p>
              <div class="controls">
                <input type="text" size="20" class='form-control' style="width:300px" name="cardnumber" required/>
              </div>
            </div>
	  	<div class="control-group">
              <p><label class="control-label" >CVC</label></p>
              <div class="controls">
                <input type="text" size="4"  class='form-control' style="width:300px"name="cvc" required/>
              </div>
            </div>
	  	<div class="control-group">
              <p><label class="control-label" >Expiration (MM/YYYY)</label></p>
              <div class="controls">
	      		<p><input type="text" class="form-input" size="2" name="exp-month" required/>
			    <span> / </span>
			    <input type="text" class="span2" size="4" name="exp-year" required/></p>
              </div>
		 <p><button type="submit" class="btn">Join the Journey!</button></p>
		</fieldset>
	</form>
</div>
</div>
</div>