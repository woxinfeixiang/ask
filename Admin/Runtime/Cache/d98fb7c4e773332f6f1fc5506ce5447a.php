<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	
</head>
<body>
	<form action="<?php echo U('addCate');?>" method="post">
		<table class="table">
			<tr>
				<th>添加顶级分类</th>
			</tr>
			<tr colspan="2" align="center">
				<td>分类名称: </td>
				<td>
					<input type="text" name='name' />
				</td>
			</tr>
			<tr colspan="2" align="center">
				<td>
					<input type="hidden" name="pid" value="0" />
					<input type="submit" value="保存添加" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>