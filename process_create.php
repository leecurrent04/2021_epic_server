<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<?php
$conn = mysqli_connect(
  'localhost',
  'ID',
  'PW',
  'DB_NAME');
  # title, description 이라는 사용자가 입력한 정보를 그대로 php에 입력하는 행위는 보안에 취약, 따라서 관리 필요

  $filtered = array(
    'grade'=>mysqli_real_escape_string($conn, $_POST['grade']),
    'class'=>mysqli_real_escape_string($conn, $_POST['class']),
    'sel_grade'=>mysqli_real_escape_string($conn, $_POST['sel_grade']),
    'sel_class'=>mysqli_real_escape_string($conn, $_POST['sel_class']),
    'sel_number'=>mysqli_real_escape_string($conn, $_POST['sel_number'])
  );

$sql = "
  INSERT INTO topic
    (grade,class,sel_grade,sel_class,sel_number, created)
    VALUES(
      '{$filtered['grade']}',
      '{$filtered['class']}',
      '{$filtered['sel_grade']}',
      '{$filtered['sel_class']}',
      '{$filtered['sel_number']}',
        NOW()
    )
";
$result = mysqli_query($conn, $sql);

if($result === false){
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
  error_log(mysqli_error($conn));
} else {
	//echo '<script>alert("인증되었습니다. 창을 닫아주세요.")</script>';
	
	echo '
<script type="text/javascript">

$(document).ready(function(){

  swal({
    title: "인증되었습니다",
    text: "창을 닫아주세요.",
  })
});

</script>
';
	
	echo '
	<h1>
		<a href="WEB 주소">돌아가기</a>
		</br> 돌아가기시 인증이 되지 않습니다. 창을 닫아주세요
	</h1>';
}
?>
