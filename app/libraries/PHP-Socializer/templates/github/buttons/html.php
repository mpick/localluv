<iframe src="<?php echo $buttonUrl; ?>?user=<?php echo $username; ?>&repo=<?php echo $repository; ?>&type=<?php echo $type; ?><?php if ($count) echo '&count=true'; ?><?php if ($size) echo "&size={$size}"; ?>"
  allowtransparency="true" frameborder="0" scrolling="0" width="<?php echo $width; ?>px" height="<?php echo $height; ?>px"></iframe>
