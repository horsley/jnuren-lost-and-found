<div class="container">
    <div class="table-responsive">
        <?if(!empty($items)): ?>
        <table id="items" class="table table-striped">
            <thead>
            <tr>
                <th style="display: none">ID</th>
                <?if(!empty($admin)):?>
                    <th style="width: 5%">管理</th>
                    <th style="width: 9%">物品名称</th>
                    <th style="width: 26%">物品简述</th>
                <?else:?>
                    <th style="width: 12%">物品名称</th>
                    <th style="width: 28%">物品简述</th>
                <?endif;?>
                <th style="width: 15%">详细地点</th>
                <th style="width: 10%">发布日期</th>
                <th style="width: 5%">图片</th>
                <th style="width: 20%">保管地点/联系电话</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($items as $item): ?>
            <tr>
                <th style="display: none"><?php echo $item['id']; ?></th>
                <?if(!empty($admin)):?>
                    <td class="admin"><?php echo anchor($item['delete_url'], '删除'); ?></td>
                <?endif;?>
                <td class="name" title="<?php echo $item['name']?>"><?php echo $item['name']?></td>
                <td class="item_detail" title="<?php echo $item['item_detail']?>"><?php echo $item['item_detail']?></td>
                <td class="place_detail" title="<?php echo $item['place_detail']?>"><?php echo $item['place_detail']?></td>
                <td class="pub_date"><?php echo $item['pub_date']?></td>
                <td class="pic_related admin"><?php if (empty($item['pic_related'])) : ?>
                        无
                    <?php else: ?>
                        <a class="fancybox" href="<? echo base_url() . 'uploads/' . $item['pic_related'] ?>">查看</a>
                    <?php endif;?></td>
                <td class="contact" title="<?php echo $item['contact']?>"><?php echo $item['contact']?></td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
        <?php else: ?>
            <p style="text-align: center">找不到任何条目！</p>
        <?php endif; ?>
    </div>
    <?php echo $pagination ?>
</div>
