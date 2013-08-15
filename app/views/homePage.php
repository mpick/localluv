<? global $user; global $embedly; $partials = new Templater(); ?>
  <div class="jumbotron">
    <div class="container">
      <div class="col-lg-2 col-lg-offset-1">
        <img width="200" src="img/bandaid_logo_white.png">
      </div>
      <div class="col-lg-8">
        <h1>
          <strong>
            <p>Support the tour.</p>
            <p>Experience the journey.</p>
          </strong> 
        </h1>
      </div>
      <div class="col-lg-11">
        <p>Bands win. Fans win. Music wins.</p>
      </div>
    </div>
  </div>
          
<div class='container'> <!--container start-->
  <?php 
  error_reporting(E_ALL);
ini_set('display_errors', '1');
  ?>
    <hr>

      
      
      <?php /*
      <div class="featuredProjects">
        <h2>
          Featured Projects
        </h2>
        <ul class='thumbnails'>
        <? foreach($this->featuredProjects as $project): ?>
        <li class="project span4">
             <div class="media" style='text-align:center'>
                    <a title="<?= $project->title ?>" href="/projects/<?= $project->slug ?>"><img src='<?= $project->icon ?>' style='width: 100%;'></a>
            </div>
          <h3>
            <a title="<?= $project->title ?>" href="/projects/<?= $project->slug ?>">
              <?= $project->title ?>
            </a>
          </h3>
          
          <div class="summary">
            <?= nl2br($project->summary) ?>
          </div>
          <p>
            
            Started on 
            <strong>
              <?= date("F jS, Y", $project->dateAdded) ?>
            </strong>
            
            <br>
            
            <strong>
              $<?= $project->totalFunding ?>
            </strong>
            raised so far
          </p>
        </li>
      <? endforeach; ?>
    </ul>
      </div>
      */ ?>
    </div>
    <div class="featuredprojects">
      <div class="col-lg-12">
        <h2>
            Featured Tours
        </h2>
        <ul class='thumbnails'>
        <? foreach($this->featuredGoals as $goal): $project = new Project($goal->projectID) ?>
        <li class="goal col-lg-3">
            <div class="media">
                     <? //if(!empty($goal->mediaEmbed)){ if(empty($this->mediaWidth)) $this->mediaWidth = 280; $objs = $embedly->oembed(array('url' => $goal->mediaEmbed, 'maxwidth' => $this->mediaWidth)); if(!empty($objs[0]->html)) echo $objs[0]->html; } ?>      
                     <a title="<?= $project->title ?>" href="/projects/<?= $project->slug ?>"><img src='<?= $project->icon ?>' style='width: 100%;'></a>
            </div>
            <div class="goal-progress" title="<?= $goal->percentComplete ?>% funded">
                <div class="gprogress" style="width:<?= $goal->percentComplete ?>%"></div>
            </div>
            <h3>
                <a title="<?= $goal->name ?>" href="/projects/<?= $project->slug ?>"><?= $project->title ?></a>&nbsp;<p><span style="font-size:0.65em">(<?php echo $goal->name ?>)</span></p>
            </h3>
             
            <div class="summary">
            <?= nl2br($goal->summary) ?>
            </div>
            <!--<div class="project-info">
                <img src="<?= $project->icon ?>" height="50" width="50" /> <a href="/projects/<?= $project->slug ?>"><?= $project->title ?></a>
            </div>-->
        </li>
      <? endforeach; ?>
    </ul>

      </div>
    </div>
