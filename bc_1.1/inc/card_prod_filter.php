		<div class="gallery-controls_wrapper rent">
			<div class="content">
				<a href="" class="back-link parameters-link"><i class="icon-menu61"></i><span>Подбор по параметрам</span></a>
				<div class="number-offers">Найдено 5 предложений</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="selection-parameters">
			<div class="content">
				<div class="controls-box" style="height: 731.158px; min-height: 523px;">
				<?$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "podbor", Array(
					"COMPONENT_TEMPLATE" => ".default",
						"IBLOCK_TYPE" => "bc",	// Тип инфоблока
						"IBLOCK_ID" => "6",	// Инфоблок
						"SECTION_ID" => "",	// ID раздела инфоблока
						"SECTION_CODE" => "",	// Код раздела
						"FILTER_NAME" => "arrFilter",	// Имя выходящего массива для фильтрации
						"TEMPLATE_THEME" => "blue",	// Цветовая тема
						"FILTER_VIEW_MODE" => "vertical",	// Вид отображения
						"POPUP_POSITION" => "left",	// Позиция для отображения всплывающего блока с информацией о фильтрации
						"DISPLAY_ELEMENT_COUNT" => "Y",	// Показывать количество
						"SEF_MODE" => "N",	// Включить поддержку ЧПУ
						"CACHE_TYPE" => "A",	// Тип кеширования
						"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
						"CACHE_GROUPS" => "Y",	// Учитывать права доступа
						"SAVE_IN_SESSION" => "N",	// Сохранять установки фильтра в сессии пользователя
						"INSTANT_RELOAD" => "N",	// Мгновенная фильтрация при включенном AJAX
						"PAGER_PARAMS_NAME" => "arrPager",	// Имя массива с переменными для построения ссылок в постраничной навигации
						"XML_EXPORT" => "N",	// Включить поддержку Яндекс Островов
						"SECTION_TITLE" => "-",	// Заголовок
						"SECTION_DESCRIPTION" => "-",	// Описание
					),
					false
												);?></div>
				</div>
				<div class="resultat-selection">
					<ul class="resultat-list">
						<li class="resultat-item">
							<div class="wrapper">
								<ol class="office-inform_list">
									<li><b>Фото</b></li>
									<li><b>Корпус</b></li>
									<li><b>Номер</b></li>
									<li><b>Площадь, м2</b></li>
									<li><b>Аренда м2 в год, руб.</b></li>
									<li><b>Аренда в месяц, руб.</b></li>
								</ol>
							</div>
						</li>
						<li class="resultat-item">
							<div class="wrapper">
								<ol class="office-inform_list">
									<li> <a href="img/rent.jpg" class="fancy"><img src="img/rent.jpg" alt=""></a> </li>
									<li>1</li>
									<li>201</li>
									<li>155</li>
									<li>70 000 Р</li>
									<li>20 000 Р</li>
								</ol>
								<div class="button-wrapper"><a href="">Смотреть офис</a></div>
							</div>
						</li>
						<li class="resultat-item">
							<div class="wrapper">
								<ol class="office-inform_list">
									<li> <a href="img/rent.jpg" class="fancy"><img src="img/rent.jpg" alt=""></a> </li>
									<li>1</li>
									<li>201</li>
									<li>155</li>
									<li>70 000 Р</li>
									<li>20 000 Р</li>
								</ol>
								<div class="button-wrapper"><a href="">Смотреть офис</a></div>
							</div>
						</li>
						<li class="resultat-item">
							<div class="wrapper">
								<ol class="office-inform_list">
									<li> <a href="img/rent.jpg" class="fancy"><img src="img/rent.jpg" alt=""></a> </li>
									<li>1</li>
									<li>201</li>
									<li>155</li>
									<li>70 000 Р</li>
									<li>20 000 Р</li>
								</ol>
								<div class="button-wrapper"><a href="">Смотреть офис</a></div>
							</div>
						</li>
						<li class="resultat-item">
							<div class="wrapper">
								<ol class="office-inform_list">
									<li> <a href="img/rent.jpg" class="fancy"><img src="img/rent.jpg" alt=""></a> </li>
									<li>1</li>
									<li>201</li>
									<li>155</li>
									<li>70 000 Р</li>
									<li>20 000 Р</li>
								</ol>
								<div class="button-wrapper"><a href="">Смотреть офис</a></div>
							</div>
						</li>
					</ul>
					
				</div>
				<div class="clear"></div>
			</div>
		</div>

