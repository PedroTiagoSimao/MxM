<?php
include("header.php");
include("menu.php");

?>
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<?php include_once("title.php"); ?>
			
			<?php //include_once("shortcuts.php"); ?>
			
			<div class="onecolumn">
				<div class="header">
					<span>Imagens Frontais</span>
				</div>
				<br class="clear"/>
				<div class="content">
				<form id="form_data" name="form_data" action="" method="post">
					<table class="data" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<th style="width:40%">Imagem</th>
							<th style="width:40%">Link</th>
							<th style="width:20%; text-align:right">Accao</th>
						</tr>
						<tr>
							<th style="width:40%"></th>
							<th style="width:40%">?id=7</th>
							<th style="width:20%; text-align:right"></th>
						</tr>
					</table>
				</form>
				</div>
			</div>
		</div>
		
		<br class="clear"/><br class="clear"/>

<?php include_once("footer.php");