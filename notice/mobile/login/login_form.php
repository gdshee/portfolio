<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CUCKOO-로그인</title>
    <link href="css/member.css" rel="stylesheet">
</head>
<body>
    
  <div id="wrap">
      <div class="hbox">
        <h1>
            <a href="../www/index.html">CUCKOO</a>
        </h1>
       </div>
  <div class="content">
        <form  name="member_form" method="post" action="login.php"> 
            <ul>
                 <label for="id" class="hidden">아이디</label>
                 <li><input type="text" id="id" name="id" title="유저 아이디" placeholder="아이디"></li>
                 <label for="password" class="hidden">비밀번호</label>
                 <li><input type="password" id="password" name="pass" title="비밀번호" placeholder="비밀번호"></li>
            </ul>	
            <label for="login_button" class="hidden">로그인</label>					
            <input id="login_button" type="submit" title="로그인" value="로그인">
            <label for="join_button" class="hidden">회원가입</label>
            <div id="join_button">아직 회원이 아니신가요?&nbsp;&nbsp;&nbsp;&nbsp;<a href="../member/join.html">회원가입</a></div>
        </form> <!-- end of form_login -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>