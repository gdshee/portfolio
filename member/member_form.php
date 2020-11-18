<? 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CUCKOO-회원가입</title>
	<link rel="stylesheet" href="css/member_form.css">
	
	
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>

	
	<script>
	 $(document).ready(function() {
  
   
 
 //id 중복검사
 $("#id").keyup(function() {    // id입력 상자에 id값 입력시
    var id = $('#id').val(); //aaa

    $.ajax({
        type: "POST",
        url: "check_id.php",
        data: "id="+ id,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext").html(data);
        }
    });
});
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
	
	
	
	</script>
	<script>
   

  
   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다. 다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<body>
	 <div class="wrap">
     <header class="hbox">
      <h1>
	      <a href="../index.html">CUCKOO</a>
	  </h1>
     </header>
    <div class="content">
        <form name="member_form" method="post" action="insert.php">
            <fieldset>
                    <div class="ibox">
                        <label for="id" class="hidden">아이디</label>
                        <input type="text" id="id" name="id" title="아이디" placeholder="아이디를 입력하세요." maxlength="10" required>
                        <span id="loadtext"></span> <!-- 실시간 메세지를 찍기 위해 -->
                    </div>
                   <ul class="pwbox">
                       <li><label for="password1" class="hidden">비밀번호</label></li>
                       <li><input type="password" id="password1" name="pass" title="비밀번호" class="mb10 pwBg1" placeholder="비밀번호" required></li>
                       <li><label for="password2" class="hidden">비밀번호 재입력</label></li>
                       <li><input type="password" id="password2" name="pass_confirm" title="비밀번호 재확인" class="pwBg2" placeholder="비밀번호 재확인" required></li>
                   </ul>
                <ul class="nbox">
                    <li>
                        <label for="name" class="hidden">이름</label>
                        <input type="text" id="name" name="name" title="이름" placeholder="이름">
                    </li>
                    <li class="ntext">
                        <label for="nick" class="hidden">닉네임</label>
                        <input type="text" id="nick" name="nick" title="닉네임" placeholder="닉네임">
                    </li>
                    <li><span id="loadtext2"></span></li>
                </ul>
                <div class="tBox">
                    <label for="hp1" class="hidden">전화번호 앞 세자리</label>
                    <select name="hp1" id="hp1" title="전화번호 앞 세자리를 선택하세요.">
                        <option>010</option>
                        <option>011</option>
                        <option>016</option>
                        <option>017</option>
                        <option>018</option>
                        <option>019</option>
                    </select>
                    <label for="hp2" class="hidden">전화번호 둘째 자리</label>
                    <input type="text" id="hp2" name="hp2" title="전화번호 둘째 자리를 입력하세요." maxlength="4" required> ㅡ
                    <label for="hp3" class="hidden">전화번호 셋째 자리</label>
                    <input type="text" id="hp3" name="hp3" title="전화번호 셋째 자리를 입력하세요." maxlength="4" required>
                </div>
                <div class="mbox">
                    <label for="email1" class="hidden">이메일 앞부분</label>
                    <input type="text" id="email1" title="이메일 앞부분" name="email1" required>&nbsp;@
                    <label for="email2" class="hidden">이메일 뒷부분</label>
                    <input type="text" name="e2" id="email2" title="이메일 뒷부분" required>
                </div>
                <div class="subMit">
                    <input type="reset" value="다시 작성" title="회원정보 다시 작성" onclick="reset_form()">
                    <input type="button" id="submitGo" title="회원가입 하기" value="가입 하기" onclick="check_input()">
                </div>    
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>


