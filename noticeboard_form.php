<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>셔테이션</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/noticeboard.css">
<script>
  function check_input() {
      if (!document.noticeboard_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.noticeboard_form.subject.focus();
          return;
      }
      if (!document.noticeboard_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.noticeboard_form.content.focus();
          return;
      }
      document.noticeboard_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header> 
<?php
	session_start();
	if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
	else $userlevel = "";
	
	if ( $userlevel != 1 )
	{
		echo("
					<script>
					alert('관리자가 아닙니다! 공지 작성은 관리자만 가능합니다!');
					history.go(-1)
					</script>
		");
				exit;
	}
?> 
<section>
	<div id="main_img_bar">
        <img src="./img/main_img.png">
    </div>
   	<div id="noticeboard_box">
	    <h3 id="board_title">
	    		공지사항 > 글 쓰기
		</h3>
	    <form  name="noticeboard_form" method="post" action="noticeboard_insert.php" enctype="multipart/form-data">
	    	 <ul id="noticeboard_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$username?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1">비밀번호</span>
			        <span class="col2"><input type="password" name="pwd"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="location.href='noticeboard_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
