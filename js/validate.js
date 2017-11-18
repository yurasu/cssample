function validate(id, age, sex, married, housing, roof) {
	var error = [];
	if(isNaN(age) || age === ""){
		error['age']='年齢が数値ではありません';
	}
	if(isNaN(sex) || sex === ""){
		error['sex']='性別が正しく送信できていません';
	}
	if(isNaN(married) || married === ""){
		error['married']='既婚者どうかが送信できていません';
	}
	if(isNaN(housing) || housing === ""){
		error['housing']='housingが送信できていません';
	}
	if(isNaN(roof) || roof === ""){
		error['roof']='roofが正しく送信できていません';
	}
	return error;
}

function message(error){
	for(key in error){
		var str = "#message_"+key;
		$(str).html(error[key]);
	}
}

function load_input(id, age, sex, married, housing, roof){
	$("#myform [name=id]").val(id);
	$("#myform [name=age]").val(age);
	$('[name="sex"]').filter(function(){return ($(this).val() == sex)}).attr('checked',true);
	$('[name="married"]').filter(function(){return ($(this).val() == married)}).attr('checked',true);
	$('[name="housing"]').filter(function(){return ($(this).val() == housing)}).attr('checked',true);
	$('[name="roof"]').filter(function(){return ($(this).val() == roof)}).attr('checked',true);
}


$(function() {
	var id = localStorage.getItem('id');
	var age = localStorage.getItem('age');
	var sex = localStorage.getItem('sex');
	var married = localStorage.getItem('married');
	var housing = localStorage.getItem('housing');
	var roof = localStorage.getItem('roof');
	load_input(id, age, sex, married, housing, roof);
	$("#myform").on('submit',function() {
		var id = $("#myform [name=id]").val();
		var age = $("#myform [name=age]").val();
		var sex = $('[name="sex"]:checked').val();
		var married = $('[name="married"]:checked').val();
		var housing = $('[name="housing"]:checked').val();
		var roof = $('[name="roof"]:checked').val();
		var error = validate(id, age, sex, married, housing, roof);
		if(Object.keys(error).length===0){
			localStorage.setItem('id',id);
			localStorage.setItem('age',age);
			localStorage.setItem('sex',sex);
			localStorage.setItem('married',married);
			localStorage.setItem('housing',housing);
			localStorage.setItem('roof',roof);
			return true;
		}else{
			message(error);
			load_input(id, age, sex, married, housing, roof);
			return false;
		}
	});
});
