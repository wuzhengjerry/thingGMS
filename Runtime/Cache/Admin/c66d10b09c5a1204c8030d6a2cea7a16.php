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

  <div class="fixed-bar" id="Hooks_Bar">
    <div class="item-title">
      <h3>钩子</h3>
      <ul class="tab-base">
        <li><a class="current" href="JavaScript:void(0);" onclick="Data_Reload('Hooks_Data_List');"><span>列表</span></a></li>
        <li><a href="JavaScript:void(0);" onclick="Data_Search('Hooks_Search_From','Hooks_Data_List');"><span>搜索</span></a></li>
        <?php if(Is_Auth('Admin/Hooks/add')): ?><li><a href="<?php echo U('Admin/Hooks/add');?>"><span>新增</span></a></li><?php endif; ?>
      </ul>
    </div>
  </div>
  <div style="display: none">
    <form id="Hooks_Search_From" class="search_from">
      <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
          <th>钩子名称 : </th>
          <td><input name="s_name" type="text" class="easyui-textbox" style="height:30px;"></td>
        </tr>
        <tr>
          <th>描述 : </th>
          <td><input name="s_description" type="text" class="easyui-textbox" style="height:30px;"></td>
        </tr>
        <tr>
          <th>类型 : </th>
          <td><select name="s_type" class="easyui-combobox" style="height:30px;" data-options="value:'',multiple:false,required:false,editable:false">
              <option value="" >请选择一个选项</option>
              <option value="1" >视图</option>
              <option value="2" >控制器</option>
            </select></td>
        </tr>
        <tr>
          <th>更新时间 : </th>
          <td><input name="s_update_time_min" type="text" class="easyui-datetimebox" style="height:30px;">
            -
            <input name="s_update_time_max" type="text" class="easyui-datetimebox" style="height:30px;"></td>
        </tr>
        <tr>
          <th>插件 : </th>
          <td><input name="s_addons" type="text" class="easyui-textbox" style="height:30px;"></td>
        </tr>
        <tr>
          <th>状态 : </th>
          <td><select name="s_status" class="easyui-combobox" style="height:30px;" data-options="value:'',multiple:false,required:false,editable:false">
              <option value="" >请选择一个选项</option>
              <option value="0" >禁用</option>
              <option value="1" >启用</option>
            </select></td>
        </tr>
      </table>
    </form>
  </div>
  <table id="Hooks_Data_List">
  </table>
  <script type="text/javascript">
$(function() {
	$("#Hooks_Data_List").datagrid({
		url : "<?php echo U('Hooks/index');?>",
		fit : true,
		striped : true,
		border : false,
		pagination : true,
		pageSize : 20,
		pageList : [ 10, 20, 50 ],
		pageNumber : 1,
		sortName : 'id',
		sortOrder : 'desc',
		toolbar : '#Hooks_Bar',
		singleSelect : true,
		columns : [[
            {field : 'id',title : 'ID',width : 40,sortable:true},
{field : "name",title : "钩子名称",width :100,sortable:true},{field : "description",title : "描述",width :100,sortable:true},{field : "type",title : "类型",width :100,sortable:true,formatter: function (value, row, index) {
			var op_type=new Array()
			op_type["1"]="视图"
			op_type["2"]="控制器"
			
			return op_type[value];
			}},
			{field : "update_time",title : "更新时间",width :100,sortable:true,formatter: function (value, row, index) {
			return u_to_ymdhis(value)
		}},{field : "addons",title : "插件",width :100,sortable:true},{field : "status",title : "状态",width :50,sortable:true,formatter: function (value, row, index) {
			var op_status=new Array()
			op_status["0"]="禁用"
			op_status["1"]="启用"
			
			return op_status[value];
			}},
						{field : "operate",title : "操作",width : 200,formatter: function (value, row, index) {
				operate_menu='';
				
				<?php if(Is_Auth('Admin/Hooks/edit')): ?>operate_menu = operate_menu+"<a href='<?php echo U('edit'); ?>&id="+row.id+"' >编辑</a>";<?php endif; ?>

				<?php if(Is_Auth('Admin/Hooks/del')): ?>operate_menu = operate_menu+" | <a href='#' onclick=\"Data_Remove('<?php echo U('del'); ?>&id="+row.id+"','Hooks_Data_List');\">删除</a>";<?php endif; ?>

				return operate_menu;
			}}
		]]
	});
})
</script>
</body>
</html>