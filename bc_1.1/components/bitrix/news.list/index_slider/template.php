<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

//$strEditLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
//$strDeleteLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
//$confirmDelete = array('CONFIRM' => \GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'));

?>
<div class="index_slider">
    <? if(!empty($arResult)): ?>
        <? foreach($arResult['ITEMS'] as $key=>$item) {
            $counter = 0;
            ?>
            <div class="index_slider-left    <? if ($counter !== 0): ?> hide-light <?endif;?>"
                 id="index_slider-left<?=$key;?>">
                <div class="slider-nav" id="slider-nav<?=$key;?>"><span><span
                                class="current-count  current-count<?=$key;?>">1</span><span>/</span><span
                                class="number_of_slides  number_of_slides<?=$key;?>"><?=count($item['PROPERTIES']["IMG_GALERY"]['VALUE']);?></span></span>
                </div>
                <div class="img-slider" id="img-slider<?=$key;?>">

                    <? foreach ($item["PROPERTIES"]["IMG_GALERY"]["VALUE"] as $photo):
                        $photo_path = CFile::GetPath($photo);
                        ?>
                        <div class="slide"><a class="slide-fancybox fbs" href="<?=CFile::GetPath($photo) ?>"
                                              rel="gallery<?=$key;?>" title="<?=$item["PROPERTIES"]["IMG_GALERY"]["DESCRIPTION"][$k];?>" >  </a>
                            <div class="img" title="<?=$item["PROPERTIES"]["IMG_GALERY"]["DESCRIPTION"][$k];?>"
                                 style="background: url(<?=CFile::GetPath($photo)?>) no-repeat center/ cover;">                            </div>
                        </div>


                    <? endforeach ?>


                </div>
            </div>
            <? $counter++; ?>
            <? } ?>

        <div class="index_slider-right">

            <div class="index_slider-right-title"><?=$arParams['SECTION_TITLE'];?></div>
            <div class="index_slider-right-inner">
            <? foreach ($arResult['ITEMS'] as $key=>$item): ?>

                <div class="index_slider-right-link"
                     onClick="ChangeSliders('#index_slider-left<?= $key; ?>')"><?= $item['NAME'] ?>

                </div>

            <? endforeach; ?>
        </div>
        </div>
    <? endif; ?>
</div>



