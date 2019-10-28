
function search(){
	document.getElementById('search').style.display = "block";
	document.getElementById('insert').style.display = "none";
	document.getElementById('remove').style.display = "none";
	document.getElementById('prvi').style.backgroundColor = "#000";
	document.getElementById('drugi').style.backgroundColor = "#d3d3d3";
	document.getElementById('treci').style.backgroundColor = "#d3d3d3";
}
function insert(){
	document.getElementById('search').style.display = "none";
	document.getElementById('insert').style.display = "block";
	document.getElementById('remove').style.display = "none";
	document.getElementById('prvi').style.backgroundColor = "#d3d3d3";
	document.getElementById('drugi').style.backgroundColor = "#000";
	document.getElementById('treci').style.backgroundColor = "#d3d3d3";
}
function remove(){
	document.getElementById('search').style.display = "none";
	document.getElementById('insert').style.display = "none";
	document.getElementById('remove').style.display = "block";
	document.getElementById('prvi').style.backgroundColor = "#d3d3d3";
	document.getElementById('drugi').style.backgroundColor = "#d3d3d3";
	document.getElementById('treci').style.backgroundColor = "#000";

}
search();