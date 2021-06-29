<?php
include 'api/dbconn.php';

$conn = new DBC();
$conn->DBI();
?>
<?include 'header.php';?>
<?include 'menu.php';?>

	<!--================Content Area =================-->
	<section class="blog_area section_padding" style="min-height:1100px;padding: 100px 0px;">
		<div class="container">
			<h2><b>비포 & 애프터</b></h2>
			<div class="row">

				<!--================left_sidebar =================-->
				<div class="col-lg-3 mb-5 mb-lg-0" style="margin-bottom: 0rem!important;">
					<div class="blog_left_sidebar">
						<article class="blog_item">
							<div class="blog_item_img">
								<img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
							</div>

							<div class="blog_details" style="padding: 15px 10px 10px 10px;">
								<a class="d-inline-block" href="galleryBoardView.php">
									<h2>게시물 제목</h2>
								</a>
								<p>간추린 내용을 적어주자.</p>
								<ul class="blog-info-link">
									<li><a href="#"><i class="far fa-user"></i> 설서진</a></li>
									<li><a href="#"><i class="far fa-comments"></i>3</a></li>
									<li><a href="#"><i class="far fa-clock"></i>2019.05.18</a></li>
								</ul>
							</div>
						</article>
					</div>
				</div>

				<div class="col-lg-3 mb-5 mb-lg-0" style="margin-bottom: 0rem!important;">
					<div class="blog_left_sidebar">
						<article class="blog_item">
							<div class="blog_item_img">
								<img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
							</div>

							<div class="blog_details" style="padding: 15px 10px 10px 10px;">
								<a class="d-inline-block" href="galleryBoardView.php">
									<h2>게시물 제목</h2>
								</a>
								<p>간추린 내용을 적어주자.</p>
								<ul class="blog-info-link">
									<li><a href="#"><i class="far fa-user"></i> 설서진</a></li>
									<li><a href="#"><i class="far fa-comments"></i>3</a></li>
									<li><a href="#"><i class="far fa-clock"></i>2019.05.18</a></li>
								</ul>
							</div>
						</article>
					</div>
				</div>

				<div class="col-lg-3 mb-5 mb-lg-0" style="margin-bottom: 0rem!important;">
					<div class="blog_left_sidebar">
						<article class="blog_item">
							<div class="blog_item_img">
								<img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
							</div>

							<div class="blog_details" style="padding: 15px 10px 10px 10px;">
								<a class="d-inline-block" href="galleryBoardView.php">
									<h2>게시물 제목</h2>
								</a>
								<p>간추린 내용을 적어주자.</p>
								<ul class="blog-info-link">
									<li><a href="#"><i class="far fa-user"></i> 설서진</a></li>
									<li><a href="#"><i class="far fa-comments"></i>3</a></li>
									<li><a href="#"><i class="far fa-clock"></i>2019.05.18</a></li>
								</ul>
							</div>
						</article>
					</div>
				</div>
	
				<div class="col-lg-3 mb-5 mb-lg-0" style="margin-bottom: 0rem!important;">
					<div class="blog_left_sidebar">
						<article class="blog_item">
							<div class="blog_item_img">
								<img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
							</div>

							<div class="blog_details" style="padding: 15px 10px 10px 10px;">
								<a class="d-inline-block" href="galleryBoardView.php">
									<h2>게시물 제목</h2>
								</a>
								<p>간추린 내용을 적어주자.</p>
								<ul class="blog-info-link">
									<li><a href="#"><i class="far fa-user"></i> 설서진</a></li>
									<li><a href="#"><i class="far fa-comments"></i>3</a></li>
									<li><a href="#"><i class="far fa-clock"></i>2019.05.18</a></li>
								</ul>
							</div>
						</article>
					</div>
				</div>
				<!--================left_sidebar =================-->		
				
			</div>
		</div>

		<!--================paging & searchBar =================-->
		<div class="container">
			<div class="row">

				<div class="col-lg-12 mb-5 mb-lg-0" style="padding:10px">	
					<nav class="blog-pagination justify-content-center d-flex">
						<ul class="pagination">
							<li class="page-item">
								<a href="#" class="page-link" aria-label="Previous">
										<i class="ti-angle-left"></i>
								</a>
							</li>
							<li class="page-item">
								<a href="#" class="page-link">1</a>
							</li>
							<li class="page-item active">
								<a href="#" class="page-link">2</a>
							</li>
							<li class="page-item">
								<a href="#" class="page-link" aria-label="Next">
										<i class="ti-angle-right"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div>

        <div class="col-lg-2 mb-5 mb-lg-0"></div>
				<div class="col-lg-8 mb-5 mb-lg-0">	
					<aside class="single_sidebar_widget search_widget">
						<form action="#">
							<div class="form-group">
								<div class="input-group mb-3">
									<input type="text" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''"
											onblur="this.placeholder = 'Search Keyword'">
									<div class="input-group-append">
										<button class="btn" type="button"><i class="ti-search"></i></button>
									</div>
								</div>
							</div>
						</form>
					</aside>				
				</div>
        <div class="col-lg-2 mb-5 mb-lg-0"></div>
			</div>
		</div>
		<!--================paging & searchBar =================-->

	</section>
	<!--================Content Area =================-->


<?include 'footer.php';?>
