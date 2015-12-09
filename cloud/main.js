
// Use Parse.Cloud.define to define as many cloud functions as you want.
// For example:
Parse.Cloud.define("send", function(request, response) {
	Parse.Push.send({
  where: new Parse.Query(Parse.Installation),
  data: {
    alert: request.params.message,
    badge: "Increment"
  }
}, {
  success: function() {
    response.success("success");
  },
  error: function(error) {
    response.success(error);
  }
});
  
});
