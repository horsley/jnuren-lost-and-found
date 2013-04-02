<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 13-3-28
 * Time: 上午1:12
 * To change this template use File | Settings | File Templates.
 */?>
<div class="container" style="margin: 2em auto">
    <div class="row-fluid" style="min-height: 420px">
        <?php echo form_open_multipart('post', array('class' => 'form-horizontal', 'id' => 'post_new_item')) ?>

        <?php echo $antibot; ?>
            <div class="control-group">
                <label class="control-label">发布类型：</label>
                <div class="controls">
                    <div class="btn-group" id="info_type">
                        <button class="btn active" value="1">我拾获了物品</button>
                        <button class="btn" value="2">我遗失了物品</button>
                    </div>
                    <input type="hidden" name="info_type" value="<?php echo set_value('info_type', '1'); ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">物品名称：</label>
                <div class="controls">
                    <input class="span4" type="text" name="item_name" value="<?php echo set_value('item_name'); ?>">
                    <span class="help-inline">简短的物品名称，如校园卡、钥匙串等</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">物品描述：</label>
                <div class="controls">
                    <input class="span4" type="text" name="item_detail" value="<?php echo set_value('item_detail'); ?>">
                    <span class="help-inline">物品的特征，例如校园卡上的姓名</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">所在校区：</label>
                <div class="controls">
                    <select class="span4" name="place">
                        <option value="1" <?php echo set_select('place', '1'); ?>>校本部</option>
                        <option value="2" <?php echo set_select('place', '2'); ?>>珠区</option>
                        <option value="3" <?php echo set_select('place', '3'); ?>>华文</option>
                        <option value="4" <?php echo set_select('place', '4'); ?>>深旅</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">详细地点：</label>
                <div class="controls">
                    <input class="span4" type="text" name="place_detail" value="<?php echo set_value('place_detail'); ?>">
                    <span class="help-inline">例如教学楼xxx课室</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">联系方式：</label>
                <div class="controls">
                    <input class="span4" type="text" name="contact" value="<?php echo set_value('contact'); ?>">
                    <span class="help-inline">你的联系方式或公共保管失物的地方</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">上传照片：</label>
                <div class="controls">
                    <input class="span4" type="file" name="item_pic">
                    <span class="help-inline">&nbsp;&nbsp;&nbsp;&nbsp;可选，可以考虑局部打码后再上传</span>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" type="submit">发布</button>
                    <?php
                        $v_err = validation_errors();
                        if (empty($v_err)) $v_err = 'hide';
                    ?>
                    <span class="help-inline <?php echo $v_err ?>" style="color: #922"> * 除照片外其他字段均为必填</span>
                </div>
            </div>
        </form>
    </div>
</div>