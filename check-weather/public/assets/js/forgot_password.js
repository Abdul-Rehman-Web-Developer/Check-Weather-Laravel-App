$(document).ready(function(){
	
	// user account recovery
	$('#account_recovery_form').parsley().on('form:submit', function (formInstance) {
			var form=$('#account_recovery_form')
		    var url=form.attr('action');
            var formData=form.serialize(); 

            $.ajax({
                    url: url,
                    type: "post",                            
                    data: formData,                            
                    beforeSend:function(){

                      form.find('input,button').blur()
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
                    	swal({
		                        title: "Success",
		                        text: data['message'],
		                        type: "success",
		                      	html:true,
		                  	})                     		
                  
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