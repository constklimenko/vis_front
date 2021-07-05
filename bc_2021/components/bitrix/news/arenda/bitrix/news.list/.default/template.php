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

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$strEditLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$strDeleteLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$confirmDelete = array('CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'));

if(empty($arResult['ITEMS'])) {
    return ;
}

?>
<div class="resultat-selection">
    <ul class="resultat-list">
        <li class="resultat-item">
            <div class="wrapper">
                <ol class="office-inform_list">
                    <li><b><?=Loc::getMessage('OFFICE_PHOTO_TITLE');?></b></li>
                    <li><b><?=Loc::getMessage('OFFICE_KORPUS_TITLE');?></b></li>
                    <li><b><?=Loc::getMessage('OFFICE_STAGE_TITLE');?></b></li>
                    <li><b><?=Loc::getMessage('OFFICE_SQUARE_TITLE');?></b></li>
                    <li><b><?=Loc::getMessage('OFFICE_BUILDING_TYPE_TITLE');?></b></li>
                </ol>
            </div>
        </li>

        <?foreach ($arResult['ITEMS'] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strEditLink);
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strDeleteLink, $confirmDelete);
            ?>
            <li class="resultat-item be_set" data-id="<?=$arItem['ID'];?>">
                <div class="wrapper" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <ol class="office-inform_list">
                        <?if(!empty($arItem['PREVIEW_PICTURE']['SRC'])):?>
                            <li>
                                <a href="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" class="fancy">
                                    <img src="<?=$arItem['PREVIEW_PICTURE']['RESIZED_SRC'];?>" alt="<?=$arItem['NAME'];?>">
                                </a>
                            </li>
                        <?endif;?>
                        <li><?=$arItem['PROPERTIES']['KORPUS']['VALUE_LINKED']?></li>
                        <li><?=$arItem['PROPERTIES']['PLAN']['VALUE_LINKED']?></li>
                        <li><?=$arItem['PROPERTIES']['PLOSH']['VALUE']!=''?$arItem['PROPERTIES']['PLOSH']['VALUE']:'-'?></li>
                        <li><?=$arItem['PROPERTIES']['TYPE_APARTMENT']['VALUE']!=''?$arItem['PROPERTIES']['TYPE_APARTMENT']['VALUE']:'-'?></li>
                    </ol>
                    <div class="button-wrapper">
                        <a href="/arenda/office/<?=$arItem['CODE']?>.html">
                            <?=Loc::getMessage('OFFICE_DETAIL_LINK_TITLE');?>
                        </a>
                    </div>
                </div>
            </li>
        <?endforeach;?>

    </ul>

</div>