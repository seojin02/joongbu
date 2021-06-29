 <div class="site-section bg-light" id="about-section">
        <div class="container">
          <div class="row mb-3 justify-content-center">
            <div class="col-md-8 text-center">
              <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                <h2>양미림에 대하여</h2>
                <p>양미림은 현재 조수훈과 연애중입니다.우리 모두 응원해줍시다. 미림, 수훈, 하얀화이팅!</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section bg-light" id="about-section">
        <div class="container">
          <div class="row justify-content-center mb-4 block-img-video-1-wrap">
            <div class="col-md-10 mb-3" align="center">
              <figure class="block-img-video-1" data-aos="fade">
                <img src="images/oh.jpg" align="center" width="1200px" alt="Image" class="img-fluid">
              </figure>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-6 col-md-4 mb-2 col-lg-0 col-lg-2" data-aos="fade-up" data-aos-delay="">
                  <div class="block-counter-1">
                    <span class="number"><span data-number="25"></span></span>
                    <span class="caption">조수훈</span>
                  </div>
                </div>
                <div class="col-6 col-md-4 mb-2 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                  <div class="block-counter-1">
                    <span class="number">-</span>
                    <span class="caption"></span>
                  </div>
                </div>
                <div class="col-6 col-md-4 mb-2 col-lg-0 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                  <div class="block-counter-1">
                    <span class="number"><span data-number="21"></span></span>
                    <span class="caption">양미림</span>
                  </div>
                </div>
                <div class="col-6 col-md-4 mb-2 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                  <div class="block-counter-1">
                    <span class="number">=</span>
                    <span class="caption"></span>
                  </div>
                </div>

                <div class="col-6 col-md-4 mb-2 col-lg-0 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                  <div class="block-counter-1">
                    <span class="number"><span data-number="4">4</span></span>
                    <span class="caption">찰떡궁합</span>
                  </div>
                </div>
			
              </div>
            </div>
          </div>
        </div>
      </div>

<script>
var dday_second2=<? echo $dday_second-$date_now ?> 
var dday_second=dday_second2; 

function startcount() 
{ 
--dday_second 

var d_sec=dday_second%60 
var d_min= ((dday_second-d_sec)/60)%60 
var d_time=((((dday_second-d_sec)/60)-d_min)/60) %24 
var d_day= (((((dday_second-d_sec)/60)-d_min)/60)-d_time)/24 


document.clock.count.value = d_day
setTimeout("startcount()",1000);   
} 
</script>

<? 
function date_call($took) 
{ 
$took=str_replace(" ","-",$took); //(년-월-일-시:분:초) 
$took=str_replace(":","-",$took); //(년[0]-월[1]-일[2]-시[3]-분[4]-초[5]) 
$i=explode("-",$took); 
$date_exit=mktime($i[3],$i[4],$i[5],$i[1],$i[2],$i[0]); 

$dday=$date_exit-$date_now; 
if ($date_exit>$date_now) 
return $date_exit; 
else 
return 0; 

} 

//아래의 내용을 바꾸면 d-day 기준 날짜를 변경할수 있다 
//$too="2003-07-21 17:00:00";//(년-월-일 시:분:초) 
$too="2019-06-10 00:00:00"; 
$date_now=time(); 
$dday_second=date_call($too); 

?> 