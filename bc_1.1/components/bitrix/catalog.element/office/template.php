<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
//    slick

$this->addExternalJs(SITE_TEMPLATE_PATH . '/js/slick/slick.js');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/js/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/js/slick/slick-theme.css');
$this->addExternalJs(SITE_TEMPLATE_PATH . '/js/vis-scripts.js');

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
?>



<section class="info">
    <a class="info-back-link">
        <div class="img"></div>
        <span>Назад</span></a>
    <div class="gallery-grid">
        <div class="gallery-grid-left">
            <div class="gallery-grid-left-button"><img class="img"><span><span>+</span><span class="number_of_slides-2">12</span><span>фото</span></span>
            </div>
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
            <div class="info-dots-container"></div>
            <div class="slider-nav"><span><span class="current-count">1</span><span>/</span><span
                            class="number_of_slides">4</span></span></div>
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



    <div class="info-grid"><h1 class="info-title">Название помещения <br/> бывает в две строки</h1>
        <div class="share-button"></div>
        <div class="info-char">
            <div class="info-char-title">Этаж</div>
            <div class="info-char-subtitle"><span class="number"><?=$etah['SORT']?></span></div>
            <div class="info-char-title">Строение</div>
            <div class="info-char-subtitle"><span class="number"><?=$korpus['SORT']?></span><a class="info-char-link">Планировка</a></div>
            <div class="info-char-title">Площадь</div>
            <div class="info-char-subtitle"><span class="number"><?=$arResult['PROPERTIES']['PLOSH']['VALUE']?></span><span class="text"></span></div>
            <div class="info-char-title">Потолки</div>
            <div class="info-char-subtitle"><span class="number"></span><span class="text"></span></div>
            <div class="info-char-title">Планировка</div>
            <div class="info-char-subtitle"><span class="number"></span></div>
        </div>
        <div class="info-prices">
            <div class="info-prices-title">Арендная ставка</div>
            <div class="info-prices-number"><span class="number">5 768</span><span class="text">₽ кв. м.</span></div>
            <div class="info-prices-subtitle">Включая стоимость эксплуатации здания, без учета стоимости эксплуатации
                арендуемого помещения и стоимости коммунальных услуг.
            </div>
            <div class="info-prices-title">Ежемесячный платеж</div>
            <div class="info-prices-number"><span class="number">51 567</span><span class="text">₽ мес.</span></div>
            <button class="info-btn">скачать презентацию</button>
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
    <div class="elem_tabs-header"><a class="elem_tabs-header-tab elem_tabs-header-tab--active">Дополнительные услуги</a><a
                class="elem_tabs-header-tab">Транспортная доступность</a></div>
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
</section>

<div class="similar">
    <div class="similar-title">Похожие офисы</div>
    <div class="similar-row">
        <div class="similar-row_card row_card">
            <div class="row_card-bg" style="background: url('<?=SITE_TEMPLATE_PATH?>/img/card/big-img.jpg') no-repeat center/ cover"></div>
            <div class="row_card-title">
                <div class="row_card-title-item">
                    <div class="number">3</div>
                    <div class="text">этаж</div>
                </div>
                <div class="row_card-title-item">
                    <div class="number">57.2</div>
                    <small class="text">кв. м.</small></div>
            </div>
            <div class="row_card-bottom">
                <div class="row_card-bottom-title">название помещения<br>бывает в две строки</div>
                <div class="row_card-bottom-price">
                    <div class="number">5 768 ₽</div>
                    <div class="text"> кв. м.</div>
                </div>
            </div>
        </div>
        <div class="similar-row_card row_card">
            <div class="row_card-bg" style="background: url('<?=SITE_TEMPLATE_PATH?>/img/card/big-img.jpg') no-repeat center/ cover"></div>
            <div class="row_card-title">
                <div class="row_card-title-item">
                    <div class="number">3</div>
                    <div class="text">этаж</div>
                </div>
                <div class="row_card-title-item">
                    <div class="number">57.2</div>
                    <small class="text">кв. м.</small></div>
            </div>
            <div class="row_card-bottom">
                <div class="row_card-bottom-title">название помещения<br>бывает в две строки</div>
                <div class="row_card-bottom-price">
                    <div class="number">5 768 ₽</div>
                    <div class="text"> кв. м.</div>
                </div>
            </div>
        </div>
        <div class="similar-row_card row_card">
            <div class="row_card-bg" style="background: url('<?=SITE_TEMPLATE_PATH?>/img/card/big-img.jpg') no-repeat center/ cover"></div>
            <div class="row_card-title">
                <div class="row_card-title-item">
                    <div class="number">3</div>
                    <div class="text">этаж</div>
                </div>
                <div class="row_card-title-item">
                    <div class="number">57.2</div>
                    <small class="text">кв. м.</small></div>
            </div>
            <div class="row_card-bottom">
                <div class="row_card-bottom-title">название помещения<br>бывает в две строки</div>
                <div class="row_card-bottom-price">
                    <div class="number">5 768 ₽</div>
                    <div class="text"> кв. м.</div>
                </div>
            </div>
        </div>
        <div class="similar-row_card row_card">
            <div class="row_card-bg" style="background: url('<?=SITE_TEMPLATE_PATH?>/img/card/big-img.jpg') no-repeat center/ cover"></div>
            <div class="row_card-title">
                <div class="row_card-title-item">
                    <div class="number">3</div>
                    <div class="text">этаж</div>
                </div>
                <div class="row_card-title-item">
                    <div class="number">57.2</div>
                    <small class="text">кв. м.</small></div>
            </div>
            <div class="row_card-bottom">
                <div class="row_card-bottom-title">название помещения<br>бывает в две строки</div>
                <div class="row_card-bottom-price">
                    <div class="number">5 768 ₽</div>
                    <div class="text"> кв. м.</div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div class="content">
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
</div>-->

	
	
	
	
	
	
	
	
	
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

