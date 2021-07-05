<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>
	<div class="pagination-wrapper">
<?if($arResult["bDescPageNumbering"] === true):?>
<ul class="pagination-list">
	<?while($arResult["nStartPage"] >= $arResult["nEndPage"]):?>
		<?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<li class="active"><a href="javascript:void(0);"><span><?=$NavRecordGroupPrint?></span></a></li>
		<?elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):?>
			<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span><?=$NavRecordGroupPrint?></span></a></li>
		<?else:?>
			<li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span><?=$NavRecordGroupPrint?></span></a></li>
		<?endif?>
		<?$arResult["nStartPage"]--;?>
	<?endwhile?>
</ul>
<?else:?>
<ul class="pagination-list">
	<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<li class="active"><a href="javascript:void(0);"><span><?=$arResult["nStartPage"]?></span></a></li>
		<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
			<li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span><?=$arResult["nStartPage"]?></span></a></li>
		<?else:?>
			<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span><?=$arResult["nStartPage"]?></span></a></li>
		<?endif?>
		<?$arResult["nStartPage"]++;?>
	<?endwhile?>
</ul>
<?endif?>
	</div>