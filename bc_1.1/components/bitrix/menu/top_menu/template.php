<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="header-menu">
				<ul class="header-menu_list">
<? foreach($arResult as $arItem): ?>
<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
<?endforeach?>
				</ul>
			</nav>
<?endif?>