<?php

class db
{

private static $instance;
public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }
public $connect;
public $dbname;
public function connect()
    {
    $this->connect=  mysql_connect("localhost","root","");
    return $this->connect;
    }
public function select_db()
    {
    $this->dbname=mysql_select_db("sw2");
    return $this->dbname;
    }



    public function select_r_count($sql)
    {
    $this->connect=mysql_connect("localhost","root","");
    $this->dbname=mysql_select_db("sw2");
    $query=mysql_query($sql)or die(mysql_error());
    $count=mysql_num_rows($query);
    mysql_close();
    return $count;
    
    }  
    public function insert($sql) {
        $this->connect=mysql_connect("localhost","root","");
        $this->dbname=mysql_select_db("sw2");
        $query=mysql_query($sql)or die(mysql_error());
        if($query)
            { 
            mysql_close();
            return TRUE;
            
            }
        else {
            mysql_close();
            return FALSE;
             }
        
    }
    public function select($sql) {
       $this->connect=mysql_connect("localhost","root","");
       $this->dbname=mysql_select_db("sw2");
       $query=mysql_query($sql)or die(mysql_error());
       return $query;
    }
    public function affect_rows($query) {
        $rows=  mysql_num_rows($query);
        return $rows;
    }
    public function update($sql) {
       $this->connect=mysql_connect("localhost","root","");
       $this->dbname=mysql_select_db("sw2");
       $query=mysql_query($sql)or die(mysql_error());
       mysql_close();
       return $query;
       
    }
    public function delete($id) {
        $this->connect=mysql_connect("localhost","root","");
       $this->dbname=mysql_select_db("sw2");
       $sql="delete from user where ID='$id'";
       $query=mysql_query($sql)or die(mysql_error());
       mysql_close();
       return $query;
    }
    
    
    public function select_a($table) {
        $arr=array();
        
        
        $this->connect();
        $this->select_db();
        $sql="select * from $table ";
        $query=  mysql_query($sql)or die(mysql_error());
        
        
        return $query;
        
    }
    public function select_where($table,$id) {
        $this->connect();
        $this->select_db();
        $sql="select * from $table where ID=$id";
        $re=  mysql_query($sql)or die(mysql_error());
        $row=  mysql_fetch_array($re);
        
        return $row[1];
        
    }
    public function select_where_a($table,$id) {
        $this->connect();
        $this->select_db();
        $sql="select * from $table where ID=$id";
        $re=  mysql_query($sql)or die(mysql_error());
        //$row=  mysql_fetch_array($re);
        
        return $re;
        
    }
    public function add($table_name , $data){
    $keys =""  ; 
    $values ="" ;
    foreach ($data as $key => $value ){
        $keys=$keys." `".$key."` ".',';
        $values=$values." '".$value."' ".',';
    }
    
    $values =  substr_replace($values ,"",-1);
    $keys =  substr_replace( $keys,"",-1);
    $query="INSERT INTO ".' `'.$table_name.'` '.'('.$keys.')'.' VALUES  '.'('.$values.')';
    //echo $query."<br\>";
    $sql= mysql_query($query);
    if($sql){
               // echo 'tmam el7mdullah :)'.'<br/>';
              return TRUE;
                
    }
                
    else {
        echo "no data inserted ";
        return FALSE;
    }
}

}

?>