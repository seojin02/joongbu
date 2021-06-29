<?
	//error_reporting(E_ALL);
  require '../lib/vendor/autoload.php';

	error_reporting(0);

  /*
      @Author dykim
      @description version 정의 ( 캐시 설정 )
      @description dev 모드 prod 모드 설정(DEV = development 모드,PROD = product 모드 )
  */
  define('MODE', 'PROD');
  define('Ver', '0.72');

  //  암호화 키값
  $password = 'techteam2@';
  define('ENC_KEY', substr(hash('sha256', $password, true), 0, 32));
  // 256 bit 키를 만들기 위해서 비밀번호를 해시해서 첫 32바이트를 사용합니다.
  define('IV', chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0));

  // DB정의
	define('DB_HOST', 'localhost');
	define('DB_USER', 'uplstrangeevent');
	define('DB_PASSWD', 'strangeevent!@');
	define('DB_DATABASE', 'uplstrangeevent');

  // 로그 경로 정의
	define('LOG_DIR', "../Log");

  require "db_config.php";
  require "log_config.php";
  require "helper.php";
?>
