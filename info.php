<?php
 $sql_jb="select * from $jbinfo_table order by id desc limit 0,1";
 $res_jb=mysqli_query($conn,$sql_jb);
 $rows_jb=mysqli_fetch_assoc($res_jb);
 $jb_title=$rows_jb['title'];
 $jb_gjz=$rows_jb['gjz'];
 $jb_ms=$rows_jb['ms'];
 $jb_notice=$rows_jb['notice'];
 $jb_link=$rows_jb['link'];
 $jb_bq=$rows_jb['bq'];
?>