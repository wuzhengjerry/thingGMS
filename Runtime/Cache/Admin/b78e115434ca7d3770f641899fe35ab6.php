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

  <div class="fixed-bar" id="Module_Bar">
    <div class="item-title">
      <h3>模块</h3>
      <ul class="tab-base">
        <li><a class="current" href="JavaScript:void(0);" onclick="Data_Reload('Module_Data_List');"><span>列表</span></a></li>
      </ul>
    </div>
  </div>
  <table id="Module_Data_List">
  </table>
<script type="text/javascript">
$(function() {
    $("#Module_Data_List").datagrid({
        url: "<?php echo U('Module/index');?>",
        fit: true,
        striped: true,
        border: false,
        pagination: false,
        toolbar: '#Module_Bar',
        singleSelect: true,
		nowrap:false,
        columns: [[
        {
            field: "name",
            title: "模块名称[模块][版本]",
            width: 200,
            formatter: function(value, row, index) {
                return row.title + ' [' +row.name+ ']' + ' [' +row.version+ ']'
            }
        },
        {
            field: "description",
            title: "描述",
            width: 300
        },
        {
            field: "author",
            title: "作者[邮箱]",
            width: 200,
            formatter: function(value, row, index) {
                return '<a href="'+row.author_site+'" target="_blank">'+row.author + ' [' +row.author_email+ ']</a>'
            }
        },
        {
            field: "create_time",
            title: "安装时间",
            width: 140,
            formatter: function(value, row, index) {
				if(value>1){
                	return u_to_ymdhis(value)
				}else{
                	return '未安装'
				}
            }
        },
        {
            field: "update_time",
            title: "更新时间",
            width: 140,
            formatter: function(value, row, index) {
				if(value>1){
                	return u_to_ymdhis(value)
				}else{
                	return '未安装'
				}
            }
        },
        {
            field: "operate",
            title: "操作",
            width: 120,
            formatter: function(value, row, index) {
                operate_menu = '';
				if(row.status==1){
				<?php if(Is_Auth('Admin/Module/disabled')): ?>if(row.disabled == 1){
					operate_menu = operate_menu+"<a href='#' onclick=\"Data_Ajax('<?php echo U('disabled'); ?>&modulename="+row.name+"&d=0','Module_Data_List','');\">禁用</a>";
				}else{
					operate_menu = operate_menu+"<a href='#' onclick=\"Data_Ajax('<?php echo U('disabled'); ?>&modulename="+row.name+"&d=1','Module_Data_List','');\">启用</a>";
				}
				if(row.isconfig == 1){
					operate_menu = operate_menu+" | <a href='<?php echo U('config'); ?>&modulename="+row.name+"'>配置</a>";
				}<?php endif; ?>
				<?php if(Is_Auth('Admin/Module/uninstall')): ?>operate_menu = operate_menu+" | <a href='#' onclick=\"Data_Ajax('<?php echo U('uninstall'); ?>&modulename="+row.name+"','Module_Data_List','确认卸载模块 "+row.title + ' [' +row.name+ ']' + ' [' +row.version+ ']'+" 吗？');\">卸载</a>";<?php endif; ?>
				}
				<?php if(Is_Auth('Admin/Module/install')): ?>if(row.status==0){
				operate_menu = operate_menu+"<a href='<?php echo U('install'); ?>&modulename="+row.name+"' >安装</a>";
				}<?php endif; ?>
				return operate_menu;
			}}
		]]
	});
})
</script>

</body>
</html>