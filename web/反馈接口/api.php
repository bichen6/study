<?php

header('Content-Type: application/json; charset=UTF-8');
$j_shou=$_GET['txt'];

//$j_shou=htmlentities($j_shou);

$s_jianc=time();


//获取ip
function geti(){
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            if($i!=''){
                $arr=explode(',',$i);
                return $arr[0];
            }else{
                return $_SERVER['REMOTE_ADDR'];
            }
        }
$ip = geti();

//用户路径
$i='file/'.$ip.'/';
if($j_shou==''){
	echo "参数错误";
}
else {

if (is_dir($i)==0) {
	//创建目录
	mkdir($i,0777,true);
	
	
	//获取时间限制内容
	/* $file_path = $i.'shijianc';
	$str = file_get_contents($file_path);
	$str = str_replace("\r\n","",$str);
	
	$un = $str+600; */
	
	$a=date("Y-m-d H:i:s",time());
	//echo $a.'<br/>';
	$b = date("H点 i分 s秒",$un);
	//echo $b;
	$file_path = $i.'shijianc';
	if (file_exists($file_path)==0) {
		//获取get内容写到指定文件
		$myfile = fopen($i.$s_jianc.'.txt', "w") or die("Unable to open file!");
		$txt = $j_shou;
		fwrite($myfile, $txt);
		fclose($myfile);
		
		$w=$i.$s_jianc.'.txt';
		//创建用户ip时间限制文件shijianc
		$myfile2 = fopen($i.'shijianc', "w");
		$txt2 = $s_jianc;
		fwrite($myfile2, $txt2);
		fclose($myfile2);
		if (file_exists($file_path)&&file_exists($w)) {
			//echo "操作成功";
			$s = array("ChinaT"=>"400","ChinaF"=>"操作成功","EnT"=>"true","EnF"=>"Operation successful");
			$show = json_encode($s,JSON_UNESCAPED_UNICODE);
			echo $show;

		}
	}else {
		
		//echo "请误重复提交，在".$b."后再试";
	}

}else {

	//获取时间限制内容
	$file_path = $i.'shijianc';
	$str = file_get_contents($file_path);
	$str = str_replace("\r\n","",$str);
	
	$un = $str+300;
	
	$a=date("Y-m-d H:i:s",time());
	//echo $a.'<br/>';
	$b = date("H点 i分 s秒",$un);
	//echo $b;
	
	if ($s_jianc>$un) {
		//获取get内容写到指定文件
		$myfile = fopen($i.$s_jianc.'.txt', "w") or die("Unable to open file!");
		$txt = $j_shou;
		fwrite($myfile, $txt);
		fclose($myfile);
		
		$w=$i.$s_jianc.'.txt';
		//创建用户ip时间限制文件shijianc
		$myfile2 = fopen($i.'shijianc', "w");
		$txt2 = $s_jianc;
		fwrite($myfile2, $txt2);
		fclose($myfile2);
		if (file_exists($file_path)&&file_exists($w)) {
			//echo "操作成功";
			$s = array("ChinaT"=>"400","ChinaF"=>"操作成功","EnT"=>"true","EnF"=>"Operation successful");
			$show = json_encode($s,JSON_UNESCAPED_UNICODE);
			echo $show;
		}
	}else {
	    $bb=$un-$s_jianc;
	    if($bb<=60){
	    $bbb=date("s",$bb);
		//echo "请误重复提交，在".$bbb."后再试";
		
			$s = array("ChinaT"=>"200","ChinaF"=>"请勿重复提交，在".$bbb."分".$bbbb."秒后再试","EnT"=>"false","EnF"=>"PPlease do not submit data repeatedly，Try again in ".$bbb." minutes and ".$bbbb." seconds.");
			$show = json_encode($s,JSON_UNESCAPED_UNICODE);
			echo $show;
		
		}else{
			
		$bbb=date("i",$bb);
		$bbbb=date("s",$bb);
		//echo "请误重复提交，在".$bbb."后再试";
		
			$s = array("ChinaT"=>"200","ChinaF"=>"请勿重复提交，在".$bbb."分".$bbbb."秒后再试","EnT"=>"false","EnF"=>"PPlease do not submit data repeatedly，Try again in ".$bbb." minutes and ".$bbbb." seconds.");
			$show = json_encode($s,JSON_UNESCAPED_UNICODE);
			echo $show;
		}
		
	}
	
}
}

?>