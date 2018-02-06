<?php
// 定义标题和面包屑信息
$this->title = 'testmoudle';
?>
<?=\backend\widgets\MeTable::widget()?>
<?php $this->beginBlock('javascript') ?>
<script type="text/javascript">
    var m = meTables({
        title: "testmoudle",
        table: {
            "aoColumns": [
                			{"title": "ID", "data": "id", "sName": "id", "bSortable": false}, 
			{"title": "姓名001", "data": "name", "sName": "name", "edit": {"type": "text", "required": true,"rangelength": "[2, 100]"}, "bSortable": false}, 

            ]       
        }
    });
    
    /**
    meTables.fn.extend({
        // 显示的前置和后置操作
        beforeShow: function(data, child) {
            return true;
        },
        afterShow: function(data, child) {
            return true;
        },
        
        // 编辑的前置和后置操作
        beforeSave: function(data, child) {
            return true;
        },
        afterSave: function(data, child) {
            return true;
        }
    });
    */

     $(function(){
         m.init();
     });
</script>
<?php $this->endBlock(); ?>