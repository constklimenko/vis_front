<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

use Bitrix\Main\Data\Cache;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$this->addExternalJs(SITE_TEMPLATE_PATH . '/js/svg/choice-housing.js');


//@TODO Think and make something with the magic data...
$offices = [
    12 => 0,
    13 => 1,
    14 => 2,
]; //соответствие номеров корпусов(1,2,3) номерам элементов инфоблока
$officesQuantity = array_fill(0, count($offices), 0);

$cache = Cache::createInstance();
if($cache->initCache($arParams['CACHE_TIME'], sha1(serialize([__FILE__, $offices, 'getOfficesQuantities'])), '/iblock/news/arenda')) {
    $officesQuantity = $cache->getVars(); // данные берутся из кэша при наличии
} elseif($cache->startDataCache()) {

    Loader::includeModule('iblock');
// из инфоблока Офисы выбираются активные элементы  с  PREVIEW_TEXT и группируются по корпусу
    $res = CIBlockElement::GetList(
        ['SORT' =>'ASC'],
        ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' =>'Y',
       //  '!PREVIEW_TEXT' =>false,
         'PROPERTY_KORPUS' => array_keys($offices)],
        ['PROPERTY_KORPUS'],false,
        ['PROPERTY_KORPUS']
    );


    while($row = $res->Fetch()) {
        $officesQuantity[$offices[$row['PROPERTY_KORPUS_VALUE']] ?? array_keys($offices)[count($offices)-1] ?? 0] = (int) $row['CNT'];
    }
//$officesQuantity - массив содержащий число свободных офисов. Если элемент инфоблока Офисы активен, но не содержит PREVIEW_TEXT то он тоже не считается активным.
    $cache->endDataCache($officesQuantity);
}

?>
<div class="rent-box">
    <div class="gallery-controls_wrapper rent">
        <div class="content">
            <a href="" class="back-link parameters-link">
                <i class="icon-menu61"></i>
                <span><?=Loc::getMessage('SELECTION_TITLE');?></span>
            </a>
            <div class="number-offers"><?=Loc::getMessage('FOUND_N_ITEMS', ['#COUNT#' => 0]);?></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="selection-parameters">
        <div class="content">
            <?if($arParams["USE_FILTER"]=="Y"):?>
                <div class="controls-box">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:catalog.smart.filter",
                        "podbor",
                        array(
                            "COMPONENT_TEMPLATE" => "podbor",
                            "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
                            "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                            "SECTION_ID" => "",
                            "SECTION_CODE" => "",
                            "FILTER_NAME" => "arrFilter",
                            "TEMPLATE_THEME" => "blue",
                            "FILTER_VIEW_MODE" => "vertical",
                            "POPUP_POSITION" => "left",
                            "DISPLAY_ELEMENT_COUNT" => "Y",
                            "SEF_MODE" => "N",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "CACHE_GROUPS" => "Y",
                            "SAVE_IN_SESSION" => "N",
                            "INSTANT_RELOAD" => "N",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "XML_EXPORT" => "N",
                            "SECTION_TITLE" => "-",
                            "SECTION_DESCRIPTION" => "-"
                        ),
                        false
                    );?>
                </div>
            <?endif;?>

            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "",
                Array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                    "SORT_BY1" => $arParams["SORT_BY1"],
                    "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                    "SORT_BY2" => $arParams["SORT_BY2"],
                    "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                    "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                    "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                    "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                    "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                    "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                    "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                    "SET_TITLE" => $arParams["SET_TITLE"],
                    "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                    "MESSAGE_404" => $arParams["MESSAGE_404"],
                    "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                    "SHOW_404" => $arParams["SHOW_404"],
                    "FILE_404" => $arParams["FILE_404"],
                    "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                    "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                    "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                    "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                    "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                    "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                    "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                    "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                    "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                    "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                    "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                    "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                    "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                    "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                    "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                    "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                    "FILTER_NAME" => $arParams["FILTER_NAME"],
                    "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                    "CHECK_DATES" => $arParams["CHECK_DATES"],
                ),
                $component
            );?>
            <div class="clear"></div>
        </div>
    </div>
</div>

<div class="svgContainer"><div class="svgBox" id="draw-1"></div></div>

<?if(!empty($officesQuantity)):?>
    <?foreach($officesQuantity as $index => $quantity):?>
        <div class="korpus-inform" id="kor<?=$index + 1;?>">
            <div class="title"><?=Loc::getMessage('KORPUS_TITLE');?> <?=$index + 1;?></div>
            <div class="availability"><?=$quantity?></div>
            <div class="on-sale"><?=Loc::getMessage('AVAILABLE_COUNT_TITLE');?></div>
        </div>
    <?endforeach;?>
<?endif;?>

<div class="clear"></div>