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

    <div class="CsBox">
        <div class="CsBox__title">
          <h1>공지사항</h1>
        </div>

        <div class="CsBox__table">
          <table class="CsBox__table-main">
            <tr class="CsBox__table-menu">
              <th class="CsBox__table-number">번호</th>
              <th class="CsBox__table-title">제목</th>
              <th class="CsBox__table-author">내용</th>
              <th class="CsBox__table-date">날짜</th>
              <th class="CsBox__table-hit">조회수</th>
            </tr>

            <!-- php start -->
        <?php
            include "connect(gongji).php";

            // 전체 공지사항의 수를 가져오는 쿼리 실행
            $countQuery = "SELECT COUNT(*) as total FROM gongji";
            $countResult = $con->query($countQuery);
            $countRow = $countResult->fetch_assoc();
            $totalResults = $countRow['total'];

            $resultsPerPage = 5; // 페이지당 결과 수
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $startFrom = ($currentPage - 1) * $resultsPerPage;

            $sql = "SELECT * FROM gongji LIMIT $startFrom, $resultsPerPage";
            $result = $con->query($sql);
            


            if ($result->num_rows > 0) {
                // 가져온 결과를 반복문을 사용하여 출력
                while($row = $result->fetch_assoc()) {
                    echo "<tr class='IssueBox__table-sub'>";
                    echo "<td class='IssueBox__table-sub__num'>" . htmlspecialchars($row["gongji_code"]) . "</td>";
                    echo "<td class='IssueBox__table-sub__title'><a href='gongji_detail.php?gongji_code=" . htmlspecialchars($row['gongji_code']) ."'>" . htmlspecialchars($row["gongji_title"]) . "</a></td>";
                    $gongjiContent = htmlspecialchars($row["gongji_content"]);
                    $visibleContent = mb_strimwidth($gongjiContent, 0, 20); // 예시로 100글자까지 출력하고 나머지는 생략하고 링크로 연결
                    echo "<td class='IssueBox__table-sub__author'>" . $visibleContent . "</td>";
                    // 날짜 포맷팅 부분 추가
                    $rawDate = $row["gongji_createdate"];
                    $dateTime = new DateTime($rawDate);
                    $formattedDate = $dateTime->format("Y-m-d");
                    echo "<td class='IssueBox__table-sub__date'>" . $formattedDate . "</td>";
                    echo "<td class='IssueBox__table-sub__hit'>" . htmlspecialchars($row["gongji_hit"]) . "</td>";
                    echo "</tr>";
                }
            } else {
               echo "<tr><td colspan='4'>등록된 공지사항이 없습니다.</td></tr>";
            }

            // 연결 종료
            $con->close();
        ?>
          </table>
        </div>

            <!-- 페이지네이션 링크 출력 -->
                <?php
                    $totalPages = ceil($totalResults / $resultsPerPage);
                ?>

        <div class="CsBox__table-button">
          <ul class="CsBox__button-ul">
            <!-- <li class="CsBox__button-li">
              <a href="#"><span>1</span></a>
            </li> -->
            <?php
                // $range = 1;
                // for ($i = 1; $i <= $totalPages; $i++) {
                //     if ($i == $currentPage) {
                //         echo "<li class='CsBox__button-li active'><span>$i</span></li>";
                //     } elseif ($i <= $range || $i >= $totalPages - $range || ($i >= $currentPage - $range && $i <= $currentPage + $range)) {
                //         echo "<li class='CsBox__button-li'><span>$i</span></a></li>";
                //      } 
                    // elseif ($i == $range + 1 || $i == $totalPages - $range - 1) {
                    //     echo "<li class='CsBox__button-li'><span>...</span></li>";
                    // }
                // }
                // $range = 2; 
                // echo "<li class='CsBox__button-li'><span>1</span></a></li>";

                // for ($i = max(2, $currentPage - $range); $i <= min($currentPage + $range, $totalPages); $i++) {
                //     if ($i == $currentPage) {
                //         echo "<li class='CsBox__button-li active'><span>$i</span></li>";
                //     } else {
                //         echo "<li class='CsBox__button-li'><span>$i</span></a></li>";
                //     }
                // }
                echo "<li class='CsBox__button-li'><a href='gongji_list(notion_main).php?page=1'><span>1</span></a></li>";

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<li class='CsBox__button-li'><a href='gongji_list(notion_main).php?page=$i'><span>$i</span></a></li>";
                }
            ?>
          </ul>
        </div>
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
</body>
</html>