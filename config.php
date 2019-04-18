<?php
//$con = mysqli_connect("www.kitkatstudio.com", "parttimepoints", "parttimepoints", "parttimepoints");
$con = mysqli_connect("localhost", "root", "", "parttimepoints");
if(!$con)
{
	echo mysqli_error($con);
}
?>