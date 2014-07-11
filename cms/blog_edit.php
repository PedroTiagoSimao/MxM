<?php
include("header.php");
include("menu.php");

$action = $_REQUEST["action"];
$id = "";
if(isset($_REQUEST["id"])) $id = $_REQUEST["id"];
$text = "Adicionar";
$blogtitle = "";
$blogdescription = "";
$blogcat = "";
$blogcatid = "";
$blogauthor = "";

if($action == "edit")
{
	$text = "Editar";
	$qblog = mysql_query("SELECT * FROM mxm_articles WHERE id=" . $id);
	
	while($blog = mysql_fetch_array($qblog)){
		$blogtitle = $blog["title"];
		$blogdescription = $blog["text"];
		$blogcatid = $blog["categorie"];
		$blogauthor = $blog["author"];
	}
}
include_once("tiny_mce.php");
?>
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<?php include_once("title.php"); ?>
			
			<?php //include_once("shortcuts.php"); ?>
			
			<div class="onecolumn">
				<div class="header">
					<span><?php echo $text ?> pagina</span>
				</div>
				<br class="clear"/>
				<div class="content">
					<form id="form_data" name="form_data" action="blog_action.php" method="post">
					<input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />
					<input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
						<p>
							<label>Titulo:</label><br/>
							<input type="text" id="blogtitle" name="blogtitle" style="width:300px" value="<?php echo $blogtitle; ?>"/>
						</p>
						<br>
						<p>
							<label>Autor:</label><br/>
							<input type="text" id="blogauthor" name="blogauthor" style="width:300px" value="<?php echo $blogauthor; ?>"/>
						</p>
						<br>
						<p>
							<label>Conteudo:</label><br/>
							<textarea id="blogdescription" name="blogdescription" style="width:100%; height:400px" ><?php echo $blogdescription; ?></textarea>
						</p>
						<br>
						<br>
						<p>
							<label>Categoria:</label><br/>
							<select id="blogcatid" name="blogcatid">
							<?php
								$bcat = mysql_query("SELECT * FROM mxm_categories");
								while($cat = mysql_fetch_array($bcat)){
									$select = "";
									if($cat["id_cat"] == $blogcatid){
										$select = "selected";
									}
									echo '<option value="' . $cat["id_cat"] . '" ' . $select . '>' . $cat["categorie_name"] . '</option>';
								}
							?>
            	    		</select>
						</p>
						<br>
						<p>
							<input type="submit" value="Guardar"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onClick="location.href='blog.php'" value="Cancelar"/>
						</p>
					</form>
				</div>
			</div>
			
			<br class="clear"/>

		</div>
		
		<br class="clear"/><br class="clear"/>

<?php include_once("footer.php");
