
<div id="container" >
	<h1> <?php echo $pageTitle;?> </h1>

	<div id="body">
		<table class="table" id="userList">
			<thead>
				<tr>
					<th>ID</th>
					<th>用户名</th>
					<th>大学</th>
					<th>邮箱</th>
					<th>创建时间</th>
				</tr>
			</thead>
			<tbody>
			<?php if(!empty($userList))foreach ($userList as $user):?>
				<tr>
					<td> <?php echo $user->id;?> </td>
					<td> <?php echo $user->name;?> </td>
					<td> <?php echo $user->university;?> </td>
					<td> <?php echo $user->email;?> </td>
					<td> <?php echo $user->createTime;?> </td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>

</div>

<script type="text/javascript">

	$(document).ready(function() {
 $("#userList").dataTable();
});
</script>