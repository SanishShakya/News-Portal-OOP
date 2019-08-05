<?php
	require_once "backend/object.php";
	$news->set('id',$_GET['id']);
	$newsData = $news->selectDataById();
	$title = $newsData[0]->title ;
	require_once "header.php";
	$comment->set('news_id',$_GET['id']);

	if(isset($_POST['btnComment'])){
		 if(isset($_POST['name'])&& !empty($_POST['name'])&& trim($_POST['name']) !='')
    {
      $comment->set('name',$_POST['name']);
    }
    else{
        $err['name']='Enter your Name';
        }

    if(isset($_POST['email'])&& !empty($_POST['email'])&& trim($_POST['email']) !='')
    {
      $comment->set('email',$_POST['email']); 
    }
    else{
        $err['email']='Enter Email';
        }
    if(isset($_POST['comments'])&& !empty($_POST['comments'])&& trim($_POST['comments']) !='')
    {
      $comment->set('comments',$_POST['comments']); 
    }
    else{
        $err['comments']='Enter Comments';
        }

     $comment->set('created_at',date('Y-m-d H:i:s'));
     $comment->set('status',1);
     $status = $comment->create();
	}
	$comments = $comment->selectCommentByNewsId();

?>
<!-- News Single Content -->
	<div class="main-content container">
		<div class="col-md-12">
			<div class="page_header">
				<div class="col-md-12">
					<h5 class="no-uppercase"><?php echo $newsData[0]->title ?></h5>
					<ul class="bcrumbs">
						<li><a href="index.php">home</a></li>
						<li><a href="news_list.php?category_id=<?php echo $newsData[0]->category_id?>"><?php echo $newsData[0]->cname?></a></li>
						<li><?php echo $newsData[0]->title ?></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-md-8 news-single">
			<div id="bl-featured">
				<div class="bl-featured-big">
					<a href="news_single.html">
						<img src="backend/images/<?php echo $newsData[0]->image ?>" class="img-responsive" alt=""/>
						<div class="bl-info">
							<h3><?php echo $newsData[0]->title ?></h3>
						</div>
					</a>
				</div>
				
			</div>
			<p><?php echo $newsData[0]->description ?></p>
			<div class="ns-meta">
				<div class="nsm-inner">
					<span><i class="fa fa-clock-o"></i> <?php echo $newsData[0]->created_at?></span>
					
				</div>
			</div>
			
			<div class="news-comment">
				<h5><?php if(count($comments) > 0){
					echo count($comments);
					?>Comments
				</h5>
			<?php } else { ?>
				<div class="alert alert-danger">No Comment till now</div> 
			<?php } ?>


			<?php if(isset($status) && $status == true){ ?>
        <p class="alert alert-success text-success">Comment Post Success !!</p>
      <?php } ?>
      <?php if(isset($status) && $status == false){ ?>
        <p class="alert alert-danger text-danger">Comment Post Failed !!</p>
      <?php } ?>
				<ul>
					<?php foreach($comments as $cm){ ?>
					<li>
						<img src="images/news/2/1.jpg" alt=""/>
						<div class="nc-inner">
							<h6><?php echo $cm->name?> <span><?php echo $cm->created_at?></span></h6>
							<p><?php echo $cm->comments?></p>
							
						</div>
					</li>
					 <?php } ?>
				</ul>
			</div>
			
			<div class="n-commentform">
				<h5>Send Us a message</h5>
				<form action="" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="ncf-ico">
								<input type="text" name="name" placeholder="Name">
								<span><i class="fa fa-user"></i></span>
							</div>
							<div class="ncf-ico">
								<input type="text" name="email" placeholder="e-mail">
								<span><i class="fa fa-envelope-o"></i></span>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="ncf-textarea">
								<textarea placeholder="Message" name="comments"></textarea>
							</div>
							<button name="btnComment" type="submit">Post a Comment</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		<!-- Sidebar -->
		<aside class="col-md-4">
			<!-- Popular News -->
			<div class="side-widget p-news">
				<h5><span>Popular news</span></h5>
				<div class="sw-inner">
					<ul>
						<li>
							<img src="images/aside/1.jpg" alt=""/>
							<div class="pn-info">
								<em><i class="fa fa-clock-o"></i> December 13,2014 <a href="#"><i class="fa fa-comments"></i> 5</a></em>
								<h4><a href="news_single.html">Driverless cars need to make their passengers feel like drivers</a></h4>
							</div>
						</li>
						<li>
							<img src="images/aside/2.jpg" alt=""/>
							<div class="pn-info">
								<em><i class="fa fa-clock-o"></i> December 13,2014 <a href="#"><i class="fa fa-comments"></i> 5</a></em>
								<h4><a href="news_single.html">One of the best phones around: Sony's Xperia Z3 reviewed</a></h4>
							</div>
						</li>
						<li>
							<img src="images/aside/3.jpg" alt=""/>
							<div class="pn-info">
								<em><i class="fa fa-clock-o"></i> December 13,2014 <a href="#"><i class="fa fa-comments"></i> 5</a></em>
								<h4><a href="news_single.html">Indian construction major seeks $803M over scrapped airport deal</a></h4>
							</div>
						</li>
						<li>
							<img src="images/aside/4.jpg" alt=""/>
							<div class="pn-info">
								<em><i class="fa fa-clock-o"></i> December 13,2014 <a href="#"><i class="fa fa-comments"></i> 5</a></em>
								<h4><a href="news_single.html">Qatar Airways, the global launch customer of the new Airbus A350</a></h4>
							</div>
						</li>
						<li>
							<img src="images/aside/5.jpg" alt=""/>
							<div class="pn-info">
								<em><i class="fa fa-clock-o"></i> December 13,2014 <a href="#"><i class="fa fa-comments"></i> 5</a></em>
								<h4><a href="news_single.html">US president's armored car and gum-chewing drew lots of attention</a></h4>
							</div>
						</li>
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
	</div>
<?php require_once "footer.php";?> 