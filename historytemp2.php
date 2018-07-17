
<?php
	//======================================================= Cookie erase all about already known.臨時使用 =======================================================
	/*
	if (isset($_COOKIE['cookieHistoryName'])) {
		unset($_COOKIE['cookieHistoryName']);
		setcookie('cookieHistoryName', null, time () - 100);
	} 
	
	if (isset($_COOKIE['token'])) {
		unset($_COOKIE['token']);
		setcookie('token', null, time () - 100);
	} 
	
	if (isset($_COOKIE["token"])) {
		unset($_COOKIE["token"]);
		setcookie("token", null, time () - 100);
	} 
	
	if (isset($_COOKIE['cookieHistoryName'])) {
		unset($_COOKIE['cookieHistoryName']);
		setcookie('cookieHistoryName', null, time () - 100);
	} 
	*/
	//======================================================= 以上臨時使用 =======================================================
	
	
	//SELECT OPTION DB TABLE
	
	//require ("pconnection.php"); //Release ===============
	//require_once ("connection/connection_person.php"); //Debug ===============
	
	session_start();
	$switch_id = $_GET['sid'];
	
	$cookie_name = "cookieHistoryName";

	
	//switch_id == 0 meet init first display need to set
	if($switch_id == 0){
		//echo "herf sid 2:" . $switch_id."<br>";
		/*
		$pdb = new dbpObj();
		$pconnString =  $pdb->getConnstring();
		$pquery = "SELECT * FROM `unit`";
		$presult0 = mysqli_query($pconnString, $pquery);
		$row0  = mysqli_fetch_array($presult0);
		$switch_id = $row0[0];
		setcookie("cookieHistoryName","$switch_id", time()+3600*8);
		*/
		//document.location.href="http://"+"168.2.9.22"+"/multi_upload_txt/joblist.php"+"?"+"sid"+"="+$switch_id ;
		//setcookie("isSelect","false");
	} else if(isset($_COOKIE[$cookie_name])) {
		if(isset($_COOKIE["cookieHistoryName"]) == ''){
			echo "init : Cookie named '" . $cookie_name . "' is set! Value is :". $_COOKIE[$cookie_name]."empty, 請修正程式"."<br>";
		}else{
			echo "init : Cookie named '" . $cookie_name . "' is set! Value is :". $_COOKIE[$cookie_name]."<br>";
		}
	} else {
		echo "Cookie exception.";
	}
	
	// echo " Client update time :".$_COOKIE["token"]."<br>" ;
	if(!isset($_COOKIE["token"])) {
		setcookie("token", date("Y-m-d h:i:s"), time()+60*60*24*100, "/");
		// echo " Init 1 & update time :".$_COOKIE["token"]."<br>" ;
	}else if($_COOKIE["token"]== "0") {
		setcookie("token", date("Y-m-d h:i:s"), time()+60*60*24*100, "/");
		// echo " Init 2 & update time :".$_COOKIE["token"]."<br>" ;
	}else{
		// echo " System update time :".$_COOKIE["token"]."<br>" ;
	}
	
?>

<!DOCTYPE html PUBLIC>
<head>
	<!--<meta http-equiv="refresh" content="100;" charset="UTF-8"/>-->
	<meta charset="UTF-8"/>
	<article>
		<title>歷 史 資 料</title>
	</article>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
 


<?php
	require ("connipconf.php");
?>

<?php

	 // 選項 - 管理
    require ("connection/historyconn.php");
    $mcdb = new dbhisfxObj();
    $mcconnString =  $mcdb->getConnstring();
    $mcquery = "SHOW TABLES";
    $mcresult1 = mysqli_query($mcconnString, $mcquery);
    $optiontables = "";
	//$optiontables = $optiontables."<option>請選擇....</option>";
	$select00 = isset($_COOKIE["cookieHistoryName"]) != '' ? $_COOKIE["cookieHistoryName"] : '';
    while($row3  = mysqli_fetch_array($mcresult1))
    {
		$table_field[] = $row3[0];
		if(empty($select00)){
			setcookie("cookieHistoryName",$row3[0], time()+3600*8);
		}else if ($row3[0] == $_COOKIE["cookieHistoryName"]){
			$optiontables = $optiontables."<option value=$row3[0] selected=selected>$row3[0]</option>";
		}else{
			$optiontables = $optiontables."<option>$row3[0]</option> ";
			//echo "set selected2 = ".$optiontables;
			//echo "<br>";
		}
		//echo "Table: {$row3[0]}\n";
    }

	$switch_id = $_GET['sid'];
	if($switch_id == 0){
		//echo "Log Msg : 請新增部門工作項目, 目前無定新的工作項目.";
		//setcookie("cookieHistoryName","", 1);
	}else{
		if(count($table_field) == 1){
			echo "單一清單 1: ".$table_field[0]."<br>" ;
			setcookie("cookieHistoryName",$table_field[0], time()+3600*8);
			$_POST["sid"] = $table_field[0];
		}else if(count($table_field) > 1){
			echo "multi list"."<br>" ;
		}
	}
	
?>

<?php
	// set selection option 
	if(isset($_POST['select1'])){
		$select1 = $_POST['select1'];
	}
?>

<html>

<body onselectstart="return true;" ondragstart="return false;" oncontextmenu="return false;"> <!--滑鼠右鍵鎖定-->	
	
    <link href="dist/bootstrap.min.css" media="all" rel="stylesheet" type="text/css">
    <link href="dist/jquery.bootgrid.css" rel="stylesheet">
    <script src="dist/jquery-1.11.1.min.js"></script> 
	
    <script src="dist/bootstrap.min.js"></script> 
    <script src="dist/jquery.bootgrid.min.js"></script>
        
    <p id="demo"></p>
    <form style="font-size:22px" action="mymain" width = "100%">
    <!--<h1><span style="color:#008866;">邊界測試1</span></h1>-->
    
        <div class="full-width">
        <!--<h1><span style="color:#008866;">邊界測試2</span></h1>-->
        
        <!--<a>Version 1.0</a>-->
            <div class="col-sm-60">
                
                <!--<hr>換行-->
                
                <div class="col-sm-12">
                    <!--<p>Label_1</p>-->
                    <div class="well clearfix">
                        <!--<p>Label_2</p>-->
                        
                        <h1><span style="color:orange;">大昶貿易股份有限公司 TAI CHONG CO .,LTD.</span></h1>
                        <h1><span style="color:#008866;">歷 史 資 料 / Informasi historis</span></h1>
						
                        <div class="form-group">
							<style>.form-control{ width: 100%;}</style>
                            <label for="choices3">選 項 / Pilihan : </label>
							<select name="select1" class="form-control"id="dept3">

                                <?php echo $optiontables;?>
                            </select>     
                        </div>
						<div style="text-align:center;clear:both">
						<!--<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
						<script src="/follow.js" type="text/javascript"></script>-->
							<a class="btn btn-large btn-blue btn-radius" type ="button" onclick="history.back()" >回到上一頁 / Halaman sebelumnya </a>
							<a class="btn btn-large btn-blue btn-radius" id="MyButtonupdatalist" href="#"> 資 料 更 新 / Pembaruan data </a>
							
						</div>
                    </div>
					
                    <!-- 原始位置 -->
                </div>
            </div>
        </div>
		
		<!--<input type="button" value="測 試 強 制 自 動 更 新" id="MyButtonupdatalist" >-->
		<!--<a href="JavaScript: location.reload(true);">Refresh page</a>-->
            <table border="0" style="font-size:22px;font-family:serif;" cellspacing="0" class="table table-bordered table-hover table-striped" data-toggle="bootgrid" id="employee_grid" width="90%">
                
				<thead> 
                    <tr>
					
                        <th data-column-id="id" data-identifier="true" data-type="numeric">id</th>
                        <!--<th data-column-id="commands" data-formatter="commands" data-sortable="false"> <font color="blue"> <span class="badge badge-success">控制項目</span> </font></th>-->
						<!--  中文測試 -->
						<th data-column-id="工單編號">工單編號</th>
						<th data-column-id="規格">規格</th>
						<th data-column-id="數量">數量</th>
						<th data-column-id="工作類別">工作類別</th>
						<th data-column-id="工作站">工作站</th>
						<th data-column-id="工作內容">工作內容</th>
						
						<th data-column-id="開始日期">開始日期</th>
						<th data-column-id="完成日期">完成日期</th>
						<th data-column-id="客戶">客戶</th>
						<th data-column-id="交期">交期</th>
						<th data-column-id="備註">備註</th>
						
						<th data-column-id="製程開始">製程開始</th>
						<th data-column-id="開始人員">開始人員</th>
						<th data-column-id="製程完成">製程完成</th>
						<th data-column-id="完成人員">完成人員</th>	
						
						<th data-column-id="createdDate1">排程產生時間</th>
						
                    </tr>
                </thead>
            </table>
    </form><!--add_model-->
 
    
    <script type="text/javascript">
    $( document ).ready(function() {
        var grid = $("#employee_grid").bootgrid({  //table id = employee_grid
           ajax: true,
           rowSelect: true,
           post: function ()
           {
               /* To accumulate custom parameter with the request object */ 
           return {
                   id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
               };
           },
           url: "hisresponse.php"
		   //url: "ddresponse.php"
        });

		/*
		// 頁面刷新 將已完成的表單搬移
		function myFunctionlistupdata(action) {
			  $.ajax({
                 type: "POST",  
                 url: "his_fx_response.php",  
                 //data: { "action":action, "time": time },
				 data: { "action":action },
                 dataType: "text",       
                 success: function(response)   //>>>>>>重點<<<<<< response 為php 回傳的json 檔，為array 包array
                 {
 
					//alert("刷新頁面完成 Success1");

					//===================================================================================================================================== D E B U G
					// 若清空, 會有錯誤, 不可隨意清除
					//document.cookie = "cookieHistoryName=";// 清空 cookie 為必要.. 但是 his_fx_response.php 清除時無法清除乾淨
					//document.location.href="http://"+"168.2.9.22"+"/multi_upload_txt/joblistmc.php"+"?"+"sid"+"="+ 0;
					//alert('刷新頁面完成 Success3:'+"http://"+"168.2.9.22"+"/multi_upload_txt/joblistmc.php"+"?"+"sid"+"="+ 0);
					
					//1. 問題 - 未全部完成, 有顯示bug. option 再重新整理前, 會是空質 (不要全清空, 但是加了會全清空)
					//2. 問題 - 全部完成, cookie 未清除無法自動跳轉. (要全清空, 但是加了會清空)
					//===================================================================================================================================== D E B U G

                    $('#'+action+'_model').modal('hide');
					//$(#edit_id).modal('hide');
					
                    $("#employee_grid").bootgrid('reload');
                 },
                 error: function() 
                 {
                     alert('失敗 Error 0x1f');
                    //$( '.message' ).addClass( 'error' ).html( data );
                    $("#employee_grid").bootgrid('reload');
                 },
                                 //狀態碼處理
                 200: function() {
                    alert("ok");
                 },
                 403: function() {
                    alert("Forbidden");
                 },
                 404: function() {
                    alert("page not found");
                 }
            });
			 
		}
		
		function readCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		}	
		$( '#MyButtonupdatalist' ).click(function(){
			myFunctionlistupdata('updatalist');				
			window.location.reload();
		});
		*/
    });

    </script>

<a>Version 1.0<br></a>
<!--<a><?php echo " Client update time :".$_COOKIE["token"]."<br>" ;?></a>-->
<!--<a><?php echo " System update time :".$_COOKIE["token"]."<br>" ;?></a>-->

<a><?php
function getIpAddress() { // 取得當前用戶的IP地址
	$ip = '168.2.9.22';
    if(isset($_SERVER)){
        if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }else if(isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }else{
            $ip = $_SERVER["REMOTE_ADDR"];
        }
    }else{
        if(getenv("HTTP_X_FORWARDED_FOR")){
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        }else if(getenv("HTTP_CLIENT_IP")) {
            $ip = getenv("HTTP_CLIENT_IP");
        }else{
            $ip = getenv("REMOTE_ADDR");
        }
    }
    return $ip;
}
function writeover($filename, $data, $method = 'w', $chmod = 0) {
	$handle = fopen ( $filename, $method )or die ( "文件打開失敗" );
	flock ( $handle, LOCK_EX );
	fwrite ( $handle, $data );
	flock ( $handle, LOCK_UN );
	fclose ( $handle );
	$chmod && @chmod ( $filename, 0777 );
}
function count_online_num($time, $ip) {
	$fileCount = './count.txt';
	$count = 0;
	$gap = 900; // 15分鐘頁面不刷新清空對應IP
	if (! file_exists ( $fileCount )) {
		$str = $time . "\t" . $ip . "\r\n";
		writeover ( $fileCount, $str, 'w', 1 );
		$count = 1;
	} else {
		$arr = file ( $fileCount );
		$flag = 0;
		foreach ( $arr as $key => $val ) {
			$val = trim ( $val );
			if ($val != "") {
				list ( $when, $seti ) = explode ( "\t", $val );
				if ($seti == $ip) {
					$arr [$key] = $time . "\t" . $seti;
					$flag = 1;
				} else {
					$currentTime = time ();
					if ($currentTime - $when > $gap) {
						unset ( $arr [$key] );
					} else {
						$arr [$key] = $val;
					}
				}
			}
		}
		if ($flag == 0) {
			array_push ( $arr, $time . "\t" . $ip );
		}
		$count = count ( $arr );
		$str = implode ( "\r\n", $arr );
		$str .= "\r\n";
		writeover ( $fileCount, $str, 'w', 0 );
		unset ( $arr );
	}
	return $count;
}
$time = time ();
$ip = getIpAddress ();
$online_num = count_online_num ( $time, $ip );
echo "   "." 現上人數:   ".$online_num;
?></a>
</body>
</html>