var regex = {
	'email':/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
	'phone':/^(\+\d{1,3}[- ]?)?\d{10}$/,
	'name':/^[a-zA-Z ]+$/,
	'nic':/^[0-9]{9,}[vV]/
};

//@parm element => id of input
//@param label => input error label
//@param rules => matching regex patern
function validateInput(element , label , rules){
	var value = $('#'+element).val();
	if(label == '' || label == null){
		label = 'This Field';
	}
	try{
		if(rules[0].required && value == ''){
			$('#'+element+'_error').html(label+' Is Required..!');
			return false;
		}

		if(rules[0].minlength && rules[0].minlength > value.length){
			$('#'+element+'_error').html('Minimum Length Is '+rules[0].minlength);
			return false;
		}

		if(rules[0].maxlength && rules[0].maxlength < value.length){
			$('#'+element+'_error').html('Maximum Length Is '+rules[0].maxlength);
			return false;
		}

		if(rules[0].patern && !rules[0].patern.test(value) && value!=''){
			$('#'+element+'_error').html(label+' Is Not Valid Format..!');
			return false;
		}

		$('#'+element+'_error').html('');
		return true;

	}catch(e){
		return false;
	}
}
