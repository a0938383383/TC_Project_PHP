<?php
session_start();
error_reporting(0);
include('sql/config_db.php');

//require_once 'vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';	//沒load 進來的感覺 是少下了use 指令還是 根本沒參照到
/*
$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
*/
//$log->addWarning('Foo');

//require_once __DIR__ . '/vendor/autoload.php';
//require 'vendor/autoload.php';

	$sql0 = "SELECT `type`,`nn2`,`nn4`,`nn6`,`nn8` FROM `typemap`";
	$query0 = $dbh -> prepare($sql0);
	
	/*
	//$query->bindParam(':eid',$eid,PDO::PARAM_STR);
	$query0->execute();
	//$results0=$query0->fetchAll(PDO::FETCH_OBJ);
	$results0=$query0->fetchAll(PDO::FETCH_ASSOC);
	echo "<hr>";
	//$cnt=1;
	if($query0->rowCount() > 0)
	{
		echo "count = ".$query0->rowCount()."</br>";
		foreach($results0 as $result0){
			//echo $result0."</br>";
			//print_r($result0)."</br>";	
			echo $result0['type']." - ";
			echo $result0['nn2']." - ";
			echo $result0['nn4']." - ";
			echo $result0['nn6']." - ";
			echo $result0['nn8']."</br>";http://168.2.9.22/elcscrewdriver/index.php
		}
	}
	echo "<hr>";
	*/
	
	if(isset($_POST['update']))
	{
		
		$id=intval($_GET["id"]);
		
		$n1 =$_POST['n1'];
		$n2 =$_POST['n2'];
		$n3 =$_POST['n3'];
		$n4 =$_POST['n4'];
		$n5 =$_POST['n5'];
		$n6 =$_POST['n6'];
		$n7 =$_POST['n7'];
		$n8 =$_POST['n8'];
		$n9 =$_POST['n9'];
		$n10 =$_POST['n10'];
		$n11 =$_POST['n11'];
		$n12 =$_POST['n12'];
		$n13 =$_POST['n13'];
		$n14 =$_POST['n14'];
		$n15 =$_POST['n15'];
		$n16 =$_POST['n16'];
		$n17 =$_POST['n17'];
		$n18 =$_POST['n18'];
		$n19 =$_POST['n19'];
		$n20 =$_POST['n20'];
		$n21 =$_POST['n21'];
		$n22 =$_POST['n22'];
		$n23 =$_POST['n23'];
		$n24 =$_POST['n24'];
		$n25 =$_POST['n25'];
		$n26 =$_POST['n26'];
		$n27 =$_POST['n27'];
		$n28 =$_POST['n28'];
		$n29 =$_POST['n29'];
		$n30 =$_POST['n30'];
		$n31 =$_POST['n31'];
		
		$n32 =$_POST['n32'];
		// old 1
		$old_1 =$_POST['n_old_32'];
		$n33 =$_POST['n33'];
		$n34 =$_POST['n34'];
		$n35 =$_POST['n35'];
		$n36 =$_POST['n36'];
		$n37 =$_POST['n37'];
		
		$n38 =$_POST['n38'];
		// old 2
		$old_2 =$_POST['n_old_38'];
		$n39 =$_POST['n39'];
		$n40 =$_POST['n40'];
		$n41 =$_POST['n41'];
		$n42 =$_POST['n42'];
		$n43 =$_POST['n43'];
		
		$n44 =$_POST['n44'];
		// old 3
		$old_3 =$_POST['n_old_44'];
		$n45 =$_POST['n45'];
		$n46 =$_POST['n46'];
		$n47 =$_POST['n47'];
		$n48 =$_POST['n48'];
		$n49 =$_POST['n49'];
		
		$n50 =$_POST['n50'];
		// old 4
		$old_4 =$_POST['n_old_50'];
		$n51 =$_POST['n51'];
		$n52 =$_POST['n52'];
		$n53 =$_POST['n53'];
		$n54 =$_POST['n54'];
		$n55 =$_POST['n55'];
		
		$n56 =$_POST['n56'];
		// old 5
		$old_5 =$_POST['n_old_56'];
		$n57 =$_POST['n57'];
		$n58 =$_POST['n58'];
		$n59 =$_POST['n59'];
		$n60 =$_POST['n60'];
		$n61 =$_POST['n61'];
		
		$n62 =$_POST['n62'];
		// old 6
		$old_6 =$_POST['n_old_62'];
		$n63 =$_POST['n63'];
		$n64 =$_POST['n64'];
		$n65 =$_POST['n65'];
		$n66 =$_POST['n66'];
		$n67 =$_POST['n67'];
		
		$n68 =$_POST['n68'];
		// old 7
		$old_7 =$_POST['n_old_68'];
		$n69 =$_POST['n69'];
		$n70 =$_POST['n70'];
		$n71 =$_POST['n71'];
		$n72 =$_POST['n72'];
		$n73 =$_POST['n73'];
		
		$n74 =$_POST['n74'];
		// old 8
		$old_8 =$_POST['n_old_74'];
		$n75 =$_POST['n75'];
		$n76 =$_POST['n76'];
		$n77 =$_POST['n77'];
		$n78 =$_POST['n78'];
		$n79 =$_POST['n79'];
		$n80 =$_POST['n80'];
		$n81 =$_POST['n81'];
		$n82 =$_POST['n82'];
		$n83 =$_POST['n83'];
		
		// 後來新增，目前業務
		// 9 行
		$n84 =$_POST['n84'];
		// old 9
		$old_9 =$_POST['n_old_84'];
		$n85 =$_POST['n85'];
		$n86 =$_POST['n86'];
		$n87 =$_POST['n87'];
		$n88 =$_POST['n88'];
		$n89 =$_POST['n89'];
		
		// 10　行
		$n90 =$_POST['n90'];
		// old 10
		$old_10 =$_POST['n_old_90'];
		$n91 =$_POST['n91'];
		$n92 =$_POST['n92'];
		$n93 =$_POST['n93'];
		$n94 =$_POST['n94'];
		$n95 =$_POST['n95'];
		
		 
		
		$sql="update elc_screwdriver.`table1` set n1='$n1',n2='$n2',n3='$n3',n4='$n4',n5='$n5',n6='$n6',n7='$n7',n8='$n8',n9='$n9',n10='$n10',n11='$n11',n12='$n12',n13='$n13',n14='$n14',n15='$n15',n16='$n16',n17='$n17',n18='$n18',n19='$n19',n20='$n20',n21='$n21',n22='$n22',n23='$n23',n24='$n24',n25='$n25',n26='$n26',n27='$n27',n28='$n28',n29='$n29',n30='$n30',n31='$n31',n32='$n32',n33='$n33',n34='$n34',n35='$n35',n36='$n36',n37='$n37',n38='$n38',n39='$n39',n40='$n40',n41='$n41',n42='$n42',n43='$n43',n44='$n44',n45='$n45',n46='$n46',n47='$n47',n48='$n48',n49='$n49',n50='$n50',n51='$n51',n52='$n52',n53='$n53',n54='$n54',n55='$n55',n56='$n56',n57='$n57',n58='$n58',n59='$n59',n60='$n60',n61='$n61',n62='$n62',n63='$n63',n64='$n64',n65='$n65',n66='$n66',n67='$n67',n68='$n68',n69='$n69',n70='$n70',n71='$n71',n72='$n72',n73='$n73',n74='$n74',n75='$n75',n76='$n76',n77='$n77',n78='$n78',n79='$n79',n80='$n80',n81='$n81',n82='$n82',n83='$n83',n84='$n84',n85='$n85',n86='$n86',n87='$n87',n88='$n88',n89='$n89',n90='$n90',n91='$n91',n92='$n92',n93='$n93',n94='$n94',n95='$n95' ,old_1='$old_1' ,old_2='$old_2' ,old_3='$old_3' ,old_4='$old_4' ,old_5='$old_5' ,old_6='$old_6' ,old_7='$old_7' ,old_8='$old_8' ,old_9='$old_9' ,old_10='$old_10' where id=$id";

		//echo $sql;
		$query = $dbh->prepare($sql);
		$query->execute();
		
		$sql = '';
		
		$rowfirst = 11;	// 前10筆固定.
		for ($xall = 0; $xall <= 10; $xall++) {
			for ($x = 1; $x <= 6; $x++) {
				try {
					${"sn".($x+($xall*6))} =$_POST['sn'.($x+($xall*6))];
					
					if(${"sn".($x+($xall*6))} === null){
						break;
					} else {
						//echo '>>> sn'.($x+($xall*6)).' = '.${"sn".($x+($xall*6))}.'</br>';
						
						if(${"sn".($x+($xall*6))}===''){
							$sql="UPDATE `table1_sub` SET `s".($x)."` = NULL WHERE `table1_sub`.`row` = ".($rowfirst+$xall)." AND `table1_sub`.`mapid` = ".$id.";";
						}else{
							$sql="UPDATE `table1_sub` SET `s".($x)."` = '".${"sn".($x+($xall*6))}."' WHERE `table1_sub`.`row` = ".($rowfirst+$xall)." AND `table1_sub`.`mapid` = ".$id.";";
						}
						
						$query = $dbh->prepare($sql);
						$query->execute();
						
						if($x === 1){
							${"sn_old".($x+($xall*6))} =$_POST['sn_old'.($x+($xall*6))];
							//echo '>>> sn_old'.($x+($xall*6)).' = '.${"sn_old".($x+($xall*6))}.'</br>';
							$sql="UPDATE `table1_sub` SET `s7` = '".${"sn_old".($x+($xall*6))}."' WHERE `table1_sub`.`row` = ".($rowfirst+$xall)." AND `table1_sub`.`mapid` = ".$id.";";
							$query = $dbh->prepare($sql);
							$query->execute();
						}
						//  write to db
					}
				} catch (Exception $e) {
					//echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			}
		}
		
		$cid=intval($_GET["id"]);
		$model =$_POST['cid'];
		
		$sql = "SELECT `cid` FROM elc_screwdriver.`auto_id` WHERE `cid` =  $cid";// 改成搜尋比對 if else
		$query = $dbh->prepare($sql);
		$query->execute();
		
		if($query->rowCount() > 0)
		{
			// update;
			$sql = "UPDATE elc_screwdriver.`auto_id` SET `model`='".$model."' WHERE `cid` = $cid";
			$query = $dbh->prepare($sql);
			$query->execute();
		}else{
			// insert;
			$sql = "INSERT INTO elc_screwdriver.`auto_id` (`id`,`cid`, `model`) VALUES ($cid,$cid,'".$model."');";
			$query = $dbh->prepare($sql);
			$query->execute();
		}
		
		$query  = null;

		
		$msg="更新成功.";
	}
	
		// 獲取狀態 抓取 state / note. 標記.
		$id=intval($_GET["id"]);
		$sql = "SELECT * from elc_screwdriver.`table1_state` where id =$id";
		$querystate = $dbh -> prepare($sql);
		$querystate->execute();
		$results=$querystate->fetchAll(PDO::FETCH_OBJ);
		
		//
		
		$isopen = 0;
		$isnote = 0;
		$str_option = '';
		if($querystate->rowCount() > 0)
		{
			//	get state.
			foreach($results as $result)
			{
				$isopen = $result->state;
				$isnote = $result->mailnote;
				
				if($isopen === null){
					$isopen = "0";
					
				}
				if($isnote === null){
					$isnote = "0";
					
				}
				//echo "[a] isopen = " .$isopen;
				//echo "[a] isnote = " .$isnote;
				
				//state option.
				$int_state2 = $result->state2;
				
				switch ($int_state2) {
					case "1":
						$str_option = "檢修中";
						break;
					case "2":
						$str_option = "檢修完成已送單";
						break;
					case "3":
						$str_option = "維修中";
						break;
					case "4":
						$str_option = "不維修";
						break;
					case "5":
						$str_option = "維修完成";
						break;
					case "5":
						$str_option = "維修完成";
						break;
					default:
						$str_option = "檢修中";
				}
				
			}
			
		}else{
			//	[Create] insert.
			$id=intval($_GET["id"]);
			//$sql = "INSERT INTO `table1_state`(`oid`,`state`) VALUES ($id,0)";
			$sql = "INSERT INTO `table1_state`(`id`,`oid`,`state`) VALUES ($id,$id,0)";
			//echo $sql;
			
			$query = $dbh -> prepare($sql);
			$query->execute();
			
			$isopen = "0";
			$isnote = "0";

		}
 ?>
 
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
	<title>Taichong | 電動起子維修紀錄</title>
	<meta charset=UTF-8>
	<meta name=viewport content="width=device-width"/>
	<meta name=description content="Responsive Admin Dashboard Template" />
	<meta name=keywords content=admin,dashboard />
	<meta name=author content=Steelcoders />
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
	


	<style type="text/css">
    body {
        color: #404E67;
        background: #F5F7FA;
		font-family: 'Open Sans', sans-serif;
	}
	.table-wrapper {
		width: 700px;
		margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
		height: 30px;
		font-weight: bold;
		font-size: 12px;
		text-shadow: none;
		min-width: 100px;
		border-radius: 50px;
		line-height: 13px;
    }
	.table-title .add-new i {
		margin-right: 4px;
	}
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
	table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table td a.add i {
        font-size: 24px;
    	margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
	table.table .form-control.error {
		border-color: #f50000;
	}
	table.table td .add {
		display: none;
	}
	
	#layer {
	   display: none;
	   position: absolute;
	}


	#table2 { width:99%; border-collapse:collapse; } 
	#table2 th, #table2 td{ border: silver 1px solid; text-align:center; }

	.odd{background-color:#ffffff;}
	.even{background-color:#e6ffff;}
	.enter{background-color:#FFCCFF;}

</style>



</head>

<body style="width:99.8%" >

<table id="table1" class="display responsive-table" >
	
	<form id=example-form method=post name=updatemp>
		&ensp;
		<label >Project&ensp;:
			<input id="stoggle" name="stoggle" type="checkbox" value="1" <?php if($isopen==="0"){echo "checked";}else{};?>  data-toggle="toggle" data-on="開啟" data-off="Close" data-onstyle="primary" data-offstyle="success" data-style="slow" data-size="default">
		</label>
		&ensp;
		<label >Note&ensp;:
			<input id="notetoggle" name="notetoggle" type="checkbox" value="0" <?php if($isnote==="0"){echo "checked";}else{};?>  data-toggle="toggle" data-on="未送件" data-off="已送件" data-onstyle="default" data-offstyle="success" data-style="slow" data-size="default">
		</label>
		&ensp;
		<label >State&ensp;:
			<select id="stateoption" name="stateoption"  class="selectpicker">
				<option style="background-color: #87CEEB;" <?php if($int_state2 === "1"){echo "selected"; } ?>  data-content="<span class='badge badge-success' style='background-color: #87CEEB;' >檢修中</span>">檢修中</option>
				<option style="background-color: #9370DB;" <?php if($int_state2 === "2"){echo "selected"; } ?> data-content="<span class='badge badge-primary' style='background-color: #9370DB;' >檢修完成已送單</span>">檢修完成已送單</option>
				<option style="background-color: #DAA520;" <?php if($int_state2 === "3"){echo "selected"; } ?> data-content="<span class='badge badge-primary' style='background-color: #DAA520;' >維修中</span>">維修中</option>
				<option style="background-color: #DC143C;" <?php if($int_state2 === "4"){echo "selected"; } ?> data-content="<span class='badge badge-primary' style='background-color: #DC143C;' >不維修</span>">不維修</option>
				<option style="background-color: #8FBC8F;" <?php if($int_state2 === "5"){echo "selected"; } ?> data-content="<span class='badge badge-primary' style='background-color: #8FBC8F;' >維修完成</span>">維修完成</option>
			</select>
		</label>
		&ensp;
		<label >&ensp;Download&ensp;:
		<a href="http://168.2.9.22/dwlods/example.php?id=<?php echo $_GET["id"];?>" ="waves-effect waves-light btn blue m-b-xs">[ *.ods ]</a>
		<a>  /  </a>
		<a href="http://168.2.9.22/Eximporter/vendor/phpoffice/phpexcel/Examples/tc-download-screwdriver-xlsx.php?id=<?php echo $_GET["id"];?>" ="waves-effect waves-light btn blue m-b-xs">[ *.xlsx ]</a>
		</label>
		<button type=submit name=update id=update style="float:right;margin-right:18px;background-color:#ffffe6;width:140px;height:28px;font-size:18px;" >更新UPDATE</button>

		<button type="button" onclick="pagectl.testfnc(<?php echo $_GET["p"];?>);" style="float:right;margin-right:18px;background-color:#ffffe6;width:140px;height:28px;font-size:18px;" value="test">返回列表</button>
		
		<?php if($error){?><a class=errorWrap style="color: red;"><strong></br>&ensp;&ensp; ERROR</strong>:<?php echo ($error); ?> </a><?php } 
			  else if($msg){?><a class=succWrap style="color: green;"><strong></br>&ensp;&ensp; SUCCESS</strong> : <?php echo ($msg).' ('.date('Y/m/d - H:i:s',(time()+8*3600)).')'; echo "<script type='text/javascript'>var r =confirm('$msg'+' 是否繼續下載文件?');if (r == true) { window.open('".'http://168.2.9.22/Eximporter/vendor/phpoffice/phpexcel/Examples/tc-download-screwdriver-xlsx.php?id='.$id."');} else {}</script>";
		?> </a><?php }?>
		
		<br>
		<hr style ="  margin-top: 5px;    margin-bottom: 1px;"> 
		<tr style="visibility:hidden;">
		<?php 
	
		$filter_cid = array();
		$filter_oid = array();
		
		for ( $i=1 ; $i<21 ; $i++ ) {
		?>
			<th id ="h<?php echo $i;?>"  align="center" valign=middle  ><input class ="size-tb-td-unselt " /></th>
		<?php 
		}
		?>
		</tr>
		
		<?php 
		$id=  $_GET['id'];
		$sql = "SELECT * from elc_screwdriver.`table1` LEFT JOIN elc_screwdriver.`auto_id` USING(`id`) where id =$id ";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0)
		{
			foreach($results as $result)
			{
			if($result->n32 !='' or $result->n32 !=null)
				array_push($filter_cid,trim($result->n32));	// 1.
			if($result->n38 !='' or $result->n38 !=null)
				array_push($filter_cid,trim($result->n38));	// 2.
			if($result->n44 !='' or $result->n44 !=null)
				array_push($filter_cid,trim($result->n44));	// 3.
			if($result->n50 !='' or $result->n50 !=null)
				array_push($filter_cid,trim($result->n50));	// 4.
			if($result->n56 !='' or $result->n56 !=null)
				array_push($filter_cid,trim($result->n56));	// 5.
			if($result->n62 !='' or $result->n62 !=null)
				array_push($filter_cid,trim($result->n62));	// 6.
			if($result->n68 !='' or $result->n68 !=null)
				array_push($filter_cid,trim($result->n68));	// 7.
			if($result->n74 !='' or $result->n74 !=null)
				array_push($filter_cid,trim($result->n74));	// 8.
			if($result->n84 !='' or $result->n84 !=null)
				array_push($filter_cid,trim($result->n84));	// 9.
			if($result->n90 !='' or $result->n90 !=null)
				array_push($filter_cid,trim($result->n90));	// 10.
				array_filter($filter_cid);
				array_unique($filter_cid);
				array_values($filter_cid);
				//echo  'indextype6:'. __LINE__ .'</br>';
				//print_r($filter_cid);

			if($result->old_1 !='' or $result->old_1 !=null)
				array_push($filter_oid,trim($result->old_1));	// 1.
			if($result->old_2 !='' or $result->old_2 !=null)
				array_push($filter_oid,trim($result->old_2));	// 2.
			if($result->old_3 !='' or $result->old_3 !=null)
				array_push($filter_oid,trim($result->old_3));	// 3.
			if($result->old_4 !='' or $result->old_4 !=null)
				array_push($filter_oid,trim($result->old_4));	// 4.
			if($result->old_5 !='' or $result->old_5 !=null)
				array_push($filter_oid,trim($result->old_5));	// 5.
			if($result->old_6 !='' or $result->old_6 !=null)
				array_push($filter_oid,trim($result->old_6));	// 6.
			if($result->old_7 !='' or $result->old_7 !=null)
				array_push($filter_oid,trim($result->old_7));	// 7.
			if($result->old_8 !='' or $result->old_8 !=null)
				array_push($filter_oid,trim($result->old_8));	// 8.
			if($result->old_9 !='' or $result->old_9 !=null)
				array_push($filter_oid,trim($result->old_9));	// 9.
			if($result->old_10 !='' or $result->old_10 !=null)
				array_push($filter_oid,trim($result->old_10));// 10.
				array_filter($filter_oid);
				array_unique($filter_oid);
				array_values($filter_oid);
				//print_r($filter_oid);
				?>
				<tr>
					<td class ="frame-tb"  colspan="1" align="center" valign=middle>機身碼:</td>
					<td class ="frame-tb"  height="38" height="38" colspan="3" ><input name=cid id=cid class="size-tb-td" type="string" style="background-color:#FEFAFE;" value ="<?php echo $result->model;?>"  /></td>
					<td class ="frame-tb"  height="38" height="38" colspan="1" align="center" valign=middle onclick="addcid()" ><input name=cidbtn id=cidbtn class="size-tb-td" type="button" style="background-color:#ffffe6;" value ="<?php echo "Auto";?>" ></td>
					<td colspan="3"><input class="size-tb-td-unselt" disabled />  </td> 
					<td colspan="5"><input class="size-tb-td-ttl"  type="text" value="電動起子維修記錄單" disabled  /></td>
					<td colspan="2"><input class="size-tb-td-unselt" disabled />  </td> 
					<td colspan="5"><input name=n1 id=n1 class="size-tb-td" type="date"  value ="<?php echo ($result->n1);?>" /></td>
				</tr>
				<tr>
					<td class ="frame-tb"  colspan="1" align="center" valign=middle>單號:</td>
					<?php $value = ($result->id);
					//補6位 0.	 
					$value = str_pad($value,6,'0',STR_PAD_LEFT);
					?>
					<td class ="frame-tb" colspan="19" ><text id ="oid"><?php echo $value;?></text></td>
				</tr>
				<tr>
					<td class ="frame-tb"  height="38" colspan="1" align="center" valign=middle>客戶:</td>
					<td class ="frame-tb"  height="38" height="38" colspan="4" ><input name=n4 id=n4 class="size-tb-td" type="text"  value ="<?php echo ($result->n4);?>" ></td>
					<td class ="frame-tb"  height="38" colspan="1" align="center" valign=middle>聯絡人:</td>
					<td class ="frame-tb"   colspan="4" ><input name=n5 id=n5 class="size-tb-td" type="text"  value ="<?php echo ($result->n5);?>" ></td>
					<td class ="frame-tb"  height="38" colspan="1" align="center" valign=middle>Tel:</td>
					<td class ="frame-tb"  height="38" colspan="4" ><input name=n6 id=n6 class="size-tb-td" type="text"  value ="<?php echo ($result->n6);?>" ></td>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>Fax:</td>
					<td class ="frame-tb"  height="38" colspan="4" ><input name=n7 id=n7 class="size-tb-td" type="text"  value ="<?php echo ($result->n7);?>" ></td>
				</tr>
				<tr>
					<td class ="frame-tb"  height="38" colspan="1"  align="center" valign=middle>機型:</td>
					<td class ="frame-tb"  height="38" colspan="4" align="center" valign=middle>
					<select name="n8" id="n8"  class="size-tb-td" onchange="typechange()">　<option value=""></option> <option selected="selected"><?php echo ($result->n8);?></option>
					<?php 
						$sql_type = "SELECT `type` from elc_screwdriver.`typemap` order by type";
						$query2 = $dbh -> prepare($sql_type);
						$query2->execute();
						$results2=$query2->fetchAll(PDO::FETCH_ASSOC );
						if($query2->rowCount() > 0)
						{
							foreach($results2 as $result2)
							{
								?>
								<option value="<?php echo $result2['type'];?>"><?php echo $result2['type'] ;?></option>
								<?php
							}
						}
					?>
					</td>
					<td class ="frame-tb"  height="38"  align="center" valign=middle>機號:</td>
					<td class ="frame-tb"   colspan="4" ><input name=n9 id=n9 class="size-tb-td" type="text"  value ="<?php echo ($result->n9);?>" ></td>
					<td class ="frame-tb"  height="38"  align="center" valign=middle>附件:</td>
					<td class ="frame-tb"   colspan="7" ><input name=n10 id=n10 class="size-tb-td" type="text"  value ="<?php echo ($result->n10);?>" ></td>
					<td class ="frame-tb"  height="38"  align="center" valign=middle>吊架:</td>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle><select name=n11 id=n11 class="size-tb-td-one">　<option selected="selected"><?php echo ($result->n11);?></option><option value="有">有</option><option value="無">無</option></td>
				</tr>
				
				<tr>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><center>故障:</center></th>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><select name=n12 id=n12 class="size-tb-td-one">　<option selected="selected"><?php echo ($result->n12);?></option><option value="◎">◎</option><option value=""></option></th><?php // 12?>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><center>不運轉</center></th>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><select name=n13 id=n13 class="size-tb-td-one">　<option selected="selected"><?php echo ($result->n13);?></option><option value="◎">◎</option><option value=""></option></th><?php // 13?>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><center>不跳停</center></th>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><select name=n14 id=n14 class="size-tb-td-one">　<option selected="selected"><?php echo ($result->n14);?></option><option value="◎">◎</option><option value=""></option></th><?php // 14?>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><center>異音</center></th>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><select name=n15 id=n15 class="size-tb-td-one">　<option selected="selected"><?php echo ($result->n15);?></option><option value="◎">◎</option><option value=""></option></th><?php // 15?>
					<th class ="frame-tb"   colspan="1"align="center" valign=middle><center>其它</center></th>
					<td class ="frame-tb"   colspan="11" ><input name=n16 id=n16 class="size-tb-td" placeholder="其它說明" type="text"   value ="<?php echo ($result->n16);?>" ></td>
				</tr>
				
				<tr>
					<td class ="frame-tb"  height="38" colspan="1" align="center" valign=middle>維修:</td>
					<td class ="frame-tb"  height="38" colspan="9" align="center" valign=middle>處理內容</td>
					<td class ="frame-tb"  height="38" colspan="2" align="center" valign=middle>扭力刻度:</td>
					<td class ="frame-tb"  height="38" colspan="2" align="center" valign=middle>2</td>
					<td class ="frame-tb"  height="38" colspan="2" align="center" valign=middle>4</td>
					<td class ="frame-tb"  height="38" colspan="2" align="center" valign=middle>6</td>
					<td class ="frame-tb"  height="38" colspan="2" align="center" valign=middle>8</td>
				</tr>
				
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>電控:</td>
					<td class ="frame-tb"   colspan="9" ><input name=n17 id=n17 class="size-tb-td" type="text"   value ="<?php echo ($result->n17);?>" ></td>
					<td class ="frame-tb"   colspan="2" align="center" valign=middle>參考值(Kgf.cm):</td>
					<td class ="frame-tb"   colspan="2" align="center" valign=middle>
					<input name=n18 id=n18 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n18);?>" readonly>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n19 id=n19 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n19);?>" readonly></td>
					<td class ="frame-tb"   colspan="2" ><input name=n20 id=n20 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n20);?>" readonly></td>
					<td class ="frame-tb"   colspan="2" ><input name=n21 id=n21 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n21);?>" readonly></td>
				</tr>
				
				
				<script>

					function ShowStr_all(x,x2){
					　let Str=document.getElementById(x).value;
					　let Sidx=document.getElementById(x2).value;
					  let index_x = Math.round((Str/Sidx)*100) - 100;
					  if(Str/Sidx >1){
						  document.getElementById((x+'p')).innerHTML =  '+'+ index_x +'%'; 
					  }else{
						  if(Str !='')
						  document.getElementById((x+'p')).innerHTML =  index_x +'%';
					  }
					}
				</script>
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>機件:</td>
					<td class ="frame-tb"   colspan="9" ><input name=n22 id=n22 class="size-tb-td" type="text"   value ="<?php echo htmlentities($result->n22);?>" ></td>
					<td class ="frame-tb"   colspan="2" align="center" valign=middle>初測值(%):</td>
					<td class ="frame-tb"   colspan="1" ><input name=n23 id=n23 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo htmlentities($result->n23);?>" onchange="ShowStr_all(this.id,'n18')" ></td>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle id =n23p ><?php echo '%';?></td>
					<td class ="frame-tb"   colspan="1" ><input name=n24 id=n24 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo htmlentities($result->n24);?>" onchange="ShowStr_all(this.id,'n19')" ></td>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle id =n24p ><?php echo '%';?></td>
					<td class ="frame-tb"   colspan="1" ><input name=n25 id=n25 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo htmlentities($result->n25);?>" onchange="ShowStr_all(this.id,'n20')" ></td>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle id =n25p ><?php echo '%';?></td>
					<td class ="frame-tb"   colspan="1" ><input name=n26 id=n26 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo htmlentities($result->n26);?>" onchange="ShowStr_all(this.id,'n21')"  ></td>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle id =n26p ><?php echo '%';?></td>
				</tr>

				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>外觀:</td>
					<td class ="frame-tb"   colspan="9" ><input name=n27 id=n27 class="size-tb-td" type="text"   value ="<?php echo htmlentities($result->n27);?>" ></td>
					<td class ="frame-tb"   colspan="2" align="center" valign=middle>複測值(%):</td>
					<td class ="frame-tb"   colspan="1" ><input name=n28 id=n28 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo htmlentities($result->n28);?>" onchange="ShowStr_all(this.id,'n18')" ></td>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle id =n28p ><?php echo '%';?></td>
					<td class ="frame-tb"   colspan="1" ><input name=n29 id=n29 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo htmlentities($result->n29);?>" onchange="ShowStr_all(this.id,'n19')" ></td>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle id =n29p ><?php echo '%';?></td>
					<td class ="frame-tb"   colspan="1" ><input name=n30 id=n30 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo htmlentities($result->n30);?>" onchange="ShowStr_all(this.id,'n20')" ></td>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle id =n30p ><?php echo '%';?></td>
					<td class ="frame-tb"   colspan="1" ><input name=n31 id=n31 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo htmlentities($result->n31);?>" onchange="ShowStr_all(this.id,'n21')" ></td>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle id =n31p ><?php echo '%';?></td>
				</tr>
				<tr>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><center>品項</center></th>
					<th class ="frame-tb"   colspan="2" align="center" valign=middle><center>新編號</center></th>
					<th class ="frame-tb"   colspan="2" align="center" valign=middle><center>舊編號</center></th>
					<th class ="frame-tb"   colspan="5" align="center" valign=middle><center>名稱</center></th>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><center>數量</center></th>
					<th class ="frame-tb"   colspan="1" align="center" valign=middle><center>單價</center></th>
					<th class ="frame-tb"   colspan="2" align="center" valign=middle><center>合計
					<select id="price" name="price"  class="size-tb-td-two">
						<option>折扣:</option>
						<option>原價</option>
					</select>
					</center></th>
					<th class ="frame-tb"   colspan="6" align="center" valign=middle><center>備注</center></th>
				</tr>
				
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>1.
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:18px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n32 id=n32 class="size-tb-td" type="text"   value ="<?php echo ($result->n32);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n_old_32 id=n_old_32 class="size-tb-td" type="text"   value ="<?php echo ($result->old_1);?>" ></td>
					<td class ="frame-tb"   colspan="5" ><input name=n33 id=n33 class="size-tb-td" type="text"   value ="<?php echo ($result->n33);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n34 id=n34 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n34);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n35 id=n35 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n35);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n36 id=n36 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n36);?>" ></td>
					<td class ="frame-tb"   colspan="6" ><input name=n37 id=n37 class="size-tb-td" type="text"   value ="<?php echo ($result->n37);?>" ></td>
				</tr>
				
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>2.
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:18px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n38 id=n38 class="size-tb-td" type="text"   value ="<?php echo ($result->n38);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n_old_38 id=n_old_38 class="size-tb-td" type="text"   value ="<?php echo ($result->old_2);?>" ></td>
					<td class ="frame-tb"   colspan="5" ><input name=n39 id=n39 class="size-tb-td" type="text"   value ="<?php echo ($result->n39);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n40 id=n40 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n40);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n41 id=n41 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n41);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n42 id=n42 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n42);?>" ></td>
					<td class ="frame-tb"   colspan="6" ><input name=n43 id=n43 class="size-tb-td" type="text"   value ="<?php echo ($result->n43);?>" ></td>
				</tr>
				
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>3.
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:18px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n44 id=n44 class="size-tb-td" type="text"   value ="<?php echo ($result->n44);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n_old_44 id=n_old_44 class="size-tb-td" type="text"   value ="<?php echo ($result->old_3);?>" ></td>
					<td class ="frame-tb"   colspan="5" ><input name=n45 id=n45 class="size-tb-td" type="text"   value ="<?php echo ($result->n45);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n46 id=n46 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n46);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n47 id=n47 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n47);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n48 id=n48 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n48);?>" ></td>
					<td class ="frame-tb"   colspan="6" ><input name=n49 id=n49 class="size-tb-td" type="text"   value ="<?php echo ($result->n49);?>" ></td>
				</tr>
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>4.
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:18px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n50 id=n50 class="size-tb-td" type="text"   value ="<?php echo ($result->n50);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n_old_50 id=n_old_50 class="size-tb-td" type="text"   value ="<?php echo ($result->old_4);?>" ></td>
					<td class ="frame-tb"   colspan="5" ><input name=n51 id=n51 class="size-tb-td" type="text"   value ="<?php echo ($result->n51);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n52 id=n52 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n52);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n53 id=n53 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n53);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n54 id=n54 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n54);?>" ></td>
					<td class ="frame-tb"   colspan="6" ><input name=n55 id=n55 class="size-tb-td" type="text"   value ="<?php echo ($result->n55);?>" ></td>
				</tr>
				
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>5.
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:18px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n56 id=n56 class="size-tb-td" type="text"   value ="<?php echo ($result->n56);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n_old_56 id=n_old_56 class="size-tb-td" type="text"   value ="<?php echo ($result->old_5);?>" ></td>
					<td class ="frame-tb"   colspan="5" ><input name=n57 id=n57 class="size-tb-td" type="text"   value ="<?php echo ($result->n57);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n58 id=n58 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n58);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n59 id=n59 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n59);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n60 id=n60 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n60);?>" ></td>
					<td class ="frame-tb"   colspan="6" ><input name=n61 id=n61 class="size-tb-td" type="text"   value ="<?php echo ($result->n61);?>" ></td>
				</tr>
				
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>6.
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:18px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n62 id=n62 class="size-tb-td" type="text"   value ="<?php echo ($result->n62);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n_old_62 id=n_old_62 class="size-tb-td" type="text"   value ="<?php echo ($result->old_6);?>" ></td>
					<td class ="frame-tb"   colspan="5" ><input name=n63 id=n63 class="size-tb-td" type="text"   value ="<?php echo ($result->n63);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n64 id=n64 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n64);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n65 id=n65 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n65);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n66 id=n66 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n66);?>" ></td>
					<td class ="frame-tb"   colspan="6" ><input name=n67 id=n67 class="size-tb-td" type="text"   value ="<?php echo ($result->n67);?>" ></td>
				</tr>
				
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>7.
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:18px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n68 id=n68 class="size-tb-td" type="text"   value ="<?php echo ($result->n68);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n_old_68 id=n_old_68 class="size-tb-td" type="text"   value ="<?php echo ($result->old_7);?>" ></td>
					<td class ="frame-tb"   colspan="5" ><input name=n69 id=n69 class="size-tb-td" type="text"   value ="<?php echo ($result->n69);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n70 id=n70 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n70);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n71 id=n71 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n71);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n72 id=n72 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n72);?>" ></td>
					<td class ="frame-tb"   colspan="6" ><input name=n73 id=n73 class="size-tb-td" type="text"   value ="<?php echo ($result->n73);?>" ></td>
				</tr>
				
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>8.
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:18px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n74 id=n74 class="size-tb-td" type="text"   value ="<?php echo ($result->n74);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n_old_74 id=n_old_74 class="size-tb-td" type="text"   value ="<?php echo ($result->old_8);?>" ></td>
					<td class ="frame-tb"   colspan="5" ><input name=n75 id=n75 class="size-tb-td" type="text"   value ="<?php echo ($result->n75);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n76 id=n76 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n76);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n77 id=n77 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n77);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n78 id=n78 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n78);?>" ></td>
					<td class ="frame-tb"   colspan="6" ><input name=n79 id=n79 class="size-tb-td" type="text"   value ="<?php echo ($result->n79);?>" ></td>
				</tr>
				
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>9. 
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:18px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n84 id=n84 class="size-tb-td" type="text"   value ="<?php echo ($result->n84);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n_old_84 id=n_old_84 class="size-tb-td" type="text"   value ="<?php echo ($result->old_9);?>" ></td>
					<td class ="frame-tb"   colspan="5" ><input name=n85 id=n85 class="size-tb-td" type="text"   value ="<?php echo ($result->n85);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n86 id=n86 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n86);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n87 id=n87 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n87);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n88 id=n88 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n88);?>" ></td>
					<td class ="frame-tb"   colspan="6" ><input name=n89 id=n89 class="size-tb-td" type="text"   value ="<?php echo ($result->n89);?>" ></td>
				</tr>
				
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" valign=middle>10.
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:17px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td>
					<td class ="frame-tb"   colspan="2" ><input name=n90 id=n90 class="size-tb-td" type="text"   value ="<?php echo ($result->n90);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n_old_90 id=n_old_90 class="size-tb-td" type="text"   value ="<?php echo ($result->old_10);?>" ></td>
					<td class ="frame-tb"   colspan="5" ><input name=n91 id=n91 class="size-tb-td" type="text"   value ="<?php echo ($result->n91);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n92 id=n92 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n92);?>" ></td>
					<td class ="frame-tb"   colspan="1" ><input name=n93 id=n93 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n93);?>" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=n94 id=n94 class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result->n94);?>" ></td>
					<td class ="frame-tb"   colspan="6" ><input name=n95 id=n95 class="size-tb-td" type="text"   value ="<?php echo ($result->n95);?>" ></td>
					<td>
						<!--<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>-->
						<!--<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>-->
						<!--<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>-->
					</td>
				</tr>
				
			<?php 
				
				$id=  intval($_GET['id']);

				$sql_sub = "SELECT * from elc_screwdriver.`table1_sub` where mapid  =$id ORDER BY `row`";
				$query_sub = $dbh -> prepare($sql_sub);

				$query_sub->execute();
				$results_sub=$query_sub->fetchAll(PDO::FETCH_OBJ);

				$row_count=10;
				if($query_sub->rowCount() > 0)
				{
					foreach($results_sub as $result_sub)
					{
						$row_count++;
			?>
						<tr>
							<td class ="frame-tb"   colspan="1" align="center" valign=middle><a name = tsn<?php echo $row_count; ?> id =tsn<?php echo $row_count ;?> value ="<?php echo $row_count;?>"/> <?php echo $row_count ;?></a>.
					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2('#layer',this)"></i>
					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:17px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>
					</td></td>
							<td class ="frame-tb"   colspan="2" ><input name ="sn<?php echo ($row_count-11)*5+$row_count-10; ?>" id="sn<?php echo (($row_count-11)*5+$row_count-10); ?>" class="size-tb-td" type="text"   value ="<?php echo ($result_sub->s1);?>" ></td>
							<td class ="frame-tb"   colspan="2" ><input name ="sn_old<?php echo ($row_count-11)*5+$row_count-10; ?>" id="sn_old<?php echo (($row_count-11)*5+$row_count-10); ?>" class="size-tb-td" type="text"   value ="<?php echo ($result_sub->s7);?>" ></td>
							<td class ="frame-tb"   colspan="5" ><input name ="sn<?php echo ($row_count-11)*5+$row_count-9; ?>" id="sn<?php echo (($row_count-11)*5+$row_count-9); ?>" class="size-tb-td" type="text"   value ="<?php echo ($result_sub->s2);?>" ></td>
							<td class ="frame-tb"   colspan="1" ><input name ="sn<?php echo ($row_count-11)*5+$row_count-8; ?>" id="sn<?php echo (($row_count-11)*5+$row_count-8); ?>" class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result_sub->s3);?>" ></td>
							<td class ="frame-tb"   colspan="1" ><input name ="sn<?php echo ($row_count-11)*5+$row_count-7; ?>" id="sn<?php echo (($row_count-11)*5+$row_count-7); ?>" class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result_sub->s4);?>" ></td>
							<td class ="frame-tb"   colspan="2" ><input name ="sn<?php echo ($row_count-11)*5+$row_count-6; ?>" id="sn<?php echo (($row_count-11)*5+$row_count-6); ?>" class="size-tb-td" type="text" style="text-align:right; "  value ="<?php echo ($result_sub->s5);?>" ></td>
							<td class ="frame-tb"   colspan="6" ><input name ="sn<?php echo ($row_count-11)*5+$row_count-5; ?>" id="sn<?php echo (($row_count-11)*5+$row_count-5); ?>" class="size-tb-td" type="text"   value ="<?php echo ($result_sub->s6);?>" ></td>
						</tr>
			<?php
					}	// foreach end
				}	// if end
				
			?>
				<tr>
					<td class ="frame-tb"   colspan="1" align="center" style="background-color:#ffffff;" valign=middle>INSERT ROW.</td>
					<td class ="frame-tb"   colspan="2" ><input name=plus id=plus class="size-tb-td" type="button" onclick="addrow()" style="background-color:#4d94ff;"  value ="+" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=minus id=minus class="size-tb-td" type="button" onclick="cutrow()" style="background-color:#4d94ff;"  value ="-" ></td>
					<td class ="frame-tb"   colspan="2" ><input name=chkrel id=chkrel class="size-tb-td" type="button" onclick="window.location.reload();" style="background-color:#ffffe6;"  value ="確認新增項" ></td>
				</tr>

				<?php
			}	// foreach end
		}	// if end	
		
		?>
		
		</table>
		
		<table id = 'tablef'>
				<tr> 	 
					<td class ="frame-tb"  width="100"  colspan="2" align="center" valign=middle>報價:</td>
					<td class ="frame-tb"  width="300"  colspan="2" ><input name=n80 id=n80 class="size-tb-td" type="date"    value ="<?php echo ($result->n80);?>" ></td>
					<td class ="frame-tb"  width="100"  colspan="2" align="center" valign=middle>金額:</td>
					<td class ="frame-tb"  width="300"  colspan="3" ><input name=n81 id=n81 class="size-tb-td" style="text-align:right; "type="text"   value ="<?php echo ($result->n81);?>" ></td>
					<td class ="frame-tb"  width="100"  colspan="2" align="center" valign=middle>確認:</td>
					<td class ="frame-tb"  width="300"  colspan="2"  ><input name=n82 id=n82 class="size-tb-td" type="date"   value ="<?php echo ($result->n82);?>" ></td>
					<td class ="frame-tb"  width="100"  colspan="3" align="center" valign=middle>維修人:</td>
					<td class ="frame-tb"  width="500"  colspan="3" ><input name=n83 id=n83 class="size-tb-td" type="text"   value ="<?php echo ($result->n83);?>" ></td>
				</tr>
		</table>
		
	</form>

<hr>

</main>

<div id='note' class=left-sidebar-hover></div>
	<a >備註：扭力刻度對照之參考值僅供檢修判定依據，詳細資料請參考原廠型錄</a>
</br>
<div id='DATE' class=left-sidebar-hover></div>
	<a >Proj-CLS Msg: <?php echo ($result->clos_time);?> </a>
</br>

	<form id="layer" action="" method="post" style="padding-left: 5px; border: 3px solid #660099;  background-color:Snow; left: 30px; right: 3px; display:none;">		
		
		<table id="table2" class="tablesorter" border="1" cellpadding="3" cellspacing="1" style="border: 3px solid #660099;  background-color:Snow;">
		<div class="title">		</div>
			
		<?php 
			$str_tmp = $result->n8;
			//echo $str_tmp.'</br>';
			$str_tmp =substr($str_tmp ,strlen('DLV'));
			//echo $str_tmp.'</br>';
			$mmid = substr($str_tmp ,0,strpos($str_tmp,"-"));
			$mmid = trim($mmid);
			//echo $mmid.'</br>';
			$ttid = substr($str_tmp ,(strpos($str_tmp,"-")));
			$ttid = substr($ttid ,strlen('-'));
			$ttid = trim($ttid);
			//echo  $ttid.'</br>';
			
			$_COOKIE['mmid'] = $mmid ;
			$_COOKIE['ttid'] = $mmid ;

			if($mmid === '' or $mmid === null){
				echo '<a>post lost.</a>';
			}
			
			if($ttid === '' or $ttid === null){
				echo '<a>post lost.</a>';
			}
			
			$sql_model = "SELECT `mid`,`model` FROM elc_screwdriver_db.`model_db` WHERE `model` = '".$mmid."';";
			$query_model = $dbh -> prepare($sql_model);
			$query_model->execute();
			$results_model=$query_model->fetchAll(PDO::FETCH_OBJ);
			$result_model = $results_model[0];
			
			$sql_tpye = "SELECT `tid`,`type` FROM elc_screwdriver_db.`type_db` WHERE `type` ='".$ttid."';";
			$query_tpye = $dbh -> prepare($sql_tpye);
			$query_tpye->execute();
			$results_tpye=$query_tpye->fetchAll(PDO::FETCH_OBJ);
			$result_tpye = $results_tpye[0];

			$sql = "SELECT * FROM elc_screwdriver_db.`controler` WHERE `mid` = " . $result_model->mid ." and `tid` = ". $result_tpye->tid ." order by `nid`";
			$query = $dbh -> prepare($sql);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			
			if($result_model->mid == null ){
				echo '</br>';
				echo '<center> &ensp;'.$mmid  . '&#9472;資料庫 無匹配資料.&ensp;</br><center>';
			}
			
			if($result_tpye->tid == null ){
				echo '</br>';
				echo '<center> &ensp;'. $ttid  . '&#9472;資料庫 無匹配資料.&ensp;</br></center>';
			}
			//$cnt=1;
			if($query->rowCount() > 0)
			{
		?>	
				<center>
					<!--<a  > <?php echo '資料數 : '.$query->rowCount() ;?></a> -->
					</br>
					<a ></a> 
					<!--<a  > <?php //echo 'MODEL&#9472;TYPE :  '.$mmid .'&#9472;'. $ttid ;?></a> -->
					<a  > <?php echo 'MODEL&#9472;TYPE :  '.$result_model->model .'&#9472;'. $result_tpye->type ;?></a> 
					<p><center><input type="submit" value="關閉 Close" /></center></p>
				</center>
				
					<thead >	
						<tr style = "background : #009999;">
							<th  >id</th>
							<th  >No.</th>
							<th  >Part No.</th>
							<th  >Old Code</th>
							<th  >Part Nmae</th>
							<th  >Part Nmae (中文)</th>
							<th  >Quantity</th>
							<th  >price(NTD)</th>
							<!--<th  name = "th_cid" style = "display:none;">cid</th>		-->		
						</tr>
					</thead>
				<tbody id="tbd1">
				<?php
				$index = 0;
				foreach($results as $result)
				{
					$sql2 = "SELECT `pid_name`,`part_name_old` FROM elc_screwdriver_db.`part_list_db` WHERE `pid` =".$result->pid;
					$query2 = $dbh -> prepare($sql2);
					$query2->execute();
					$results2=$query2->fetchAll(PDO::FETCH_OBJ);
					$result2 = $results2[0];
					
					$sql3 = "SELECT `info_en`,`info_cn`,`quantity`, `price_TWD` FROM elc_screwdriver_db.`info_db` WHERE `iid` =".$result->iid;
					$query3 = $dbh -> prepare($sql3);
					$query3->execute();
					$results3=$query3->fetchAll(PDO::FETCH_OBJ);
					$result3 = $results3[0];
					
					$index++;
					//in_array(要搜尋的值,被搜尋的陣列);
				?>
					
					<tr onclick='trclick(this);' <?php if(in_array($result2->pid_name, $filter_cid)){echo  "style='background-color:DarkGray;'";}else if( in_array($result2->part_name_old, $filter_oid)){ if($result2->part_name_old != ''){echo  "style='background-color:DarkGray;'";}else{}}?> >
						<td   			><?php echo $index;  ?> </td>
						<td    				><?php echo $result->nid;?> </td>
						<td    width ="10%"	><?php echo $result2->pid_name;?> </td>
						<td    width ="10%"	><?php echo $result2->part_name_old;?> </td>
						<td    width ="35%" ><?php echo $result3->info_en;?>  </td>
						<td    width ="35%" ><?php echo $result3->info_cn;?>   </td>
						<td    width ="5%"	><?php if($result3->quantity !=0)echo $result3->quantity;?> </td>
						<td    width ="5%"	><?php if($result3->price_TWD !=0)echo $result3->price_TWD;?> </td>
						<td   name = "tb_cid" style = "display:none;"			><?php echo $result->id;?> </td>
					</tr>

				<?php
				}
			}
				?>
			</tbody>
			<tfoot>
				<tr style = "background : #009999;">
					<th  >id</th>
					<th  >No.</th>
					<th  >Part No.</th>
					<th  >Old Code</th>
					<th  >Part Nmae</th>
					<th  >Part Nmae (中文)</th>
					<th  >Quantity</th>
					<th  >price(NTD)</th>
					<th  name = "tf_cid" style = "display:none;">cid</th>				
				</tr>
			</tfoot>
		</table>
		<p><center><input type="submit" value="關閉 Close" /></center></p>
		</br>
	</form>

<h2 align=center></h2>


	<link rel="apple-touch-icon" href="assets/images/2006080055s.gif">
	<link rel="stylesheet"  type="text/css" href="dist/bootstrap.min.css"/>
	<link rel="stylesheet"  type="text/css" href="css/custom.css"/>	
	<!-- Latest compiled and minified CSS -->
	<!--<link rel="stylesheet"  type="text/css" href="dist/bootstrap.min.css"/>-->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css"> -->
	<link rel="stylesheet" href="bootstrap-select-1.13.9/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet"  type="text/css" href="assets/css/bootstrap-toggle.min.css"/>
	<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
	<script  type="text/javascript" src="dist/jquery-3.3.1.min.js"></script>
	<!--<script  src="dist/bootstrap.min.js"></script>-->
	<script type="text/javascript"  src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<script  src="assets/plugins/materialize/js/materialize.min.js"></script>
	<script  src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
	<script  src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>-->
	<script  type="text/javascript" src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script  type="text/javascript" src="assets/js/bootstrap-toggle.min.js"></script>
	<script  type="text/javascript" src='js/custom.js'> </script>
	
	<!--
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet"/>
	-->

	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script> -->
	<script src="bootstrap-select-1.13.9/dist/js/bootstrap-select.min.js"></script>
	<!-- (Optional) Latest compiled and minified JavaScript translation files -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> -->
	
<p id="demo"></p>

<?php
	$sql0 = "SELECT `type`,`nn2`,`nn4`,`nn6`,`nn8` FROM `typemap`";
	$query0 = $dbh -> prepare($sql0);
	
	//$query->bindParam(':eid',$eid,PDO::PARAM_STR);
	$query0->execute();
	//$results0=$query0->fetchAll(PDO::FETCH_OBJ);
	$results0=$query0->fetchAll(PDO::FETCH_ASSOC);
	echo "<hr>";
	//$cnt=1
	
	$cn=0;
	
	if($query0->rowCount() > 0)
	{
		//echo "count = ".$query0->rowCount()."</br>";
		foreach($results0 as $result0){
			//echo $result0."</br>";
			//print_r($result0)."</br>";
			
			$mary[$cn]=array();
			array_push($mary[$cn],array($result0['type']));
			array_push($mary[$cn],array($result0['nn2']));
			array_push($mary[$cn],array($result0['nn4']));			
			array_push($mary[$cn],array($result0['nn6']));
			array_push($mary[$cn],array($result0['nn8']));
			
			/*
			echo "記數 :　".$cn."</br>";
			echo $result0['type']." ===== ";
			echo $result0['nn2']." - ";
			echo $result0['nn4']." - ";
			echo $result0['nn6']." - ";
			echo $result0['nn8']."</br>";
			
			$maryArray[$cn][] = array(
				0 => $result0['type'],
				1 => $result0['nn2'],  
				2 => $result0['nn4'],
				3 => $result0['nn6'],
				4 => $result0['nn8'],
				
			) ;
			*/
			$cn = $cn+1;
		}
		//print_r($mary);
	}
?>

<?php
     
// Create an array 
$sampleArray = array( 
    0 => "Geeks",  
    1 => "for",  
    2 => "Geeks",  
)
?> 

<!--
<button type=submit name=update id=update style=float:right;margin-right:18px onclick="cleanall()" >ClearAll</button>
若無使用 濾波器 可告知拆除可不修.
-->
<script>
	function myFunction() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		table = document.getElementById("table2");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
			td_1 = tr[i].getElementsByTagName("td")[1];
			if (td_1) {
				txtValue = td_1.textContent || td_1.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
			td_2 = tr[i].getElementsByTagName("td")[2];
			if (td_2) {
				txtValue = td_2.textContent || td_2.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
			td_3 = tr[i].getElementsByTagName("td")[3];
			if (td_3) {
				txtValue = td_3.textContent || td_3.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
	
	
	function addcid() {	
		<?php 
			include_once('../includes/config_esrms.php');
			
			//$sql2 =	"SELECT max(`cid`)+1 AS max_id FROM elc_screwdriver.`auto_id`";
			
			//$sql2 =	"SELECT `model` FROM `auto_id`";
			$sql2 =	"SELECT `model` FROM `auto_id` where `model` != '' group by `model`";
			
			$query3 = $dbh -> prepare($sql2);
			$query3 -> execute();
			//$invNum = $query3 -> fetch(PDO::FETCH_ASSOC);
			//$max_id = $invNum['max_id'];
			
			$value = $query3->rowCount();
			/*
			$rows = $query3->fetchAll();
			$value = count($rows);
			*/
			//$value = strval($max_id);
			$value = str_pad(($value+1),6,'0',STR_PAD_LEFT);
			
		?>
			var mystr = "<?php echo 'dv'.$value; ?>";
			var oid = document.getElementById("cid").value = mystr;
		 
		//	var oid = document.getElementById("cid").value = "dv自動唯一編號"; ji3y94h9 vu;35k4u;42k7gk4vu4cp3x04u.4cp3a04 ji3e9 bj6ck6g4cl3 aj4fu06a0a03sl3y72. g4fu062k7vu;3z83

	}
	
	function addrow() {
		
		var oid = document.getElementById("oid").innerHTML;
		var oidsub = parseInt(oid, 10);

		var table = document.getElementById("table1");
		
		var rowid = table.rows.length-11;
		
		//return;
		
		if(rowid == 20){
			alert("檔案限制20筆, 請通資系統負責人員開放更多欄位.");
			return;		
		}
		// add row.
		// insert sub table.
		
		var result = $.ajax( {
			url: 'ajax/DBWriteraddrow.php', 
			type:"POST",
			data: {  bid:oidsub , rowid:rowid},		
			dataType: "json",
			success: function(data)
			{
				// success
			}
		});
		
		var num = table.rows.length-1;
		var row = table.insertRow(num);
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		var cell6 = row.insertCell(5);
		var cell7 = row.insertCell(6);
		var cell8 = row.insertCell(7);
		cell1.innerHTML = '<td class ="frame-tb"   colspan="1" align="center" valign=middle>'+(num-10)+'.					<i title="auto insert text" class="fa fa-plus-square-o" style="font-size:18px;border-width:1px;border-style:dotted;border-color:Orange" onclick="showLayer_2("#layer",this)"></i>					<i title="erase row text" 	class="fa fa-trash-o" 		style="font-size:18px;border-width:1px;border-style:dotted;border-color:red" 	onclick="showLayer_del(this)"></i>					</td>'
		//cell1.innerHTML = ' <td > <a>'+(num-10)+'</a> </td> ';
		cell2.innerHTML = ' <td class ="frame-tb"   align="center" valign=middle> <input name=sn'+(((num-21)*5)+(num-20))+' id=sn'+(((num-21)*5)+(num-20))+' class="size-tb-td" type="text" style="background-color:#e6fff7;"  value ="" readonly /></td> ';
		cell3.innerHTML = ' <td class ="frame-tb"   align="center" valign=middle> <input name=sn_old'+(((num-21)*5)+(num-20))+' id=sn_old'+(((num-21)*5)+(num-20))+' class="size-tb-td" type="text" style="background-color:#e6fff7;"  value ="" readonly /></td> ';
		cell4.innerHTML = ' <td class ="frame-tb"   align="center" valign=middle> <input name=sn'+(((num-21)*5)+(num-20+1))+' id=sn'+(((num-21)*5)+(num-20+1))+' class="size-tb-td" type="text" style="background-color:#e6fff7;"  value ="" readonly /></td> ';
		cell5.innerHTML = ' <td class ="frame-tb"   align="center" valign=middle> <input name=sn'+(((num-21)*5)+(num-20+2))+' id=sn'+(((num-21)*5)+(num-20+2))+' class="size-tb-td" type="text" style="background-color:#e6fff7;"  value ="" readonly /></td> ';
		cell6.innerHTML = ' <td class ="frame-tb"   align="center" valign=middle> <input name=sn'+(((num-21)*5)+(num-20+3))+' id=sn'+(((num-21)*5)+(num-20+3))+' class="size-tb-td" type="text" style="background-color:#e6fff7;"  value ="" readonly /></td> ';
		cell7.innerHTML = ' <td class ="frame-tb"   align="center" valign=middle> <input name=sn'+(((num-21)*5)+(num-20+4))+' id=sn'+(((num-21)*5)+(num-20+4))+' class="size-tb-td" type="text" style="background-color:#e6fff7;"  value ="" readonly /></td> ';
		cell8.innerHTML = ' <td class ="frame-tb"   align="center" valign=middle> <input name=sn'+(((num-21)*5)+(num-20+5))+' id=sn'+(((num-21)*5)+(num-20+5))+' class="size-tb-td" type="text" style="background-color:#e6fff7;"  value ="" readonly /></td> ';
		
		//[colSpan]
		cell2.colSpan="2";
		cell3.colSpan="2";
		cell4.colSpan="5";
		cell5.colSpan="1";
		
		cell6.colSpan="1";
		cell7.colSpan="2";
		cell8.colSpan="6";
		//[textAlign]
		cell1.style.textAlign = "center";
		//cell2
		
		//[border]
		cell1.style.border = "1px solid #000000";
		cell2.style.border = "1px solid #000000";
		cell3.style.border = "1px solid #000000";
		cell4.style.border = "1px solid #000000";
		cell5.style.border = "1px solid #000000";
		cell6.style.border = "1px solid #000000";
		cell7.style.border = "1px solid #000000";
		
		//[font-size]
		cell1.style.fontSize  = "10pt";
		cell2.style.fontSize  = "10pt";
		cell3.style.fontSize  = "10pt";
		cell4.style.fontSize  = "10pt";
		cell5.style.fontSize  = "10pt";
		cell6.style.fontSize  = "10pt";
		cell7.style.fontSize  = "10pt";

		/*
			<td class ="frame-tb"   colspan="6" ><input name=n91 id=n91 class="size-tb-td" type="text"   value ="<?php echo ($result->n91);?>" ></td>
			<td class ="frame-tb"   colspan="1" ><input name=n92 id=n92 class="size-tb-td" type="text"   value ="<?php echo ($result->n92);?>" ></td>
			<td class ="frame-tb"   colspan="1" ><input name=n93 id=n93 class="size-tb-td" type="text"   value ="<?php echo ($result->n93);?>" ></td>
			<td class ="frame-tb"   colspan="2" ><input name=n94 id=n94 class="size-tb-td" type="text"   value ="<?php echo ($result->n94);?>" ></td>
			<td class ="frame-tb"   colspan="6" ><input name=n95 id=n95 class="size-tb-td" type="text"   value ="<?php echo ($result->n95);?>" ></td>
		*/
				
	}

	
	function statechange() {
		alert("in");
	}
	
	function cutrow() {
		
		var r = confirm("刪除欄位");
		if (r == true) {
			
		} else {
			return;
		}
		
		var table = document.getElementById("table1");
		var totalRowCount = table.rows.length; 
		
		if(totalRowCount <=22){
			
			return;
			
		}else{
			
			var oid = document.getElementById("oid").innerHTML;
			
			var oidsub = parseInt(oid, 10);							//mapid
			
			var table = document.getElementById("table1");
			
			var rowid = table.rows.length-12;						//row
			
			//alert("oidsub =  "+ oidsub + ", rowid = " + rowid);
		
			//return;
			
			//alert('bid = '+oidsub+", row delete "+rowid);
			var result = $.ajax( {
				url: 'ajax/DBWriterdeleterow.php', 
				type:"POST",
				data: {bid:oidsub, rowid:rowid},
				dataType: "json",
				success: function(data)
				{
					// success
				}
			});
			//var row = table.insertRow(0);
			document.getElementById("table1").deleteRow(totalRowCount-2);
			// 
		}
	}
	
	function cleanall() {
		var r = confirm("確認 清空 全部內容! ");
		if (r == true) {
		  for(var i = 1; i < 84; i++){
				try {
					document.getElementById("n"+i).value = '';
				}
				catch (e) {
				}
			}
		}
	}
	
	function typechange() {
		var x = document.getElementById("n8").value;
		//document.getElementById("demo").innerHTML = "Msg selected: " + x;
		// Access the array elements 
		
		var testlist =  <?php echo json_encode($mary); ?>; 
		
		//alert("testlist : "+testlist.length);
		// Display the array elements 
		/*
		for(var i = 0; i < testlist.length; i++){
			alert("陣列 :" + i);
			//alert("next testlist : "+testlist[i].length);
			for(var d = 0; d < testlist[i].length; d++){ 
				alert(testlist[i][d]);
			}
		}
		*/
		for(var i = 0; i < testlist.length; i++){
			
				//alert(testlist[i][0]);
			if(x ==testlist[i][0]){
				document.getElementById("n18").value = testlist[i][1];
				document.getElementById("n19").value = testlist[i][2];
				document.getElementById("n20").value = testlist[i][3];
				document.getElementById("n21").value = testlist[i][4];
				break;
			}
		}
		
		if(x ==""){
			document.getElementById("n18").value = "";
			document.getElementById("n19").value = "";
			document.getElementById("n20").value = "";
			document.getElementById("n21").value = "";
		}
		
		document.getElementById("demo").innerHTML = "Msg selected: " + x + ".";
	}
	/*
	function radio_open(){
		document.getElementById("close").checked = false;
		//TODO: ajax direct write date.		
	}
	
	function radio_close(){
		document.getElementById("open").checked = false;
		//TODO: ajax direct write date.
	}
	*/
	function showLayer(id, width, height) {
		alert('in 3');
	    var obj  = document.getElementById(id);
	    var winWidth = document.documentElement.clientWidth;
	    var winHeight = document.documentElement.clientHeight;
	    var offsetTop = document.documentElement.offsetTop;
	    var left = (winWidth - width)/2;
	//    var top  = (winHeight - height)/2 + offsetTop;
	    var top  = 0;
	    obj.style.top = top + "px";
	    obj.style.left = left + "px";
	    obj.style.display = "block";
	}
	
	function setCookie(cname, cvalue, exdays) {
	  var d = new Date();
	  d.setTime(d.getTime() + (exdays*24*60*60*1000));
	  var expires = "expires="+ d.toUTCString();
	  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
	
	function showLayer_2(id,element) {
		
		
		<?php
		$mmid = $_COOKIE['mmid'];
		$ttid = $_COOKIE['ttid'];
		?>
		
		//alert('in 2');
		var rowJavascript = element.parentNode.parentNode;
		var rowjQuery = $(element).closest("tr");
		
		//setCookie('rowJavascript',rowJavascript.rowIndex,1);
		setCookie('rowjQuery',(rowjQuery[0].rowIndex-10),1);
		//alert("JavaScript Row Index : " + (rowJavascript.rowIndex - 1) + "\njQuery Row Index : " + (rowjQuery[0].rowIndex - 1));
		
		
		var left = ($(window).width() - $(id).width())/2;
	    var top  = 50;
		$(id).css({"top": top, "left": left, "display": "block"});
		
		window.document.body.scrollTop = 0;
		window.document.documentElement.scrollTop = 0;
	}
	
	function showLayer(id) {
		//alert('in 1');
	    var left = ($(window).width() - $(id).width())/2;
	//  var top  = ($(window).height() - $(id).height())/2;
	    var top  = 0;
	    
		//document.getElementById("table1").style.display = "none";
		//document.getElementById("tablef").style.display = "none";
		//document.getElementById("note").style.display = "none";
		$(id).css({"top": top, "left": left, "display": "block"});
		
	}
	
	function hideLayer(id) {
	    $(id).css({"display": "none"});
	}
	
	function showLayer_del(element) {

		var table = document.getElementById('table1'), 
			rows = table.getElementsByTagName('tr'),
			i, j, cells, customerId = '';

		var rowjQuery = $(element).closest("tr");

		$index_int = (rowjQuery[0].rowIndex-10);	//delelt indel 10 + target row
		for (i = 0;  i < rows.length; ++i) {
			if(i == (parseInt($index_int)+10)){
				cells = rows[i].getElementsByTagName('td');
				if (!cells.length) {
					continue;
				}
				for (j = 0;  j < cells.length; ++j) {
					
					if (j == 0 ) {
						continue;
					}
					
					customerId = customerId + '['+ j+'], '+cells[j].firstChild.value;
					cells[j].firstChild.value ='';
					if(j == 0){
						//tmp_arr
					}else if(j == 1){
						cells[j].firstChild.value ='';
					}else if(j == 2){
						cells[j].firstChild.value ='';
					}else if(j == 3){
						cells[j].firstChild.value ='';
					}else if(j == 4){
						cells[j].firstChild.value ='';
					}else if(j == 5){
						cells[j].firstChild.value ='';
					}else if(j == 6){
						cells[j].firstChild.value ='';
					}else if(j == 7){
						cells[j].firstChild.value ='';
					}else{
						
					}
				}
				
			}else{
				
			}
		}
	}
	
	$("#stoggle").change(function(){
		
		let key ="0x123456";
		let id =<?php echo $_GET["id"]; ?>;
		let column ="state";
		let cmd = 0;
		if($(this).prop("checked") == true){
		   //run code
		   //alert('Note in true');
		   //$notetoggle = true;
		   //$msg="更新成功.".$stoggle."-".$notetoggle;
		   cmd = 0;
		}else{
		   //run code
		   //alert('Note in false');
		   //$notetoggle = false;
		   cmd = 1;
		}
		/*
			$id=intval($_GET["id"]);
			$sql="update elc_screwdriver.`table1`where id=$id";
			//echo $sql;
			$query = $dbh->prepare($sql);
			$query->execute();
		*/
		//	call ajax update( id, mailnote, int).
		var result = $.ajax( {
			url: 'ajax/DBWriterelcevent.php', 
			type:"POST",
			data: {cmdkey:key, cmdid:id, cmdcolumn:column, cmdcmd:cmd},
			dataType: "json",
			success: function(data)
			{
				//	success
				
			}
		});
	});
	
	
	$("#notetoggle").change(function(){
		let key ="0x123456";
		let id =<?php echo $_GET["id"]; ?>;
		let column ="mailnote";
		let cmd = 0;
		if($(this).prop("checked") == true){
		   //run code
		   //alert('Note in true');
		   //$notetoggle = true;
		   //$msg="更新成功.".$stoggle."-".$notetoggle;
		   cmd = 0;
		}else{
		   //run code
		   //alert('Note in false');
		   //$notetoggle = false;
		   cmd = 1;
		}
		/*
			$id=intval($_GET["id"]);
			$sql="update elc_screwdriver.`table1`where id=$id";
			//echo $sql;
			$query = $dbh->prepare($sql);
			$query->execute();
		*/
		//	call ajax update( id, mailnote, int).
		var result = $.ajax( {
			url: 'ajax/DBWriterelcevent.php', 
			type:"POST",
			data: {cmdkey:key, cmdid:id, cmdcolumn:column, cmdcmd:cmd},
			dataType: "json",
			success: function(data)
			{
				//	success,
				
			}
		});
	});
	
	$("#price").change(function(){
		
		//  取得被選擇項目的文字
		let selectedText = $(this).find(":selected").text();
		
		//  取得被選擇項目的值
		let selectedval = $(this).find(":selected").val();
		
		var cost_fee = 0;
		switch (selectedText) {
			case "折扣:":
					return;
				break;
			case "原價":
				//alert(selectedText);
				
				cost_fee = 100;
				break;
			default:				
				
				// 直接抓陣列 修改內容
				alert(selectedText);
				
				
				//ajax get json code when be comne
				
				
				
				
				// 	比對伺服器匹配數值, 若無請提示原價,以及修改內容.
				
				
				
				
				
				cost_fee = 100;
				break;
		}
		
		// TODO
		var text_pri = "";
		var text_qty = "";
		var index_id = 35;
		var index_offset = 6;
		var bill =0;
		var i;
		// 1 ~ 8
		for (i = 0; i < 8; i++) {
			text_pri = index_id + (i*index_offset);
			text_qty = (index_id-1) + (i*index_offset);
			document.getElementById(('n'+(text_pri+1))).value = Math.round(document.getElementById(('n'+text_qty)).value * document.getElementById(('n'+text_pri)).value* cost_fee/100);
			bill +=Math.round(document.getElementById(('n'+text_qty)).value * document.getElementById(('n'+text_pri)).value* cost_fee/100);
		}
		
		// 9 ~ 10
		var index_id_sub = 87; // 地9項單價位置.		
		var i2;
		for (i2 = i; i2 < 10; i2++) {
		  text_pri = index_id_sub + ((i2-8)*index_offset);
		  text_qty = (index_id_sub-1) + ((i2-8)*index_offset);
		  document.getElementById(('n'+(text_pri+1))).value = Math.round(document.getElementById(('n'+text_qty)).value * document.getElementById(('n'+text_pri)).value* cost_fee/100);
		  bill +=Math.round(document.getElementById(('n'+text_qty)).value * document.getElementById(('n'+text_pri)).value* cost_fee/100);
		}
		
		// 11 ~ max
		var index_id_sub_2 = 4; // 地11項單價位置.
		var i3;
		for (i3 = i2; i3 < 15; i3++) {
		  text_pri = index_id_sub_2 + ((i3-10)*index_offset);
		  text_qty = (index_id_sub_2-1) + ((i3-10)*index_offset);
		  if(document.getElementById(('sn'+text_qty)) !=null){
			document.getElementById(('sn'+(text_pri+1))).value = Math.round(document.getElementById(('sn'+text_qty)).value * document.getElementById(('sn'+text_pri)).value* cost_fee/100);
			bill +=Math.round(document.getElementById(('sn'+text_qty)).value * document.getElementById(('sn'+text_pri)).value* cost_fee/100);
		  }
		}
		document.getElementById(('n'+81)).value = bill;
	});
	

	$("#stateoption").change(function(){
		let key ="0x123456";
		let id =<?php echo $_GET["id"]; ?>;
		let column ="state2";
		let cmd = 0;
		let selectedText = $(this).find(":selected").text();
		
		switch (selectedText) {
			case "檢修中":
				cmd = 1;
				break;
			case "檢修完成已送單":
				cmd = 2;
				break;
			case "維修中":
				cmd = 3;
				break;
			case "不維修":
				cmd = 4;
				break;
			case "維修完成":
				cmd = 5;
				break;
			default:
				cmd = 1;
		}
		
		//alert(id);
		
		//	call ajax update( id, state, int).
		let result = $.ajax( {
			url: 'ajax/DBWriterelcevent.php', 
			type:"POST",
			data: {cmdkey:key, cmdid:id, cmdcolumn:column, cmdcmd:cmd},
			dataType: "json",
			success: function(data)
			{
				// success
			}
		});
		
	});
	
	// spec
	
	//另表預先仔入
		
		function getCookie(cname) {
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
		
		function myDataidx(idx){
			x = document.getElementById("table2").rows.length;
			var t = document.getElementById("table2");
			//var tr = t.document.getElementsByTagName("tr")[idx];
			var tr = t.getElementsByTagName("tr")[idx];
			var tdl = tr.getElementsByTagName("td").length;
			var tmp  ='';
			
			var tmp_arr = [];
			
			for(j=0;j<tdl;j++){
				//if(j === 0){
				//	var td = tr.getElementsByTagName("td")[j].innerHTML;
				//}else if(j === 7){
				//	var td = tr.getElementsByTagName("td")[j].innerHTML;
				//}else{
				//	var td = tr.getElementsByTagName("td")[j].firstChild.value;
				//}
				var td = ''+tr.getElementsByTagName("td")[j].innerHTML;
				tmp_arr.push(td);
				tmp = tmp + td + ', ';
			}
			
			$index_int = getCookie('rowjQuery')
			//alert(tmp + ' <ROW: 414> and insert to : ' + getCookie('rowjQuery'));
			//alert(tmp_arr);
			document.getElementById("layer").style.display = "none";
			
			var table = document.getElementById('table1'), 
				rows = table.getElementsByTagName('tr'),
				i, j, cells, customerId = '';

			//alert('rows.length = ' + rows.length);
			//alert(parseInt($index_int)+10);
			
			for (i = 0;  i < rows.length; ++i) {
				if(i == (parseInt($index_int)+10)){
					cells = rows[i].getElementsByTagName('td');
					if (!cells.length) {
						continue;
					}
					for (j = 0;  j < cells.length; ++j) {
						
						if (j == 0 ) {
							continue;
						}
						
						customerId = customerId + '['+ j+'], '+cells[j].firstChild.value;
						//cells[j].firstChild.value = cells[j].firstChild.value + '['+j+']';
						
						if(j == 0){
							//tmp_arr
						}else if(j == 1){
							cells[j].firstChild.value =tmp_arr[j+1];
						}else if(j == 2){
							// 舊料號預留位置.
							cells[j].firstChild.value =tmp_arr[j+1];
						}else if(j == 3){
							//cells[j].firstChild.value =tmp_arr[j+1]+tmp_arr[j+2];
							cells[j].firstChild.value =tmp_arr[j+2];
						}else if(j == 4){
							cells[j].firstChild.value =tmp_arr[j+2];
						}else if(j == 5){
							cells[j].firstChild.value =tmp_arr[j+2].replace(/\s+/g,"");
						}else{
							
						}
					}
					
					//alert(customerId);
				}else{
					// 價目表 我先把它顯示出來.
					// 我先把他丟出來  再把
				}
			}
		}
		/** 要隱藏**/
		function trclick(x){
			myDataidx(x.rowIndex);
		};	
		
	
		
	/** ready */
	$(document).ready(function() {
		/*
		const name = 'oxxo';
		const age = 18;
		 // 有興趣的可以使用下方的網址測試
		const uri = `https://script.google.com/macros/s/AKfycbw5PnzwybI_VoZaHz65TpA5DYuLkxIF-HUGjJ6jRTOje0E6bVo/exec?name=${name}&age=${age}`;

		fetch(uri, {method:'GET'})
		.then(res => {
			return res.text();   // 使用 text() 可以得到純文字 String
		}).then(result => {
			console.log(result); // 得到「你的名字是：oxxo，年紀：18 歲。」
		});
		*/
		const uri_2 = 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-C60DFCEE-976F-48EC-9BA1-F8D058CF4054&limit=10&offset=0&format=JSON&locationName=%E8%8B%97%E6%A0%97%E7%B8%A3';
		fetch(uri_2)
		.then(res => {
			return res.json();
		}).then(result => {
			console.log(result); // 得到 高雄市的氣溫為 29.30 度 C
			
			let datasetDescription = result.records.datasetDescription;
			console.log(datasetDescription);
			
			
			
			let location_1_name = result.records.location[0].locationName;
			console.log(location_1_name);
			/*
			let location_1_time = result.records.location[0].weatherElement[0].time;
			console.log(location_1_time);
			*/
			
			let location_1_time_s = result.records.location[0].weatherElement[0].time[0].startTime;
			console.log(location_1_time_s);
			
			let location_1_time_p_n = result.records.location[0].weatherElement[0].time[0].parameter.parameterName;
			console.log(location_1_time_p_n);
			
			let location_1_time_p_v = result.records.location[0].weatherElement[0].time[0].parameter.parameterValue;
			console.log(location_1_time_p_v);
			
			let location_1_time_e = result.records.location[0].weatherElement[0].time[0].endTime;
			console.log(location_1_time_e);
			/*
			let city = result.cwbopendata.location[14].parameter[0].parameterValue;
			let temp = result.cwbopendata.location[14].weatherElement[3].elementValue.value;
			console.log(`${city}的氣溫為 ${temp} 度 C`); // 得到 高雄市的氣溫為 29.30 度 C
			*/
		});
		<?php
			$con = mysqli_connect('localhost','root','','price_discount');
			if (!$con) {
			  die('Could not connect: ' . mysqli_error($con));
			}
			mysqli_query($con,"SET CHARACTER SET UTF8");
			mysqli_select_db($con,"price_discount");
			$sql="SELECT * FROM price_discount.`menu` ";
			$result = mysqli_query($con,$sql);
			while($row = mysqli_fetch_array($result)) {
				if(trim($row['name']) != ''){
					echo '$("#price").append($("<option></option>").attr("value", "值").text("' . $row['name'] . '"));';
				}
			}
			mysqli_close($con);
		?>
		//insert
		//$("#price").append($("<option></option>").attr("value", "值").text("測試1"));
		//$("#price").append($("<option></option>").attr("value", "值").text("測試2"));
		//$("#price").append($("<option></option>").attr("value", "值").text("測試3"));

		// DataTable
		/*
		$('#table2 thead th').each( function () {
			var title = $(this).text();
			$(this).html( '<input type="text" placeholder="'+title+'" />' );
		} );
		*/

		 // DataTable
		var table = $('#table2').DataTable({
			 paging: false,
			initComplete: function () {
				// Apply the search
				this.api().columns().every( function () {
					var that = this;
	 
					$( 'input', this.footer() ).on( 'keyup change clear', function () {
						if ( that.search() !== this.value ) {
							that
								.search( this.value )
								.draw();
						}
					} );
				} );
			}
		});
	 
		
		function cookie_init(){
			var e = document.getElementById("n8");
				var strUser = e.options[e.selectedIndex].value;
				//myWindow.document.write("<p>"+strUser+"</p>");

				//var res1 = strUser.slice('DLV'.length);
				//myWindow.document.write("<p>"+res1+"</p>");
				var res2 = strUser.slice('DLV'.length,strUser.search("-"));
				//myWindow.document.write("<p>MODEL: "+res2+"</p>");
				var res3 = strUser.slice(strUser.search("-")+1);
				//myWindow.document.write("<p>TYPE: "+res3+"</p>");
				
				//alert(res2+ res3);
				document.cookie = "mmid="+res2;
				document.cookie = "ttid="+res3;
				
				
		}
		
		function keyFunction() {
			//alert("Key code = " + event.keyCode);
			if (event.keyCode==27) {
				alert("Esc 的內建功能已被取消！");
				return false;
			} else if (event.keyCode==8) {
				alert("Backspace 的內建功能已被取消！");
				return false;
			} else if (event.keyCode==9) {
				alert("Tab 的內建功能已被取消！");
				return false;
			} else if (event.keyCode==71) {
				document.location="http://www.google.com";
			} else if (event.keyCode==37) {
				alert("< 功能");
			} else if (event.keyCode==39) {
				alert("> 功能");
			} else if (event.keyCode==116) {
				alert("F5 的內建功能已被取消!");
				return false;
			}
		}
		function auto_math_all(x,x2){
			let Str_all		=	document.getElementById(x).value;
			let Sidx_all	=	document.getElementById(x2).value;
			if(Sidx_all!=0){
				let index_x = Math.round((Str_all/Sidx_all)*100) -100;
				if(Str_all/Sidx_all >1){
					document.getElementById((x+'p')).innerHTML =  '+'+ index_x +'%'; 
				}else{
					if(Str_all !='')
					document.getElementById((x+'p')).innerHTML =  index_x +'%';
				}
			}else{
				document.getElementById((x+'p')).innerHTML =  '0%';
			}
		  }
			
		  auto_math_all('n23','n18');
		  auto_math_all('n24','n19');
		  auto_math_all('n25','n20');
		  auto_math_all('n26','n21');
		  
		  auto_math_all('n28','n18');
		  auto_math_all('n29','n19');
		  auto_math_all('n30','n20');
		  auto_math_all('n31','n21');
		
		
		cookie_init();
		 //document.onkeydown = keyFunction;
		 
	}); 
	// Add row on add button click
	$(document).on("click", ".add", function(){
		
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}
    });
	
	
	$("#plus_add_2").on("click", function(){
		alert("Hello word" );
	});
	
	$(document).on("click", ".plus_add", function(){
			function trclick(){
				console.log('tr clicked');
				alert('add');
			};

			function tdclick(event){
				console.log('td clicked'); 
				event.stopPropagation()
			};
			
			/**keydown selected*/
			function openwindow(url,name,iWidth,iHeight)
			{
				/*
				var url;     //網頁位置;
				var name;    //網頁名稱;
				var iWidth;  //視窗的寬度;
				var iHeight; //視窗的高度;
				var iTop = (window.screen.availHeight-30-iHeight)/2;  //視窗的垂直位置;
				var iLeft = (window.screen.availWidth-10-iWidth)/2;   //視窗的水平位置;
				var myWindow  = window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',status=no,location=no,status=no,menubar=no,toolbar=no,resizable=no,scrollbars=no');
				*/
				
				var e = document.getElementById("n8");
				var strUser = e.options[e.selectedIndex].value;
				
				//myWindow.document.write("<p>"+strUser+"</p>");
				//var res1 = strUser.slice('DLV'.length);
				//myWindow.document.write("<p>"+res1+"</p>");
				var res2 = strUser.slice('DLV'.length,strUser.search("-"));
				//myWindow.document.write("<p>MODEL: "+res2+"</p>");
				var res3 = strUser.slice(strUser.search("-")+1);
				//myWindow.document.write("<p>TYPE: "+res3+"</p>");
				
				document.cookie = "mmid="+res2;
				document.cookie = "ttid="+res3;
				
				 //視窗的垂直位置 600是height
				var Top = (window.screen.availHeight - 30 - 700) / 2;  
	 
				//視窗的水平位置 450 是 width
				var Left = (window.screen.availWidth - 10 - 500) / 2;
				var url = "add.php?mid=3&tid=2&mmid="+res2+"&ttid="+res3;
				var myWindow = window.open(url, name, 
				config = "innerheight=680,innerwidth=800,top=" + Top + ",left=" + Left);
				
				//  gerlkm e er,grg lg;rp[lp erg[plrp; ergplr[hyerg  erg., elrkgerpl[hrt
				
				// 兩千八
			}
			
			openwindow('','setting','','');	

		});
		
		$(document).on("click", "#vehicle1", function(){
			alert('select in');
		});
		// Edit row on edit button click
		$(document).on("click", ".edit", function(){

			$arry = ['_ar1','_ar2','_ar3','_ar4','_ar5','_ar6','_ar7'];
			$i = 0;
			$(this).parents("tr").find("td:not(:first-child):not(:last-child)").each( function(){
				$('input', this).each(function() {
					var values =  $(this).val() ;
					$(this).val('自動數據2_' +values+ $arry[$i]);
				});
				$i++;
			});	
		});
		
		// Delete row on delete button click
		$(document).on("click", ".delete", function(){
			$(this).parents("tr").remove();
			$(".add-new").removeAttr("disabled");
		});
		
		
		$(document).keydown(function(event) {
			
				// If Control or Command key is pressed and the S key is pressed
				// run save function. 83 is the key code for S.
				if((event.ctrlKey || event.metaKey) && event.which == 83) {
					// Save Function
					event.preventDefault();
					alert('ctl + save lock');
					location.reload();
					return false;
				}else if((event.ctrlKey || event.metaKey) && event.which ==37) {
					event.preventDefault();
					//alert('左');
					let Request = new Object();	 
					Request = GetRequest();
					function GetRequest() {		 
						 let url = location.search; 
						 let theRequest = new Object();		 
						 if (url.indexOf("?") != -1) {		 
							let str = url.substr(1);		 
							strs = str.split("&");		 
							for(let i = 0; i < strs.length; i++) {		 
							   theRequest[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]);		 
							}		 
						 }
						 return theRequest;		 
					}
					if(parseInt(Request["id"]) > 1 ){
						window.location = "http://168.2.9.22/elcscrewdriver/indextype6.php?id="+(parseInt(Request["id"])-1);
					}
					return false;
				}else if((event.ctrlKey || event.metaKey) && event.which ==38) {
					// Save Function
					event.preventDefault();
					//alert('上');
					
					//document.getElementById('th_cid').style.display="none";
					//document.getElementById('th_cid').style.display="none";
					//document.getElementById('t_cid').style.display="none";
					
					var href = $(this).attr('href');
					alert(href);
					
					function RefreshTable() {
						$( "#table2" ).load( ($(this).attr("href")+" #table2") );
				    }
					RefreshTable();
					return false;
				}else if((event.ctrlKey || event.metaKey) && event.which ==39) {
					event.preventDefault();
					//alert('右');
					let Request = new Object();	 
					Request = GetRequest();
					function GetRequest() {		 
						 let url = location.search; 
						 let theRequest = new Object();		 
						 if (url.indexOf("?") != -1) {		 
							let str = url.substr(1);		 
							strs = str.split("&");		 
							for(let i = 0; i < strs.length; i++) {		 
							   theRequest[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]);
							}		 
						 }		 
						 return theRequest;		 
					}
					window.location = "http://168.2.9.22/elcscrewdriver/indextype6.php?id="+(parseInt(Request["id"])+1);
					
					return false;
				}else if((event.ctrlKey || event.metaKey) && event.which ==40) {
					// Save Function
					event.preventDefault();
					//alert('下');
					//document.getElementById('th_cid').style.display="";
					//document.getElementById('th_cid').style.display="";
					//document.getElementById('t_cid').style.display="";
					return false;
				};
				
			}
		);

		// 基、偶數列新增 css 
		$("#table2 tr:odd").addClass("odd");
		$("#table2 tr:even").addClass("even");

		// 為 id 等於 table2 的 table元件 的 每一個 row  附加 mouseenter 和 mouseout 事件
		 
		
		$("#table2 tr").hover(
			function(){
				$(this).addClass("enter"); // 觸發 mouseenter 事件 新增 css 
			},
			function(){
				$(this).removeClass("enter"); // 觸發 mouseleave 事件 移除 css 
			}
		);


</script>


</body>
</html>
