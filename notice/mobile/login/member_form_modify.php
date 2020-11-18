<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CUCKOO-정보수정</title>
	
	<link href="css/member_form_modify.css" rel="stylesheet">
	
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>

	
	<script>
       function check_id()
       {
         window.open("check_id.php?id=" + document.member_form.id.value,
             "IDcheck",
              "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
       }

       function check_nick()
       {
         window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
             "NICKcheck",
              "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
       }

       function check_input()
       {
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
              alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
              document.member_form.pass.focus();
              document.member_form.pass.select();
              return;
          }

          document.member_form.submit();
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
<?
    //$userid='aaa';
    
    include "../../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
   
    <div class="wrap">
     <header class="hbox">
      <h1>
	      <a href="../www/index.html">CUCKOO</a>
	  </h1>
     </header>
    <div class="content">
        <form  name="member_form" method="post" action="modify.php">
            <fieldset>
                   <div class="line"></div>
                    <ul class="ibox">
                        <li><label for="id"><span>아이디</span></label></li>
                        <li><?= $row[id] ?></li>
                    </ul>
                   <div class="pwbox">
                      <ul>
                          <li><label for="password1">비밀번호</label></li>
                           <li>
                               <input type="password" id="password1" name="pass" class="mb10 pwBg1" required>
                           </li>
                      </ul>
                       <ul>
                           <li><label for="password2">비밀번호 재입력</label></li>
                           <li>
                               <input type="password" id="password2" name="pass_confirm" class="pwBg2" required>
                           </li>
                       </ul>
                   </div>
                <div class="nbox">
                   <ul>
                        <li><label for="name">이름</label></li>
                        <li><?= $row[name] ?></li>
                    </ul>
                    <ul>
                        <li><label for="nick">닉네임</label></li>
                        <li>
                            <input type="text" name="nick" value="<?= $row[nick] ?>">
                            <a href="#" onclick="check_nick()">중복 확인</a>
                        </li>
                    </ul>
                </div>
                <ul class="tbox">
                   <li><label for="hp">전화번호</label></li>
                    <li>
                        <label for="hp1" class="hidden">전화번호 앞 세자리</label>
                        <input type="text" class="hp" name="hp1" value="<?= $hp1 ?>">-&nbsp;&nbsp;
                        <label for="hp2" class="hidden">전화번호 둘째 자리</label>
                        <input type="text" class="hp" name="hp2" value="<?= $hp2 ?>">&nbsp;-&nbsp;
                        <label for="hp3" class="hidden">전화번호 셋째 자리</label>
                        <input type="text" class="hp" name="hp3" value="<?= $hp3 ?>">
                    </li>
                </ul>
                <ul class="mbox">
                    <li><label for="email">이메일</label></li>
                    <li>
                        <label for="email1" class="hidden">이메일 앞부분</label>
                        <input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ 
                        <label for="email2" class="hidden">이메일 뒷부분</label> 
                        <input type="text" name="email2" value="<?= $email2 ?>">
                    </li>
                </ul>
                <div class="button">
                    <a href="#"><input type="reset" value="다시 작성" title="회원정보 다시 작성" onclick="reset_form()"></a>
                    <a href="#"><input type="button" title="회원정보 작성 완료" value="작성 완료" onclick="check_input()"></a>
                </div>    
            </fieldset>
        </form>
    </div>
</div>

</body>
</html>


