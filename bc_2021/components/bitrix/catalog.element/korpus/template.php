<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<div class="rent-box">
		<div class="gallery-controls_wrapper rent">
			<div class="content">
				<a href="" class="back-link parameters-link"><i class="icon-menu61"></i><span>Подбор по параметрам</span></a>
				<div class="number-offers">Найдено <span>0</span> предложений</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="selection-parameters">
			<div class="content">
				<div class="controls-box">

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
												);?>
				</div>
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
</div>
<div class="svgContainer" <?if($arResult['PREVIEW_PICTURE']['SRC']!=''){?>style="background: #acd7f5 url(<?=$arResult['PREVIEW_PICTURE']['SRC']?>) center center no-repeat;"<?}?>>
		<div class="svgBox" id="<?=$arResult['CODE']?>"></div>
		
		<!-- <div class="floor-nambers">
		
			<ul class="floor-nambers_list">
				<?
$arFilter=Array('IBLOCK_ID'=>5,'PROPERTY_KORPUS'=>$arResult['ID'],'ACTIVE'=>'Y');
$ob_ofise=CIBlockElement::GetList(Array("SORT"=>"ASC"),$arFilter,false,false,Array('PROPERTY_NAME','DETAIL_PAGE_URL'));
while($ar = $ob_ofise->GetNext()) {
	//for($i=$arResult['PROPERTIES']['LEVEL_COUNT']['VALUE'];$i>0;$i--){?>
					<li><a href="<?=$ar['DETAIL_PAGE_URL']?>"><?=$ar['SORT']?></a></li>
				<?}?>
			</ul>
		
		</div> -->
	</div>
<?//Получаем список всех активных элементов с этажа у которых не пусто поле PREVIEW_TEXT
$ob_ofise=CIBlockElement::GetList(Array("SORT"=>"ASC"),Array('IBLOCK_ID'=>6,'PROPERTY_KORPUS'=>$arResult['ID'],
                                                         //    '!PREVIEW_TEXT'=>false,
                                                             'ACTIVE'=>'Y'),false,false,Array('PROPERTY_ETAJ'));
while($ar = $ob_ofise->GetNext()) {
	if(!isset($po_etajam[$ar['PROPERTY_ETAJ_VALUE']])){$po_etajam[$ar['PROPERTY_ETAJ_VALUE']]=1;}
	else{$po_etajam[$ar['PROPERTY_ETAJ_VALUE']]++;}
}

?>

	<?for($i=$arResult['PROPERTIES']['LEVEL_COUNT']['VALUE'];$i>0;$i--)
	{?>
		<div class="floorTooltip fl<?=$i?>">
			<div class="floor"><?=$i?> ЭТАЖ</div>
			<div class="available"><?=$po_etajam[$i]!=''?$po_etajam[$i]:0?></div>
			<span>вакантно</span>
		</div>
	<?}?>

	<div class="clear"></div>
<?/*<script type="text/javascript" src="<?=$templateFolder?>/<?=$arResult['CODE']?>.js"></script>*/?>
<script type="text/javascript">
$(document).ready(function () {


// korpus 
	var daWidth = $('body').innerWidth();
		daHeight = (daWidth * .542);

	var paper1 = Raphael($('#korpus-<?=$arResult["SORT"]?>')[0], daWidth, daHeight);
	var attr = {stroke:'none'};

	$('.controls-box').css({'height':daHeight})

	paper1.setViewBox(0, 0, 1519, 824, true); 
	paper1.canvas.setAttribute('preserveAspectRatio', 'none'); // there's no method in Raphaël for doing this directly

	$(window).resize(function(){
     	var daWidth = $('body').innerWidth();
		daHeight = (daWidth * .542);
		// setsize is a very handy method that, i believe, is new to Raphaël 2.0
		// it's great for being responsive in our designs.
		paper1.setSize(daWidth,daHeight);

	});   


	function labelPath( pathObj, text, textattr ){
		if ( textattr == undefined )
        textattr = { 'font-size': 28, fill: '#fff', stroke: 'none', 'font-family': 'Roboto,sans-serif', 'font-weight': 900 };
	    var bbox = pathObj.getBBox();
	    var textObj = pathObj.paper.text( bbox.x + bbox.width / 2, bbox.y + bbox.height / 2, text ).attr( textattr );
	    return textObj;
	};

<? $arFilter=Array('IBLOCK_ID'=>5,'PROPERTY_KORPUS'=>$arResult['ID'],'ACTIVE'=>'Y');
$ob_ofise=CIBlockElement::GetList(Array("SORT"=>"ASC"),$arFilter,false,false,Array('PROPERTY_NAME','DETAIL_PAGE_URL','SORT','PREVIEW_TEXT','DETAIL_TEXT'));
while($ar = $ob_ofise->GetNext()) {?>
var floor<?=$arResult["SORT"]?><?=$ar['SORT']?> = paper1.path("<?=$ar['PREVIEW_TEXT']?>")
	.attr({fill: "#0dbed6", opacity:"0", stroke:'none' });
	floor<?=$arResult["SORT"]?><?=$ar['SORT']?>.data("id", 'fl<?=$arResult["SORT"]?><?=$ar['SORT']?>').data("value", "etaj/<?=$ar['CODE']?>.html");

	var floor<?=$arResult["SORT"]?><?=$ar['SORT']?>Mark = paper1.circle(<?=$ar['DETAIL_TEXT']?>)
	.attr({
	    "fill": "#000",
	    "fill-opacity" : "0.47",
	    "stroke": "#fff",
	    "stroke-width": "2",
	})
	.data("id", 'floor<?=$arResult["SORT"]?><?=$ar['SORT']?>Mark')
	var floor<?=$arResult["SORT"]?><?=$ar['SORT']?>Text = labelPath( floor<?=$arResult["SORT"]?><?=$ar['SORT']?>Mark, "<?=$ar['SORT']?>" );

	var floorSet<?=$arResult["SORT"]?><?=$ar['SORT']?> = paper1.set();
	floorSet<?=$arResult["SORT"]?><?=$ar['SORT']?>.push(floor<?=$arResult["SORT"]?><?=$ar['SORT']?>Mark, floor<?=$arResult["SORT"]?><?=$ar['SORT']?>Text, floor<?=$arResult["SORT"]?><?=$ar['SORT']?>);

 	var s<?=$arResult["SORT"]?><?=$ar['SORT']?>hoverIn = function() {
        floor<?=$arResult["SORT"]?><?=$ar['SORT']?>.attr({"opacity" : "0.47",});
        floor<?=$arResult["SORT"]?><?=$ar['SORT']?>Mark.attr({"fill-opacity" : "1", "fill": "#22c2d9",});
    };
    var s<?=$arResult["SORT"]?><?=$ar['SORT']?>hoverOut = function() {
        floor<?=$arResult["SORT"]?><?=$ar['SORT']?>.attr({"opacity" : "0",});
        floor<?=$arResult["SORT"]?><?=$ar['SORT']?>Mark.attr({"fill-opacity" : "0.47", "fill": "#000",});
    }

    floorSet<?=$arResult["SORT"]?><?=$ar['SORT']?>.hover(s<?=$arResult["SORT"]?><?=$ar['SORT']?>hoverIn, s<?=$arResult["SORT"]?><?=$ar['SORT']?>hoverOut);


    var tooltip<?=$arResult["SORT"]?><?=$ar['SORT']?>In = function() {
        $('.fl<?=$ar['SORT']?>').show();
    };
    var tooltip<?=$arResult["SORT"]?><?=$ar['SORT']?>Out = function() {
        $('.fl<?=$ar['SORT']?>').hide()
    };
    floor<?=$arResult["SORT"]?><?=$ar['SORT']?>.hover(tooltip<?=$arResult["SORT"]?><?=$ar['SORT']?>In,tooltip<?=$arResult["SORT"]?><?=$ar['SORT']?>Out);

floor<?=$arResult["SORT"]?><?=$ar['SORT']?>.click(function(e) {
		window.location.href = this.data("value");
	});

	<?}?>
$('body').removeClass('svg-container');
});
</script>
