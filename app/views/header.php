<? global $user; ?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="Q75qkjWivhgKNp5SAVjcNhklBZhU8burcU_juYZQEhU" />
<?php if ( isset($this->metaTagExtra) ) { echo $this->metaTagExtra; } ?>
<title>BandAid<? if(!empty($this->title)) echo " | " . $this->title ?></title>
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/elusive-webfont.css" rel="stylesheet" media="screen">
<link href="/css/bootstrap.css" rel="stylesheet" media="screen">
<? if(!empty($this->css)): foreach($this->css as $url): ?>
<link rel="stylesheet" href="<?= $url ?>">
<? endforeach; endif; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43081497-1', 'beabandaid.co');
  ga('send', 'pageview');

</script>
<script src='/app/libraries/min/b=js&f=bootstrap.min.js,holder.js,jquery.form.js,parsley.js,jquery.cookie.js'></script>
<? if(!empty($this->scripts)): foreach($this->scripts as $url): ?>
<script src='<?= $url ?>'></script>
<? endforeach; endif; ?>
</head>

<body<? if(!empty($this->bodyClass)): ?> class="<?= $this->bodyClass ?>"<? endif; ?>>
<div class='container-fluid'>
  <?php 
  error_reporting(E_ALL);
ini_set('display_errors', '1');
  ?>
      <!-- Static navbar -->
<div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="/projects">Explore Bands</a></li>
          <li><a href="/createProject">Register Your Band</a></li>
          <li><a href="/about">About Us</a></li>
<!--             <li>
              <form class='navbar-form form-search' action='/search' method='get'>
                <input type='text' class='input-medium search-query' name='q'> <button class='btn'type='submit'>Search</button>
              </form>
            </li>
          <li class="divider-vertical"></li> -->

    <? if(empty($user->id)): ?>
            <li class='dropdown'>
             <a href="#loginModal" role="button" data-toggle="modal">Login</a>

            </li>
<? else: ?>
            <li class='dropdown' style='margin-left: 2em'>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='muted'>Logged in as</span> <img src='<?= $user->avatar?>' height="20px" class='avatar'> <?= $user->username ?> <b class="caret"></b></a>
              <ul class='dropdown-menu'>
                
                <li><a href='/profile'>My Profile</a></li>
                <li><a href='/logout'>Logout</a></li>
              </ul>
            </li>
<? endif; ?>
        </ul>
        <h3 class="text-muted"><a href="/"><img src="/images/bandaid_logo.png" height="35px"></a><?php switch (HOSTNAME) { case "www.beabandaid.com": break; case "stage.beabandaid.com": echo "&nbsp;&nbsp;&nbsp;STAGING"; break; default: echo "&nbsp;&nbsp;&nbsp;OTHER";} ?></h3>
      </div>
</div>
<!-- Main body -->

