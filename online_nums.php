<?php
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
echo "   ".$online_num." 現上人數";
?>