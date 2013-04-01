<div class="container" style="margin-top: 2em;">
    <div class="row-fluid" style="min-height: 400px">
        <?php if (!empty($items)): ?>
        <table class="table  table-striped table-hover" >
            <thead>
            <tr>
                <th style="width: 40px">#</th>
                <th>物品名称</th>
                <th>物品简述</th>
                <th style="width: 40px">校区</th>
                <th>详细地点</th>
                <th style="width: 80px">发布日期</th>
                <th style="width: 40px">图片</th>
                <th>保管地点/联系电话</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($items as $item): ?>
            <tr>
                <td><?php echo $item['id']?></td>
                <td><?php echo $item['name']?></td>
                <td><?php echo $item['item_detail']?></td>
                <td><?php echo $place[$item['place']]?></td>
                <td><?php echo $item['place_detail']?></td>
                <td><?php echo $item['pub_date']?></td>
                <td><?php if (empty($item['pic_related'])) : ?>
                        无
                    <?php else: ?>
                        <a class="fancybox" href="<? echo base_url() . 'uploads/' . $item['pic_related'] ?>">查看</a>
                    <?php endif;?></td>
                <td><?php echo $item['contact']?></td>
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

