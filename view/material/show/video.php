<?php view::layout('layout')?>
<?php
$item['thumb_origin'] = onedrive::thumbnail($item['path']);
$item['thumb'] = str_ireplace($item['source_website'],$item['cdn_website'],$item['thumb_origin']);
?>
<?php view::begin('content');?>
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
<?php 
if(pathinfo($item["name"], PATHINFO_EXTENSION) === 'flv'){ 
	e('<script src="https://cdn.jsdelivr.net/npm/xgplayer@2.10.1/browser/index.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/xgplayer-flv@2.3.29/dist/index.min.js" charset="utf-8"></script>
	<script>
	let player = new FlvPlayer({
		id: "mse",
		url: \'');e($item['downloadUrl']);e('\',
		textTrack: [
			{
			  src: "');e(str_replace(pathinfo($item["name"], PATHINFO_EXTENSION),"vtt",$url));
			  e('",
			  kind: "subtitles",
			  label: "default",
			  srclang: "zh",
			  default: true
			}
		],
		playsinline: true,
		fitVideoSize: true,
		cssFullscreen: true,
		minCachedTime: 10,
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
		poster	: \'');e($item['thumb']);
	e('\'});
	</script>');
}

else if(pathinfo($item["name"], PATHINFO_EXTENSION) === 'mp4'){
	e('<script src="https://cdn.jsdelivr.net/npm/xgplayer@2.10.1/browser/index.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/xgplayer-mp4@1.1.8/browser/index.js" charset="utf-8"></script>
	<script>
	let player = new Player({
		id: "mse",
		url: \'');e($item['downloadUrl']);e('\',
		textTrack: [
			{
			  src: "');e(str_replace(pathinfo($item["name"], PATHINFO_EXTENSION),"vtt",$url));
			  e('",
			  kind: "subtitles",
			  label: "default",
			  srclang: "zh",
			  default: true
			}
		],
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
		poster	: \'');e($item['thumb']);
	e('\'});
	</script>');
}

else if(pathinfo($item["name"], PATHINFO_EXTENSION) === 'webm'){
	e('<link href="https://cdn.jsdelivr.net/npm/video.js@7.8.4/dist/video-js.min.css" rel="stylesheet" />
	<video
		id="my-video",
		class="video-js"
		poster="');e($item['thumb']);e('"
		data-setup="{}"
	>
	<source src="');e($item['downloadUrl']);e('" type="video/webm"/>
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
  </video>
  <script src="https://cdn.jsdelivr.net/npm/video.js@7.8.4/dist/video.min.js"></script>
		');
}

// This is an experimental feature, recommended only for videos with small capacity
else if(pathinfo($item["name"], PATHINFO_EXTENSION) === 'ts' || pathinfo($item["name"], PATHINFO_EXTENSION) === 'm2ts'){
	e('<video controls width="80%"></video>
    <script src="https://cdn.jsdelivr.net/npm/mux.js@5.6.6/dist/mux.min.js"></script>
    <script>
      // Create array of TS files to play
      segments = [
        "');e($item['downloadUrl']);e('"
      ];

      // Replace this value with your files codec info
      mime = \'video/mp4; codecs="mp4a.40.2,avc1.64001f"\';

      let mediaSource = new MediaSource();
      let transmuxer = new muxjs.mp4.Transmuxer();

      video = document.querySelector(\'video\');
      video.src = URL.createObjectURL(mediaSource);
      mediaSource.addEventListener("sourceopen", appendFirstSegment);

      function appendFirstSegment(){
        if (segments.length == 0){
          return;
        }

        URL.revokeObjectURL(video.src);
        sourceBuffer = mediaSource.addSourceBuffer(mime);
        sourceBuffer.addEventListener(\'updateend\', appendNextSegment);

        transmuxer.on(\'data\', (segment) => {
          let data = new Uint8Array(segment.initSegment.byteLength + segment.data.byteLength);
          data.set(segment.initSegment, 0);
          data.set(segment.data, segment.initSegment.byteLength);
          console.log(muxjs.mp4.tools.inspect(data));
          sourceBuffer.appendBuffer(data);
        })

        fetch(segments.shift()).then((response)=>{
          return response.arrayBuffer();
        }).then((response)=>{
          transmuxer.push(new Uint8Array(response));
          transmuxer.flush();
        })
      }

      function appendNextSegment(){
        // reset the \'data\' event listener to just append (moof/mdat) boxes to the Source Buffer
        transmuxer.off(\'data\');
        transmuxer.on(\'data\', (segment) =>{
          sourceBuffer.appendBuffer(new Uint8Array(segment.data));
        })

        if (segments.length == 0){
          // notify MSE that we have no more segments to append.
          mediaSource.endOfStream();
        }

        segments.forEach((segment) => {
          // fetch the next segment from the segments array and pass it into the transmuxer.push method
          fetch(segments.shift()).then((response)=>{
            return response.arrayBuffer();
          }).then((response)=>{
            transmuxer.push(new Uint8Array(response));
            transmuxer.flush();
          })
        })
      }
	</script>');
}
?>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>
<?php view::end('content');?>
