<?php
include("verify.php");
include("header.php");
include("menu.php");

?>
	
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<?php include_once("title.php"); ?>
			<?php //include_once("shortcuts.php"); ?>
			<br class="clear"/>
			
			<div class="onecolumn">
				<div class="header">
					<span>Posts</span>
				</div>
				<br class="clear"/>
				<div class="content">
				<?php include("blog_list.php"); ?>
				</div>
			</div>
			
			<br class="clear"/>

		</div>
		
		<br class="clear"/><br class="clear"/>

<?php include_once("footer.php");
