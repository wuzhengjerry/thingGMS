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
			<?php if(Is_Auth('Admin/Model/index')): ?><li><a href="<?php echo U('Admin/Model/index');?>"><span>列表</span></a></li><?php endif; ?>
			<li><a class="current" href="<?php echo U('Admin/Model/add');?>"><span>新增</span></a></li>
			<?php if(Is_Auth('Admin/Model/generate')): ?><li><a href="<?php echo U('Admin/Model/generate');?>"><span>系统化数据模型</span></a></li><?php endif; ?>
		</ul>
	</div>
</div>
<form id="Model_Form" method="post">
<table class="table tb-type2 nobdb">
	<tbody>
		<tr>
			<td colspan="2" class="required"><label for="for_name">模型标识:</label></td>
		</tr>
		<tr class="noborder">
			<td class="vatop rowform"><input name="name" style="height:30px;" id="for_name" value="" type="text" class="easyui-textbox" data-options="required:false"></td>
			<td class="vatop tips">请输入模型标识</td>
		</tr>
		<tr>
			<td colspan="2" class="required"><label for="for_title">模型名称:</label></td>
		</tr>
		<tr class="noborder">
			<td class="vatop rowform"><input name="title" style="height:30px;" id="for_title" value="" type="text" class="easyui-textbox" data-options="required:false"></td>
			<td class="vatop tips">请输入模型的名称</td>
		</tr>
		<tr>
			<td colspan="2" class="required"><label for="for_table_name">表名:</label></td>
		</tr>
		<tr class="noborder">
			<td class="vatop rowform"><input name="table_name" style="height:30px;" id="for_table_name" value="" type="text" class="easyui-textbox" data-options="required:false"></td>
			<td class="vatop tips">模型的真实表名</td>
		</tr>
		<tr>
			<td colspan="2" class="required"><label for="for_is_extend">允许子模型:</label></td>
		</tr>
		<tr class="noborder">
			<td class="vatop rowform">
            <select style="height:30px;" id="for_is_extend" name="is_extend" class="easyui-combobox" data-options="value:'0',multiple:false,required:false,editable:false">
                <option value="1" >是</option>
                <option value="0" >否</option>
			</select>
            </td>
			<td class="vatop tips"><strong style="color:#F00">如果模型非独立模型，选允许子模型,系统将会出错</strong></td>
		</tr>
		<tr>
			<td colspan="2" class="required"><label for="for_extend">模型类型:</label></td>
		</tr>
		<tr class="noborder">
			<td class="vatop rowform">
            <select style="height:30px;" id="for_extend" name="extend" class="easyui-combobox" data-options="value:'0',multiple:false,required:false,editable:false">
				<option value="0">独立模型</option>
                <?php if(is_array($is_extend_list)): $i = 0; $__LIST__ = $is_extend_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?> [<?php echo ($vo['name']); ?>]</option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
            </td>
			<td class="vatop tips">如果模型非独立模型，选允许子模型,系统将会出错</strong></td>
		</tr>
		<tr>
			<td colspan="2" class="required"><label for="for_list_type">列表类型:</label></td>
		</tr>
		<tr class="noborder">
			<td class="vatop rowform">
            <select style="height:30px;" id="for_list_type" name="list_type" class="easyui-combobox" data-options="value:'0',multiple:false,required:false,editable:false">
                <option value="0" >普通</option>
        		<option value="1" >树形</option>
			</select>
            </td>
			<td class="vatop tips"><strong style="color:#F00">如果模型非独立模型，选允许子模型,系统将会出错</strong></td>
		</tr>
		<tr>
			<td colspan="2" class="required"><label for="for_engine_type">引擎类型:</label></td>
		</tr>
		<tr class="noborder">
			<td class="vatop rowform">
            <select style="height:30px;" id="for_engine_type" name="engine_type" class="easyui-combobox">
				<option value="MyISAM">MyISAM</option>
				<option value="InnoDB">InnoDB</option>
                <option value="MEMORY">MEMORY</option>
                <option value="BLACKHOLE">BLACKHOLE</option>
                <option value="MRG_MYISAM">MRG_MYISAM</option>
                <option value="ARCHIVE">ARCHIVE</option>
			</select>
            </td>
			<td class="vatop tips"></td>
		</tr>
		<tr>
			<td colspan="2" class="required"><label for="for_status">状态:</label></td>
		</tr>
		<tr class="noborder">
			<td class="vatop rowform">
            <select style="height:30px;" id="for_status" name="status" class="easyui-combobox" data-options="value:'1',multiple:false,required:false,editable:false">
                <option value="0" >禁用</option>
                <option value="1" >启用</option>
			</select>
            </td>
			<td class="vatop tips"></td>
		</tr>
	</tbody>
	<tfoot>
		<tr class="tfoot">
			<td colspan="2"><a class="easyui-linkbutton" href="JavaScript:void(0);" onclick="$('#Model_Form').submit();" data-options="iconCls:'iconfont icon-edit'"><span style="font-size: 14px; font-weight: 600;">提交</span></a></td>
		</tr>
	 </tfoot>
</table>
</form>

</body>
</html>