<?php
$ids = [];
foreach ($arResult['ITEMS'] as $arItem) {
    $ids[] = $arItem['ID'];
}

if (count($ids) > 0) {
    $arResult['COMENTS'] = [];
    $ob_element = CIBlockElement::GetList(['SORT' => 'ASC'], ['PROPERTY_SLIDER_COMENT' => $ids], false, false, []);
    while ($ob = $ob_element->GetNextElement()) {
        $arFields = $ob->GetFields();
        $sliderComments = $ob->GetProperty('SLIDER_COMENT')['VALUE'] ?? [];
        $commentData = ['NAME' => $arFields['NAME'], 'PICTURE' => CFile::GetPath($arFields['PREVIEW_PICTURE'])];
        foreach ($sliderComments as $val) {
            $arResult['COMENTS'][$val] = $commentData;
        }
    }
}