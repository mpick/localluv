<script>

$(function() {
	$('#tabMenu a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});

$('.tooltipped').tooltip();

});
</script>
<div class="container">
<div class='row-fluid'>
	<div class='col-lg-2'>
	        <ul class='nav nav-pills nav-stacked'>
                        <li class="active"><a href="#home" data-toggle=tab>Profile</a></li>
                        <li><a href="#bands" data-toggle=tab>Manage My Bands</a></li>
                </ul>
	</div>
<div class='col-lg-7'>

<div class='tab-content'>
        <div class='tab-pane fade in active' id='home'>
                <p><h2><?= $this->user->username ?></h2></p>

                <!-- <form action="/upload-avatar"
                      class="dropzone"
                      id="my-awesome-dropzone">
                      <input type='hidden' name='userUUID' value='<?= $this->user->uuid ?>'></form> -->

                <form enctype="multipart/form-data" action='' method='post' data-validate='parsley'>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                        <fieldset>
	                        <p><label for='avatar'>Avatar</label></p>
	                        <img src='<?= $this->user->avatar ?>' style='height: 64px'> 
	                        <p><input type='file' name='avatar'></p>
                        </fieldset>
                        <br>
                        <fieldset>
	                        <p><label for='email'>Email</label></p>
	                        <p><input type='email' class='form-control' style="width:300px" name='email' value='<?= $this->user->email ?>'data-required='true' ></p>
                        </fieldset>
                        <fieldset>
	                        <label for='password'>New Password</label>
	                        <input type='password' class='form-control' style="width:300px" name='password' id='tpassword'>
                        </fieldset>
                        <fieldset>
	                        <p><label for='password2'>Confirm New Password</label></p>
	                        <p><input type='password' class='form-control' style="width:300px" name='password2' data-equalto='#tpassword' data-error-message='Passwords must match.'></p>
                        </fieldset>
                        <fieldset>
	                        <p><label for='firstName'>First Name</label></p>
	                        <p><input type='text' class='form-control' style="width:300px" name='firstName' value='<?= $this->user->firstName ?>'data-required='true' ></p>
                        </fieldset>
                        <fieldset>
	                        <p><label for='lastName'>Last Name</label></p>
	                        <p><input type='text' class='form-control' style="width:300px" name='lastName' value='<?= $this->user->lastName ?>'data-required='true' ></p>
                        </fieldset>
                        <fieldset>
	                        <p><label for='location'>Location</label></p>
	                        <p><input type='text' class='form-control' style="width:300px" name='location' value='<?= $this->user->location ?>'></p>
                        </fieldset>
                        <fieldset>
	                        <p><label for='bio'>Bio</label></p>
	                        <p><textarea name='bio'class='form-control' style="width:300px" style='height: 12em'><?= $this->user->bio ?></textarea></p>
                        </fieldset>
                        <div class="form-actions">
                        <p><button type="submit" class="btn btn-primary">Save changes</button></p>
                            
	                        <?php 
	                        /* 
	                        <p><a class='btn btn-info' href='/auth/facebook' style='background: #596F90; margin-top: 0.5em; margin-bottom: 0.5em'><i class='icon-facebook'></i> Connect With Facebook</a><? if(!empty($this->user->facebookToken)): ?> <b>connected</b><? endif; ?></p>
                          	<p><a class='btn btn-info' href='/auth/twitter'><i class='icon-twitter'></i> Connect With Twitter</a><? if(!empty($this->user->twitterAuthToken)): ?> <b>connected</b><? endif; ?></p>
                          	*/ 
                          	?>
                        </div>
	        </form>
        </div>

	        <div class='tab-pane fade in' id='bands'>
		        <h2>Manage Bands</h2>

	                <?php 
	                if ( !empty($this->user->projects) > 0 ) {
	                        foreach($this->user->projects as $project): 
	                ?>
	                        <div class='well well-small'>
		                        <h3><a href='/projects/<?= $project->slug ?>'><img src='<?= $project->icon ?>' style='width: 64px'> <?= $project->title ?></a> <? if($project->isAdmin == 1): ?><a href='/manageProject/<?= $project->uuid ?>' class='btn pull-right'><i class='icon-edit'></i> View/Edit Band Info</a><? endif; ?></h3>
	                        </div>
                        <?php 
                                endforeach;
                        }
                        else {
                        ?>
                                <div class='well well-small'>
                                        <h3>You've created your Band on BandAid!</h3>
                                        <a href='/band/create' class='btn text-align-center'> Register Your Band</a>
                                        <br />
                                </div>
                        <?php } ?>
	        </div>
        </div>
</div>
</div>
</div>
