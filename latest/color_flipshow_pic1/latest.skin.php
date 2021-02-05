<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$img_w = 460; // 이미지($img) 가로 크기
$img_h = 460; // 이미지($img) 세로 크기
?>

<style type="text/css">
#container{margin:20px auto !important}

.well{ min-height:230px;text-align: center; margin-left:auto; margin-right:auto; height:auto; }

.well .well-item{position: relative;float: left;width: 180px;min-height: 500px;margin: 10px;}
.well .well-item img{width:100%;}

.well::after{clear:both; content: ''; display: block;}

.correct{
  position:absolute;
  width:100%;
}
.well .well-item:first-child .correct:before{content: "핫해핫해";
text-shadow: 2px 2px 2px #00000080;
display: block;
width: 100px;
height: 100px;
background-color: #ff7c9f;
border-radius: 50%;
position: absolute;
top: -50px;
left: -50px;
color: #fff;
font-size: 18px;
line-height: 100px;
font-family: 'GmarketSansMEdium';
box-shadow: 3px 3px 4px #00000080; z-index: 1000}
.well .well-item:first-child .correct_textbox{top: 0; left:40px}

.well .well-item:first-child{width: 460px}
.well .well-item:first-child img{width: 460px}
.well .well-item:first-child .well_item_content ~ p{display: none}
.well .well-item:nth-child(6){margin-left: 25px}
.well .well-item:nth-child(6) ~ .well-item {margin-left: 20px}


.well .correct_textbox{width: 100px;height: 30px; background-color: #000; text-align: center; position: absolute;}
.well .well-item .correct a{font-size:15px;line-height: 30px;color: #fff; font-family:'GmarketSansMedium'}
.well .well_item_content{font-size: 15px; color: #000;font-family:'GmarketSansLight'}
.well .well_item_content p + p{margin-top: 10px; text-align: left; line-height: 1.5}
.well .well_item_content P:first-child{font-weight: bold;}
.well .well_item_content p span{color: #ff7c9f; font-weight: bold;}
.well .well_item_content .star{color: #ff7c9f; text-align:left}


</style>

  <p style="margin-top:120px; margin-bottom: 20px; font-size: 40px; font-family: 'GmarketSansMedium'">허지스가 추천하는 핫!스타일</p>
<div class="well">
	<?php
	for($i=0; $i<count($list); $i++){
		$thumbs = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $img_w, $img_h, false, true);
	if($thumbs['src']) {
		$img = $thumbs['src'];
	}?>

	<div class="well-item">
		<div class="correct">
      <div class="correct_textbox">
      <a href="<?=$list[$i]['href']?>" target="_self">
            <?=$list[$i]['subject']?>
      </div>
        <img src="<?=$img?>" alt="<?=$list[$i]['subject']?>" />
          <span class="well_item_content"><?=cut_str($list[$i]['wr_content'], 200)?></span>
      </a>
    </div>
	</div>
<?}?>
</div>
