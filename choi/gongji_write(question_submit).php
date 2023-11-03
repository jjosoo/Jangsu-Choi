<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <title>우리동네 최장수</title>
  </head>
  <body>
    <div class="wrap">
      <div class="header">
        <div class="header__logo">
          <a href="index.html">
            <img src="img/logo1.png" alt="jangsu-choi_logo">
          </a>
        </div>

        <div class="header__nav">
          <ul class="header__nav-menu">
            <li><a href="sport.html">운동 찾기</a></li>
            <li><a href="#">챌린지</a></li>
            <li><a href="food.html">추천 음식</a></li>
            <li><a href="question.html">고객문의</a></li>
            <li><a href="login.html"><i class="fa-solid fa-user"></i></a></li>
            <li><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- header : logo & nav -->
      
      <div class="QsubmitBox">
        <div class="QsubmitBox__title">
          <h1>공지사항 작성</h1>
        </div>

        <div class="QsubmitBox__contents">
            <table class="QsubmitBox__table">
                <form class="QsubmitBox__table-title" action="gongji_write(question_submit).php" method="post" onsubmit="return validateForm()">
                    <label for="title" class="QsubmitBox__table-title">제목 : </label>
                    <input type="text" id="title" name="title" required><br>

                    <label for="content" class="QsubmitBox__table-content"></label>
                    <textarea name="content" id="content" cols="150" rows="30"></textarea><br>
                    <input type="submit" value="작성">
                </form>

                <a href="gongji_list(notion_main).php"><input type="submit" value="목록가기"></a>

            </table>
        </div>

      </div>
    <div>

    <!-- php start -->
    <?php
      include "connect(gongji).php";
      
      if (isset($_POST['title']) && isset($_POST['content'])) {
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $content = mysqli_real_escape_string($con, $_POST['content']);
      
        // sql퀴리 작성하여 데이터베이스에 글 추가

        $sql = "INSERT INTO gongji (gongji_title, gongji_content) VALUES ('$title','$content')";

        if(mysqli_query($con,$sql)){
            // 데이터베이스 연결 종료
            mysqli_close($con);
            // echo"공지사항이 성공적으로 작성되었습니다.";
            header("Location: gongji_list(notion_main).php"); // 데이터베이스에 추가한 후 공지사항 목록 페이지로 리다이렉트
            exit(); // 코드의 실행을 중지하고 리다이렉트를 적용
        }
        else{
            echo "Error : ". $sql . "<br>", mysqli_error($con);
        }
      }
    ?>
  
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

      <script>
        function validateForm() {
          var title = document.getElementById("title").value;
          var content = document.getElementById("content").value;

          // 제목과 내용이 비어있을 때 제출을 막음
          if (title === "" || content === "") {
            alert("제목과 내용을 입력해주세요.");
            return false; // 제출을 중지
          }
          return true; // 제출 진행
        }
      </script>

  </body>
</html>
