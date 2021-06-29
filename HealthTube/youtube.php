<?php
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
	}//���� �μ�Ʈ �����ؾ��� [] ����ϸ� �ɵ�? ���� ģ���� 	
?>
<?//php include 'header.php';?>
	<!-- Page Content -->
	<form id="keywordForm" method="post" action="">
		<div class="container" style="min-height: 450px;">
			<h3 class="my-4"><strong>���� ��� youtube api</strong></h3>
			<div class="row">
				<div class="col-lg-12 mb-4">
					Search Keyword : 
					<input class="input-field" type="search" id="keyword" name="keyword"  placeholder="Enter Search Keyword" value="<?echo $keyword?>">
					<input type="submit" name="submit" value="Search">
				</div>
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

							echo "��ü �� : ".$value['pageInfo']['totalResults']."<br/>";
							echo "�������� ��°��� : ".$value['pageInfo']['resultsPerPage']."<br/>";
							echo "<br/>";
							//$prev = $value['prevPageToken'];
							//$next = $value['nextPageToken'];

							for ($i = 0; $i < MAX_RESULTS; $i++) {
								$videoId = $value['items'][$i]['id']['videoId'];
								$title = $value['items'][$i]['snippet']['title'];
								$description = $value['items'][$i]['snippet']['description'];
								$channel = $value['items'][$i]['snippet']['channelTitle'];
								$channelId = $value['items'][$i]['snippet']['channelId'];
								$thumb = $value['items'][$i]['snippet']['thumbnails']['medium']['url'];

								echo "���̵� : ".$videoId."<br/>";
								echo "���� : ".$title."<br/>";
								echo "���� : ".$description."<br/>";
								echo "ä�� �̸� : ".$channel."<br/>";			
								echo "ä�� ���̵� : ".$channelId."<br/>";
								echo "����� : ".$thumb."<br/>";
								echo "<br/>";
							}
						}       
					?>
				</div>
				<div class="col-lg-12 mb-4" style="text-align:center">
					<?if(isset($value['prevPageToken'])){?>
						<button type="submit" name="page" value="<?echo $value['prevPageToken']?>">
						���� ������</button>
					<?}if(isset($value['nextPageToken'])){?>
						<button type="submit" name="page" value="<?echo $value['nextPageToken']?>">
						���� ������</button>
					<?}?>					
				</div>
			</div>
		</div>
	</form>
<?php include 'footer.php';?>