<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="grey-content">
	<div class="wrapper">
		<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "ownnavigate", Array(
			"COMPONENT_TEMPLATE" => ".default",
				"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
				"SITE_ID" => "-",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
				"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
			),
			false
		);?>
		<h2><?=$arResult["NAME"]?></h2>
		<div class="white-container"><?=$arResult["DETAIL_TEXT"]?></div>
	</div>
</div>