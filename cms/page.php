<?php
include("header.php");
include("menu.php");
?>
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<?php include_once("title.php"); ?>
			
			<div class="onecolumn">
				<div class="header">
					<span>Paginas</span>
				</div>
				<br class="clear"/>
				<div class="content">
					<div style="margin-bottom:10px">
						<form method="post" >
						<label>Portugues</label><input type="radio" name="lang" value="_PT" />&nbsp;&nbsp;&nbsp;
						<label>Ingles</label><input type="radio" name="lang" value="_EN" />
					</form>
					</div>
					<div id="list"></div>
				</div>
			</div>
			<br class="clear"/>
		</div>
		<br class="clear"/><br class="clear"/>
<script>
$("#list").load("page_list.php");

$(document).ready(function(){
	$("input[name=lang]:radio").change(function(){
		$("#list").fadeOut("slow").load("page_list.php", {lang:$(this).val()}).fadeIn();
	})
})
</script>
<?php include_once("footer.php");
