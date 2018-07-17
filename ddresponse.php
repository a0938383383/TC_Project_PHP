
<?php

	// Get job (and id)
	$job = '';
	$id  = '';
	if (isset($_GET['job'])){
	  $job = $_GET['job'];
	  if ($job == 'get_history'){
		if (isset($_GET['id'])){
		  $id = $_GET['id'];
		  if (!is_numeric($id)){
			$id = '';
		  }
		}
	  } else {
		$job = '';
	  }
	}
	//my_txt_log($job);


	$mydbtabase= "";/* 現在再指定寫表單 sample_04_tables*/
	session_start();
	//若一開始沒有設定選項, 自己去抓第一項目.
	
	$_POST['job'] = 'get_history';
	
	
	require_once ("connection/mcconnection.php");
	//require_once ("connection/historyconn.php");
	//require_once ("ddconnection.php");


	$db = new dbmcObj();
	//$db = new dbhisfxObj();
	
	 
	 
	if($job == 'get_history'){
		$connString =  $db->getConnstring(1);
	}else{
		$connString =  $db->getConnstring(0);
	}
	

	
	//get table
	/*
	$mcquery = "SHOW TABLES";
	$mcresult1 = mysqli_query($connString, $mcquery);
	$optiontables = "";
		//$optiontables = $optiontables."<option>請選擇....</option>";
		
		//while($row3  = mysqli_fetch_array($mcresult1))
		//{
		//	// array as optiontables.
		//	$optiontables = $optiontables."<option>$row3[0]</option>";
		//	//echo "Table: {$row3[0]}\n";
		//	//my_txt_log("dd開始");
		//}
		
	$row3  = mysqli_fetch_array($mcresult1);
	$optiontables = $row3[0];
	*/
		//echo "Table: {$row3[0]}\n";
		
	//*************************************************************************************************************
	//star receive
	$params = array_merge($_GET, $_POST);	// record all reference.
	//end function
	//*************************************************************************************************************

	
	$select0 = isset($_COOKIE["cookieSelectionName"]) != '' ? $_COOKIE["cookieSelectionName"] : '';// get select index.
	//$select1 = isset($params['miantable']) != '' ? $params['miantable'] : '';
	
	
	
	/*************************************************************************************************************
	TODO: 寫一個迴圈列表 一個選擇的表單所有的 COLUMN to array 用來在 searchParse 搜尋檔案能找爆動態的欄位
	*************************************************************************************************************/
	//star
	//my_txt_log("select ".$select0);
	
	$slq_cmd = "DESCRIBE ".$select0;
	
	//my_txt_log("slq_cmd = ".$slq_cmd);
	//my_txt_log($slq_cmd);
	$col = mysqli_query($connString, $slq_cmd);
	//my_txt_log(count($col));	
	if($col ==""){
		
	}else{
		while( $fildss = mysqli_fetch_assoc($col) ) { 
			$myvalues[] = $fildss['Field'];
		}
	}
	/*	
	while ($fildss = $col->fetch_array())
	{             
		//$filds[] = '"{'.$fildss['Field'].'}"';
		//$values[] = '$rows->'.$fildss['Field'].'';
		$myvalues[] = $fildss['Field'];  //<------------------------------------ here are table columns element.
	}
	*/
	
	/*
	$mydblabel_0= "id";
	$mydblabel_1= "mOrder";
	$mydblabel_2= "mSpecifications";
	$mydblabel_3= "mnumber";
	$mydblabel_4= "mCustomer";
	$mydblabel_5= "mDelivery";
	$mydblabel_6= "mDelivery";// 這邊因該是 工作類別
	$mydblabel_7= "mWorkstation";
	$mydblabel_8= "mWorking_content";
	$mydblabel_9= "mRemarks";
	$mydblabel_10= "mStart_date";
	$mydblabel_11= "mStart_staff";
	$mydblabel_12= "mCompletion_date";
	$mydblabel_13= "mComplete_staff";
	$mydblabel_14= "updatedDate1";
	$mydblabel_15= "createdDate1";
	*/
	
	$mydblabel_0= "id";
	$mydblabel_1= "工單編號";
	$mydblabel_2= "規格";
	$mydblabel_3= "數量";
	$mydblabel_4= "客戶";
	$mydblabel_5= "交期";
	$mydblabel_6= "工作類別";
	$mydblabel_7= "工作站";
	$mydblabel_8= "工作內容";
	$mydblabel_9= "備註";
	$mydblabel_10= "開始日期";
	$mydblabel_11= "完成日期";
	$mydblabel_12= "製程開始"; //--- 修改會改到下面參數, 只可以改內容
	$mydblabel_13= "開始人員";
	$mydblabel_14= "製程完成"; //--- 修改會改到下面參數, 只可以改內容
	$mydblabel_15= "完成人員";
	$mydblabel_16= "updatedDate1";
	$mydblabel_17= "createdDate1";
	
	
	// ajax set cmd here
	$action = isset($params['action']) != '' ? $params['action'] : '';

	
	$empCls = new Employee($connString);
	//$empCls_rc = new Employee_recode($connString);
	
	switch($action) {
	 case 'add':
		//my_txt_log( "add in\n");
		$empCls->insertEmployee($params);
	 break;
	 
	 case 'edit':
		//my_txt_log("edit in\n");
		$empCls->updateEmployee($params);
	 break;
	 
	 case 'delete':
		//my_txt_log( "delete in\n" );
		$empCls->deleteEmployee($params);
	 break;
	 
	  case 'edit2':
		//my_txt_log( "edit2 in\n" );
		$empCls->edit2Employee($params);
	 break;
	 
	 case 'editrecord':
		//my_txt_log( "editrecord  in\n" );
		$empCls->edit2recordEmployee($params);
	 break;
	 
	 case 'save': // 現場按紐  自動控制項目
		//my_txt_log( "save  in\n" );
		$empCls->saveEmployee($params);
	 break;
	 
	 case 'updatalist': //更新表單
		//my_txt_log( "updatalist  in\n" );
		$empCls->updatListJob($params);
	 break;
	
	 case 'selected':
		//my_txt_log( "selected  in\n" );
		$empCls->saveEmployee($params);
	 break;
	 
	 
	  case 'tableupdate':
		//my_txt_log( "tableupdate  in\n" );
		$empCls->tableupdateEmployee();
	 break;
	 
	 default:	
		//my_txt_log( "default in---------------\n" );
		if ( empty($myvalues) ) $myvalues = '' ;
		$empCls->getEmployees($params, $myvalues);
		return;
	}
	
	function my_txt_log( $datastr )
	{
		$myfile = fopen("D:/aaa.txt", "a+") or die("Unable to open file!");
		//$string = fread($myfile,filesize("D:/aaa.txt"));
		$string  = "";
		$string .= date("Y/m/d")." ";
		$string .= date("h:i:sa")." ";
		//$myfile = fopen("D:/aaa.txt", "w") or die("Unable to open file!");
		fwrite($myfile, $string.$datastr."\n");
		fclose($myfile);
		
	}

	/*
	class Employee_recode {
		protected $conn;
		protected $data = array();

		function __construct($connString) {
			$this->conn = $connString;
		}
		
		function getEmployees_Records($params) {	
			$this->data = $this->getRecords($params);
		}
		
		function getRecords($params) {	
		  
		}
		
		function inserSQLRecord($params) {
			
		}
	}
	*/
	
	
	// main view
	class Employee {
		protected $conn;
		protected $data = array();
		
		function __construct($connString) {
			$this->conn = $connString;
			/*
			$select1 = isset($params['miantable']) != '' ? $params['miantable'] : '';
			if(empty($select1)){		
				// 沒有選擇項目近來
				$mydbtabase = $optiontables;
				//my_txt_log("111 => ".$optiontables);
			}else{
				//
				$mydbtabase = $select1;
				//my_txt_log("222 => ".$optiontables);
			}
			*/
							//echo "upload __construct start <br/>";
		}
		
		public function getEmployees($params, $myvalues) {

			$this->data = $this->getRecords($params, $myvalues);
			echo json_encode($this->data);
			//my_txt_log(json_encode($this->data));
		}
		
		/*
		function insertEmployee($params) {
			$data = array();;
			$sql = "INSERT INTO `"
			. $GLOBALS['mydbtabase']."` ("
			.$GLOBALS['mydblabel_1'].", "
			.$GLOBALS['mydblabel_2'].", "
			.$GLOBALS['mydblabel_3'].", "
			.$GLOBALS['mydblabel_4'].") VALUES('" 
			. $params["new_serial1"] . "', '" 
			. $params["new_Prod_num"] . "','" 
			. $params["new_serial2"] . "','" 
			. $params["new_spec"] . "');  ";
			
			echo $result = mysqli_query($this->conn, $sql) or die("error to insert employee data");
			
		}
		*/
		
		function getRecords($params, $myvalues) {
			//my_txt_log("getRecords in");
			$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;
			
			if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };  
			$start_from = ($page-1) * $rp;
			
			$sql = $sqlRec = $sqlTot = $where = '';
			
			if( !empty($params['searchPhrase']) ) {
				
				$where .=" WHERE ";
				$where .=" ( ".$GLOBALS['mydblabel_1']." LIKE '".$params['searchPhrase']."%' ";    
				$where .=" OR ".$GLOBALS['mydblabel_2']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_3']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_4']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_5']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_6']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_7']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_8']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_9']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_10']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_11']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_12']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_13']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_14']." LIKE '".$params['searchPhrase']."%' ";
				$where .=" OR ".$GLOBALS['mydblabel_15']." LIKE '".$params['searchPhrase']."%' )";
				//$where .=" OR ".$GLOBALS['mydblabel_16']." LIKE '".$params['searchPhrase']."%' ";
				//$where .=" OR ".$GLOBALS['mydblabel_17']." LIKE '".$params['searchPhrase']."%' )";
				
				
				//myvalues 為表單項目 陣列 想寫回圈去處理
				// 用grobal 參數去街, 接進來在拿去用就解了?
				$where .=" WHERE ";	// 啟始
				$where .=" ( ";		//啟始誇號
				//myvalues[0] = if filter, set mcount = 1;
				for($mcount = 1; $mcount < count($myvalues); $mcount++){
					//$outstr = $outstr.$myvalues[$mcount]."\n";
					$where .=$GLOBALS['mydblabel_2']." LIKE '".$params['searchPhrase']."%' ";
					$where .=" OR "; // 下一個也要一起搜尋的欄位條件 開頭
				}
				$where .=" ) ";		//結束括號
				//TODO: 最後印出  直接在MYSQL測試.
				
		   }
		   
		   // my_txt_log("getRecords in");
		   if( !empty($params['sort']) ) {  
				$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
			}
			
			// opk ero  eprogk perg peok  aerfpotsgk aergoer 
			
			// my_txt_log("getRecords in"); 
		    // getting total number records without any search
			//	1.Text Log
			//	Used glogal value.
			//	$mydbtabase;
			
			 if($GLOBALS['job'] == 'get_history'){
				 $sql = "SELECT * FROM `".  $_COOKIE["cookieHistoryName"]."` ";
			 }else{
				 
				 //Error cookieSelectionName :  Undefined index   加入 if notable get db time and set it.
				 
				 if(!isset($_COOKIE["cookieSelectionName"])) {
					setcookie("cookieSelectionName", date('Y-m-d H:i:s'));
					$_COOKIE["cookieSelectionName"] = date('Y-m-d H:i:s');
				}else{
					//my_txt_log($_COOKIE["cookieSelectionName"]);
				}
				 $sql = "SELECT * FROM `".  $_COOKIE["cookieSelectionName"]."` ";
			 }
			
			
			
			
		   
		   
			//	2.Text Log
			//	Used regional value.
			//	$mydbtabase= "employee2";
			//	$sql = "SELECT * FROM `".$mydbtabase."` ";
			
			
			//	3.Text Log
			//	Original Direct CMD value.
			//	$sql = "SELECT * FROM `employee2` ";
			
			
			$sqlTot .= $sql;
			$sqlRec .= $sql;
			
			// my_txt_log("getRecords in 1");
			// concatenate search sql if value exist
			if(isset($where) && $where != '') {

				$sqlTot .= $where;
				$sqlRec .= $where;
			}
			if ($rp!=-1){
				$sqlRec .= " LIMIT ". $start_from .",".$rp;
				//$sqlRec .= "WHERE `製程完成` ='' OR `製程完成` IS NULL LIMIT ". $start_from .",".$rp; //========================= 修改點
			}
			
			// my_txt_log( "INSERT SQL CMD = ".$sql );
			// my_txt_log( "sqlTot CMD = ".$sqlTot );
			
			// my_txt_log("here");
			$qtot = mysqli_query($this->conn, $sqlTot) or die (mysqli_error($connect));
			if(!$qtot) {
				//die("Database query failed: " . mysql_error());
				//my_txt_log("Database query failed: " . mysql_error());
			}
			
			//my_txt_log( "sqlRec CMD = ".$sqlRec );
			
			// my_txt_log("getRecords in 2");
			$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch employees data");
			
			if(!$queryRecords) {
				//die("Database query failed: " . mysql_error());
				//my_txt_log("Database query failed: " . mysql_error());
			}
			// print_r($qtot);	
			// print_r($queryRecords);	
			
			/*
			while($row41  = mysqli_fetch_array($queryRecords))
			{
				$table_field[] = $row41[0];
			}
			foreach ($table_field as $value) {
				my_txt_log( " ".$value );
			}
			*/
					
			while( $row = mysqli_fetch_assoc($queryRecords) ) { 
				$data[] = $row;
			}
			//my_txt_log("getRecords in 3");
			
			
			// 過濾未知錯誤.
			 if(!isset($params['current'])) {
				 return null;
			 }else{
				$json_data = array(
					"current"			=> intval($params['current']), 
					"rowCount"          => 10, 			
					"total"   		 	=> intval($qtot->num_rows),
					"rows"            	=> $data   // total data array
					);
					
				//my_txt_log( json_encode($json_data) );
				return $json_data;
			 }
			
		}
		
		
		function updateEmployee($params) {
			//my_txt_log("updateEmployee in <<<<<<<<<<<<<<<<<<<<<<<");
			$data = array();
			$sql = "Update `".  $_COOKIE["cookieSelectionName"]."` set "
			.$GLOBALS['mydblabel_1']." = '" . $params["edit_label1"]	. "', "
			.$GLOBALS['mydblabel_2']." = '" . $params["edit_label2"]	. "', "
			.$GLOBALS['mydblabel_3']." = '" . $params["edit_label3"]	. "', "
			.$GLOBALS['mydblabel_4']." = '" . $params["edit_label4"]	. "', "
			.$GLOBALS['mydblabel_5']." = '" . $params["edit_label5"]	. "', "
			.$GLOBALS['mydblabel_6']." = '" . $params["edit_label6"]	. "', "
			.$GLOBALS['mydblabel_7']." = '" . $params["edit_label7"]	. "', "
			.$GLOBALS['mydblabel_8']." = '" . $params["edit_label8"]	. "', "
			.$GLOBALS['mydblabel_9']." = '" . $params["edit_label9"]	. "', "
			.$GLOBALS['mydblabel_10']." = '" . $params["edit_label10"]	. "', "
			.$GLOBALS['mydblabel_11']." = '" . $params["edit_label11"]	. "', "
			.$GLOBALS['mydblabel_12']." = '" . $params["edit_label12"]	. "', "
			.$GLOBALS['mydblabel_13']." = '" . $params["edit_label13"]	. "', "
			.$GLOBALS['mydblabel_14']." = '" . $params["edit_label14"]	. "', "
			.$GLOBALS['mydblabel_15']." = '" . $params["edit_label15"]	
			//. "', "
			//.$GLOBALS['mydblabel_14']." = '" . $params["edit_label16"]	. "', "
			//.$GLOBALS['mydblabel_15']." = '" . $params["edit_label17"]	
			. "' WHERE id='"
			.$_POST["edit_id"]."';";
			
			//my_txt_log($sql, "updateEmployee");
			//my_txt_log( "updateEmployee SQL CMD edit_label ".$_POST["edit_id"]." > ".$sql."\n");
			echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
			
			//my_txt_log("1 <<<<<<<<<<<<<<<<<<<<<<<");
			$sql_cmd = "UPDATE tc_mc_control_db_history_dev.updatetime SET uploadTime = NOW() WHERE tid = 1";  // 修改點
			//my_txt_log("2 <<<<<<<<<<<<<<<<<<<<<<<");
				
			mysqli_query($this->conn, $sql_cmd) or die("error to cdbtable wrdatabase data". "<br/>");
			//my_txt_log(" <<<<<<<<<<<<<<<<<<<<<<<");
			//dbtimeupdate();
		}
		
		
		function deleteEmployee($params) {
			$data = array();
			$sql = "delete from `".  $_COOKIE["cookieSelectionName"]."` WHERE id='".$params["id"]."'";
			//my_txt_log( "deleteEmployee SQL CMD ".$sql."\n");
			echo $result = mysqli_query($this->conn, $sql) or die("error to delete employee data");
			
		}
		
		
		function edit2Employee($params) {
			//my_txt_log(">>>>>>>>>> edit2Employee <<<<<<<<<<");
			
			$data = array();

			// Check connection

			$sql = 
			"CREATE TABLE IF NOT EXISTS  ".$params["name"]."(
			id  INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			parent_id INT(11) DEFAULT NULL,
			mynote VARCHAR(250) DEFAULT NULL,
			updatedDate DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			FOREIGN KEY(parent_id) REFERENCES serial_number_specification(id) ON DELETE CASCADE
			) ENGINE = INNODB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; ";
			
			echo $result = mysqli_query($this->conn, $sql) or die("error to delete employee data");
			
			$sql_num = "SELECT * FROM `". $GLOBALS['name']."` ";
			echo $result2 = mysqli_query($this->conn, $sql_num) or die("error to delete employee data");
			
			//my_txt_log( "nunber size = ".$result2."\n");
			if ($result2 < 1){
				$sql2 ="INSERT INTO ".$params["name"]."(parent_id, mynote)VALUES(".$params["id"].",'維修紀錄');";
				echo $result = mysqli_query($this->conn, $sql2) or die("error to delete employee data");
			}
	
			
			//my_txt_log( "edit2Employee SQL CMD ".$sql2."\n");
			mysqli_close($db);// 必須添加 關閉資料庫 新導向分頁才能讀取不同欄位

		}
		
		
		function saveEmployee($params) {
			
			//my_txt_log(">>>>>>>>>> saveEmployee <<<<<<<<<<");
			$data = array();
			
			//my_txt_log(">>>>>>>>>> new <<<<<<<<<<");
			//$log =  "saveEmployee in ."."\n".
			//		"0: ".$params["id"]."\n".
			//		"1: ".$params["action"]."\n".
			//		"2: ".$params["name"]."\n".
			//		"3: ".$params["time"]."\n";
			//my_txt_log($log);
			
			
			$selectLabel1 = $GLOBALS['mydblabel_12'];
			$selectLabel2 = $GLOBALS['mydblabel_14'];
			
			
			//返回一行的 array => 	
			//array 0,id	
			//array 1,createdDate1	
			//array 2,工單編號	
			//array 3,規格	
			//array 4,數量	
			//array 5,客戶	
			//array 6,交期	
			//array 7,工作類別	
			//array 8,工作站	
			//array 9,工作內容	
			//array 10,開始日期	
			//array 12,完成日期	
			//array 10,製程開始
			//array 11,開始人員	
			//array 12,製程完成	
			//array 13,完成人員	
			//array 14,備註
			
			$sql="SELECT * FROM ".  $_COOKIE["cookieSelectionName"]." WHERE id = ".$params["id"]; // 已經指定行 where id
			//返回array 只有 製程開始 一個內容
			//$sql="SELECT ".$selectLabel1." FROM ". $GLOBALS["mydbtabase"]." WHERE id = ".$params["id"]; // 已經指定行 where id
			
			//my_txt_log( "set cmd = ".$sql);
			

			$queryRes=  mysqli_query($this->conn, $sql) or die("error to delete employee data");
			
			if (mysqli_connect_errno())
			{
				//my_txt_log("錯誤");
				//my_txt_log( "Failed to connect to MySQL: " . mysqli_connect_error());
			}
			else{			
				
				//my_txt_log("成功");
				//console.log($queryRes);  
				//$result = mysql_fetch_array($queryRes);
				//$userid = $result["規格"];
				//my_txt_log("sql userid".$userid);

				//mysqli_fetch_assoc(objest) will response a row array u can specified what u want data.
				
				//while( $row = mysqli_fetch_assoc($queryRes) ) {
				$row = mysqli_fetch_assoc($queryRes);
				$data[] = $row;
				if($row[$selectLabel1] == null|""){
					//my_txt_log("製程開始欄位 - sql row 為null 或空值");	
					
					//寫入 製程開始 / 開始人員
					
					$sql_up = 
					"update "
					.$_COOKIE["cookieSelectionName"].
					" set 製程開始 = '"
					.$params["time"].
					"',"
					."開始人員 = '"
					.$params["name"].
					"' where id = '"
					.$params["id"].
					"';";
				}else{
					if($row[$selectLabel2] == null|""){
						//my_txt_log("製程完成欄位 - sql row".$row[$selectLabel1]);	
						
						//寫入 製程完成 / 完成人員
						
						$sql_up = 
						"update "
						.  $_COOKIE["cookieSelectionName"].
						" set 製程完成 = '"
						.$params["time"].
						"',"
						."完成人員 = '"
						.$params["name"].
						"' where id = '"
						.$params["id"].
						"';";
					}else{
						$sql_up ="";
					}
				}

				//my_txt_log("sql CMD = ".$sql_up);	
				$result = mysqli_query($this->conn, $sql_up) or die("!!!!!error to wdb INSERT TABLE !!!!!<br/>");
				if($result == 1){
					//echo "write db success" . "<br/>";
					// Associative array
					//$row=mysqli_fetch_assoc($result);
					//printf ("%s (%s)\n",$row["工單編號"],$row["Age"]);
				}
			}
			//my_txt_log("sql Response".$result);

			//my_txt_log("sql Response".$userid);
			
			//while( $row = mysqli_fetch_assoc($result) ) { 
			//	$data[] = $row;
			//}
			

			//if($result)
			//$row=mysql_fetch_array($result));
			//my_txt_log( "mysql_fetch_array = ".$row);
			
			//	my_txt_log( "製程開始 = ".$db_name);
			
			//if($input_name==$db_name){
			//	my_txt_log( $input_name."已被使用");
			//}else{
			//	my_txt_log( $input_name."可以使用");
			//}
			
			
			//判斷 開始時間以及結束時間.
			// if 開始時間 為'' 或是null NULL 表是開始, 將時間寫入 以及人員寫入 
			// else 表示工作完成, 將時間寫入 以及人員寫入.
			//$params = null;
			return "success";
		}
		
		function tableupdateEmployee(){
			
			//my_txt_log("tableupdateEmployee in ..");
			//MySQL table update
			
			require_once ("connection/connection_updatelist.php"); //updatelist connection
			$upListdb = new dbupListObj();
			
			$connTimeString =  $upListdb->getConnstring();

			//get db system time; 
			$sql_time_cmd = "SELECT CURDATE()";
			$recordtime4 = mysqli_query($connTimeString, $sql_time_cmd);
			
			$sql_time_cmd = "SELECT uploadTime FROM tc_mc_control_db_history_dev.updatetime WHERE tid = 1;";
			
			//my_txt_log($sql_time_cmd);
			$result = mysqli_query($this->conn, $sql_time_cmd) or die("error to update employee data");
			
			
			$rows = array();
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
			
			//Return result to jTable
			
			$qryResult = array();
			$qryResult['Status'] = $rows;
			
			//$qryResult = array($rows);
			//echo json_encode($qryResult);
			echo json_encode($qryResult);
			
			mysqli_close($this->conn);
	 
		}
		
		
		//更新修改位置
		
		function edit2recordEmployee($params) {
			//my_txt_log("edit2recordEmployee in <<<<<<<<<<<<<<<<<<<<<<<");
			
			$data = array();
			$sql = "Update `".  $_COOKIE["cookieSelectionName"]."` set "
			.$GLOBALS['mydblabel_1']." = '" . $params["edit_label1"]	. "', "
			.$GLOBALS['mydblabel_2']." = '" . $params["edit_label2"]	. "', "
			.$GLOBALS['mydblabel_3']." = '" . $params["edit_label3"]	. "', "
			.$GLOBALS['mydblabel_4']." = '" . $params["edit_label4"]	. "', "
			.$GLOBALS['mydblabel_5']." = '" . $params["edit_label5"]	. "', "
			.$GLOBALS['mydblabel_6']." = '" . $params["edit_label6"]	. "', "
			.$GLOBALS['mydblabel_7']." = '" . $params["edit_label7"]	. "', "
			.$GLOBALS['mydblabel_8']." = '" . $params["edit_label8"]	. "', "
			.$GLOBALS['mydblabel_9']." = '" . $params["edit_label9"]	. "', "
			.$GLOBALS['mydblabel_10']." = '" . $params["edit_label10"]	. "', "
			.$GLOBALS['mydblabel_11']." = '" . $params["edit_label11"]	. "', "
			.$GLOBALS['mydblabel_12']." = '" . $params["edit_label12"]	. "', "
			.$GLOBALS['mydblabel_13']." = '" . $params["edit_label13"]	. "', "
			.$GLOBALS['mydblabel_14']." = '" . $params["edit_label14"]	. "', "
			.$GLOBALS['mydblabel_15']." = '" . $params["edit_label15"]	. "' WHERE id='"
			.$_POST["edit_id"]."';";
			
			//my_txt_log( "updateEmployee SQL CMD edit_label ".$_POST["edit_id"]." > ".$sql."\n");
			mysqli_query($this->conn, $sql) or die("error to update employee data");
			//判斷 開始時間以及結束時間.
			// if 開始時間 為'' 或是null NULL 表是開始, 將時間寫入 以及人員寫入 
			// else 表示工作完成, 將時間寫入 以及人員寫入.
			
		}

		// Set new time that some data update, when there is update.
		
		function setUpdateTime(){
			$sql_time_cmd = "SELECT NOW()";
			$recordtime = mysqli_query($connTimeString, $sql_time_cmd);
			
			//$sql_cmd = "INSERT INTO `updatetime` FROM  tc_mc_control_db_dev (`tid`,`uploadTime`)	VALUES( 0,STR_TO_DATE('".$recordtime4."', '%Y-%m-%d') )";

			//$sql_cmd = "INSERT history SELECT * FROM  tc_mc_control_db_dev.".$value." WHERE tid = 0";
			$sql_cmd ="update tc_mc_control_db_dev.updatetime set uploadTime = ".STR_TO_DATE($recordtime, "%Y-%m-%d %h-%i-%s")." where tid='0'";
			//my_txt_log("setUpdateTime: "+$sql_cmd);
				
			mysqli_query($connTimeString, $sql_cmd); // successh
		}
		
		//
		
		function updatListJob($params) {
			//	active : 
			//	1. GET DB SYSTEM TIME  >>$sql="SELECT CURDATE()";
			//	2. GET TABLE label_time , verification withj   label_time-SYSTEM TIME > 12;
			//	3. for each all table all laebel 
			//	4. 直接比對時間, 若不同, 執行表單更新.
			//	my_txt_log("更新 in");

			
			//my_txt_log("use cookie = ".$_COOKIE["cookieSelectionName"]."<br/>");
			require_once ("connection/connection_updatelist.php"); //updatelist connection
			$upListdb = new dbupListObj();
			
			$connTimeString =  $upListdb->getConnstring();

			// (1.) get mysql system time; 
			$sql_time_cmd = "SELECT CURDATE()";
			$recordtime4 = mysqli_query($connTimeString, $sql_time_cmd);
			 while ($row = mysqli_fetch_assoc($recordtime4))
			 {
				 $thisday = $row['CURDATE()'];
			 }
			 
			// (2.)get mysql table archiving time data
			$sql_gettime_cmd = "SELECT uploadTime FROM updatetime";
			$recordtime5 = mysqli_query($connTimeString, $sql_gettime_cmd);

			 while ($row = mysqli_fetch_assoc($recordtime5))
			 {
				 $table_today = $row['uploadTime'];
			 }
			
			//my_txt_log($table_today);
			//my_txt_log($thisday);
			if($table_today === '' ){
				//my_txt_log("初始化, 無內容, insert: ");
					
				//"INSERT INTO `updatetime` (`tid`,`uploadTime`)	VALUES( 0,'".$thisday."')";
				//"INSERT INTO `updatetime` (`tid`,`uploadTime`)	VALUES( 0,STR_TO_DATE("2018-06-06", '%Y-%m-%d') )"  < 要這樣才能寫入.
				$sql_cmd = "INSERT INTO `updatetime` (`tid`,`uploadTime`)	VALUES( 0,STR_TO_DATE('".$thisday."', '%Y-%m-%d') )";
				//my_txt_log("sql_cmd: "+$sql_cmd);
				
				mysqli_query($connTimeString, $sql_cmd); // success
				
				//my_txt_log("初始化 完成");
			}else if(strtotime($thisday)== strtotime($table_today)){
				//my_txt_log("未過期  同一天");
				return;
			}else{
				
				/*
				
				TODO: 修改存檔路徑. 已知錯誤 Duplicate entry for key 'PRIMARY' php, 無法寫入重複的 PRIMARY KEY position.
				
				*/
				
				//my_txt_log("需 要 更 新 基 礎 時 間 日 期 不 同 步");
				
				 // 驗證上傳項目 逐項檢驗

				require_once  ("connection/mcconnection.php");  //tc_mc_control_db_dev  表示清單位置
				$mcdb = new dbmcObj();
				$mcconnString =  $mcdb->getConnstring(0);
				$mcquery = "SHOW TABLES";
				$mcresult1 = mysqli_query($mcconnString, $mcquery);  // 修改點--------------- change accessed pointof DB as tc_mc_control_dx.
				
				// 陣列封裝 // 看有沒有更簡單的寫法
				while($row3  = mysqli_fetch_array($mcresult1))
				{
					$list_table_ary[] = $row3[0];
					//	my_txt_log($row3[0]);
				}
		
				//	$mcresult1 >>> release nemory
				//	my_txt_log("array count = ".count($list_table_ary));

				foreach ($list_table_ary as $table_name) {
					//	echo "table_name: $table_name";
					//	my_txt_log($table_name);
					$Field_name_od_day = "製程完成";
					$sql_cmd = "SELECT ".$Field_name_od_day." FROM ".$table_name; //驗證 "製程完成" 欄位(Field)	
					//my_txt_log("sql_cmd: "+$sql_cmd);
					$mcresult2 = mysqli_query($mcconnString, $sql_cmd);				
					//陣列封裝
					while($row4  = mysqli_fetch_array($mcresult2))
					{
						$table_field[] = $row4[0];
						//	my_txt_log($row3[0]);
					}
					
					//my_txt_log("Table where ?     ".$table_name." count = ".count($table_field));
					
					$Erase_fields = 0;
					$resert_id = FALSE;
					//$intProcess = 0;
					//foreach ($table_field as $value2) {
						//my_txt_log("測試點1"+$value2);
					for ($intProcess = 0; $intProcess< count($table_field); $intProcess = $intProcess+1) {
						$value2 = $table_field[$intProcess];
						
						//my_txt_log("value2 : "+$value2);
						
						if($value2 == $thisday){
							//my_txt_log("同日 value2 : "+$value2); //未過期
						}else if($value2 == ''|$value2 == null){
							//my_txt_log("工序生產中結束 免處理 value2 : "+$value2);
						}else{
							//my_txt_log("過期, 請處理");// 現場表單每一項的  製造完成  時間, 如果不為 NULL/0 與  tc_mc_control_db_history_dev.updatetime 比對後不相同為 "過期".  
							$resert_id = TRUE;
							$Erase_fields = $Erase_fields +1;
							//重新編輯原來的table
							$value2_stripos = stripos($value2,"/");
			
			
							
							$sql_cmd = "SHOW TABLES";
							//my_txt_log("sql_cmd ".$sql_cmd);
							$record_table = mysqli_query($connTimeString, $sql_cmd);
							
							//TODO:
							//1. Check if MySQL table exists or not [duplicate]
							//2. COPY 此欄位.
							//3. Delete from 原欄位.
							
							//require_once ("connection/mcconnection.php");
							require_once ("connection/historyconn.php");
							$db_his_fx_obj = new dbhisObj();
							$db_his_fx =  $db_his_fx_obj->getConnstring(1);
							
							// CREATE
							
							$sql_cmd = "SHOW TABLES LIKE 'tc_mc_control_dx.".$table_name."'";
							//my_txt_log("sql_cmd ".$sql_cmd);
							if (mysqli_query($db_his_fx, $sql_cmd))
							{
								// "Table exists";
								// TODO: Create tc_mc_control_dx.Table;
								// CREATE TABLE new_table LIKE old_table;
								// $sql_cmd = "INSERT tc_mc_control_dx.".$table_name." SELECT * FROM  tc_mc_control_dx.".$table_name." WHERE ".$Field_name_od_day." = '".$value2."'";
								$sql_cmd = "CREATE TABLE tc_mc_control_dx.".$table_name." LIKE tc_mc_control_db_dev.".$table_name;
								//my_txt_log("sql_cmd ".$sql_cmd);
								$record_table = mysqli_query($db_his_fx, $sql_cmd);
							}
							else 
							{
								// "Table does not exist";
								//my_txt_log("Table does not exist");
							}
							
							// INSERT
							
							// DB NAME tc_mc_control_dx SEE connection/mcconnection.php
							$sql_cmd = "INSERT tc_mc_control_dx.".$table_name." SELECT * FROM  tc_mc_control_db_dev.".$table_name." WHERE ".$Field_name_od_day." = '".$value2."'";
							my_txt_log("sql_cmd ".$sql_cmd);
							$record_table = mysqli_query($db_his_fx, $sql_cmd);
							
							
							require_once ("connection/mcconnection.php");
							$db_his_fx_obj = new dbhisObj();
							$db_his_fx =  $db_his_fx_obj->getConnstring();
							//$record_table = mysqli_query($db_his_fx, $sql_cmd);	// 原本是統一存檔, 現在要分開顯示.

							//3. Delete RowDATA from old table
							//$sql_cmd = DELETE FROM `history` WHERE `history`.`id` = 1;
							$sql_cmd2 = "DELETE FROM ".$table_name." WHERE ".$Field_name_od_day." = '".$value2."'";
							//my_txt_log("sql_cmd ".$sql_cmd2);
							
							
							// DELETE Old Table file
							mysqli_query($mcconnString, $sql_cmd2);		// 到這一步有成功刪除 但是黴也寫回資料庫   很奇怪...// 前面工作也太爽  整天都在聊天
	
						}
					}

					//my_txt_log("各表單 - 重新排序"); // 寫法有問題, 資料越多越慢, 請參考線性代數.
					if($resert_id){
						//各表單 - 重新排序
						$sql_cmd = "ALTER TABLE ".$_COOKIE["cookieSelectionName"]." DROP id";
						//my_txt_log("sql_cmd ".$sql_cmd);
						mysqli_query($mcconnString, $sql_cmd);
						
						$sql_cmd = "ALTER TABLE ".$_COOKIE["cookieSelectionName"]." ADD `id` MEDIUMINT( 11 ) NOT NULL FIRST";
						//my_txt_log("sql_cmd ".$sql_cmd);
						mysqli_query($mcconnString, $sql_cmd);
						
						$sql_cmd = "ALTER TABLE ".$_COOKIE["cookieSelectionName"]." MODIFY COLUMN `id` MEDIUMINT( 8 ) NOT NULL AUTO_INCREMENT,ADD PRIMARY KEY(id)";
						//my_txt_log("sql_cmd ".$sql_cmd);
						mysqli_query($mcconnString, $sql_cmd);
						$resert_id = FALSE;
					}

					//	Delete table ================================================================================== 若表單空直將刪除.
					if((count($table_field)-$Erase_fields) == 0 ){
						//$sql_cmd =DROP TABLE $_COOKIE["cookieSelectionName"] ;
						$sql_cmd = "DROP TABLE ".$_COOKIE["cookieSelectionName"];
						//my_txt_log("sql_cmd ".$sql_cmd);
						mysqli_query($mcconnString, $sql_cmd);
						
						//my_txt_log("Unsetcookie STAR");
						//session_start();   //  Notice:  A session had already been started - ignoring session_start();
						$cookie_name = "cookieSelectionName";
						unset($_COOKIE[$cookie_name]);
						// empty $_COOKIE["cookieSelectionName"] and expiration one hour before
						setcookie($cookie_name, '', 1);
						//my_txt_log("setcookie '' END");
					}
					
					$table_field = null;
					unset($table_field);
				}
				
				//	release memory ===================================================================================== 測試釋放記憶體.
				
				
				//BUG fix 修改 table_name 去讀取cookie 
				
				
				//tc_mc_control_dx.$table_name - 重新排序
				$sql_cmd = "ALTER TABLE `tc_mc_control_dx`".$_COOKIE["cookieSelectionName"]." DROP id";
				mysqli_query($connTimeString, $sql_cmd);
				my_txt_log("$sql_cmd - 重新排序1");
				$sql_cmd = "ALTER TABLE `tc_mc_control_dx`".$_COOKIE["cookieSelectionName"]." ADD `id` MEDIUMINT( 11 ) NOT NULL FIRST";
				mysqli_query($connTimeString, $sql_cmd);
				my_txt_log("$sql_cmd - 重新排序2");
				$sql_cmd = "ALTER TABLE `tc_mc_control_dx`".$_COOKIE["cookieSelectionName"]." MODIFY COLUMN `id` MEDIUMINT( 8 ) NOT NULL AUTO_INCREMENT,ADD PRIMARY KEY(id)";
				mysqli_query($connTimeString, $sql_cmd);
				my_txt_log("$sql_cmd - 重新排序3");
				
				//updatetime - 更新
				//Eield =>'uploadTime'
				//my_txt_log($table_today);
				//my_txt_log($thisday);
				
				$sql_cmd = "UPDATE `updatetime` SET `uploadTime` = STR_TO_DATE('".$thisday."', '%Y-%m-%d') WHERE `tid` = 0";//tid` = 0 位置用於驗證表單顯是隔一天更新
				//my_txt_log($sql_cmd);
				mysqli_query($connTimeString, $sql_cmd);
				
			}
			
			$list_table_ary = null;
			unset($list_table_ary);
			//mysqli_close($connupdateTime);	
			
			//dbtimeupdate();
		}
		
		function dbtimeupdate(){
			// 設定更新時間.
			$db = new dbmcObj();
			//DB connection
			$connString =  $db->getConnstring();
			$obj = new setDBDpdate($connString);
			$cmdparam = "";
			
			$obj->setDatabaseDpdate($cmdparam);  
		}
		
	}
	
	class setDBDpdate{
		
			protected $conn;
			protected $data = array();
			protected $table_row_array;
			function __construct($connString) {
				$this->conn = $connString;
			}
			function __destruct(){
				
			}
			function setDatabaseDpdate($sql_cmd){
				
				//my_txt_log("setDBDpdate");
				//echo "set_table_autotime into";
				//TODO:   get db time and update 
				//$sql_cmd  = "SELECT NOW()";
				
				//ddresponse.php setUpdateTime();   /// 思考 ddresponse.php 是否統一 db command set.
				
				//$date = date('Y-m-d H:i:s');
			
				$sql_cmd = "UPDATE tc_mc_control_db_history_dev.updatetime SET uploadTime = NOW() WHERE tid = 1";  // 修改點
				
				$result = mysqli_query($this->conn, $sql_cmd) or die("error to cdbtable wrdatabase data". "<br/>");
			}
		}
?> 
	