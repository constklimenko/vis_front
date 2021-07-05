<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="menu footer__menu">
				<ul class="list menu__list">
<? foreach($arResult as $arItem): ?>
<li class="menu__item"><a class="link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
<?endforeach?>
				</ul>
			</nav>
<?endif?>