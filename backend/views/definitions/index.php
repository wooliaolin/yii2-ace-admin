<?php
// 定义标题和面包屑信息
$this->title = '引用列表';

$url = '@web/public/assets';
$depends = ['depends' => 'backend\assets\AdminAsset'];
$this->registerCssFile($url.'/css/chosen.css', $depends);
$this->registerJsFile($url.'/js/chosen.jquery.min.js', $depends);
?>
<?=\backend\widgets\MeTable::widget()?>
<?php $this->beginBlock('javascript') ?>
<script type="text/javascript">
    var aAdmins = <?=\yii\helpers\Json::encode($this->params['admins'])?>,
        m = meTables({
            title: "引用",
            fileSelector: ["#file"],
            table: {
                "aoColumns":[
                    {
                        "title": "ID",
                        "data": "id",
                        "sName": "id",
                        "edit": {"type": "hidden"},
                        "search": {"type": "text"},
                        "defaultOrder": "desc"
                    },
                    {
                        "title": "引用名称",
                        "data": "name",
                        "sName": "name",
                        "edit": {"type": "text", "required": true, "rangelength": "[2, 255]"},
                        "search": {"type": "text"},
                        "bSortable": false
                    },
                    {
                        "title": "版本",
                        "data": "version",
                        "sName": "version",
                        "edit": {"type": "text", "rangelength": "[2, 20]"},
                        "bSortable": false,
                        "defaultContent": "",
                        "bViews": false
                    },
                    {
                        "title": "字段信息",
                        "data": "properties",
                        "sName": "properties",
                        "edit": {"type": "text", "rangelength": "[2, 20]"},
                        "bSortable": false,
                        "isHide": true,
                    },
                    {
                        "title": "创建时间",
                        "data": "created_at",
                        "sName": "created_at",
                        "createdCell": meTables.dateTimeString
                    },
                    {
                        "title": "创建用户",
                        "data": "created_id",
                        "sName": "created_id",
                        "bSortable": false,
                        "createdCell": mt.adminString
                    },
                    {"title": "修改时间", "data": "updated_at", "sName": "updated_at", "createdCell": mt.dateTimeString},
                    {
                        "title": "修改用户",
                        "data": "updated_id",
                        "sName": "updated_id",
                        "bSortable": false,
                        "createdCell": mt.adminString
                    }
                ]
            }
        });
    var $file = null;
    mt.fn.extend({
        beforeShow: function(data) {
            $file.ace_file_input("reset_input");

            // 修改复值
            if (this.action == "update" && ! empty(data.face)) {
                $file.ace_file_input("show_file_list", [data.face]);
            }

            return true;
        }
    });

    $(function(){
        m.init();
        $file = $("#file");
    });
</script>
<?php $this->endBlock(); ?>
