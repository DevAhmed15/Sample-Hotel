<?php

include_once ('person.php');

class customer extends person
{
	
	public function AddReserv($Room_id,$cust_id,$B_date,$E_date)
{
	$reserv=new reservation();
$result=$reserv->AddReservation($Room_id,$cust_id,$B_date,$E_date);
return $result;
}

public function sendFeedBack($id,$array)
{
$DB=new DBManager();
function validateStr($a){
  $validateArr=array(33,34,35,36,37,38,39,40,41,42,43,44,45,47,58,59,60,61,62,63,91,92,93,94,95,96);
for ($i=0; $i < strlen($a); $i++) {
  $ord=ord($a[$i]);
   for ($j=0; $j < count($validateArr); $j++)
 if($validateArr[$j] == $ord )
  return "not";
}
}

if(strlen($array) > 100)
{
	return "<script> alert('Characters are Maximum than 100'); </script>";
}
else 
{
	for($i=0;$i<strlen($array);$i++)
	{
		$str=$array[$i];
		$res=validateStr($str);
	    if($res == "not")
	    {
	   return "<script> alert('there is special charcters ..'); </script>";
	    }
	}
	$sql="INSERT INTO feedback(cust_id,value) VALUES ('$id','$array')";
	$result=$DB->AddDB($sql);
	if($result == "Added")
       return "<script> alert('FeedBack Added Successully , Thank You'); </script>";
    else return "<script> alert('problem'); </script>";
}


}//end of function 

}
?>