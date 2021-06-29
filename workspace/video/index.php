<!-- <head> -->
<!--   <link href="https://vjs.zencdn.net/7.6.0/video-js.css" rel="stylesheet"> -->
<!--  -->
<!--   <!-- If you'd like to support IE8 (for Video.js versions prior to v7) --> -->
<!--   <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->
<!--  -->
<!-- 	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- </head> -->
<!--  -->
<!-- <body> -->
<!-- 	<div class="" style="text-align:center;"> -->
<!-- 		<video id='my-video' class='video-js' controls preload='auto' width='640' height='264' -->
<!-- 		poster='MY_VIDEO_POSTER.jpg' data-setup='{}'> -->
<!-- 			<source src="SampleVideo2.mp4" type="video/mp4"/> -->
<!-- 			<p class='vjs-no-js'> -->
<!-- 				To view this video please enable JavaScript, and consider upgrading to a web browser that -->
<!-- 				<a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a> -->
<!-- 			</p> -->
<!-- 		</video> -->
<!-- 	</div> -->
<!--  -->
<!--   <script src='https://vjs.zencdn.net/7.6.0/video.js'></script> -->
<!-- 	<script> -->
<!-- 		//vjs-progress-control -->
<!-- 		$(".vjs-progress-control vjs-control").click(function(){alert("hi");return false;}); -->
<!--  -->
<!-- 		$(document).on("click mouseup", ".vjs-progress-control", function() { -->
<!-- videojs.paused(); -->
<!-- //				var isPaused = videojs.paused(); -->
<!-- //				if(isPaused) { -->
<!-- //						videojs.play(); -->
<!-- //				} -->
<!-- 		}); -->
<!-- 	</script> -->
<!-- </body> -->

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="IE=edge" />
<style type="text/css">
    html, body { height:100%; overflow: hidden; }
    body { margin:0px; }
</style>
</head>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<BODY style="margin:0px 0px 0px 0px;">

<script type="text/javaScript">
	$(document).ready(function(){

		var video = document.getElementById('video_player');
		var supposedCurrentTime = 0;
	
		video.addEventListener('timeupdate', function() {
			if(!video.seeking){
				console.log(video.currentTime + " : " + video.duration);
				supposedCurrentTime = video.currentTime;
			}
		});

		video.addEventListener('seeking', function() {
			if(supposedCurrentTime < video.currentTime){
				console.log("Seeking is disabled");
				video.currentTime = supposedCurrentTime;
			}
		});
			
		video.addEventListener('ended', function() {
			supposedCurrentTime = 0;			
		});
	});
</script>


<div style="width: 80%; height: 80%; position: absolute;">
    <video style="min-width:400px; min-height:350px; width: 80%; height:80%;" id="video_player" poster="/images/bg_play_nexen.png" class="video-js" controls preload="auto" data-setup="" autoplay>
        <source data-res="1024" id="sVideo01" src="SampleVideo2.mp4" type='video/mp4'>
        <p class="vjs-no-js">해당 브라우저에서는 동영상을 재생할 수 없습니다.</p>   
    </video>
</div>


</body>
</html>