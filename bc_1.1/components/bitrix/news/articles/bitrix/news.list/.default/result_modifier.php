<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$arResult['TYPEG_ITEMS'] = [];
$res = CIBlockPropertyEnum::GetList(['ID' => 'ASC'], ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'CODE' => 'typeg']);
$sessionArticleValue = $_SESSION['articlefilter'] ?? null;

while ($row = $res->Fetch()) {
    $arResult['TYPEG_ITEMS'][$row['ID']] = [
        'ID'        => $row['ID'],
        'XML_ID'    => $row['XML_ID'],
        'VALUE'     => $row['VALUE'],
        'IS_ACTIVE' => $sessionArticleValue == $row['XML_ID'],
    ];
}

$arFilter = ['IBLOCK_ID' => $arParams['IBLOCK_ID']];
if (!empty($sessionArticleValue) && $sessionArticleValue != 'v') {
    $searchValue = null;
    foreach ($arResult['TYPEG_ITEMS'] as $item) {
        if ($item['XML_ID'] === $sessionArticleValue) {
            $searchValue = $item['VALUE'];
            break;
        }
    }
    if (!empty($searchValue)) {
        $arFilter['PROPERTY_typeg_VALUE'] = $searchValue;
    }
}

$arResult['GALLERY_IMAGES'] = [];
$res = CIBlockElement::GetList(['id' => 'desc'], $arFilter, false, false, ['PROPERTY_typeg', 'PREVIEW_PICTURE']);
while ($row = $res->Fetch()) {
    $data = $arResult['TYPEG_ITEMS'][$row['PROPERTY_TYPEG_ENUM_ID']] ?? [];
    $arResult['GALLERY_IMAGES'][$row['PREVIEW_PICTURE']] = [
        'XML_ID' => $data['XML_ID'] ?? [],
        'VALUE'  => $data['VALUE'] ?? [],
        'SRC'    => '',
    ];
}

$prefixDirectory = '/'.\Bitrix\Main\Config\Option::get('main', 'upload_dir', 'upload').'/';

$files = [];
$res = \Bitrix\Main\FileTable::getList([
    'filter' => ['ID' => array_keys($arResult['GALLERY_IMAGES'])],
    'select' => ['ID', 'SUBDIR', 'FILE_NAME', 'FILE_SIZE', 'CONTENT_TYPE'],
]);
while ($row = $res->fetch()) {
    $arResult['GALLERY_IMAGES'][$row['ID']]['SRC'] = $prefixDirectory.$row['SUBDIR'].'/'.$row['FILE_NAME'];
}