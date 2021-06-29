<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();

	class DBC
	{
		public $conn; //pdo 객체 생성용 필드
		public $result; //쿼리 실행 결과 필드

		public function DBI() //DB IN (접속)
		{
			$this->conn = new PDO('mysql:host=localhost;dbname=heal11', 'heal11', 'heal1134#');
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn->exec("SET NAMES 'utf8'");
		}

		public function DBQ($q) //DB QUERY IN (쿼리 투척)
		{
			$this->result = $this->conn->prepare($q);
		}

		public function DBE() //DB QUERY Execute (쿼리 실행)
		{
			$this->result->execute();
		}

		public function DBO() //DB OUT (종료)
		{
			$this->conn = null;
			$this->result = null;
		}

		public function DBF() //DB FETCH (결과 출력)
		{
			return $this->result->fetch();
		}

		public function DBN()
		{
			return $this->result->fetch_num();
		}

		public function resultRow() //rowcount (실행 결과 행 개수)
		{
			return $this->result->rowCount();
		}

		public function lastId() //insert 된 마지막 컬럼 PK값을 출력 (AI+PK)
		{
			return $this->conn->lastInsertId();
		}
		public function DBP() //DB QUERY IN (쿼리 투척)
		{
			return $this->result->fetchAll();
		}
	}
?>