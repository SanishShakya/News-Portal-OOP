<!DOCTYPE html>
<?php
	require_once "backend/object.php";
	$menuList = $category->getMenu();
	$latestNews = $news->getLatestNews();

?>
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php if(isset($title)){ echo $title . ' |' ;}?> Responsive News</title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicons -->
	
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">

	<!-- Google Fonts & Fontawesome -->
	 <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/png" sizes="16x16" href="backend/images/favicon-16x16.png">
	<link href="/maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,900,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,100,300,300italic,100italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,100,300,300italic,100italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="js/vendor/slick/slick.css">
	<link rel="stylesheet" href="css/prettyphoto.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- JS - MEDIAQUERIES -->
	<script src="js/css3-mediaqueries.js"></script>

</head>
<body>

<!-- Topbar -->
<div class="top-bar container">
	<div class="row">
		<div class="col-md-6">
			<ul class="tb-left">
				<li class="tbl-date"><span><?php echo date('y-m-d')?></span></li>
				<li class="tbl-temp"><i class="fa fa-sun-o"></i>32&deg; C</li>
			</ul>
		</div>
		<div class="col-md-6">
			<ul class="tb-right">
				<li class="tbr-social">
					<span>
					<a href="http://www.twitter.com/responsivenews" class="fa fa-twitter"></a>
					<a href="http://www.facebook.com/responsivenews" class="fa fa-facebook"></a>
					<a href="http://www.google.com/responsivenews" class="fa fa-google-plus"></a>
					<a href="#" class="fa fa-rss"></a>
					<a href="http://www.pinterest.com/responsivenews" class="fa fa-pinterest"></a>
					<a href="http://www.youtube.com/responsivenews" class="fa fa-youtube-play"></a>
					</span>
				</li>
				<li class="tbr-login">
					<a href="backend/login.php">Login</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="container wrapper">
	<div class="header">
		<div class="col-md-12">
			<!-- Logo -->
			<div class="col-md-4 logo">
				<h1><a href="index-2.html"><img src="images/logo.png" alt=""/></a></h1>
			</div>
			<!-- News Ticker -->
			<div class="col-md-8">
				<a href="#" class="pull-right"><img src="images/banner/1.jpg" class="img-responsive" alt=""/></a>
			</div>
		</div>
	</div>
	
	<!-- Header -->
	<header>
		<div class="col-md-12">
			<div class="row">
				<!-- Navigation -->
				<div class="col-md-12">
					<div class="menu-trigger"><i class="fa fa-align-justify"></i> Menu</div>
					<nav>
						<ul id="nav">

							<li class="n-menu" id="selected"><a href="index.php">Home</a></li>
							<?php foreach($menuList as $menu){
							?>
							<li class="n-menu"><a href=" news_list.php?category_id=<?php echo $menu->id?> "><?php echo $menu->name ?></a></li>
							<?php } ?>
						</ul>
					</nav>
					
					<!-- Search -->
					<div class="search">
						<form action="search.php" method="get">
							<input type="search" name="keyword" placeholder="Type to search and hit enter">
						</form>
					</div>
					<span class="search-trigger"><i class="fa fa-search"></i></span>
				</div>
			</div>
		</div>
	</header>