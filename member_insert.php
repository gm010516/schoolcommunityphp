<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $email = $email1."@".$email2;
	$snsurl=$_POST["snsurl"];
	$tel1  = $_POST["tel1"];
    $tel2  = $_POST["tel2"];
	$tel3  = $_POST["tel3"];
	$tel=$tel1."-".$tel2."-".$tel3;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

              
	$con = mysqli_connect("localhost", "root", "", "smartita");
	
	$sql = "SELECT * FROM members WHERE id = '$id'";
	$result = mysqli_query($con, $sql);
	$num_record = mysqli_num_rows($result);
	
	if (!$num_record){
		$sql = "insert into members(id, pass, name, email, regist_day, level, point,snsurl,tel) ";
		$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0,'$snsurl','$tel')";

		mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
	}
	else{
		echo("
			<script>
			alert('아이디가 존재합니다. 다른 아이디 사용하세요!');
			history.go(-1)
			</script>
			");
		exit;	
	}	
    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   
