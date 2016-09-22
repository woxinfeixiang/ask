<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/public.css" />
	<style>
		.open {
			display: block;
			width: 16px;
			height: 16px;
			line-height: 16px;
			text-align: center;
			border: 1px solid #670768;
			font-weight: bold;
			cursor: pointer;
		}
	</style>
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js">
	</script>
	<script type="text/javascript">
		$(function () {
			$('tr[pid != 0]').hide();	

			$('.open').toggle( function () {
				var index = $( this ).parents('tr').attr('id');
				$( this ).html( '-' );
				$ ( 'tr[pid='+ index +']').show(); 
			}, function () {
				var index = $( this ).parents('tr').attr('id');
				$( this ).html( '+' );
				$ ( 'tr[pid='+ index +']').hide();	
			});

			$( '.del' ).click( function () { 
				return confirm('确认要删除吗?');
			});
		});
	</script>
</head>
<body>
	<table class='table'>
		<tr pid="0">
			<th>展开</th>
			<th >ID</th>
			<th>分类名称:</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr id='<?php echo ($v["id"]); ?>' pid='<?php echo ($v["pid"]); ?>'>
				<td width="5%" align="center"><span class="open">+</span></td>
				<td width="8%" align="center"><?php echo ($v["id"]); ?></td>
				<td><?php echo str_repeat('&nbsp;&nbsp;', $v['level']);?>
				<?php if($v["level"] > 0): ?>|<?php endif; echo ($v["html"]); echo ($v["name"]); ?></td>
				<td>
					<a href="<?php echo U('addChild', array('pid' => $v['id']));?>" class="bt2">添加子分类</a>
					<a href="<?php echo U('edit', array('id' => $v['id']));?>" class="bt2">修改</a>
					<a href="<?php echo U('del', array('id' => $v['id']));?>" class="bt1 del">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
	
</body>
</html>