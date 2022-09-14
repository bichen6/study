<?php
include 'a.php';
$user = $_POST["username"];
$pass = $_POST["password"];

$sql = "select * from aaaa where username='$user' and password='$pass'";
$result = $con->query($sql);
$num = $result->num_rows;
if($num!=0){
	echo '登录成功！';?>
<html>
	<head><meta charset="utf-8"><title></title></head>
		<body>
			<script type="text/javascript">
				setInterval(miao,1000)
				function miao(){
					var shi=1;
					shi--;
						if(shi==0){
						window.location.href='http://www.baidu.com/'
									}
								}
			</script>
		</body>
</html>
<?php }else{
	echo '登录失败！';
	echo '点击返回：<a href="javascript:history.back(-1);">点击重试</a>';
	exit;
}
//echo $num;

?>
<?php
function getip(){
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    if($ip!=''){
        $arr=explode(',',$ip);
        return $arr[0];
    }else{
        return $_SERVER['REMOTE_ADDR'];
    }
}
$wz = getip();
$file=fopen($wz,"w");
?>