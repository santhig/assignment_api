<?php 

 include('config.php');

$qname=$_GET['qname'];
$c1=$_GET['ch1'];
$c2=$_GET['ch2'];
$c3=$_GET['ch3'];


if(isset($_GET['qname'])&&!empty($_GET['qname']) && !empty($_GET['ch1']) && !empty($_GET['ch2']) && !empty($_GET['ch3']))
{
	$insertquestion="INSERT INTO `questions`(question)values('$qname')";
	$insertqry=mysqli_query($con,$insertquestion);
	if($insertqry)
	{
		$response['status']='true';
		$response['message']='Inserted';

		
	}

	else
	{
		$response['status']='false';
		$response['message']='Not Inserted';
	}
echo json_encode($response); 

			$query = "SELECT * FROM `questions` WHERE question='".$qname."'";
 
			 $result = mysqli_query($con,$query);
 			 $numquest=mysqli_num_rows($result);
			 if($numquest !=0)
				{
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 				
 					$qid=$row['id'];
				}

$choicequery1=" INSERT INTO `choices`(question_id,choices)values('$qid','$c1')";
$insertch1=mysqli_query($con,$choicequery1);

$choicequery2=" INSERT INTO `choices`(question_id,choices)values('$qid','$c2')";
$insertch2=mysqli_query($con,$choicequery2);

$choicequery3=" INSERT INTO `choices`(question_id,choices)values('$qid','$c3')";
$insertch3=mysqli_query($con,$choicequery3);


if($insertch1 && $insertch2 && $insertch3)
	{
		$response['status']='true';
		$response['message']='choice Inserted';

		
	}

	else
	{
		$response['status']='false';
		$response['message']='Choice Not Inserted'.$qid;
	}
echo json_encode($response); exit;


}
//$choice=$_GET['choice']


   ?>