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
			<h2><b>커뮤니티</b></h2>
			<div class="row">

				<!--================left_sidebar =================-->
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="blog_left_sidebar">

						<!--================board =================-->
						<article class="blog_item" style="margin-bottom: 0px;">
							<div class="blog_details">
								<a class="d-inline-block" href="freeBoardView.php">
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

						<article class="blog_item" style="margin-bottom: 0px;">
							<div class="blog_details">
								<a class="d-inline-block" href="freeBoardView.php">
									<h2>게시물 제목2</h2>
								</a>
								<p>간추린 내용을 적어주자.</p>
								<ul class="blog-info-link">
									<li><a href="#"><i class="far fa-user"></i> 설서진</a></li>
									<li><a href="#"><i class="far fa-comments"></i>3</a></li>
									<li><a href="#"><i class="far fa-clock"></i>2019.05.18</a></li>
								</ul>
							</div>
						</article>

						<article class="blog_item" style="margin-bottom: 0px;">
							<div class="blog_details">
								<a class="d-inline-block" href="freeBoardView.php">
									<h2>게시물 제목3</h2>
								</a>
								<p>간추린 내용을 적어주자.</p>
								<ul class="blog-info-link">
									<li><a href="#"><i class="far fa-user"></i> 설서진</a></li>
									<li><a href="#"><i class="far fa-comments"></i>3</a></li>
									<li><a href="#"><i class="far fa-clock"></i>2019.05.18</a></li>
								</ul>
							</div>
						</article>

						<article class="blog_item" style="margin-bottom: 0px;">
							<div class="blog_details">
								<a class="d-inline-block" href="freeBoardView.php">
									<h2>게시물 제목4</h2>
								</a>
								<p>간추린 내용을 적어주자.</p>
								<ul class="blog-info-link">
									<li><a href="#"><i class="far fa-user"></i> 설서진</a></li>
									<li><a href="#"><i class="far fa-comments"></i>3</a></li>
									<li><a href="#"><i class="far fa-clock"></i>2019.05.18</a></li>
								</ul>
							</div>
						</article>

						<article class="blog_item" style="margin-bottom: 0px;">
							<div class="blog_details">
								<a class="d-inline-block" href="freeBoardView.php">
									<h2>게시물 제목5</h2>
								</a>
								<p>간추린 내용을 적어주자.</p>
								<ul class="blog-info-link">
									<li><a href="#"><i class="far fa-user"></i> 설서진</a></li>
									<li><a href="#"><i class="far fa-comments"></i>3</a></li>
									<li><a href="#"><i class="far fa-clock"></i>2019.05.18</a></li>
								</ul>
							</div>
						</article>
						<!--================board =================-->

						<!--================pagination =================-->
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
						<!--================pagination =================-->

					</div>
				</div>
				<!--================left_sidebar =================-->
				
				<!--================right_sidebar =================-->
				<?include 'freeBoardRightBar.php';?>
				<!--================right_sidebar =================-->				
			
			</div>
		</div>
	</section>
	<!--================Content Area =================-->

<?include 'footer.php';?>
