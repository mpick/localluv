<? global $user; global $embedly; $partials = new Templater(); ?>
<div class="container">
<div class='col-lg-8'>
<h1><b>Explore</b> Bands</h1>
<p>Support your favorite band and experience their journey. </p>
<p><h2 style="text-align:center; margin-top:25px;">Bands Currently on Tour</h2></p>
	<? foreach($this->projects as $project): if($project->status == 'published'): ?>
	<div class='col-lg-4  projectsfont'>
		<a href='/projects/<?= $project->slug ?>'><img src='<?= $project->icon ?>' class='img-responsive'></a>
		<p><h4><a href='/projects/<?= $project->slug ?>'><?= $project->title ?></a></h4></p>
		<p>Category: <b><?= $project->category['name'] ?></b></p>
		<p><?= trimtopcount($project->description, 1) ?></p>
		
		<p class="pull-left">Tours: <?php /*<a href='/projects/<?= $project->slug ?>/goals'> */ ?><?= count($project->goals) ?><?php //</a> ?></p>
		<p class='pull-right'>Backers: <?= count($project->goals[0]->backers) ?></p>

	</div>

<? endif; endforeach; ?>
</div>
<div class='col-lg-4'>
	<h3>Genre</h3>
<ul>
<? foreach($this->categories as $category): ?>
	<li><a href='/projects/categories/<?= $category->slug ?>'><?= $category->name ?> (<?= $category->numProjects ?>)</a></li>
<? endforeach; ?>
        <li><a href='/projects/'>All (<?= count($this->categories) ?>)</a></li>
</ul>
</div>
