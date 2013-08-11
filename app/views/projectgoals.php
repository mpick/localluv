<div class="container">
	<? global $user; global $embedly; $partials = new Templater(); ?>
<div class='col-lg-7 projectGoals'>
	<? foreach($this->project->goals as $goal): 
	$partials->load('partial-goal-mini'); 
      $partials->goal = $goal; 
      $partials->project = new Project($partials->goal->projectID);
      $partials->showProject = false;
      $partials->showProjectIcon = false;
      $partials->mediaWidth = 480;
      $partials->publish();
	 endforeach; ?>
</div>
<div class='col-lg-4 col-lg-offset-1 sidebar'>
<div class='project item widget'>
	<h3><a href="/projects/<?= $this->project->slug ?>"><img src='<?= $this->project->icon ?>' class='project-icon-inline' ?> <?= $this->project->title ?></a></h3>
	<div class='description'><?= nl2br($this->project->description) ?></div>
</div>
	</div>