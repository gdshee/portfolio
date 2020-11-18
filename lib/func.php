<?
   function latest_article($table, $loop, $char_limit, $char_limit2) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
            
			$len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];
            
            
			if ($len_subject > $char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);               
                                                       $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}
            
            
            $len_content = mb_strlen($row[content], 'utf-8');
			$content = $row[content];
            
			if ($len_content > $char_limit2)
			{
				 $content = str_replace( "&#039;", "'", $content);               
                                                       $content = mb_substr($content, 0, $char_limit2, 'utf-8');
				$content = $content."...";
			}
            

			$regist_day = substr($row[regist_day], 0, 10);

             //목록 이미지 경로 불러오기
			$img_name = $row[file_copied_0];
			if($img_name){
				$img_name = "./$table/data/".$img_name;
			}else{
				$img_name = "./$table/data/default.jpg"; 
			}


			echo "  
                <ul>
				<li>
				<a href='./$table/view.php?table=$table&num=$num'>
				<img src='$img_name' width='80' height='60' alt='최근게시물'>
                <dl>
                <dt>$subject</dt>
                <dd>$content</dd>
                <dd><span>$regist_day</span><dd>
                </dl>
				
                </a>
				</li>
                </ul>
			";
		}
		mysql_close();

   }
?>