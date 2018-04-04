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

  <div class="fixed-bar" id="Config_Bar">
    <div class="item-title">
      <h3>配置模型</h3>
      <ul class="tab-base">
        <li><a class="current" href="JavaScript:void(0);" onclick="Data_Reload('Config_Data_List');"><span>列表</span></a></li>
        <li><a href="JavaScript:void(0);" onclick="Data_Search('Config_Search_From','Config_Data_List');"><span>搜索</span></a></li>
        <?php if(Is_Auth('Admin/Config/add')): ?><li><a href="<?php echo U('Admin/Config/add');?>"><span>新增</span></a></li><?php endif; ?>
      </ul>
    </div>
  </div>
  <div style="display: none">
    <form id="Config_Search_From" class="search_from">
      <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
          <th>配置名称 : </th>
          <td><input name="s_name" type="text" class="easyui-textbox" style="height:30px;"></td>
        </tr>
        <tr>
          <th>配置类型 : </th>
          <td><select name="s_type" class="easyui-combobox" style="height:30px;" data-options="value:'',url:'<?php echo U("Admin/Function/get_config");?>&cname=CONFIG_TYPE_LIST|type|title&r_type=json',valueField:'type',textField:'title',multiple:false,required:false,editable:false">
            </select></td>
        </tr>
        <tr>
          <th>配置说明 : </th>
          <td><input name="s_title" type="text" class="easyui-textbox" style="height:30px;"></td>
        </tr>
        <tr>
          <th>配置分组 : </th>
          <td><select name="s_group" class="easyui-combobox" style="height:30px;" data-options="value:'',url:'<?php echo U("Admin/Function/get_config");?>&cname=CONFIG_GROUP_LIST|group|title&r_type=json',valueField:'group',textField:'title',multiple:false,required:false,editable:false">
            </select></td>
        </tr>
        <tr>
          <th>状态 : </th>
          <td><select name="s_status" class="easyui-combobox" style="height:30px;" data-options="value:'',multiple:false,required:false,editable:false">
              <option value="" >请选择一个选项</option>
              <option value="1" >启用</option>
              <option value="0" >禁用</option>
            </select></td>
        </tr>
        <tr>
          <th>排序 : </th>
          <td><input name="s_sort" type="text" class="easyui-numberbox" style="height:30px;" data-options="precision:'0',decimalSeparator:'.',groupSeparator:',',required:false"></td>
        </tr>
      </table>
    </form>
  </div>
  <table id="Config_Data_List">
  </table>
  <script type="text/javascript">
$(function() {
	$("#Config_Data_List").datagrid({
		url : "<?php echo U('Config/index');?>",
		fit : true,
		striped : true,
		border : false,
		pagination : true,
		pageSize : 20,
		pageList : [ 10, 20, 50 ],
		pageNumber : 1,
		sortName : 'id',
		sortOrder : 'desc',
		toolbar : '#Config_Bar',
		singleSelect : true,
		columns : [[
            {field : 'id',title : 'ID',width : 40,sortable:true},
{field : "name",title : "配置名称",width :100,sortable:true},{field : "title",title : "配置说明",width :100,sortable:true},{field : "remark",title : "配置说明",width :100,sortable:true},{field : "create_time",title : "创建时间",width :100,sortable:true,formatter: function (value, row, index) {
			return u_to_ymdhis(value)
		}},{field : "status",title : "状态",width :100,sortable:true,formatter: function (value, row, index) {
			var op_status=new Array()
			op_status["1"]="启用"
			op_status["0"]="禁用"
			
			return op_status[value];
			}},
			{field : "sort",title : "排序",width :100,sortable:true},
			{field : "operate",title : "操作",width : 200,formatter: function (value, row, index) {
				operate_menu='';
				
				<?php if(Is_Auth('Admin/Config/edit')): ?>operate_menu = operate_menu+"<a href='<?php echo U('edit'); ?>&id="+row.id+"' >编辑</a>";<?php endif; ?>

				<?php if(Is_Auth('Admin/Config/del')): ?>operate_menu = operate_menu+" | <a href='#' onclick=Data_Remove('<?php echo U('del'); ?>&id="+row.id+"','Config_Data_List')>删除</a>";<?php endif; ?>

				return operate_menu;
			}}
		]]
	});
})
</script>
</body>
</html>