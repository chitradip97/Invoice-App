<?php
// session_start();
// if(!isset($_session['product_items']))
// {
//     $_session['product_items']=[]; 
// }
// if(!isset($_session['product_item_ids']))
// {
//     $_session['product_item_ids']=[]; 
// }
// if(isset($_POST['add_btn']))
// {
//     $product_nm=$_POST['prod_name'];
//     $quantity=$_POST['quantity'];
//     include ("database_connection.php");
//     $insertobj=new Dataquery();
//     $condition=array('product_id'=>$product_nm);
//     $result=$insertobj->getdata('*','product',$condition);
//     if(isset($result[0]))
//     {
//         foreach($result as $list)
//         {
//             $product_id=$list['product_id'];
//             $product_name=$list['product_name'];
//             $product_price=$list['product_price'];
//             $product_stock=$list['product_quantity'];
//         }
//     }
//     if ($product_stock>$quantity)
//     {
//      $product_data=[
//         'product_id'=>$product_id,
//         'product_name'=>$product_name,
//         'product_price'=>$product_price,
//         'product_quantity'=>$quantity
//         ] ;
//         if(!in_array($product_id,$_session['product_item_ids']))
//         {
//             array_push($_session['product_item_ids'],$product_id) ;
//         array_push($_session['product_items'],$product_data) ;
//         } 
//         else{
//             foreach($_session['product_items'] as $key=>$product_session_item)
//             {
//                     if($product_session_item['product_id']==$row['product_id'])
//                     {
//                         $newQuantity= $product_session_item['product_quantity']+$quantity;
//                         $product_data=[
//                             'product_id'=>$product_id,
//                             'product_name'=>$product_name,
//                             'product_price'=>$product_price,
//                             'product_quantity'=>$product_data
//                         ];
//                         $_session['product_items'][$key]= $product_data;
//                     }
//             }
//         }
        //print_r($_session['product_items'][0]['product_name']);
        //redirect('create_order.php','Item has added');
        //header('Location:create_order.php');
        
//     }
// }
if(isset($_POST['add_btn']))
{
    $product_id=$_POST['prod_cred'];
    $quantity=$_POST['quantity']; 
    include ("database_connection.php");
         $insertobj=new Dataquery();
         $condition=array('product_id'=>$product_id);
         $result=$insertobj->getdata('*','product',$condition);
         if(isset($result[0]))
         {
             foreach($result as $list)
             {
                 $product_id=$list['product_id'];
                 $product_name=$list['product_name'];
                 $product_price=$list['product_price'];
                 $product_stock=$list['product_quantity'];
             }
         }
         if($product_stock>$quantity)
         {
            session_start();
            $product_list=array($product_id,$product_name,$product_price,$quantity);
            $_SESSION[$product_name]=$product_list;
            //print_r($product_list);
            //exit;
            header("Location:create_order_view.php");
         }
         else{
            echo "Only".$product_stock."skock available";
         }
            //   session_unset();
            //  session_destroy();


         
}

if(isset($_POST['proceedtopay']))
{
    $cus_phn=$_POST['customer_phn'];
    $Payment_mode=$_POST['payment_mode'];
    include "database_connection.php";
    $insertobj=new Dataquery();
    $condition=array("Customer_number"=>$cus_phn);
    $result=$insertobj->getdata('*','customer',$condition);
   //echo "$result";
    if(isset($result[0]))
    {
        session_start();
        $_SESSION['inoice_no']="INV".rand(111111,999999);
        $_SESSION['cus_phn']=$cus_phn;
        $_SESSION['cus_Pay_Mode']=$Payment_mode;
        $response=[
            'status'=>200,
            'status_type'=>'success',
            'messege'=>'customer found'
        ];
        
        echo json_encode($response) ;
        

    }
    else{
        $response=[
            'status'=>404,
            'status_type'=>'warning',
            'messege'=>'Customer not found'
        ];
        echo json_encode($response) ;
    }
}
// else{
//     $response=[
//         'status'=>500,
//         'status_type'=>'error',
//         'messege'=>'Something went Wrong'
//     ];
//     echo json_encode($response) ;
    
// }


 if(isset($_POST["customer_add_btn"]  ));
 {
    if(isset($_POST['customer_name']))
    {
     $name=$_POST['customer_name'];
     $number=$_POST['customer_number'];
     $email=$_POST['customer_email'];
     include ("database_connection.php");
          $insertobj=new Dataquery();
          $field_data=("Customer_name,Customer_email,Customer_number");
          $values="'".$name."','".$email."','".$number."'";
          $result=$insertobj->insertdata($field_data, 'customer',$values);
          $response1=[
             'status'=>200,
             'status_type'=>'success',
             'messege'=>'customer added successfully'
         ];
         echo json_encode($response1) ;
        }
 }





   if(isset($_POST['saveorder']))
  {
    session_start();
    // if(isset($_SESSION))
    
    // foreach($_SESSION as $values)
    // {
    //     print_r($values);
    // }

    //print_r($_SESSION);
     $phone=$_SESSION['cus_phn'];
     //echo $phone."<br>";
     $invoice_no=$_SESSION['inoice_no'];
     //echo $invoice_no."<br>";
     $grand_total_amount=$_SESSION['Grand_total_amount'];
     //echo  $grand_total_amount."<br>";
     $payment_mode=$_SESSION['cus_Pay_Mode'];
     //echo $payment_mode."<br>";
     include "database_connection.php";
     $getobj=new Dataquery();
     $condition=array("Customer_number"=>$phone);
     $result=$getobj->getdata('*', 'customer',$condition);
     if(isset($result[0]))
     {
        
            foreach($result as $list)
            {
                $customer_id=$list['Customer_id'];

            }
        
            
                $cus_id=$customer_id;
                //echo $cus_id;
                $tracking_no=rand(11111,99999);
                $cus_invoice_no=$invoice_no;
                $total_amount=$grand_total_amount;
                $order_date=date('y-m-d');
                //echo $order_date;
                $pay_mode=$payment_mode;

                $values="$cus_id,'$tracking_no','$cus_invoice_no',$total_amount,'$order_date','$pay_mode'";
            $field_data=("customer_id,tracking_no,invoice_no,total_amount,order_date,payment_mode");
            $table_name="orders";
            $insertobj=new Dataquery();
            $insertobj->insertdata($field_data,$table_name,$values);
            $response1=[
                'status'=>200,
                'status_type'=>'success',
                'messege'=>'Order Placed Successfully'
            ];

            // update quantity
            foreach($_SESSION as $values)
            {
                if(is_array($values)==1)
                {
                    if($values[1])
                    {
                        $product_name=$values[1];
                        $product_name_str="'".$product_name."'";
                    }
                    if($values[3])
                    {
                        $product_quantity_new=$values[3];
                    }
                    $getobj=new Dataquery();
                    //$colunm="product_quantity"
                    $condition=array("product_name"=>$product_name_str);
                    $getresult=$getobj->getdata('*','product',$condition);
                    if(isset($getresult[0]))
                    {
                        foreach($getresult as $list1)
                        {
                        $product_quantity_old=$list1['product_quantity'];

                        }
                    }
                    $product_quantity_modified=$product_quantity_old-$product_quantity_new;

                    $updateobj=new Dataquery();
                    $setparmeter=array("product_quantity"=>$product_quantity_modified);
                    $condition=array("product_name"=>$product_name_str);
                    $updateresult=$updateobj->updatedate('product',$setparmeter,$condition);
                }
            }
            echo json_encode($response1) ;
            
     }
      session_unset();
      session_destroy();
  }


?>