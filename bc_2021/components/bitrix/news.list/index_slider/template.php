<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

//$strEditLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
//$strDeleteLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
//$confirmDelete = array('CONFIRM' => \GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'));

?>
<div class="demonstration">
    <? if(!empty($arResult)): ?>
        <div class="demonstration__sliders">
            <? foreach($arResult['ITEMS'] as $key=>$item) {
                ?>
                <div class="slider slider--demonstration <?if ($key !== 0):?>slider--hidden<?endif;?>" id="index_slider-left<?=$key;?>">
                    <div class="slider__navigation" id="slider-nav<?=$key;?>">
                        <button class="btn slider__arrow btn--prev btn--prev-<?=$key;?>" aria-label="Предыдущий слайд">
                            <svg class="btn__icon  btn__icon--arrow">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#arrow"></use>
                            </svg>
                        </button>
                        <div class="slider__counter">
                            <span class="current-count current-count<?=$key;?>">1</span>
                            <span>/</span>
                            <span class="number_of_slides  number_of_slides<?=$key;?>">
                            <?=count($item['PROPERTIES']["IMG_GALERY"]['VALUE']);?>
                            </span>
                        </div>
                        <button class="btn slider__arrow btn--next btn--next-<?=$key;?>" aria-label="Следующий слайд">
                            <svg class="btn__icon  btn__icon--arrow">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#arrow"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="slider__inner slider__inner--demonstration" id="img-slider<?=$key;?>">

                        <? foreach ($item["PROPERTIES"]["IMG_GALERY"]["VALUE"] as $photo):
                            $photo_path = CFile::GetPath($photo);
                            ?>
                            <div class="slider__slide slider__slide--demonstration">
                                <a class="slide-fancybox fbs" href="<?=CFile::GetPath($photo) ?>" rel="gallery<?=$key;?>" title="<?=$item["PROPERTIES"]["IMG_GALERY"]["DESCRIPTION"][$k];?>" >
                                </a>
                                <div class="slider__thumb slider__thumb--demonstration" title="<?=$item["PROPERTIES"]["IMG_GALERY"]["DESCRIPTION"][$k];?>"
                                     style="background: url(<?=CFile::GetPath($photo)?>) no-repeat center/ cover;">
                                </div>
                            </div>


                        <? endforeach ?>


                    </div>
                </div>
            <? } ?>
        </div>

        <div class="demonstration__switcher-block">

            <div class="title demonstration__title"><?=$arParams['SECTION_TITLE'];?></div>
            <div class="switcher demonstration__switcher">
            <? foreach ($arResult['ITEMS'] as $key=>$item): ?>

                <span class="link switcher__link <?if ($key == 0):?>switcher__link--active<?endif;?>"
                     onClick="ChangeSliders('#index_slider-left<?= $key; ?>')"><?= $item['NAME'] ?>
                </span>

            <? endforeach; ?>
            </div>
        </div>
    <? endif; ?>
</div>



