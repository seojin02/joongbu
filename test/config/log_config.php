<?php
  /*
  | @Author dyKim.
  | @Date 2019.07.02
  | @Description Log 기록
  | @brief  사용법 :         $logger = Logger::getRootLogger();
  |                         $logger->info(" 저장할 로그 ");
  |                         info , debug  log4.properties  에  설정 ~
  */
  use apache\log4php;

  Logger::configure(dirname(__FILE__)."/log4.properties");
