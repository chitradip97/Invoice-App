$(document).ready(function()
{
    //  $(".bar_icon").click(function()
    //  {
    //     $(".left_sidebar").toggle(); 
    //  })
      
    var state=0;
    $(".bar_icon").click(function(){
        
        if(state==0)
        {
        $(".left_sidebar").css({"display":"none","position":"unset"} );
        state=1
        console.log(state);
        }
        else{
            $(".left_sidebar").css("display","block");
            state=0;
            console.log(state);
        }
    })

    var state=0;
    $(".navigate").click(function(){
        
        if(state==0)
        {
        $(".data").css("display","block");
        state=1
        console.log(state);
        }
        else{
            $(".data").css("display","none");
            state=0;
            console.log(state);
        }
    })
    var state1=0;
    $(".navigate1").click(function(){
        
        if(state1==0)
        {
        $(".data1").css("display","block");
        state1=1
        console.log(state1);
        }
        else{
            $(".data1").css("display","none");
            state1=0;
            console.log(state1);
        }
    })
    var state2=0;
    $(".navigate2").click(function(){
        
        if(state2==0)
        {
        $(".data2").css("display","block");
        state2=1
        console.log(state2);
        }
        else{
            $(".data2").css("display","none");
            state2=0;
            console.log(state2);
        }
    })
    var state3=0;
    $(".navigate3").click(function(){
        
        if(state3==0)
        {
        $(".data3").css("display","block");
        state3=1
        console.log(state1);
        }
        else{
            $(".data3").css("display","none");
            state3=0;
            console.log(state3);
        }
    })
    //$(document).on('click','.proceedtopay',function(){
     $(".proceedtopay").click(function(){
        $payment_mode=$("#pay_nm").val();
        $customer_num=$("#phn_no").val();
        if ($payment_mode=="")
        {
            swal("Select Payment Mode","Select your payment mode","warning");
            return false;
        }
        if($customer_num=="")
        {
            swal("Enter phone number","Enter valid Phone number","warning");
            return false;
        }
        
        var data={
            "proceedtopay":true,
            "payment_mode":$payment_mode,
            "customer_phn":$customer_num
        }
        $.ajax({
            type:"POST",
            url:"create_order_backend.php",
            data:data,
            success:function(response){
                //console.log("ajax done");
                //console.log(response);
                var res=JSON.parse(response) ;
               // swal("response","response","warning");
                //console.log(res);
                 if(res.status==200){
                    //swal(res.messege,res.messege,res.status_type);
                     window.location.href='create_order_summery_updated.php';
                 }
                 else if(res.status==404)
                 {
                     swal(res.messege,res.messege,res.status_type,{
                         buttons: {
                           
                             catch: {
                               text: "Add Customer",
                               value: "catch"
                             },
                             cancel: "Cancel"
                         }
                     })
                     .then((value) => {
                         switch (value) {
                       
                          
                       
                           case "catch":
                            $('#c_phone').val($customer_num);
                            $('#add_customer_modal').modal('show');
                             //console.log('pop the customer log');
                             break;
                       
                           default:
                            
                         }
                       });  
                 }
                 else{swal(res.messege,res.messege,res.status_type)}
            }
        })
    })


    $(".save_customer").click(function(){

         var c_name=$('#c_name').val();
         var c_number=$('#c_phone').val();
         var c_email=$('#c_email').val();
        
         if(c_name !='' && c_number!='')
         { 
            //  if($.isNumric(c_number))
            //  {
                 var data={
                     'customer_add_btn':true,
                     'customer_name':c_name,
                     'customer_number':c_number,
                     'customer_email':c_email
                 }
                 $.ajax({
                     type:'POST',
                     url:'create_order_backend.php',
                     data:data,
                     success:function(response){
                        console.log(response);
                        var res=JSON.parse(response) ;
                        if(res.status==200){
                            swal(res.messege,res.messege,res.status_type);
                            $('#add_customer_modal').modal('hide')
                             
                         }
                     }
                 })
        
            
         }
         else{
             swal("please Fill required field","","warning");
         }
        
     })

      $("#saveorder").click(function(){
         $.ajax({
             type:"POST",
             url:"create_order_backend.php",
             data:{
                 "saveorder":true
             },
             success:function(response)
             {
                console.log("ajax done");
                console.log(response);
                 var res=JSON.parse(response);
                 console.log(res);
                 if(res.status=200)
                 {
                     swal(res.messege,res.messege,res.status_type);
                 }
                 else{
                     swal(res.messege,res.messege,res.status_type);
                 }
             }
         })
      })


      $('#print_btn').on('click',function(){
        printData();
        })

        function printData()
            {
                var divToPrint=document.getElementById("mybilling_area");
                newWin= window.open("");
                newWin.document.write(divToPrint.outerHTML);
                newWin.print();
                newWin.close();
                }

    //   $(".date_pic").datepicker({
    //     format: "yyyy/mm/dd",
    //   });
});

// function printDiv(divName) {
//     var printContents = document.getElementById(divName).innerHTML;
//     var originalContents = document.body.innerHTML;

//     document.body.innerHTML = printContents;

//     window.print();

//     document.body.innerHTML = originalContents;
// }
// function printData()
// {
//    var divToPrint=document.getElementById("mybilling_area");
//    newWin= window.open("");
//    newWin.document.write(divToPrint.outerHTML);
//    newWin.print();
//    newWin.close();
// }