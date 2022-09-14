<?php

include 'a.php';
//获取当前ID有多少个
$yu="SELECT id FROM aaaa";
$qq=$con->query($yu);
$shu=0;
while($row = $qq->fetch_assoc()) {
		$shu=$shu+1;
    }

$user_a = $_POST["username_a"];
$pass_a = $_POST["password_a"];
$qq = $_POST["QQname"];

/* $t='所发生的时代';
echo mb_substr($t, 0, 3,"UTF-8"); */
$len = mb_strlen($user_a);//获取账号长度
$lenlen = mb_strlen($pass_a);//获取密码长度
//判断账号密码是否为空
if($user_a!=null && $pass_a!=null){
	//判断是否规定长度
	if($len<=10 && $len>=2 && $lenlen>=6 && $lenlen<=10){
			$cr = "INSERT INTO aaaa (id, username, password,pwd)
				VALUES ($shu+1, '$user_a', '$pass_a','$qq')";
			$sc = $con->query($cr);
			$an = $sc->num_rows;
		}else{echo '请注意：账号长度要>2,<=10。<br/>密码长度要>=6,<=10位','<br/>';}

}else{echo '检查信息不能为空','<br/>';}

//字段是否添加成功
if($sc===TRUE){
	echo "注册成功",'<br/>';?>
	<html>
		<head><meta charset="utf-8"><title></title></head>
			<body>
				<script type="text/javascript">
					setInterval(miao,1000)
					function miao(){
						var shi=1;
						shi--;
							if(shi==0){
							window.location.href='index.html'
										}
									}
				</script>
			</body>
	</html>
	
<?php }else{
	echo "注册失败",'<br/>','<a href="javascript:history.back(-1);">点击重新注册</a>';
}

?>
