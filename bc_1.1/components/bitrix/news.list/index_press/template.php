<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

$strEditLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$strDeleteLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$confirmDelete = array('CONFIRM' => \GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'));

?>
<section class="index_news">
    <div class="index_news-bg_text"><?=$arParams['SECTION_TITLE'];?> </div>
    <div class="index_news-title"><?=$arParams['SECTION_TITLE'];?>  </div>
    <div class="index_news-row">
        <?foreach ($arResult['ITEMS'] as $item){
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], $strEditLink);
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], $strDeleteLink, $confirmDelete);
            ?>



            <a href="<?=$item['DETAIL_URL'];?>" class="index_news-card"  id="<?=$this->GetEditAreaId($item['ID']);?>">



                    <?if($item['PREVIEW_PICTURE']['SRC']):?>
                    <div class="index_news-card-img style= "background: url(<?=$item['PREVIEW_PICTURE']['SRC']?>) no-repeat center/cover"   "></a>
                    <?else:?>
                    <div class="index_news-card-img style= "background-color: white;"></div>
                    <?endif;?>
                <div class="index_news-card-title"><?=$item['NAME']?></div>
                <div class="index_news-card-text"><?=$item['PREVIEW_TEXT']?></div>
            </a>

        <?}?>
    </div>
</section>
