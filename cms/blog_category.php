<?php
include("header.php");
include("menu.php");

$qCategory = mysql_query("SELECT * FROM mxm_categories");
if($qCategory){
?>
	
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<?php include_once("title.php"); ?>
			
			<?php //include_once("shortcuts.php"); ?>
			
			<div class="onecolumn">
				<div class="header">
					<span>Categorias</span>
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
								<th style="width:20%">Categoria</th>
								<th style="width:100%; text-align:right">Accao</th>
							</tr>
						</thead>
						<tbody>
						<?php
								while ($cat = mysql_fetch_array($qCategory)){
						?>
							<tr>
								<td>
									<input type="checkbox"/>
								</td>
								<td><?php echo $cat['categorie_name']; ?></td>
								<td style="text-align:right">
									<a href="blog_categoryedit.php?action=edit&id=<?php echo $cat['id_cat']; ?>"><img src="images/icon_edit.png" alt="edit" class="help" title="Editar '<?php echo $cat['categorie_name']; ?>'"/></a>
									<a href="blog_categoryaction.php?action=delete&id=<?php echo $cat['id_cat']; ?>"><img src="images/icon_delete.png" alt="delete" class="help" title="Eliminar '<?php echo $cat['categorie_name']; ?>'"/></a>
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

<?php 
}
include_once("footer.php"); ?>
