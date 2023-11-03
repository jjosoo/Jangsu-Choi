<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="QustionBox">

      <div class="question__box-text">
        <h1>무엇을 도와드릴까요?</h1>
        <h1>우리동네 최장수 고객센터입니다.</h1>
      </div>

      <div class="question__CsBox-title">
        <h2>1:1 문의</h2>
      </div>
      <div class="question__CsBox">
        <div class="question__CsBox-link">
          <a href="#" class="CsBox-link">
            <div class="CsBox-link__box">
              <div class="Csbox-link__circle">
                <i class="fa-regular fa-comment-dots fa-2xl"></i>
              </div>
              <h3>1:1 문의 접수</h3>
            </div>
          </a>

          <a href="#" class="CsBox-link">
            <div class="CsBox-link__box">
              <div class="Csbox-link__circle">
                <i class="fa-regular fa-file-lines fa-2xl"></i>
              </div>

              <h3>1:1 문의 내역</h3>
            </div>
          </a>

        </div>

        <div class="question__CsBox-call">
          <h2>전화 상담</h2>
          <h2>1234-5678</h2>
          <p>평일 09:00 ~ 18:00</p>
          <p>(주말 및 공휴일 휴뮤)</p>
        </div>

        <div class="question__CsBox-call ARS">
          <h2>보이는 ARS</h2>
          <p>평일 09:00 ~ 18:00</p>
          <p>(주말 및 공휴일 휴무)</p>
          <button>전화상담 서비스 안내도</button>
        </div>

      </div>

      <!-- 공지사항 -->
      <div class="IssueBox__title question__CsBox-title ">
        <h1>공지사항</h1>
        <p><a href="gongji_list(notion_main).php">더보기 ></a></p>
      </div>

      <!-- <div class="IssueBox__Box">
        <table class="IssueBox__table-main">
          <tr class="IssueBox__table-sub">
            <td class="IssueBox__table-sub__num">1</td>
            <td class="IssueBox__table-sub__title"><a href="#">우리동네 최장수</a></td>
            <td class="IssueBox__table-sub__author">최장수</td>
            <td class="IssueBox__table-sub__date">2023.10.17</td>
          </tr> -->

          <?php
          include "connect(gongji).php";

          // 최근 3개의 공지사항을 가져오는 쿼리 실행
          $sql = "SELECT * FROM gongji ORDER BY gongji_code ASC LIMIT 3";
          $result = $con->query($sql);

          if ($result->num_rows > 0) {
              echo '<div class="IssueBox__Box">';
              echo '<table class="IssueBox__table-main">';
              echo '<tr class="IssueBox__table-menu">';
              echo '<th class="IssueBox__table-number">번호</th>';
              echo '<th class="IssueBox__table-title">제목</th>';
              echo '<th class="IssueBox__table-author">내용</th>';
              echo '<th class="IssueBox__table-date">날짜</th>';
              echo '</tr>';

              // 가져온 결과를 반복문을 사용하여 출력
              while($row = $result->fetch_assoc()) {
                  echo '<tr class="IssueBox__table-sub">';
                  echo '<td class="IssueBox__table-sub__num">' . htmlspecialchars($row["gongji_code"]) . '</td>';
                  echo '<td class="IssueBox__table-sub__title"><a href="gongji_detail.php?gongji_code=' . htmlspecialchars($row["gongji_code"]) . '">' . htmlspecialchars($row["gongji_title"]) . '</a></td>';
                  $gongjiContent = htmlspecialchars($row["gongji_content"]);
                  $visibleContent = mb_strimwidth($gongjiContent, 0, 17); // 예시로 100글자까지 출력하고 나머지는 생략하고 링크로 연결
                  echo "<td class='IssueBox__table-sub__author'>" . $visibleContent . "</td>";
                  // 날짜 포맷팅 부분 추가
                  $rawDate = $row["gongji_createdate"];
                  $dateTime = new DateTime($rawDate);
                  $formattedDate = $dateTime->format("Y-m-d");
                  echo '<td class="IssueBox__table-sub__date">' . $formattedDate . '</td>';
                  echo '</tr>';
              }
              echo '</table>';
              echo '</div>';
          } else {
              echo '등록된 공지사항이 없습니다.';
          }

          // 연결 종료
          $con->close();
          ?>



        </table>
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
</body>
</html>