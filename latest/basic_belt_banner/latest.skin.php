<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

// 띠배너 넓이
$banner_width = $options['banner_width'];

// 배너 가로,세로크기
$thumb_width = $options['thumb_width'];
$thumb_height = $options['thumb_height'];

// 배너배경
$banner_bg = (isset($options['banner_bg']) && $options['banner_bg']) ? $options['banner_bg'] : $latest_skin_url.'/img/banner-bg.png';

$scstr = (isset($options['scstr']) && $options['scstr']) ? $options['scstr'] : '#3194e0';
$ecstr = (isset($options['ecstr']) && $options['ecstr']) ? $options['ecstr'] : '#4c36c2';

//닫기버튼
$cls_btn = ($options['cls_btn']=='white')?$latest_skin_url.'/img/bt_globalban_cls02.png':$latest_skin_url.'/img/bt_globalban_cls01.png';

if (!G5_IS_MOBILE){// PC에서만 출력
?>
<style>
.top-banner{
	position:relative;text-align:center;height:<?php echo $thumb_height;?>px;display:none;
}
.top-banner.on{
	display:block;
}
.top-banner-inner{
	position:absolute;z-index:100;margin:0 auto;padding:0 10px;top:0;left:0;right:0;bottom:0;background:url('<?php echo $banner_bg;?>') center center no-repeat;
}
.top-banner.belt-banner{
	height:<?php echo $thumb_height;?>px;
	background:<?php echo $scstr;?>;
	background:-webkit-gradient(linear, left top, right top, from(<?php echo $scstr;?>), to(<?php echo $ecstr;?>));
	background:linear-gradient(90deg, <?php echo $scstr;?> 0%, <?php echo $ecstr;?> 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="<?php echo $scstr;?>",endColorstr="<?php echo $ecstr;?>",GradientType=1);
}
.top-banner.belt-banner .top-banner-inner {
	position:absolute;top:0;right:0;bottom:0;left:0;width:<?php echo $banner_width;?>px !important;margin:0 auto;text-align:center;
}
.top-banner-btn-close{
	z-index:1000;position:absolute;top:10%;right:1%;
}
</style>
<div class="top-banner belt-banner" id="belt_layer1">

	<div class="top-banner-inner">
		<?php
		for ($i=0; $i<count($list); $i++) {
			$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

			if($thumb['src']) {
				$img = $thumb['src'];
			} else {
				$img = $latest_skin_url.'/img/no_banner.png';
			}
			$img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" width="'.$thumb_width.'" height="'.$thumb_height.'">';

			$target = '';
			if($list[$i]['wr_link1']){ //링크가 있을경우
				$target = ' target="_black"';
				$list[$i]['href'] = $list[$i]['wr_link1'];
			}
		?>
		<a href="<?php echo $list[$i]['href']; ?>"<?php echo $target;?>><?php echo $img_content; ?></a>
		<?php } ?>
	</div>

    <a href="#" class="top-banner-btn-close" id="topClose">
        <img src="<?php echo $cls_btn;?>" alt="배너닫기"/>
    </a>
</div>
<script>

	$(document).ready(function() {
        var onBannerTime = get_cookie("belt_layer1") ===  '' ?  true : false

        var $banner = $('#belt_layer1');

        if( onBannerTime ){
            $banner.addClass('on');
        }else{
            $banner.removeClass('on');
        }

        $('#topClose').on('click', function () {
			set_cookie("belt_layer1", 1, 24, g5_cookie_domain);
            $banner.removeClass('on');
        });
	});

</script>
<?php } ?>
