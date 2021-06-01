<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="content">
	<div class="news-box">
		<h1><?=$arResult['NAME']?></h1>
		<?if($arResult['DETAIL_PICTURE']['SRC']!=''){?><div class="img-box"><img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt=""></div>	<?}?>
			<?=$arResult['DETAIL_TEXT']?>
		<div class="date"><?=$arResult['DISPLAY_ACTIVE_FROM']?></div>
		<div class="clear"></div>
	</div>
</div>