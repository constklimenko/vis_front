<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
global $APPLICATION;
$isPartnersPage = strstr($APPLICATION->GetCurPage(),"partners");
$this->addExternalJs('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
?>
<div class="map-wrapper_2" style="height:249px;">
	<div class="map-sidebar">
		<ul>
			<? 
			$partner = "";
			$partnern = "";
			$z=0;
			foreach ($arResult['SECTIONS'] as $item){
				if($item["CODE"]=="oserv"){
				    $partner = $item['PICTURE']['SRC'];
				    $partnern=$item['NAME'];
				    continue;
				}
				if(!$isPartnersPage){ ?>
                    <li class="map-icon map-icon1 <? if($z==0){ echo 'active map-link'; $z++; }?>" >
                        <a href="javascript:void(0);" data-id="<?=$item['ID']?>">
                            <span class="img" style="background: url(<?=$item['PICTURE']['SRC']?>) no-repeat;"></span>
                            <span><?=$item['NAME']?></span>
                        </a>
                    </li>
				<? } ?>
			<? } ?>
				<? if($isPartnersPage){?>
					<li class="map-icon map-icon1">
						<a href="/location/">
							<span class="img" style="background: url(<?=$partner?>) no-repeat;"></span>
							<span>Назад к списку</span>
						</a>
					</li>
				<? } ?>
				<li class="map-icon map-icon1<? if($isPartnersPage){?> active map-link<? } ?>">
					<a href="/location/partners/">
						<span class="img" style="background: url(<?=$partner?>) no-repeat;"></span>
						<span><?=$partnern?></span>
					</a>
				</li>
		</ul>
	</div>
	<? if(!$isPartnersPage){?>
		<div class="b-map" id="map"> </div>
	<? }else{ ?>
		<div class="map-content">
			<div class="close"></div>
			<div class="map-row">
				<?foreach($arResult['MAP_ITEMS'] as $item){?>
				 	<div class="item">
						<img src="<?=$item['PREVIEW_PICTURE']?>" alt="<?=$item['NAME'];?>">
						<span class="about">
							<div>
								<h1><?=$item['NAME']?></h1>
								<p><?=$item['PREVIEW_TEXT']?></p>
							</div>
						</span>
					</div>
				<? } ?>				
			</div>
		</div>
		<div class="b-map" id="map" style="height: 249px;"> </div>
	<? } ?>	
</div>