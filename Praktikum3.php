<?php
//Id yang ingin dihapus
$idToDelete = 1;

// URL API tujuan (dengan ID data yang ingin dihapus)
$url = 'http://jsonplaceholder.typicode.com/posts/1';

// Inisialisasi cURL
$ch = curl_init();

// Set opsi untuk metode DELETE
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
$getData = curl_exec($ch);
curl_close($ch);

//
$dataToDelete = json_decode($getData, true);

$ch = curl_init();
// Set agar hasil dikembalikan sebagai string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
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
    <title>DELETE Request API Response</title>
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
    <h2>Hasil DELETE Request ke API</h2>

    <div class="response">
        <h3>Respon dari Server:</h3>
        <?php if (!empty($responseData)) { ?>
            <p>Data berhasil dihapus.</p>
            <h4>Respon JSON:</h4>
            <code><?php echo json_encode($responseData, JSON_PRETTY_PRINT); ?></code>
        <?php } else { ?>
            <p>Respon kosong atau data tidak ditemukan.</p>
        <?php } ?>
    </div>
</div>

</body>
</html>