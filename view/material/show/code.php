<?php view::layout('layout')?>
<?php 
	function code_type($ext){
		$code_type['html'] = 'Html';
		$code_type['htm'] = 'Html';
		$code_type['php'] = 'php';
		$code_type['css'] = 'css';
		$code_type['go'] = 'Golang';
		$code_type['java'] = 'Java';
		$code_type['js'] = 'JavaScript';
		$code_type['json'] = 'Json';
		$code_type['txt'] = 'Text';
		$code_type['sh'] = 'sh';
		$code_type['c'] = 'C';
        $code_type['cpp'] = 'C++';
        $code_type['h'] = 'C';
        $code_type['hpp'] = 'C++';
        $code_type['cc'] = 'C++';
        $code_type['py'] = 'Python';
        $code_type['rs'] = 'Rust';
        $code_type['lua'] = 'Lua';
        $code_type['vbs'] = 'VisualBasicScript';
		
		return @$code_type[$ext];
	}
	$language = code_type($ext);

	$content = IndexController::get_content($item);
?>
<?php view::begin('content');?>
<style type="text/css" media="screen">
    #editor { 
        /*height:800px;*/
    }
</style>
<div class="mdui-container">
<pre id="editor" ><?php echo htmlentities($content);?></pre>
</div>
<div class="mdui-textfield">
	<label class="mdui-textfield-label">下载地址</label>
	<input class="mdui-textfield-input" type="text" value="<?php e($url);?>"/>
</div>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>

<script src="https://lib.baomitu.com/ace/1.6.0/ace.min.js"></script>
<script src="https://lib.baomitu.com/ace/1.6.0/ext-language_tools.min.js"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/ambiance");
    editor.setFontSize(18);
    editor.session.setMode("ace/mode/<?php e($language);?>");
    
    //Autocompletion
    editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: true,
        maxLines: Infinity
    });
</script>
<?php view::end('content');?>