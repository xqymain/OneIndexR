<!--
            Copyright 2020 dl233
   Licensed under the Apache License, Version 2.0
             Modified by xqymain
-->
<?php view::layout('layout')?>

<?php view::begin('content');?>
	<iframe id="mask" src='//<?php print($_SERVER['HTTP_HOST']) ?>/api/pdfjs.html?file=<?php e($url)?>' 
		allowfullscreen="allowfullscreen"
        mozallowfullscreen="mozallowfullscreen"
        msallowfullscreen="msallowfullscreen"
        oallowfullscreen="oallowfullscreen"
        webkitallowfullscreen="webkitallowfullscreen"
        width="100%"
        style="position: absolute;top:0;left:0; z-index:10;"
        ></iframe>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent" style="z-index:99;"><i class="mdui-icon material-icons">file_download</i></a>
<script>
$ = mdui.JQ;
$(function(){  
      
    var sWidth=document.documentElement.clientWidth;  
    var sHeight=document.documentElement.clientHeight;  
    //获取页面的可视区域高度和宽度  
    var wHeight=document.documentElement.clientHeight;  
    var oMask=document.getElementById("mask");  
    var oMaskIframe=document.getElementById("maskIframe");  
      
    oMask.style.height=(sHeight-1)+"px";  
    oMask.style.width=(sWidth-4)+"px";  
      
});  
</script>
<?php view::end('content');?>