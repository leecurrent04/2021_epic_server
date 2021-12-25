<?php
$conn = mysqli_connect(
  'localhost', // 주소
  'ID',
  'PW',
  'DB_NAME'); // 데이터베이스 이름

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);

if($result) {
   //echo "sqlDB가 성공적으로 생성됨.";
}
else {
   echo "sqlDB 생성 실패!"."<br>";
   // mysqli_error은 con의 실패내용을 반환
   echo "실패 원인 :".mysqli_error($con);
}
// 연결 해제
mysqli_close($con);

?>

<html>
  <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0'>
    <title>연초고 QR 체크인</title>
    <style>
      body { background-color: #cccccc; font-family: Arial, Helvetica, Sans-Serif; Color: #000088; }
    </style>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  </head>
  <body>
    <h1>연초고 QR 체크인</h1><br>
    <p>html 테스트</p><br>

    <form action="process_create.php" method="POST">
		<p>
			<input id="g" type="number" name="grade" min="1" max="3" value="" readonly>학년 
			<input id="c" type="number" name="class" min="1" max="10" value="" readonly>반 
			<input id="p" type="number" name="number" min="1" max="35" value="" readonly hidden>
		</p>
		<!-- <span id='pass' hidden></span>-->

		<!-- <p>학번:<input maxlength='2048' name='num' type='text' required ></p> -->

		<select name="sel_grade" >
			<option value="none">학년</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select>
		<select name="sel_class" >
			<option value="none">반</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<select name="sel_number" >
			<option value="none">번호</option>
			<option value=1>1</option>
			<option value=2>2</option>
			<option value=3>3</option>
			<option value=4>4</option>
			<option value=5>5</option>
			<option value=6>6</option>
			<option value=7>7</option>
			<option value=8>8</option>
			<option value=9>9</option>
			<option value=10>10</option>
			<option value=11>11</option>
			<option value=12>12</option>
			<option value=13>13</option>
			<option value=14>14</option>
			<option value=15>15</option>
			<option value=16>16</option>
			<option value=17>17</option>
			<option value=18>18</option>
			<option value=19>19</option>
			<option value=20>20</option>
			<option value=21>21</option>
			<option value=22>22</option>
			<option value=23>23</option>
			<option value=24>24</option>
			<option value=25>25</option>
			<option value=26>26</option>
			<option value=27>27</option>
			<option value=28>28</option>
			<option value=29>29</option>
			<option value=30>30</option>
			<option value=31>31</option>
			<option value=32>32</option>
			<option value=33>33</option>
			<option value=34>34</option>
			<option value=35>35</option>
		</select>

		<input type='submit' value="인증">
	</form>

	<script>
		setInterval("x()",1);

		function x(){window.status="테스트"}
	
		const url = new URL(window.location.href);

		// URLSearchParams 객체
		const urlParams = url.searchParams;

		var rg = Number(urlParams.get('g'))
		var rc = Number(urlParams.get('c'))
		var rp = Number(urlParams.get('p'))
		// document.write(rg,rc,rp);

		if ( rp == (rg+rc)){
			document.getElementById('g').value = rg;
			document.getElementById('c').value = rc;
			document.getElementById('p').value = rp;
		}else{
			//alert("인증되지 않은 QR 코드");
			Swal.fire({
                    title: '오류',
                    text: '인증되지 않은 QR 코드',
			});
			window.close();
		}
		
	</script>
	</body>
</html>
