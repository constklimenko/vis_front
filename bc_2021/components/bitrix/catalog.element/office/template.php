<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
//    slick

$this->addExternalJs(SITE_TEMPLATE_PATH . '/js/slick/slick.js');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/js/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/js/slick/slick-theme.css');
$this->addExternalJs(SITE_TEMPLATE_PATH . '/js/vis-element-card-script.js');
$this->addExternalJs('https://yastatic.net/share2/share.js');
?>

<section class="info">
    <a href="<?=str_replace('bc' ,'arenda/etaj', $arResult['ARR_FLOOR']['DETAIL_PAGE_URL']);?>" class="info-back-link">
        <div class="img"></div>
        <span>Назад</span></a>


    <?if(empty($arResult['PROPERTIES']["IMG_GALERY"]["VALUE"])  && empty($arResult['PROPERTIES']["YOUTUBE"]['VALUE'])): ?>

    <div style="width:100%;height: auto;" >
        <img style="width:100%;height: auto;" src="<?=SITE_TEMPLATE_PATH;?>/img/no-img.jpg") ></img>

    </div>
    <?else:?>

    <div class="gallery-grid">
        <div class="gallery-grid-left">

            <a class="gallery-grid-left-button fbs" href="<?=CFile::GetPath($arResult['PROPERTIES']["IMG_GALERY"]["VALUE"][1]);?>" rel="gallery1">
                <img class="img">
                <span>

                    <?if ($arResult['PROPERTIES']["IMG_GALERY"]["MULTIPLE_CNT"] > 2):?>
                    <span>+</span>
                    <span class="number_of_slides-2">
                        <?=$arResult['PROPERTIES']["IMG_GALERY"]["MULTIPLE_CNT"] - 2;?>
                    </span><span>фото</span></span>

                <?endif;?>
            </a>

            <div class="vertical-slider">
                <?foreach($arResult["PROPERTIES"]["IMG_GALERY"]["VALUE"] as $photo):?>
                    <img class="slide" src="<?=CFile::GetPath($photo)?>" />
                <?endforeach?>

                <? if(!empty($arResult['PROPERTIES']["YOUTUBE"]['VALUE'])):?>

                <?$arResult['COUNT_OF_SLIDES']++;?>
                    <div class="slide" >
                        <iframe width="100%" height="100%"
                                src="https://www.youtube.com/embed/<?
                                $yt=explode('/', $arResult['PROPERTIES']["YOUTUBE"]['VALUE']);
                                echo $yt[ count($yt) - 1]; unset($yt);?>"
                                title="YouTube video player"
                                frameborder="0"
                                allow=" autoplay; clipboard-write; encrypted-media; gyroscope" allowfullscreen>

                        </iframe>
                    </div>
                <?endif;?>




            </div>
        </div>



        <div class="gallery-grid-right">
            <div class="info-dots-container">

            </div>

            <div class="slider-nav"><span><span class="current-count">1</span><span>/</span><span
                            class="number_of_slides"><?=$arResult['COUNT_OF_SLIDES'];?></span></span></div>
            <div class="horisontal-slider">

                <?foreach($arResult["PROPERTIES"]["IMG_GALERY"]["VALUE"] as $k => $photo):
                    $photo_path = CFile::GetPath($photo);
                    ?>
                    <div class="slide"><a class="slide-fancybox fbs" title="<?=$arResult["PROPERTIES"]["IMG_GALERY"]["DESCRIPTION"][$k];?>" href="<?=CFile::GetPath($photo)?>" rel="gallery1"> a</a>
                        <div class="img"
                             style="background: url(<?=CFile::GetPath($photo)?>) no-repeat center/ cover;"
                             title="<?=$item["PROPERTIES"]["IMG_GALERY"]["DESCRIPTION"][$k];?>"
                             alt="<?=$item["PROPERTIES"]["IMG_GALERY"]["DESCRIPTION"][$k];?>"
                        ></div>
                    </div>


                <?endforeach?>


<? if(!empty($arResult['PROPERTIES']["YOUTUBE"]['VALUE'])):?>
                <div class="slide" >
                    <iframe width="100%" height="100%"
                            src="https://www.youtube.com/embed/<?
                            $yt=explode('/', $arResult['PROPERTIES']["YOUTUBE"]['VALUE']);
                            echo $yt[ count($yt) - 1]; unset($yt);?>"
                            title="YouTube video player"
                            frameborder="0"
                            allow=" autoplay; clipboard-write; encrypted-media; gyroscope" allowfullscreen>

                    </iframe>
                </div>
<?endif;?>


            </div>
        </div>
    </div>


    <?endif;?>
    <div class="info-grid"><h1 class="info-title"><?=$arResult['NAME']?></h1>
        <div class="share-button"></div>

        <div class="info-char">
            <? if(!empty($arResult['PROPERTIES']['ETAJ']['VALUE'])):?>
            <div class="info-char-title">Этаж</div>
            <div class="info-char-subtitle">
                <span class="number"><?=$arResult['PROPERTIES']['ETAJ']['VALUE']?></span>
            </div>
            <?endif;?>

            <? if(!empty($arResult['KORPUS']['SORT'])):?>
            <div class="info-char-title">Строение</div>
            <div class="info-char-subtitle"><span class="number"><?=$arResult['KORPUS']['SORT']?></span>





                <span  class="info-char-link" >Планировка</span>


            </div>
            <?endif;?>

            <? if(!empty($arResult['PROPERTIES']['PLOSH']['VALUE'])):?>
            <div class="info-char-title">Площадь</div>
            <div class="info-char-subtitle"><span class="number"><?=$arResult['PROPERTIES']['PLOSH']['VALUE']?></span>
                <span class="text">
                    &nbsp;м<sup> <small>2</small>  </sup>
                </span>
            </div>
            <?endif;?>
            <? if(!empty($arResult['PROPERTIES']['POTOLKI']['VALUE'])):?>
            <div class="info-char-title">Потолки</div>
            <div class="info-char-subtitle"><span class="number"><?=$arResult['PROPERTIES']['POTOLKI']['VALUE']?></span><span class="text">&nbsp;м</span></div>
            <?endif;?>

            <? if(!empty($arResult['PROPERTIES']['PLANIROVKA']['VALUE'])):?>
            <div class="info-char-title">Планировка</div>
            <div class="info-char-subtitle"><span class="number"><?=$arResult['PROPERTIES']['PLANIROVKA']['VALUE']?></span></div>
            <?endif;?>

        </div>
        <div class="info-prices">
            <? if(!empty($arResult['PROPERTIES']['ORENDA_M_KV_GOD']['VALUE'])):?>
            <div class="info-prices-title">Арендная ставка</div>
            <div class="info-prices-number"><span class="number"><?=number_format($arResult['PROPERTIES']['ORENDA_M_KV_GOD']['VALUE'],'0','.','&nbsp;')?></span><span class="text">₽&nbsp;кв.&nbsp;м.</span>
            </div>
            <div class="info-prices-subtitle">Включая стоимость эксплуатации здания, без учета стоимости эксплуатации
                арендуемого помещения и стоимости коммунальных услуг.
            </div>
            <?endif;?>

            <? if(!empty($arResult['PROPERTIES']['ORENDA_FOR_MANS']['VALUE'])):?>
            <div class="info-prices-title">Ежемесячный платеж</div>
            <div class="info-prices-number"><span class="number"><?=number_format($arResult['PROPERTIES']['ORENDA_FOR_MANS']['VALUE'],'0','.','&nbsp;')?></span><span class="text">₽&nbsp;мес.</span></div>
            <?endif;?>
<?if(!empty($arResult['PROPERTIES']['PRESENTATION']['VALUE'])):?>
            <a download="" href=" <?=CFile::GetPath($arResult['PROPERTIES']['PRESENTATION']['VALUE'])?>" >
                <button class="info-btn"> скачать презентацию </button></a >
<?endif;?>



        </div>
        <div class="info-text">Коммунальные услуги оплачиваются дополнительно по тарифам ресурсоснабжающей организации
            согласно показаний приборов учета.
        </div>
    </div>
</section>

<?if(empty($arResult['ARR_FLOOR'])): ?>

<?php else:?>

<section class="elem_descr">
    <div class="elem_descr-plan">
        <div class="elem_descr-title">ПЛАНИРОВКА ЭТАЖА</div>





        <?if( !empty($arResult['ARR_FLOOR']['PREVIEW_PICTURE'])

        ): ?>

         <div class="svgBoxFloor "><div class="svgBox" id="floor"  style="background-image: url(<?=CFile::GetPath($arResult['ARR_FLOOR']['PREVIEW_PICTURE']);?>);"></div></div>

        <?endif;?>



    </div>

    <?if( empty($arResult['DETAIL_TEXT'])

    ): ?>

    <?else:?>
    <div class="elem_descr-description">


        <div class="elem_descr-title">ОПИСАНИЕ И ОБЩИЙ ВИД ОБЪЕКТА</div>
        <div class="elem_descr-text">


            <?=$arResult['DETAIL_TEXT']?>


        </div>
    </div>

    <?endif;?>
</section>

<?endif;?>


<section class="elem_tabs">
    <a onclick="toggleElemTab();" class="elem_tabs-header-tab elem_tabs-header-tab--active">Дополнительные услуги</a><a
                class="elem_tabs-header-tab" onclick="toggleElemTab();">Транспортная доступность</a>

    <?$APPLICATION->ShowViewContent('servises');?>


    <?$APPLICATION->ShowViewContent('transport');?>



</section>




<?$APPLICATION->ShowViewContent('similar');?>






<script>
    $(document).ready(function () {

        //scroll

         $('.info-char-link').on("click", function(){
            window.scrollTo(0, $(".elem_descr-title").offset().top - 120);
        })




// korpus


        var daWidth = <?=$arResult['FILE_PLAN']['WIDTH']?>;
        var daHeight = <?=$arResult['FILE_PLAN']['HEIGHT']?>;


        <? $h=$arResult['FILE_PLAN']['HEIGHT']/$arResult['FILE_PLAN']['WIDTH'];?>


        var paper1 = Raphael($('#floor')[0], daWidth, daHeight);
        var attr = {stroke:'none'};

      //  $('.controls-box').css({'height':daHeight})

        paper1.setViewBox(0, 0, daWidth, daHeight, true);
        paper1.canvas.setAttribute('preserveAspectRatio', 'none'); // there's no method in RaphaГ«l for doing this directly

//Сперва отрисовываем  синие области по картинке в реальном размере и сразу после этого подгоняем размер под контейнер
        daWidth = $('.svgBox').innerWidth();
        daHeight = (daWidth * <?=$h;?>);

        paper1.setSize(daWidth,daHeight);


        $(window).resize(function(){

                daWidth = $('.svgBox').innerWidth();
                daHeight = (daWidth * <?=$h;?>);
                // setsize is a very handy method that, i believe, is new to RaphaГ«l 2.0
                // it's great for being responsive in our designs.
                paper1.setSize(daWidth,daHeight);


        });


        function labelPath( pathObj, text, textattr ){
            if ( textattr == undefined )
                textattr = { 'font-size': 16, fill: '#fff', stroke: 'none', 'font-family': 'Roboto,sans-serif', 'font-weight': 700 };
            var bbox = pathObj.getBBox();
            var textObj = pathObj.paper.text( bbox.x + bbox.width / 2, bbox.y + bbox.height / 2, text ).attr( textattr );
            return textObj;
        };
        <? foreach($arResult['AR_OFFICE'] as $item){?>
        var office1<?=$item['ID']?> = paper1.path("<?=$arResult['COORDINATES_SVG'][$item['ID']]?>")
            .attr({fill: "#0dbed6", opacity:"0.4", stroke:'none' });
        office1<?=$item['ID']?>.data("id", 'fl1<?=$item['ID']?>');
       //office1<?=$item['ID']?>.data("value", "<?=$item['DETAIL_PAGE_URL']?>");
      var office1<?=$item['ID']?>Text = labelPath( office1<?=$item['ID']?>, "" );

        var office1<?=$item['ID']?>set = paper1.set();
        office1<?=$item['ID']?>set.push(office1<?=$item['ID']?>,  office1<?=$item['ID']?>Text);

        var s1<?=$item['ID']?>hoverIn = function() {
            office1<?=$item['ID']?>.attr({"opacity" : "0.7",});
        };
        var s1<?=$item['ID']?>hoverOut = function() {
            office1<?=$item['ID']?>.attr({"opacity" : "0.4",});
        }

        office1<?=$item['ID']?>set.hover(s1<?=$item['ID']?>hoverIn, s1<?=$item['ID']?>hoverOut);


        var office1<?=$item['ID']?>In = function() {
            $('.0ff1<?=$item['ID']?>').show();
        };
        var office1<?=$item['ID']?>Out = function() {
            $('.0ff1<?=$item['ID']?>').hide()
        };
       office1<?=$item['ID']?>set.hover(office1<?=$item['ID']?>In,office1<?=$item['ID']?>Out);


       <?/* office1<?=$item['ID']?>.click(function(e) {
            window.location.href = this.data("value");
        }); */?>
        <?}?>
        $('body').removeClass('svg-container');
    });
</script>

















