<!DOCTYPE html PUBLIC>
<head>
	<!--<meta http-equiv="refresh" content="100;" charset="UTF-8"/>-->
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache" CHARSET ="UTF-8"/>
	<article>
		<title>歷 史 資 料</title>
	</article>
	<!--<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />-->
</head>
<?php
	require_once ("connipconf.php");
	if(isset($_POST['select1'])){
		$select1 = $_POST['select1'];
	}
	session_start();
	$switch_id = $_GET['sid'];
	$cookie_name = "cookieHistoryName";
	if($switch_id == 0){

	} else if(isset($_COOKIE[$cookie_name])) {
		if(isset($_COOKIE["cookieHistoryName"]) == ''){
			//echo "init : Cookie named '" . $cookie_name . "' is set! Value is :". $_COOKIE[$cookie_name]."empty, 請修正程式"."<br>";
		}else{
			//echo "init : Cookie named '" . $cookie_name . "' is set! Value is :". $_COOKIE[$cookie_name]."<br>";
		}
	} else {
		//echo "Cookie exception.";
	}
	// echo " Client update time :".$_COOKIE["token"]."<br>" ;
	if(!isset($_COOKIE["token"])) {
		setcookie("token", date("Y-m-d h:i:s"), time()+60*60*24*100, "/");
		// echo " Init 1 & update time :".$_COOKIE["token"]."<br>" ;
	} else if($_COOKIE["token"]== "0") {
		setcookie("token", date("Y-m-d h:i:s"), time()+60*60*24*100, "/");
		// echo " Init 2 & update time :".$_COOKIE["token"]."<br>" ;
	} else{
		// echo " System update time :".$_COOKIE["token"]."<br>" ;
	}
	 // 選項 - 管理
    require ("connection/historyconn.php");
    $mcdb = new dbhisObj();
    $mcconnString =  $mcdb->getConnstring();
    $mcquery = "SHOW TABLES";
    $mcresult1 = mysqli_query($mcconnString, $mcquery);
	//mysqli_close($mcconnString);
    $optiontables = "";
	$select00 = isset($_COOKIE["cookieHistoryName"]) != '' ? $_COOKIE["cookieHistoryName"] : '';
    while($row3  = mysqli_fetch_array($mcresult1))
    {
		$table_field[] = $row3[0];
		if(empty($select00)){
			setcookie("cookieHistoryName",$row3[0], time()+3600*8);
		} else if ($row3[0] == $_COOKIE["cookieHistoryName"]){
			$optiontables = $optiontables."<option value=$row3[0] selected=selected>$row3[0]</option>";
		} else{
			$optiontables = $optiontables."<option>$row3[0]</option> ";
		}
    }
	$switch_id = $_GET['sid'];
	if($switch_id == 0){
	} else {
		if(count($table_field) == 1){
			//echo "單一清單 1: ".$table_field[0]."<br>" ;
			setcookie("cookieHistoryName",$table_field[0], time()+3600*8);
			$_POST["sid"] = $table_field[0];
		} else if (count($table_field) > 1){
			//echo "multi list"."<br>" ;
		}
	}
?>
<html>
<body onselectstart="return true;" ondragstart="return false;" oncontextmenu="return false;"> <!--滑鼠右鍵鎖定-->	
	<link href="dist/bootstrap.min.css" media="all" rel="stylesheet" type="text/css">
    <link href="dist/jquery.bootgrid.css" rel="stylesheet">
    <script src="dist/jquery-1.11.1.min.js"></script> 
    <script src="dist/bootstrap.min.js"></script> 
    <script src="dist/jquery.bootgrid.min.js"></script>
	<!--
	<php //測試項目如下 ?>
	<form action="get.php" method="get">
　		輸入內容在跳轉get.php 網頁: <input type="text" name="MyName" />
　		<input type="submit" value="送出表單"/>

		<php 
		// 網頁會長這樣 http://www.webtech.tw/get.php?MyName=xxx 
		// 之後再透過呼叫 echo $_GET["MyName"]; // 顯示輸入內容
		?>
	</form>
	<php //測試項目如上 ?>
	-->
    <!--<p id="demo"></p>-->
    <form style="font-size:22px" action="mymain" width = "100%">
        <!--<div class="full-width">-->
            <div class="col-sm-60">
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
							<!--<a class="w3-button w3-white w3-border w3-border-red w3-round-large" type ="button" onclick="history.back()" >回到上一頁 / Halaman sebelumnya </a>-->
							<button><a class="w3-button w3-white w3-border w3-border-red w3-round-large" id="btnintohistory" href="#">回到上一頁 / Halaman sebelumnya </a></button>
							
							<!--<a class="btn btn-large btn-blue btn-radius" id="MyButtonupdatalist" href="#"> 資 料 更 新 / Pembaruan data </a>-->
						</div>
                    </div>
                </div>
            </div>
        <!--</div>-->
            <table border="0" style="font-size:22px;font-family:serif;" cellspacing="0" class="table table-bordered table-hover table-striped" data-toggle="bootgrid" id="employee_grid" width="90%">
				<thead> 
                    <tr>
                        <th data-column-id="id" data-identifier="true" data-type="numeric">id</th>
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
    $( document ).ready(
		function() {
			var grid = $("#employee_grid").bootgrid({  //table id = employee_grid
			   ajax: true,
			   //rowSelect: true,
			   post: function ()
			   {
				   /* To accumulate custom parameter with the request object */ 
			   return {
					   id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
				   };
			   },
			   //url: "hisresponse.php"
			   url: "ddresponse.php?job=get_history"
			});
			// ajaxActionSelect * * * * * * * 
			function ajaxActionSelect(action) {
				var w = document.getElementById("dept3").selectedIndex;
				var z = document.getElementById("dept3").options;
				document.cookie = "cookieHistoryName" + " = " + z[w].text;
				document.location.href="http://"+"168.2.9.22"+"/multi_upload_txt/history.php"+"?"+"sid"+"="+ z[w].text;
				data = $("#frm_"+action).serializeArray();
				//document.getElementById("demo").innerHTML = "myDebug serializeArray: " + data;
				$.ajax({
					type: "POST",  
					url: "ddresponse.php?job=get_history",
					data: data,
					dataType: "text",       
					success: function(response)  
					{
						// alert("success");
						$('#'+action+'_model').modal('hide');
						// $("#employee_grid").bootgrid('reload');
					},
					error: function() 
					{
						alert("error");
						$( '.message' ).addClass( 'error' ).html( data );	
						// $("#employee_grid_record").bootgrid('reload');
					}    
				});
			}
			$( "#dept3" ).change(function() {
				//alert("部門選取");
				
				ajaxActionSelect('selected');	  
			});
			
			$( '#btnintohistory' ).click(function(){
				//alert("歷史頁面");
				//showWindow('http://'<?=$serverhostip?><?=$serverfolder?><?=$count1?> );
 
			  window.location.replace('http://168.2.9.22/multi_upload_txt/joblistmc.php?sid=0');
			});
		}
	);
    </script>
<?php
	echo 'Current PHP version: ' . phpversion()."<br>";
	if(!isset( $_COOKIE["cookieHistoryName"])){
		echo "COOKIE Unset yet "."<br>" ;
	} else{
		echo  "Set COOKIE  = ".$_COOKIE["cookieHistoryName"];
	}
?>
</body>
</html>