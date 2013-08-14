<? global $user; global $embedly; $partials = new Templater(); ?>
<div class="container">
<div class='col-lg-8'>
<h1><b>Explore</b> Bands</h1>
<p>Support your favorite band and experience their journey. </p>
<p><h2 style="text-align:center; margin-top:25px;">Bands Currently on Tour</h2></p>
	<? foreach($this->projects as $project): if($project->status == 'published'): ?>
	<div class='well well-small'>
	<div class='row-fluid'>
		<div class='col-lg-2'><a href='/projects/<?= $project->slug ?>'><img src='<?= $project->icon ?>' class='pull-left' style='width: 128px'></a></div>
		<div class='col-lg-9 col-lg-offset-1'><h4><a href='/projects/<?= $project->slug ?>'><?= $project->title ?></a></h4>
			<div>Category: <b><?= $project->category['name'] ?></b></div>
		<div><?= trimtopcount($project->description, 1) ?></div>
		<div style='font-weight: bold'>Tours: <?php /*<a href='/projects/<?= $project->slug ?>/goals'> */ ?><?= count($project->goals) ?><?php //</a> ?>&nbsp;| Backers: <?= count($project->goals[0]->backers) ?></div>
	</div>
</div>
	<div class='clearfix'></div>
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
