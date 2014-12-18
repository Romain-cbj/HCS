function initPlateLayoutTable() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; ++i) {
		for (var j=0; j<rows[i].cells.length; j++) {
			rows[i].cells[j].onclick = cellClicked;
			rows[i].cells[j].wellTagName = '';
			rows[i].cells[j].wellID = rows[i].cells[j].innerHTML;
			rows[i].cells[j].style.border = '1px solid lightgray';
			rows[i].cells[j].cellSelected = false;
                        
		}
	}
}

function cellClicked (){
		
	this.style.border = '1px solid lightgray';
}


Behaviour.addLoadEvent(initPlateLayoutTable);


    