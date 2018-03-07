function mood(){
	   var btn = document.getElementById('atmo');
	   var bodyset = document.querySelector('body');
	   var box = document.getElementsByClassName('border');
	   if(btn.value === 'change'){
		   btn.value = 'return';
		   btn.style.backgroundColor = '#555';
		   bodyset.style.backgroundColor = '#F6B352';
		   bodyset.style.color = '#E53A40';

		   for(var i=0; i<box.length; i++){
			   box[i].style.borderColor = '#cb7575';
			   box[i].style.borderWidth = '2px';
		   }
	   }else{
		   btn.value = 'change';
		   btn.style.backgroundColor ='#F17F42';
		   bodyset.style.backgroundColor = '#fff';
		   bodyset.style.color = '#000';

		   var i=0;
		   while(i< box.length){
			   box[i].style.borderColor = '#aaa';
			   box[i].style.borderWidth = '1px';
			   i++
		   }
	   }
   }

/*
function modify(){
	var mainnode = document.querySelector('main');
	var tablenode = document.querySelector('table');

	mainnode.removeChild(tablenode);

	var formNode = document.createElement('form');
	formNode.setAttribute('action', 'process_update_poet.php?id='.$table['id'].'');
	formNode.setAttribute('method', 'POST');

	var pNode1 = document.createElement('p');
	var nameNode = document.createElement('input');
	nameNode.setAttribute('type', 'text');
	nameNode.setAttribute('name', 'new_name');
	nameNode.setAttribute('placeholder', $table['name']);
	pNode1.appendChild(nameNode);
	formNode.appendChild(pNode1);
	
	var pNode2 = document.createElement('p');
	var infNode = document.createElement('input');
	infNode.setAttribute('type', 'text');
	infNode.setAttribute('name', 'new_b_d');
	infNode.setAttribute('placeholder', $table['b_d']);
	pNode2.appendChild(infNode);
	formNode.appendChild(pNode2);
	
	
	var submitNode = document.createElement('button');
	submitNode.setAttribute('type', 'submit');
	submitNode.setAttribute('id', 'updatebtn');
	formNode.appendChild(submitNode);
}
*/
