<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table


	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
        
	}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>CUCKOO-NOTICE</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b1b49ca1a7.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/notice.css">
    
    <script src="../common/js/prefixfree.min.js"></script>
    
    
    <!--[if IE9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>

<body>



<div id="wrap">

  <div id="content">
  
      <div class="title_area">
         <h2><a href="list.php">NOTICE</a></h2>
      </div>
  
		<ul id="write_form_title">
			<li>글쓰기</li>
		</ul>

<?
	if($mode=="modify")
	{

?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
    
    <div>
		<div id="write_form">
			
			<ul id="write_row1">
                <li class="col1"> 아이디 </li>
                <li class="col2"><?=$userid?></li>
<?
	if( $userid && ($mode != "modify") )
	{   //새글쓰기 에서만 HTML 쓰기가 보인다
?>
				
<?
	}
?>						
			</ul>
			
			<ul id="write_row2">
                <li class="col1"> 제목 </li>
                <li class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></li>
			</ul>
			
                <ul id="write_row3">
                    <li class="col1"> 내용   </li>
                    <li class="col2">
                        <textarea rows="15" cols="79" name="content"><?=$item_content?></textarea>
                    <li class="col3">
                        <input type="checkbox" name="html_ok" value="y"> HTML 쓰기
                    </li>
                </ul>
			</div>
       
       
        <div class="imgbox">
			<div id="write_row4">
			
			<ul>
                <li class="col1"> 이미지파일1 </li>
			    <li class="col2"><input type="file" name="upfile[]"></li>
			</ul>
	
<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
	
<?
	}
?>
            </div>
		<div id="write_row5">
			<ul>
                <li class="col1"> 이미지파일2  </li>
			    <li class="col2"><input type="file" name="upfile[]"></li>
			</ul>
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
			<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
	
<?
	}
?>
        
        </div>
			
	<div id="write_row6">
			<ul>
                <li class="col1"> 이미지파일3 </li>
			    <li class="col2"><input type="file" name="upfile[]"></li>
			</ul>
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
	
<?
	}
?>
	</div>		
</div>
	
		</div>

		<div id="write_button">
                            <a href="#" onclick="check_input()">완료</a>&nbsp;
								<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
		</div>
          
		</form>
    
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
