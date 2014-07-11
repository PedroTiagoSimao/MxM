<?php
include_once("header.php");
include_once("menu.php");

?>
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<?php include_once("title.php"); ?>
			<div class="onecolumn">
				<div class="header">
					<span>Resultados da procura</span>
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
									<th style="width:30%">Titulo</th>
									<th style="width:20%">Utilizador</th>
									<th style="width:30%">Categoria</th>
									<th style="width:15%">Accao</th>

								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<input type="checkbox"/>
									</td>
									<td>Maecenas lacinia orci at neque</td>
									<td><a href="">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>
										<a href=""><img src="images/icon_edit.png" alt="edit" class="help" title="Edit"/></a>
										<a href=""><img src="images/icon_delete.png" alt="delete" class="help" title="Delete"/></a>
									</td>
								</tr>
							</tbody>
						</table>
						<div id="chart_wrapper" class="chart_wrapper"></div>
					<!-- End bar chart table-->
					</form>
				</div>
			</div>
			<br class="clear"/>
			<?php include_once("shortcuts.php"); ?>
			<br class="clear"/>
		</div>
		
		<br class="clear"/><br class="clear"/>

<?php include_once("footer.php");
