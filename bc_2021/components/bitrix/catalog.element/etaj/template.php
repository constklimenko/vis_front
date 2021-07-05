<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>




<div class="gallery-controls_wrapper rent">
	<div class="content">
		<a href="/arenda/<?=$arResult['AR_RES']['CODE']?>.html" class="select-floor"><i class="icon-arrowhead7"></i>Выбор этажа</a>
		<a href="" class="back-link parameters-link"><i class="icon-menu61"></i><span>Подбор по параметрам</span></a>
		<div class="number-offers">Найдено <span>0</span> предложений</div>
		<div class="clear"></div>
	</div>
</div>
<?/*фильтр*/?>
<div class="selection-parameters" >
			<div class="content">
				<div class="controls-box" style="height: 731.158px; min-height: 523px;">
				<?$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "podbor", Array(
					"COMPONENT_TEMPLATE" => ".default",
						"IBLOCK_TYPE" => "bc",	// Тип инфоблока
						"IBLOCK_ID" => "6",	// Инфоблок
						"SECTION_ID" => "",	// ID раздела инфоблока
						"SECTION_CODE" => "",	// Код раздела
						"FILTER_NAME" => "arrFilter",	// Имя выходящего массива для фильтрации
						"TEMPLATE_THEME" => "blue",	// Цветовая тема
						"FILTER_VIEW_MODE" => "vertical",	// Вид отображения
						"POPUP_POSITION" => "left",	// Позиция для отображения всплывающего блока с информацией о фильтрации
						"DISPLAY_ELEMENT_COUNT" => "Y",	// Показывать количество
						"SEF_MODE" => "N",	// Включить поддержку ЧПУ
						"CACHE_TYPE" => "A",	// Тип кеширования
						"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
						"CACHE_GROUPS" => "Y",	// Учитывать права доступа
						"SAVE_IN_SESSION" => "N",	// Сохранять установки фильтра в сессии пользователя
						"INSTANT_RELOAD" => "N",	// Мгновенная фильтрация при включенном AJAX
						"PAGER_PARAMS_NAME" => "arrPager",	// Имя массива с переменными для построения ссылок в постраничной навигации
						"XML_EXPORT" => "N",	// Включить поддержку Яндекс Островов
						"SECTION_TITLE" => "-",	// Заголовок
						"SECTION_DESCRIPTION" => "-",	// Описание
					),
					false
												);?></div>
				<div class="resultat-selection">
					<ul class="resultat-list">
						<li class="resultat-item">
							<div class="wrapper">
								<ol class="office-inform_list">
									<li><b>Фото</b></li>
									<li><b>Корпус</b></li>
									<li><b>Этаж</b></li>
									<li><b>Площадь, м2</b></li>
									<li><b>Тип помещения</b></li>
								</ol>
							</div>
						</li>
						<?foreach ($arResult['OFISES'] as $ofise){?>
						<li class="resultat-item be_set">
							<div class="wrapper">
								<ol class="office-inform_list">
									<li> 
										<a href="<?=CFile::GetPath($ofise['PREVIEW_PICTURE']);?>" class="fancy">
											<?$file = CFile::ResizeImageGet($ofise['PREVIEW_PICTURE'], array('width'=>90, 'height'=>60), BX_RESIZE_IMAGE_PROPORTIONAL_ALT );?>
											<img src="<?=$file['src']?>" alt="">
										</a> 
									</li>
									<li><?=$ofise['PROPERTY_KORPUS_NAME']?></li>
									<li><?=$ofise['PROPERTY_PLAN_PROPERTY_NAME_VALUE']?></li>
									<li><?=$ofise['PROPERTY_PLOSH_VALUE']!=''?$ofise['PROPERTY_PLOSH_VALUE']:'-'?></li>
									<li><?=$ofise['PROPERTY_TYPE_APARTMENT_VALUE']!=''?$ofise['PROPERTY_TYPE_APARTMENT_VALUE']:'-'?></li>
								</ol>
								<div class="button-wrapper"><a href="/arenda/office/<?=$ofise['CODE']?>.html">Смотреть офис</a></div>
							</div>
						</li>
						<?}?>

					</ul>
					
				</div>
				<div class="clear"></div>
			</div>
		</div>


<?/*фильтр*/?>


<div class="floor-controls" >
		<div class="content">
			<div class="floor-controls_item floor-controls_item-1">
				<div class="title">Этаж</div>
				<div class="floor-number">
					<span><?=$arResult['SORT']?></span>
					<?if($arResult['ETAHE']['+']['CODE']!=''){?>
					<a href="/arenda/etaj/<?=$arResult['ETAHE']['+']['CODE']?>.html" class="next-floor"><i class="icon-add202"></i></a>
					<?}
					if($arResult['ETAHE']['-']['CODE']!=''){?>
					<a href="/arenda/etaj/<?=$arResult['ETAHE']['-']['CODE']?>.html" class="prew-floor"><i class="icon-minus25-2"></i></a>
					<?}?>
				</div>
			</div>
<?if(!empty($arResult['PROPERTIES']['PLAN_DOC']['VALUE'])):?>
			<div class="floor-controls_item floor-controls_item-2">
				<div class="title">Поэтажный план</div>

                    <?$arDocument = CFile::GetFileArray($arResult['PROPERTIES']['PLAN_DOC']['VALUE']);

                         function sizeFilter( $bytes )
                    {
                        $label = array( 'б.', 'кб.', 'мб.', 'гб.', 'тб.', 'пб.' );
                        for( $i = 0; $bytes >= 1000 && $i < ( count( $label ) -1 ); $bytes /= 1000, $i++ );
                        return( round( $bytes, 2 ) . " " . $label[$i] );
                    }

                    $docSizeFormatted =  sizeFilter($arDocument['FILE_SIZE']);

                        $extension = explode(".",$arDocument['FILE_NAME'])[1];

                    ;?>

                    <?

                    /*				<a data-element="<?=$arResult['ID']?>" href="/pdf/dompdf.php?base_path=<?=$_SERVER["DOCUMENT_ROOT"]?>/pdf/&input_file=img_to_pdf.html" data-id="<?=$arResult['PREVIEW_PICTURE']['ID']?>" class="doc-link"><span>Скачать (.pdf, 1.56 мб.)</span></a>


                   $file_name='Корпус: '.$ar_res['NAME'].' Этаж: '.$arResult['SORT'];
                  $arParams = array("replace_space"=>"-","replace_other"=>"-");
                  $file_name= Cutil::translit($file_name,"ru",$arParams);?>
                  */

                    /*
                    <a data-element="<?=$arResult['ID']?>" href="/pdf/dompdf.php?IMG=<?=$arResult['ID']?>&outfile=<?=$file_name?>" data-id="<?=$arResult['PREVIEW_PICTURE']['ID']?>" class="doc-link"><span>Скачать (.pdf, 1.56 мб.)</span></a> */?>

                                            <a data-element="<?=$arResult['ID']?>" href="<?=CFile::GetPath($arResult['PROPERTIES']['PLAN_DOC']['VALUE']) ;?>" data-id="<?=$arResult['PREVIEW_PICTURE']['ID']?>" class="doc-link"><span>Скачать (.<?=$extension;?>, <?=$docSizeFormatted;?>)</span></a>

			</div>

			<?endif;?>

			<div class="floor-controls_item floor-controls_item-3">
				<div class="title">Обозначения</div>
				<div class="floor-controls_marker no"><i></i>Занято</div>
				<div class="floor-controls_marker yes"><i></i>Свободно</div>	
			</div>


			<div class="clear"></div>
		</div>
	</div>
	
<div class="svgBoxFloor"><div class="svgBox" id="floor"  style="background-image: url(<?=$arResult['PREVIEW_PICTURE']['SRC']?>);"></div></div>


	<div class="clear"></div>

<script>
$(document).ready(function () {


// korpus 


	var daWidth = <?=$arResult['PREVIEW_PICTURE']['WIDTH']?>;
    var	daHeight = <?=$arResult['PREVIEW_PICTURE']['HEIGHT']?>;

    var h_w_proportion = daHeight / daWidth;

    var paper1 = Raphael($('#floor')[0], <?=$arResult['PREVIEW_PICTURE']['WIDTH']?>, <?=$arResult['PREVIEW_PICTURE']['HEIGHT']?>);
	var attr = {stroke:'none'};

	$('.controls-box').css({'height':daHeight})

	paper1.setViewBox(0, 0, <?=$arResult['PREVIEW_PICTURE']['WIDTH']?>, <?=$arResult['PREVIEW_PICTURE']['HEIGHT']?>, true); 
	paper1.canvas.setAttribute('preserveAspectRatio', 'none'); // there's no method in RaphaГ«l for doing this directly
    daWidth = $('.SvgBoxFloor').innerWidth();
    daHeight = (daWidth * h_w_proportion);

    paper1.setSize(daWidth,daHeight);

	$(window).resize(function(){
		if ($('body').width() < 1900) {
	     	daWidth = $('.SvgBoxFloor').innerWidth();
			daHeight = (daWidth * h_w_proportion);
			// setsize is a very handy method that, i believe, is new to RaphaГ«l 2.0
			// it's great for being responsive in our designs.
			paper1.setSize(daWidth,daHeight);
		}

	});  
	  

	function labelPath( pathObj, text, textattr ){
		if ( textattr == undefined )
        textattr = { 'font-size': 16, fill: '#fff', stroke: 'none', 'font-family': 'Roboto,sans-serif', 'font-weight': 700 };
	    var bbox = pathObj.getBBox();
	    var textObj = pathObj.paper.text( bbox.x + bbox.width / 2, bbox.y + bbox.height / 2, text ).attr( textattr );
	    return textObj;
	};
<? foreach($arResult['AR_OFFICE'] as $item){?>
	var office1<?=$item['ID']?> = paper1.path("<?=$arResult['AR_COORDINATES'][$item['ID']]?>")
	.attr({fill: "#0dbed6", opacity:"0.4", stroke:'none' });
	office1<?=$item['ID']?>.data("id", 'fl1<?=$item['ID']?>');
	office1<?=$item['ID']?>.data("value", "<?=$item['DETAIL_PAGE_URL']?>");
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

	
	office1<?=$item['ID']?>.click(function(e) {
		window.location.href = this.data("value");
	});
<?}?>
	$('body').removeClass('svg-container');
});
</script>