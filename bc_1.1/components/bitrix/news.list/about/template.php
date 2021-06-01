<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$strEditLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$strDeleteLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$confirmDelete = array('CONFIRM' => \GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'));

?>
<div class="fullpage">
    <?foreach($arResult["ITEMS"] as $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strEditLink);
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strDeleteLink, $confirmDelete);
        ?>
            <div class="page" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="layout">
                    <div class="content">
                        <h2><?echo $arItem["NAME"]?></h2>
                        <div class="tag"><?echo $arItem["CODE"]?></div>

                        <?echo $arItem["PREVIEW_TEXT"];?>
    <div class="tag-wrapper">

                        </div>
                    </div>
                </div>

            </div>

    <?endforeach;?>

</div>
