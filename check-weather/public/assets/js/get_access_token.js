$(document).ready(function(){
	
	// user account registration
	$('#get_access_token_form').parsley().on('form:submit', function (formInstance) {
            $('.access_token_alert').addClass('d-none').html('')    
			var form=$('#get_access_token_form')
		    var url=form.attr('action');
            var formData=form.serialize(); 

            $.ajax({
                    url: url,
                    type: "post",                            
                    data: formData,                            
                    beforeSend:function(){


                      form.find('input').blur()
                      // show processing spinner
                      form.LoadingOverlay("show")
                    },
		            statusCode: {
					   
					    409: function (data) {
					        swal({
		                        title: "Caution",
		                        text: data.responseText,
		                        type: "error",
		                      	html:true,
		                  	}) 
					    }
					},
                    success: function(data) {
                        
                        form.trigger("reset");
                    	                    		
						$('.access_token_alert').removeClass('d-none').html(data['message'])              
                          
                        // hide processing spinner
                        form.LoadingOverlay("hide",true)                       
                        
                    },
                    error: function(){
                    	swal({
	                        title: "Caution",
	                        text: "Failed sending data to server, please try again.",
	                        type: "error",
	                      	html:true,
		                }) 
                      
                      // hide processing spinner
                        form.LoadingOverlay("hide",true)
                    }
                   
            })   

	    // prevent form submit
		return false;
	});
})