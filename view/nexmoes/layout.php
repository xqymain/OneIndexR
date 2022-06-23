<!--
            Copyright 2020 dl233
   Licensed under the Apache License, Version 2.0
             Modified by xqymain
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
	<title><?php e(config('site_name'));?></title>
	<link rel="shortcut icon" href="//<?php print($_SERVER['HTTP_HOST']) ?>/view/nexmoes/theme/favicon.ico">
	<link rel="stylesheet" href="https://lib.baomitu.com/mdui/0.4.3/css/mdui.min.css" integrity="sha256-6qmBnKuMpat5q87DddBqPCow5gfT/seDX7MMCqcF23g=" crossorigin="anonymous">
	<link rel="stylesheet" href="//<?php print($_SERVER['HTTP_HOST']) ?>/view/nexmoes/theme/style.css">
	<script src="https://lib.baomitu.com/mdui/0.4.3/js/mdui.min.js" integrity="sha256-czQNy3ygtVNeyJKT2CrwVzzDBa9VfksAad4F6y2oad4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://lib.baomitu.com/aplayer/1.10.1/APlayer.min.css">
	<script src="https://lib.baomitu.com/aplayer/1.10.1/APlayer.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/meting@2/dist/Meting.min.js"></script>
</head>
<body class="mdui-theme-primary-blue-grey mdui-theme-accent-blue">
	<header class="nav">
		<div class="navSize">
			<a href="/"><img class="avatar" src="//<?php print($_SERVER['HTTP_HOST']) ?>/view/nexmoes/picture/logo.png" /></a>
			<div class="navRight">
				<ul class="navul">
					<li class="navli"><a href="//<?php print($_SERVER['HTTP_HOST']) ?>/?/login">登录</a></li>
					<li class="navli"><svg aria-label="star" class="octicon octicon-star" viewBox="0 0 16 16" version="1.1" width="8" height="10" role="img"><path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path></svg><a href="https://github.com/xqymain/OneIndexR" target="_blank">Star</a></li>
				</ul>
				<div class="icon"></div>
			</div>
		</div>
	</header>
	<div class="mdui-container">
	    <div class="mdui-container-fluid">
	    <div class="mdui-toolbar nexmoe-item">
			<a href="/"><?php e(config('site_name'));?></a>
			<?php foreach((array)$navs as $n=>$l):?>
			<i class="mdui-icon material-icons mdui-icon-dark" style="margin:0;">chevron_right</i>
			<a href="<?php e(str_replace('%2F','/',str_replace('%2F%3F%2F','/?/',rawurlencode($l))));?>"><?php e($n);?></a>
			<?php endforeach;?>
			<!--<a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>-->
		</div>
		</div>
    	<?php view::section('content');?>
  	</div>
	<meting-js
		server="netease"
		type="playlist"
		id="2174371230"
		fixed="true">
	</meting-js>
	<!-- id改成自己的歌单号 -->
	<script src="//<?php print($_SERVER['HTTP_HOST']) ?>/view/nexmoes/theme/personjs.js"></script>
</body>
</html>