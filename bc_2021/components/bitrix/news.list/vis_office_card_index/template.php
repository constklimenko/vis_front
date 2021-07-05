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

<div class="offices">
    <div class="container">
        <span class="bg-text offices__bg-text"><?=$arParams["COMPONENT_TITLE"]?></span>
        <h2 class="title offices__title"><?=$arParams["COMPONENT_TITLE"]?></h2>
        <div class="offices__row">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <a class="card offices__card" href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')">
                    <div class="card__inner">
                        <div class="card__top">
                            <div class="card__info-item">
                                <span class="number"><?=$arItem["PROPERTIES"]['ETAJ']['VALUE'];?></span>
                                <span class="text"> этаж</span>
                            </div>
                            <div class="card__info-item">
                                <span class="number"><?=round($arItem["PROPERTIES"]['PLOSH']['VALUE'], 0);?></span>
                                <small class="text"> кв. м.</small>
                            </div>
                        </div>
                        <div class="card__bottom">
                            <h3 class="card__title"><?echo $arItem["NAME"]?></h3>
                            <div class="card__price">
                                <span class="number">5 768 ₽</span>
                                <span class="text"> кв. м.</span>
                            </div>
                        </div>
                    </div>
                </a>
            <?endforeach;?>
        </div>
        <?if($arParams["SHOW_BOTTOM_LINK"] == "Y"):?>
            <a class="btn offices__btn btn--primary" href="/arenda/">Все офисы</a>
        <?endif;?>
    </div>
</div>
