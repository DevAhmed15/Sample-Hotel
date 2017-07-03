<?php

include_once('person.php');
include_once('room.php');

class admin extends person
{


  public function roomAdd($adults,$childs,$price,$imageFile)
  {
    $roomObj=new room();
    $res=$roomObj->addRoom($adults,$childs,$price,$imageFile);
    return $res;
   } // end of function

///////////////////////

public function roomUpdate($id,$adults,$childs,$price,$imageFile)
{
    $roomObj=new room();
    $res=$roomObj->updateRoom($id,$adults,$childs,$price,$imageFile);
    return $res;

}// end of function


	public function roomDelete($id)
	{
    $roomObj=new room();
    $res=$roomObj->deleteRoom($id);
    return $res;

} // end of function


} // end of class
?>