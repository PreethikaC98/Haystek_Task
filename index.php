<!DOCTYPE html>
<html>

<style>
.people{
 color:white;
 font-size:21px;
 margin:auto;
 width:50%;
}
.button {
  background-color: coral;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 24px;
  margin:10px;
}
.table-content{
  width: 300px;
  height: 75px;
  background-color: #4287f5;
  
  border-radius:24px;
  margin-bottom:10px;
}
.arrangement{
  width: 20%;height:74%; float:left;text-align:center;background-color:green;
   border-radius: 24px 0px 0px 24px;
  
  
}
.datafield{
 width: 80%;height:74%;float:right;
  border-radius: 0px 24px 24px 0px;
  background-color:black;
  
}

.currentcount
{
color:;padding:4px;
  
}
.heading
{
color:black;
padding:4px;
font-size:1.5em ;font-weight:bold;
}
</style>
<?php
// To retrieve data.
$path = 'data.json';
$jsonString = file_get_contents($path);
$data=json_decode($jsonString, true);

 

?>
<body style="background-color:#4287f5;">

<div class="container">
<div class="people">
<div class="row">
<div class="heading"><?php echo strtoupper('People Data')?>  <button class="button" id="loadMoreButton">NEXT PERSON</button></div>
<div>
<h3 id="nomore"></h3>
</div>

<div id="dataContainer">

</div>


<div></div>
</div>
<div >
<p>Currently<span id="currentcount" class='currentcount'> </span>People Are Showing</p>
</div>
</div>
</div>
<script>
var data = <?php echo json_encode($data); ?>;
var currentIndex = 0;
console.log(data[currentIndex]['name']);
var batchSize = 1; 

function loadMoreData() {
    var container = document.getElementById("dataContainer");
    
    for (var i = 0; i < batchSize; i++) {
        if (currentIndex >= data.length) {
			document.getElementById("nomore").innerHTML='No More people';
            document.getElementById("loadMoreButton").style.display = "none";
            return;
        }
        var item = document.createElement("div");
		var id=currentIndex+1;
        item.innerHTML = "<div class='table-content'><div class='arrangement'><h4 style='margin-top:16px;'>"+id+"</h4></div><div class='datafield'><div style='background-color:#30abf2;color:black;border-radius: 0px 24px 0px 0px';padding:2px;>Name: "+data[currentIndex]['name']+"</div><div style='background-color:white;color:black;border-radius: 0px 0px 24px 0px;padding:2px;'>Location: "+data[currentIndex]['location']+"</div></div></div>";
        
        container.appendChild(item);
        currentIndex++;
    }
	console.log(id);
	
	document.getElementById("currentcount").innerHTML=id;
}

document.getElementById("loadMoreButton").addEventListener("click", loadMoreData);
</script>

</body>
</html>

