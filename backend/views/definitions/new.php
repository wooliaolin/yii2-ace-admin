<?php

// 注入需要的JS
$this->registerJsFile('@web/public/assets/js/jquery.validate.min.js');
$this->registerJsFile('@web/public/assets/js/validate.message.js');
$this->registerJsFile('@web/assets/api_definitions.js');

?>
    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" id="api-form" role="form" method="post" action="/definitions/create">
                <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                <input type="hidden" name="type" value="object">
                <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right"><h4>基本信息</h4></label>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1-1">引用名称</label>

                    <div class="col-sm-10">
                        <input type="text" required="true" name="name" placeholder="引用名称" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1-1">接口版本</label>

                    <div class="col-sm-10">
                        <select class="form-control" name="version" required="true">
                            <option>请选择版本</option>
                            <?php foreach ($versions as $value): ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right"><h4>添加参数</h4></label>
                </div>
                <div>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <table class="table">
                                <thead>
                                <th>操作</th>
                                <th>字段</th>
                                <th>类型</th>
                                <th>格式</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="properties" id="properties_json">
                <div id="properties_data">
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right"></label>
                        <div class="col-sm-1">
                            <i style="border: none;margin-left: -22px;"
                               class="ace-icon fa fa-trash-o bigger-130 trash_request form-control"></i>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control name"/>
                        </div>

                        <div class="col-sm-3">
                            <select class="form-control type-mi">
                                <option value="string">string</option>
                                <option value="integer">integer</option>
                                <option value="boolean">boolean</option>
                                <option value="array">array</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control format-mi">
                                <option></option>
                                <option value="string">string</option>
                                <option value="int64">int64</option>
                                <option value="int32">int32</option>
                                <option value="date-time">date-time</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="form-group parameters">
                    <label class="col-sm-1 control-label no-padding-right"></label>
                    <div class="col-sm-10">
                        <button style="border: none;margin-left: 0px;" type="button" class="btn btn-success">
                            <i class="fa fa-plus"></i> 新增
                        </button>

                        <button style="border: none;" type="button" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i> 清空
                        </button>
                    </div>
                </div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="button">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            提交
                        </button>
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            重置
                        </button>
                    </div>
                </div>
                <div class="hr hr-24"></div>
            </form>
        </div>
    </div>
<?php $this->beginBlock('javascript') ?>
    <script type="text/template" id="html_template">
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right"></label>
            <div class="col-sm-1">
                <i style="border: none;margin-left: -22px;"
                   class="ace-icon fa fa-trash-o bigger-130 trash_request form-control"></i>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control name"/>
            </div>

            <div class="col-sm-3">
                <select class="form-control type-mi">
                    <option value="string">string</option>
                    <option value="integer">integer</option>
                    <option value="boolean">boolean</option>
                    <option value="array">array</option>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="form-control format-mi">
                    <option></option>
                    <option value="string">string</option>
                    <option value="int64">int64</option>
                    <option value="int32">int32</option>
                    <option value="date-time">date-time</option>
                </select>
            </div>

        </div>
    </script>
<?php $this->endBlock(); ?>