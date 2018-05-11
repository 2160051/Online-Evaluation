function addScale(){
	var label = document.getElementById('labelValue').value;
	var dropdown = parseInt(document.getElementById('dropDown').value);
	var formBuilder = document.getElementById('formBuild');
	var block = '<div id="block"';

	for(var ctr = 1; ctr <= dropdown; ctr++){
		block += '<li> Not Guilty </li>';
		block += '<li><input type="radio" name="guilty" value='+'"'+ctr+'"'+'></li>';		
	}
	formBuilder.append(label+'<br>'+block+'</div>');
}