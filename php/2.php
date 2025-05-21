<?php
if (isset($_POST['user_input'])) {
    $input = $_POST['user_input'];

    // يمكنك تجربة تغيير اسم الامتداد هنا إذا كنت تريد ملف نصي: "user_input.txt"
    $file = "user_input.txt";

    // استخدم file_put_contents مع خيارات الإلحاق والقفل أثناء الكتابة
    $result = file_put_contents($file, $input . "\r\n", FILE_APPEND | LOCK_EX);

    if ($result !== false) {
        echo "<script>
                alert('thanks for your comment');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>
                alert('Error saving your comment!');
                window.location.href = 'index.html';
              </script>";
    }
} else {
    echo "<script>
            alert('No comment provided!');
            window.location.href = 'index.html';
          </script>";
}
?>
