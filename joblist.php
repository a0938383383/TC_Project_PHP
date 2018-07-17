<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	//SELECT OPTION DB TABLE
	//require ("pconnection.php"); //Release ===============
	//require_once ("connection/connection_person.php"); //Debug ===============
	session_start();
	$switch_id = $_GET['sid'];
	
	$cookie_name = "cookieSelectionName";
	
	if($switch_id == 0){
		//echo "herf sid 2:" . $switch_id."<br>";
		//echo "Log Msg : 請新增部門工作項目, 目前無定新的工作項目.";
		//setcookie("cookieSelectionName","", 1);
		/*
		$pdb = new dbpObj();
		$pconnString =  $pdb->getConnstring();
		$pquery = "SELECT * FROM `unit`";
		$presult0 = mysqli_query($pconnString, $pquery);
		$row0  = mysqli_fetch_array($presult0);
		$switch_id = $row0[0];
		setcookie("cookieSelectionName","$switch_id", time()+3600*8);
		*/
		//document.location.href="http://"+"168.2.9.22"+"/multi_upload_txt/joblist.php"+"?"+"sid"+"="+$switch_id ;
		//setcookie("isSelect","false");
	} else if(isset($_COOKIE[$cookie_name])) {
		echo "Cookie named '" . $cookie_name . "' is set! Value is :". $_COOKIE[$cookie_name]."<br>";
		
	} else  {
		echo "what the fuck";
	}
?>

<head>
	<!--<meta http-equiv="refresh" content="50;" charset="UTF-8-->
	<meta charset="UTF-8"/>
	<article>
		<title>生管單位目錄</title>
	</article>
	<script type="text/javascript">
		//document.cookie = "isSelect=false";// 
	</script>
	<!--<link rel="stylesheet" href="css/style.css" medi="screen" type="text/css" />-->
</head>

<?php
	require ("connipconf.php");
?>

<?php

	 // 上傳項目管理
    require ("connection/mcconnection.php");

    $mcdb = new dbmcObj();
    $mcconnString =  $mcdb->getConnstring(0);
    $mcquery = "SHOW TABLES";
    $mcresult1 = mysqli_query($mcconnString, $mcquery);
    $optiontables = "";
	//$optiontables = $optiontables."<option>請選擇....</option>";
	$select00 = isset($_COOKIE["cookieSelectionName"]) != '' ? $_COOKIE["cookieSelectionName"] : '';
	//echo "<br>"."init selected = ".$select00."<br>";
    while($row3  = mysqli_fetch_array($mcresult1))
    {
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
	//echo "set selected3 = ".$optiontables;
	//echo "<br>";
?>

<?php

	if(isset($_POST['select1'])){
		$select1 = $_POST['select1'];
		/*
		switch ($select1) {
			case 'value1':
				echo 'this is value1<br/>';
				break;
			case 'value2':
				echo 'value2<br/>';
				break;
			default:
				# code...
				break;
		}
		*/
	}
?>

<body onselectstart="return true;" ondragstart="return true;" oncontextmenu="return true;"> <!--滑鼠右鍵鎖定-->
	
	
	<script language="JavaScript1.1">
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
	
	<link href="dist/bootstrap.min.css" media="all" rel="stylesheet" type="text/css">
	<link href="dist/jquery.bootgrid.css" rel="stylesheet">
	
	<script src="dist/jquery-1.11.1.min.js"></script>
	<!--<script src="dist/jquery-3.3.1.js"></script> --><!-- 新版本 下一版本工作試著加入-->
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
	
	<!-- 字動換行 Star -->
	<!--<style type="text/css">
	.AutoNewline
	{
	word-break: break-all;/*必須*/
	}
	</style>

	<table>
	<tr>
	<td class="AutoNewline">自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行自動換行</td>
	</tr>
	</table>
	-->
	<!-- 字動換行 End -->
    <p id="demo"></p>
	<form style="font-size:22px" action="mymain" width = "100%">
		<div class="full-width">
			<div class="col-sm-60">
				<div class="col-sm-12">
					<div class="well clearfix">

						<h1><span style="color:orange;">大昶貿易股份有限公司 TAI CHONG CO .,LTD.</span></h1>
						<h1><span style="color:#008866;">生管-工作回報</span></h1>

						<div class="form-group">
							<style>.form-control{ width: 100%;}</style>
							<label for="choices3">部 門 : </label>
							<select class="form-control" id="dept3">
								<?php echo $optiontables;?>		
							</select>
						</div>
						<!--<div class="wrap">-->
						<div style="text-align:center;clear:both">
							<!--<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>-->
							<!--<script src="/follow.js" type="text/javascript"></script>-->
							<a class="btn btn-large btn-blue btn-radius" type ="button" onclick="history.back()" >回到上一頁</a>
							<a class="btn btn-large btn-blue btn-radius" id="btnintohistory" href="#"> 歷 史 資 料 </a>
							<a class="btn btn-large btn-blue btn-radius" id="MyButtonupdatalist" href="#"> 資 料 更 新 </a>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
			<!--<input type="button" value="測 試 強 制 自 動 更 新" id="MyButtonupdatalist" >-->
			
			<table border="0" style="font-size:22px;font-family:serif;"  cellspacing="0" class="table table-bordered table-hover table-striped" data-toggle="bootgrid" id="employee_grid" width="80%">
				<thead> 
					<tr>
						<th data-column-id="id" data-identifier="true" data-type="numeric">id</th>

						<th data-column-id="commands" data-formatter="commands" data-sortable="false"> <font color="blue"> <span class="badge badge-success">控制項目</span> </font></th>
						
						<!--  中文測試 -->
						<th data-column-id="工單編號">工單編號</th></td>
						<th data-column-id="規格">規格</th>
						<th data-column-id="數量">數量</th>
						<th data-column-id="客戶">客戶</th>
						<th data-column-id="交期">交期</th>
						<th data-column-id="工作類別">工作類別</th>
						<th data-column-id="工作站">工作站</th>
						<th data-column-id="工作內容">工作內容</th>
						<th data-column-id="備註">備註</th>
						<!--<th data-column-id="保留">保留</th>-->
						<th data-column-id="開始日期">開始日期</th>
						<th data-column-id="完成日期">完成日期</th>
						

						<th data-column-id="製程開始">製程開始</th>
						<th data-column-id="開始人員">開始人員</th>
						<th data-column-id="製程完成">製程完成</th>
						<th data-column-id="完成人員">完成人員</th>	

						
						<th data-column-id="createdDate1">排程產生時間</th>
					</tr>
				</thead>
			</table>
	</form><!--add_model-->

	
	
	<div class="modal fade" id="editrecord_model">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
					<h4 class="modal-title">項目 請確認進行項目</h4>
				</div>
				<div class="modal-body">
					<form id="frm_editrecord" method="post" name="frm_editrecord">
						<input id="action" name="action" type="hidden" value="edit"> <input id="edit_id" name="edit_id" type="hidden" value="0">
						<div class="form-group">
							<label class="control-label" for="name">工單編號 label_1:</label> <input class="form-control" id="edit_label1" name="edit_label1" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">規格 label_2:</label> <input class="form-control" id="edit_label2" name="edit_label2" type="text">
						</div>
						<!-- 以下修改 -->
						<div class="form-group">
							<label class="control-label" for="salary">數量 label_3:</label> <input class="form-control" id="edit_label3" name="edit_label3" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">客戶 label_4:</label> <input class="form-control" id="edit_label4" name="edit_label4" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">交期 label_5:</label> <input class="form-control" id="edit_label5" name="edit_label5" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">工作類別 label_6:</label> <input class="form-control" id="edit_label6" name="edit_label6" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">工作站 label_7:</label> <input class="form-control" id="edit_label7" name="edit_label7" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">工作內容 label_8:</label> <input class="form-control" id="edit_label8" name="edit_label8" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">備註 label_9:</label> <input class="form-control" id="edit_label9" name="edit_label9" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">開始日期 label_10:</label> <input class="form-control" id="edit_label10" name="edit_label10" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">完成日期 label_11:</label> <input class="form-control" id="edit_label11" name="edit_label11" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">製程開始 label_12:</label> <input class="form-control" id="edit_label12" name="edit_label12" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">開始人員 label_13:</label> <input class="form-control" id="edit_label13" name="edit_label13" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">製程完成 label_14:</label> <input class="form-control" id="edit_label14" name="edit_label14" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">完成人員 label_15:</label> <input class="form-control" id="edit_label15" name="edit_label15" type="text">
						</div>
						<!--
						<div class="form-group">
							<label class="control-label" for="salary">updatedDate1 label_14:</label> <input class="form-control" id="edit_label14" name="edit_label14" type="text">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="salary">createdDate1 label_15:</label> <input class="form-control" id="edit_label15" name="edit_label15" type="text">
						</div>
						-->
						
						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" id="btn_edit" type="button">Save</button>
						</div>
						
						<div class="btn-group dropup">
						<!--
							<button type="button" class="btn btn-default dropdown-toggle" 
								data-toggle="dropdown">
								默認 <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">功能</a></li>
								<li><a href="#">另一個功能</a></li>
								<li><a href="#">其他</a></li>
								<li class="divider"></li>
								<li><a href="#">分離的連接</a></li>
							</ul>
							<select id="dept4" ">
								<option value="1">Option 1</option>
								<option value="2">Option 2</option>
								<option value="3">Option 3</option>
								<option value="4">Option 4</option>
								<option value="5">Option 5</option>
								<option value="6">Option 6</option>
							</select>
							-->
							<!--<div class="styled-select yellow rounded">-->
							<!-- 選單側是項目拿走
							<div class="styled-select">
								
								<label for="choices3">姓名	Name : </label>
								<select>
									<?php //echo $options;?>
									
									
								</select>
								
							</div>
							-->
							
					   </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	

	<SCRIPT LANGUAGE="JavaScript">
		function DigitalTime1()
		{
			var d=new Date()
			var day;
			day = "Y/M/D: "+(d.getYear()+1900)+ "/ "+ (d.getMonth()+1)+ "/ "+d.getDate()+ "/ "
			
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
			var time =day + ((h > 12) ? h - 12 : h)
			time += ((m < 10) ? ":0" : ":") + m
			time += ((s < 10) ? ":0" : ":") + s
			time += (h >= 12) ? " PM." + "" : " AM." + ""
			LiveClock1.innerHTML = "<FONT SIZE=5 FACE='arial' COLOR=eec111><B><FONT SIZE=3>" + " </FONT>" + time + "</FONT>"
			setTimeout("DigitalTime1()",1000)
			
			
		}
	</SCRIPT>

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
	       
	       url: "ddresponse.php?job=",
	       formatters: {
	           "commands": function(column, row)
	           {
					return  "<button type=\"button\" class=\"btn btn-xl btn-info command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"><\/span> 修改<\/button> "  
					+ 
					//"<button type=\"button\" class=\"btn btn-xl btn-default command-edit2\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-plus-sign\"><\/span><\/button>"  
					//+ 
	                "<button type=\"button\" class=\"btn btn-xl btn-danger command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"><\/span> 刪除<\/button>";
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
	               var g_name = $(this).parent().siblings(':nth-of-type(3)').html();
	               console.log(g_id);
	               console.log(g_name);

	               $('#editrecord_model').modal('show');
	               if($(this).data("row-id") >0) {             
	                   // collect the data
					   <!-- str_replace('&nbsp;','', htmlentities(trim($typeValue)));--> <!-- 過濾 (空白字符 &nbsp; )-->
					   <!-- 顯示修改項目, 修改此項目, 依據為 -->
					   <!--nth-of-type(1)-->
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
	       }).end()
		
	    .find(".command-delete").on("click", function(e)
	    {
			var conf = confirm('請確認刪除第 ' + $(this).data("row-id") + ' 項目?');
	        alert(conf);
	            if(conf){
	                $.post(
	                    'ddresponse.php', 
	                    { id: $(this).data("row-id"), action:'delete'},
	                    function(){
	                        // when ajax returns (callback), 
	                        $("#employee_grid").bootgrid('reload');
	                    }
	                );
	            }
				   
		});
	    });
		

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
		
		
		// ajaxActionSelect * * * * * * * 
		function ajaxActionSelect(action) {
			var w = document.getElementById("dept3").selectedIndex;
            var z = document.getElementById("dept3").options;
			document.cookie = "cookieSelectionName" + " = " + z[w].text;
			
			document.location.href="http://"+"168.2.9.22"+"/multi_upload_txt/joblist.php"+"?"+"sid"+"="+ z[w].text;
			
			data = $("#frm_"+action).serializeArray();
			//document.getElementById("demo").innerHTML = "myDebug serializeArray: " + data;
			$.ajax({
				type: "POST",  
				url: "response.php",  
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
			
			//$("#employee_grid").bootgrid('reload');
		}
		
		
	   function ajaxAction(action) {
		   //alert("ajaxAction cmd : "+ action);
	       data = $("#frm_"+action).serializeArray();
		   //document.getElementById("demo").innerHTML = "myDebug serializeArray: " + data;
		   
		   
			var w = document.getElementById("dept3").selectedIndex;
            var z = document.getElementById("dept3").options;
			document.cookie = "cookieSelectionName="+ z[w].text;
			document.location.href="http://"+"168.2.9.22"+"/multi_upload_txt/joblist.php"+"?"+"sid"+"="+ z[w].text;
			
			/*
			$content = file_get_contents("http://"+"168.2.9.22"+"/multi_upload_txt/joblistmc.php"+"?"+"sid"+"="+ z[w].text);

			$new_content = str_replace('<a href="', '<a href="site.php?url=', $content);

			echo $new_content;
			*/

	       $.ajax({
	         type: "POST",  
	         url: "ddresponse.php",  
	         data: data,
	         dataType: "text",       
	         success: function(response)  
	         {
				//alert("success => class id = editrecord_model 項目");
				
				//
				$('#'+action+'_model').modal('hide');
				$("#employee_grid").bootgrid('reload');
	         },
			 error: function() 
			 {
				alert("error 請通知工程師處理!");
				$( '.message' ).addClass( 'error' ).html( data );
				$("#employee_grid_record").bootgrid('reload');
			 }    
	       });
	   }
			
	   
	   
			$( "#command-edit" ).click(function() {
			   alert('command-edit');
			   
			});
			$( "#command-add" ).click(function() {
					alert("delete cmd");
			   $('#add_model').modal('show');
			   
			});
			$( "#btn_add" ).click(function() {
			   ajaxAction('add');
			   
			});
			//save 
			$( "#btn_edit" ).click(function() {
				
				//alert("save");
				
			   ajaxAction('editrecord');
			   
			});
			
			$( "#href1_btn" ).click(function() {
			   showWindow(' http://www.taichong.com.tw/');	  
			 
			});
			
			$( "#href2_btn" ).click(function() {
				showWindow('http://'+$serverhostip+'/bak2/index/server4/SB/samples/flowchart.html');
			});
			
			$( "#dept3" ).change(function() {
				//alert("部門選取");
				//document.cookie = "cookieSelectionValue="+ z[w].text;
				//alert("found select event");
				//document.cookie = "isSelect=true";// 
				ajaxActionSelect('selected');
			  
			});
			
			$( '#MyButtonupdatalist' ).click(function(){
				//alert("更新");
				$("#employee_grid").bootgrid('reload');
			});

			$( '#btnintohistory' ).click(function(){
				//alert("歷史頁面");
				//showWindow('http://'<?=$serverhostip?><?=$serverfolder?><?=$count1?> );
 
			  window.location.replace('http://168.2.9.22/multi_upload_txt/history.php?sid=0');
			});
			
			
	});


	</script>



<a>Version 1.0</a>
</body>
</html>