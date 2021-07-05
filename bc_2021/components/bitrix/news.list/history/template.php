<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

$strEditLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$strDeleteLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$confirmDelete = array('CONFIRM' => \GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'));

?>
<div class="history-grid">
    <div class="history-grid-top"></div>
        <?foreach ($arResult['ITEMS'] as $key=> $item){
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], $strEditLink);
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], $strDeleteLink, $confirmDelete);
            ?><div class="history-grid-date"><?=$item['PROPERTIES']['HISTORY_DATE']['VALUE'];?> </div>



                <div class="history-grid-row<?if( $key % 2 !==  0):?> history-grid-row--reverse<?endif;?>
" id="<?=$this->GetEditAreaId($item['ID']);?>">
                    <div class="history-grid-container  <?if( $key % 2 !==  0):?>  history-grid-left_line <?endif;?>">
                        <div class="history-grid-info">
                            <div class="title"><?=$item['NAME']?></div>
                            <div class="text"><?=$item['PREVIEW_TEXT']?>
                            </div>
                        </div>
                    </div>
                    <div class="history-grid-container <?if( $key % 2 ==  0):?>  history-grid-left_line <?endif;?>">

            <?if(!empty($item['PREVIEW_PICTURE']['SRC'])):?>
                <?$img_url=$item['PREVIEW_PICTURE']['SRC']?>
                        <div class="img" style="background: url(<?=$img_url;?>) no-repeat center/cover"></div>
                    </div>
            <?else:?>
            <?endif;?>

            </div>

        <?}?>

    <div class="history-grid-date history-grid-date--final"><? echo date(Y);?></div>
    <button class="info-btn"><a href="/arenda/"> арендовать офис</a> </button>
</div>

