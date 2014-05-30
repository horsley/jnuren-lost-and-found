<div class="container">
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <h3>信息发布成功</h3>
      </div>
      <div class="form-group">
        <span>如有需要，你可以保存好以下链接（可用于删除本条信息）</span>
      </div>
      <div class="form-group">
        <div class="col-lg-8">
            <input type="text" id="focusedInput" class="form-control" value="<?php echo $delete_url; ?>">
        </div>
      </div>
      <div class="form-group">
        <a href="<?php echo $return_url ?>">返回首页</a>
      </div>
    </form>
</div>