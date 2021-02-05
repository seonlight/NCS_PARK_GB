<div class="main_movie">

<p style="margin-top:120px; margin-bottom:20px; font-size: 40px; font-family: 'GmarketSansMedium'">HERZI'S YOUTUBE</p>

<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>


    	<?php for ($i = 0; $i < count($list); $i++) {



    echo $list[$i]['wr_content'];
    ?>

	<?php }  ?>
	<?php if (count($list) == 0) { //동영상이 없을 때  ?>
	<li>동영상이 없습니다.</li>
	<?php }  ?>

</div>


<style> /*내 스타일 적용*/

 iframe {width: 400px; margin: 20px 5px;}

</style>
