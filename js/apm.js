

function set_all(id1, id2, id3) {
	var obj = 'document.getElementById(id1)';
	var object = eval(obj);
	id2 = base64_decode(id2);
	
	if( object && object.type == 'radio') {
		var r_object = 'document.' + id3 + '.' + id1 + '';
		var rr_object = eval( r_object );			
			for(i=0; i<rr_object.length; i++) { 
				if( rr_object[i] && rr_object[i].value == id2 ) { rr_object[i].checked = true; }}		
	}
		
	else if( object && object.type == 'checkbox') {
		var c_object = 'document.' + id3 + '.' + id1 + '';
		var cc_object = eval( c_object );
		if( cc_object && cc_object.value == id2 ) { cc_object.checked = true; }					
	}
					
		else { object.value = id2; }	
	
}


/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////

// claude charest
// développeur / programmeur internet (depuis 1993)
// formateur TI web-développement (depuis 2002)
// 450-651-6521
// http://www.atelierphpmysql.com

