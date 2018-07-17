<?php
	Class dbpObj{
		/* Database connection start */
		var $servername = "localhost";
		var $username = "TcAccount";
		var $password = "tc29991361";
		var $dbname = "tc_person_control_db";
		var $conn;
		function getConnstring() {
			$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

			mysqli_query($con, 'SET NAMES utf8');//解決中文亂碼 ,請新增此項目20180330 by johnny
			/* check connection */
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			} else {
				$this->conn = $con;
			}
			return $this->conn;
		}
	}

?>