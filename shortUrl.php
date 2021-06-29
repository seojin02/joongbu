<?
				header('Content-Type: text/html; charset=UTF-8');

        $client_id = "DB_6zRTBws7smf11rAOS"; // 네이버 개발자센터에서 발급받은 CLIENT ID
        $client_secret = "C_SY6Ld0GU";// 네이버 개발자센터에서 발급받은 CLIENT SECRET

        $id = 11;
				$vr = "vr1|vr2";
				$cpr = "cpr1|cpr2|cpr3";
				$fire = "소화기1|소화기2|소화기3|소화기4";

        //$eduUrl = "http://test.lgchemical_ochang.com/api/send_msg?id=".$id."&item=".$item;
				$eduUrl = "http://127.0.0.1/?id=".$id."&vr=".$vr."&cpr=".$cpr."&fire=".$fire;

        $encText = urlencode($eduUrl);
        $url = "https://openapi.naver.com/v1/util/shorturl?url=".$encText;
        $is_post = false;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $is_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array();
        $headers[] = "X-Naver-Client-Id: ".$client_id;
        $headers[] = "X-Naver-Client-Secret: ".$client_secret;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec ($ch);

        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //echo "status_code:".$status_code."<br>";
        curl_close ($ch);
        if($status_code == 200) {
          $data = json_decode($response);
					$url = $data->result->url;
					echo $url;
        } else {
          echo "Error 내용:".$response;
        }
?>