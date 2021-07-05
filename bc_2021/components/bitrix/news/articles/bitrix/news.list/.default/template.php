<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?//=htmlspecialcharsbx($_SESSION["articlefilter"])?>
<div class="gallery-box" id="articlesn">
		<div class="gallery-controls_wrapper">
			<div class="content">
				<ul class="gallery-controls" id="wfilter">
					<li <? if(empty($_SESSION["articlefilter"]) || $_SESSION["articlefilter"]=="v"){?>class="active"<? } ?> data-id="artfil" oval="v"><a href="javascript:void(0);"><span>Все фотографии</span></a></li>
					<?foreach($arResult['TYPEG_ITEMS'] as $item) { ?>
						<li <? if($item["IS_ACTIVE"]){?>class="active"<? } ?> data-id="artfil" oval="<?=$item["XML_ID"]?>"><a href="javascript:void(0);"><?=$item["VALUE"]?></a></li>
					<? } ?>
				</ul>
				<div class="gallery-controls_mob">
					<select>
						<option value="Все фотографии">Все фотографии</option>
						<?
                        foreach($arResult['TYPEG_ITEMS'] as $item) { ?>
							<option value="<?=$item["VALUE"]?>"><?=$item["VALUE"]?></option>
						<? } ?>
					</select>
				</div>
			</div>
		</div>
		<div class="gallery-wrapper">
			<div class="content">
				<ul class="gallery-list" id="articleholder">
					<? foreach($arResult['GALLERY_IMAGES'] as $item) { ?>
							<li class="gallery-item" data-xml-id="<?=$item['XML_ID'];?>">
                                <div>
                                    <a class="fancyCustom" rel="gallery" style="background-image: url(<?=$item['SRC']?>);" href="<?=$item['SRC']?>"></a>
                                </div>
                            </li>
					<? } ?>
				</ul>
				<? //unset($_SESSION["articlefilter"]);?>
			</div>
		</div>
	</div>
</div>