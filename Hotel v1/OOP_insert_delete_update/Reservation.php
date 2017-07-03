<?php



class Reservation {
	
	
    private $id=0;
	private $bank_account=0;
	private $country=null;
	private $fname=null;
	private $lname=null;
	private $password=null;
	private $gender=null;
	private $phone_number=0;
	private $ssn=0;
	
	

   public function getId() {
        return $this->id;
    }

    public function setId($id) {                          
        $this->id = $id;
    }
	
	public function getBankAccount() {
        return $this->bank_account;
    }

    public function setBankAccount($act) {                          
        $this->bank_account=$act;
    }
	
	public function setCountry($coun) {                          
        $this->country=$coun;
    }
	
	public function getCountry() {
        return $this->country;
    }
	public function setFN($fn) {                          
        $this->fname=$fn;
    }
	
	public function getFN() {
        return $this->fname;
	
	}
	public function setLN($ln) {                          
        $this->lname=$ln;
    }
	
	public function getLN() {
        return $this->lname;
	
	}
	
	public function setPhone($pass) {                          
        $this->password=$pass;
    }
	
	public function getPhone() {
        return $this->password;
	
	}
	
	public function setSsn($ssn) {                          
        $this->ssn=$ssn;
    }
	
	public function getSsn() {
        return $this->ssn;
	
	}
	
	public function setGender($g) {                          
        $this->gender=$g;
    }
	
	public function getGender() {
        return $this->gender;
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}

?>