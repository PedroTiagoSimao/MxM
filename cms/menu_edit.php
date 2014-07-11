<?php
include("header.php");
include("menu.php");

$action = $_REQUEST["action"];
$id = "";
if(isset($_REQUEST["menuid"])) $id = $_REQUEST["menuid"];
$menuname = "";

if($action == "edit")
{
	$qmenu = mysql_query("SELECT * FROM mxm_menus WHERE id=".$id);
	while($menu = mysql_fetch_array($qmenu)){
		$menuname = $menu["menuname"];
		$lang = $menu["mlang"];
		$ordem = $menu["ordem"];
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
					<span>Adicionar menu</span>
				</div>
				<br class="clear"/>
				<div class="content">
					<form id="form_data" name="form_data" action="menu_action.php" method="post">
					<input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />
					<input type="hidden" id="menuid" name="menuid" value="<?php echo $id; ?>" />
						<p>
							<label>Nome do Menu:</label><br/>
							<input type="text" id="menuname" name="menuname" style="width:300px" value="<?php echo $menuname; ?>"/>
						</p>
						<br>
						<p>
							<select id="lingua" name="lingua">
								<option value="">Selecione...</option>
								<option value="_EN" <?php if($lang == "_EN"){ echo "selected"; } ?>>Inglês</option>
								<option value="_PT" <?php if($lang == "_PT"){ echo "selected"; } ?>>Português</option>
							</select>
						</p>
						<br>
						<p>
							<label>Ordem</label><br>
							<input type="text" id="ordem" name="ordem" style="width:20px" value="<?php echo $ordem; ?>" />
						</p>
						<br>
						<p>
							<input type="submit" id="save" value="Guardar"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onClick="location.href='menu_list.php'" value="Cancelar"/>
						</p>
					</form>
				</div>
			</div>
			
			<br class="clear"/>

		</div>
		
		<br class="clear"/><br class="clear"/>

<?php include_once("footer.php");
