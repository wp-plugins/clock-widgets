

jQuery(document).ready(function() {



// Create two variable with the names of the months and days in an array



var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 



var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]



// Create a newDate() object



// Extract the current date from Date object



// Output the day, date, month and year   



setInterval( function() {







	var newDate = new Date();







	newDate.setDate(newDate.getDate());







	jQuery('#Date').html(dayNames[newDate.getDay()] + ", " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear() + " | ");







	},1000);















setInterval( function() {







	// Create a newDate() object and extract the seconds of the current time on the visitor's







	var seconds = new Date().getSeconds();







	// Add a leading zero to seconds value







	jQuery("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);







	},1000);







	







setInterval( function() {







	// Create a newDate() object and extract the minutes of the current time on the visitor's







	var minutes = new Date().getMinutes();







	// Add a leading zero to the minutes value







	jQuery("#min").html(( minutes < 10 ? "0" : "" ) + minutes);







    },1000);







	







setInterval( function() {







	// Create a newDate() object and extract the hours of the current time on the visitor's







	var hours = new Date().getHours();







	if(hours > 11){







		jQuery("#am").html(' PM');







   







	} else {







		jQuery("#am").html(' AM');







   	







	}







	// Add a leading zero to the hours value







	jQuery("#hours").html(( hours < 10 ? "0" : "" ) + hours);







    }, 1000);	







});





