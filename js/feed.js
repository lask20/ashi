

function feed() {
$.get( "feed.php", function( data ) {
  $( "#feed" ).html( data );
});
}

function reloadfeed() {
	setInterval(feed(), 5000);
}

reloadfeed();