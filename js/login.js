
    $('form').submit(false);
 
    // Replace this line with the one on your Quickstart Guide Page
    Parse.initialize("OYTjbUEX5yKjVbLBddXh0sOiaEHUDnE0MQ3aoWIX", "lMr8M7xzEpJvkmDXvA5PmXk89848i228cy7pE8Ko");

    var currentUser = Parse.User.current().getUsername();
    console.log(currentUser);

    function sub(e) {
	
    // Prevent Default Submit Event
    
 
    // Get data from the form and put them into variables
    var data = $(this).serializeArray(),
        username = $("#username").val(),
        password = $("#password").val();
        
 
    // Call Parse Login function with those variables
    Parse.User.logIn(username, password, {
        // If the username and password matches
        success: function(user) {
             
            Parse.initialize("username");
            var currentUser = Parse.User.current().getUsername();
             var test = JSON.stringify(currentUser);

            var userinfo = eval ("(" + test + ")");
            alert('Welcome!'+test); 
            window.location.href="adminb.html"  
        },
        // If there is an error
        error: function(user, error) {
        	alert('error!');
            console.log(error);
        }
    });
};
 

