<?php
/* TEXT MESSAGE*/
	//phpinfo();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
	//人員管理
	require ("connipconf.php");
	
	function delFile($dirName,$delSelf=false){
		if(file_exists($dirName) && $handle = opendir($dirName)){
			while(false !==($item = readdir( $handle))){
				if($item != '.' && $item != '..'){
					if(file_exists($dirName.'/'.$item) && is_dir($dirName.'/'.$item)){
						delFile($dirName.'/'.$item);
					}else{
						if(!unlink($dirName.'/'.$item)){
							return false;
						}
					}
				}
			}
			closedir($handle);
			if($delSelf){
				if(!rmdir($dirName)){
					return false;
				}
			}
		}else{
			return false;
		}
		return true;
	}
	
	
	// 技術考核, 若通過則技術加薪, 並發於獎金, 若犯錯, 需要重新考核, (扣除技術加薪)
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!--
	<meta http-equiv="refresh" content="20; url=upload.php"> 
	-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>上傳多重檔案</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	
	
	
</head>
<body>
	<!--
		<link href="tt.css" media="all" type="text/css">
	-->
	<link href="dist/bootstrap.min.css" media="all" rel="stylesheet" type="text/css">
	<link href="dist/jquery.bootgrid.css" rel="stylesheet">
	
	<script src="dist/jquery-1.11.1.min.js">
	</script> 
	<script src="dist/bootstrap.min.js">
	</script> 
	<script src="dist/jquery.bootgrid.min.js">
	</script>
	

	<!--//----------------------------------------------->

	<!--<form action="mymain" id="main_grid">-->
	<form action="mymain">
		<div class="container" >
			<div class="col-sm-60">
				<!--<hr>換行-->		
				<div class="col-sm-12">
					<!--<p>Label_1</p>-->
					<div class="well clearfix">
						<h1><b><span style="color:orange;">大昶貿易股份有限公司 TAI CHONG CO .,LTD.</span></b></h1>
								<h1><b><span style="color:#008866;">單位排程回報項目</span></b></h1>
								<hr>
						<!-- enctype=”multipart/form-data” 把上傳的檔案編成表單的資料 -->
						<form action="upload.php" method="post" enctype="multipart/form-data" name="uploadForm" id="uploadForm">

						<li>
							<b>
							1. <a href="http://<?=$serverhostip?><?=$serverfolder?><?=$count1?> " > 生管-單位工作清單</a>
							</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>
							
							2. <a href="http://<?=$serverhostip?><?=$serverfolder?><?=$count2?> " > 現場-單位工作清單</a>
							</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>
							
							3. <a href="http://<?=$serverhostip?><?=$serverfolder?><?=$count3?> " > 歷史資料ˇ</a>
							</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>
							
							4. <a href="http://<?=$serverhostip?><?=$serverfolder?><?=$count4?> " > 生管-現場人員管理</a>
							</b>
							
						</li>

						</form>
					</div>
				</div>
			</div>
		</div>
	</form>
	
	<div class="wrap">
		
	<?php
		$remkdirFileFolder = getcwd() . "\\" . "unzips";
		delFile($remkdirFileFolder);

	/**
		
		>>>>>>>>>>>>>>>>>>>> 待處理項目 <<<<<<<<<<<<<<<<<<<<
		
		新增 上傳檔案,	(完成)
		
		刪除 不成功或失敗,刪除資料夾內部檔案, 所以將,上傳檔案以及解壓縮檔案全數刪除.
		
		疑問? 資料庫內工作項目區別.
		
		sql or code 新增程式 重複寫入功能.
		
		
		0. 設計目的, 清單化【每日】單位工作清單, 生管依每日完成進度追蹤,
		1. 判斷是否想同檔案, 不餘以上傳重複, 
		2. 寫入工作列表清單
	*/
		static $consol_message = false;// debug message;
		
		require("unzip.php");
		require("connection/mcconnection.php");
		
		// 上傳檔將存入此路徑裡的 uploads 資料夾
		$upload_dir = "uploads/";
		$upload_dir2 = "temp/";
		// 上傳檔總數
		
		//TODO Check $_FILES
		//$total_uploads = count($_FILES['file']['name']);
		$total_uploads =14;//<-----------------------------------------------------處理數量
		if($consol_message)
			echo "檔案數量: " . $total_uploads . "<br/>";
		// 上傳檔大小限制，此處限制為400KB
		$size_bytes =400 * 1024;
		// 副檔名限制
		$limitedext = array(".odt",".ODT",".ods",".ODS");
		if($consol_message)
			echo "<h3>上傳結果</h3>";
		// 用迴圈讀取上傳項目資料
		
			echo " ------<br/>";
			echo "<b> 檔案載入 </b><br/>";
			echo " ------------------------------------------------------------------------------------"."<br/>";
		for ($i = 0; $i < $total_uploads; $i++) {
			//echo " 項目 " .$i;
			echo " <div><b><font color='black'>"." 項目 " .$i."</font></b><br/></div>";
		    $new_file = $_FILES['file'.$i];
		    // 讀取上傳檔名
		    $file_name = $new_file['name'];
		   
		   if(empty($file_name)){
				//echo "<br/>";
				//echo " 無上傳檔案 "."<br/>";
				echo " <b><font color='black'>"." → 無上傳檔案"."</font></b> <br/>";
				echo " ------------------------------------------------------------------------------------"."<br/>";
				continue;
		   }else{
			   if($consol_message){
				echo "$file_name  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>" . $file_name . "<br/>";
				echo "------<br/>";
				echo "cdbtable   file_name" . $file_name . "<br/>";
				echo "------<br/>";
			   }
			   
				// 用 strripos 查找'.' 第一次出現的位置
				/*
				if (false !== $pos = strripos($nameFile, '.')) { 
					$storenameFile = substr($nameFile, 0, $pos);
					if(consol_message)
					echo "filter file Attached name final to " . $storenameFile. "<br/>";
				}
				*/
				//TODO: CREATE TABLE
				$db = new dbmcObj();
				//DB connection
				$connString =  $db->getConnstring(0);
				// class initilization
				$wrdbCls = new wrdatabase($connString);
				$wrdbCls->cdbtable($file_name);
				
			
			   // 把檔名中的空格替換成 "_"  ---------------------------------------------------------------------------------< 去除空白
			   $file_name = str_replace(' ', '_', $file_name);
			   // 存入暫存區的檔名
			   
			   $file_tmp = $new_file['tmp_name'];
			   if($consol_message)
			   echo $file_tmp."<br />";
			   // 檔案大小
			   $file_size = $new_file['size'];
			   // 判斷項目是否指定上傳檔案…
			   if (!is_uploaded_file($file_tmp)) {
					// 沒有上傳檔，顯示訊息。
					echo "項目 $i: 沒有選取上傳檔案。"."<br />";
			   }else{
				// 若有上傳檔，則取出該檔案的副檔名
				 $ext = strrchr($file_name,'.');
				 
				 // 判斷副檔名是否符合預期
				 if (!in_array(strtolower($ext),$limitedext)) {
					// 不符合預期，顯示錯誤訊息。
					echo "項目 $i: ($file_name) 的檔案副檔名有誤（只允許odt/ODT、ods/ODS 檔）"."<br />";
				 }else{
					// 檢查檔案是否太大
				   if ($file_size > $size_bytes){
					   echo "項目 $i: ($file_name) 無法上傳，請檢查檔案是否小於 ". $size_bytes / 1024 ." KB。"."<br />";
				   }else{
					   try{
						   //echo $upload_dir.$file_name."<-----------------------------------------br />";
					   //if(move_uploaded_file($_FILES['fileField']['tmp_name'],iconv("UTF-8", "big5", $target_path )))
					   //if (move_uploaded_file($file_tmp,iconv("UTF-8", "big5", $upload_dir.$file_name ))) {
					   if (move_uploaded_file($file_tmp,iconv("UTF-8", "big5", $upload_dir.$file_name ))) {
						   
						   //$upload_dir3 = "temp.".$ext;
						   //if (rename($file_tmp,iconv("UTF-8", "big5", $upload_dir.$upload_dir2.$upload_dir3 ))) {
							   
						   //}
					   //if (move_uploaded_file($file_tmp,$upload_dir.$file_name)) {
							//echo " → $file_name  >>> 上傳完成 <<<"."<br />";
							echo " <b><font color='mediumblue'>"." → $file_name  【上傳完成 】"."</font></b> <br/>";

							$unzip = new ZipArchive;
							//$out = $unzip->open('file-name.zip');
							if($consol_message)
							echo "file name: " . $file_name. "<br/>";
							$dest = "uploads/" . $file_name;
							$dest2 = 'uploads/"' . $file_name;
							
						}else{
							echo " 項目 $i: 無上傳。<br />";
							continue;
						}
							
							//$dest = 'uploads/備料區磨料機1.ods'; // <<<< 試看看
							if($consol_message)
							echo "unzip file root ". $dest. "<br/>";
							//$out = $unzip->open($dest);
							
							$out = $unzip->open(iconv("UTF-8", "big5", $upload_dir.$file_name ));
							
							if($consol_message)
							echo "unzip open func".$upload_dir.$file_name. "<br/>";//-------- 輸出測試
							$filepath = "";
							if ($out === TRUE) {
								$storenameFile = "";// 過濾附檔名稱
						
								if (false !== $pos = strripos($file_name, '.')) {
									$storenameFile = substr($file_name, 0, $pos);
									if($consol_message)
									echo "filter file Attached name final to " . $storenameFile. "<br/>";
									
								}else{
									echo "Can not filter file symbol(.) " . $storenameFile. "<br/>";
								}
								$zipFileName ="unzips" . "\\" . $storenameFile;//-----------------------------集中至unzips資料夾
								if(file_exists($zipFileName)){
									
								}else{
									if($consol_message)
									echo "路徑>>> ".$zipFileName;
									//mkdir($zipFileName);// create data
									//mkdir(iconv("UTF-8", "big5", $zipFileName ));// create data
									
									if (!file_exists(iconv("UTF-8", "big5", $zipFileName ))) {
										mkdir(iconv("UTF-8", "big5", $zipFileName ));
									}
								}
								
								//$filepath = getcwd() . "\\" . "unzips" .  "\\" . $zipFileName;
								$filepath = getcwd() . "\\" . $zipFileName;
								//$unzip->extractTo($filepath);
								$unzip->extractTo(iconv("UTF-8", "big5", $filepath ));
								
								if($consol_message)
								echo "unzip extractTo func".$filepath. "<br/>";//-------- 輸出測試
								$unzip->close();
								//echo ' File unzipped ';
								echo " <b><font color='mediumblue'>"." →  File unzipped "."</font></b>";
								
								
								$filternameFile = "Object 1";
								$filename1 = $filepath.'\\'.$filternameFile;
								if($consol_message)
								echo $filename1;
								
								//找尋解壓縮 檔案階層... ods 與 odt 不同. 
								//TODO: 多個 Sheet 會在不同 Object 1/ Object 2/ Object 3/ Object 4/  下, 需不需要多加個迴圈去判斷. 
								$filename = "";
								if(is_dir(iconv("UTF-8", "big5", $filename1 ))){
									//echo ' 解析檔案類型 mode-1' . "<br/>"; //加料過（clac to odt filel會多一層）, 在Object 1 下面
									echo " <b><font color='mediumblue'>"." 解析檔案類型 mode-1"."</font></b><br/>";
									$filename = $filename1."\\"."content.xml" ;
									//echo $filename . "---------------------------<br/>";
								}else if(is_dir(iconv("UTF-8", "big5", $filepath ))){
									//echo ' 解析檔案類型 mode-2' . "<br/>";
									echo " <b><font color='mediumblue'>"." 解析檔案類型 mode-2"."</font></b><br/>";
									$filename = $filepath."\\"."content.xml" ;
									//echo $filename . "---------------------------<br/>";
								}else{
									echo ' 檔案不存在 ' . "<br/>";
									break;
								}
								echo "------------------------------------------------------------------------------------"."<br/>";
								if($filename == ""){
									echo ' 空值返回 ' . "<br/>";
									break;
								}else{
									if($consol_message)
									echo "------------------------------<br/>";
									if($consol_message)
									echo '項目 '.$i.': file upload & unzip End ' . "<br/>";
									if($consol_message)
									echo "------------------------------<br/>";
									if($consol_message)
									echo '> file dataization star <' . "<br/>";
									fileparser($storenameFile, $filename);// call function
								}
								
							} else {
								echo 'Something went wrong?';
								//break;
							}
					   }
					   catch(Exception $e)
					   {
							echo "檔案覆蓋錯誤". "<br/>";
							echo 'Message: ' .$e->getMessage();
					   }
				   }
				 }
			   }
			   
			    // 設定更新時間.
				dbtimeupdate();
		   }
		}//for end
		
		
		echo " ------<br/>";
		echo " <b><font color='black'>進程結束</font></b> <br/>";
		echo " ------<br/>";
		
		
		function del_directory_file($directory){
			if (is_dir($directory) == false){
				exit("The Directory Is Not Exist!");
			}
			
			$handle = opendir($directory);
			
			while (($file = readdir($handle)) !== false){
				if ($file != "." && $file != ".." && is_file("$directory/$file")){
					unlink("$directory/$file");
				}
			}
			closedir($handle);
		}

		function dbtimeupdate(){
			// 設定更新時間.
			$db = new dbmcObj();
			//DB connection
			$connString =  $db->getConnstring(0);
			$obj = new setDBDpdate($connString);
			$cmdparam = "";
			
			$obj->setDatabaseDpdate($cmdparam);  
		}
		
		
		function fileparser($mfilename , $str_filename){
			
			global $consol_message;
			
			if($consol_message)
			echo ' fileparser in ' . "<br/>";
			if($consol_message)
			echo "search" . $str_filename . "<br/>";
			/*
			$fp = fopen($str_filename, "r");
			$content = fread($fp, filesize($str_filename));
			$lines = explode("\n", $content);
			fclose($fp);
			print_r($lines);	
			*/
			$reader = new XMLReader();
			if (!$reader->open(iconv("UTF-8", "big5", $str_filename ))) die("Failed to open". $str_filename);
				// step through text:h and text:p elements to put them into an array
				$TotalCount = 0;
				$LabelCount = 0;
				$QuantityCount = 0;
				$lbarray = array();
				
				//print_r($lbarray);
				
			while ($reader->read()){
				/*
				if($reader->nodeType == XMLReader::ELEMENT){   
					$nodeName = $reader->name;  
					echo $nodeName."</br>";
				}   
				*/
				//$TotalCount = $TotalCount+1;
				//$LabelCount = $LabelCount++;
				//$QuantityCount = $QuantityCount++;
				
				// 第一層
				/*
				if ($reader->nodeType == XMLREADER::ELEMENT && ($reader->name === 'table:table')) { 
					echo "--------------------------------------table--------------------------------------" ."</br>";
					echo $reader->expand()->textContent ."</br>"; // Put the text into array in correct order...
				}
				*/
				if ($reader->nodeType == XMLREADER::ELEMENT && ($reader->name === 'table:table-row')) {
	
					if(empty($reader->expand()->textContent)){
						if($consol_message){
						echo "---table-row---" ."</br>";
						echo " table-row empty 空值 " ."</br>";  // ← 欄位空值
						}
					}else if(is_null($reader->expand()->textContent)){
						if($consol_message){
						echo "---table-row---" ."</br>";
						echo " is_null空值 " ."</br>";
						}
					}else if(!isset($reader->expand()->textContent)){
						if($consol_message){
						echo "---table-row---" ."</br>";
						echo " isset空值 " ."</br>";
						}
					}else if(($reader->expand()->textContent) == null){
						if($consol_message){
						echo "---table-row---" ."</br>";
						echo " 空值 == null " ."</br>";
						}
					}else if(($reader->expand()->textContent) === null){
						if($consol_message){
						echo "---table-row---" ."</br>";
						echo " 空值 === null " ."</br>";
						}
					}else{
						if($consol_message)
						echo "--------------------------------------table-row--------------------------------------" ."</br>";
						//echo $reader->expand()->textContent ."</br>"; // Put the text into array in correct order...
						$LabelCount = 0;
						$TotalCount = $TotalCount+1;
						// 第二層
						if($consol_message)
						echo "TotalCount = ".$TotalCount." , & re_set ". $LabelCount ."</br>"."</br>";
					}
				}
				
				// Upload *.ods and unzip file will discovery that use the number of compression instead, so filter.
				if ($reader->nodeType == XMLREADER::ELEMENT && $reader->name === 'table:table-cell') {

					$zipcount = 0;
					// 不可用 >大於 <小於, 預防中文字元, 或其他字元.
					$counts = $reader->getAttribute('table:number-columns-repeated');
					if($counts === '1' || $counts=== '2' || $counts=== '3' || $counts=== '4' || $counts=== '5' || $counts=== '6' || $counts=== '7' || $counts=== '8' || $counts=== '9' || $counts=== '10'){
						if($consol_message){
						echo "</br>";
						echo "偵測多行壓縮 數量為→→→   ".$reader->getAttribute('table:number-columns-repeated')."</br>";
						echo "</br>";
						}
						$zipcount = $counts;	// 陣列重覆執行次數, 因味相同內容遭壓縮.
					}else{
						if($consol_message){
						echo "</br>";
						echo 'single xml object'."</br>";
						echo "</br>";
						}
						$zipcount = 1;
					}
				}
							// array[0] Label
					// array[1~end] Data
					// 第三層
					if ($reader->nodeType == XMLREADER::ELEMENT && ($reader->name === 'text:h' || $reader->name === 'text:p')) {
						$LabelCount = $LabelCount+1;
						if($consol_message)
						echo "LabelCount ". $LabelCount ."</br>";
						if(empty($reader->expand()->textContent)){
							//echo "---text-p---" ."</br>";
							echo " text-p empty 空值 " ."</br>";
						}else if(is_null($reader->expand()->textContent)){
							//echo "---text-p---" ."</br>";
							echo " is_null空值 " ."</br>";
						}else if(!isset($reader->expand()->textContent)){
							//echo "---text-p---" ."</br>";
							echo " isset空值 " ."</br>";
						}else if(($reader->expand()->textContent) == null){
							//echo "---text-p---" ."</br>";
							echo " 空值 == null " ."</br>";
						}else if(($reader->expand()->textContent) === null){
							//echo "---text-p---" ."</br>";
							echo " 空值 === null " ."</br>";
						}else{
							//echo "---text-p---" ."</br>";
							for($i = 0 ; $i<$zipcount ; $i++){
								if($consol_message){
									echo $reader->expand()->textContent ."</br>"; // Put the text into array in correct order...
								}
								if($TotalCount == 1){
									$lbarray [1][] = $reader->expand()->textContent;
								}else{
									$lbarray [$TotalCount][] = $reader->expand()->textContent;
								}
							}
						}
					}
					
			}
			
			/**
			$lbarray[1][] 固定為欄位表單
			
			$lbarray[2][] 之後補滿, 			
			**/
			
			
			$reader->close();
			
			if($consol_message)
			echo "<br/>";
			if($consol_message)
			echo "---------------------<br/>";
			
			//資料庫初始化連線
			$db = new dbmcObj();
			//DB connection
			$connString =  $db->getConnstring(0);
			// class initilization
			$wrdbCls = new wrdatabase($connString);
			$wrdbCls->wdb($mfilename, $lbarray);
			
			/*
			for($i = 1 ; $i<$TotalCount ; $i++){
				echo "陣列: ".$i." " ;
				print_r($lbarray[$i]); 
				echo "<br/>";
			}
			*/
			
			if($consol_message)
			echo "<br/>";
			if($consol_message)
			echo "---------------------<br/>";
			if($consol_message)
			echo "<br/>";

		}
		
		// 告訴db 最新的更新時間.
		//============================================================================ ↓
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
				
				//echo "set_table_autotime into";
				//TODO:   get db time and update 
				//$sql_cmd  = "SELECT NOW()";
				
				//ddresponse.php setUpdateTime();   /// 思考 ddresponse.php 是否統一 db command set.
				
				//$date = date('Y-m-d H:i:s');
			
				$sql_cmd = "UPDATE tc_mc_control_db_history_dev.updatetime SET uploadTime = NOW() WHERE tid = 1";  // 修改點
				
				$result = mysqli_query($this->conn, $sql_cmd) or die("error to cdbtable wrdatabase data". "<br/>");
			}
		}
		//============================================================================ ↑
		class wrdatabase{
			protected $conn;
			protected $data = array();
			
			protected $table_row_array;
			
			function __construct($connString) {
				$this->conn = $connString;
				//echo "upload __construct start <br/>";
			}
			
			function __destruct(){
				//mysqli_free_result($result);	//不該由此執行
				//mysqli_close($conn);			//不該由此執行
				//echo "<br/>";
				//echo "class wrdatabase  __destruct<br/>";
			}
			
			//TODO: change file name to ods or odf
			private function deleteuploadfile($file_name){
				$files = [
					'./first.jpg',
					'./second.jpg',
					'./third.jpg'
				];

				foreach ($files as $file) {
					if (file_exists($file)) {
						unlink($file);
					} else {
						// File not found.
					}
				}
			}
			
			//Create Table
			function cdbtable($mcreatename){
			
				global $consol_message;
				if($consol_message)
				echo $mcreatename . "<-------------------------br/>";
				
				if (false !== $pos = strripos($mcreatename, '.')) {
					$mcreatename = substr($mcreatename, 0, $pos);
				}
				//if($consol_message)
				$sql = 
				"CREATE TABLE IF NOT EXISTS " . $mcreatename ." (
					id INT(11) NOT NULL AUTO_INCREMENT,
					updatedDate1 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
					createdDate1 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
					製程開始 VARCHAR(50) DEFAULT NULL,
					開始人員 VARCHAR(50) DEFAULT NULL,
					製程完成 VARCHAR(50) DEFAULT NULL,
					完成人員 VARCHAR(50) DEFAULT NULL,
					PRIMARY KEY (`id`)
				);";
				
				if($consol_message)
				echo $sql . "<br/>";

				//$result = mysqli_query($this->conn, $sql) or die("error to cdbtable wrdatabase data". "<br/>");
				//$result = mysqli_query($this->conn, $sql);
				$result = mysqli_query($this->conn, $sql) or die("error to cdbtable wrdatabase data". "<br/>");
				if($result == 1){
					//echo "write db success" . "<br/>";
				}
				
			}
			
			/**
			$wdb_tb_name = >used to set sql table of name.
			$lbarray = 
			*/
			function wdb($wdb_tb_name, $lbarray){
				
				global $consol_message;
				
				if($consol_message)
				echo "upload wdatabase in <br/>";
				//echo count($lbarray) . "<br/>";		//hhh.odt  有97筆資料
				//echo json_decode($lbarray[0]);
				//print_r($lbarray);					//陣列整個印出來 會都黏在一起.
				if($consol_message)
				echo "<br/>";
				if($consol_message)
				echo "<br/>";
			
				for ($h = 1; $h <  count($lbarray)+1; $h++) 
				{
					
						if($h === 1){
							if($consol_message)
							echo "標題寫入";
							if($consol_message)
								echo "【". "<br/>";
							
							//===== 插 入 欄 位 =====
							
							/*
							一次傳一行, 除了第一個行為表單
							count($lbarray[$h])
							*/
							
							/*
							以下會需要這如寫寫法的理由  分為  case8/   case9,
							由於XMLReader 讀取到空白欄位將忽略此欄位, 
							若需要修改成單一識別, 需要修改源頭 資料讀取方式, 遇空欄位則遞補,
							未來自動產生, 不會有如此情況, 因為資料欄位由自己掌握  不會風生無法預期的資料欄位.
							*/
							if($consol_message)
							echo "總欄位次數".count($lbarray[$h])."=========================================================</br>";
							
							for ($g = 0; $g <  count($lbarray[$h]); $g++) {
								
								if($consol_message)
								echo "----------------------------> [".$h."]"."[".$g."]".($lbarray[$h][$g]). "<br/>";
								// TODO : Write to database;
								
								$table_row_array = $lbarray[$h]; // 下次被用.
								//在TABLE內新增欄位
								//ALTER TABLE 資料表名稱 ADD COLUMN 欄位名稱 形態(長度);
								$sql_alt = "ALTER TABLE " . $wdb_tb_name ." ADD COLUMN ".$lbarray[$h][$g]." VARCHAR(50) DEFAULT NULL;";
									if($consol_message){
									echo "總欄位資料 : " . "[" . $h . "]" . "[" . $g . "]<br/>";
									echo $sql_alt . "<br/>";
									}
									$result = mysqli_query($this->conn, $sql_alt) or die("!!!!!error to wdb ALTER TABLE 0!!!!!<br/>表單,標題錯誤, 請確認表單標題是否符合規範<br/>");
									//$result = mysqli_query($this->conn, $sql_alt);
									if($result == 1){
										//echo "write db success" . "<br/>";
									}

							}
						}else{
							if($consol_message)
							echo "欄位內容寫入";
							//=================================================================================================== star
							// 抓取項目欄位輸量比對
							
								$sql_up = 
								"INSERT IGNORE INTO "
								. $wdb_tb_name .
								" ( ";
								for($m = 0; $m <(count($lbarray[1])) ; $m++){
									$sql_up = $sql_up."`".preg_replace('/\s(?=)/', '', $table_row_array[$m])."`";
									if($m <(count($table_row_array)-1)){// 最後一個不需要逗號
										$sql_up = $sql_up." , ";
									}
								}
								$sql_up = $sql_up." )VALUES( ";	
								for($m = 0; $m <count($lbarray[$h]) ; $m++){
									$sql_up = $sql_up."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m])."'";
									if($m != count($lbarray[$h])-1){// 最後一個不需要逗號
										$sql_up = $sql_up." , ";
									}
								}
								
								// 差異處 處理。
								if(count($lbarray[1]) == count($lbarray[$h])){
									//有備註, write driect	
									if($consol_message)
									echo "有備註" . "<br/>";												
								}
								else{
									//無備註 缺少補一個空值.
									if($consol_message)
									echo "無備註" . "<br/>";	
									$sql_up = $sql_up." , ";	
									$sql_up = $sql_up."'"."'";												
								}
								
								$sql_up = $sql_up.");";
								
								if($consol_message)
								echo $sql_up . "<br/>";
								
							mysqli_query($this->conn, $sql_up) or die("!!!!!error to wdb INSERT TABLE 1 !!!!!<br/>");
							
							continue;// 已下  先套過  結束
							//=================================================================================================== end

							$sql_up = "";
							//--修改   ,以工單編號為主鍵盤 
							//update Table01 set name='Judy',email='Judy@test.com' where id='6'
							
							
							$dblabelname="";
							switch(($g+1)) {
							 case 1:
								$dblabelname = "工單編號";
							 break;
							 
							 case 2:
								$dblabelname = "規格";
							 break;
							 
							 case 3:
								$dblabelname = "數量";
							 break;
							 
							 case 4:
								$dblabelname = "客戶"; 
							 break;
							 
							 case 5:
								$dblabelname = "交期";
							 break;
							 
							 case 6:
								$dblabelname = "工作類別";
							 break;
							 
							 case 7:
								$dblabelname = "工作站";
							 break;
							 
							 case 8:
								$dblabelname = "工作內容";
							 break;

							 case 9:	
								$dblabelname = "備註";
							 break;
							 
							 case 10:	
								$dblabelname = "開始日期"; 		//----新增
							 break;
							 
							 case 11:	
								$dblabelname = "完成日期";		//----新增
							 break;
							 
							 case 12:	//原為 09欄位
								$dblabelname = "製程開始"; 
							 break;
							  
							 case 13:	//原為 10欄位
								$dblabelname = "開始人員";
							 break;
							 
							 case 14:	
								$dblabelname = "製程完成";
							 break;
							 
							 case 15:	
								$dblabelname = "完成人員";
							 break;
							  
							 default:
								if($consol_message)
								echo "例外像目.." . "<br/>";
							 return;
							}
							
							//if g == 0 為 table 項目
							if($g == 0){
								if($consol_message)
								echo "工單號碼欄位" . "<br/>";
								/*
								$sql_up = 
								"INSERT IGNORE INTO "
								. $wdb_tb_name .
								" ( "
								.$dblabelname.
								" )VALUES( "
								.$lbarray[$h][$g].
								");";
								*/

								//------------------------------------- 分隔線 ---------------------------------------
								//coding for 未經正規劃,所以要一次寫入.
								
								/*
								$sql_up_temp = 
								"INSERT IGNORE INTO "
								. $wdb_tb_name .
								" ( ";
								*/
								$m =  count($lbarray[$h]);// 寫入資料數量
								if($consol_message)
								echo "array : " . $m . "<br/>";
								
								
								$sql_update = false; 
								$position_one = 0; // where position to insert.
								$position_two = 0; // insert or replace : 0 or other.
								$sql_insert_value = "";
								$sql_update_cmd = "";
								$sql_up = ""; 
								
								switch($m){
									
									case 9:
										$sql_update = false; 
										$sql_update_cmd = "";
										// 幫陣列差屁股, 當有資料相同時, 會少一個欄位.
										// 需要特定去做, 未來要修改震裂解析器, 吐出正確的陣列, case9 就可以刪除
										$sql_up = 
										"INSERT IGNORE INTO "
										. $wdb_tb_name .
										" ( ";
										//-7  , `開始日期` , `開始人員` , `完成日期` , `完成人員` ,`備註`
										for($m = 0; $m <(count($table_row_array)-5) ; $m++){
											$sql_up = $sql_up."`".preg_replace('/\s(?=)/', '', $table_row_array[$m])."`";
											if($m <(count($table_row_array)-6)){
												$sql_up = $sql_up." , ";
											}
										}
										/*
										// TODO: 補一位 完成日期 -table
										$sql_up = $sql_up." , ";
										$sql_up = $sql_up."`".preg_replace('/\s(?=)/', '', $table_row_array[$m-1])."`";
										*/
										$sql_up = $sql_up." )VALUES( ";
										
										for($m = 0; $m <count($lbarray[$h]) ; $m++){
											if($consol_message)
												echo "DEBUG = [".$h."][".$m."] :". $lbarray[$h][$m]. "<br/>";
											$sql_up = $sql_up."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m])."'";
											if($m != count($lbarray[$h])-1){
												$sql_up = $sql_up." , ";
											}
										}
										
										// 補一位 完成日期 -value
										$sql_up = $sql_up." , ";
										$sql_up = $sql_up."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m-1])."'";
										
										$sql_up = $sql_up.");";
									break;
									
									case 10:
										//$sql_update = false; 
										$sql_update_cmd = "";
										$sql_up = 
										"INSERT IGNORE INTO "
										. $wdb_tb_name .
										" ( ";
										
										//-5  , `開始日期` , `開始人員` , `完成日期` , `完成人員` ,`備註`
										if($consol_message){
											echo "測試誤判之長度 = ".count($table_row_array). "<br/>";
											for($m = 0; $m <(count($table_row_array)) ; $m++){
												echo preg_replace('/\s(?=)/', '', $table_row_array[$m]). "<br/>";
											}
											echo "誤判之長度  End". "<br/>";
										}
										
										for($m = 0; $m <(count($table_row_array)-1) ; $m++){
											$sql_up = $sql_up."`".preg_replace('/\s(?=)/', '', $table_row_array[$m])."`";
											if($m <(count($table_row_array)-2)){
												$sql_up = $sql_up." , ";
											}
										}
										$position_one = strlen($sql_up);
										$sql_up = $sql_up." )VALUES( ";
										
											for($m = 0; $m <count($lbarray[$h]) ; $m++){
												if($consol_message){
													echo "DEBUG = [".$h."][".$m."] :". $lbarray[$h][$m]. "<br/>";
													echo "字串長度 = ". mb_strlen( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ). "<br/>";
													echo "字串過濾 = ".mb_substr( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ,-3). "<br/>";
												}
												//判斷是不是最後一位陣列
												
												if($m == (count($lbarray[$h])-1)){
													if($consol_message)
													echo "最後一位". "<br/>";
													//判斷 8 >= x >= 6
													$myint = mb_strlen( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) );
													//$topint =8;
													//$lowint =6;
													if($consol_message)
													echo "字元長度: ". mb_strlen( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]));
													//if(mb_strlen( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ) =="6"||mb_strlen( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ) =="7"||mb_strlen( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ) =="8"){
													if(true){
													//if($topint>$myint>$lowint){
														if($consol_message)
														echo "8>x>6". "<br/>";
														if( mb_substr( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ,-3)=='(一)' ||
															mb_substr( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ,-3)=='(二)' ||
															mb_substr( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ,-3)=='(三)' ||
															mb_substr( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ,-3)=='(四)' ||
															mb_substr( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ,-3)=='(五)' ||
															mb_substr( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ,-3)=='(六)' ||
															mb_substr( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ,-3)=='(日)'
														){
															if($consol_message)
															echo "表示不是備註,". "<br/>";
															
															$sql_up = $sql_up."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m])."'";
														}else{
															if($consol_message)
															echo "表示是 錯誤補漏洞". "<br/>";
															$sql_up = $sql_up."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m-1])."'";
															//多寫一欄位資料進去
															//=================================  Set Write DB table.備註` =================================
															
															//--------------------放這邊不對  要放在此像物建利好後在用update更新上去
															
															/** following below mysql CMD text successful
															
															update 備料區磨料機4 set 
															備註="text message" 
															where `工單編號`= '10701007'AND
															 `規格`= 'HRW-30'AND
															 `數量`= '1'AND
															 `工作類別`= '成品'AND
															 `工作站`= '車床'AND
															 `工作內容`= '車成品'AND
															 `開始日期`='10/2(二)'AND
															 `完成日期`='10/2(二)'AND
															 `客戶`= '光達'AND
															 `交期`= '10/2(二)';
															 
															*/
															$sql_insert_value = ", '".$lbarray[$h][$m]."'";
															
															$sql_set_note = 
															" update ". $wdb_tb_name ." set ".
															" 備註 = '".$lbarray[$h][$m]."'".
															" where id = ".($h-2).";";
															/*
															$sql_set_note = $sql_set_note."`".preg_replace('/\s(?=)/', '', $table_row_array[$m+5])."`";
															$sql_set_note = $sql_set_note." )VALUES( ";
															$sql_set_note = $sql_set_note."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m])."'";
															$sql_set_note = $sql_set_note.");";
															*/
															if($consol_message)
															echo $sql_set_note. "<br/>";
														
															$sql_update = true; 
															$sql_update_cmd = $sql_set_note;
															
															// func substr_replace() insert sample
															//echo substr_replace("world","Hello ",0,0); first value as 0 start place, second value as 0 meet insert not replace.  
															// - >"Hello world "
															
															//mysqli_query($this->conn, $sql_set_note ) or die("!!!!!error to wdb INSERT TABLE !!!!!<br/>");
															//=================================  Write DB =================================
														}
													}else{
														if($consol_message)
														echo " ! 8>x>6";
														$sql_up = $sql_up."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m-1])."'";
													}												
												}else{
													if($consol_message)
													echo "非最後一位";
													$sql_up = $sql_up."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m])."'";
												}
												
												//$sql_up = $sql_up."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m])."'";
												if($m != count($lbarray[$h])-1){
													$sql_up = $sql_up." , ";
												}
											}

										
										// BUG 修正在Unzip 解壓縮xml 在欄位開始日期, 完成日期 會發生相同內容,在xml 被過濾掉,少一個物件,
										// ===========最後一次, 隔離出來, 判斷是時間還是備註===========
										// -> 若欄位全滿 11位, 是不會進入此case
										// -> 若欄位全滿 9位, 是不會進入此case
										// -> 若欄位全滿 10位, 進入此case
										// -> 10位 進入情況, 開始結數日期不同, 無備註.
										// -> 10位 進入情況, 開始結數日期相同. 有備註
										
										
										// ===========應對方式===========
										// TODO: 隔離最後一欄位出來判斷.
														/*
														若是備註, 表示日期bug發生,將要寫入的值換成前一陣列, 並在最後多一個sql cmd 針對備註欄位寫入.
														*/
														/*
														若是日期, 表示沒有備註,請安心服用.
														*/
														
										// TODO: 判斷字元 位數小於10位, 先把他印出如下.
														/*
														DEBUG = [17][0] :10701007 字串長度 ======> 8
														DEBUG = [17][1] :HRW-30 字串長度 ======> 6
														DEBUG = [17][2] :1 字串長度 ======> 1
														DEBUG = [17][3] :光達 字串長度 ======> 6
														DEBUG = [17][4] :10/2(二) 字串長度 ======> 9
														DEBUG = [17][5] :成品 字串長度 ======> 6
														DEBUG = [17][6] :車床 字串長度 ======> 6
														DEBUG = [17][7] :車成品 字串長度 ======> 9
														DEBUG = [17][8] :10/2(二) 字串長度 ======> 9
														DEBUG = [17][9] :附圖x3個 字串長度 ======> 11
														*/
										// TODO: 判斷字元.
														/*
														1. 位元最大如: '12/31(日)'
														2. final position x-2 is'"{"' and final position x is '")"'.
														*/
										// TODO: 再來判斷. if else 是建處理.
														/*
														*/
										/*
										for($m = 0; $m <(count($lbarray[$h])-1) ; $m++){
											//if($consol_message)
											echo "DEBUG = [".$h."][".$m."] :". $lbarray[$h][$m]. "<br/>";
											$sql_up = $sql_up."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m])."'";
											if($m != count($lbarray[$h])-1){
												$sql_up = $sql_up." , ";
											}
										}
										echo " ======> ".$lbarray[$h][$m]." 字串長度 ======> ". mb_strlen( preg_replace('/\s(?=)/', '', $lbarray[$h][$m]) ). "<br/>";
										*/
										$sql_up = $sql_up.");";
									break;

									// 有備註
									case 11:
										$sql_update = false; 
										$sql_update_cmd = "";
										/* 原始程式  需保留
										$sql_up = 
										"INSERT IGNORE INTO "
										. $wdb_tb_name .
										" ( "
										."mOrder"." , "
										."mSpecifications"." , "
										."mnumber"." , "
										."mCustomer"." , "
										."mDelivery"." , "
										."mWorking_class"." , "
										."mWorkstation"." , "
										."mWorking_content"." , "
										."mRemarks"	//主要是多這一行, 以下下面迴圈是否會多跑一個備註的資了也要寫入.
										." )VALUES( ";
										*/
										
										$sql_up = 
										"INSERT IGNORE INTO "
										. $wdb_tb_name .
										" ( ";
										/*
										."mOrder"." , "
										."mSpecifications"." , "
										."mnumber"." , "
										."mCustomer"." , "
										."mDelivery"." , "
										."mWorking_class"." , "
										."mWorkstation"." , "
										."mWorking_content"." , "
										."mRemarks"
										*/
										
										//-5  , `開始日期` , `開始人員` , `完成日期` , `完成人員` ,`備註`
										for($m = 0; $m <(count($table_row_array)-5) ; $m++){
											if($consol_message)
											echo "DEBUG = [".$h."][".$m."] :". $lbarray[$h][$m]. "<br/>";
											$sql_up = $sql_up."`".preg_replace('/\s(?=)/', '', $table_row_array[$m])."`";
											if($m <(count($table_row_array)-6)){
												$sql_up = $sql_up." , ";
											}
										}
										
										$sql_up = $sql_up." , ";	//差異處
								//==============================================================================================================================//										
										 
										 //TODO: 交貨日期 

										 //$table_row_array[12] 只的是  資料庫表單位[註解]
										// $sql_up = $sql_up."`".preg_replace('/\s(?=)/', '', $table_row_array[12])."`";		//差異處
										//2018-06-12  插入兩欄位 12+2 = 14
										$sql_up = $sql_up."`".preg_replace('/\s(?=)/', '', $table_row_array[14])."`";		//差異處
								//==============================================================================================================================//										
										$sql_up = $sql_up." )VALUES( ";
										for($m = 0; $m <count($lbarray[$h]) ; $m++){
											$sql_up = $sql_up."'".preg_replace('/\s(?=)/', '', $lbarray[$h][$m])."'";
											if($m != count($lbarray[$h])-1){
												$sql_up = $sql_up." , ";
											}
										}
										$sql_up = $sql_up.");";
									break;
									 
									 
									// 無備註資料
									default:
										echo "例外預設項目" . "<br/>";
										continue;
									break;
								}
								//$m = 10 => 沒有備註要带入資料庫
								//$m = 11 => 有備註要带入資料庫
								

								
								
								//=================================  Write DB table.備註  =================================
								if($sql_update == true){
									
									//$sql_up = $sql_up.$sql_update_cmd ;
									//$newstr = substr_replace($oldstr, $str_to_insert, $pos, 0);
									
									
									//插入指定欄位
									$mystr_inserttext =  "`"." , "."`備註";
									$sql_insert_value0 = preg_replace('/\s(?=)/', '',$mystr_inserttext); // -->  ` , `備註
									$sql_up = substr_replace($sql_up, $sql_insert_value0, $position_one-1, 0);
									
									//插入指定值
									$position_final = strlen( $sql_up );
								
									$sql_up = substr_replace($sql_up, preg_replace('/\s(?=)/', '', $sql_insert_value), $position_final-2, 0);
									if($consol_message)	{
										echo"Join sql_update_cmd mode = ".$m." >>> ". $sql_update_cmd . "<br/>";
										echo"sql CMD ==> mode = ".$m." >>> ". $sql_up . "<br/>";
									}
									
									mysqli_query($this->conn, $sql_up) or die("!!!!!error to wdb INSERT TABLE 1 !!!!!<br/>");
									
								}else{
									//=================================  Write DB table  =================================
									if($consol_message)	
									echo"mode = ".$m." >>> ". $sql_up . "<br/>";
									mysqli_query($this->conn, $sql_up ) or die("!!!!!error to wdb INSERT TABLE 2 !!!!!<br/>");
									//=================================  Write DB table  =================================
									
									if($consol_message)	{
										echo"無備註寫入" . "<br/>";
										echo"Just out put sql_update_cmd mode = ".$m." >>> ". $sql_update_cmd . "<br/>";
									}
								}								
								//=================================  Write DB table.備註  =================================

								//$dblabelname = "";
								//$sql_up = "";

							}else{
								//為內容項目
								if($consol_message)
									echo "其它----內容欄位" . "<br/>";
								/*
								$sql_up = 
								"update "
								. $wdb_tb_name .
								" set "
								. $dblabelname .
								" = '"
								. $lbarray[$h][$g] .
								"' WHERE 工單編號 = "
								.$lbarray[$h][0].
								";";
								*/
							}
							
							/*
							echo $sql_up . "<br/>";
							$result = mysqli_query($this->conn, $sql_up) or die("!!!!!error to wdb INSERT TABLE !!!!!<br/>");
							if($result == 1){
								//echo "write db success" . "<br/>";
							}
							$dblabelname = "";
							$sql_up = "";
							*/
						}
						if($consol_message)
						echo "<br/>";
					}
					if($consol_message)
					echo "】";
					if($consol_message)
					echo "<br/>";
				
					if($consol_message)
						echo "<br/>";
					if($consol_message)
						echo "==";
				}
			}
	?>
	
	<script type="text/javascript">
    
    $( document ).ready(function() {
		
		var grid = $("#mymain").bootgrid({
		}).on("loaded.rs.jquery.bootgrid", function()
		{
			 $('#mymain').modal('show');
		});
	});
	</script>
		
</body>
</html>