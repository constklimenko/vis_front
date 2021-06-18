<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
//    slick

$this->addExternalJs(SITE_TEMPLATE_PATH . '/js/slick/slick.js');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/js/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/js/slick/slick-theme.css');
$this->addExternalJs(SITE_TEMPLATE_PATH . '/js/vis-element-card-script.js');
?>

<?
$ob_el=CIBlockElement::GetList(Array("SORT"=>"ASC"),Array('IBLOCK_ID'=>$arResult['IBLOCK_ID'],'SORT'=>array($arResult['SORT']-1,$arResult['SORT']+1),'PROPERTY_KORPUS'=>$arResult['PROPERTIES']['KORPUS']['VALUE']),false,false,Array('SORT','CODE'));
while($ob = $ob_el->GetNext()){
    if($ob['SORT']>$arResult['SORT']){$etahe['+']=$ob;}else{$etahe['-']=$ob;}
}
$ob_el=CIBlockElement::GetByID($arResult['PROPERTIES']['KORPUS']['VALUE']);
$ar_res = $ob_el->GetNext();
?>



<?
$ob_korpus=CIBlockElement::GetByID($arResult['PROPERTIES']['KORPUS']['VALUE']);
$korpus = $ob_korpus->GetNext();
$ob_plan=CIBlockElement::GetByID($arResult['PROPERTIES']['PLAN']['VALUE']);
$etah = $ob_plan->GetNext();

//$file_name='Корпус: '.$korpus.' Этаж: '.$etah.' '.$arResult['NAME'];
//$arParams = array("replace_space"=>"-","replace_other"=>"-");
//$file_name= Cutil::translit($file_name,"ru",$arParams);
?>


<!--
<pre>
<?=var_dump($arResult['PROPERTIES']['YOUTUBE']);?>

</pre>
	-->



<section class="info">
    <a href="/arenda/" class="info-back-link">
        <div class="img"></div>
        <span>Назад</span></a>
    <div class="gallery-grid">
        <div class="gallery-grid-left">
            <a class="gallery-grid-left-button fbs" href="<?=CFile::GetPath($arResult['PROPERTIES']["IMG_GALERY"]["VALUE"][1]);?>" rel="gallery1"><img class="img"><span><span>+</span><span class="number_of_slides-2">
                        <?=$arResult['PROPERTIES']["IMG_GALERY"]["MULTIPLE_CNT"] - 2;?>
                    </span><span>фото</span></span>
            </a>
            <div class="vertical-slider">
                <?foreach($arResult["PROPERTIES"]["IMG_GALERY"]["VALUE"] as $photo):?>
                    <img class="slide" src="<?=CFile::GetPath($photo)?>" />
                <?endforeach?>

                <div class="slide" > <iframe width="100%" height="100%" src="https://www.youtube.com/embed/y89PuM8SEF4" title="YouTube video player"
                              frameborder="0" allow=" autoplay; clipboard-write; encrypted-media; gyroscope" allowfullscreen></iframe> </div>



            </div>
        </div>
        <div class="gallery-grid-right">
            <div class="info-dots-container"></div>
            <div class="slider-nav"><span><span class="current-count">1</span><span>/</span><span
                            class="number_of_slides"><?=count($arResult['PROPERTIES']["IMG_GALERY"]['VALUE']);?></span></span></div>
            <div class="horisontal-slider">

                <?foreach($arResult["PROPERTIES"]["IMG_GALERY"]["VALUE"] as $photo):
                    $photo_path = CFile::GetPath($photo);
                    ?>
                    <div class="slide"><a class="slide-fancybox fbs" href="<?=CFile::GetPath($photo)?>" rel="gallery1"> a</a>
                        <div class="img"
                             style="background: url(<?=CFile::GetPath($photo)?>) no-repeat center/ cover;"></div>
                    </div>


                <?endforeach?>



                <div class="slide" > <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<? $yt=explode('/', $arResult['PROPERTIES']["YOUTUBE"]['VALUE']); echo $yt[ count($yt) - 1];?>" title="YouTube video player"
                                             frameborder="0" allow=" autoplay; clipboard-write; encrypted-media; gyroscope" allowfullscreen></iframe> </div>

<!--                --><?//if ($arResult["PROPERTIES"]["VIDEO"]):
//                $video = $arResult["PROPERTIES"]["VIDEO"]["VALUE"]["path"];?>
<!--                <div class="slide">-->
<!--                <video src="--><?//echo $video;?><!--" />-->
<!--                </div>-->
<!--                --><?//endif?>




            </div>
        </div>
    </div>



    <div class="info-grid"><h1 class="info-title"><?=$arResult['NAME']?></h1>
        <div class="share-button"></div>
        <div class="info-char">
            <div class="info-char-title">Этаж</div>
            <div class="info-char-subtitle"><span class="number"><?=$arResult['PROPERTIES']['ETAJ']['VALUE']?></span></div>
            <div class="info-char-title">Строение</div>
            <div class="info-char-subtitle"><span class="number"><?=$korpus['SORT']?></span>
<!--                <a download="" href="/pdf/dompdf.php?IMG=--><?//=$arResult['ID']?><!--&outfile=--><?//=$file_name?><!--" class="info-char-link">-->
            <a   class="info-char-link">Планировка</a></div>
            <div class="info-char-title">Площадь</div>
            <div class="info-char-subtitle"><span class="number"><?=$arResult['PROPERTIES']['PLOSH']['VALUE']?></span><span class="text"></span></div>
            <div class="info-char-title">Потолки</div>
            <div class="info-char-subtitle"><span class="number"><?=$arResult['PROPERTIES']['POTOLKI']['VALUE']?></span><span class="text">м</span></div>
            <div class="info-char-title">Планировка</div>
            <div class="info-char-subtitle"><span class="number"><?=$arResult['PROPERTIES']['PLANIROVKA']['VALUE']?></span></div>
        </div>
        <div class="info-prices">
            <div class="info-prices-title">Арендная ставка</div>
            <div class="info-prices-number"><span class="number"><?=number_format($arResult['PROPERTIES']['ORENDA_M_KV_GOD']['VALUE'],'0','.','&nbsp;')?></span><span class="text">₽ кв. м.</span></div>
            <div class="info-prices-subtitle">Включая стоимость эксплуатации здания, без учета стоимости эксплуатации
                арендуемого помещения и стоимости коммунальных услуг.
            </div>
            <div class="info-prices-title">Ежемесячный платеж</div>
            <div class="info-prices-number"><span class="number"><?=number_format($arResult['PROPERTIES']['ORENDA_FOR_MANS']['VALUE'],'0','.','&nbsp;')?></span><span class="text">₽ мес.</span></div>
            <a download="" href=" <?=CFile::GetPath($arResult['PROPERTIES']['PRESENTATION']['VALUE'])?>" >
                <button class="info-btn"> скачать презентацию </button></a >
        </div>
        <div class="info-text">Коммунальные услуги оплачиваются дополнительно по тарифам ресурсоснабжающей организации
            согласно показаний приборов учета.
        </div>
    </div>
</section>

<section class="elem_descr">
    <div class="elem_descr-plan">
        <div class="elem_descr-title">ПЛАНИРОВКА ЭТАЖА</div>
        <img class="elem_descr-img" src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>" ></div>
    <div class="elem_descr-description">
        <div class="elem_descr-title">ОПИСАНИЕ И ОБЩИЙ ВИД ОБЪЕКТА</div>
        <div class="elem_descr-text">
            <?=$arResult['DETAIL_TEXT']?>



        </div>
    </div>
</section>
<section class="elem_tabs">
    <a onclick="toggleElemTab();" class="elem_tabs-header-tab elem_tabs-header-tab--active">Дополнительные услуги</a><a
                class="elem_tabs-header-tab" onclick="toggleElemTab();">Транспортная доступность</a>
    <div class="elem_tabs-content"><a class="elem_tabs-card">
            <div class="card-img">
                <div class="bucket"></div>
            </div>
            <div class="card-text">Услуги клининга (уборки) в арендуемом помещении</div>
        </a><a class="elem_tabs-card">
            <div class="card-img">
                <div class="parking"></div>
            </div>
            <div class="card-text">Круглосуточная наземная парковка на охраняемой территории</div>
        </a><a class="elem_tabs-card">
            <div class="card-img">
                <div class="taxometr"></div>
            </div>
            <div class="card-text">Гостевая парковка с оплатой на почасовой основе</div>
        </a></div>

    <div class="elem_tabs-content m-show"><a class="elem_tabs-card">
            <div class="card-img">
                <div class="bucket"></div>
            </div>
            <div class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
        </a><a class="elem_tabs-card">
            <div class="card-img">
                <div class="parking"></div>
            </div>
            <div class="card-text"> Quasi magni tempora magnam rerum odio, iure earum officia repellat ipsa ex alias
                excepturi
            </div>
        </a><a class="elem_tabs-card">
            <div class="card-img">
                <div class="taxometr"></div>
            </div>
            <div class="card-text">quam laudantium, deleniti beatae omnis dignissimos dolore. Quidem.</div>
        </a></div>
</section>




<?$APPLICATION->ShowViewContent('similar');?>





	
	
	
	
	
	
	
	
	





<? /*
$arOffice=array();
$arFilter=Array('IBLOCK_ID'=>6,'PROPERTY_PLAN'=>$arResult['ID'],'ACTIVE'=>'Y');
$ob_ofise=CIBlockElement::GetList(Array("SORT"=>"ASC"),$arFilter,false,false,Array('NAME','PROPERTY_PLOSH','DETAIL_PAGE_URL','SORT','PREVIEW_TEXT','DETAIL_TEXT'));
while($ar = $ob_ofise->GetNext()) {
	$arOffice[]=$ar; ?>

<?}*/?>

