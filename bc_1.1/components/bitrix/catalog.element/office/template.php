<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<?
$ob_el=CIBlockElement::GetList(Array("SORT"=>"ASC"),Array('IBLOCK_ID'=>$arResult['IBLOCK_ID'],'SORT'=>array($arResult['SORT']-1,$arResult['SORT']+1),'PROPERTY_KORPUS'=>$arResult['PROPERTIES']['KORPUS']['VALUE']),false,false,Array('SORT','CODE'));
while($ob = $ob_el->GetNext()){ 
	if($ob['SORT']>$arResult['SORT']){$etahe['+']=$ob;}else{$etahe['-']=$ob;}
}
$ob_el=CIBlockElement::GetByID($arResult['PROPERTIES']['KORPUS']['VALUE']);
$ar_res = $ob_el->GetNext();
?><div class="gallery-controls_wrapper rent">
	<div class="content">
		<a href="/arenda/<?=$ar_res['CODE']?>.html" class="select-floor"><i class="icon-arrowhead7"></i>Выбор этажа</a>
		<a href="" class="back-link parameters-link" style="float:right;"><i class="icon-menu61"></i><span>Подбор по параметрам</span></a>
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


<?/*фильтр*/?>








<section class="info">
    <div class="info-back-link span-2"></div>
    <div class="gallery-grid">
        <div class="gallery-grid-left">
            <div class="gallery-grid-left-button"><div class="img"></div>
                <span>+12 фото</span></div>
            <div class="vertical-slider">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-video.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img2.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img2.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img2.jpg">
            </div>
        </div>
        <div class="gallery-grid-right">
            <div class="horisontal-slider">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img.jpg">
                <img class="slide"  src="<?=SITE_TEMPLATE_PATH?>/img/card/small-video.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img2.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img2.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img.jpg">
                <img class="slide" src="<?=SITE_TEMPLATE_PATH?>/img/card/small-img2.jpg">
            </div>
        </div>
    </div>
    <div class="info-grid"><h1 class="info-title">Название помещения бывает в две строки</h1>
        <div class="share-button"></div>
        <div class="info-char">
            <div class="info-char-title">Этаж</div>
            <div class="info-char-subtitle"><span class="number">3</span></div>
            <div class="info-char-title">Строение</div>
            <div class="info-char-subtitle"><span class="number">1</span><a class="info-char-link">Планировка</a></div>
            <div class="info-char-title">Площадь</div>
            <div class="info-char-subtitle"><span class="number"></span><span class="text"></span></div>
            <div class="info-char-title">Потолки</div>
            <div class="info-char-subtitle"><span class="number"></span><span class="text"></span></div>
            <div class="info-char-title">Планировка</div>
            <div class="info-char-subtitle"><span class="number"></span></div>
        </div>
        <div class="info-prices">
            <div class="info-prices-title">Арендная ставка</div>
            <div class="info-pices-number"><span class="number">5 768</span><span class="text">₽ кв. м.</span></div>
            <div class="info-prices-subtitle">Включая стоимость эксплуатации здания, без учета стоимости эксплуатации
                арендуемого помещения и стоимости коммунальных услуг.
            </div>
            <div class="info-prices-title">Ежемесячный платеж</div>
            <div class="info-pices-number"><span class="number">51 567</span><span class="text">₽ мес.</span></div>
            <button class="info-btn">скачать презентацию</button>
        </div>
        <div class="info-text">Коммунальные услуги оплачиваются дополнительно по тарифам ресурсоснабжающей организации
            согласно показаний приборов учета.
        </div>
    </div>
</section>


<div class="content">
	<div class="office-card">
		<div class="title"><?=$arResult['NAME']?></div>
		<div class="office-plan">
			<img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
		</div>
		<div class="office-inform">
			<div class="box-title">Характеристики офиса</div>
			<ul class="characteristics-list">
			<?
			$ob_korpus=CIBlockElement::GetByID($arResult['PROPERTIES']['KORPUS']['VALUE']);
			$korpus = $ob_korpus->GetNext();
			$ob_plan=CIBlockElement::GetByID($arResult['PROPERTIES']['PLAN']['VALUE']);
			$etah = $ob_plan->GetNext();
			?>
								<li>Площадь: <span><?=$arResult['PROPERTIES']['PLOSH']['VALUE']?> м2</span></li>
								<li>Корпус: <span><?=$korpus['SORT']?></span></li>
								<li>Этаж: <span><?=$etah['SORT']?></span></li>
			<?
			if($arResult['PROPERTIES']['SAN_UZ']['VALUE']) echo"<li>Есть санузел</li>";
			if($arResult['PROPERTIES']['OTDELKA']['VALUE']) echo"<li>Готовая отделка</li>";
			
			$file_name='Корпус: '.$korpus.' Этаж: '.$etah.' '.$arResult['NAME'];
			$arParams = array("replace_space"=>"-","replace_other"=>"-");
			$file_name= Cutil::translit($file_name,"ru",$arParams);?> 


			</ul>
			<div class="nds">Включено – НДС, <br> коммунальные услуги, не включая электроэнергию.</div>
		</div>
		<div class="application-box">
			<div class="box-title">Узнайте стоимость офиса</div>
			<p>Наш менеджер свяжется
			с вами, в течении 10 минут</p>
			<a href="" class="button" data-id="<?=$arResult['ID']?>">Отправить заявку</a>
			<a data-element="<?=$arResult['ID']?>" href="/pdf/dompdf.php?IMG=<?=$arResult['ID']?>&outfile=<?=$file_name?>" data-id="<?=$arResult['PREVIEW_PICTURE']['ID']?>" class="doc-link"><span>Скачать план офиса</span></a>
		</div>
		<div class="clear"></div>
		<? if($arResult['DETAIL_TEXT']!=""){?>
			<p style="margin-top:70px;color:#5D5D5D;"><?=$arResult['DETAIL_TEXT']?></p>
		<? } ?>	
		<div class="clear"></div>
	</div>
</div>

	
	
	
	
	
	
	
	
	
	<?
	//Похожие офисы
	$minf = $arResult['PROPERTIES']['PLOSH']['VALUE']-20;
	$maxf = $arResult['PROPERTIES']['PLOSH']['VALUE']+20;
	
	$arFilter=Array('IBLOCK_ID'=>6,"><PROPERTY_PLOSH"=>array($minf,$maxf),"!ID"=>$arResult['ID'],'ACTIVE'=>'Y');
	$ob_ofise=CIBlockElement::GetList(Array("SORT"=>"ASC"),$arFilter,false,false,Array("ID","IBLOCK_ID",'NAME','PROPERTY_*','DETAIL_PAGE_URL','PREVIEW_PICTURE'));
	$ofuceCount = $ob_ofise->SelectedRowsCount();
		
	if($ofuceCount!=0){?>
	<div class="similar-offices">
		<div class="content">
			<div class="box-title">Похожие офисы</div>
			<div class="simmilar-slider">
				<?
					while($rs_ofise = $ob_ofise->GetNextElement()){
						$ofFields 	= $rs_ofise->GetFields();
						$ofProps 	= $rs_ofise->GetProperties();?>
						<div class="item">
							<a href="<?=$ofFields["DETAIL_PAGE_URL"]?>" class="title"><?=$ofFields["NAME"]?></a>
							<a href="<?=$ofFields["DETAIL_PAGE_URL"]?>" class="img-box"><img src="<?=CFile::GetPath($ofFields['PREVIEW_PICTURE'])?>" alt="<?=$ofFields["NAME"]?>" style="max-width:130px;max-height:130px;"></a>
							<ul>
								<li>Площадь:  <?=$ofProps["PLOSH"]["VALUE"]?> м2</li>
								<li>Корпус:  <?=$ofProps["KORPUS"]["VALUE"]?></li>
								<li>Этаж:  <?=$ofProps["ETAJ"]["VALUE"]?></li>
							</ul>
						</div>
				<? } ?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<? } ?>




<? /*
$arOficce=array();
$arFilter=Array('IBLOCK_ID'=>6,'PROPERTY_PLAN'=>$arResult['ID'],'ACTIVE'=>'Y');
$ob_ofise=CIBlockElement::GetList(Array("SORT"=>"ASC"),$arFilter,false,false,Array('NAME','PROPERTY_PLOSH','DETAIL_PAGE_URL','SORT','PREVIEW_TEXT','DETAIL_TEXT'));
while($ar = $ob_ofise->GetNext()) {
	$arOficce[]=$ar; ?>	

<?}*/?>

