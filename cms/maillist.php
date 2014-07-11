<?php
include("cnn.php");

$mailquery = mysql_query("SELECT * FROM mxm_mails");
$num_rows = mysql_num_rows($mailquery);
?>
<script language="JavaScript">
    <!--
    function Export(){
         document.location.href ="exportcsv.php";
    }
    -->
</script>
<div style="width:400px">
	<div class="modal_header">
		<span>Mail List (<?php echo $num_rows; ?>)</span>
	</div>
	<div class="modal_content">
	<?php
		while($mail = mysql_fetch_array($mailquery)){
			echo "<p>" . $mail["email"] . "</p>";
		}
	?>
		<br/><br/>
		<p>
			<input type="button" value="Exportar" onclick="Export()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Fechar" onclick="$.fancybox.close();"/>
		</p>				
	</div>
</div>