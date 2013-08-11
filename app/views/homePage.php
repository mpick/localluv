</div>
</div>
<div class="hero-unit">

<? global $user; global $embedly; $partials = new Templater(); ?>
     <div class="splash-row">
        <div class="row-fluid">
          
          <div class="span10 splash offset1">
           <div class='row-fluid'>
            <div class='span2'>
            <img width="200" src="img/bandaid_logo.png">
          </div>
          <div class='span10'>
            <h1>
              <strong>
                Support the Tour. Experience the journey.
              </strong>
              <br />
              
            </h1>
          </div>
        </div>
          </div>
           
      </div>
    </div>
  </div> <!--end hero unit-->
<div class='container-fluid'> <!--container start-->
  <?php 
  error_reporting(E_ALL);
ini_set('display_errors', '1');
  ?>
    <hr>
    <div class="row-fluid max1000">
      
      
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
      </div>-->

      <div class="featuredGoals">
        <h2>
            Featured Tours
        </h2>
        <ul class='thumbnails'>
        <? foreach($this->featuredGoals as $goal): $project = new Project($goal->projectID) ?>
        <li class="goal span4">
            <div class="media">
                     <? //if(!empty($goal->mediaEmbed)){ if(empty($this->mediaWidth)) $this->mediaWidth = 280; $objs = $embedly->oembed(array('url' => $goal->mediaEmbed, 'maxwidth' => $this->mediaWidth)); if(!empty($objs[0]->html)) echo $objs[0]->html; } ?>      
                     <a title="<?= $project->title ?>" href="/projects/<?= $project->slug ?>"><img src='<?= $project->icon ?>' style='width: 100%;'></a>
            </div>
            <div class="goal-progress" title="<?= $goal->percentComplete ?>% funded">
                <div class="gprogress" style="width:<?= $goal->percentComplete ?>%"></div>
            </div>
            <h3>
                <a title="<?= $goal->name ?>" href="/goals/<?= $goal->uuid ?>"><?= $goal->name ?></a>
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
      <img src="http://ad.retargeter.com/seg?add=659127&t=2" width="1" height="1" />
