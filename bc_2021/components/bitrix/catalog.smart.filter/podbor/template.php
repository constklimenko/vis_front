<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<div class="controls-content">
	<form id="filter_form" action="/podbor/">
	<?$show_script=array();foreach ($arResult['ITEMS'] as $item){?>
	<?if($item['CODE']=='KORPUS'||$item['CODE']=='TYPE_APARTMENT'){
		if($item['CODE']=='KORPUS'){$show_script[]='KORPUS';}
		if($item['CODE']=='TYPE_APARTMENT'){$show_script[]='TYPE_APARTMENT';}?>
			<div class="paramete-box">
				<div class="title"><?=$item['NAME']?></div>
				<div class="housing-line">
					<?foreach ($item['VALUES'] as $key=>$val){$val['VALUE']=str_replace ('Корпус ','',$val['VALUE']);?>
					<label><input type="checkbox" name="<?=$item['CODE']?>[]" value="<?=$key?>" checked><?=$val['VALUE']?></label>
					<?}?>
					<div style="clear:both;"></div>
				</div>
			</div>
		<?}elseif($item['CODE']=='PLOSH'){$show_script[]='PLOSH';?>
			<div class="paramete-box">
				<div class="title"><?=$item['NAME']?></div>
				<div class="range-box">
					<!-- выбор диапазона для настольных устройств -->
					<div class="sliderCont">
						<div id="area" class="slider-range"></div>
					</div>
					<div class="formPrice">
						<?$first=array_shift($item['VALUES']);
						$max_ploh=$min_ploh=floatval ($first['VALUE']);
						foreach ($item['VALUES'] as $val)
						{
							$val['VALUE']=floatval ($val['VALUE']);
							if($min_ploh>$val['VALUE']){$min_ploh=$val['VALUE'];}
							if($max_ploh<$val['VALUE']){$max_ploh=$val['VALUE'];}
						}?>
						<label class="range-label">
							<input type="text" class="sliderValue minPrice" name="<?=$item['CODE']?>[]" data-index="0" value="<?=$min_ploh?>"/>
						</label>
						<label class="range-label">
							<input type="text" class="sliderValue maxPrice" name="<?=$item['CODE']?>[]" data-index="1" value="<?=$max_ploh?>"/>
						</label>
					</div>
					<!-- выбор диапазона для настольных устройств -->
				</div>
			</div>
	<?}elseif($item['CODE']=='ORENDA_FOR_MANS'){$show_script[]='ORENDA_FOR_MANS';?>
			<div class="paramete-box">
				<div class="title"><?=$item['NAME']?></div>
				<div class="range-box">
					<!-- выбор диапазона для настольных устройств -->
					<div class="sliderCont">
						<div id="monthly-cost" class="slider-range"></div>
					</div>
					<div class="formPrice">
						<?$first=array_shift($item['VALUES']);
						$max_MANS=$min_MANS=floatval ($first['VALUE']);
						foreach ($item['VALUES'] as $val)
						{
							$val['VALUE']=floatval ($val['VALUE']);
							if($min_MANS>$val['VALUE']){$min_MANS=$val['VALUE'];}
							if($max_MANS<$val['VALUE']){$max_MANS=$val['VALUE'];}
						}?>
						<label class="range-label"><input type="text" class="sliderValue minPrice-2" name="<?=$item['CODE']?>[]" data-index="0" value="<?=$min_MANS?>"/></label>
						<label class="range-label"><input type="text" class="sliderValue maxPrice-2" name="<?=$item['CODE']?>[]" data-index="1" value="<?=$max_MANS?>"/></label>
					</div>
					<!-- выбор диапазона для настольных устройств -->
				</div>
			</div>
		<?}elseif($item['CODE']=='ORENDA_M_KV_GOD'){$show_script[]='ORENDA_M_KV_GOD';?>
			<div class="paramete-box">
				<div class="title"><?=$item['NAME']?></div>
				<div class="range-box">
					<!-- выбор диапазона для настольных устройств -->
					<div class="sliderCont">
						<div id="annual-cost" class="slider-range"></div>
					</div>
					<div class="formPrice">
						<?$first=array_shift($item['VALUES']);
						$max_GOD=$min_GOD=floatval ($first['VALUE']);
						foreach ($item['VALUES'] as $val)
						{
							$val['VALUE']=floatval ($val['VALUE']);
							if($min_GOD>$val['VALUE']){$min_GOD=$val['VALUE'];}
							if($max_GOD<$val['VALUE']){$max_GOD=$val['VALUE'];}
						}?>
						<label class="range-label"><input type="text" class="sliderValue minPrice-3" name="<?=$item['CODE']?>[]" data-index="0" value="<?=$min_GOD?>"/></label>
						<label class="range-label"><input type="text" class="sliderValue maxPrice-3" name="<?=$item['CODE']?>[]" data-index="1" value="<?=$max_GOD?>"/></label>
					</div>
					<!-- выбор диапазона для настольных устройств -->
				</div>
			</div>
		<?}?>
	<?}?>
	</form>
	<?/*<a href="/podbor/" class="podbor_link">подбор по фильтру</a>*/?>
</div>
<script>

$(document).ready(function()
{
	function set_ofises()
	{
		var str=$('#filter_form').serialize();
		 $.ajax({
		   type: "POST",
			 url: "/ajax/set_by_filter.php",
		   data: str,
		   success: function(msg)
			{
				$('.resultat-list li').each(function()
				{
					if($(this).hasClass('be_set')){$(this).remove();}
				})
				$('.resultat-list').html($('.resultat-list').html()+msg);
				var find=0;
				$('.resultat-list li.be_set').each (function(){find++;});
				$('.number-offers span').html(find);
		   }
		 });
	}




	$('.housing-line').change('input',function(){set_ofises()});


	<?if(in_array('PLOSH',$show_script)){?>

	//$.noConflict();
var min=<?=$min_ploh?>;
var max=<?=$max_ploh?>;

		$("#area").slider({
			min: min,
			max: max,
			values: [min,max],
			range: true,
			stop: function(event, ui) {
				$("input.minPrice").val($("#area").slider("values",0));

				$("input.maxPrice").val($("#area").slider("values",1)).change();
				set_ofises();
				
			},
			slide: function(event, ui){
				$("input.minPrice").val($("#area").slider("values",0)).change();
				$("input.maxPrice").val($("#area").slider("values",1)).change();
			}
		});
		
		$("input.minPrice").change(function(){
		
			var value1=$("input.minPrice").val();
			var value2=$("input.maxPrice").val();
		
			if(parseInt(value1) > parseInt(value2)){
				value1 = value2;
				$("input.minPrice").val(value1);
			}
			$("#area").slider("values",0,value1);	
		});
		
		$("input.maxPrice").change(function(){
				
			var value1=$("input.minPrice").val();
			var value2=$("input.maxPrice").val();
			
			if (value2 > max) { value2 = max; $("input.maxPrice").val(max)}
		
			if(parseInt(value1) > parseInt(value2)){
				value2 = value1;
				$("input.maxPrice").val(value2);
			}
			$("#area").slider("values",1,value2);
		});

	<?}?>
	<?if(in_array('ORENDA_FOR_MANS',$show_script)){?>
var min=<?=$min_MANS?>;
var max=<?=$max_MANS?>;
		$("#monthly-cost").slider({
			min: min,
			max: max,
			values: [min,max],
			range: true,
			stop: function(event, ui) {
				$("input.minPrice-2").val($("#monthly-cost").slider("values",0));
				$("input.maxPrice-2").val($("#monthly-cost").slider("values",1));
				set_ofises();
				
			},
			slide: function(event, ui){
				$("input.minPrice-2").val($("#monthly-cost").slider("values",0));
				$("input.maxPrice-2").val($("#monthly-cost").slider("values",1));
			}
		});
		
		$("input.minPrice-2").change(function(){
		
			var value1=$("input.minPrice-2").val();
			var value2=$("input.maxPrice-2").val();
		
			if(parseInt(value1) > parseInt(value2)){
				value1 = value2;
				$("input.minPrice-2").val(value1);
			}
			$("#monthly-cost").slider("values",0,value1);	
		});
		
		$("input.maxPrice-2").change(function(){
				
			var value1=$("input.minPrice-2").val();
			var value2=$("input.maxPrice-2").val();

			if (value2 > max) { value2 = max; $("input.maxPrice-2").val(max)}
		
			if(parseInt(value1) > parseInt(value2)){
				value2 = value1;
				$("input.maxPrice-2").val(value2);
			}
			$("#monthly-cost").slider("values",1,value2);
		});
	<?}?>
	<?if(in_array('ORENDA_M_KV_GOD',$show_script)){?>
var min=<?=$min_GOD?>;
var max=<?=$max_GOD?>;
		$("#annual-cost").slider({
			min: min,
			max: max,
			values: [min,max],
			range: true,
			stop: function(event, ui) {
				$("input.minPrice-3").val($("#annual-cost").slider("values",0));
				$("input.maxPrice-3").val($("#annual-cost").slider("values",1));
								set_ofises();
			},
			slide: function(event, ui){
				$("input.minPrice-3").val($("#annual-cost").slider("values",0));
				$("input.maxPrice-3").val($("#annual-cost").slider("values",1));
			}
		});
		
		$("input.minPrice-3").change(function(){
		
			var value1=$("input.minPrice-3").val();
			var value2=$("input.maxPrice-3").val();
		
			if(parseInt(value1) > parseInt(value2)){
				value1 = value2;
				$("input.minPrice-3").val(value1);
			}
			$("#annual-cost").slider("values",0,value1);	
		});
		
		$("input.maxPrice-3").change(function(){
				
			var value1=$("input.minPrice-3").val();
			var value2=$("input.maxPrice-3").val();
			
			if (value2 > max) { value2 = max; $("input.maxPrice-3").val(max)}
		
			if(parseInt(value1) > parseInt(value2)){
				value2 = value1;
				$("input.maxPrice-2").val(value2);
			}
			$("#annual-cost").slider("values",1,value2);
		});
	<?}?>
})
</script>

