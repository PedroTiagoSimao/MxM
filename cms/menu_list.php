<?php
include("header.php");
include("menu.php");

$qmenu = mysql_query("SELECT * FROM mxm_menus ORDER BY mlang, ordem");

?>
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<?php include_once("title.php"); ?>
			
			<?php //include_once("shortcuts.php"); ?>
			
			<div class="onecolumn">
				<div class="header">
					<span>Menus</span>
				</div>
				<br class="clear"/>
				<div class="content">
					<form id="form_data" name="form_data" action="" method="post">
						<table class="data" width="100%" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th style="width:10px">
										<input type="checkbox" id="check_all" name="check_all"/>
									</th>
									<th style="width:85%">Titulo</th>
									<th style="width:5%">Lingua</th>
									<th style="width:5%">Ordem</th>
									<th style="width:5%; text-align:right">Accao</th>
								</tr>
							</thead>
							<tbody>
							<?php
									while ($menu = mysql_fetch_array($qmenu)){
							?>
								<tr>
									<td>
										<input type="checkbox"/>
									</td>
									<td><a href="menu_edit.php?action=edit&menuid=<?php echo $menu['id'] ?>"><?php echo $menu['menuname'] ?></a></td>
									<td><?php echo $menu["mlang"]; ?></td>
									<td><?php echo $menu["ordem"]; ?></td>
									<td style="text-align:right">
										<a href="menu_edit.php?action=edit&menuid=<?php echo $menu['id'] ?>"><img src="images/icon_edit.png" alt="edit" class="help" title="Editar '<?php echo $menu['menuname'] ?>'"/></a>
										<a href="menu_action.php?action=delete&menuid=<?php echo $menu['id'] ?>"><img src="images/icon_delete.png" alt="delete" class="help" title="Eliminar '<?php echo $menu['menuname'] ?>'"/></a>
									</td>
								</tr>
							<?php	} ?>
							</tbody>
						</table>
						<div id="chart_wrapper" class="chart_wrapper"></div>
					</form>
				</div>
			</div>
			
			<br class="clear"/>

		</div>
		
		<br class="clear"/><br class="clear"/>

<?php include_once("footer.php");
