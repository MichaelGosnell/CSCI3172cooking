<?php

if(isset($_POST['load'])&&($_POST['load']=='load')){
$username=$_SESSION["username"];
 $conn=mysql_connect("localhost","root", "root");
 mysql_query("set names 'utf8'" );
 mysql_select_db("college_cooking");
 
$query = "SELECT introduction,img FROM user WHERE  username = '{$username}'";

$result=mysql_query($query);
if($result){
while ($row = mysql_fetch_assoc($result)) {
$dataarr = json_encode($row);
echo $dataarr;
}

}
else{
	
}

mysql_close($conn);


}else if(isset($_POST['cat_search'])&&($_POST['cat_search']=='cat_search')){

 $cat_name=$_POST['cat_search_text'];
 $conn=mysql_connect("localhost","root", "root");
 mysql_query("set names 'utf8'" );
 mysql_select_db("college_cooking");
 
$query = "SELECT catimg FROM catgory WHERE  catname LIKE '{$cat_name}'";
$result=mysql_query($query);
if($result){
while ($row = mysql_fetch_assoc($result)) {

$dataarr = json_encode($row);

echo $dataarr;
}
}else{

}
mysql_close($conn);


}
else{
	echo "error";
}



?>