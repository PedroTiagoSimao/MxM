<?php
include("header.php");
include("menu.php");

$action = $_GET["action"];
$id = "";
if(isset($_GET["id"])) $id = $_GET["id"];
$text = "Adicionar";
$pagetitle = "";
$pagedescription = "";
$pagelink = "";
$pagehigh = "";
$pagemenuid = 0;
$pagemenu = "";
$price1 = 0;
$price2 = 0;
$price3 = 0;
$price4 = 0;
$onsale = 0;
$code = "";
$start = "";
$end = "";
$duration = "";
$locations = "";
$lowest = 0;
$active = "on";

if($action == "edit")
{
	$text = "Editar";
	$qpage = mysql_query("SELECT mxm_works.*, mxm_menus.* FROM mxm_works ".
	@"LEFT JOIN mxm_menus on mxm_works.menu=mxm_menus.id WHERE mxm_works.id=".$id);
	
	while($page = mysql_fetch_array($qpage)){
		$pagetitle = $page["title"];
		$pagedescription = $page["description"];
		$pagelink = $page["link"];
		$pagehigh = $page["high"];
		$pagemenuid = $page["menu"];
		$pagemenu = $page["menuname"];
		$pagelang = $page["wlang"];
		$price1 = $page["price1"];
		$price2 = $page["price2"];
		$price3 = $page["price3"];
		$price4 = $page["price4"];
		$onsale = $page["onsale"];
		$code = $page["code"];
		$start = $page["start"];
		$end = $page["end"];
		$duration = $page["duration"];
		$locations = $page["locations"];
		$lowest = $page["lowest"];
		$active = $page["active"];
	}
}
include_once("tiny_mce.php");
?>
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<?php include_once("title.php"); ?>
			
			<div class="onecolumn">
				<div class="header">
					<span><?php echo $text; ?> pagina</span>
				</div>
				<br class="clear"/>
				<div class="content">
					<form id="form_data" name="form_data" action="page_action.php" method="post" enctype="multipart/form-data">
					<input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />
					<input type="hidden" id="pageid" name="pageid" value="<?php echo $id; ?>" />
						<p>
							<label>Titulo:</label><br/>
							<input type="text" id="pagetitle" name="pagetitle" style="width:300px" value="<?php echo $pagetitle; ?>"/>
						</p>
						<br>
						<p>
							<label for="active">Activo:</label><br>
							<input type="checkbox" class="checkbox" id="active" name="active" <?php if($active == 'on') echo "checked"; ?>>
						</p>
						<br>
						<p>
							<label>Menu:</label><br/>
							<select id="pagemenuid" name="pagemenuid">
							<?php
								$qmenu = mysql_query("SELECT * FROM mxm_menus ORDER BY menuname");
								while($menu = mysql_fetch_array($qmenu)){
									$select = "";
									if($menu["id"] == $pagemenuid){
										$select = "selected";
									}
									echo '<option value="' . $menu["id"] . '" ' . $select . '>' . $menu["menuname"] . '</option>';
								}
							?>
								<option value="0" <?php if($pagemenuid == 0){echo "selected";} ?>>SEM MENU</option>
            	    		</select>
							<select id="wlang" name="wlang">
								<option value="_EN" <?php if($pagelang == "_EN"){ echo "selected";}?>>Inglês</option>
								<option value="_PT" <?php if($pagelang == "_PT"){ echo "selected";}?>>Português</option>
							</select>
						</p>
						<br>
						<p>
							<label>Código da Rota:</label><br>
							<input type="text" id="code" name="code" value="<?php echo $code; ?>" />
						</p>
						<br>
						<p>
							<label>Inicio:</label><br>
							<input type="text" id="start" name="start" value="<?php echo $start; ?>" />
						</p>
						<br>
						<p>
							<label>Final:</label><br>
							<input type="text" id="end" name="end" value="<?php echo $end; ?>" />
						</p>
						<br>
						<p>
							<label>Duração:</label><br>
							<input type="text" id="duration" name="duration" value="<?php echo $duration; ?>" />
						</p>
						<br>
						<p>
							<label>Locais a visital:</label><br>
							<input type="text" id="locations" name="locations" value="<?php echo $locations; ?>" style="width:98%" />
						</p>
						<br>
						<p>
							<label>Conteudo:</label><br/>
							<textarea id="pagedescription" name="pagedescription" style="width:100%; height:600px" ><?php echo $pagedescription; ?></textarea>
						</p>
						<br>
						<p>
							<input type="checkbox" class="checkbox" id="pagehigh" name="pagehigh" <?php if($pagehigh == 'on') echo "checked"; ?>> <label for="pagehigh">Destaque</label>
						</p>
						<p>
							<textarea id="pagelink" name="pagelink"><?php echo $pagelink; ?></textarea>
						</p>
						<br>
						<p>
							<label>Desde:</label>
							<input type="text" id="lowest" name="lowest" style="width:40px; text-align:right" value="<?php echo $lowest; ?>" />€<br>
							<label>Preço 4:</label>
							<input type="text" id="price1" name="price1" style="width:40px; text-align:right" value="<?php echo $price1; ?>" />€<br>
							<label>Preço 5:</label>
							<input type="text" id="price2" name="price2" style="width:40px; text-align:right" value="<?php echo $price2; ?>"/>€<br>
							<label>Preço 6:</label>
							<input type="text" id="price3" name="price3" style="width:40px; text-align:right" value="<?php echo $price3; ?>"/>€<br>
							<label>Preço 7:</label>
							<input type="text" id="price4" name="price4" style="width:40px; text-align:right" value="<?php echo $price4; ?>"/>€<br>
						</p>
						<br>
						<p>
							<label>Promoção:</label>
							<input type="text" id="onsale" name="onsale" style="width:40px; text-align:right" value="<?php echo $onsale; ?>"/>%
						</p>
						<br>
						<p>
							<input type="submit" value="Guardar"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onClick="location.href='page.php'" value="Cancelar"/>
						</p>
					</form>
						<br/><br/>
						<div class="alert_warning" style="margin-top:0">
							<p>
								<img src="images/icon_warning.png" alt="success" class="mid_align"/>
								Atencao! A opção para adicionar imagem só estará disponivel depois de gravar o artigo.
							</p>
						</div>
					<?php
						if($id != ""){
							$getimage = mysql_query("SELECT * FROM upload WHERE artigoid=".$id);
							if(mysql_num_rows($getimage) == 0){?>
								<br/>
								<p><label>Adicionar Imagem:</label></p>
					<?php
								include 'upload.php';
							}
							else{
								echo "<p><label>Imagem:</label></p>
									<img src='showimage.php?id=$id'>&nbsp;
									<a href='image.php?artigoid=$id&action=Delete'><img src='images/icon_delete.png' 
									alt='Eliminar foto'></a>";
							}
						}?>
				</div>
			</div>
			
			<br class="clear"/>

		</div>
		
		<br class="clear"/><br class="clear"/>

<?php include_once("footer.php");
