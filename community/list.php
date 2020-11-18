<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "community";
	$ripple = "community_ripple";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>CUCKOO-쿠쿠 제품평</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b1b49ca1a7.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub3/common/css/sub3common.css">
    <link rel="stylesheet" href="css/community.css">
    
    <script src="../common/js/prefixfree.min.js"></script>
    
    
    <!--[if IE9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    
</head>
<?
	include "../lib/dbconn.php";
	$scale=6;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}
		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);
	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
<body>

<? include "../common/sub_head.html"  ?>

        <div class="lineMap">
            <span>HOME</span>&gt;<span>커뮤니티</span>&gt;<strong>쿠쿠 제품평</strong>
        </div>

<!-- 메인 비주얼 영역 -->
       
        <div class="visual">
           <img src="../sub3/common/images/sub3_visual.jpg" alt="">
           <div class="visual_text">
               <h3>커뮤니티</h3>
               <div class="visual_line"></div>
               <p>고객 여러분과 함께 만들어가는 쿠쿠의 이야기를 들려드립니다.</p>
           </div>
       </div>
       
       
<!-- 서브 네비 영역 -->
              
       <div class="subnav_box">   
          <div class="subnav">
              <ul>
                   <li><a id="nav1" href="../sub3/sub3_1.html">쿠쿠 레시피</a></li>
                   <li><a class="current" id="nav2" href="../community/list.php">쿠쿠 제품평</a></li>
                   <li><a id="nav3" href="../sub3/sub3_3.html">쿠쿠 갤러리</a></li>
              </ul>
           </div>          
       </div>
 
 <div class="title">
        <h2>쿠쿠 제품평</h2>
    </div>
    
 
  <div id="content">
	<div class="content_area">     
      
     <form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">Total :&nbsp;&nbsp;<?= $total_record ?>건의 게시물</div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select>
            </div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="search.png" alt="search"></div>
		</div>
		</form>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);     // 포인터 이동        
      $row = mysql_fetch_array($result); // 하나의 레코드 가져오기	      
      
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
       
      $item_subject = str_replace( "&#039;", "'", $row[subject]);               
      $item_subject = mb_substr($item_subject, 0, 10, 'utf-8'); 
      $item_subject = $item_subject."...";

	  $sql = "select * from $ripple where parent=$item_num";
	  $result2 = mysql_query($sql, $connect);
	  $num_ripple = mysql_num_rows($result2);
       
      if($row[file_copied_0]){ 
        $item_img = './data/'.$row[file_copied_0];  
      }else{
        $item_img = './data/default.jpg'  ;
      }

?> 
			<div id="list_item">
                <div class="conbox">
                    <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
                        <span><?= $item_subject ?></span>
                        <img src="<?=$item_img?>" alt="" width="300" height="250">

                        <div class="listbox">
                            <ul>
                                <li><i class="fas fa-user-circle"> :&nbsp;</i></li>
                                <li><?= $item_id ?></li>
                            </ul>
                            <ul>
                                <li><i class="fas fa-calendar-day"> :&nbsp;</i></li>
                                <li><?= $item_date ?></li>
                            </ul>
                            <ul>
                                <li><i class="fas fa-eye"> :&nbsp;</i></li>
                                <li><?= $item_hit ?></li>
                            </ul>

                            <ul>
                                <li><i class="fas fa-comment-alt"></i> :&nbsp;</li>
                                <li><?
                                            if ($num_ripple)
                                            echo "$num_ripple";
                                    ?>
                               </li>
                            </ul>
                        </div>
                    </a>
                </div>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->


	</div> <!-- end of col2 -->
  </div> <!-- end of content -->

<? include "../common/sub_foot.html"  ?>

</body>
</html>