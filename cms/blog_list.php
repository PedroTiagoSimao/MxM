<?php
$qblog = "";
$qblog = mysql_query("SELECT * FROM mxm_articles LEFT JOIN mxm_categories ON mxm_categories.id_cat=mxm_articles.categorie");

if($qblog) {
?>

<form id="form_data" name="form_data" action="" method="post">
	<table class="data" width="100%" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th style="width:10px">
					<input type="checkbox" id="check_all" name="check_all"/>
				</th>
				<th style="width:30%">Titulo</th>
				<th style="width:20%">Utilizador</th>
				<th style="width:20%">Categoria</th>
				<th style="width:10%; text-align:center">Comentarios</th>
				<th style="width:20%; text-align:right">Accao</th>
			</tr>
		</thead>
		<tbody>
		<?php
				while ($blog = mysql_fetch_array($qblog)){
		?>
			<tr>
				<td>
					<input type="checkbox"/>
				</td>
				<td><a href="blog_edit.php?action=edit&id=<?php echo $blog['id'] ?>"><?php echo $blog['title'] ?></a></td>
				<td><?php echo $blog['author'] ?></td>
				<td><?php echo $blog['categorie_name'] ?></td>
				<td style="text-align:center"><a href="comments.php?parent=<?php echo $blog['id'] ?>">
				<?php
					$qComments = mysql_query("SELECT COUNT(*) FROM mxm_articles_comments WHERE parent=".$blog['id']);
					$num_comments = mysql_fetch_array($qComments);
					echo $num_comments[0];
				?></a></td>
				<td style="text-align:right">
					<a href="blog_edit.php?action=edit&id=<?php echo $blog['id'] ?>"><img src="images/icon_edit.png" alt="edit" class="help" title="Editar '<?php echo $blog['title'] ?>'"/></a>
					<a href="blog_action.php?action=delete&id=<?php echo $blog['id'] ?>"><img src="images/icon_delete.png" alt="delete" class="help" title="Eliminar '<?php echo $blog['title'] ?>'"/></a>
				</td>
			</tr>
		<?php	} ?>
		</tbody>
	</table>
	<div id="chart_wrapper" class="chart_wrapper"></div>
</form>
<?php } ?>