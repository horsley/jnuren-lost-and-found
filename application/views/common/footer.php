<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 13-3-28
 * Time: 上午12:59
 * To change this template use File | Settings | File Templates.
 */?>
<div class="container" style="padding-bottom: 10px;">
    <hr>
    <span>
        &copy; 2013 <a href="http://www.jnuren.com" target="_blank">Jnuren</a>. All Rights Reserved.
    </span>
    <span class="pull-right" style="color: #bbc">
        UI by <a href="http://weibo.com/shoko24" target="_blank">Yqol</a>,
        Code by <a href="http://weibo.com/horsley" target="_blank">Horsley</a>
    </span>
</div>

<!-- global load jquery/search form validation -->
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js">/*cdn jquery*/</script>
<script>!window.jQuery && document.write('<script src="<? echo base_url() ?>js/jquery.js"><\/script>')</script>

<script>
    $(function(){
        $('form#search').submit(function() {
            if ($.trim($('input[name="s"]').val()) == '') return false;
        });
    });
</script>

<?php if (!empty($nav_active) && $nav_active == 'post') : //搜索页表单检查 ?>
<!-- post page form validation -->
<script type="text/javascript">
    $(function(){
        $('form#post_new_item').submit(function(){ //简单的前端检查
            if ($.trim($('input[name="item_name"]').val()) == '' ||
                $.trim($('input[name="place_detail"]').val()) == '' ||
                $.trim($('input[name="item_detail"]').val()) == '' ||
                $.trim($('input[name="contact"]').val()) == ''
                ) {
                $('.help-inline.hide').removeClass('hide');
                return false;
            }
        });
    });
</script>
<!-- button state restore -->
<script type="text/javascript">
    $(function(){
        if ($('#info_type button').has('active').val() ==
            $('input[name="info_type"]').val()) { //填写错误时返回表单，预填充值还原按钮状态
            $('#info_type button').toggleClass('active');
        }
        $('#info_type button').click(function(){
            $('input[name="info_type"]').val($(this).val());
            $('#info_type button').toggleClass('active');
            return false;
        });
    });
</script>
<?php elseif (!empty($nav_active) && $nav_active == 'post_success') : //成功页面的复制链接  ?>
<script type="text/javascript" src="<? echo base_url() ?>js/ZeroClipboard.min.js"></script>
<script type="text/javascript">
    ZeroClipboard.setDefaults( { moviePath: '<? echo base_url() ?>img/ZeroClipboard.swf' } );
    if ($('#mod_url').length) {
        var clip = new ZeroClipboard($('button#url_copy'));

        clip.on( 'complete', function(client, args) {
            $('span#cp_success_sign').show();
        });
    }
 </script>
<?php else: ?>
<!-- funcybox to show pic-->
<link rel="stylesheet" href="<? echo base_url() ?>css/jquery.fancybox.css" type="text/css">
<script type="text/javascript" src="<? echo base_url() ?>js/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
    //展示图片的
    $(function() {
        $(".fancybox").fancybox();
    });
</script>
<?php endif; ?>
</body>
</html>