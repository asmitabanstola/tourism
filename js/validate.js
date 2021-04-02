function validate(){
	var date = document.form.date.value.trim();
	var date1 = date.split("/").reverse();
	var date2 =new Date().toISOString().substring(0, 10);
	 if(date1<date2){
	document.getElementById('date_error').innerHTML='Date Error';
	return false;
	}


}