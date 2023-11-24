<?php
if(isset($_POST["log_btn"]))
{
    if($_POST["login"]=="Admin")
    {
    if($_POST['em']!='' && $_POST['password']!='')
    {
      $admin_email=$_POST['em'];
      $password=$_POST['password'];
      $Authorization=$_POST["login"];
      include ("database_connection.php");
      $getobj=new Dataquery();
      $condition=array("admin_email"=>"'".$admin_email."'");
      $result=$getobj->getdata('*','admin',$condition);
      if(isset($result[0]))
      {
        foreach($result as $list)
        {
          $database_pass=$list['password'];
        }
      } 
      if($password==$database_pass)
      {
      setcookie("email",$admin_email,time()+86400);
      setcookie("pass",$password,time()+86400);
      setcookie("login_auth",$Authorization,time()+86400); 
      //header("Location:dashboard.php"); 
      $response1=[
        'status'=>200,
        'status_type'=>'success'
      ];
        
    echo json_encode($response1) ;
      }
      else
      {
        $response1=[
          'status'=>402,
          'status_type'=>'error'
        ];
        echo json_encode($response1);
      }
      
    }
    else{
      $response1=[
        'status'=>404,
        'status_type'=>'error'
      ];
        
    echo json_encode($response1) ;
    }
    }
    if($_POST["login"]=="User")
    {
      if($_POST['em']!='' && $_POST['password']!='')
      {
        $user_email=$_POST['em'];
        $password=$_POST['password'];
        $Authorization=$_POST["login"];
        include ("database_connection.php");
        $getobj=new Dataquery();
        $condition=array("user_email"=>"'".$user_email."'");
        $result=$getobj->getdata('*','user_data',$condition);
        if(isset($result[0]))
        {
        foreach($result as $list)
        {
          $database_pass=$list['password'];
        }
        } 
        if($password==$database_pass)
        {

        setcookie("email",$user_email,time()+86400);
        setcookie("pass",$password,time()+86400);
        setcookie("login_auth",$Authorization,time()+86400); 
          
        $response1=[
          'status'=>200,
          'status_type'=>'success'
        ];
          
        echo json_encode($response1) ;
        }
        else
        {
        $response1=[
          'status'=>402,
          'status_type'=>'error'
        ];
        echo json_encode($response1);
        }
      }
      else{
          $response1=[
            'status'=>404,
            'status_type'=>'error'
          ];
            
        echo json_encode($response1) ;
        }
    }
}




if(isset($_POST["reset_btn"]))
{
    if($_POST["login"]=="Admin")
    {
    if($_POST['em']!='' && $_POST['password']!='')
    {
      $user_email=$_POST['em'];
      $password=$_POST['password'];
      $Authorization=$_POST["login"];
      include ("database_connection.php");
      $insertobj=new Dataquery();
      $setparmeter=array("password"=>$password);
      // $user_email_str="'".$user_email."'"
      $condition=array("admin_email"=>"'".$user_email."'");
      $result=$insertobj->updatedate('admin',$setparmeter,$condition);
      
      $response1=[
        'status'=>200,
        'status_type'=>'success'
      ];
        
    echo json_encode($response1) ;
      
    }
    else{
      $response1=[
        'status'=>404,
        'status_type'=>'error'
      ];
        
    echo json_encode($response1) ;
    }
    }
    if($_POST["login"]=="User")
    {
      if($_POST['em']!='' && $_POST['password']!='')
      {
        $user_email=$_POST['em'];
        $password=$_POST['password'];
        $Authorization=$_POST["login"];
        include ("database_connection.php");
      $insertobj=new Dataquery();
      $setparmeter=array("password"=>$password);
      $condition=array("user_email"=>"'".$user_email."'");
      $result=$insertobj->updatedate('user_data',$setparmeter,$condition);
          
        $response1=[
          'status'=>200,
          'status_type'=>'success'
        ];
          
      echo json_encode($response1) ;
      }
      else{
        
        $response1=[
          'status'=>404,
          'status_type'=>'error'
        ];
          
      echo json_encode($response1) ;
      }
    }
}
// $response1=[
//   'status'=>200,
//   'status_type'=>'success'
// ];
  
// echo json_encode($response1) ;

?>