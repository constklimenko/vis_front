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
<?$ElementID = $APPLICATION->IncludeComponent("bitrix:catalog.element", "korpus", Array(
    "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
    "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
    "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
    "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    "IBLOCK_ID" => 4,
    "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
    "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
    "META_KEYWORDS" => $arParams["META_KEYWORDS"],
    "META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
    "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
    "SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
    "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
    "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
    "SET_TITLE" => $arParams["SET_TITLE"],
    "MESSAGE_404" => $arParams["MESSAGE_404"],
    "SET_STATUS_404" => $arParams["SET_STATUS_404"],
    "SHOW_404" => $arParams["SHOW_404"],
    "FILE_404" => $arParams["FILE_404"],
    "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
    "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
    "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
    "CACHE_TIME" => $arParams["CACHE_TIME"],
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
    "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
    "DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
    "DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
    "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
    "PAGER_SHOW_ALWAYS" => "N",
    "PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
    "PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
    "CHECK_DATES" => $arParams["CHECK_DATES"],
    "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
    "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
    "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
    "USE_SHARE" => $arParams["USE_SHARE"],
    "SHARE_HIDE" => $arParams["SHARE_HIDE"],
    "SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
    "SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
    "SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
    "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
    "ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
    'STRICT_SECTION_CHECK' => (isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : ''),

    "ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
    "ADD_DETAIL_TO_SLIDER" => "N",	// Добавлять детальную картинку в слайдер
    "ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
    "ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
    "BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
    "BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
    "BRAND_USE" => "N",	// Использовать компонент "Бренды"
    "CHECK_SECTION_ID_VARIABLE" => "N",	// Использовать код группы из переменной, если не задан раздел элемента
    "COMPONENT_TEMPLATE" => ".default",
    "DETAIL_PICTURE_MODE" => "IMG",	// Режим показа детальной картинки
    "DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
    "DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
    "DISPLAY_PREVIEW_TEXT_MODE" => "E",	// Показ описания для анонса
    "LABEL_PROP" => "-",	// Свойство меток товара
    "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу, где будет показан список связанных элементов
    "LINK_IBLOCK_ID" => "",	// ID инфоблока, элементы которого связаны с текущим элементом
    "LINK_IBLOCK_TYPE" => "",	// Тип инфоблока, элементы которого связаны с текущим элементом
    "LINK_PROPERTY_SID" => "",	// Свойство, в котором хранится связь
    "MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
    "MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
    "MESS_BTN_COMPARE" => "Сравнить",	// Текст кнопки "Сравнить"
    "MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
    "MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
    "OFFERS_LIMIT" => "0",	// Максимальное количество предложений для показа (0 - все)
    "PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
    "PRICE_CODE" => "",	// Тип цены
    "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
    "PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
    "PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
    "PRODUCT_PROPERTIES" => "",	// Характеристики товара
    "PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
    "PRODUCT_QUANTITY_VARIABLE" => "",	// Название переменной, в которой передается количество товара
    "SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
    "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
    "SEF_MODE" => "N",	// Включить поддержку ЧПУ
    "SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
    "SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
    "SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
    "SHOW_DEACTIVATED" => "N",	// Показывать деактивированные товары
    "SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
    "TEMPLATE_THEME" => "blue",	// Цветовая тема
    "USE_COMMENTS" => "N",	// Включить отзывы о товаре
    "USE_ELEMENT_COUNTER" => "Y",	// Использовать счетчик просмотров
    "USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
    "USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
    "USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
    "USE_VOTE_RATING" => "N",	// Включить рейтинг товара
),
    $component
);?>