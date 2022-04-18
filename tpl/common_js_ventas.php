	<link rel="stylesheet" href="css/cmxform.css">
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.hotkeys-0.7.9.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
  <script>
	$(document).ready(function() {
		
		$('#popup_ok').click(function() {
            // Recargo la página
            //location.reload();
			window.location = "add_sales.php";
			//window.opener.document.location.reload();
        });
			// SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 
			//jQuery(document).bind('keydown', 'Ctrl+s',function() 
			//location.reload();
			
			//{
			//  $('#form1').submit();
			  //location.reload();
			  //return false;
				//});
			//$.validationEngine.loadValidation("#date")
			//alert($("#formID").validationEngine({returnIsValid:true}))
			//$.validationEngine.buildPrompt("#date","This is an example","error")	 		 // Exterior prompt build example								 // input prompt close example
			//$.validationEngine.closePrompt(".formError",true) 							// CLOSE ALL OPEN PROMPTS
		});
	</script>
