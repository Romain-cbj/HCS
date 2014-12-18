function initPlateLayoutTable() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; ++i) {
		for (var j=0; j<rows[i].cells.length; j++) {
			rows[i].cells[j].onclick = cellClicked;
			rows[i].cells[j].wellTagName = '';
			rows[i].cells[j].wellID = rows[i].cells[j].innerHTML;
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

function matchColor() {
	var tag = document.getElementById('wellTagName');
	var color = document.getElementById('wellTagColor');
	color.selectedIndex = tag.selectedIndex;
}
	
function tagSelectedWells() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; ++i) {
		for (var j=0; j<rows[i].cells.length; j++) {
			if (rows[i].cells[j].cellSelected) {
				rows[i].cells[j].wellTagName = getListBoxValue('wellTagName');
				rows[i].cells[j].style.backgroundColor = getListBoxValue('wellTagColor');
				rows[i].cells[j].style.border = '2px solid lightgray';
				rows[i].cells[j].cellSelected = false;
			}
		}
	}
	saveTags();
}

function untagSelectedWells() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; ++i) {
		for (var j=0; j<rows[i].cells.length; j++) {
			if (rows[i].cells[j].cellSelected) {
				rows[i].cells[j].wellTagName = '';
				rows[i].cells[j].style.backgroundColor = 'white';
				rows[i].cells[j].style.border = '2px solid lightgray';
				rows[i].cells[j].cellSelected = false;
			}
		}
	}
	saveTags();
}

function clearAllTags() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; ++i) {
		for (var j=0; j<rows[i].cells.length; j++) {
			rows[i].cells[j].wellTagName = '';
			rows[i].cells[j].style.backgroundColor = 'white';
			rows[i].cells[j].style.border = '2px solid lightgray';
			rows[i].cells[j].cellSelected = false;
		}
	}
	saveTags();
}
			
function selectAllUntaggedWells() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; ++i) {
		for (var j=0; j<rows[i].cells.length; j++) {
			if (rows[i].cells[j].wellTagName.length == 0) {
				rows[i].cells[j].style.border = '2px solid blue';
				rows[i].cells[j].cellSelected = true;
			}
		}
	}
}

function selectAll() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; ++i) {
		for (var j=0; j<rows[i].cells.length; j++) {
				rows[i].cells[j].style.border = '2px solid red';
				rows[i].cells[j].cellSelected = true;
		}
	}
}

function unselectAll() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; ++i) {
		for (var j=0; j<rows[i].cells.length; j++) {
				rows[i].cells[j].style.border = '2px solid lightgray';
				rows[i].cells[j].cellSelected = false;
		}
	}
}
	
function unselectAllUntaggedWells() {
	var rows = document.getElementById('plateLayoutTable').rows;
	for (var i=0; i<rows.length; ++i) {
		for (var j=0; j<rows[i].cells.length; j++) {
			if (rows[i].cells[j].wellTagName.length == 0) {
				rows[i].cells[j].style.backgroundColor = 'white';
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
	var Str_name = '';
	for (var i=0; i<rows.length; ++i) {
		for (var j=0; j<rows[i].cells.length; j++) {
			if (rows[i].cells[j].wellTagName.length > 0) {
				if (Str_row.length > 0)
					Str_row += ' ';
				if (Str_col.length > 0)
					Str_col += ' ';
				if (Str_name.length > 0)
					Str_name += ' ';
				Str_row += i+1;
				Str_col += j+1;
				Str_name += rows[i].cells[j].wellTagName;
			}
		}
	}
	document.getElementById('RowParam').value = Str_row;
	document.getElementById('ColParam').value = Str_col;
	document.getElementById('NameParam').value = Str_name;
        
}
Behaviour.addLoadEvent(initPlateLayoutTable);

