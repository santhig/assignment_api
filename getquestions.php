<?php
 
header("Content-Type:application/json");
include('config.php');
$Data= array();

 $query = "SELECT * FROM `questions`";
 
 $result = mysqli_query($con,$query);
  $numquest=mysqli_num_rows($result);
 if($numquest !=0)
{
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {

  $Data[]=$row;
 $qid=$row['id'];

 
  $choice_query=" SELECT `choices` FROM `choices` WHERE  question_id=$qid";
  $choice_result=mysqli_query($con,$choice_query);
  $numchoice=mysqli_num_rows($choice_result);
  
  
  		if($numchoice>0)
      {
        while($choice_row=mysqli_fetch_array($choice_result,MYSQLI_ASSOC))
           {

            $Data[]=$choice_row;


           }
      }
    }

 $response["status"] = "true";
 //$response["message"] = "question Details";
 $response["Questions and Answers"] = $Data;

}
  else 
  {
    $response["status"] = "false";
    $response["message"] = "No record(s) found!";
  }
echo json_encode($response); exit;
 
?>