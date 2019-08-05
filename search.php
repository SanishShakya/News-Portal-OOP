<?php
	require_once "backend/object.php";
	$searchNews = $news->getNewsByKeyword($_GET['keyword']);
	require_once "header.php";
	?>
<!-- News Content -->
	<div class="main-content container">
		<div class="col-md-12">
			<div class="page_header">
				<div class="col-md-3 ph-prev">
				
				</div>
				<div class="col-md-6">
					
					<ul class="bcrumbs">
						<li><a href="#">home</a></li>
						<li>Search Result for <?php echo $_GET['keyword']?></li>
					</ul>
				</div>
				<div class="col-md-3 ph-next">
					
				</div>
			</div>
		</div>
		
		<div class="col-md-12">
			
			<div class="row">
				<?php if(count($searchNews) > 0) {?>
				<?php foreach($searchNews as $sn){ ?>
				<div class="col-md-4">
					<a href="news.php?category_id=<?php echo $sn->category_id?>&id=<?php echo $sn->id ?>">
						<div class="news-thumb">
							<img src="backend/images/<?php echo $sn->image ?>"  alt="" height="200" width="200"/>
							<h4><?php echo $sn->title ?></h4>
						</div>
					</a>
				</div>
				<?php } ?>
				<?php }else{ ?>
					<p class="alert alert-danger">No News for <?php echo $_GET['keyword']?></p>
				<?php } ?>

				</div>

			</div>
			
			<div class="page-nav">
				<ul>
					<li class="active"><a href="#"><span>1</span></a></li>
					<li><a href="#"><span>2</span></a></li>
					<li><a href="#"><span>3</span></a></li>
				</ul>
			</div>
			<div class="clearfix space30"></div>
		</div>
	</div>
	<?php require_once "footer.php";?>
