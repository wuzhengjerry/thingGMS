<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo C('SOFT_NAME');?>|Gms管理系统</title>
    <link href="/Public/Admin/images/favicon.ico" mce_href="/Public/Admin/images/favicon.ico" rel="bookmark" type="image/x-icon" /> 
    <link href="/Public/Admin/images/favicon.ico" mce_href="/Public/Admin/images/favicon.ico" rel="icon" type="image/x-icon" /> 
    <link href="/Public/Admin/images/favicon.ico" mce_href="/Public/Admin/images/favicon.ico" rel="shortcut icon" type="image/x-icon" /> 
    <link rel="stylesheet" type="text/css" href="/Public/Static/Easyui/themes/metro-gms/easyui.css">
    <link rel="stylesheet" type="text/css" href="/Public/Static/Font/iconfont.css">
    <link rel="stylesheet" type="text/css" href="/Public/Static/kindeditor/themes/default/default.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Static/Easyui/themes/color.css">
    <link rel="stylesheet" href="/Public/Admin/css/skin.css" />
    <script type="text/javascript" src="/Public/Static/Jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Static/Easyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="/Public/Static/Easyui/locale/easyui-lang-zh_CN.js"></script>
    <script charset="utf-8" src="/Public/Static/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="/Public/Static/kindeditor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="/Public/Static/Echarts/echarts.js"></script>
    <script charset="utf-8" src="/Public/Admin/js/base.js" /></script><script>
	var ke_pasteType=2;
	var ke_fileManagerJson="<?php echo U('Admin/FilesUpdata/filemanager');?>";
	var ke_uploadJson="<?php echo U('Admin/FilesUpdata/upload');?>";
	var ke_Uid='<?php echo session(C("AUTH_KEY"));;?>';
	var Root='';
	</script>
</head>
<body>

<div class="fixed-bar" id="Model_Bar">
	<div class="item-title">
		<h3>模型管理</h3>
		<ul class="tab-base">
			<li><a class="current" href="JavaScript:void(0);" onclick="Data_Reload('Model_Data_List');"><span>列表</span></a></li>
			<?php if(Is_Auth('Admin/Model/add')): ?><li><a href="<?php echo U('Admin/Model/add');?>"><span>新增</span></a></li><?php endif; ?>
			<?php if(Is_Auth('Admin/Model/generate')): ?><li><a href="<?php echo U('Admin/Model/generate');?>"><span>系统化数据模型</span></a></li><?php endif; ?>
		</ul>
	</div>
</div>
<table id="Model_Data_List">
</table>
<script type="text/javascript">
$(function() {
	$("#Model_Data_List").datagrid({
		url : "<?php echo U('Model/index');?>",
		fit : true,
		striped : true,
		border : false,
		pagination : true,
		pageSize : 20,
		pageList : [ 10, 20, 50 ],
		pageNumber : 1,
		sortName : 'id',
		sortOrder : 'desc',
		toolbar : '#Model_Bar',
		singleSelect : true,
		columns : [[
            {field : 'name',title : '标识',width : 100,sortable:true},
            {field : 'title',title : '名称',width : 100,sortable:true},
            {field : 'is_extend',title : '允许子模型',width : 80,sortable:true,formatter: function (value, row, index) {
				var op_is_extend=new Array()
				op_is_extend[0]="否"
				op_is_extend[1]="是"
				return op_is_extend[value];
			}},
            {field : 'extend',title : '继承的模型',width : 100,sortable:true},
            {field : 'list_type',title : '列表类型',width : 60,sortable:true,formatter: function (value, row, index) {
				var op_list_type=new Array()
				op_list_type[0]="普通"
				op_list_type[1]="树形"
				return op_list_type[value];
			}},
            {field : 'status',title : '状态',width : 40,sortable:true,formatter: function (value, row, index) {
				var op_status=new Array()
				op_status[0]="禁用"
				op_status[1]="启用"
				return op_status[value];
			}},
            {field : 'engine_type',title : '数据库引擎',width : 70,sortable:true,formatter: function (value, row, index) {
				var op_engine_type=new Array()
				op_engine_type['MyISAM'] = 'MyISAM'
				op_engine_type['InnoDB'] = 'InnoDB'
				op_engine_type['MEMORY'] = 'MEMORY'
				op_engine_type['BLACKHOLE'] = 'BLACKHOLE'
				op_engine_type['MRG_MYISAM'] = 'MRG_MYISAM'
				op_engine_type['ARCHIVE'] = 'ARCHIVE'
				return op_engine_type[value];
			}},
			{field : 'operate',title : '操作',width : 200,formatter: function (value, row, index) {
				operate_menu='';
				<?php if(Is_Auth('Admin/Model/build')): ?>operate_menu = operate_menu+"<a href='<?php echo U('Admin/Model/build'); ?>&model_id="+row.id+"' >生成文件</a>";<?php endif; ?>

				<?php if(Is_Auth('Admin/ModelField/index')): ?>operate_menu = operate_menu+" | <a href='<?php echo U('Admin/ModelField/index'); ?>&model_id="+row.id+"' >字段管理</a>";<?php endif; ?>

				<?php if(Is_Auth('Admin/Model/edit')): ?>operate_menu = operate_menu+" | <a href='<?php echo U('Admin/Model/edit'); ?>&id="+row.id+"' >编辑</a>";<?php endif; ?>

				<?php if(Is_Auth('Admin/Model/del')): ?>operate_menu = operate_menu+" | <a href='#' onclick=Data_Remove('<?php echo U('Admin/Model/del'); ?>&id="+row.id+"','Model_Data_List')>删除</a>";<?php endif; ?>

				return operate_menu;
			}}
		]]
	});
})
</script>

</body>
</html>