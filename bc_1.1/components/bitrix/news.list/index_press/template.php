<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

$strEditLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$strDeleteLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$confirmDelete = array('CONFIRM' => \GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'));

?>
<div class="top-slider_wrapper">
    <div class="top-banner_slider">
        <?foreach ($arResult['ITEMS'] as $item){
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], $strEditLink);
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], $strDeleteLink, $confirmDelete);
            ?>
            <div class="item" id="<?=$this->GetEditAreaId($item['ID']);?>">
                <i class="icon-sales5" style="    background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>);"></i>
                <h2><?=$item['NAME']?></h2>
                <p><?=$item['PREVIEW_TEXT']?></p>
            </div>
        <?}?>
    </div>
    <div class="customNavigation">
       <a class="btn prev"><i class="icon-arrowhead7"></i></a>
       <a class="btn next"><i class="icon-arrow487"></i></a>
    </div>
</div>