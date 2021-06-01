<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
$all = !in_array($arParams['ELEMENT_CODE'], array_column($arResult['SECTIONS'], 'CODE'));
?>
<div class="gallery-controls_wrapper">
    <div class="content">
        <ul class="gallery-controls">
            <? if ($arParams['TITLE_ALL'] != '') { ?>
                <li <? if ($all){ ?>class="active"<? } ?>>
                    <a href="<?=$arParams['SEF_FOLDER'] ?>"><span><?=$arParams['TITLE_ALL']?></span></a>
                </li>
            <? } ?>
            <? foreach ($arResult['SECTIONS'] as $item) { ?>
                <li <? if ($arParams['ELEMENT_CODE'] == $item['CODE']){ ?>class="active"<? } ?>>
                    <a href="<?=$item['SECTION_PAGE_URL']?>"><span><?=$item['NAME']?></span></a>
                </li>
            <? } ?>
        </ul>
        <div class="gallery-controls_mob">
            <select>
                <? foreach ($arResult['SECTIONS'] as $item) {
                    $selected = $arParams['ELEMENT_CODE'] == $item['CODE']; ?>
                    <option value="<?=$item['NAME'] ?>" <?if($selected){?>selected<?}?>><?=$item['NAME']?></option>
                <? } ?>
            </select>
        </div>
    </div>
