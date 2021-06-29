<?php
include 'api/dbconn.php';

header('Content-Type: text/html; charset=UTF-8');
define("MAX_RESULTS", 10);

if (isset($_POST['submit']) || isset($_POST['page']))
{
  $keyword = $_POST['keyword'];
  $page = $_POST['page'];

  if (empty($keyword))
  {
    $response = array(
      "type" => "error",
      "message" => "Please enter the keyword."
    );
  }
}
?>
<?php include 'header.php';?>
<section id="main">
  <div class="inner">
    <form id="keywordForm" method="post" action="">
      <h3 class="my-4"><strong>검색 youtube api</strong></h3>
      <div class="row">
        <div class="col-lg-12 mb-4">
          <div class="input-group">
            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="검색어를 입력하세요 . . ." value="<?echo $keyword;?>">
            <span class="input-group-btn">
              <button class="button alt small" type="submit" id="submit" name="submit">
                <span><i class="fa fa-search"></i></span>
              </button>
           </span>
          </div>
          <!-- /input-group -->
        </div>
        <!-- /col-lg-12 -->
        <div class="col-lg-12 mb-4">
				<?php
					if (!empty($keyword))
					{
						$apikey = 'AIzaSyBY8hm7STXxLsMvrpXNXUgzjS_H3bhssYM';
						$googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=' . MAX_RESULTS . '&key=' . $apikey . '&order=viewCount&type=video'
						. '&pageToken=' . $page;

						$ch = curl_init();

						curl_setopt($ch, CURLOPT_HEADER, 0);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($ch, CURLOPT_VERBOSE, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						$response = curl_exec($ch);

						curl_close($ch);
						$data = json_decode($response);
						$value = json_decode(json_encode($data), true);

						echo "영상 개수 : ".number_format($value['pageInfo']['totalResults'])."<br/>";
						echo "<br/>";
						//$prev = $value['prevPageToken'];
						//$next = $value['nextPageToken'];?>
            <div class="row">
              <?
              for ($i = 0; $i < MAX_RESULTS; $i++) {
                $thumb = $value['items'][$i]['snippet']['thumbnails']['medium']['url']; // 썸네일
                $videoId = $value['items'][$i]['id']['videoId'];                        // 영상 ID
                $title = $value['items'][$i]['snippet']['title'];                       // 영상 제목
                $description = $value['items'][$i]['snippet']['description'];           // 영상 설명
                $channel = $value['items'][$i]['snippet']['channelTitle'];              // 영상 채널
                $channelId = $value['items'][$i]['snippet']['channelId'];               // 채널 ID
              ?>
                <div class="col-lg-4 text-left">
                  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?echo $videoId;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <!-- /col-lg-4 text-left -->
                <div class="col-lg-6 text-left">
                  <?
    							echo "영상 ID : ".$videoId."<br/>";
    							echo "영상 제목: ".$title."<br/>";
    							echo "영상 설명 : ".$description."<br/>";
    							echo "영상 채널 : ".$channel."<br/>";
    							echo "채널 ID : ".$channelId."<br/>";
                  ?>
                </div>
                <!-- /col-lg-6 text-left -->
                <div class="col-lg-2 text-right">
                  <a href="api/video/insert?id=<?echo $videoId;?>&title=<?echo $title;?>&content=<?echo $description;?>"><button type="button">등록</button></a>
                </div>
                <html><hr class="mt-3 mb-3" color="black" width=100%></html>
						<?}?>
          </div>
          <!-- /row -->
				<?}?>
				</div>
        <!-- /col-lg-12 mb-4 -->
				<div class="col-lg-12 mb-4" style="text-align:center">
					<?if(isset($value['prevPageToken'])){?>
						<button type="submit" name="page" value="<?echo $value['prevPageToken']?>">이전</button>
					<?}if(isset($value['nextPageToken'])){?>
						<button type="submit" name="page" value="<?echo $value['nextPageToken']?>">다음</button>
					<?}?>
				</div>
      </div>
      <!-- /row -->
    </form>
  </div>
  <!-- /inner -->
</section>
<?php include 'footer.php';?>
