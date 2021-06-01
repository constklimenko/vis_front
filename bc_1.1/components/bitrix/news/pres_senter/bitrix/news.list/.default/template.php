<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<div class="content">
	<div class="news-list_wrapper">
		<ul class="news-list">
			<? $i=0; foreach ($arResult['ITEMS'] as $item){
				if($item['PROPERTIES']['IN_MAIN']['VALUE']=="да"){continue;}?>
			<li class="news-item <? if($item['PROPERTIES']['DOUBLE']['VALUE']!=''){?>double<? } ?>">
				<div>
					<a class="img-box" style="background-image: url(<?=$item['DETAIL_PICTURE']['SRC']?>);" href="<?=$item['DETAIL_PAGE_URL']?>"></a>
					<h2><a href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a></h2>
					<p><?=$item['PREVIEW_TEXT']?></p>
					<div class="date"><?=$item['DISPLAY_ACTIVE_FROM']?></div>
				</div>
			</li>
			<? $i++;} ?>
		</ul>
	</div>
	
<?	
if ($arParams["DISPLAY_BOTTOM_PAGER"] && $i>0){
	echo $arResult["NAV_STRING"];
}
?>
</div>
