<?php
	$title = "Home"; 
	require_once "header.php";
	$latestNews = $news->getLatestNews();
	$sliderNews = $news->getSliderNews();
	$breakingNews = $news->getBreakingNews();
	$bfeatureNews = $news->getFeatureNews();


?>


	<!-- Main Content -->
	<div class="main-content container">
		<div class="col-md-8 block-1">
			<div class="row">
				<div class="col-md-3 b1-aside">
					<h5><span>Latest News</span></h5>
					<div class="bla-content">
					<?php foreach ($latestNews as $latest) {?>
						<span class="cat-default"><?php echo $latest-> category_name?></span>
						<p><i class="fa fa-clock-o"></i><?php echo $latest-> created_at?></p>
						<h4><a href="news.php?category_id=<?php echo $latest->category_id?>&id=<?php echo $latest->id?>"><?php echo $latest-> title?></a></h4>
						<div class="sep"></div>
					<?php } ?>
						<a href="#" class="btn1">View All Posts</a>
					</div>
					<div class="bla-content banner">
						<img src="images/banner/2.jpg" class="img-responsive" alt=""/>
					</div>
					<h5><span>Tweets</span></h5>
					<div id="tweet-feed">
						<div class="tf-info">
							<img src="images/logo-pic.png" alt=""/>
							<p>Check out 'Momental - Vertical Navigation HTML5 Template' on <a href="#">@EnvatoMarket</a> by <a href="#">@premiummlayers</a> #themeforest <span><a href="#">http://t.co/eva3o65Kky</a></span></p>
						</div>
						<div class="tf-info">
							<img src="images/logo-pic.png" alt=""/>
							<p>Check out 'Momental - Vertical Navigation HTML5 Template' on <a href="#">@EnvatoMarket</a> by <a href="#">@premiummlayers</a> #themeforest <span><a href="#">http://t.co/eva3o65Kky</a></span></p>
						</div>
						<div class="tf-info">
							<img src="images/logo-pic.png" alt=""/>
							<p>Check out 'Momental - Vertical Navigation HTML5 Template' on <a href="#">@EnvatoMarket</a> by <a href="#">@premiummlayers</a> #themeforest <span><a href="#">http://t.co/eva3o65Kky</a></span></p>
						</div>
					</div>
					<div class="side-poll">
						<h6>What's Your Favourite News Category</h6>
						<form>
							<ul>
								<li><input type="radio" name="radiog_lite" id="radio1" class="css-checkbox" /><label for="radio1" class="css-label radGroup1">Business</label></li>
								<li><input type="radio" name="radiog_lite" id="radio2" class="css-checkbox" /><label for="radio2" class="css-label radGroup1">Technology</label></li>
								<li><input type="radio" name="radiog_lite" id="radio3" class="css-checkbox" /><label for="radio3" class="css-label radGroup1">Science</label></li>
								<li><input type="radio" name="radiog_lite" id="radio4" class="css-checkbox" /><label for="radio4" class="css-label radGroup1">Nature</label></li>
								<li><input type="radio" name="radiog_lite" id="radio5" class="css-checkbox" /><label for="radio5" class="css-label radGroup1">Culture</label></li>
							</ul>
						</form>
						<a href="#">Vote</a>
					</div>
				</div>
				
				<div class="col-md-9 block-right">
					<div id="bl-featured">
						<?php foreach($sliderNews as $slider){?>
						<div class="bl-featured-big">
							<img src="backend/images/<?php echo $slider->image ?>"class="img-responsive" alt=""/>
							<div class="bl-info">
								<span><?php echo $slider->category_name?></span>
								<h3><a href="news.php?category_id ?>&id=<?php echo $slider_id ?>"><?php echo $slider->title?></a></h3>
							</div>
						</div>
						<?php } ?>
					</div>
					
					<!-- Featured News -->
					<div class="featured-news">
						<h5><span>Featured News</span></h5>
						<div class="row">
							<div class="col-md-6">
								<div class="fn-inner">
									<div class="fn-thumb">
										<img src="images/xtra/3.jpg" class="img-responsive" alt=""/>
										<div class="fn-meta">Technology</div>
									</div>
									<h4><a href="news_single.html">Are you using marketplace analytics?</a></h4>
									<em><i class="fa fa-clock-o"></i> December 13,2014 <a href="#"><i class="fa fa-comments"></i> 5</a></em>
									<p>We're running a Cinemagraph contest where we want you to create Cinemagraph images and we've got over $1,000 worth of prizes up for grabs courtesy ..</p>
								</div>
								<div class="fn-inner">
									<div class="fn-thumb">
										<img src="images/xtra/5.jpg" class="img-responsive" alt=""/>
										<div class="fn-meta">Sport</div>
									</div>
									<h4><a href="news_single.html">Rating reminder emails and Email Settings panel</a></h4>
									<em><i class="fa fa-clock-o"></i> December 13,2014 <a href="#"><i class="fa fa-comments"></i> 5</a></em>
									<p>Good news everyone! Faceted search has landed and will be fully rolled out across Envato Market over the next day. I recommend reading through the release..</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="fn-inner">
									<div class="fn-thumb">
										<img src="images/xtra/4.jpg" class="img-responsive" alt=""/>
										<div class="fn-meta">Culture</div>
									</div>
									<h4><a href="news_single.html">Mobile friendly comments dashboard - now launched!</a></h4>
									<em><i class="fa fa-clock-o"></i> December 13,2014 <a href="#"><i class="fa fa-comments"></i> 5</a></em>
									<p>Yes you read that correctly, the shopping cart is leaving the pipeline! We're rolling out the shopping cart gradually across Envato Market over the next few..</p>
								</div>
								<div class="fn-inner">
									<div class="fn-thumb">
										<img src="images/xtra/6.jpg" class="img-responsive" alt=""/>
										<div class="fn-meta">Travelling</div>
									</div>
									<h4><a href="news_single.html">Introducing Envato's newest Marketplaces Developer...</a></h4>
									<em><i class="fa fa-clock-o"></i> December 13,2014 <a href="#"><i class="fa fa-comments"></i> 5</a></em>
									<p>On top of the new model proposal we said we'd come back with more information about pricing and timelines. It turns out we'll need to come back to you..</p>
								</div>
							</div>
						</div>
					</div>
					<?php foreach($menuList as $cat){
							$news->set('category_id',$cat->id);
							$categoryNews = $news->getFeatureNewsByCategoryId();
							if(count($categoryNews) > 0){

						?>
					<div class="cat-blocks">
						<h4><span><?php echo $cat->name ?></span></h4>
						<div class="row">
							<div class="col-md-6">
								<div class="cb-big">
									<img src="backend/images/<?php echo $categoryNews[0]->image ?>" class="img-responsive" alt=""/>
									<div class="bl-info">
										<h3><a href="news_single.html"><?php echo $categoryNews[0]->title?></a></h3>
									</div>
								</div>
							</div>
							<div class="col-md-6 cb-info">
							<?php array_shift($categoryNews);?>
								<ul>
									<?php foreach($categoryNews as $cn){?>
									<li><a href="news_single.html"><?php echo $cn->title?></a></li>
								<?php } ?>
								</ul>
							</div>
						</div>
						<div class="space40"></div>
					</div>
				<?php } } ?>
				</div>
			</div>
		</div>
		
		<!-- Sidebar -->
		<aside class="col-md-4">
			<!-- Popular News -->
			<div class="side-widget p-news">
				<h5><span>Breaking news</span></h5>
				<div class="sw-inner">
					<ul>
						<?php foreach($breakingNews as $breaking){?>
						<li>
							<img src="backend/images/<?php echo $breaking->image?>" alt=""/>
							<div class="pn-info">
								<em><i class="fa fa-clock-o"></i><?php echo $breaking->created_at?><a href="#"><i class="fa fa-comments"></i> 5</a></em>
								<h4><a href="news.php>category_id=<?php echo $breaking->id?>"><?php echo $breaking->title?></a></h4>
							</div>
						</li>
					<?php } ?>
					</ul>
				</div>
			</div>
			
			<!-- Banner -->
			<div class="side-widget sw-banner">
				<a href="#"><img src="images/banner/3.jpg" class="img-responsive" alt=""/></a>
			</div>
			<div class="side-widget m-comment">
				<h5><span>Most Commented</span></h5>
				<ul>
					<li>
						<img src="images/xtra/8.jpg" alt=""/>
						<span>Entertainment</span>
						<h4><a href="#">Designed BY the Community, FOR the Community!</a></h4>
					</li>
					<li>
						<img src="images/xtra/9.jpg" alt=""/>
						<i class="fa fa-play"></i>
						<span>Entertainment</span>
						<h4><a href="#">Designed BY the Community, FOR the Community!</a></h4>
					</li>
					<li>
						<img src="images/xtra/10.jpg" alt=""/>
						<span>Entertainment</span>
						<h4><a href="#">Designed BY the Community, FOR the Community!</a></h4>
					</li>
				</ul>
			</div>
		</aside>


<?php require_once "footer.php"?>