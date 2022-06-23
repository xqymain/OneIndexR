<!--
            Copyright 2020 dl233
   Licensed under the Apache License, Version 2.0
             Modified by xqymain
-->

<?php view::layout('layout')?>
<?php view::begin('content');?>
<div class="mdui-container-fluid">
    <div class="nexmoe-item">
	<div id="mse"></div>
    <script src="https://unpkg.byted-static.com/xgplayer/2.31.0/browser/index.js" charset="utf-8"></script>
    <script src="https://unpkg.byted-static.com/xgplayer-music/2.2.0/browser/index.js" charset="utf-8"></script>
    <script type="text/javascript">
      let player = new window.Music({
          id: 'mse',
          url: [{src: '<?php e($item['downloadUrl']);?>', name: '<?php e($item['name']);?>', poster: "<?php if($item['thumb']!="")@e($item['thumb'].'&width=50&height=50');?>"}],
          volume: 0.8,
		  volumeShow: true,
          width: 900,
          height: 50
      });
	</script>
	</div>
</div>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>
<?php view::end('content');?>