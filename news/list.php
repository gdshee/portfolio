<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "news";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>CUCKOO-NEWS</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b1b49ca1a7.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/news.css">
    
    <script src="../common/js/prefixfree.min.js"></script>
    
    
    <!--[if IE9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    
</head>
<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=3;			// 한 화면에 표시되는 글 수

    
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
        <span>HOME</span>&gt;<span>고객센터</span>&gt;<strong>NEWS</strong>
    </div>

<!-- 메인 비주얼 영역 -->
       
        <div class="visual">
           <img src="../sub5/common/images/sub5_visual.jpg" alt="">
           <div class="visual_text">
               <h3>고객센터</h3>
               <div class="visual_line"></div>
               <p>쿠쿠는 고객 여러분들과 함께 합니다.</p>
           </div>
       </div>
       
       
<!-- 서브 네비 영역 -->
              
       <div class="subnav_box">
          <div class="subnav">
              <ul>
                   <li><a id="nav1" href="../sub5/sub5_1.html">Global Service</a></li>
                   <li><a class="current" id="nav2" href="../news/list.php">NEWS</a></li>
                   <li><a id="nav3" href="../notice/list.php">NOTICE</a></li>
                   <li><a id="nav4" href="../sub5/sub5_4.html">FAQ</a></li>
              </ul>
          </div>        
       </div>

 
     <div class="title_area">
         <h2>NEWS</h2>
     </div>
 
  <div class="content">        
        
        <div class="content_area">
		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">▷ Total :&nbsp;&nbsp;<?= $total_record ?>건의 게시물
                <select name="scale" onchange="location.href='list.php?scale='+this.value">
                        <option value=''>보기</option>
                        <option value='1'>1</option>
                        <option value='3'>3</option>
                        <option value='6'>6</option>
                        <option value='9'>9</option>
                </select>
			</div>
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
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

       
       
//      $item_content = mb_substr($row[content], 0, 80, 'utf-8')."..";
//       
//       
//      $item_content = str_replace(" ", "&nbsp;", $item_content); 
//       
//      $item_content = str_replace( "&#039;", "'", $item_content); 
//      $item_content = str_replace("&lt;", "<", $item_content);
//      $item_content = str_replace("&gt;", ">", $item_content);
        
       $item_subject = str_replace( "&#039;", "'", $row[subject]);               
       $item_subject = mb_substr($item_subject, 0, 20, 'utf-8'); 
       $item_subject = $item_subject."...";
       
       
       $item_content = str_replace( "&#039;", "'", $row[content]);               
       $item_content = mb_substr($item_content, 0, 90, 'utf-8'); 
       $item_content = $item_content."...";
       
      if($row[file_copied_0]){ 
        $item_img = './data/'.$row[file_copied_0];  
      }else{
        $item_img = './data/default.jpg'  ;
      }
      

        $item_content = str_replace("&lt;", "<", $item_content);
        $item_content = str_replace("&gt;", ">", $item_content);
 
?>
			<div class="list_item">
                <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
                    <img src="<?=$item_img?>" alt="" width="200" height="150">
                    <ul class="topbox">
                        <li class="list_item1">No.<?= $number ?></li>
                        <li class="list_item2">[ <?= $item_subject ?> ]</li>
                        
                    </ul>
                    <div class="cont"><?= $item_content ?></div>
                    <div class="listbox">
                        <ul class="list_item3">
                            <li><i class="fas fa-user-circle"> :&nbsp;&nbsp;</i></li>
                            <li><?= $item_id ?></li>
                        </ul>
                        <ul class="list_item4">
                            <li><i class="fas fa-calendar-day"> :&nbsp;&nbsp;</i></li>
                            <li><?= $item_date ?></li>
                        </ul>
                        <ul class="list_item5">
                            <li><i class="fas fa-eye"> :&nbsp;&nbsp;</i></li>
                            <li><?= $item_hit ?></li>
                        </ul>
                    </div>
				</a>
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
            
          if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
          }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
            
          
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
