	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<script type="text/javascript">
		function myFunctionlistupdata(action) {
				  $.ajax({
					 type: "POST",  
					 url: "ddresponse.php",  
					 data: { "action":action },
					 dataType: "text",       
					 success: function(response)
					 {
						$('#'+action+'_model').modal('hide');
						$("#employee_grid").bootgrid('reload');
					 },
					 error: function() 
					 {
						 alert('失敗 Error 0x1f');
						$("#employee_grid").bootgrid('reload');
					 }
				});
		}
	</script>
	
	
<?php
	require ("connipconf.php");
	/*
	Erase Cookie-> isSelect
	Erase Cookie-> token
	Erase Cookie-> cookieSelectionName
	*/
	/*
	if (isset($_COOKIE['isSelect'])) {
		unset($_COOKIE['isSelect']);
		setcookie('isSelect', null, time () - 100);
	} 
	
	if (isset($_COOKIE['token'])) {
		unset($_COOKIE['token']);
		setcookie('token', null, time () - 100);
	} 
	
	if (isset($_COOKIE["token"])) {
		unset($_COOKIE["token"]);
		setcookie("token", null, time () - 100);
	} 
	
	if (isset($_COOKIE['cookieSelectionName'])) {
		unset($_COOKIE['cookieSelectionName']);
		setcookie('cookieSelectionName', null, time () - 100);
	} 
	*/
	// 以上臨時使用 
	
	require_once ("connection/connection_person.php");
	session_start();
	$switch_id = $_GET['sid'];
	$cookie_name = "cookieSelectionName";

	//switch_id == 0 meet init first display need to set
	if($switch_id == 0){

	} else if(isset($_COOKIE[$cookie_name])) {
		if(isset($_COOKIE["cookieSelectionName"]) == ''){
			echo "init : Cookie named '" . $cookie_name . "' is set! Value is :". $_COOKIE[$cookie_name]."empty, 請修正程式"."<br>";
		}else{
			echo "init : Cookie named '" . $cookie_name . "' is set! Value is :". $_COOKIE[$cookie_name]."<br>";
		}
	} else {
		echo "Cookie exception.";
	}

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

<?php
    //人員管理
	require_once ("connection/connection_person.php");
    $pdb = new dbpObj();
    $pconnString =  $pdb->getConnstring();
    $pquery = "SELECT * FROM `unit`";
    $presult2 = mysqli_query($pconnString, $pquery);
    $options = "";
    while($row2  = mysqli_fetch_array($presult2))
    {
        $options = $options."<option>$row2[1]</option>";
    }
?>
<?php
	 // 上傳項目管理
    require ("connection/mcconnection.php");
    $mcdb = new dbmcObj();
    $mcconnString =  $mcdb->getConnstring(0);
    $mcquery = "SHOW TABLES";
    $mcresult1 = mysqli_query($mcconnString, $mcquery);
    $optiontables = "";
	$select00 = isset($_COOKIE["cookieSelectionName"]) != '' ? $_COOKIE["cookieSelectionName"] : '';
    while($row3  = mysqli_fetch_array($mcresult1))
    {
		$table_field[] = $row3[0];
		if(empty($select00)){
			setcookie("cookieSelectionName",$row3[0], time()+3600*8);
		}else if ($row3[0] == $_COOKIE["cookieSelectionName"]){
			$optiontables = $optiontables."<option value=$row3[0] selected=selected>$row3[0]</option>";
		}else{
			//$select_attribute = 'selected'; 
			$optiontables = $optiontables."<option>$row3[0]</option> ";
			//echo "set selected2 = ".$optiontables;
			//echo "<br>";
		}
		//echo "Table: {$row3[0]}\n";
    }

	$switch_id = $_GET['sid'];
	if($switch_id == 0){
		//echo "Log Msg : 請新增部門工作項目, 目前無定新的工作項目.";
		//setcookie("cookieSelectionName","", 1);
	}else{
		if(count($table_field) == 1){
			echo "單一清單 1: ".$table_field[0]."<br>" ;
			setcookie("cookieSelectionName",$table_field[0], time()+3600*8);
			$_POST["sid"] = $table_field[0];
		}else if(count($table_field) > 1){
			echo "multi list"."<br>" ;
		}
	}
	if(isset($_POST['select1'])){
		$select1 = $_POST['select1'];
	}
?>

<head>
	<meta name="theme-color" content="#317EFB"/>
	<meta name="viewport"  content="width=device-width, initial-scale=1" charset="UTF-8">
	<meta name="Description"  content="width=device-width, initial-scale=1">

	<article>
		<title>現場單位目錄</title>
	</article>
	
	<link rel="manifest" href="manifest.json">
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<link href="dist/bootstrap.min.css" media="all" rel="stylesheet" type="text/css">
    <link href="dist/jquery.bootgrid.css" rel="stylesheet" type="text/css">
	
	 <style type="text/css">
            #message1 {
                text-align: center;
                vertical-align: middle;
                color: #ffffff;
                background-color: #ff0000;
                width: 100px;
                height: 50px;
                position: absolute;
                top: 0px;
                left: 0px;
            }
        </style>
        <script type="text/javascript">
            window.onload = function(event) {
                function style(obj, prop) {
                    if(window.getComputedStyle) {
                        return window.getComputedStyle(obj, null)[prop];
                    }
                    else if(obj.currentStyle) {
                        return obj.currentStyle[prop];
                    }
                    else {
                        return null;
                    }
                }            
                function opacity(element, value) {
                    if(value === undefined) { // 取得不透明度
                        var opt = style(element, 'opacity') 
                                     || style(element, 'filter');
                        if(opt === '') {
                            return 1;
                        }
                        if(opt.indexOf('alpha') !== -1)  {
                            return opt.substring(14, opt.length - 1) / 100;
                        }
                        return parseFloat(opt);
                    }
                
                    if(style(element, 'opacity') !== undefined) {
                        element.style.opacity = value;
                    }
                    else {
                        element.style.filter = 
                           'alpha(opacity=' + parseInt(value * 100) + ')';
                    }
                } 
           
                function screenWidthHeight() {
                    return {
                        width: screen.width,
                        height: screen.height
                    };
                }
                function screenAvailWidthHeight() {
                    return {
                        width: screen.availWidth,
                        height: screen.availHeight
                    };
                }
                function windowXY() {
                    var xy = {};
                    if(window.screenX) {
                        xy.x = window.screenX;
                        xy.y = window.screenY;
                    }
                    else if(window.screenLeft) {
                        xy.x = window.screenLeft;
                        xy.y = window.screenTop;
                    }
                    return xy;
                }
                function windowWidthHeight() {
                    var wh = {};
                    if(window.outerWidth) {
                        wh.width = window.outerWidth;
                        wh.height = window.outerHeight;
                    }
                    else if(document.documentElement.offsetWidth) {
                        wh.width = document.documentElement.offsetWidth;
                        wh.height = document.documentElement.offsetHeight;
                    }
                    else if(document.body.offsetWidth) {
                        wh.width = document.body.offsetWidth;
                        wh.height = document.body.offsetHeight;
                    }
                    return wh;
                }                
                function htmlWidthHeight() {
                    return {
                        width: window.documentElement.scrollWidth,
                        height: window.documentElement.scrollHeight
                    };
                }
                function bodyWidthHeight() {
                    return {
                        width: window.body.scrollWidth,
                        height: window.body.scrollHeight
                    };
                }
                function viewPortWidthHeight() {
                    var wh = {};
                    if(window.innerWidth) {
                        wh.width = window.innerWidth;
                        wh.height = window.innerHeight;
                    }
                    else if(document.documentElement.clientWidth) {
                        wh.width = document.documentElement.clientWidth;
                        wh.height = document.documentElement.clientHeight;
                    }
                    else if(document.body.clientWidth) {
                        wh.width = document.body.clientWidth;
                        wh.height = document.body.clientHeight;
                    }
                    return wh;
                }
                function scrollXY() {
                    var xy = {};
                    if(window.pageXOffset) {
                        xy.x = window.pageXOffset;
                        xy.y = window.pageYOffset;
                    }
                    else if(document.documentElement.srollLeft) {
                        xy.x = document.documentElement.srollLeft;
                        xy.y = document.documentElement.srollTop;
                    }
                    else if(document.body.srollLeft) {
                        xy.x = document.body.srollLeft;
                        xy.y = document.body.srollTop;
                    }
                    return xy;
                }
                
                var message1 = document.getElementById('message1');
                opacity(message1, 0.5);
                
                var viewPortWH = viewPortWidthHeight();
                
                message1.style.width = viewPortWH.width + 'px';
                message1.style.paddingTop = viewPortWH.height / 2 + 'px'
                message1.style.height = viewPortWH.height / 2 + 'px';
                
                document.getElementById('confirm').onclick = function() {
                    message1.style.width = '0px';
                    message1.style.height = '0px';
                    message1.style.paddingTop = '0px';
                    message1.style.display = 'none';
                };
            };
        </script>   
		
</head>
<!--manifest="cache.manifest" -->
<html role="main" lang="zh-Hans-TW">

<body ondragstart="return false;" ondragstart="return false;" oncontextmenu="return false;"> <!--滑鼠右鍵鎖定-->

	<script src="dist/jquery-1.11.1.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
    <script src="dist/jquery.bootgrid.min.js"></script>
    <style type="text/css">
            /*SELECT ELEMENT WITH UNICODE SYMBOL: DOWN-ARROW (&#x25bc;)*/
            select#selectPointOfInterest
            {
               width                    : 185pt;
               height                   : 40pt;
               line-height              : 40pt;
               padding-right            : 20pt;
               text-indent              : 4pt;
               text-align               : left;
               vertical-align           : middle;
               box-shadow               : inset 0 0 3px #606060;
               border                   : 1px solid #acacac;
               -moz-border-radius       : 6px;
               -webkit-border-radius    : 6px;
               border-radius            : 6px;
               -webkit-appearance       : none;
               -moz-appearance          : none;
               appearance               : none;  /*IMPORTANT*/
               font-family              : Arial,  Calibri, Tahoma, Verdana;
               font-size                : 18pt;
               font-weight              : 500;
               color                    : #000099;
               cursor                   : pointer;
               outline                  : none;
            }
            select#selectPointOfInterest::-ms-expand {display: none;} /*FOR IE*/
            select#selectPointOfInterest option
            {
                padding             : 4px 10px 4px 10px;
                font-size           : 11pt;
                font-weight         : normal;
            }
            select#selectPointOfInterest option[selected]{ font-weight:bold}
            select#selectPointOfInterest option:nth-child(even) { background-color:#f5f5f5; }
            select#selectPointOfInterest:hover {font-weight: 700;}
            select#selectPointOfInterest:focus {box-shadow: inset 0 0 5px #000099; font-weight: 600;}

            /*LABEL FOR SELECT*/
            label#lblSelect{ position: relative; display: inline-block;}
            /*DOWNWARD ARROW (25bc)*/
            label#lblSelect::after
            {
                content                 : "\25bc";
                position                : absolute;
                top                     : 0;
                right                   : 0;
                bottom                  : 0;
                width                   : 20pt;
                line-height             : 40pt;
                vertical-align          : middle;
                text-align              : center;
                background              : #000099;
                color                   : #fefefe;
               -moz-border-radius       : 0 6px 6px 0;
               -webkit-border-radius    : 0 6px 6px 0;
                border-radius           : 0 6px 6px 0;
                pointer-events          : none;
            }
    </style>
    <script>
	
		function myFunctionlistupdata(action) {
			//alert("刷新頁面");
			$.ajax({
				type: "POST",  
				url: "ddresponse.php",  
				//data: { "action":action, "time": time },
				data: { "action":action },
				dataType: "text",       
				success: function(response)   //>>>>>>重點<<<<<< response 為php 回傳的json 檔，為array 包array
				{
					//alert("刷新頁面完成 Success1");
					$('#'+action+'_model').modal('hide');
					//$(#edit_id).modal('hide');
					$("#employee_grid").bootgrid('reload');
				},
					error: function() 
					{
						alert('失敗 Error 0x1f');
						//$( '.message' ).addClass( 'error' ).html( data );
						$("#employee_grid").bootgrid('reload');
					}
				});
			}
		function createCookie(name,value,days) {
			if (days) {
				var date = new Date();
				date.setTime(date.getTime()+(days*24*60*60*1000));
				var expires = "; expires="+date.toGMTString();
			}
			else var expires = "";
			document.cookie = name+"="+value+expires+"; path=/";
		}

		function readCookie(cname) {
			var name = cname + "=";
			var decodedCookie = decodeURIComponent(document.cookie);
			var ca = decodedCookie.split(';');
			for(var i = 0; i <ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}
		
		function eraseCookie(name) {
			createCookie(name,"",-1);
		}
		
		function check_view_update(){
			//alert("reload function"); 
			//alert("in.....");
			action = 'tableupdate';
				$.ajax({
					 type: "POST",  
					 url: "ddresponse.php",  
					 data: { "action":action },
					 dataType: "text",       
					 success: function(response)  
					 {
						//alert("check_view_update"); 
						//response = {"Status":[{"0":"1","uploadTime":"1"}]} 
						//response = {"Status":[{"0":"0","uploadTime":"0"}]} 
						//document.write(response+"</br>");// text message
						//alert(document.cookie);
						var qq=JSON.parse(response);
						var mytoken = readCookie("token");
						//var mytoken = document.cookie;
						//document.write(" state 1：" + qq.Status[0][0] + "<br>");// text message
						//document.write(" [uploadTime] 2：" + qq.Status[0]["uploadTime"] + "<br>");// text 
						//alert(qq.Status[0]["uploadTime"]+"<===>"+mytoken);
						if(mytoken != qq.Status[0]["uploadTime"]){
							//document.cookie = "isSelect=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
							//document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
							alert("偵測更新, 自動更新");
							//document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
							//document.cookie = "token="+ qq.Status[0]["uploadTime"];
							//eraseCookie("token");
							createCookie("token",qq.Status[0]["uploadTime"],365);
							
							myFunctionlistupdata('updatalist');	// 表單顯示更新
							window.location.reload();

							//--------------------------------------------------------------------------------------------------------寫程式寫到頭暈   程式這邊這邊
							//parent.window.location.reload(true); //  
							
						}else{
							//alert("偵測無更新");
							//document.cookie = "token=;, 01 Jan 1970 00:00:00 UTC;";
							//document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
							//alert("false");
						}

					 },
					 error: function (request, error) {
						alert(" 資料更新逾時,請在更新一次 : " + Interrupt );
					 },
					 200: function() {
						alert("Msg 200");
					 },
					 403: function() {
						alert("Msg 403");
					 },
					 404: function() {
						alert("Msg 404");
					 }
				});
		
		} 

			//todo :next tie
		var t2 = window.setInterval("check_view_update()",15000); //1000 = 1s//-------------------------------------------------------------D E B U G
		
		
		
		<!-- begin
		/*
		document.onmousedown=click;
		document.onkeydown=click;
		if (document.layers) window.captureEvents(Event.MOUSEDOWN); window.onmousedown=click;
		if (document.layers) window.captureEvents(Event.KEYDOWN); window.onkeydown=click;
		function click(e){
		if (navigator.appName == 'Netscape'){
		if (e.which != 1){
		//alert("已上鎖 , 無法複製!");
		return false;}}
		
		//if (navigator.appName == "Microsoft Internet Explorer"){
		//if (event.button != 1){
		//alert("已上鎖 , 無法複製");return false;}}
		
		if (navigator.appName.indexOf("Internet Explorer") != -1)
		document.onmousedown = noSourceExplorer;
			function noSourceExplorer(){if (event.button == 2 | event.button == 3)
			{
				//alert("偷複製是不對的唷！！");
			}
		}
		*/
		// end -->
    </script>

   
		
	<p id="demo"></p>
	<form id="mian_form" style="font-size:22px" action="mymain" width = "100%" style="display: none;">
     
            <div class="col-sm-12">
                <div class="well clearfix">
                    <h1><span style="color:#E63E00;">大昶貿易股份有限公司 TAI CHONG CO .,LTD.</span></h1>
                    <h1><span style="color:#008866;">現場 - 工作回報 / Situs Kerja - Pekerjaan Kembali Proyek</span></h1>
				</div>		
			</div>			
	
	</form>
   
    <form id = "mainform" style="font-size:22px" action="mymain" width = "100%">
    <!--<h1><span style="color:#008866;">邊界測試1</span></h1>-->
        <div class="full-width">
       
                    <div class="well clearfix">
                        <div class="form-group">
							<!--<style>.form-control{ width: 100%;}</style>-->
                            <label  for="choices3">部 門 / Departemen : </label>						
                            <!--<select name="select1" class="form-control"id="dept3" onchange="mySelectOnChangeFunction(this)">-->
							<label for="choices4">
							<select name="select1" class="form-control" id="dept3">
                                <!--
                                <option>CNC-1</option>
                                <option>傳統銑床</option>
                                <option>研磨</option>
                                -->
                                <?php echo $optiontables;?>
                            </select>   
							</label>						
                        </div>
						<div style="text-align:center;clear:both">
							<!--<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>-->
							<!--<script src="/follow.js" type="text/javascript"></script>-->
							<!--<a class="btn btn-large btn-blue btn-radius" type ="button" onclick="history.back()" >回到上一頁 / Halaman sebelumnya </a>-->
							<!--<a><button class="w3-button w3-white w3-border w3-border-red w3-round-large">Button</button>-->
							<button><a  class="w3-button w3-white w3-border w3-border-red w3-round-large" style="color: #0044BB;" id="btnintohistory" href="#"> 歷 史 資 料 / Daftar riwayat </a></button>
							<!--<button><a class="btn btn-large btn-blue btn-radius" id="MyButtonupdatalist" href="#"> 資 料 更 新 / Pembaruan data </a></button>-->
							<a style="color:#000000;"> - </a>
							<button><a  class="w3-button w3-white w3-border w3-border-red w3-round-large" style="color: #0044BB;" id="MyButtonupdatalist" href="#"> 資 料 更 新 / Pembaruan data </a></button>
							<!--<a class="btn btn-large btn-blue btn-radius" id="light_box_show" href="#"> light_box show </a>-->
							
						</div>
                    </div>
          
        </div>

		<!--<input type="button" value="測 試 強 制 自 動 更 新" id="MyButtonupdatalist" >-->
		<!--<a href="JavaScript: location.reload(true);">Refresh page</a>-->
            <table border="0" style="font-size:22px;font-family:serif;" cellspacing="0" class="table table-bordered table-hover table-striped" data-toggle="bootgrid" id="employee_grid" width="90%">
                
				<thead> 
                    <tr>
                        <th data-column-id="id" data-identifier="true" data-type="numeric">id</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false"><span class="badge badge-success">控制項目</span></th>
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
    
    <div class="modal fade" id="save_model">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                    <h4 class="modal-title">項目 請確認姓名.</h4>
                    <h4 class="modal-title">Mohon konfirmasi nama anggota staf.</h4>
                </div>
                <div class="modal-body">
                    <form id="frm_edit" method="post" name="frm_edit">
					
					<input id="selected" name="selected" type="hidden" value="edit">
					<input id="edit_selected" name="edit_selected" type="hidden" value="0">
					
                        <input id="action" name="action" type="hidden" value="edit"> <input id="edit_id" name="edit_id" type="hidden" value="0">

                            <div>
								<label for="choices3">時間    Time (Y/M/D)&nbsp&nbsp:&nbsp&nbsp </label> 
								<BODY OnLoad="DigitalTime1()"><SPAN id="LiveClock1"></SPAN>
                            </div>

                       <div>
                        <label id="lblSelect">
                            <label for="choices3">姓名    Name&nbsp:&nbsp&nbsp </label>
                            <select id="selectPointOfInterest" title="Select points of interest nearby">
                                <?php echo $options;?>
                            </select>
                        </label>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
							<button class="btn btn-primary" id="btn_edit" type="button">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
					

    </div>
    
	<script type="text/javascript">
		function mySelectOnChangeFunction(obj) {
			var w = document.getElementById("dept3").selectedIndex;
            var z = document.getElementById("dept3").options;
            alert("joblistmc Index: " + z[w].index + " is " + z[w].text);
			//$myselectvalue = z[w].index;
			//alert(obj.selectedIndex);
			
			 $.ajax({
				 type: "POST",  
				 url: "ddresponse.php",  
				 data: { "miantable":z[w].text},
				 dataType: "text",       
				 success: function(response)  
				 {
					alert("mySelectOnChangeFunction    success");
					
					$('#'+action+'_model').modal('hide');
					$("#employee_grid").bootgrid('reload');

					 document.getElementById("demo").innerHTML = "set select : " + z[w].text;
					$("#employee_grid_record").bootgrid('reload');
				 },
				 error: function() 
				 {
					alert("error");
					$( '.message' ).addClass( 'error' ).html( data );
					$("#employee_grid_record").bootgrid('reload');
				 }    
			});
		}	
	</script>
		
    
     <script type="text/javascript">
	 
    $("body").bind("keydown",function(e){     
    e=window.event||e;
     
     if(event.keyCode==32){
        return false; 
     }
       //禁止f1
    
     if(event.keyCode==112){
        e.keyCode = 0; //IE下需要设置为keyCode为false 
        return false; 
     }  
     
       //禁止f4
    
     if(event.keyCode==115){
        e.keyCode = 0; //IE下需要设置为keyCode为false 
        return false; 
     }  
     
     //禁止f5
    /*
     if(event.keyCode==116){
        e.keyCode = 0; //IE下需要设置为keyCode为false 
        return false; 
     }  
     */
     //禁止f6
    
     if(event.keyCode==117){
        e.keyCode = 0; //IE下需要设置为keyCode为false 
        return false; 
     }  
     
     //禁止f7
    
     if(event.keyCode==118){
        e.keyCode = 0; //IE下需要设置为keyCode为false 
        return false; 
     }  
     
     //禁止f8
    
     if(event.keyCode==119){
        e.keyCode = 0; //IE下需要设置为keyCode为false 
        return false; 
     }  
     
     //禁止f9
    
     if(event.keyCode==120){
        e.keyCode = 0; //IE下需要设置为keyCode为false 
        return false; 
     }  
     
     //禁止f10
    
     if(event.keyCode==121){
        e.keyCode = 0; //IE下需要设置为keyCode为false 
        return false; 
     }  
     
     //禁止f11
	/*
     if(event.keyCode==122){
        e.keyCode = 0; //IE下需要设置为keyCode为false 
        return false; 
     }
	*/	 
     
     //禁止f12
    /*
     if(event.keyCode==123){
        e.keyCode = 0; //IE下需要设置为keyCode为false 
        return false; 
     }  
	 */
     
   
     //禁止Alt+  方項鍵← 
     //禁止Alt+  方項鍵→
     if ((event.altKey)&&((event.keyCode==37)||(event.keyCode==39)))  
     { 
        event.returnValue=false; 
        return false;
     }
  
    //禁止BACKSPACE
	 /*
     if(event.keyCode==8){
        return false; 
     }
	 */
  
    //禁止CTL+R
    if((event.ctrlKey) && (event.keyCode==82)){
       e.keyCode = 0;  
       return false; 
    }
    
    //禁止CTL+F4
    if((event.ctrlKey) && (event.keyCode==115)){
       e.keyCode = 0;  
       return false; 
    }
    
    if ((window.event.altKey)&&(window.event.keyCode==115)) //禁止Alt+F4
    {
        window.showModelessDialog("about:blank","","dialogWidth:1px;dialogheight:1px");
        return false;
    }
    //禁止ALT+F4
    if((event.altKey) && (event.keyCode==115)){
       e.keyCode = 0;  
       return false; 
    }

 }); 

    </script>

    <script type="text/javascript">
        //selection css
        var x, i, j, selElmnt, a, b, c;
        //look for any elements with the class "custom-select":
        x = document.getElementsByClassName("custom-select");
        for (i = 0; i < x.length; i++) {
          selElmnt = x[i].getElementsByTagName("select")[0];
          //for each element, create a new DIV that will act as the selected item:
          a = document.createElement("DIV");
          a.setAttribute("class", "select-selected");
          a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
          x[i].appendChild(a);
          //for each element, create a new DIV that will contain the option list:
          b = document.createElement("DIV");
          b.setAttribute("class", "select-items select-hide");
          for (j = 1; j < selElmnt.length; j++) {
            //for each option in the original select element,create a new DIV that will act as an option item:
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                //when an item is clicked, update the original select box,and the selected item:
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                  if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                      y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                  }
                }
                h.click();
            });
            b.appendChild(c);
          }
          x[i].appendChild(b);
          a.addEventListener("click", function(e) {
              //when the select box is clicked, close any other select boxes,and open/close the current select box:
              e.stopPropagation();
              closeAllSelect(this);
              this.nextSibling.classList.toggle("select-hide");
              this.classList.toggle("select-arrow-active");
          });
        }
        function closeAllSelect(elmnt) {
          //a function that will close all select boxes in the document, except the current select box:
          var x, y, i, arrNo = [];
          x = document.getElementsByClassName("select-items");
          y = document.getElementsByClassName("select-selected");
          for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
              arrNo.push(i)
            } else {
              y[i].classList.remove("select-arrow-active");
            }
          }
          for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
              x[i].classList.add("select-hide");
            }
          }
        }
        //if the user clicks anywhere outside the select box,then close all select boxes:
        document.addEventListener("click", closeAllSelect);
        
    </script>

    
    <SCRIPT LANGUAGE="JavaScript">
        function DigitalTime1()
        {
            var d=new Date()
            var day;
            day =(d.getYear()+1900)+ "/ "+ (d.getMonth()+1)+ "/ "+d.getDate()+ "/ "
            if(d.getDay()==0) day += "星期日 "
            if(d.getDay()==1) day += "星期一 "
            if(d.getDay()==2) day += "星期二 "
            if(d.getDay()==3) day += "星期三 "
            if(d.getDay()==4) day += "星期四 "
            if(d.getDay()==5) day += "星期五 "
            if(d.getDay()==6) day += "星期六 "
            var h=d.getHours()
            var m=d.getMinutes()
            var s=d.getSeconds()
            //var time =day + ((h > 12) ? h - 12 : h)
            var time =day + (h)
            time += ((m < 10) ? ":0" : ":") + m
            time += ((s < 10) ? ":0" : ":") + s
            //time += (h >= 12) ? " PM." + "" : " AM." + ""
            LiveClock1.innerHTML = "<FONT SIZE=5 FACE='arial' COLOR=000099><B><FONT SIZE=3>" + " </FONT>" + time + "</FONT>"
            setTimeout("DigitalTime1()",1000)

        }
    </SCRIPT>
    
    <script type="text/javascript">
    
    $( document ).ready(function() {
        
		// show the alert
		/*
		setTimeout(function() {
			$(".alert").alert('close');
		}, 2000);
		*/
        var select_g_id = 0;
        //var docElm = document.documentElement;
        //docElm.requestFullscreen();
        //$('#dept3').multiselect();
        //$('#dept4').multiselect();
         
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
           
           url: "ddresponse.php",
           formatters: {
               "commands": function(column, row)
               {
                   return  "<button type=\"button\" class=\"btn btn-xl btn-info command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"><\/span> 自動日期<\/button> "
                   //+ 
                   //"<button type=\"button\" class=\"btn btn-xl btn-default command-edit2\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-plus-sign\"><\/span><\/button>"  
                   //+
                   //"<button type=\"button\" class=\"btn btn-xl btn-danger command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"><\/span> 按鍵<\/button>"
                   ;
               }
           }
       }).on("loaded.rs.jquery.bootgrid", function()
       {
       /* Executes after data is loaded and rendered */
           grid
           .find(".command-edit").on("click", function(e)
           {
                   var ele =$(this).parent();
                   var g_id = $(this).parent().siblings(':first').html();
                   select_g_id = g_id;
                   var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
                   console.log(">>>>>>>>>>"+g_id);
                   console.log(g_name);

				   $("#employee_grid").bootgrid('reload');
                   $('#save_model').modal('show');
                   if($(this).data("row-id") >0) {             
                       // collect the data
                       $('#edit_id').val(ele.siblings(':first').html()); // in case we're changing the key
	                   $('#edit_label1').val(ele.siblings(':nth-of-type(3)').html());
					   $('#edit_label2').val(ele.siblings(':nth-of-type(4)').html());
	                   $('#edit_label3').val(ele.siblings(':nth-of-type(5)').html());
	                   $('#edit_label4').val(ele.siblings(':nth-of-type(6)').html());
	                   $('#edit_label5').val(ele.siblings(':nth-of-type(7)').html());
					   $('#edit_label6').val(ele.siblings(':nth-of-type(8)').html());
					   $('#edit_label7').val(ele.siblings(':nth-of-type(9)').html());
					   $('#edit_label8').val(ele.siblings(':nth-of-type(10)').html());
					   $('#edit_label9').val(ele.siblings(':nth-of-type(11)').html().replace('&nbsp;', ""));
					   $('#edit_label10').val(ele.siblings(':nth-of-type(12)').html().replace('&nbsp;', ""));
					   $('#edit_label11').val(ele.siblings(':nth-of-type(13)').html().replace('&nbsp;', ""));
					   $('#edit_label12').val(ele.siblings(':nth-of-type(14)').html().replace('&nbsp;', ""));
					   $('#edit_label13').val(ele.siblings(':nth-of-type(15)').html().replace('&nbsp;', ""));
					   <!--$('#edit_label14').val(ele.siblings(':nth-of-type(16)').html().replace('&nbsp;', ""));-->
                   } else {
                        alert('Now row selected! First select row, then click edit button');
                   }
           });
        });
        /*.end()
        .find(".command-edit2").on("click", function(e)
        {
        )}
        ;
        */
        function myFunction(action) {
            /*
            1. get name.
            2. get time.
            3. filter if name  = '空值'; 不動作
            4. set to upload to server.
            5. final to replay view.
            */
            // 1. get selection
            var x = document.getElementById("selectPointOfInterest").selectedIndex;
            var y = document.getElementById("selectPointOfInterest").options;
            //alert("joblistmc Index: " + y[x].index + " is " + y[x].text);
            // 2. 值接再抓一次時間, 與顯示的地方不同以後要整合, 請先搞清楚如何如何回傳福和html以及js的格式.
            var d=new Date()
            var day;
            day = (d.getYear()+1900)+ "-"+ (d.getMonth()+1)+ "-"+d.getDate()+ "/ "
            if(d.getDay()==0) day += "星期日 "
            if(d.getDay()==1) day += "星期一 "
            if(d.getDay()==2) day += "星期二 "
            if(d.getDay()==3) day += "星期三 "
            if(d.getDay()==4) day += "星期四 "
            if(d.getDay()==5) day += "星期五 "
            if(d.getDay()==6) day += "星期六 "
            var h=d.getHours()
            var m=d.getMinutes()
            var s=d.getSeconds()
            //var time =day + ((h > 12) ? h - 12 : h)
            var time =day + (h)
            time += ((m < 10) ? ":0" : ":") + m
            time += ((s < 10) ? ":0" : ":") + s
            //time += (h >= 12) ? " PM." + "" : " AM." + ""
            //alert("joblistmc Time: " + time);
            //var e = document.getElementById("nfAttendant");
            //var strUser = e.options[e.selectedIndex].value;   
            //data = $("#frm_"+action).serializeArray();
            //document.getElementById("demo").innerHTML = "myDebug serializeArray: " + data;
            //document.getElementById("demo").innerHTML = "myDebug serializeArray: " + data;
            var select = document.getElementById("selectPointOfInterest").options;
            //var table = document.getElementById("employee_grid");success: function(response)  
            //var selectrow = table.getElementsByTagName("tr");
             //data = jQuery.parseJSON(data);
			var w = document.getElementById("dept3").selectedIndex;
            var z = document.getElementById("dept3").options;
               $.ajax({
                 type: "POST",  
                 url: "ddresponse.php",  
                 data: { "miantable":z[w].text, "id":select_g_id, "action":action,"name": y[x].text, "time": time },
                 dataType: "text",       
                 success: function(response)   //>>>>>>重點<<<<<< response 為php 回傳的json 檔，為array 包array
                 {
					//alert('刷新頁面完成 Success1');
					/*
                        for (var i =0;i<5;i++)
                        {
                            console.log(i);
                            ccname[i] = new Array();
                            for(var j in  response[i])
                            {
                                  //console.log(j);
                                  //console.log(response[i][j]);
                                  // j 為代號 ex MA01
                                  //response[i][j] 為題目
                                  ccname[i][index] = j+" "+response[i][j];         
                                  console.log(ccname[i][index]);
                                  index++;
                            }
                            index=0;
                        }
						
                   	alert('完成 Success2');
					*/
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
      
	  //Create or Update cookie
		function create_cookie(name, value, days2expire, path) {
		  var date = new Date();
		  date.setTime(date.getTime() + (days2expire * 24 * 60 * 60 * 1000));
		  var expires = date.toUTCString();
		  document.cookie = name + '=' + value + ';' +
						   'expires=' + expires + ';' +
						   'path=' + path + ';';
						   return;
		}
		//Delete cookie
		function delete_cookie(name) {
		  document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
		  return;
		}
		// 頁面刷新 將已完成的表單搬移
		function myFunctionlistupdata(action) {
			  $.ajax({
                 type: "POST",  
                 url: "ddresponse.php",  
                 //data: { "action":action, "time": time },
				 data: { "action":action },
                 dataType: "text",       
                 success: function(response)
                 {
                    $('#'+action+'_model').modal('hide');
                    $("#employee_grid").bootgrid('reload');
                 },
                 error: function() 
                 {
                     alert('失敗 Error 0x1f');
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
		
		function ajaxActionSelect(action) {
			var w = document.getElementById("dept3").selectedIndex;
            var z = document.getElementById("dept3").options;
			document.cookie = "cookieSelectionName="+ z[w].text;
			document.location.href="http://"+"168.2.9.22"+"/multi_upload_txt/joblistmc.php"+"?"+"sid"+"="+ z[w].text;
			data = $("#frm_"+action).serializeArray();
		
			$.ajax({
				type: "POST",  
				url: "response.php",  
				data: data,
				dataType: "json",       
				success: function(response)  
				{
					$('#'+action+'_model').modal('hide');
					$("#employee_grid").bootgrid('reload');
				},
				error: function() 
				{
				$( '.message' ).addClass( 'error' ).html( data );	
				$("#employee_grid_record").bootgrid('reload');
				}    
			});
			 $("#employee_grid").bootgrid('reload');
		}
		  //Un used
		  // Show lightbox
		  function show_lightbox(){
			$('.lightbox_bg').show();
			$('.lightbox_container').show();
		  }
		  //Un used
		  // Hide lightbox
		  function hide_lightbox(){
			$('.lightbox_bg').hide();
			$('.lightbox_container').hide();
		  }
		function show_loading(){
				$('#loading_spinner_form').show();
				$('#loading_spinner_class1').show();
				$('#loading_spinner_class2').show();
				$('#loading_spinner').show();
				$('#mainform').hide();
		  }
		function hide_loading(){
				$('#loading_spinner_form').hide();
				$('#loading_spinner_class1').show();
				$('#loading_spinner_class2').show();
				$('#loading_spinner').show();
				$('#mainform').show();
		  }
		function ajaxAction(action) {
			document.getElementById("demo").innerHTML = "ajaxAction in 1";
			var w = document.getElementById("dept3").selectedIndex;
            var z = document.getElementById("dept3").options;
			var newlel = '{ "miantable" : z[w].text }';
			document.getElementById("demo").innerHTML = "ajaxAction in 2";
			data = $("#frm_"+action).serializeArray();
			document.getElementById("demo").innerHTML = "ajaxAction in 3";
			//data.push(JSON.parse(newlel));
			//document.getElementById("demo").innerHTML = "ajaxAction in 4";
			document.cookie = "cookieSelectionName="+ z[w].text;
			var obj = {"action":action, "miantable":readCookie('cookieSelectionName')};
			var data = JSON.stringify(obj);
			//document.getElementById("demo").innerHTML = "myDebug serializeArray: " + readCookie('cookieSelectionName');

           $.ajax({
             type: "POST",  
             url: "ddresponse.php",  
             data: {"action":action, "miantable":z[w].text},
             dataType: "text",       
             success: function(response)  
             {
				//alert("success");
				$('#'+action+'_model').modal('hide');
				//$("#employee_grid").bootgrid('reload');
             },
             error: function() 
             {
				alert("error 請通知工程師處理!");
				$( '.message' ).addClass( 'error' ).html( data );
				$("#employee_grid_record").bootgrid('reload');
             }    
           });
		}
			$( "#command-add" ).click(function() {
			   $('#add_model').modal('show');
			});
			
			$( "#btn_add" ).click(function() {
			   //ajaxAction('add');
			});
			
			$( "#btn_edit" ).click(function() {
				myFunction('save');
			});

			 $( "#dept3" ).change(function() {
			   //alert("found select event");
			   //document.cookie = "isSelect=true";// 
			   ajaxActionSelect('selected');
			   //alert("select111111111");
			   //doto job list 程式移植到外暴php
			});
			
			$( '#MyButtonupdatalist' ).click(function(){
				//alert("更新");
				myFunctionlistupdata('updatalist');
				//$("#employee_grid_record").bootgrid('reload');
				
				window.location.reload();
				
			});
			$( '#btnintohistory' ).click(function(){
				//alert("歷史頁面");
				//showWindow('http://'<?=$serverhostip?><?=$serverfolder?><?=$count1?> );
 
			  window.location.replace('http://168.2.9.22/multi_upload_txt/history.php?sid=0');
			});
			
			
			$( '#light_box_show' ).click(function(){
				show_loading();
				
			});
			
			$( '#light_box_hide' ).click(function(){
				hide_loading();
			});
			
			$( '#first' ).click(function(){

			});
    });
    </script>
<a>Version 1.0<br></a>
<a><?php echo " Client update time :".$_COOKIE["token"]."<br>" ;?></a>
<!--<a><?php echo " System update time :".$_COOKIE["token"]."<br>" ;?></a>-->
</body>
</html>