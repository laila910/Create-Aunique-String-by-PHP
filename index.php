<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php
        //unique  random string 
        //    function generatekey(){
        //        $keyLength=8;
        //        $str="1234567890abcdefghijklmnopqrstuvwxyz()/$";
        //        $randomKey = substr(str_shuffle($str),0,$keyLength);
        //        return $randomKey;
        //    }
        
        //unique string by timestamp 
        //   function generatekey(){
            
        //        $randomKey = uniqid('laila',true);
        //        return $randomKey;
        //    }
        $conn = mysqli_connect("localhost","root","","postinfo");
        
         function checkKeys($conn,$randomKey){
             $sql ="SELECT * FROM keystring;";
             $result=mysqli_query($conn,$sql);

             while($row = mysqli_fetch_assoc($result)){
                 if($row['keystringkey']==$randomKey){
                     $keyexists=true;
                     break;
                 }else{
                     $keyexists=false;

             }

             }
             return $keyexists;

         }

        function generatekey($conn){
               $keyLength=8;
               $str="1234567890abcdefghijklmnopqrstuvwxyz()/$";
               $randomKey = substr(str_shuffle($str),0,$keyLength);
               $checkKeys =checkKeys($conn,$randomKey);
               while($checkKeys==true){
                      $randomKey = substr(str_shuffle($str),0,$keyLength);
                      $checkKeys =checkKeys($conn,$randomKey);
                    
               }
               return $randomKey;
        }
        echo generatekey($conn);
?>
        
        <script src="" async defer></script>
    </body>
</html>