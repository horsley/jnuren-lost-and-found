<div class="container">
    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
    <?php echo form_open_multipart('create', array('class' => 'form-horizontal', 'id' => 'post','role' => 'form')) ?>
        <div class="form-group">
            <label for="info_type" class="col-sm-2 control-label">发布类型：</label>
            <div class="col-sm-7">
                <div class="btn-group">
                    <button type="button" class="btn btn-default active" value="1">我拾获了物品</button>
                    <button type="button" class="btn btn-default" value="2">我遗失了物品</button>
                </div>
                <input type="hidden" id="info_type" name="info_type" value="<?php echo set_value('info_type', '1'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="item_name" class="col-sm-2 control-label">物品名称：</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="简短的物品名称，如校园卡、钥匙串等">
            </div>
        </div>
        <div class="form-group">
            <label for="item_detail" class="col-sm-2 control-label">物品描述：</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="item_detail" name="item_detail" placeholder="物品的特征，例如校园卡上的姓名">
            </div>
        </div>
        <div class="form-group">
            <label for="place_detail" class="col-sm-2 control-label">详细地点：</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="place_detail" name="place_detail" placeholder="例如教学楼xxx教室">
            </div>
        </div>
        <div class="form-group">
            <label for="contact" class="col-sm-2 control-label">联系方式：</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="contact" name="contact" placeholder="你的联系方式或公共保管失物的地方">
            </div>
        </div>
        <div class="form-group">
            <label for="item_pic" class="col-sm-2 control-label">上传照片：</label>
            <div class="col-sm-7">
                <input type="file" accept="image/*" class="form-control" id="item_pic" name="item_pic" placeholder="你的联系方式或公共保管失物的地方">
                <span class="help-inline">可选，可以考虑局部打码后再上传</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-primary" type="submit">发布</button>
            </div>
        </div>
    </form>
</div>