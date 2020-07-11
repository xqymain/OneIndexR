<?php view::layout('layout')?>

<?php 
//仅支持教育版和企业版
if(strpos($item['downloadUrl'],"sharepoint.com") == false || strpos($item['downloadUrl'],$item['cdn_website']) == false){
	header('Location: '.$item['downloadUrl']);exit();
}
$item['thumb'] = onedrive::thumbnail($item['path']);
$mpd =  str_replace("thumbnail","videomanifest",$item['thumb'])."&part=index&format=dash&useScf=True&pretranscode=0&transcodeahead=0";
?>

<?php view::begin('content');?>
<script src="https://cdn.jsdelivr.net/npm/xgplayer@2.9.6/browser/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/xgplayer-shaka@1.1.5/browser/index.js"></script>
<div class="mdui-container-fluid">
	<div class="nexmoe-item">
		<div class="mdui-center" id="mse"></div>
	</div>
</div>
<script type="text/javascript">
let player = new window.ShakaJsPlayer({
	id: "mse",
	url: '<?php echo $mpd;?>',
	ignores: ['error'],
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
	poster	: '<?php @e($item['thumb']);?>'
});
</script>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>
<?php view::end('content');?>