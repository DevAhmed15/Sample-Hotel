<?php
include_once ('DBManager.php');



class reservation {
    private  $Start_Date;
    private  $End_Date;
    private  $Period;
    private  $price;
    
    //setters

    public  function  setCapacity($capac)
    {
        $this->capacity=$capac;
    } 
    
    public  function  setStartDate($date)
    {
     $this->Start_Date=$date;   
    }
    public  function  setEndDate($date)
    {
        $this->End_Date=$date;
    }
    public  function  setPeriod($per)
    {
     $this->Period=$per;   
    }
    public  function  setPrice($price)
    {
        $this->price=$price;
    }
        
        /*function __construct()
        {
            $DB=new DBManager();
            $CurrDate=date("Y-m-d");
            $select="SELECT dateBegin,DateEnd,period FROM reservation";
            $result=$DB->selectDB($select);
            $while ($row=mysqli_fetch_assoc($result)) {
            $Curr
            //$sql="UPDATE room "    
            
            }
           */ 
    // getters
    public function getStartDate() { return $this->Start_Date; }
    public function getEndDate() { return $this->End_Date; }
    public function getID() { return $this->id; }
    public function getPeriod() { return $this->Period; }
    public function getPrice() { return $this->Price; }


// functions //////////
    public function RoomDateAvailable()
{

$DB=new DBManager();
$sql="SELECT dateBegin,DateEnd FROM room join reservation WHERE room.id=reservation.Room_id";
$result=$DB->selectDB($sql);
return $result;

}

public function CheckDate($Begin,$End)
{
if( $Begin[0] > $End[0] )
 { return "year problem"; }

if ( $Begin[0] == $End[0] ){

   if($Begin[1] > $End[1] ) 
    { return "month problem"; }
   
   if ( $Begin[1] == $End[1] ){
     if( $Begin[2] > $End[2] )
     { return "day problem"; } 
}
}

}// end of function

public function CheckDateForNow($Begin,$End)
{

$strBegin=implode("",$Begin);
$strEnd = implode("",$End);

if( $strBegin < date("Ymd") || $strEnd < date("Ymd") ) 
{
     return "invalid date"; 
 }


}// end of function

public function ShowAvailable($adultsCap,$childCap){
    $DB=new DBManager();
   $sql="SELECT * FROM room INNER JOIN price ON room.price_id=price.price_id WHERE adult_value='$adultsCap' AND children_value='$childCap' AND status=0 ";
  $result=$DB->selectDB($sql);
  return $result;
}

/////////////////


public function Checks($adultsCap,$childCap,$dateBegin,$dateEnd)
{
    $ValidateDate=$this->CheckDate($dateBegin,$dateEnd);
    $ValidateNowDate=$this->CheckDateForNow($dateBegin,$dateEnd);

if($ValidateDate == "year problem" ) return "<script> alert('Invalid Reservation Years'); </script>";
if($ValidateDate == "month problem" ) return "<script> alert('Invalid Reservation Months'); </script>";
if($ValidateDate == "day problem" ) return "<script> alert('Invalid Reservation Days'); </script>";

if($ValidateNowDate == "invalid date" ) return "<script> alert('Invalid NowAdays Date'); </script>";

$strBegin=implode("-",$dateBegin);
$strEnd = implode("-",$dateEnd);

$DBegin=date_create($strBegin);
$DEnd=date_create($strEnd);

$diff=date_diff($DBegin,$DEnd);
$interval = $DBegin->diff($DEnd);
$intervalDays=$interval->days;
if($intervalDays > 365)
    return "<script> alert('it is Too Over Period'); </script>";


    $DB=new DBManager();
   $sql="SELECT * FROM room WHERE adult_value='$adultsCap' AND children_value='$childCap' AND status=0 ";
  $result=$DB->selectDB($sql);
   
   if(mysqli_num_rows($result) > 0)
   return "reserve";
 
 else return "<script> alert('Rooms For This Capacity Are Busy , You Can Choose another'); </script>"; 

} // end of function

////////////////


public function AddReservation($Room_id,$cust_id,$B_date,$E_date)
{
$DB=new DBManager();

$DBegin=date_create($B_date);
$DEnd=date_create($E_date);

$diff=date_diff($DBegin,$DEnd);
$interval = $DBegin->diff($DEnd);
$intervalDays=$interval->days;


$sql1="INSERT INTO reservation(cust_id,dateBegin,DateEnd,Room_id,period) VALUES ('$cust_id','$B_date','$E_date','$Room_id','$intervalDays')";
$resSel=$DB->AddDB($sql1);

$sql2="UPDATE room SET status=1 WHERE id='$Room_id'";
$resUP=$DB->updateDB($sql2);

if($resUP == "Updated")
{
    return " *****  Congratulations , You Reserved Room Successfully  ***** ";
}
else return "problem";

}// end of function
///////////////


} // end of class
?>