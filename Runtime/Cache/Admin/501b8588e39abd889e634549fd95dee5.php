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
        <li><a href="<?php echo U('Admin/Module/index');?>"><span>列表</span></a></li>
        <li><a class="current" href="#"><span>安装</span></a></li>
      </ul>
    </div>
  </div>
<form id="Module_Form" method="post">
    <table class="table tb-type2 nobdb">
      <tbody>
      <tr>
        <td width="100">模块名称：</td>
        <td><strong><?php echo ($info['title']); ?></strong> [<?php echo ($info['name']); ?>] [<?php echo ($info['version']); ?>]</td>
      </tr>
      <tr>
        <td>模块简介：</td>
        <td><?php echo ($info['description']); ?></td>
      </tr>
      <tr>
        <td>作者：</td>
        <td><?php echo ($info['author']); ?></td>
      </tr>
      <tr>
        <td>E-mail：</td>
        <td><?php echo ($info['author_email']); ?></td>
      </tr>
      <tr>
        <td>作者主页：</td>
        <td><a href="<?php echo ($info['author_site']); ?>" target="_blank"><?php echo ($info['author_site']); ?></a></td>
      </tr>
      <tr>
        <td>依赖模块：</td>
        <td><?php if(is_array($info["rely_module"])): $i = 0; $__LIST__ = $info["rely_module"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $v_m=validate_module($vo['name'],$vo['version']); ?>
        <?php switch($v_m): case "1": ?><a href="<?php echo ($vo["site"]); ?>" target="_blank" class="easyui-linkbutton bon2"><?php echo ($vo["title"]); ?>[<?php echo ($vo["name"]); ?> <?php echo ($vo["version"]); ?>] 模块不存在</a><?php break;?>
        <?php case "2": ?><a href="<?php echo ($vo["site"]); ?>" target="_blank" class="easyui-linkbutton bon2"><?php echo ($vo["title"]); ?>[<?php echo ($vo["name"]); ?> <?php echo ($vo["version"]); ?>] 版本过低</a><?php break;?>
        <?php case "3": ?><a href="#" class="easyui-linkbutton bon2"><?php echo ($vo["title"]); ?>[<?php echo ($vo["name"]); ?> <?php echo ($vo["version"]); ?>] 模块未启用</a><?php break;?>
        <?php case "9": ?><a href="#" class="easyui-linkbutton bon1"><?php echo ($vo["title"]); ?>[<?php echo ($vo["name"]); ?> <?php echo ($vo["version"]); ?>]</a><?php break;?>
        <?php default: ?>未知错误<?php endswitch; endforeach; endif; else: echo "" ;endif; ?></td>
      </tr>
      <tr>
        <td>依赖插件：</td>
        <td><?php if(is_array($info["rely_addons"])): $i = 0; $__LIST__ = $info["rely_addons"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["name"]); echo ($vo["title"]); echo ($vo["version"]); echo ($vo["site"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?></td>
      </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2"><a class="easyui-linkbutton" href="JavaScript:void(0);" onclick="$('#Module_Form').submit();" data-options="iconCls:'iconfont icon-edit'"><span style="font-size: 14px; font-weight: 600;">确定安装</span></a></td>
        </tr>
      </tfoot>
    </table>
	<input type="hidden" name="modulename" value="<?php echo ($name); ?>">
</form>

</body>
</html>