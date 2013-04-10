<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 13-4-11
 * Time: 上午12:17
 * To change this template use File | Settings | File Templates.
 */
?><div class="container" style="margin-top: 2em;"><ul class="nav nav-tabs">
    <li <?php if(empty($search_type) || $search_type == 'found') echo 'class="active"'?> >
        <a href="<?php echo base_url('search') . '?s=' . $keyword . '&type=found' ?>">被拾获的物品</a></li>
    <li <?php if(!empty($search_type) && $search_type == 'lost') echo 'class="active"'?> >
        <a href="<?php echo base_url('search') . '?s=' . $keyword . '&type=lost' ?>">丢失的物品</a></li>
</ul></div>