<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

    <div class="mui-form">

<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>

<!--<table>-->
<?
if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
{
?>
<!--	<tr>-->
<!--		<td>--><?//
/***********************************************************************************
					form header
***********************************************************************************/



if ($arResult["isFormTitle"])
{
?>
	<h2 class="title mui-form__title"><?=$arResult["FORM_TITLE"]?></h2>
<?
} //endif ;

	if ($arResult["isFormImage"] == "Y")
	{
	?>
	<a href="<?=$arResult["FORM_IMAGE"]["URL"]?>" target="_blank" alt="<?=GetMessage("FORM_ENLARGE")?>"><img src="<?=$arResult["FORM_IMAGE"]["URL"]?>" <?if($arResult["FORM_IMAGE"]["WIDTH"] > 300):?>width="300"<?elseif($arResult["FORM_IMAGE"]["HEIGHT"] > 200):?>height="200"<?else:?><?=$arResult["FORM_IMAGE"]["ATTR"]?><?endif;?> hspace="3" vscape="3" border="0" /></a>
	<?//=$arResult["FORM_IMAGE"]["HTML_CODE"]?>
	<?
	} //endif
	?>
<!--			<p>--><?//=$arResult["FORM_DESCRIPTION"]?><!--</p>-->
<!--		</td>-->
<!--	</tr>-->
	<?
} // endif
	?>
<!--</table>-->
<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>
<!--<table class="form-table data-table">-->
<!--	<thead>-->
<!--		<tr>-->
<!--			<th colspan="2">&nbsp;</th>-->
<!--		</tr>-->
<!--	</thead>-->
<!--	<tbody>-->
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
	?>

				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
				<?endif;?>

				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
        <div class="mui-textfield mui-textfield--float-label">


			<?=$arQuestion["HTML_CODE"]?>


            <label><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></label>
        </div>
	<?
	} //endwhile
	?>
<?
if($arResult["isUseCaptcha"] == "Y")
{
?>

			<b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b>

		<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />


<?//=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><!----><?//=$arResult["REQUIRED_SIGN"];?>
			<input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
<?
} // isUseCaptcha
?>

				<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" class="btn btn--primary mui-form__btn" name="web_form_submit"  value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
<?//if ($arResult["F_RIGHT"] >= 15):?>
<?//=GetMessage("FORM_APPLY")?>
<?//endif;?>
<?//=GetMessage("FORM_RESET");?>


<?//=$arResult["REQUIRED_SIGN"];?><?//=GetMessage("FORM_REQUIRED_FIELDS")?>

<?//=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>


    </div>
