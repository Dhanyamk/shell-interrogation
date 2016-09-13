<html>
 <head>
 <title>Countdown Timer</title>

 <style>
 body {
 font-family: tahoma;
 }

 #countdown_div {
 font-weight: bold;
 font-size: 56px;
 }

 #body_wrapper {
 padding: 10px;
 margin: 20px;
 }
 </style>

 <script>
 function do_countdown() {
 var start_num = document.getElementById("value").value;
 var unit_var = document.getElementById("countdown_unit").value;

 start_num = start_num * parseInt(unit_var);

 var countdown_output = document.getElementById('countdown_div');

 if (start_num > 0) {
 countdown_output.innerHTML = format_as_time(start_num);
 var t=setTimeout("update_clock(\"countdown_div\", "+start_num+")", 1000);
 }

 return false;
 }

 function update_clock(countdown_div, new_value) {
 var countdown_output = document.getElementById(countdown_div);
 var new_value = new_value - 1;

 if (new_value > 0) {
 new_formatted_value = format_as_time(new_value);
 countdown_output.innerHTML = new_formatted_value;

 var t=setTimeout("update_clock(\"countdown_div\", "+new_value+")", 1000);
 } else {
 countdown_output.innerHTML = "And... Stop!";
 }
 }

 function format_as_time(seconds) {
 var minutes = parseInt(seconds/60);
 var seconds = seconds - (minutes*60);

 if (minutes < 10) {
 minutes = "0"+minutes;
 }

 if (seconds < 10) {
 seconds = "0"+seconds;
 }

 var return_var = minutes+':'+seconds;

 return return_var;
 }
 </script>
 </head>

 <body>
 <div id="body_wrapper">
 <form id="countdown_form" onsubmit="return do_countdown();">
 Countdown from: <input style="width: 50px;" id="value" />
 <select id="countdown_unit">
 <option value="1">Seconds</option>
 <option value="60">Minutes</option>
 <option value="3600">Hours</option>
 </select>
 <input type="submit" value="Go" />
 </form>
 <div id="countdown_div">&nbsp;</div>
 </div>
 </body>

</html>