<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" >
<?php
include("cnn.php");
$lang = $_POST["lang"];
if(isset($lang)){
	$qpage = mysql_query("SELECT mxm_works.*,mxm_menus.menuname  FROM mxm_works LEFT JOIN mxm_menus on mxm_menus.id=mxm_works.menu WHERE wlang='".$lang."' ORDER BY mxm_works.wlang, mxm_works.title");
}
else
{
	$qpage = mysql_query("SELECT mxm_works.*,mxm_menus.menuname  FROM mxm_works LEFT JOIN mxm_menus on mxm_menus.id=mxm_works.menu ORDER BY mxm_works.wlang, mxm_works.title");
}
if($qpage) {
?>
<form id="form_data" name="form_data" action="" method="post">
	<table class="data" width="100%" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th style="width:10px">
					
				</th>
				<th style="width:30%">Titulo</th>
				<th style="width:20%">Link</th>
				<th style="width:10%">Lingua</th>
				<th style="width:10%">Menu</th>
				<th style="width:10%">Ordem</th>
				<th style="width:10%">Destaque</th>
				<th style="width:10%">Activo</th>
				<th style="width:20%; text-align:right">Accao</th>
			</tr>
		</thead>
		<tbody>
		<?php
				while ($page = mysql_fetch_array($qpage)){
		?>
			<tr>
				<td>
					
				</td>
				<td><a href="page_edit.php?action=edit&id=<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></td>
				<td><?php echo $page['linktitle']; ?>.html</td>
				<td><?php echo $page['wlang']; ?></td>
				<td><?php echo $page['menuname']; ?></td>
				<td><?php echo $page['ordem']; ?></td>
				<td><?php if($page['high'] == 'on') echo "<img src='images/icon_accept.png' />"; ?></td>
				<td><?php if($page['active'] == 'on') echo "<img src='images/icon_accept.png' />"; ?></td>
				<td style="text-align:right">
					<a href="page_edit.php?action=edit&id=<?php echo $page['id']; ?>"><img src="images/icon_edit.png" alt="edit" class="help" title="Edit"/></a>
					<a href="page_action.php?action=delete&pageid=<?php echo $page['id']; ?>"><img src="images/icon_delete.png" alt="delete" class="help" title="Delete" id="deleteTour" /></a>
				</td>
			</tr>
		<?php	} ?>
		</tbody>
	</table>
	<div id="chart_wrapper" class="chart_wrapper"></div>
</form>
<?php } ?>