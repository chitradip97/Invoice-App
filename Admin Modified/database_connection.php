<?php
class Database_conn{
    private $servername;
    private $username;
    private $dbpassword;
    private $dbname;

    // function __construct(){
    //     $this->servername=$servername;
    //     $this->username=$username;
    // }

    function conection(){
        $this->servername='localhost';
        $this->username='root';
        $this->dbpassword='';
        $this->dbname='invoice_db';
        try{
        $con=new mysqli($this->servername,$this->username,$this->dbpassword,$this->dbname);
        //echo "connection successfull";
        return $con;
        }
        catch(exception $e)
        {
            die("connection error".$e->getMessage());
        }
    }
}

class Dataquery extends Database_conn
{
    public function getdata($field, $tablename,$condition)
    {
        $sql=" select $field from $tablename ";
        if ($condition!=" ")
        {
        $sql.=' where ';
        $i=1;
        $count=count($condition);
        foreach($condition as $key=>$val)
        {
            if($count==$i)
            {
                $sql.=" $key=$val  ";
            }
            else{
                $sql.=" $key=$val and ";
            }
           $i++;
        }
        // echo $sql;
        }
        $result=$this->conection()->query($sql);
        if($result->num_rows>0)
        {
            $arr=array();
            while($row=$result->fetch_assoc())
            {
                $arr[]=$row;
            }
            return $arr;
        }
        else{
            return 0;
        }
        
    }   
        public function get_lessdata($field, $tablename,$condition)
    {
        $sql=" select $field from $tablename ";
        if ($condition!=" ")
        {
        $sql.=' where ';
        //$i=1;
        $count=count($condition);
        foreach($condition as $key=>$val)
        {
              $sql.=" $key<$val  ";
           
        }
        }
        //echo $sql;
        // else{
        //     $sql=" select $field from $tablename where $condition "; 
        // }
        $result=$this->conection()->query($sql);
        if($result->num_rows>0)
        {
            $arr=array();
            while($row=$result->fetch_assoc())
            {
                $arr[]=$row;
            }
            return $arr;
        }
        else{
            return 0;
        }
    }

    public function get_moredata($field, $tablename,$condition)
    {
        $sql=" select $field from $tablename ";
        if ($condition!=" ")
        {
        $sql.=' where ';
        //$i=1;
        $count=count($condition);
        foreach($condition as $key=>$val)
        {
              $sql.=" $key>$val  ";
           
        }
        }
        echo $sql;
        // else{
        //     $sql=" select $field from $tablename where $condition "; 
        // }
        $result=$this->conection()->query($sql);
        if($result->num_rows>0)
        {
            $arr=array();
            while($row=$result->fetch_assoc())
            {
                $arr[]=$row;
            }
            return $arr;
        }
        else{
            return 0;
        }
    }
    public function insertdata($field, $tablename,$values){
        $sql="insert into $tablename ($field) values($values)";
        //echo $sql;
        $result=$this->conection()->query($sql);

    }
    public function updatedate($tablename,$setparmeter,$condition)
    {
        $sql=" update $tablename set ";
        $i=1;
        $count=count($setparmeter);
        foreach($setparmeter as $key=>$val)
        {
            if($count==$i)
            {
                $sql.=" $key='$val'  ";
                //echo gettype($sql);
            }
            else{
                $sql.=" $key='$val' , ";
                //echo gettype($sql);
            }
           $i++;
        }
        $sql.=' where ';
        $j=1;
        $count=count($condition);
        foreach($condition as $key=>$val)
        {
            if($count==$j)
            {
                $sql.=" $key=$val  ";
            }
            else{
                $sql.=" $key=$val and ";
            }
           $j++;
        }
        //echo $sql;
        $result=$this->conection()->query($sql);


    }
    public function deletedata($tablename,$condition)
    {
        $sql="delete from $tablename where ";
        
        $k=1;
        $count=count($condition);
        foreach($condition as $key=>$val)
        {
            if($count==$k)
            {
                $sql.=" $key=$val  ";
            }
            else{
                $sql.=" $key=$val and ";
            }
           $k++;
        }
        //echo $sql;
        $result=$this->conection()->query($sql);
    }

    public function countdata($columnname,$tablename,$condition)
    {
        $sql=" select count($columnname) from $tablename ";
        //echo $sql;
        if ($condition!=" ")
        {
        $sql.=' where ';
        $i=1;
        $count=count($condition);
        foreach($condition as $key=>$val)
        {
            if($count==$i)
            {
                $sql.=" $key=$val  ";
            }
            else{
                $sql.=" $key=$val and ";
            }
           $i++;
        }
        // echo $sql;
        }
        $result=$this->conection()->query($sql);
        if($result->num_rows>0)
        {
            $arr=array();
            while($row=$result->fetch_assoc())
            {
                $arr[]=$row;
            }
            //print_r($arr);
            return $arr;
        }
        else{
            return 0;
        }
         
        // return $result;
    }
    // public function getbyid($tablename,$id)
    // {

    // }
}
//$obj= new Database_con();
//$obj->conection();
//$insertobj=new Dataquery();
//$insertobj-> insertdata("user_name,user_password","test1","'chitradip','123456'");




?>