	<div class="container" style="margin: 2em auto">
		<h4>信息发布成功</h4>
		<p>如有需要，你可以保存好以下链接（可用于删除本条信息）</p>
        <div class="input-append">
            <input id="mod_url" type="text" value="<?php echo $modify_url; ?>" class="input-xxlarge">
            <button id="url_copy" class="btn btn-success" data-clipboard-target="mod_url">复制</button>
        </div>
        <p><a href="<?php echo $return_url ?>">返回首页</a></p>
	</div>