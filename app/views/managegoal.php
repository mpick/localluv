<? $rewardform = "\"<form id='addRewardForm' enctype='multipart/form-data' action='/ajax/addReward' method='post'><input type='hidden' name='MAX_FILE_SIZE' value='10000000' /><input type='hidden' name='goalID' value='" . $this->goal->id . "'><div class='reward well well-small' id='reward\" + i + \"'><fieldset><label for='reward[\" + i + \"][name]'>Tour Perk Name</label><input type='text' name='reward[\" + i + \"][name]' class='input-xxlarge'></fieldset><fieldset><label for='image'>Tour Perk Image</label><input type='file' name='rewardimages[\" + i + \"]'></fieldset><fieldset><label for='description'>Description</label><textarea name='reward[\" + i + \"][description]' class='input-xxlarge'></textarea></fieldset><fieldset><label for='reward[\" + i + \"][minAmount]'>Funding Amount</label>$<input type='text' name='reward[\" + i + \"][minAmount]' value='10'></fieldset><fieldset><label for='numTotal'>Number Available</label><input type='text' name='reward[\" + i + \"][numTotal]'></fieldset><div class='form-actions'>";

if($this->goal->status == 'published') $rewardform .= "<button class='btn btn-success' name='action' value='published' type='submit'>Publish Tour Perk</button>"; 
$rewardform .="<button class='btn btn-success' name='action' value='draft' type='submit'>Save As Draft</button> <span class='removeReward btn' data-parent='reward\" + i + \"'>Cancel</span></div></form>\"";

?>

<script>

$(function() {
	var i = 0;



	$('#addReward').click(function(){
		$('#rewardList').prepend(<?php echo $rewardform ?>);
		
		i++;

                $('.removeReward').on('click', function(){
	                var theparent = "#" + $(this).attr('data-parent');
	                $(theparent).remove();
                });

        
                $('#addRewardForm').ajaxForm({
                        dataType: 'html',
                        success: function(data){
                        	$('#addRewardForm').remove();
	                        $('#rewardList').prepend(data);
	                        editRewardAJAX ( $('.editReward').first() );
	                        $('.editReward button[value="delete"]').first().click( function() {rewardConfirmDelete (); } );
                        }
                });

        });

        $('.editReward button[value="delete"]').click( function () { rewardConfirmDelete(); } );

        $('.editReward').each( function() { editRewardAJAX(this); });
});

        var editRewardAJAX = function ( targetObj ) {

                var theForm = $(targetObj);

                $(targetObj).ajaxForm({
	                dataType: 'json',
	                success: function(data){
			        
			        console.log(targetObj);
                                console.log(data.action);
                                
		                if(data.action === "deleted"){
			                theForm.slideUp();
		                }else{
			                theForm.html(data.html);
		                }

		                $('body').prepend("<div style='position:fixed; top:0; left: 0; width: 90%; z-index:99999' class='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>The tour perk has been " + data.action + "</div>");

	                } 
	        });
	        //alert(1);   
        }
        
        var rewardConfirmDelete = function () {
                confirm("Are you sure you want to delete this reward?");
        }
        

</script>
<h2><a href='/manageProject/<?= $this->project->uuid ?>'><?= $this->project->title ?></a>: <?= $this->goal->name ?></h2>
</div>
<div class='row-fluid'>
	<div class='span2'>
			<ul class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#overview' data-toggle=tab>Overview</a></li>
		<li><a href='#details' data-toggle=tab>Tour Details</a>
		<li><a href='#backers' data-toggle=tab>Backers <? if(count($this->goal->backers > 0)): ?>(<?= count($this->goal->backers) ?>)<? endif; ?></a>
		<li><a href='#rewards' data-toggle=tab>Tour Perks</a>

	</ul>
	</div>
<div class='span10 tab-content'>
	<div id='overview'  class='tab-pane fade in active'>
		<legend>Overview</legend>
		<div class='well well-small'>
			<div class="progress">
  <div class="bar" style="width: <?= ($this->goal->currentAmount / $this->goal->targetAmount) * 100 ?>%;"></div>
</div>
	<h5>$<?= number_format($this->goal->currentAmount,2) ?> raised of $<?= number_format($this->goal->targetAmount,2) ?> from <a href='#backers' data-toggle='tab'><?= count($this->goal->backers) ?> backers</a></h5>
	<h5><?= $this->goal->daysUntilTarget ?> days remaining
		</div>

	</div>

	<div id='details' class='tab-pane fade in'>
		<form action='' method='post' data-validate='parsley'>
			<input type='hidden' name='action' value='updateGoal'>
			<legend>Goal Details</legend>
			<input type='hidden' name='goalUUID' value='<?= $this->goal->uuid ?>'>
			<fieldset>
				<label for='goalName'>Name</label>
				<input type='text' class='input-xxlarge' name='goalName' value='<?= $this->goal->name ?>' data-required='true' data-error-message='Your goal must have a name.'>
			</fieldset>
			<fieldset>
				<label for='mediaEmbed'>Video URL</label>
				<input type='text' class='input-xxlarge' name='mediaEmbed' placeholder='e.g. http://www.youtube.com/watch?v=oHg5SJYRHA0' value='<?= $this->goal->mediaEmbed ?>' data-required='true' data-error-message='Your goal must have a video.' required>
			</fieldset>
			<fieldset>
				<label for='summary'>Summary</label>
				<textarea style='height: 12em' class='input-xxlarge' name='summary' data-required='true' data-error-message='Your goal must have a summary.'><?= $this->goal->summary ?></textarea>
			</fieldset>
			<fieldset>
				<label for='description'>Description</label>
				<textarea style='height: 12em' class='input-xxlarge' name='description' data-required='true' data-error-message='Your goal must have a description.'><?= $this->goal->description ?></textarea>
			</fieldset>

			<fieldset>
				<label for='targetAmount'>Funding Target</label>
				<div class="input-prepend">
		                  <span class="add-on">$</span>
		                  <input class="input-xlarge" name='targetAmount' type="text" placeholder="In US dollars" value='<?= $this->goal->targetAmount ?>' data-required='true' data-error-message='Your goal must have a funding target.'>
		                </div>
			</fieldset>
		        <fieldset>
					<label for='targetMonth'>Target Completion Date For Goal</label>
					<select name='targetMonth'>
					<? for($i = 1; $i < 13; $i++): ?>
					<option value='<?= sprintf("%02d", $i) ?>'<? $nextMonth = sprintf("%02d", $i); if(sprintf("%02d", $i) == $this->goalCompletion['month']){ echo " selected='selected'";} ?>><?= date("F", mktime(0, 0, 0, $i, 10)) ?></option>
				<? endfor; ?>
			</select> <select name='targetDay' class='input-small'>
					<? for($i = 1; $i < 32; $i++): ?>
					<option value='<?= sprintf("%02d", $i) ?>'<? $thisDay = sprintf("%02d", $i); if(sprintf("%02d", $i) == $this->goalCompletion['day']){ echo " selected='selected'";} ?>><?= sprintf("%02d", $i) ?></option>
				<? endfor; ?>
			</select>
			</select> <select name='targetYear' class='input-small'>
					<? for($i = 0; $i < 2; $i++): ?>
					<option value='<?= date("Y") + $i ?>'<? if(date("Y") + $i == $this->goalCompletion['year']){ echo " selected='selected'";} ?>><?= date("Y") + $i ?></option>
				<? endfor; ?>
			</select>
				</fieldset>
				<br>
				<fieldset>
					<label for='targetType'>Goal Type</label>
					<div class='well well-small muted'>
					        <input type='radio' name='targetType' value='complete'  disabled='disabled'> <b>Complete:</b> this goal must reach its target amount by its completion date, or your project will not receive any of the funds raised.
					</div>
					<div class='well well-small '>
					        <input type='radio' name='targetType' value='partial' checked='checked'> <b>Partial:</b> your project will receive all of the funds raised for this goal whether you reach your target amount by the completion date or not.
					</div>
				</fieldset>

			<div class='form-actions'>
		<button class='btn btn-info' type='submit' name='status' value='draft'>Save As Draft</button>
		<button class='btn btn-success' type='submit' name='status' value='publish'>Publish</button>

			</div>

		</form>
	</div>



	<div id='backers' class='tab-pane fade in'>
		<legend>Backers</legend>
		<table class='table table-striped'>
			<thead>
				<tr>
					<th>User</th><th>Amount</th><th>Tour Perk</th><th>Status</th>
				</tr>
			</thead>
			<tbody>
  <?foreach($this->goal->backers as $backer): ?>
  <tr><td><a href='/users/<?= $backer->username ?>'><img src='<?= $backer->avatar ?>' class='avatar-tiny'> <?= $backer->username ?></td><td>$<?= $backer->amount ?></td><td><?= $backer->reward->name ?></td><td><?= $backer->rewardStatus ?></td></tr>
<? endforeach; ?>
</tbody>
</table>
	</div>

	<div id='rewards' class='tab-pane fade in'>
		<legend>Tour Perks <span id='addReward' class='btn pull-right'><i class='icon-plus-sign'></i> Add Tour Perk</span></legend>

		<div id='rewardList'>
			<? foreach($this->goal->rewards as $reward): ?>
			<form enctype="multipart/form-data" class='well well-small editReward form-horizontal' action='/ajax/editReward' method='post'>
							<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />

				<input type='hidden' name='id' value='<?= $reward->id ?>'>
				  <div class="control-group">
				    <label class="control-label" for="minAmount">Minimum Amount</label>
					    <div class="controls">
					      <div class="input-prepend">
							  <span class="add-on">$</span>
							  <input name='minAmount' class='span6' type="text" placeholder="Minimum Amount" value='<?= $reward->minAmount ?>' data-required='true' data-error-message='Your tour perk must have a minimum amount.'>
							</div>
					    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="name">Name</label>
					    <div class="controls">
							  <input name='name' class='input-block-level' type="text" placeholder="Tour Perk Name" value='<?= $reward->name ?>' data-required='true' data-error-message='Your tour perk must have a name.'>
					    </div>
				  </div>

				  <div class="control-group">
				    <label class="control-label" for="image"><? if($reward->image !=''): ?>Replace <? else: ?>Add <? endif; ?>Image (optional)</label>
					    <div class="controls">
							  <input name='image' class='input-block-level' type="file" placeholder="Image">
							  <? if($reward->image !=''): ?><div width='100%'>
				    	<img src='<?= $reward->image ?>' class='span6'></div><? endif; ?>
					    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="description">Description</label>
					    <div class="controls">
							  <textarea class='input-block-level' style='height: 8em' name='description' data-required='true' data-error-message='Your tour perk must have a description.'><?= nl2br($reward->description) ?></textarea>
					    </div>
				  </div>
				   <div class="control-group">
				    <label class="control-label" for="numTotal">Number Total</label>
					    <div class="controls">
							  <input name='numTotal' class='input-block-level' type="text" placeholder="Number Total" value='<?= $reward->numTotal ?>'>
					    <span class='help-block'>If your tour perk is intangible, don't enter anything here or in the &quot;Number Still Available&quot; field below.</span>
					    </div>

				  </div>
				   <div class="control-group">
				    <label class="control-label" for="numStillAvailable">Number Still Available</label>
					    <div class="controls">
							  <input name='numStillAvailable' class='input-block-level' type="text" placeholder="Number Still Available" value='<?= $reward->numStillAvailable ?>'>
					    </div>
				  </div>
				  <div class='form-actions'>
				  	<div>Status: <b><?= ucwords($reward->status) ?></b></div>
				  	<div class='pull-right'><? if($reward->status == "draft"): ?><button type='submit' class='btn' name='action' value='draft'>Save Draft</button> <button type='submit' class='btn btn-success' name='action' value='published'>Publish Tour Perk</button> <? else: ?> <button type='submit' class='btn btn-success' name='action' value='published'>Update Tour Perk</button><? endif; ?></div> <button type='submit' class='pull-left btn btn-danger' name='action' value='delete'>Delete Tour Perk</button>
				  </div>				  
</form>
		<? endforeach; ?>
		</div>
	</div>

</div>
<div class='span3'>
	<h3><i class='icon-info-sign'></i> Adding A Goal</h3>
<p><b>Goals</b> are the most important part of your project: they're how you raise money and bring in collaborators for your project.</p>
<p>When creating a goal for your project, remember that a goal must be specific, finite, realistic, and achievable with the target funding amount you set. An example of a bad goal might be &quot;Change The World&quot; or &quot;End World Hunger&quot;. (Unless you can actually do these things in a finite amount of time with a realistic amount of money, in which case, we're really excited to see your plan.)</p>
<p>Another bad goal might be &quot;Build New High School&quot; with a target funding amount of $2,000...because while the goal is realistic and finite, it's unlikely to be achieved with the funding amount you've decided upon.</p>
<p>Each goal must have a <b>funding target</b> and a <b>target completion date</b> for raising those funds. Goals can be aimed at either <b>complete</b> funding (where your project only receives the funds if you meet your target amount by your target date) or <b>partial</b> funding (where you receive all funds, whether you meet your goal or not).</p><p>When you're first starting your openfire project, you'll only be able to create goals with complete funding; once you've met three of those, and proven your ability to get things done, you can begin adding partial goals.</p>
<p><b>Currently, you can only have one current goal running at a time</b>. You cannot set a new goal to be current until the existing current goal has either failed or succeeded.</p>


	</div>
