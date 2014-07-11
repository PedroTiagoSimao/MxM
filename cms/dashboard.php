<?php
include("verify.php");
include("header.php");
include("menu.php");
?>
<script language="JavaScript">
    <!--
    function Export(){
         document.location.href ="exportcsv.php";
    }
    -->
</script>
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<?php include_once("title.php"); ?>
			<div class="onecolumn">
				<div class="header">
					<span>Conteudos</span>
					<div class="switch" style="width:150px">
						<table width="150px" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td>
									<input type="button" id="tab1" name="tab1" class="left_switch active" value="Pag" style="width:50px"/>
								</td>
								<td>
									<input type="button" id="tab2" name="tab2" class="middle_switch" value="Blog" style="width:50px"/>
								</td>
								<td>
									<input type="button" id="tab3" name="tab3" class="right_switch" value="List" style="width:50px"/>
								</td>
							</tr>
						</tbody>
						</table>
					</div>
				</div>
				<br class="clear"/>
				<div class="content">
				
					<div id="tab1_content" class="tab_content">
						<h4>Paginas</h4>
						
						<?php include("page_list.php"); ?>
						
						<br class="clear"/>
					</div>
					
					<div id="tab2_content" class="tab_content hide">
						<h4>Posts no Blog</h4>
						
						<?php include("blog_list.php"); ?>
						
	  					<br class="clear"/>
					</div>
					
					<div id="tab3_content" class="tab_content hide">
						<h4>Mail List</h4>
						<?php
							$mailquery = mysql_query("SELECT * FROM mxm_mails");
							while($mail = mysql_fetch_array($mailquery)){
								echo "<p>" . $mail["email"] . "</p>";
							}
						?>
						<br class="clear"/>
						<p>
							<input type="button" value="Exportar" onclick="Export()"/>
						</p>
						<br class="clear"/>
					</div>
				</div>
			</div>
			<br class="clear"/>
			<?php include_once("shortcuts.php"); ?>
		</div>
		<br class="clear"/>

<?php include_once("footer.php");
