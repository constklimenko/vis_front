<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

$propCodes = ['PLAN', 'KORPUS'];

$itemData = [];
foreach($propCodes as $propCode) {
    $itemData[$propCode] = [
        'IBLOCK_ID' => null,
        'ITEMS' => [],
    ];
}
//collect prop values
foreach ($arResult['ITEMS'] as $k => $arItem) {
    foreach ($propCodes as $propCode) {
        if (!empty($arItem['PROPERTIES'][$propCode]['VALUE'])) {
            if (empty($itemData[$propCode]['IBLOCK_ID'])) {
                $itemData[$propCode]['IBLOCK_ID'] = $arItem['PROPERTIES'][$propCode]['LINK_IBLOCK_ID'];
            }
            $itemData[$propCode]['ITEMS'][$arItem['PROPERTIES'][$propCode]['VALUE']] = '';
        }
    }
}

//select prop real values
foreach($propCodes as $propCode) {
    if(!empty($itemData[$propCode]['ITEMS'])) {
        $res = \CIBlockElement::GetList(
            ['SORT' => 'ASC'],
            [
                'ACTIVE' => 'Y', 'IBLOCK_ID' => $itemData[$propCode]['IBLOCK_ID'],
                'ID'     => array_keys($itemData[$propCode]['ITEMS'])
            ],
            false,
            false,
            ['ID', ($propCode === 'PLAN' ? 'PROPERTY_NAME' : 'NAME')]
        );
        while ($row = $res->fetch()) {
            $itemData[$propCode]['ITEMS'][$row['ID']] = $row[$propCode === 'PLAN' ? 'PROPERTY_NAME_VALUE' : 'NAME'];
        }
    }
}
foreach ($arResult['ITEMS'] as $k => $arItem) {
    if(!empty($arItem['PREVIEW_PICTURE']['SRC'])) {
        $arResult['ITEMS'][$k]['PREVIEW_PICTURE']['RESIZED_SRC'] = \CFile::ResizeImageGet(
            $arItem['PREVIEW_PICTURE'],
            ['width' =>90, 'height' =>60],
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT
        )['src'] ?: $arItem['PREVIEW_PICTURE']['SRC'];
    }

    //fill prop values
    foreach ($propCodes as $propCode) {
        if (!empty($arItem['PROPERTIES'][$propCode]['VALUE'])) {
            $arResult['ITEMS'][$k]['PROPERTIES'][$propCode]['VALUE_LINKED'] = $itemData[$propCode]['ITEMS'][$arItem['PROPERTIES'][$propCode]['VALUE']] ?: '';
        }
    }
}