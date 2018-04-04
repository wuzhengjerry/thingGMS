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
<div class="fixed-bar" id="User_Bar">
	<div class="item-title">
		<h3>用户</h3>
		<ul class="tab-base">
			<li><a class="current" href="JavaScript:void(0);" onclick="Data_Reload('User_Data_List');"><span>列表</span></a></li>
			<li><a href="JavaScript:void(0);" onclick="Data_Search('User_Search_From','User_Data_List');"><span>搜索</span></a></li>
			<?php if(Is_Auth('Admin/User/add')): ?><li><a href="<?php echo U('Admin/User/add');?>"><span>新增</span></a></li><?php endif; ?>
		</ul>
	</div>
</div>
<div style="display: none">
<form id="User_Form" class="update_from"></form>
  <form id="User_Search_From" class="search_from">
	<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
    <tr>
			<th>用户名 : </th>
			<td><input name="s_username" type="text" class="easyui-textbox" style="height:30px;"></td>
		</tr><tr>
			<th>昵称/姓名 : </th>
			<td><input name="s_nickname" type="text" class="easyui-textbox" style="height:30px;"></td>
		</tr><tr>
			<th>邮箱 : </th>
			<td><input name="s_email" type="text" class="easyui-textbox" style="height:30px;"></td>
		</tr><tr>
			<th>余额 : </th>
			<td><input name="s_amount" type="text" class="easyui-numberbox" style="height:30px;" data-options="precision:'2',decimalSeparator:'.',groupSeparator:',',required:false"></td>
		</tr><tr>
			<th>积分 : </th>
			<td><input name="s_point" type="text" class="easyui-numberbox" style="height:30px;" data-options="precision:'0',decimalSeparator:'.',groupSeparator:',',required:false"></td>
		</tr><tr>
			<th>创建时间 : </th>
			<td><input name="s_create_time_min" type="text" class="easyui-datetimebox" style="height:30px;"> - <input name="s_create_time_max" type="text" class="easyui-datetimebox" style="height:30px;"></td>
		</tr><tr>
			<th>更新时间 : </th>
			<td><input name="s_update_time_min" type="text" class="easyui-datetimebox" style="height:30px;"> - <input name="s_update_time_max" type="text" class="easyui-datetimebox" style="height:30px;"></td>
		</tr><tr>
			<th>状态 : </th>
			<td><select name="s_status" class="easyui-combobox" style="height:30px;" data-options="value:'',url:'<?php echo U("Admin/Function/get_field_option");?>&f_id=83&r_type=json',valueField:'key',textField:'val',multiple:false,required:false,editable:false"></select></td>
		</tr>    </table>
  </form>
</div>

<table id="User_Data_List"></table>

<script type="text/javascript">
$(function() {
    $("#User_Data_List").datagrid({
        url: "<?php echo U('User/index');?>",
        fit: true,
        striped: true,
        border: false,
        pagination: true,
        pageSize: 20,
        pageList: [10, 20, 50],
        pageNumber: 1,
        sortName: 'id',
        sortOrder: 'desc',
        toolbar: '#User_Bar',
        singleSelect: true,
        columns: [[{
            field: 'id',
            title: 'ID',
            width: 40,
            sortable: true
        },
        {
            field: "username",
            title: "用户名",
            width: 100,
            sortable: true
        },
        {
            field: "nickname",
            title: "昵称/姓名",
            width: 100,
            sortable: true
        },
        {
            field: "email",
            title: "邮箱",
            width: 100,
            sortable: true
        },
        {
            field: "amount",
            title: "余额",
            width: 100,
            sortable: true
        },
        {
            field: "point",
            title: "积分",
            width: 100,
            sortable: true
        },
        {
            field: "create_time",
            title: "创建时间",
            width: 150,
            sortable: true,
            formatter: function(value, row, index) {
                return u_to_ymdhis(value)
            }
        },
        {
            field: "update_time",
            title: "更新时间",
            width: 150,
            sortable: true,
            formatter: function(value, row, index) {
                return u_to_ymdhis(value)
            }
        },
        {
            field: "status",
            title: "状态",
            width: 50,
            sortable: true,
            formatter: function(value, row, index) {
                var op_status = new Array()
				op_status["0"] = "禁用"
				op_status["1"] = "启用"
				op_status["2"] = "审核中"

                return op_status[value];
            }
        },
        {
            field: "operate",
            title: "操作",
            width: 200,
            formatter: function(value, row, index) {
                operate_menu = '';
                <?php if(Is_Auth('Admin/User/edit')): ?>operate_menu = operate_menu + "<a href='<?php echo U('edit'); ?>&id=" + row.id + "' >编辑</a>";<?php endif; ?>
				
                <?php if(Is_Auth('Admin/User/group')): ?>operate_menu = operate_menu + " | <a href='#' onclick=From_Data_Updata('User_Form','<?php echo U('group'); ?>&id=" + row.id + "','用户组修改','User_Data_List') >用户组修改</a>";<?php endif; ?>

				<?php if(Is_Auth('Admin/User/del')): ?>operate_menu = operate_menu+" | <a href='#' onclick=Data_Remove('<?php echo U('del'); ?>&id=" + row.id + "','User_Data_List') >删除</a>";<?php endif; ?>

				return operate_menu;
			}}
		]]
	});
})
</script>

</body>
</html>