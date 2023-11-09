<?php

session_start(); // 세션 시작
$host = "localhost"; // MySQL 서버 주소
$user = "root"; // MySQL 로그 이름
$pw = ""; // MySQL 로그 기록
$dbname = "jangsu"; // 정확한 데이터베이스 이름으로 수정하세요

// MySQL 데이터베이스에 연결
$conn = new mysqli($host, $user, $pw, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("connect_fail: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['register'])) {
      $id = $_POST['PersonId'];
      $pw = $_POST['PersonPw'];

      $hashed_password = password_hash($pw, PASSWORD_DEFAULT);

      $sql = "INSERT INTO user (uid, upw) VALUES ('$id', '$hashed_password')";

      if ($conn->query($sql) === TRUE) {
          echo "회원가입에 성공했습니다.";
      } else {
          if ($conn->errno == 1062) {
              echo "이미 존재하는 아이디입니다. 다른 아이디를 사용해주세요.";
          } else {
              echo "회원가입에 실패했습니다. 다시 시도해주세요.";
          }
      }
  } elseif (isset($_POST['login'])) {
      $id = $_POST['PersonId'];
      $pw = $_POST['PersonPw'];

      $sql = "SELECT * FROM user WHERE uid='$id'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          if (password_verify($pw, $row['upw'])) {
              $_SESSION['username'] = $id;
              header('Location: index.html');
              exit();
          } else {
              echo "비밀번호가 올바르지 않습니다.";
          }
      } else {
          echo "존재하지 않는 아이디입니다.";
      }
  }
}

// 데이터베이스 연결 종료
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="script/jquery.min.js"></script>
    <script src="script/login.js"></script>
    <title>우리동네 최장수</title>
</head>
<body>
    <div class="wrap">
        <div class="loginBox">
            <div class="loginBox__logo">
                <img src="img/logo1.png" alt="loginBox__logo">
            </div>

            <div class="loginBox__member">
                <div class="loginBox__member-y">
                    회원 로그인
                </div>
                <div class="loginBox__member-n">
                    비회원 주문조회
                </div>
            </div>
            
            <div class="loginBox__main">
              
                <!-- 회원 로그인 -->
                <form action="login.php" class="loginBox__form">
                <input type="hidden" name="register">
                <!-- 아이디 / 비밀번호 입력 박스 -->
                  <div class="loginBox__form-inputBox">

                    <!-- 아이디 -->
                    <div class="inputBox-id">
                      <input class="member_id" type="text" placeholder="아이디" name="PersonId">
                    </div>

                    <!-- 비밀번호 -->
                    <div class="inputBox-id">
                      <input class="member_id" type="text" placeholder="비밀번호" name="PersonPw">
                    </div>
                  </div>

                  <!-- 로그인 버튼 -->
                  <div class="loginBox__form-login">
                    <button class="member-login">
                      <input class="member-login member-login-sumbit" type="submit" value="로그인" name="login">
                    </button>
                  </div>

                  <!-- 아이디 저장 & 아이디/비밀번호 찾기 -->
                  <!-- <div class="loginBox__form-except">
                    SNS계정으로 로그인
                  </div> -->

                  <!-- sns 가입 -->
                  <div class="loginBox__form-sns">

                    <button class="member-sns naver">
                      <img src="img/naver.jpg" alt="naver">
                    </button>

                    <button class="member-sns kakao">
                      <img src="img/kakao.png" alt="kakao">
                    </button>

                    <button class="member-sns google">
                      <img src="img/google.png" alt="google">
                    </button>

                  </div>

                  <!-- id / pw 찾기 -->
                  <div class="loginBox__form-search">
                    <a href="#">아이디 찾기</a>
                    <a href="#">비밀번호 찾기</a>
                  </div>

                  <!-- 회원가입 -->
                  <a href="join.html" class="loginBox__form-join">
                      <div class="loginBox__form-joinDiv">
                          회원가입
                      </div>
                  </a>
                </form>
                
                <!-- 비회원 주문조회 -->
                <form action="" class="loginBox__form_no hidden">
                  <input type="hidden" name="">

                    <!-- 주문자명 -->
                    <div class="loginBox__form_no-name">
                      <div class="loginBox-content">
                        <input class="loginBox-input" type="text" placeholder="주문자명을 입력하세요" name="OrderName">
                      </div>
                    </div>

                    <!-- 휴대폰 번호 -->
                    <div class="loginBox__form_no-name">
                      <div class="loginBox-content">
                        <input class="loginBox-input" type="text" placeholder="휴대폰 번호를 입력하세요" name="OrderNum">
                      </div>
                    </div>

                    <!-- 비밀번호 -->
                    <div class="loginBox__form_no-name">
                      <div class="loginBox-content">
                        <input class="loginBox-input" type="text" placeholder="비밀 번호를 입력하세요" name="Orderpw">
                      </div>
                    </div>

                    <!-- 확인 -->
                    <div class="loginBox__form_no-check">
                      <button class="member-login">
                        <input class="member-login member-login-sumbit" type="submit" value="로그인" name="check">
                      </button>
                    </div>

                    <!-- 회원가입 -->
                    <a href="join.html" class="loginBox__form-join">
                        <div class="loginBox__form-joinDiv">
                            회원가입
                        </div>
                    </a>
                </form>
            </div>
        </div>
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

    <!-- PHP에서 변수를 사용하여 로그인 오류 메시지 출력 -->
    <?php if (isset($login_error)) { ?>
        <div class="error-message"><?php echo $login_error; ?></div>
    <?php } ?>

    <!-- PHP에서 변수를 사용하여 주문 조회 오류 메시지 출력 -->
    <?php if (isset($order_error)) { ?>
        <div class="error-message"><?php echo $order_error; ?></div>
    <?php } ?>

    <!-- PHP에서 변수를 사용하여 주문 조회 성공 메시지 출력 -->
    <?php if (isset($order_success) && $order_success) { ?>
        <div class="success-message">주문 조회에 성공했습니다.</div>
    <?php } ?>
</body>
</html>