<?php view::layout('layout')?>

<?php view::begin('content');?>
<div class="mdui-container-fluid">
    <div class="nexmoe-item">
	
	<div id="mse"></div>
    <script src="https://cdn.jsdelivr.net/npm/xgplayer@2.9.6/browser/index.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/xgplayer-music@2.1.7/browser/index.js" charset="utf-8"></script>
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
	
	<br>
	<!-- 固定标签 -->
	<div class="mdui-textfield">
	  <label class="mdui-textfield-label">下载地址</label>
	  <input class="mdui-textfield-input" type="text" value="<?php e($url);?>"/>
	</div>
	<div class="mdui-textfield">
	  <label class="mdui-textfield-label">引用地址</label>
	  <textarea class="mdui-textfield-input"><audio src="<?php e($url);?>"></audio></textarea>
	</div>
	</div>
</div>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>
<?php view::end('content');?>