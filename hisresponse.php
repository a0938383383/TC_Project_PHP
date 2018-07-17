<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	
	
	require_once ("connection/historyconn.php");
	$db_his = new dbhisObj();
	
	/*
	require_once ("connection/mcconnection.php");
	$db_his = new dbmcObj();
	*/

	$connString =  $db_his->getConnstring();
	session_start();
	$params = array_merge($_GET, $_POST);	// record all reference.
	$myvalues = "";

	//mysqli_close($connString);
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
		 
		 default:	
			//my_txt_log( "default in\n" );
			$empCls->getEmployees($params, $myvalues);
		 return;
	}
	
	function my_txt_log( $datastr )
	{
		$myfile = fopen("D:/aaa.txt", "a+") or die("Unable to open file!");
		//$string = fread($myfile,filesize("D:/aaa.txt"));
		$string .= date("Y/m/d")."";
		$string .= date("h:i:sa")."==>";
		//$myfile = fopen("D:/aaa.txt", "w") or die("Unable to open file!");
		fwrite($myfile, $string.$datastr."\n");
		fclose($myfile);
	}

	// main view
	class Employee {
		protected $conn;
		protected $data = array();
		
		function __construct($connString) {
			$this->conn = $connString;
		}
		
		function __destruct() {
		}
		
		public function getEmployees($params, $myvalues) {
			
			$this->data = $this->getRecords($params, $myvalues);
			
			$re_json_data = array();
			$re_json_data = $this->data;
			echo json_encode ($re_json_data,JSON_HEX_TAG);
			 
			//echo $_GET['callback']."(".json_encode($this->data).")";
			

			//echo json_encode($this->data, JSON_UNESCAPED_UNICODE );
			
			
			/*
			echo json_encode ($this->data);
			//echo $this->data;
			my_txt_log(json_encode($this->data));//------------------------------Logo.
			*/

			/*
			$myfile = fopen("D:/aaa.txt", "a+") or die("Unable to open file!");
			//$string = fread($myfile,filesize("D:/aaa.txt"));
			$string .= date("Y/m/d")."";
			$string .= date("h:i:sa")."==>";
			//$myfile = fopen("D:/aaa.txt", "w") or die("Unable to open file!");
			fwrite($myfile, $string.json_encode($this->data)."\n");
			fclose($myfile);
			*/
		}
		
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
				
				$where .=" WHERE ";	// 啟始
				$where .=" ( ";		//啟始誇號
				//myvalues[0] = if filter, set mcount = 1;
				for($mcount = 1; $mcount < count($myvalues); $mcount++){
					$outstr = $outstr.$myvalues[$mcount]."\n";
					$where .=$GLOBALS['mydblabel_2']." LIKE '".$params['searchPhrase']."%' ";
					$where .=" OR "; // 下一個也要一起搜尋的欄位條件 開頭
				}
				$where .=" ) ";		//結束括號
		   }
		   
		    if( !empty($params['sort']) ) {  
				$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
			}
			$sql = "SELECT * FROM `".  $_COOKIE["cookieHistoryName"]."` ";
			$sqlTot .= $sql;
			$sqlRec .= $sql;
			if(isset($where) && $where != '') {
				$sqlTot .= $where;
				$sqlRec .= $where;
			}
			
			//**sample** SELECT * FROM `tablename` WHERE `製程完成` <>"" LIMIT 0,10
			
			if ($rp!=-1){
				$sqlRec .= " LIMIT ". $start_from .",".$rp;
				//$sqlRec .= "WHERE `製程完成` <>'' OR `製程完成` IS NOT NULL LIMIT ". $start_from .",".$rp;
			}
			$qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot employees data");
			
			//my_txt_log( "sqlTot CMD = ".$sqlTot );
			
			if(!$qtot) {
				die("Database query failed: " . mysql_error());
			}
			
			//my_txt_log( "sqlRec CMD = ".$sqlRec );
			$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch employees data");
			
			if(!$queryRecords) {
				//die("Database query failed: " . mysql_error());
				//my_txt_log("Database query failed: " . mysql_error());
			}
			
			while( $row = mysqli_fetch_assoc($queryRecords) ) { 
				$data[] = $row;
			}
			
			$json_data = array(
				"current"			=> intval($params['current']), 
				"rowCount"          => 10, 			
				"total"   		 	=> intval($qtot->num_rows),
				"rows"            	=> $data
				);
				
			//$json_data = array_filter($json_data);
			//my_txt_log(json_encode($json_data));
			//return $json_data.replace(/\n/g,"\\n")
			return $json_data;
			
		}
	}
	
?>


