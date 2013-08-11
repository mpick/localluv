<script>

$(function() {
	//$("#summary").wordCounter({limit: 60});
	//$("#goalSummary").wordCounter({limit: 60});

});
</script>
<div class="container">
<div class='col-lg-10 col-lg-offset-1 well'> 
	<div class="alert alert-danger">
		<strong>Fields with * are required.</strong>
		<br />
		Once you hit the 'Submit' button below, we'll approve your request and you'll resume this registration process!
	</div>
	<form action='' method='post' data-validate='parsley' class="create-project">
		<p id="required-label" class="help-block pull-right">
		<fieldset>

			<legend>Your Band</legend>
			<p><label for='title' ><b>*</b> Band Name</label></p>
			<p><input type='text'class='input-xxlarge col-lg-4' id="title" name='title' placeholder='e.g. The Killers' data-required='true' data-error-message='Your band has to have a name.' > </p>
		</fieldset>
		<fieldset>
			<p><label for='categoryID'><b>*</b> Genre</label></p>
			<p><select id='categoryID' name='categoryID'>
				<? foreach($this->categories as $category): ?>
				<option value='<?= $category->id ?>' title='<?= $category->description ?>'><?= $category->name ?></option>
				<? if(!empty($category->subcategories)): foreach($category->subcategories as $subcat): ?>
				<option value='<?= $subcat->id ?>' title='<?= $subcat->description ?>'> - <?= $subcat->name ?></option>
			<? endforeach; endif; ?>

			<? endforeach; ?>
			</select>
		</p>
		</fieldset>
		<fieldset>
			<p><label for='mediaEmbed'>* Video URL (YouTube, Vimeo, etc)</label></p>
			<p><input type='text'class='input-xxlarge col-lg-4' id='mediaEmbed' name='mediaEmbed' placeholder='e.g. http://vimeo.com/58933055' data-required='true' data-error-message='Your band has to have a video file.' ></p><span class="help-inline" style='font-size:0.9em'></span>
		</fieldset>
		<fieldset>
			<p><label for='summary'><b>*</b> Band Description</label></p>
			<p><textarea class='input-block-level col-lg-4' style='height: 12em' id='summary' name='summary' placeholder="60 words max" data-required='true' data-error-message='Your band has to have a description.' ></textarea></p>
		</fieldset>
		<hr>
			<div class="alert alert-danger">
				[put copy here]
			</div>
		<fieldset>
			<legend>Your Tour</legend>
			<span class="help-block">In order to submit a band, you must have an outline of your tour planned out. </span>
			<p><label for='goalTitle'><b>*</b> What is your band calling the tour?</label></p>

			<p><input type='text' name='goalTitle' id='goalTitle' class='input-xxlarge col-lg-4' placeholder='e.g. Macaroni Tour 2013' data-required='true' data-error-message='Your goal has to have a title.' > </p>
				
		</fieldset>
		<fieldset>
			<p><label for='goalDescription'><b>*</b> Short Tour Details</label></p>
			<p>
			<textarea class='input-block-level col-lg-4' style='height: 12em' id='goalDescription' name='goalDescription' placeholder="60 words max" data-required='true' data-error-message='Your goal has to have a summary.' ></textarea>
			</p>
		</fieldset>
		<fieldset>
			<p><label for='targetAmount'><b>*</b> Tour Funding Goal</label></p>
    <div class="input-group">
  <span class="input-group-addon">$</span>
  <input class="input-xxl" id='targetAmount' name='targetAmount' type="text" placeholder="In US dollars"  data-required='true' data-error-message='Your goal has to have a funding target.'> 
</div> 
		</fieldset>
		<fieldset>
			<p><label for='targetMonth'><b>*</b> When is your tour over?</label></p>
			<p>
			<select id='targetMonth' name='targetMonth'>
			<? for($i = 1; $i < 13; $i++): ?>
			<option value='<?= sprintf("%02d", $i) ?>'<? $nextMonth = sprintf("%02d", $i); if($nextMonth == date("m") + 1){ echo " selected='selected'";} ?>><?= date("F", mktime(0, 0, 0, $i, 10)) ?></option>
		<? endfor; ?>
	</select> <select id='targetDay' name='targetDay' class='input-small'>
			<? for($i = 1; $i < 32; $i++): ?>
			<option value='<?= sprintf("%02d", $i) ?>'<? $thisDay = sprintf("%02d", $i); if($thisDay == date("d")){ echo " selected='selected'";} ?>><?= sprintf("%02d", $i) ?></option>
		<? endfor; ?>
	</select>
	</select> <select id='targetYear' name='targetYear' class='input-small'>
			<? for($i = 0; $i < 2; $i++): ?>
			<option value='<?= date("Y") + $i ?>'><?= date("Y") + $i ?></option>
		<? endfor; ?>
	</select> 
		</fieldset>
		<fieldset>
			<button type='submit' class='btn'>Submit Band And Tour For Approval</button>
		</fieldset>
	</p>
	</form>
</div>
