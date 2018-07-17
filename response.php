
<?php
	include_once ("connection.php");
	class wrdatabase{
			protected $conn;
			protected $data = array();
			function __construct($connString) {
					my_txt_log("wrdatabase__construct");
				$this->conn = $connString;
				// echo "upload __construct in <br/>";
			}
			function __destruct(){
				 // echo "upload __destruct in end <br/>";
			}
			//Write to database;
			function wdb($lbarray){
				/*
				echo "upload wdatabase in <br/>";
				echo "<br/>";
				echo "<br/>";
				for ($h = 1; $h <  count($lbarray)+1; $h++) 
				{
					echo "【";
					for ($g = 0; $g <  count($lbarray[$h]); $g++) {
						
						echo " [".$h."]"."[".$g."]".($lbarray[$h][$g]);
						// TODO: 2018/05/07 Write to database.
					}
					echo "】";
					echo "<br/>";
				}
				echo "<br/>";
				echo "==";
				*/
			}
			
			//Read each odt file to return json
			function rdb($lbarray){
				
				/*
				$json_data = array(
					"current"            => intval($params['current']), 
					"rowCount"            => 10, 			
					"total"    => intval($qtot->num_rows),
					"rows"            => $data   // total data array
					);
				return $json_data;
				*/
			}
			
			// button event reply control.
			function updateJobState($cmd){
				my_txt_log("更新");
				$data = array();
				$sql = "Update `employee` set tc_customer = '" . $params["edit_name"] . "', tc_measurement='" . $params["edit_salary"] . "' WHERE id='".$_POST["edit_quantity"]."'";
				echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
				//TODO: 2018/05/07 check respond state if success set view button to finish.
				//return success/ error.
			}
			
			function my_txt_log( $datastr )
			{
				
				$myfile = fopen("D:/aaa.txt", "a+") or die("Unable to open file!");
				//$string = fread($myfile,filesize("D:/aaa.txt"));
				$string .= date("Y/m/d")." ";
				$string .= date("h:i:sa")." ";
				//$myfile = fopen("D:/aaa.txt", "w") or die("Unable to open file!");
				fwrite($myfile, $string.$datastr."\n");
				fclose($myfile);
				return;
			}
			
		}
?> 
	