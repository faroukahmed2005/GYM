<?php
$accountID = '@omar_awara7'; // ضع معرف الحساب هنا
$accessToken = 'EAAapud7b7fYBOyr3NPFySZBtUZAbMHqAAoDud99MpIfPvCTpZA65pZC9p8KOg6ojDFPrdRk3V8zKZBlKNIMbZA8XZBgYHPJoxo0pzJ1tVi6gCyhJKlytstNIuZAcxYcM0xV2NLuf4LsXb7HAxmD59dAGZCgmpgSDvN0Ak5p3mSSxZAiRIqoGamSm51'; // ضع الـ Access Token هنا

$url = "https://graph.facebook.com/v10.0/{$accountID}?fields=followers_count&access_token={$accessToken}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

$data = json_decode($result, true);

if (isset($data['followers_count'])) {
    $followers = $data['followers_count'];
} else {
    $followers = 'N/A';
}

header('Content-Type: application/json');
echo json_encode(['followers' => $followers]);


?>
