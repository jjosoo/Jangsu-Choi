<?php
include "connect(gongji).php";

if(isset($_GET['gongji_code'])) {
    $gongjiCode = mysqli_real_escape_string($con, $_GET['gongji_code']);

    // 조회수를 증가시키는 쿼리 실행
    $updateHitQuery = "UPDATE gongji SET gongji_hit = gongji_hit + 1 WHERE gongji_code = $gongjiCode";
    $con->query($updateHitQuery);

    // 해당 공지사항의 정보를 가져오는 쿼리 실행
    $selectGongjiQuery = "SELECT * FROM gongji WHERE gongji_code = $gongjiCode";
    $result = $con->query($selectGongjiQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // 공지사항의 정보를 출력합니다.
        echo "<h1>" . htmlspecialchars($row["gongji_title"]) . "</h1>";
        echo "<p>" . htmlspecialchars($row["gongji_content"]) . "</p>";
        $rawDate = $row["gongji_createdate"];
        $dateTime = new DateTime($rawDate);
        $formattedDate = $dateTime->format("Y-m-d");
        echo "<p>Date: " . $formattedDate . "</p>";
        echo "<p>Views: " . htmlspecialchars($row["gongji_hit"]) . "</p>";
        // ... 추가적인 필드들에 대한 출력을 여기에 추가할 수 있습니다.
    } else {
        echo "해당 공지사항을 찾을 수 없습니다.";
    }
} else {
    echo "올바른 공지사항 코드가 전달되지 않았습니다.";
}


$con->close();

 
?>
