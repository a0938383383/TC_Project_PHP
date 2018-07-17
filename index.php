<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
	//人員管理
	require ("connipconf.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上傳多重檔案</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<style type="text/css">
	.back-link a {
		color: #4ca340;
		text-decoration: none; 
		border-bottom: 1px #4ca340 solid;
	}
	.back-link a:hover,
	.back-link a:focus {
		color: #408536; 
		text-decoration: none;
		border-bottom: 1px #408536 solid;
	}
	h1 {
		height: 100%;
		/* The html and body elements cannot have any padding or margin. */
		margin: 0;
		font-size: 14px;
		font-family: 'Open Sans', sans-serif;
		font-size: 32px;
		margin-bottom: 3px;
	}
	.entry-header {
		text-align: left;
		margin: 0 auto 50px auto;
		width: 80%;
        max-width: 978px;
		position: relative;
		z-index: 10001;
	}
	#demo-content {
		padding-top: 100px;
	}
	</style>
</head>

<body>

	<!--
		<link href="tt.css" media="all" type="text/css">
	-->
	<link href="dist/bootstrap.min.css" media="all" rel="stylesheet" type="text/css">
	<link href="dist/jquery.bootgrid.css" rel="stylesheet">
	<!--<script src="dist/jquery-1.11.1.min.js"></script>-->
	<script src="dist/jquery-2.1.1.js"></script>
	<!--<script src="dist/bootstrap.min.js"></script>-->
	<!--<script src="dist/jquery.bootgrid.min.js"></script>-->
	
	<p id="demo"></p>
		<div class="container">
			<div class="col-sm-60">
				<!--<hr>換行-->		
				<div class="col-sm-12">
					<!--<p>Label_1</p>-->
					<div class="well clearfix">
						<h1><b><span style="color:orange;">大昶貿易股份有限公司 TAI CHONG CO .,LTD.</span></b></h1>
								<h1><b><span style="color:#008866;">單位排程回報項目</span></b></h1>
								<hr>
						<form action="upload.php" method="post" enctype="multipart/form-data" name="uploadForm" id="uploadForm">
						
						<li>
							<b>
							1. <a href="http://<?=$serverhostip?><?=$serverfolder?><?=$count1?> "> 生管-單位工作清單</a>
							</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>
							
							2. <a href="http://<?=$serverhostip?><?=$serverfolder?><?=$count2?> " >現場-單位工作清單</a>
							</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>
							
							3. <a href="http://<?=$serverhostip?><?=$serverfolder?><?=$count3?> " >歷史-單位工作清單</a>
							</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>
							
							4. <a href="http://<?=$serverhostip?><?=$serverfolder?><?=$count4?> " >生管-現場人員管理</a>
							</b>
							
						</li>
						<!--<li><b><a href="http://<?=$serverhostip?><?=$serverfolder?>/joblistmc.php" >歷史-單位工作清單</a></b></li>
						<li><b><a href="http://<?=$serverhostip?><?=$serverfolder?>/management/index.php" >生管-現場人員管理</a></b></li>-->
						<br>
							<div class="">
								<table cellspacing="0" class="table table-condensed table-hover table-striped" data-toggle="bootgrid" id="employee_grid" width="100%">
									<thead>
										<tr>
											<p>
												<input name="Submit" type="submit" value="開始上傳"/>
												<input type="reset" name="button" id="button" value="清除" />
												<hr>
											</p>
										  <p>
											<b>
												<strong>CNC 116A-1：</strong><br />
												<input name="file0" type="file" id="file0" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>CNC 116a-2：</strong><br />
												<input name="file1" type="file" id="file1" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>CNC 116a-3：</strong><br />
												<input name="file2" type="file" id="file2" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>CNC 15800：</strong><br />
												<input name="file3" type="file" id="file3" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>CNC 2622：</strong><br />
												<input name="file4" type="file" id="file4" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>備料區 磨料機-1：</strong><br />
												<input name="file5" type="file" id="file5" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>備料區 磨料機-2：</strong><br />
												<input name="file6" type="file" id="file6" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>傳統銑床 #4銑床-1：</strong><br />
												<input name="file7" type="file" id="file7" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>傳統銑床 #4銑床-2：</strong><br />
												<input name="file8" type="file" id="file8" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>傳統銑床 #4銑床-3：</strong><br />
												<input name="file9" type="file" id="file9" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>傳統銑床 #4銑床-4：</strong><br />
												<input name="file10" type="file" id="file10" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>傳統銑床 #5銑床：</strong><br />
												<input name="file11" type="file" id="file11" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>設備工作內容：</strong><br />
												<input name="file12" type="file" id="file12" />
											</b>
										  </p>
										  <p>
											<b>
												<strong>設備工作內容：</strong><br />
												<input name="file13" type="file" id="file13" />
											</b>
										  </p>
										  <p>
												<br>
												<!--<button type="button">開始上傳</button>-->
												<input name="Submit" type="submit" value="開始上傳"/>
												<input type="reset" name="button" id="button" value="清除" />
										  </p>
										 </tr>
									</thead>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!--
	<div>
		<div>
			<p>
			<strong> 例外字元</strong></br>
			<input name = " file14" type = "file" id = "file14" />
			
			<hr>
			<input name = "Submit" type = "submit" value = "下載 - 報表1 (*.odf)" />
			<input name = "Submit" type = "submit" value = "下載 - 報表2 (*.odt)" />
			
			<p>
		</div>
	</div>
	<script type="text/javascript">
	$( document ).ready(function() {

	});
	</script>
	-->
</body>
</html>
