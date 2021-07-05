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
            <div class="index_news-card"  id="<?=$this->GetEditAreaId($item['ID']);?>">



                <?if(!empty($item['PREVIEW_PICTURE']['SRC'])):?>
                <?$img_url=$item['PREVIEW_PICTURE']['SRC']?>

                <a   href="<?=$item['DETAIL_PAGE_URL'];?>"  class="index_news-card-img" style="background: url('./<?=$img_url;?>') no-repeat center/cover"   >  </>
                <?else:?>
        <div class="index_news-card-img" style= "background-color: black;"></div>
    <?endif;?>



                <a  href="<?=$item['DETAIL_PAGE_URL'];?>" class="index_news-card-title"><?=$item['NAME']?> </a>
                <div class="index_news-card-text"><?=$item['PREVIEW_TEXT']?></div>
            </div>

        <?}?>
    </div>
</section>
