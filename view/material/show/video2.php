<?php view::layout('layout')?>

<?php 
//仅支持教育版和企业版
if(strpos($item['downloadUrl'],"sharepoint.com") == false || strpos($item['downloadUrl'],$item['cdn_website']) == false){
	header('Location: '.$item['downloadUrl']);exit();
}
$item['thumb_origin'] = onedrive::thumbnail($item['path']);
$item['thumb'] = str_ireplace($item['source_website'],$item['cdn_website'],$item['thumb_origin']);
$mpd =  str_replace("thumbnail","videomanifest",$item['thumb'])."&part=index&format=dash&useScf=True&pretranscode=0&transcodeahead=0";
?>

<?php view::begin('content');?>
<script src="https://unpkg.byted-static.com/xgplayer/2.31.0/browser/index.js"></script>
<script src="https://unpkg.byted-static.com/xgplayer-shaka/1.1.5/browser/index.js"></script>
<div class="mdui-container-fluid">
	<br>
	<div id="mse"></div>
	<br>
	<!-- 固定标签 -->
	<div class="mdui-textfield">
	  <label class="mdui-textfield-label">下载地址</label>
	  <input class="mdui-textfield-input" type="text" value="<?php e($url);?>"/>
	</div>
	<div class="mdui-textfield">
	  <label class="mdui-textfield-label">引用地址</label>
	  <textarea class="mdui-textfield-input"><video><source src="<?php e($url);?>" type="video/mp4"></video></textarea>
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
		1.25,
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