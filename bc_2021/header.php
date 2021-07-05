<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="<?=SITE_TEMPLATE_PATH?>/img/favicon.png" rel="shortcut icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
   <title><?$APPLICATION->ShowTitle()?></title>
<?/* <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>*/?>
    <?
    $assets = \Bitrix\Main\Page\Asset::getInstance();
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/jquery-1.11.2.min.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/all.min.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/jquery-ui.min.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/jquery.ui.touch-punch.min.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/jquery.pageScroll.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/contacts-map.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/jquery.mask.min.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/custom.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/script.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/vis-scripts.js');

    $assets->addCss(SITE_TEMPLATE_PATH . '/css/plagins_style.css');
//    $assets->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
//    $assets->addCss(SITE_TEMPLATE_PATH . '/css/media_query.css');
//    $assets->addCss(SITE_TEMPLATE_PATH . '/css/fonts.css', true);
    $assets->addCss(SITE_TEMPLATE_PATH . '/template_styles.css');
//    $assets->addCss('https://fonts.googleapis.com/css?family=Roboto:400,500,300,700,900&amp;subset=latin,cyrillic-ext', true);

    $APPLICATION->ShowHead();
    ?>

<?
global $isAdmin;
global $isDevMode;
global $isDevSite;
$isAdmin = $GLOBALS['USER']->IsAdmin();
$isDevSite = (strpos($_SERVER['HTTP_HOST'], 'dev-') !== false);
$isDevMode = $isAdmin || $isDevSite;
?>




	<?/*?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.pageScroll.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.ui.touch-punch.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/svg/choice-housing.js');?>
	<?*/?>

	<!--[if lt IE 9]><script src="<?=SITE_TEMPLATE_PATH?>/js/html5.js"></script><![endif]-->
</head>
<body class="index">
<?$APPLICATION->ShowPanel()?>
<?php include_once("analyticstracking.php") ?>
<!-- NEW CONTENT 16.11.15-->
<!--<div class="preload">-->
<!--	<div class="fader">fader</div>-->
<!--	<ul class="loading">-->
<!--		<li>load</li>-->
<!--		<li>load</li>-->
<!--		<li>load</li>-->
<!--	</ul>-->
<!--</div>-->





<div class="menu-wrap" style="display:none;">
	<div class="dark-fader">fader</div>
	<div class="mob-menu">
		<a class="menu-open" href="#" >menu-open</a>
		<div class="enter">
			<span><?if($USER->IsAuthorized()){?><a href="/personal/"><?}?>Войти в кабинет<?if($USER->IsAuthorized()){?></a><?}?></span>
			<a class="enter-btn" href="#">enter</a>
			<a class="close-btn" href="#">close</a>
		</div>
        <?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
            "COMPONENT_TEMPLATE" => ".default",
            "DELAY" => "N",	// Откладывать выполнение шаблона меню
            "MAX_LEVEL" => "1",	// Уровень вложенности меню
            "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
            "MENU_CACHE_TYPE" => "A",	// Тип кеширования
            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
        ),
            false
        );?>
		<div class="login-form">
			<?$APPLICATION->IncludeComponent(
				"bitrix:system.auth.form",
				"",
				Array(
					"COMPONENT_TEMPLATE" => ".default",
					"FORGOT_PASSWORD_URL" => "",
					"PROFILE_URL" => "/personal/",
					"REGISTER_URL" => "",
					"SHOW_ERRORS" => "N"
				)
			);?>
		</div>
	</div>
</div>






	<header class="header">
        <div class="container">
            <div class="header__row">
                <a href="/" class="logo header__logo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/svg/logo.svg" alt="Красный Пролетарий">
                </a>
                <button class="btn btn--burger header__burger" aria-label="Меню" aria-expanded="false">
                    <svg class="btn__icon  btn__icon--burger">
                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#union"></use>
                    </svg>
                </button>
                <?$APPLICATION->
                    IncludeComponent("bitrix:menu", "top_menu", Array(
                            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                            "COMPONENT_TEMPLATE" => ".default",
                            "DELAY" => "N",	// Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "1",	// Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        ),
                            false
                );?>
                <ul class="list controls header__controls">
                    <li class="controls__item">
                        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH"=> SITE_TEMPLATE_PATH.'/inc/head_phone.php',
                                "EDIT_TEMPLATE" => "standard.php"
                            )
                        );?>
                    </li>
                    <li class="controls__item">
                        <a class="btn btn--search" href="/search/">
                            <svg class="btn__icon btn__icon--search">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#search"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="controls__item">
                        <?if($USER->IsAuthorized()){?>
                            <a href="<?=$APPLICATION->GetCurPageParam("logout=yes");?>" class="btn btn--login">Выйти</a>
                        <?}else{?>
                            <a href="/auth/" class="btn btn--login">Войти</a>
                        <?}?>
                    </li>
                </ul>
                <a class="btn btn--mobile header__phone" href="tel:+74952252095">
                    <svg class="btn__icon  btn__icon--phone">
                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#phone"></use>
                    </svg>
                </a>
            </div>
        </div>
	</header>

