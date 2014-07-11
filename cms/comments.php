<?php
include("verify.php");
include("header.php");
include("menu.php");
$parent = $_REQUEST["parent"];

$qarticle = mysql_query("SELECT title FROM mxm_articles WHERE id=" . $parent);
while($article = mysql_fetch_array($qarticle)){
	$article_title = $article["title"];
}

$qcomments = mysql_query("SELECT *  FROM mxm_articles_comments WHERE parent=" . $parent);
?>
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<?php include_once("title.php"); ?>
			<?php //include_once("shortcuts.php"); ?>
			<br class="clear"/>
			
			<div class="onecolumn">
				<div class="header">
					<span>Comentarios sobre o artigo: '<?php echo $article_title; ?>'</span>
				</div>
				<br class="clear"/>
				<div class="content">
				<?php
					if($qcomments){
					
				?>
					<form id="form_data" name="form_data" action="" method="post">
						<table class="data" width="100%" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th style="width:15%">Autor</th>
									<th style="width:15%">Data</th>
									<th style="width:50%">Comentario</th>
									<th style="width:10%">Email</th>
									<th style="width:10%">URL</th>
								</tr>
							</thead>
							<tbody>
							<?php
									while ($comments = mysql_fetch_array($qcomments)){
							?>
								<tr>
									<td><?php echo $comments['author'] ?></td>
									<td><?php echo $comments['date_reply'] ?></td>
									<td><?php echo $comments['comment'] ?></td>
									<td><?php echo $comments['author_email'] ?></td>
									<td><?php echo $comments['author_url'] ?></td>
								</tr>
							<?php	} ?>
							</tbody>
						</table>
						<div id="chart_wrapper" class="chart_wrapper"></div>
					</form>
				<?php
					}
				?>
				</div>
			</div>
			
			<br class="clear"/>

		</div>
		
		<br class="clear"/><br class="clear"/>

<?php include_once("footer.php");
