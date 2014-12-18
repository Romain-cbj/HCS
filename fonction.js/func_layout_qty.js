function initPlateLayoutTable() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; i++) {
		for (var j=0; j<rows[i].cells.length; j++) {
			rows[i].cells[j].onclick = cellClicked;
			rows[i].cells[j].wellConcValue = 0;
			rows[i].cells[j].wellConcUnit = '';
			rows[i].cells[j].style.border = '2px solid lightgray';
			rows[i].cells[j].cellSelected = false;
		}
	}
}

function cellClicked(evt) {
	var event = evt ? evt : window.event;
	if (event.ctrlKey) {// toggle selection for entire row
		var i = this.parentNode.rowIndex;
		var row = document.getElementById('plateLayoutTable').rows[i];
		for (var j=0; j<row.cells.length; j++) {
			row.cells[j].style.border = '2px solid red';
			row.cells[j].cellSelected = true;
		}
	}
	else if (event.shiftKey) {// toggle selection for entire column
		var table = document.getElementById('plateLayoutTable');
		var j = this.cellIndex;
		for (var i=0; i<table.rows.length; i++) {
			table.rows[i].cells[j].style.border = '2px solid red';
			table.rows[i].cells[j].cellSelected = true;
		}
	}
	else {// toggle selection for single cells
		this.cellSelected = !this.cellSelected;
		if (this.cellSelected)
			this.style.border = '2px solid red';
		else
			this.style.border = '2px solid lightgray';
	}
}

function getListBoxValue(id) {
	return document.getElementById(id).value;
}

function tagSelectedWells() {
	var rows = document.getElementById('plateLayoutTable').rows;
	var factor = getListBoxValue('FactorValueBox');
	if (isNaN(factor)) {
		alert('Dilution factor is not a valid number!');
		return;
	}
	var operator = getListBoxValue('OperatorBox');
	var nb_rep = getListBoxValue('NumRepBox');
	if (isNaN(nb_rep)) {
		alert('Number of replicates is not a valid number!');
		return;
	}
	var dil_method = getListBoxValue('MethodBox');
	var start_val = getListBoxValue('ConcValueBox');
	if (isNaN(start_val)) {
		alert('Starting value is not a valid number!');
		return;
	}
	for (var i=0; i<rows.length; i++) {
		for (var j=0; j<rows[i].cells.length; j++) {
			var curr_val = start_val;
			if (rows[i].cells[j].cellSelected) {
				rows[i].cells[j].wellConcValue = curr_val;
				rows[i].cells[j].wellConcUnit = getListBoxValue('ConcUnitBox');
				rows[i].cells[j].innerHTML = rows[i].cells[j].wellConcValue + '<br>' + rows[i].cells[j].wellConcUnit
				if (nb_rep > 1) {
					for (var k=1; k<nb_rep; k++) {
						if (dil_method === 'Across') {
							var curr_row = i;
							var curr_col = j + k;
						}
						else {
							var curr_row = i + k;
							var curr_col = j;
						}
						switch (operator) {
							case '*':
								curr_val = curr_val * factor;
								break;
							case '/':
								curr_val = curr_val / factor;
								break;
							case '*10^x':
								curr_val = curr_val * Math.pow(10, factor);
								break;
							case '*10^-x':
								curr_val = curr_val * Math.pow(10, -factor);
								break;
							case 'Copy':
								curr_val = curr_val;
								break;
						}
						curr_val_str = curr_val.toString();
						if (curr_val_str.length > 4) {curr_val = curr_val.toExponential(3);}
						rows[curr_row].cells[curr_col].wellConcValue = curr_val;
						rows[curr_row].cells[curr_col].wellConcUnit = getListBoxValue('ConcUnitBox');
						rows[curr_row].cells[curr_col].innerHTML = rows[curr_row].cells[curr_col].wellConcValue + '<br>' + rows[curr_row].cells[curr_col].wellConcUnit
					}
				}
				rows[i].cells[j].style.border = '2px solid lightgray';
				rows[i].cells[j].cellSelected = false;
			}
		}
	}
	saveTags();
	updateColors();
}

function untagSelectedWells() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; i++) {
		for (var j=0; j<rows[i].cells.length; j++) {
			if (rows[i].cells[j].cellSelected) {
				rows[i].cells[j].wellConcValue = 0;
				rows[i].cells[j].wellConcUnit = '';
				rows[i].cells[j].innerHTML = '0';
				rows[i].cells[j].style.border = '2px solid lightgray';
				rows[i].cells[j].cellSelected = false;
			}
		}
	}
	saveTags();
	updateColors();
}

function clearAllTags() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; i++) {
		for (var j=0; j<rows[i].cells.length; j++) {
			rows[i].cells[j].wellConcValue = 0;
			rows[i].cells[j].wellConcUnit = '';
			rows[i].cells[j].innerHTML = '0';
			rows[i].cells[j].style.border = '2px solid lightgray';
			rows[i].cells[j].cellSelected = false;
		}
	}
	saveTags();
	updateColors();
}
			
function selectAllUntaggedWells() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; i++) {
		for (var j=0; j<rows[i].cells.length; j++) {
			if (rows[i].cells[j].wellConcValue == 0) {
				rows[i].cells[j].style.border = '2px solid red';
				rows[i].cells[j].cellSelected = true;
			}
			else {
				rows[i].cells[j].style.border = '2px solid lightgray';
				rows[i].cells[j].cellSelected = false;
			}
		}
	}
}

function selectAll() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; i++) {
		for (var j=0; j<rows[i].cells.length; j++) {
				rows[i].cells[j].style.border = '2px solid red';
				rows[i].cells[j].cellSelected = true;
		}
	}
}

function unselectAll() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; i++) {
		for (var j=0; j<rows[i].cells.length; j++) {
				rows[i].cells[j].style.border = '2px solid lightgray';
				rows[i].cells[j].cellSelected = false;
		}
	}
}
	
function unselectAllUntaggedWells() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; i++) {
		for (var j=0; j<rows[i].cells.length; j++) {
			if (rows[i].cells[j].wellConcValue == 0) {
				rows[i].cells[j].style.border = '2px solid lightgray';
				rows[i].cells[j].cellSelected = false;
			}
		}
	}
}

function saveTags() { //To save the tags as comma delimited strings
	var rows = document.getElementById('plateLayoutTable').rows;
	var Str_row = '';
	var Str_col = '';
	var Str_ConcValue = '';
	var Str_ConcUnit = '';
	for (var i=0; i<rows.length; i++) {
		for (var j=0; j<rows[i].cells.length; j++) {
			if (rows[i].cells[j].wellConcValue > 0) {
				if (Str_row.length > 0)
					Str_row += ' ';
				if (Str_col.length > 0)
					Str_col += ' ';
				if (Str_ConcValue.length > 0)
					Str_ConcValue += ' ';
				if (Str_ConcUnit.length > 0)
					Str_ConcUnit += ' ';
				Str_row += i+1;
				Str_col += j+1;
				Str_ConcValue += rows[i].cells[j].wellConcValue;
				Str_ConcUnit += rows[i].cells[j].wellConcUnit;
			}
		}
	}
	document.getElementById('RowParam').value = Str_row;
	document.getElementById('ColParam').value = Str_col;
	document.getElementById('ConcValueParam').value = Str_ConcValue;
	document.getElementById('ConcUnitParam').value = Str_ConcUnit;	
}

function updateColors() { //To update color gradient in table
	var rows = document.getElementById('plateLayoutTable').rows;
	var Str_ConcValue = document.getElementById('ConcValueParam').value
	var val_max = eval("Math.log(Math.max("+Str_ConcValue+"))");
	var val_min = eval("Math.log(Math.min("+Str_ConcValue+"))");
	for (var i=0; i<rows.length; i++) {
		for (var j=0; j<rows[i].cells.length; j++) {
			if (rows[i].cells[j].wellConcValue > 0) {
				var curr_val = Math.floor((val_max - Math.log(rows[i].cells[j].wellConcValue))/(val_max - val_min)*180);
				var curr_col = "hsl("+curr_val+",100%,50%)";
				rows[i].cells[j].style.backgroundColor = curr_col;
			}
			else {
				rows[i].cells[j].style.backgroundColor = 'white';
			}
		}
	}
}

Behaviour.addLoadEvent(initPlateLayoutTable);