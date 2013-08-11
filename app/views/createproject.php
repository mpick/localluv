<script>

$(function() {
	//$("#summary").wordCounter({limit: 60});
	//$("#goalSummary").wordCounter({limit: 60});

});
</script>
<div class='span10 offset1 well well-small'> 
	<div class="alert alert-danger">
		<strong>Fields with * are required.</strong>
		<br />
		Once you hit the 'Submit' button below, we'll approve your request and you'll resume this registration process!
	</div>
	<form action='' method='post' data-validate='parsley' class="create-project">
		<p id="required-label" class="help-block pull-right">
		<fieldset>

			<legend>Your Band</legend>
			<label for='title' ><b>*</b> Band Name</label><input type='text'class='input-xxlarge' id="title" name='title' placeholder='e.g. The Killers' data-required='true' data-error-message='Your band has to have a name.' > 
		</fieldset>
		<fieldset>
			<label for='categoryID'><b>*</b> Genre</label>
			<select id='categoryID' name='categoryID'>
				<? foreach($this->categories as $category): ?>
				<option value='<?= $category->id ?>' title='<?= $category->description ?>'><?= $category->name ?></option>
				<? if(!empty($category->subcategories)): foreach($category->subcategories as $subcat): ?>
				<option value='<?= $subcat->id ?>' title='<?= $subcat->description ?>'> - <?= $subcat->name ?></option>
			<? endforeach; endif; ?>

			<? endforeach; ?>
			</select>
		</fieldset>
		<fieldset>
			<label for='mediaEmbed'>* Video URL (YouTube, Vimeo, etc)</label><input type='text'class='input-xxlarge' id='mediaEmbed' name='mediaEmbed' placeholder='e.g. http://vimeo.com/58933055' data-required='true' data-error-message='Your band has to have a video file.' ><span class="help-inline" style='font-size:0.9em'></span>
		</fieldset>
		<fieldset>
			<label for='summary'><b>*</b> Band Description</label><textarea class='input-block-level' style='height: 12em' id='summary' name='summary' placeholder="60 words max" data-required='true' data-error-message='Your band has to have a description.' ></textarea>
		</fieldset>
		<hr>
			<div class="alert alert-error" style="text-align:center">
				We require an approval process for your tour outline to ensure the credibility of our platform for fans. If we feel your costs are unjustified, we will reach out for clarification before approving.
			</div>
		<fieldset>
			<legend>Your Tour</legend>
			<span class="help-block">In order to submit a band, you must have an initial tour already figured out. </span>
			<label for='goalTitle'><b>*</b> What is your band calling the tour?</label>

			<input type='text' name='goalTitle' id='goalTitle' class='input-xxlarge' placeholder='e.g. Macaroni Tour 2013' data-required='true' data-error-message='Your goal has to have a title.' > 
				
		</fieldset>
		<fieldset>
			<label for='goalDescription'><b>*</b> Short Tour Details</label>
			<textarea class='input-block-level' style='height: 12em' id='goalDescription' name='goalDescription' placeholder="60 words max" data-required='true' data-error-message='Your goal has to have a summary.' ></textarea>
		</fieldset>
		<fieldset>
			<label for='targetAmount'><b>*</b> Tour Funding Goal</label>
			<div class="input-prepend" style='display:inline'>
                                <span class="add-on">$</span>
                                <input class="input-xxl" id='targetAmount' name='targetAmount' type="text" placeholder="In US dollars" data-required="true" data-error-message='Your goal has to have a funding target.'> 
                        </div>
		</fieldset>
		<br />
		<fieldset>
			<label for='targetMonth'><b>*</b> When is your tour over?</label>
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
		        <br />
			<button type='submit' class='btn'>Submit Band And Tour For Approval</button>
		</fieldset>
	</form>
</div>
