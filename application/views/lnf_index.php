<div class="container" <?php if(empty($nav_active) || $nav_active != 'search') echo 'style="margin-top: 2em;"' ?> >
    <div class="row-fluid" style="min-height: 400px">
        <?php if (!empty($items)): ?>
        <style>
            #items td {overflow: hidden;white-space: nowrap;text-overflow: ellipsis;line-height: 1.6}
        </style>
        <table id="items" class="table table-striped table-hover" style="table-layout: fixed">
            <thead>
            <tr>
                <th style="width: 12%">物品名称</th>
                <th style="width: 28%">物品简述</th>
                <th style="width: 5%">校区</th>
                <th style="width: 15%">详细地点</th>
                <th style="width: 10%">发布日期</th>
                <th style="width: 5%">图片</th>
                <th style="width: 20%">保管地点/联系电话</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($items as $item): ?>
            <tr>
                <td title="<?php echo $item['name']?>"><?php echo $item['name']?></td>
                <td title="<?php echo $item['item_detail']?>"><?php echo $item['item_detail']?></td>
                <td><?php echo $place[$item['place']]?></td>
                <td title="<?php echo $item['place_detail']?>"><?php echo $item['place_detail']?></td>
                <td><?php echo $item['pub_date']?></td>
                <td><?php if (empty($item['pic_related'])) : ?>
                        无
                    <?php else: ?>
                        <a class="fancybox" href="<? echo base_url() . 'uploads/' . $item['pic_related'] ?>">查看</a>
                    <?php endif;?></td>
                <td title="<?php echo $item['contact']?>"><?php echo $item['contact']?></td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
        <?php else: ?>
            <p style="text-align: center">找不到任何条目！</p>
        <?php endif; ?>
    </div>
    <?php echo $pagination ?>
</div><!--/.fluid-container-->

