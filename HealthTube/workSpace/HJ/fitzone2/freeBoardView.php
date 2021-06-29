<?php
include 'api/dbconn.php';

$conn = new DBC();
$conn->DBI();
?>
<?include 'header.php';?>
<?include 'menu.php';?>

	<!--================Content Area =================-->
	<section class="blog_area single-post-area section_padding" style="min-height:1100px;padding: 100px 0px;">
		<div class="container">
			<h2><b>글 보기</b></h2>
			<div class="row">

				<!--================left_sidebar =================-->
				<div class="col-lg-8 posts-list">

					<!--================the content =================-->
					<div class="single-post">
						<div class="feature-img">
							<img class="img-fluid" src="img/blog/single_blog_1.png" alt="">
						</div>
						<div class="blog_details">
							<h2>제목 앙.........
							</h2>
							<ul class="blog-info-link mt-3 mb-4">
								<li><a href="#"><i class="far fa-user"></i> 작성자</a></li>
								<li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
							</ul>
							<p class="excert">
								<pre>
앙
기
모
앙
기
모
띠
앙
기
모                       ㅁㄴㅇ
띠
앙                                                            ㅁㄴㅇㅁㄴ
기ddda
모           das
띠                              dasd
앙
기
모
띠
띠

								</pre>
							</p>
							<!--<div class="quote-wrapper">
							<div class="quotes">
							MCSE boot camps have its supporters and its detractors. Some people do not understand why you
							should have to spend money on boot camp when you can get the MCSE study materials yourself at
							a fraction of the camp price. However, who has the willpower to actually sit through a
							self-imposed MCSE training.
							</div>
							</div> 강조하는 단락 같은데 쓰고 싶으면 쓰고;-->
						</div>
					</div>
					<!--================the content =================-->

					<!--================navigation =================-->
					<div class="navigation-top">

						<div class="d-sm-flex justify-content-between text-center">
							<p class="like-info"><span class="align-middle"><i class="far fa-heart"></i></span> Lily and 4 people like this</p>
							<div class="col-sm-4 text-center my-2 my-sm-0">
							<!-- <p class="comment-count"><span class="align-middle"><i class="far fa-comment"></i></span> 06 Comments</p> -->
							</div>
							<ul class="social-icons">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fab fa-behance"></i></a></li>
							</ul>
						</div>

						<div class="navigation-area">
							<div class="row">

								<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
									<div class="thumb">
										<a href="#">
											<img class="img-fluid" src="img/post/preview.png" alt="">
										</a>
									</div>
									<div class="arrow">
										<a href="#">
											<span class="lnr text-white ti-arrow-left"></span>
										</a>
									</div>
									<div class="detials">
										<p>이전 글</p>
										<a href="#">
											<h4>제목 앙1</h4>
										</a>
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
									<div class="detials">
										<p>다음 글</p>
										<a href="#">
											<h4>제목 앙2</h4>
										</a>
									</div>
									<div class="arrow">
										<a href="#">
											<span class="lnr text-white ti-arrow-right"></span>
										</a>
									</div>
									<div class="thumb">
										<a href="#">
											<img class="img-fluid" src="img/post/next.png" alt="">
										</a>
									</div>
								</div>

							</div>
						</div>

					</div>
					<!--================navigation =================-->
				 
					<!--================author =================-->
					<div class="blog-author">
						<div class="media align-items-center">
							<img src="img/blog/author.png" alt="">
							<div class="media-body">
								<a href="#">
									<h4>설서진</h4>
								</a>
								<p>안녕하세요 설서진 입니다. 저는 자유게시판과 비포&애프터를 담당하고 있습니다.</p>
							</div>
						</div>
					</div>

					<!--================comments =================-->
					<div class="comments-area">
						<h4>05 Comments</h4>

						<div class="comment-list">
							<div class="single-comment justify-content-between d-flex">
								<div class="user justify-content-between d-flex">									
									<div class="thumb">
										<img src="img/comment/comment_1.png" alt="">
									</div>								
									<div class="desc">
										<p class="comment">
											댓글내용 1 댓글 수 제한 거세요.
										</p>									
										<div class="d-flex justify-content-between">
											<div class="d-flex align-items-center">
												<h5>
													<a href="#">작성자</a>
												</h5>
												<p class="date">December 4, 2017 at 3:12 pm </p>
											</div>
											<div class="reply-btn">
												<a href="#" class="btn-reply text-uppercase">reply</a>
											</div>
										</div>
									</div>								
								</div>
							</div>
						</div>

						<div class="comment-list">
							<div class="single-comment justify-content-between d-flex">
								<div class="user justify-content-between d-flex">									
									<div class="thumb">
										<img src="img/comment/comment_2.png" alt="">
									</div>									
									<div class="desc">
										<p class="comment">
											댓글내용 2 댓글 수 제한 거세요.
										</p>									
										<div class="d-flex justify-content-between">
											<div class="d-flex align-items-center">
												<h5>
													<a href="#">작성자2</a>
												</h5>
												<p class="date">December 4, 2017 at 3:12 pm </p>
											</div>
											<div class="reply-btn">
												<a href="#" class="btn-reply text-uppercase">reply</a>
											</div>
										</div>
									</div>								
								</div>
							</div>
						</div>					

					</div>
					<!--================comments =================-->

					<!--================comments form =================-->
					<div class="comment-form">
						<h4>댓글 남기기</h4>
						<form class="form-contact comment_form" action="#" id="commentForm">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="button button-contactForm btn_2">댓글 달기</button>
							</div>
						</form>
					</div>
					<!--================comments form =================-->

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
