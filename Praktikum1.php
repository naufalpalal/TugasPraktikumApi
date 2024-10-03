<?php

// URL API publik
$url = 'http://jsonplaceholder.typicode.com/posts';

// Inisialisasi cURL
$ch = curl_init();

// Set opsi cURL untuk mengambil URL dengan metode GET
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Eksekusi cURL dan simpan respon
$response = curl_exec($ch);

// Tutup cURL
curl_close($ch);

// Ubah respon dari JSON menjadi array PHP
$data = json_decode($response, true);

// Tampilkan hasil data
//print_r($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data API</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Data dari API</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data)) {
            foreach ($data as $post) {
                echo "<tr>";
                echo "<td>{$post['id']}</td>";
                echo "<td>{$post['title']}</td>";
                echo "<td>{$post['body']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data tersedia</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>