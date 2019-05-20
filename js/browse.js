function getDepartments(num) {
	var container = document.getElementById("results");

	jQuery.ajax({
		type: "POST",
		url: "get_departments.php",
		dataType: "json",
		data: {"id": num},


		success: function(obj, textstatus) {
			console.log(obj);
			container.innerHTML = obj.result;
		}
	});
}

function getSemesters(num) {
	var container = document.getElementById("results");

	jQuery.ajax({
		type: "POST",
		url: "get_semesters.php",
		dataType: "json",
		data: {"id": num},


		success: function(obj, textstatus) {
			console.log(obj);
			container.innerHTML = obj.result;
		}
	});
}

function getCourses(dep, sem) {
	var container = document.getElementById("results");

	jQuery.ajax({
		type: "POST",
		url: "get_courses.php",
		dataType: "json",
		data: {"dep": dep, "sem": sem},


		success: function(obj, textstatus) {
			console.log(obj);
			container.innerHTML = obj.result;
		}
	});
}

function getBooks(num, dep, sem) {
	var container = document.getElementById("results");

	jQuery.ajax({
		type: "POST",
		url: "get_books.php",
		dataType: "json",
		data: {"id": num, "dep": dep, "sem": sem},


		success: function(obj, textstatus) {
			console.log(obj);
			container.innerHTML = obj.result;
		}
	});
}

function getRadioCheckedValue(radio_name)
{
   var oRadio = document.forms[0].elements[radio_name];
 
   for(var i = 0; i < oRadio.length; i++)
   {
      if(oRadio[i].checked)
      {
         return oRadio[i].value;
      }
   }
 
   return '';
}


function set_vars(sem) {
	var isbn = $('input:radio[name=isbn]:checked').val();
	jQuery.ajax({
		type: "POST",
		url: "set_vars.php",
		dataType: "json",
		data: {"sem": sem, "isbn": isbn},
		// success: function(obj, textstatus) {
		// 	console.log(obj);
		// 	container.innerHTML = obj.result;
		// }
	});
}

	// $('#appBtn').click(function(){
	// 	var isbn = $('input:radio[name=isbn]:checked').val();
	// 	document.alert(i);
	// 	$.ajax({
	// 		url:"set_vars.php",
	// 		method:"POST",
	// 		data: {"sem": sem, "isbn": isbn}
	// 	});
	// });


function apply() {

	jQuery.ajax({
		type: "POST",
		url: "aply.php",
		dataType: "json",
		data: {},
	});
}