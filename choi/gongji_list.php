<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>우리동네 최장수</title>
</head>
<body>
  <!-- <div class="wrap">
    <div class="header">
      <div class="header__logo">
        <a href="index.html">
          <img src="img/logo1.png" alt="jangsu-choi_logo">
        </a>
      </div> -->

      <!-- <div class="header__nav">
        <ul class="header__nav-menu">
          <li><a href="sport.html">운동 찾기</a></li>
          <li><a href="#">챌린지</a></li>
          <li><a href="food.html">추천 음식</a></li>
          <li><a href="question.html">고객문의</a></li>
          <li><a href="login.html"><i class="fa-solid fa-user"></i></a></li>
          <li><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
        </ul>
      </div>
    </div> -->
   

     <!-- <div class="CsBox">
        <div class="CsBox__title">
          <h1>공지사항</h1>
        </div>

        <div class="CsBox__table">
          <table class="CsBox__table-main">
            <tr class="CsBox__table-menu">
              <th class="CsBox__table-number">번호</th>
              <th class="CsBox__table-title">제목</th>
              <th class="CsBox__table-author">글쓴이</th>
              <th class="CsBox__table-date">날짜</th>
            </tr>
            
            
          </table>
        </div>

        <div class="CsBox__table-button">
          <ul class="CsBox__button-ul">
            <li class="CsBox__button-li">
              <a href="#"><span>1</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div> -->
    
    <?php
        $servername = "localhost"; // MySQL 서버 주소
        $username = "root"; // MySQL 계정 이름
        $password = ""; // MySQL 계정 비밀번호
        $dbname = "jangsu"; // 사용할 데이터베이스 이름
        
        // MySQL 데이터베이스에 연결
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // 연결 확인
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM gongji";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // 가져온 결과를 반복문을 사용하여 출력
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><a href='gongji_detail.php?id=" . $row["gongji_code"]. "'>" . $row["gongji_title"]. "</a></td><br>";
                echo "<td>" . $row["gongji_content"]. "</td><br>";
                echo "<td>" . $row["gongji_name"]. "</td><br>";
                echo "<td>" . $row["gongji_createdate"]. "</td><br>";
                echo "<td>" . $row["gongji_hit"]. "</td><br>";
                echo "</tr>";
            }
        } else {
            echo "등록된 공지사항이 없습니다.";
        }

        // 연결 종료
        $conn->close();
    ?>

  </div>

  <div class="footer">

    <div class="footer__contents">

      <!-- 고객만족센터 -->
      <div class="footer__contents-cs">
        <div class="footer__title">
          <h4>고객만족센터 </h4>
        </div>

        <div class="footer__contetnsBox">
          <div class="footer__tel">
            <strong>062-123-4567</strong>
          </div>

          <div class="footer__operatingtime">
            <h6>운영시간</h6>
            <h6>평일 10:00 ~ 18:00</h6>
            <h6>(점심시간 12:00 ~ 13:00)</h6>
            <h6>토,일요일 및 공휴일 제외</h6>
           </div>
        </div>
      </div>

      <!-- 공지사항 -->
      <div class="footer__contents-issue">
        <div class="footer__title">
          <h4>ISSUE </h4>
        </div>
      </div>

      <!-- 리뷰 -->
      <div class="footer__contents-review">
        <div class="footer__title">
          <h4>REVIEW</h4>
        </div>
      </div>

    </div>

    <div class="footer__footer">
      <div class="footer__footer-title">
        회사소개  <b>ㅣ</b>이용약관  <b>ㅣ</b>개인정보처리방침  <b>ㅣ</b>이용안내  <b>ㅣ</b>광고/제휴 문의 
    </div>
    <div class="footer__footer-content">
        상호: 우리동네 최장수  <b>ㅣ</b>주소: 광주광역시 북구 하서로 폴리텍 대학  <b>ㅣ</b>대표: 최장수  <br>사업자등록번호: 111-22-333  <b>ㅣ</b>통신판매업신고번호: 2023-광주북구-1234호 <b>ㅣ</b>
        고객만족센터: 062-123-4567 <br> 팩스번호: 062-1234-1234  <b>ㅣ</b>매일: ourtown@jangsu.com <b>ㅣ</b>COPYRIGHT 2023 www.jangsu.co all rights reserved. 
    </div>
    </div>

  </div>
  <script src="https://kit.fontawesome.com/342c63e198.js" crossorigin="anonymous"></script>
</body>
</html>