<?php
	require_once "backend/object.php";
	$category->set('id',$_GET['category_id']);
	$categoryData = $category->selectDataById();
	$title = $categoryData[0]->name . ' News ';
	$news->set('category_id',$_GET['category_id']);
	$categoryNews = $news->getNewsByCategoryId();
	require_once "header.php";
	?>
<!-- News Content -->
	<div class="main-content container">
		<div class="col-md-12">
			<div class="page_header">
				<div class="col-md-3 ph-prev">
				
				</div>
				<div class="col-md-6">
					<h5><?php echo $categoryData[0]->name?></h5>
					<ul class="bcrumbs">
						<li><a href="#">home</a></li>
						<li><?php echo strtolower($categoryData[0]->name)?></li>
					</ul>
				</div>
				<div class="col-md-3 ph-next">
					
				</div>
			</div>
		</div>
		
		<div class="col-md-12">
			
			<div class="row">
				<?php foreach($categoryNews as $cn){ ?>
				<div class="col-md-4">
					<a href="news.php?category_id=<?php echo $cn->category_id?>&id=<?php echo $cn->id ?>">
						<div class="news-thumb">
							<img src="backend/images/<?php echo $cn->image ?>"  alt="" height="200" width="200"/>
							<h4><?php echo $cn->title ?></h4>
						</div>
					</a>
				</div>
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
