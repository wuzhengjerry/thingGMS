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
		<h3>网站设置</h3>
		<ul class="tab-base">
        <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('?id='.$key);?>" <?php if($key == $id): ?>class="current"<?php endif; ?>><span><?php echo ($group); ?>配置</span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
<form id="Config_Form" method="post" action="<?php echo U('group');?>&id=<?php echo ($id); ?>">
<table class="table tb-type2 nobdb">
	<tbody>
    	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$config): $mod = ($i % 2 );++$i;?><tr>
			<td colspan="2" class="required"><label for="for_<?php echo ($config["name"]); ?>"><?php echo ($config["title"]); ?>:</label></td>
		</tr>
		<tr class="noborder">
			<td class="vatop rowform">
            <?php switch($config["type"]): case "0": ?><input type="text" name="config[<?php echo ($config["name"]); ?>]" id="for_<?php echo ($config["name"]); ?>" value="<?php echo ($config["value"]); ?>" class="easyui-numberbox" style="height: 30px;"/><?php break;?>
            <?php case "1": ?><input type="text" name="config[<?php echo ($config["name"]); ?>]" id="for_<?php echo ($config["name"]); ?>" value="<?php echo ($config["value"]); ?>" class="easyui-textbox" style="height: 30px;"/><?php break;?>
            <?php case "2": ?><textarea name="config[<?php echo ($config["name"]); ?>]" id="for_<?php echo ($config["name"]); ?>" type="text" class="easyui-textbox" style="width: 300px; height: 60px;" data-options="required:false,multiline:true"><?php echo ($config["value"]); ?></textarea><?php break;?>
            <?php case "3": ?><textarea name="config[<?php echo ($config["name"]); ?>]" id="for_<?php echo ($config["name"]); ?>" type="text" class="easyui-textbox" style="width: 300px; height: 60px;" data-options="required:false,multiline:true"><?php echo ($config["value"]); ?></textarea><?php break;?>
            <?php case "4": ?><select name="config[<?php echo ($config["name"]); ?>]" id="for_<?php echo ($config["name"]); ?>" class="easyui-combobox" data-options="value:'<?php echo ($config["value"]); ?>',multiple:false,required:false,editable:false" style="height: 30px;">
                <?php $_result=model_field_attr($config['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select><?php break;?>
            <?php case "5": ?><input type="text" name="config[<?php echo ($config["name"]); ?>]" id="for_<?php echo ($config["name"]); ?>" value="<?php echo ($config["value"]); ?>" class="easyui-kindeditor" config_date="1" style="width: 600px; height: 300px;"><?php break; endswitch;?>
            </td>
			<td class="vatop tips"><?php echo ($config["remark"]); ?></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
	<tfoot>
		<tr class="tfoot">
			<td colspan="2"><a class="easyui-linkbutton" href="JavaScript:void(0);" onclick="$('#Config_Form').submit();" data-options="iconCls:'iconfont icon-edit'"><span style="font-size: 14px; font-weight: 600;">提交</span></a></td>
		</tr>
	</tfoot>
</table>
</form>

</body>
</html>