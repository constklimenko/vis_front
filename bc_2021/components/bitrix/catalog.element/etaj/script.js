$(document).ready(function()
{
	$('body').on('click','.doc-link',function()
	{
		var id=$(this).data('id');
		var element_id=$(this).data('element');
		 $.ajax({
		   type: "GET",
		   url: "/pdf/generate.php",
			 data: {ID:id,element:element_id},
		   success: function(msg){
			   if(msg!='')alert(msg);
		   }
		 });
	});
})