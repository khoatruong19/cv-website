<!DOCTYPE html>
<html>
<body>

<h1>Display a Month Input Control</h1>

<p>If the browser supports it, a date picker pops up when entering the input field.</p>

<form action="" name="hehe" onSubmit="return forminput()">
  <label for="bdaymonth">Birthday (month and year):</label>
  <input type="month" id="bdaymonth" name="bdaymonth">
  <input type="submit">
</form>

<p><strong>Note:</strong> type="month" is not supported in Firefox, Safari or Internet Explorer 11 and earlier versions.</p>
<div id="abc">
</div>
<script>
function forminput(){
	var monthInput = document.getElementById("bdaymonth");
	var monthValue = monthInput.value;
	document.getElementById("abc").innerHTML += monthValue;
	return false;
}
</script>
</body>
</html>
