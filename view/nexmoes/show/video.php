<?php view::layout('layout')?>
<?php
$item['thumb'] = onedrive::thumbnail($item['path']);?>
<?php view::begin('content');?>
<script src="https://cdn.jsdelivr.net/npm/xgplayer@2.9.6/browser/index.js" type="text/javascript"></script>
<div class="mdui-container-fluid">
	<div class="nexmoe-item">
		<div class="mdui-center" id="mse"></div>
	</div>
</div>

<?php if(pathinfo($item["name"], PATHINFO_EXTENSION) === 'flv'){ 
	e('<script src="https://cdn.jsdelivr.net/npm/xgplayer-flv.js@2.1.2/browser/index.js" charset="utf-8"></script>
	<script>
	let player = new window.FlvJsPlayer({
		id: "mse",
		url: \'');e($item['downloadUrl']);e('\',
		playsinline: true,
		fitVideoSize: true,
		cssFullscreen: true
		minCachedTime: 10,
		playbackRate: [
			0.5,
			0.75,
			1,
			1.5,
			1.75,
			2
		],
		download: true,
		pip: true,
		keyShortcut: "on",
		poster	: \'');e($item['thumb']);
	e('\'});
	</script>');}
else {
	e('<script src="https://cdn.jsdelivr.net/npm/xgplayer-mp4@1.1.8/browser/index.js" charset="utf-8"></script>
	<script>
	let player = new Player({
		id: "mse",
		url: \'');e($item['downloadUrl']);e('\',
		playsinline: true,
		fitVideoSize: true,
		cssFullscreen: true,
		playbackRate: [
			0.5,
			0.75,
			1,
			1.5,
			1.75,
			2
		],
		download: true,
		pip: true,
		keyShortcut: "on",
		poster	: \'');e($item['thumb']);
	e('\'});
	</script>');}
?>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>
<?php view::end('content');?>