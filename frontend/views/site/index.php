<?php

/* @var $this yii\web\View */

$this->title = '首页';
?>
<h4>Web端调用 《v1/good》Api实例演示！</h4>
<h5>http://api.yiiadmin.lin/v1/good</h5>
<h5>token=hXmwkVyM3Ig5LtE7foBL8Xif5ThgFvjt_1517543036</h5>

<hr>
<?php var_dump($msg);?>
<hr>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php if(count($data)):?>
        <?php foreach ($data as $key => $value):?>
            <tr>
                <td><?=$value['id']?></td>
                <td><?=$value['name']?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>