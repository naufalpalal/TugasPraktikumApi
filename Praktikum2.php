<?php

// URL API tujuan
$url = 'http://jsonplaceholder.typicode.com/posts';

// Data yang akan dikirim (format array PHP)
$data = array(
    'title' => 'Belajar API dengan PHP',
    'body' => 'Ini adalah contoh penggunaan POST request',
    'userId' => 1
);

// Inisialisasi cURL
$ch = curl_init();

// Set opsi untuk metode POST dan kirim data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Set agar hasil dikembalikan sebagai string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Eksekusi cURL
$response = curl_exec($ch);

// Tutup cURL
curl_close($ch);

// Tampilkan respon dari server
//echo $response;
$responseData = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Request API Response</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .response {
            background-color: #f4f4f4;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .response h3 {
            color: #333;
        }
        .response p {
            font-size: 14px;
            line-height: 1.5;
        }
        .response code {
            background-color: #e7e7e7;
            padding: 5px;
            display: block;
            white-space: pre-wrap;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Hasil POST Request ke API</h2>

    <div class="response">
        <h3>Respon dari Server:</h3>
        <?php if (!empty($responseData)) { ?>
            <p><strong>ID:</strong> <?php echo $responseData['id']; ?></p>
            <p><strong>Title:</strong> <?php echo $responseData['title']; ?></p>
            <p><strong>Body:</strong> <?php echo $responseData['body']; ?></p>
            <p><strong>User ID:</strong> <?php echo $responseData['userId']; ?></p>
            <h4>Respon JSON:</h4>
            <code><?php echo json_encode($responseData, JSON_PRETTY_PRINT); ?></code>
        <?php } else { ?>
            <p>Gagal mendapatkan respon dari server.</p>
        <?php } ?>
    </div>
</div>

</body>
</html>