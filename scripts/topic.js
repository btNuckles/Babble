var ID_SELECTOR = 'id';

function consoleLog(someMessage)
{ console.log(someMessage); }

consoleLog("Right before AJAX");
var id = $(document.getElementsByClassName(ID_SELECTOR)).val();

$.ajax(
  {
	url: "php/topic.php",
	type: "GET",
	data: {
		selectedId: id
	},
	success: function(result) {
	  consoleLog("Inside success function.");
	  consoleLog(result);
	  window.location.href = 'topic.html';
	},
	error: function() {
	  consoleLog("Did not execute php scripts");
	}
  }
)
