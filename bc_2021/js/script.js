$(document).ready(function () 
{
	$('body').on('submit','.box-item.request form',function()
	{
		if($(this).find('.input_phone').val()!='')
		{
			 var phone=$(this).find('.input_phone').val();
   			 var re = /^\d[\d\(\)\ -]{4,14}\d$/;
   			 var valid = re.test(phone);
			if(valid){}else{
$('.errortext').html('');
$('.main_error').html('Не верно заполнены следующие поля:<br>» "Контактный телефон"');		return false;}
		}
 var str=$(this).serialize() + "&web_form_submit=Отправить";
		 $.ajax({
		   type: "POST",
		   url: "/ajax/form_coll_my.php",
		   data: str,
		   success: function(msg){
			$('.box-item.request .form-wrapper').html(msg);
		   }
		 });
		return false;
	});
});