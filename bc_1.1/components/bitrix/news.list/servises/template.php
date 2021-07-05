<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

$strEditLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$strDeleteLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$confirmDelete = array('CONFIRM' => \GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'));

?>

<div class="elem_tabs-content <? if ($arParams["HIDE_ON_DESKTOP"]=="Y"): ?> m-show <?endif;?>    ">
    <?foreach ($arResult['ITEMS'] as $item){
   $this->AddEditAction($item['ID'], $item['EDIT_LINK'], $strEditLink);
    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], $strDeleteLink, $confirmDelete);
    ?>

        <a class="elem_tabs-card">
        <div class="card-img">
            <? if (!empty($item["PROPERTIES"]["ICON"]["VALUE"])): ?>
                <?$img_url =CFile::GetPath($item["PROPERTIES"]["ICON"]["VALUE"]);
                  ?>

                <div class="bucket"
                     style="mask-image: url('<?= $img_url; ?>'); -webkit-mask-image: url('<?= $img_url; ?>');"></div>
            <? else: ?>

            <? endif; ?>
        </div>
        <div class="card-text"><?= $item['PREVIEW_TEXT']; ?></div>
    </a>

    <? }?>
</div>


