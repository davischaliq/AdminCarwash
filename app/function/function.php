<?php

function login($username, $password)
{
    $password = sha1($password);
    $conn = koneksi();
    if ($username == 'admin') {
        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        $result = mysqli_num_rows($cek);
        if ($result > 0) {
            $_SESSION['admin'] = $username;
            $err = 'adminsukses';
        }else {
             $err = 'gagal';
        }
        return $err;
    }
    if ($username == 'manager') {
        $cek = mysqli_query($conn, "SELECT * FROM manager WHERE username = '$username' AND password = '$password'");
        $result = mysqli_num_rows($cek);
        if ($result > 0) {
            $_SESSION['manager'] = $username;
            $err = 'managersukses';
        }else {
            $err = 'gagal';
        }
        return $err;
    }
}

function total_transaksi()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM booking_order");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        $data = $cekRow;
    }else {
        $data = 0;
    }
    return $data;
}

function total_transaksisukses()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM booking_order WHERE status='success'");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        $data = $cekRow;
    }else {
        $data = 0;
    }
    return $data;
}

function total_transaksigagal()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM booking_order WHERE status='Canceled'");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        $data = $cekRow;
    }else {
        $data = 0;
    }
    return $data;
}

function getOrder()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM booking_order");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_array($cek)) {
          $data[] = array(
            'order_id' => $result['order_id'],
            'servis' => $result['jenis_layanan'],
            'nama' => $result['nama'],
            'nik' => $result['nik'],
            'phone' => $result['phone'],
            'harga' => $result['total_harga'],
            'tgl' => date("d-m-Y", strtotime($result['arrived'])),
            'status' => $result['status'],
            'note' => $result['note']
         );
        }
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}
function getOrderspecifik($order_id)
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM booking_order WHERE order_id='$order_id'");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        $result = mysqli_fetch_assoc($cek);
          $data = array(
            'orderid' => $result['order_id'],
            'servis' => $result['jenis_layanan'],
            'nama' => $result['nama'],
            'nik' => $result['nik'],
            'phone' => $result['phone'],
            'harga' => $result['total_harga'],
            'tgl' => date("d-m-Y", strtotime($result['arrived'])),
            'note' => $result['note']);
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}

function updateOrder($order_id, $status)
{
    $conn = koneksi();
    $insert_userdetails = mysqli_query($conn, "UPDATE booking_order SET status = '$status' WHERE order_id='$order_id'");
    if ($insert_userdetails) {
        $error = array('pesan'=>'Status berhasil di ubah', 'tipe'=>'success');
        return $error;
    }else{
        $error = $error = array('pesan'=>'Status gagal di update', 'tipe'=>'danger');
        return $error;
    }
}
function showRating()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_array($cek)) {
          $data[] = array(
            'nama' => $result['name'],
            'QS01' => $result['QS01'],
            'QS02' => $result['QS02'],
            'QS03' => $result['QS03'],
            'QS04' => $result['QS04'],
            'QS05' => $result['QS05'],
            'QS06' => $result['QS06'],
            'QS07' => $result['QS07'],
            'QS08' => $result['QS08'],
            'QS09' => $result['QS09'],
            'QS10' => $result['QS10'],
            'QS11' => $result['QS11'],
            'QS12' => $result['QS12'],
            'QS13' => $result['QS13'],
            'QS14' => $result['QS14'],
            'QS15' => $result['QS15'],
            'QS16' => $result['QS16'],
            'QS17' => $result['QS17'],
            'QS18' => $result['QS18'],

            'disQS01' => $result['disQS01'],
            'disQS02' => $result['disQS02'],
            'disQS03' => $result['disQS03'],
            'disQS04' => $result['disQS04'],
            'disQS05' => $result['disQS05'],
            'disQS06' => $result['disQS06'],
            'disQS07' => $result['disQS07'],
            'disQS08' => $result['disQS08'],
            'disQS09' => $result['disQS09'],
            'disQS10' => $result['disQS10'],
            'disQS11' => $result['disQS11'],
            'disQS12' => $result['disQS12'],
            'disQS13' => $result['disQS13'],
            'disQS14' => $result['disQS14'],
            'disQS15' => $result['disQS15'],
            'disQS16' => $result['disQS16'],
            'disQS17' => $result['disQS17'],
            'disQS18' => $result['disQS18'],
         );
        }
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}
function showQuestion()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM functional_question");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_array($cek)) {
          $data[] = array(
            'kode' => $result['kode'],
            'question' => $result['pertanyaan'],
         );
        }
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}
function showdisQuestion()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM dysfunctional_question");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_array($cek)) {
          $data[] = array(
            'kode' => $result['kode'],
            'question' => $result['pertanyaan'],
         );
        }
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}

// Mencari validitas quesioner fungsional
function TampilkanData()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT name, QS01, QS02, QS03, QS04, QS05, QS06, QS07, QS08, QS09, QS10, QS11, QS12, QS13, QS14, QS15, QS16, QS17, QS18 FROM jawaban LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
                if ($result['QS01'] == 'Suka') {
                    $QS01 = 5;
                }
                if ($result['QS01'] == 'Harap') {
                    $QS01 = 4;
                }
                if ($result['QS01'] == 'Netral') {
                    $QS01 = 3;
                }
                if ($result['QS01'] == 'Toleransi') {
                    $QS01 = 2;
                }
                if ($result['QS01'] == 'Tidak Suka'){
                    $QS01 = 1;
                }

                if ($result['QS02'] == 'Suka') {
                    $QS02 = 5;
                }
                if ($result['QS02'] == 'Harap') {
                    $QS02 = 4;
                }
                if ($result['QS02'] == 'Netral') {
                    $QS02 = 3;
                }
                if ($result['QS02'] == 'Toleransi') {
                    $QS02 = 2;
                }
                if($result['QS02'] == 'Tidak Suka') {
                    $QS02 = 1;
                }

                if ($result['QS03'] == 'Suka') {
                    $QS03 = 5;
                }
                if ($result['QS03'] == 'Harap') {
                    $QS03 = 4;
                }
                if ($result['QS03'] == 'Netral') {
                    $QS03 = 3;
                }
                if ($result['QS03'] == 'Toleransi') {
                    $QS03 = 2;
                }
                if($result['QS03'] == 'Tidak Suka') {
                    $QS03 = 1;
                }

                if ($result['QS04'] == 'Suka') {
                    $QS04 = 5;
                }
                if ($result['QS04'] == 'Harap') {
                    $QS04 = 4;
                }
                if ($result['QS04'] == 'Netral') {
                    $QS04 = 3;
                }
                if ($result['QS04'] == 'Toleransi') {
                    $QS04 = 2;
                }
                if($result['QS04'] == 'Tidak Suka') {
                    $QS04 = 1;
                }

                if ($result['QS05'] == 'Suka') {
                    $QS05 = 5;
                }
                if ($result['QS05'] == 'Harap') {
                    $QS05 = 4;
                }
                if ($result['QS05'] == 'Netral') {
                    $QS05 = 3;
                }
                if ($result['QS05'] == 'Toleransi') {
                    $QS05 = 2;
                }
                if($result['QS05'] == 'Tidak Suka') {
                    $QS05 = 1;
                }

                if ($result['QS06'] == 'Suka') {
                    $QS06 = 5;
                }
                if ($result['QS06'] == 'Harap') {
                    $QS06 = 4;
                }
                if ($result['QS06'] == 'Netral') {
                    $QS06 = 3;
                }
                if ($result['QS06'] == 'Toleransi') {
                    $QS06 = 2;
                }
                if($result['QS06'] == 'Tidak Suka') {
                    $QS06 = 1;
                }

                if ($result['QS07'] == 'Suka') {
                    $QS07 = 5;
                }
                if ($result['QS07'] == 'Harap') {
                    $QS07 = 4;
                }
                if ($result['QS07'] == 'Netral') {
                    $QS07 = 3;
                }
                if ($result['QS07'] == 'Toleransi') {
                    $QS07 = 2;
                }
                if($result['QS07'] == 'Tidak Suka') {
                    $QS07 = 1;
                }

                if ($result['QS08'] == 'Suka') {
                    $QS08 = 5;
                }
                if ($result['QS08'] == 'Harap') {
                    $QS08 = 4;
                }
                if ($result['QS08'] == 'Netral') {
                    $QS08 = 3;
                }
                if ($result['QS08'] == 'Toleransi') {
                    $QS08 = 2;
                }
                if($result['QS08'] == 'Tidak Suka') {
                    $QS08 = 1;
                }

                if ($result['QS09'] == 'Suka') {
                    $QS09 = 5;
                }
                if ($result['QS09'] == 'Harap') {
                    $QS09 = 4;
                }
                if ($result['QS09'] == 'Netral') {
                    $QS09 = 3;
                }
                if ($result['QS09'] == 'Toleransi') {
                    $QS09 = 2;
                }
                if($result['QS09'] == 'Tidak Suka') {
                    $QS09 = 1;
                }

                if ($result['QS10'] == 'Suka') {
                    $QS10 = 5;
                }
                if ($result['QS10'] == 'Harap') {
                    $QS10 = 4;
                }
                if ($result['QS10'] == 'Netral') {
                    $QS10 = 3;
                }
                if ($result['QS10'] == 'Toleransi') {
                    $QS10 = 2;
                }
                if($result['QS10'] == 'Tidak Suka') {
                    $QS10 = 1;
                }

                if ($result['QS11'] == 'Suka') {
                    $QS11 = 5;
                }
                if ($result['QS11'] == 'Harap') {
                    $QS11 = 4;
                }
                if ($result['QS11'] == 'Netral') {
                    $QS11 = 3;
                }
                if ($result['QS11'] == 'Toleransi') {
                    $QS11 = 2;
                }
                if ($result['QS11'] == 'Tidak Suka'){
                    $QS11 = 1;
                }

                if ($result['QS12'] == 'Suka') {
                    $QS12 = 5;
                }
                if ($result['QS12'] == 'Harap') {
                    $QS12 = 4;
                }
                if ($result['QS12'] == 'Netral') {
                    $QS12 = 3;
                }
                if ($result['QS12'] == 'Toleransi') {
                    $QS12 = 2;
                }
                if($result['QS12'] == 'Tidak Suka') {
                    $QS12 = 1;
                }

                if ($result['QS13'] == 'Suka') {
                    $QS13 = 5;
                }
                if ($result['QS13'] == 'Harap') {
                    $QS13 = 4;
                }
                if ($result['QS13'] == 'Netral') {
                    $QS13 = 3;
                }
                if ($result['QS13'] == 'Toleransi') {
                    $QS13 = 2;
                }
                if($result['QS13'] == 'Tidak Suka') {
                    $QS13 = 1;
                }

                if ($result['QS14'] == 'Suka') {
                    $QS14 = 5;
                }
                if ($result['QS14'] == 'Harap') {
                    $QS14 = 4;
                }
                if ($result['QS14'] == 'Netral') {
                    $QS14 = 3;
                }
                if ($result['QS14'] == 'Toleransi') {
                    $QS14 = 2;
                }
                if($result['QS14'] == 'Tidak Suka') {
                    $QS14 = 1;
                }

                if ($result['QS15'] == 'Suka') {
                    $QS15 = 5;
                }
                if ($result['QS15'] == 'Harap') {
                    $QS15 = 4;
                }
                if ($result['QS15'] == 'Netral') {
                    $QS15 = 3;
                }
                if ($result['QS15'] == 'Toleransi') {
                    $QS15 = 2;
                }
                if($result['QS15'] == 'Tidak Suka') {
                    $QS15 = 1;
                }

                if ($result['QS16'] == 'Suka') {
                    $QS16 = 5;
                }
                if ($result['QS16'] == 'Harap') {
                    $QS16 = 4;
                }
                if ($result['QS16'] == 'Netral') {
                    $QS16 = 3;
                }
                if ($result['QS16'] == 'Toleransi') {
                    $QS16 = 2;
                }
                if($result['QS16'] == 'Tidak Suka') {
                    $QS16 = 1;
                }

                if ($result['QS17'] == 'Suka') {
                    $QS17 = 5;
                }
                if ($result['QS17'] == 'Harap') {
                    $QS17 = 4;
                }
                if ($result['QS17'] == 'Netral') {
                    $QS17 = 3;
                }
                if ($result['QS17'] == 'Toleransi') {
                    $QS17 = 2;
                }
                if($result['QS17'] == 'Tidak Suka') {
                    $QS17 = 1;
                }

                if ($result['QS18'] == 'Suka') {
                    $QS18 = 5;
                }
                if ($result['QS18'] == 'Harap') {
                    $QS18 = 4;
                }
                if ($result['QS18'] == 'Netral') {
                    $QS18 = 3;
                }
                if ($result['QS18'] == 'Toleransi') {
                    $QS18 = 2;
                }
                if($result['QS18'] == 'Tidak Suka') {
                    $QS18 = 1;
                }
          $data[] = array(
            'nama' => $result['name'],
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
            'total'=> $total = $QS01+$QS02+$QS03+$QS04+$QS05+$QS06+$QS07+$QS08+$QS09+$QS10+$QS11+$QS12+$QS13+$QS14+$QS15+$QS16+$QS17+$QS18
         );
        }
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}

function cariSigmaXdanY()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
                if ($result['QS01'] == 'Suka') {
                    $QS01 = 5;
                }
                if ($result['QS01'] == 'Harap') {
                    $QS01 = 4;
                }
                if ($result['QS01'] == 'Netral') {
                    $QS01 = 3;
                }
                if ($result['QS01'] == 'Toleransi') {
                    $QS01 = 2;
                }
                if ($result['QS01'] == 'Tidak Suka'){
                    $QS01 = 1;
                }

                if ($result['QS02'] == 'Suka') {
                    $QS02 = 5;
                }
                if ($result['QS02'] == 'Harap') {
                    $QS02 = 4;
                }
                if ($result['QS02'] == 'Netral') {
                    $QS02 = 3;
                }
                if ($result['QS02'] == 'Toleransi') {
                    $QS02 = 2;
                }
                if($result['QS02'] == 'Tidak Suka') {
                    $QS02 = 1;
                }

                if ($result['QS03'] == 'Suka') {
                    $QS03 = 5;
                }
                if ($result['QS03'] == 'Harap') {
                    $QS03 = 4;
                }
                if ($result['QS03'] == 'Netral') {
                    $QS03 = 3;
                }
                if ($result['QS03'] == 'Toleransi') {
                    $QS03 = 2;
                }
                if($result['QS03'] == 'Tidak Suka') {
                    $QS03 = 1;
                }

                if ($result['QS04'] == 'Suka') {
                    $QS04 = 5;
                }
                if ($result['QS04'] == 'Harap') {
                    $QS04 = 4;
                }
                if ($result['QS04'] == 'Netral') {
                    $QS04 = 3;
                }
                if ($result['QS04'] == 'Toleransi') {
                    $QS04 = 2;
                }
                if($result['QS04'] == 'Tidak Suka') {
                    $QS04 = 1;
                }

                if ($result['QS05'] == 'Suka') {
                    $QS05 = 5;
                }
                if ($result['QS05'] == 'Harap') {
                    $QS05 = 4;
                }
                if ($result['QS05'] == 'Netral') {
                    $QS05 = 3;
                }
                if ($result['QS05'] == 'Toleransi') {
                    $QS05 = 2;
                }
                if($result['QS05'] == 'Tidak Suka') {
                    $QS05 = 1;
                }

                if ($result['QS06'] == 'Suka') {
                    $QS06 = 5;
                }
                if ($result['QS06'] == 'Harap') {
                    $QS06 = 4;
                }
                if ($result['QS06'] == 'Netral') {
                    $QS06 = 3;
                }
                if ($result['QS06'] == 'Toleransi') {
                    $QS06 = 2;
                }
                if($result['QS06'] == 'Tidak Suka') {
                    $QS06 = 1;
                }

                if ($result['QS07'] == 'Suka') {
                    $QS07 = 5;
                }
                if ($result['QS07'] == 'Harap') {
                    $QS07 = 4;
                }
                if ($result['QS07'] == 'Netral') {
                    $QS07 = 3;
                }
                if ($result['QS07'] == 'Toleransi') {
                    $QS07 = 2;
                }
                if($result['QS07'] == 'Tidak Suka') {
                    $QS07 = 1;
                }

                if ($result['QS08'] == 'Suka') {
                    $QS08 = 5;
                }
                if ($result['QS08'] == 'Harap') {
                    $QS08 = 4;
                }
                if ($result['QS08'] == 'Netral') {
                    $QS08 = 3;
                }
                if ($result['QS08'] == 'Toleransi') {
                    $QS08 = 2;
                }
                if($result['QS08'] == 'Tidak Suka') {
                    $QS08 = 1;
                }

                if ($result['QS09'] == 'Suka') {
                    $QS09 = 5;
                }
                if ($result['QS09'] == 'Harap') {
                    $QS09 = 4;
                }
                if ($result['QS09'] == 'Netral') {
                    $QS09 = 3;
                }
                if ($result['QS09'] == 'Toleransi') {
                    $QS09 = 2;
                }
                if($result['QS09'] == 'Tidak Suka') {
                    $QS09 = 1;
                }

                if ($result['QS10'] == 'Suka') {
                    $QS10 = 5;
                }
                if ($result['QS10'] == 'Harap') {
                    $QS10 = 4;
                }
                if ($result['QS10'] == 'Netral') {
                    $QS10 = 3;
                }
                if ($result['QS10'] == 'Toleransi') {
                    $QS10 = 2;
                }
                if($result['QS10'] == 'Tidak Suka') {
                    $QS10 = 1;
                }

                if ($result['QS11'] == 'Suka') {
                    $QS11 = 5;
                }
                if ($result['QS11'] == 'Harap') {
                    $QS11 = 4;
                }
                if ($result['QS11'] == 'Netral') {
                    $QS11 = 3;
                }
                if ($result['QS11'] == 'Toleransi') {
                    $QS11 = 2;
                }
                if ($result['QS11'] == 'Tidak Suka'){
                    $QS11 = 1;
                }

                if ($result['QS12'] == 'Suka') {
                    $QS12 = 5;
                }
                if ($result['QS12'] == 'Harap') {
                    $QS12 = 4;
                }
                if ($result['QS12'] == 'Netral') {
                    $QS12 = 3;
                }
                if ($result['QS12'] == 'Toleransi') {
                    $QS12 = 2;
                }
                if($result['QS12'] == 'Tidak Suka') {
                    $QS12 = 1;
                }

                if ($result['QS13'] == 'Suka') {
                    $QS13 = 5;
                }
                if ($result['QS13'] == 'Harap') {
                    $QS13 = 4;
                }
                if ($result['QS13'] == 'Netral') {
                    $QS13 = 3;
                }
                if ($result['QS13'] == 'Toleransi') {
                    $QS13 = 2;
                }
                if($result['QS13'] == 'Tidak Suka') {
                    $QS13 = 1;
                }

                if ($result['QS14'] == 'Suka') {
                    $QS14 = 5;
                }
                if ($result['QS14'] == 'Harap') {
                    $QS14 = 4;
                }
                if ($result['QS14'] == 'Netral') {
                    $QS14 = 3;
                }
                if ($result['QS14'] == 'Toleransi') {
                    $QS14 = 2;
                }
                if($result['QS14'] == 'Tidak Suka') {
                    $QS14 = 1;
                }

                if ($result['QS15'] == 'Suka') {
                    $QS15 = 5;
                }
                if ($result['QS15'] == 'Harap') {
                    $QS15 = 4;
                }
                if ($result['QS15'] == 'Netral') {
                    $QS15 = 3;
                }
                if ($result['QS15'] == 'Toleransi') {
                    $QS15 = 2;
                }
                if($result['QS15'] == 'Tidak Suka') {
                    $QS15 = 1;
                }

                if ($result['QS16'] == 'Suka') {
                    $QS16 = 5;
                }
                if ($result['QS16'] == 'Harap') {
                    $QS16 = 4;
                }
                if ($result['QS16'] == 'Netral') {
                    $QS16 = 3;
                }
                if ($result['QS16'] == 'Toleransi') {
                    $QS16 = 2;
                }
                if($result['QS16'] == 'Tidak Suka') {
                    $QS16 = 1;
                }

                if ($result['QS17'] == 'Suka') {
                    $QS17 = 5;
                }
                if ($result['QS17'] == 'Harap') {
                    $QS17 = 4;
                }
                if ($result['QS17'] == 'Netral') {
                    $QS17 = 3;
                }
                if ($result['QS17'] == 'Toleransi') {
                    $QS17 = 2;
                }
                if($result['QS17'] == 'Tidak Suka') {
                    $QS17 = 1;
                }

                if ($result['QS18'] == 'Suka') {
                    $QS18 = 5;
                }
                if ($result['QS18'] == 'Harap') {
                    $QS18 = 4;
                }
                if ($result['QS18'] == 'Netral') {
                    $QS18 = 3;
                }
                if ($result['QS18'] == 'Toleransi') {
                    $QS18 = 2;
                }
                if($result['QS18'] == 'Tidak Suka') {
                    $QS18 = 1;
                }
          $database[] = array(
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
            'total'=> $total = $QS01+$QS02+$QS03+$QS04+$QS05+$QS06+$QS07+$QS08+$QS09+$QS10+$QS11+$QS12+$QS13+$QS14+$QS15+$QS16+$QS17+$QS18
         );
        }
        for ($i=0; $i < count($database); $i++) { 
            // MENCARI NILAI X
            $X01[$i] = $database[$i]['QS01'];
            $sumX01 = array_sum($X01);
            $sumXpangkat01 = pow($sumX01, 2);
            $X02[$i] = $database[$i]['QS02'];
            $sumX02 = array_sum($X02);
            $sumXpangkat02 = pow($sumX02, 2);
            $X03[$i] = $database[$i]['QS03'];
            $sumX03 = array_sum($X03);
            $sumXpangkat03 = pow($sumX03, 2);
            $X04[$i] = $database[$i]['QS04'];
            $sumX04 = array_sum($X04);
            $sumXpangkat04 = pow($sumX04, 2);
            $X05[$i] = $database[$i]['QS05'];
            $sumX05 = array_sum($X05);
            $sumXpangkat05 = pow($sumX05, 2);
            $X06[$i] = $database[$i]['QS06'];
            $sumX06 = array_sum($X06);
            $sumXpangkat06 = pow($sumX06, 2);
            $X07[$i] = $database[$i]['QS07'];
            $sumX07 = array_sum($X07);
            $sumXpangkat07 = pow($sumX07, 2);
            $X08[$i] = $database[$i]['QS08'];
            $sumX08 = array_sum($X08);
            $sumXpangkat08 = pow($sumX08, 2);
            $X09[$i] = $database[$i]['QS09'];
            $sumX09 = array_sum($X09);
            $sumXpangkat09 = pow($sumX09, 2);
            $X10[$i] = $database[$i]['QS10'];
            $sumX10 = array_sum($X10);
            $sumXpangkat10 = pow($sumX10, 2);
            $X11[$i] = $database[$i]['QS11'];
            $sumX11 = array_sum($X11);
            $sumXpangkat11 = pow($sumX11, 2);
            $X12[$i] = $database[$i]['QS12'];
            $sumX12 = array_sum($X12);
            $sumXpangkat12 = pow($sumX12, 2);
            $X13[$i] = $database[$i]['QS13'];
            $sumX13 = array_sum($X13);
            $sumXpangkat13 = pow($sumX13, 2);
            $X14[$i] = $database[$i]['QS14'];
            $sumX14 = array_sum($X14);
            $sumXpangkat14 = pow($sumX14, 2);
            $X15[$i] = $database[$i]['QS15'];
            $sumX15 = array_sum($X15);
            $sumXpangkat15 = pow($sumX15, 2);
            $X16[$i] = $database[$i]['QS16'];
            $sumX16 = array_sum($X16);
            $sumXpangkat16 = pow($sumX16, 2);
            $X17[$i] = $database[$i]['QS17'];
            $sumX17 = array_sum($X17);
            $sumXpangkat17 = pow($sumX17, 2);
            $X18[$i] = $database[$i]['QS18'];
            $sumX18 = array_sum($X18);
            $sumXpangkat18 = pow($sumX18, 2);
            // END MENCARI NILAI X

             // MENCARI NILAI Y
             $Y01[$i] = $database[$i]['total'];
             $sumY = array_sum($Y01);
             // akhir mencari nilai Y
        }
        $data = array(
            'X01' => $sumX01,
            'X02' => $sumX02,
            'X03' => $sumX03,
            'X04' => $sumX04,
            'X05' => $sumX05,
            'X06' => $sumX06,
            'X07' => $sumX07,
            'X08' => $sumX08,
            'X09' => $sumX09,
            'X10' => $sumX10,
            'X11' => $sumX11,
            'X12' => $sumX12,
            'X13' => $sumX13,
            'X14' => $sumX14,
            'X15' => $sumX15,
            'X16' => $sumX16,
            'X17' => $sumX17,
            'X18' => $sumX18,
            'SigmaY' => $sumY,
        );
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}

function XYfungsional()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
                if ($result['QS01'] == 'Suka') {
                    $QS01 = 5;
                }
                if ($result['QS01'] == 'Harap') {
                    $QS01 = 4;
                }
                if ($result['QS01'] == 'Netral') {
                    $QS01 = 3;
                }
                if ($result['QS01'] == 'Toleransi') {
                    $QS01 = 2;
                }
                if ($result['QS01'] == 'Tidak Suka'){
                    $QS01 = 1;
                }

                if ($result['QS02'] == 'Suka') {
                    $QS02 = 5;
                }
                if ($result['QS02'] == 'Harap') {
                    $QS02 = 4;
                }
                if ($result['QS02'] == 'Netral') {
                    $QS02 = 3;
                }
                if ($result['QS02'] == 'Toleransi') {
                    $QS02 = 2;
                }
                if($result['QS02'] == 'Tidak Suka') {
                    $QS02 = 1;
                }

                if ($result['QS03'] == 'Suka') {
                    $QS03 = 5;
                }
                if ($result['QS03'] == 'Harap') {
                    $QS03 = 4;
                }
                if ($result['QS03'] == 'Netral') {
                    $QS03 = 3;
                }
                if ($result['QS03'] == 'Toleransi') {
                    $QS03 = 2;
                }
                if($result['QS03'] == 'Tidak Suka') {
                    $QS03 = 1;
                }

                if ($result['QS04'] == 'Suka') {
                    $QS04 = 5;
                }
                if ($result['QS04'] == 'Harap') {
                    $QS04 = 4;
                }
                if ($result['QS04'] == 'Netral') {
                    $QS04 = 3;
                }
                if ($result['QS04'] == 'Toleransi') {
                    $QS04 = 2;
                }
                if($result['QS04'] == 'Tidak Suka') {
                    $QS04 = 1;
                }

                if ($result['QS05'] == 'Suka') {
                    $QS05 = 5;
                }
                if ($result['QS05'] == 'Harap') {
                    $QS05 = 4;
                }
                if ($result['QS05'] == 'Netral') {
                    $QS05 = 3;
                }
                if ($result['QS05'] == 'Toleransi') {
                    $QS05 = 2;
                }
                if($result['QS05'] == 'Tidak Suka') {
                    $QS05 = 1;
                }

                if ($result['QS06'] == 'Suka') {
                    $QS06 = 5;
                }
                if ($result['QS06'] == 'Harap') {
                    $QS06 = 4;
                }
                if ($result['QS06'] == 'Netral') {
                    $QS06 = 3;
                }
                if ($result['QS06'] == 'Toleransi') {
                    $QS06 = 2;
                }
                if($result['QS06'] == 'Tidak Suka') {
                    $QS06 = 1;
                }

                if ($result['QS07'] == 'Suka') {
                    $QS07 = 5;
                }
                if ($result['QS07'] == 'Harap') {
                    $QS07 = 4;
                }
                if ($result['QS07'] == 'Netral') {
                    $QS07 = 3;
                }
                if ($result['QS07'] == 'Toleransi') {
                    $QS07 = 2;
                }
                if($result['QS07'] == 'Tidak Suka') {
                    $QS07 = 1;
                }

                if ($result['QS08'] == 'Suka') {
                    $QS08 = 5;
                }
                if ($result['QS08'] == 'Harap') {
                    $QS08 = 4;
                }
                if ($result['QS08'] == 'Netral') {
                    $QS08 = 3;
                }
                if ($result['QS08'] == 'Toleransi') {
                    $QS08 = 2;
                }
                if($result['QS08'] == 'Tidak Suka') {
                    $QS08 = 1;
                }

                if ($result['QS09'] == 'Suka') {
                    $QS09 = 5;
                }
                if ($result['QS09'] == 'Harap') {
                    $QS09 = 4;
                }
                if ($result['QS09'] == 'Netral') {
                    $QS09 = 3;
                }
                if ($result['QS09'] == 'Toleransi') {
                    $QS09 = 2;
                }
                if($result['QS09'] == 'Tidak Suka') {
                    $QS09 = 1;
                }

                if ($result['QS10'] == 'Suka') {
                    $QS10 = 5;
                }
                if ($result['QS10'] == 'Harap') {
                    $QS10 = 4;
                }
                if ($result['QS10'] == 'Netral') {
                    $QS10 = 3;
                }
                if ($result['QS10'] == 'Toleransi') {
                    $QS10 = 2;
                }
                if($result['QS10'] == 'Tidak Suka') {
                    $QS10 = 1;
                }

                if ($result['QS11'] == 'Suka') {
                    $QS11 = 5;
                }
                if ($result['QS11'] == 'Harap') {
                    $QS11 = 4;
                }
                if ($result['QS11'] == 'Netral') {
                    $QS11 = 3;
                }
                if ($result['QS11'] == 'Toleransi') {
                    $QS11 = 2;
                }
                if ($result['QS11'] == 'Tidak Suka'){
                    $QS11 = 1;
                }

                if ($result['QS12'] == 'Suka') {
                    $QS12 = 5;
                }
                if ($result['QS12'] == 'Harap') {
                    $QS12 = 4;
                }
                if ($result['QS12'] == 'Netral') {
                    $QS12 = 3;
                }
                if ($result['QS12'] == 'Toleransi') {
                    $QS12 = 2;
                }
                if($result['QS12'] == 'Tidak Suka') {
                    $QS12 = 1;
                }

                if ($result['QS13'] == 'Suka') {
                    $QS13 = 5;
                }
                if ($result['QS13'] == 'Harap') {
                    $QS13 = 4;
                }
                if ($result['QS13'] == 'Netral') {
                    $QS13 = 3;
                }
                if ($result['QS13'] == 'Toleransi') {
                    $QS13 = 2;
                }
                if($result['QS13'] == 'Tidak Suka') {
                    $QS13 = 1;
                }

                if ($result['QS14'] == 'Suka') {
                    $QS14 = 5;
                }
                if ($result['QS14'] == 'Harap') {
                    $QS14 = 4;
                }
                if ($result['QS14'] == 'Netral') {
                    $QS14 = 3;
                }
                if ($result['QS14'] == 'Toleransi') {
                    $QS14 = 2;
                }
                if($result['QS14'] == 'Tidak Suka') {
                    $QS14 = 1;
                }

                if ($result['QS15'] == 'Suka') {
                    $QS15 = 5;
                }
                if ($result['QS15'] == 'Harap') {
                    $QS15 = 4;
                }
                if ($result['QS15'] == 'Netral') {
                    $QS15 = 3;
                }
                if ($result['QS15'] == 'Toleransi') {
                    $QS15 = 2;
                }
                if($result['QS15'] == 'Tidak Suka') {
                    $QS15 = 1;
                }

                if ($result['QS16'] == 'Suka') {
                    $QS16 = 5;
                }
                if ($result['QS16'] == 'Harap') {
                    $QS16 = 4;
                }
                if ($result['QS16'] == 'Netral') {
                    $QS16 = 3;
                }
                if ($result['QS16'] == 'Toleransi') {
                    $QS16 = 2;
                }
                if($result['QS16'] == 'Tidak Suka') {
                    $QS16 = 1;
                }

                if ($result['QS17'] == 'Suka') {
                    $QS17 = 5;
                }
                if ($result['QS17'] == 'Harap') {
                    $QS17 = 4;
                }
                if ($result['QS17'] == 'Netral') {
                    $QS17 = 3;
                }
                if ($result['QS17'] == 'Toleransi') {
                    $QS17 = 2;
                }
                if($result['QS17'] == 'Tidak Suka') {
                    $QS17 = 1;
                }

                if ($result['QS18'] == 'Suka') {
                    $QS18 = 5;
                }
                if ($result['QS18'] == 'Harap') {
                    $QS18 = 4;
                }
                if ($result['QS18'] == 'Netral') {
                    $QS18 = 3;
                }
                if ($result['QS18'] == 'Toleransi') {
                    $QS18 = 2;
                }
                if($result['QS18'] == 'Tidak Suka') {
                    $QS18 = 1;
                }
          $database[] = array(
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
            'total'=> $total = $QS01+$QS02+$QS03+$QS04+$QS05+$QS06+$QS07+$QS08+$QS09+$QS10+$QS11+$QS12+$QS13+$QS14+$QS15+$QS16+$QS17+$QS18
         );
        }
        for ($i=0; $i < count($database); $i++) { 
            // mencari nilai X.Y
            $P1[$i] = $database[$i]['QS01'] * $database[$i]['total'];
            $sumP1 = array_sum($P1);
            $P2[$i] = $database[$i]['QS02'] * $database[$i]['total'];
            $sumP2 = array_sum($P2);
            $P3[$i] = $database[$i]['QS03'] * $database[$i]['total'];
            $sumP3 = array_sum($P3);
            $P4[$i] = $database[$i]['QS04'] * $database[$i]['total'];
            $sumP4 = array_sum($P4);
            $P5[$i] = $database[$i]['QS05'] * $database[$i]['total'];
            $sumP5 = array_sum($P5);
            $P6[$i] = $database[$i]['QS06'] * $database[$i]['total'];
            $sumP6 = array_sum($P6);
            $P7[$i] = $database[$i]['QS07'] * $database[$i]['total'];
            $sumP7 = array_sum($P7);
            $P8[$i] = $database[$i]['QS08'] * $database[$i]['total'];
            $sumP8 = array_sum($P8);
            $P9[$i] = $database[$i]['QS09'] * $database[$i]['total'];
            $sumP9 = array_sum($P9);
            $P10[$i] = $database[$i]['QS10'] * $database[$i]['total'];
            $sumP10 = array_sum($P10);
            $P11[$i] = $database[$i]['QS11'] * $database[$i]['total'];
            $sumP11 = array_sum($P11);
            $P12[$i] = $database[$i]['QS12'] * $database[$i]['total'];
            $sumP12 = array_sum($P12);
            $P13[$i] = $database[$i]['QS13'] * $database[$i]['total'];
            $sumP13 = array_sum($P13);
            $P14[$i] = $database[$i]['QS14'] * $database[$i]['total'];
            $sumP14 = array_sum($P14);
            $P15[$i] = $database[$i]['QS15'] * $database[$i]['total'];
            $sumP15 = array_sum($P15);
            $P16[$i] = $database[$i]['QS16'] * $database[$i]['total'];
            $sumP16 = array_sum($P16);
            $P17[$i] = $database[$i]['QS17'] * $database[$i]['total'];
            $sumP17 = array_sum($P17);
            $P18[$i] = $database[$i]['QS18'] * $database[$i]['total'];
            $sumP18 = array_sum($P18);
            // END Mencari nilai X.Y

            $dataXY[$i] = array(
                'P1' => $P1[$i],
                'P2' => $P2[$i],
                'P3' => $P3[$i],
                'P4' => $P4[$i],
                'P5' => $P5[$i],
                'P6' => $P6[$i],
                'P7' => $P7[$i],
                'P8' => $P8[$i],
                'P9' => $P9[$i],
                'P10' => $P10[$i],
                'P11' => $P11[$i],
                'P12' => $P12[$i],
                'P13' => $P13[$i],
                'P14' => $P14[$i],
                'P15' => $P15[$i],
                'P16' => $P16[$i],
                'P17' => $P17[$i],
                'P18' => $P18[$i],
            );
        }
        $data = array(
            'dataXY'=> $dataXY,
            'sumP1' => $sumP1,
            'sumP2' => $sumP2,
            'sumP3' => $sumP3,
            'sumP4' => $sumP4,
            'sumP5' => $sumP5,
            'sumP6' => $sumP6,
            'sumP7' => $sumP7,
            'sumP8' => $sumP8,
            'sumP9' => $sumP9,
            'sumP10' => $sumP10,
            'sumP11' => $sumP11,
            'sumP12' => $sumP12,
            'sumP13' => $sumP13,
            'sumP14' => $sumP14,
            'sumP15' => $sumP15,
            'sumP16' => $sumP16,
            'sumP17' => $sumP17,
            'sumP18' => $sumP18,
        );
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}
function Xkuadratfungsional()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
                if ($result['QS01'] == 'Suka') {
                    $QS01 = 5;
                }
                if ($result['QS01'] == 'Harap') {
                    $QS01 = 4;
                }
                if ($result['QS01'] == 'Netral') {
                    $QS01 = 3;
                }
                if ($result['QS01'] == 'Toleransi') {
                    $QS01 = 2;
                }
                if ($result['QS01'] == 'Tidak Suka'){
                    $QS01 = 1;
                }

                if ($result['QS02'] == 'Suka') {
                    $QS02 = 5;
                }
                if ($result['QS02'] == 'Harap') {
                    $QS02 = 4;
                }
                if ($result['QS02'] == 'Netral') {
                    $QS02 = 3;
                }
                if ($result['QS02'] == 'Toleransi') {
                    $QS02 = 2;
                }
                if($result['QS02'] == 'Tidak Suka') {
                    $QS02 = 1;
                }

                if ($result['QS03'] == 'Suka') {
                    $QS03 = 5;
                }
                if ($result['QS03'] == 'Harap') {
                    $QS03 = 4;
                }
                if ($result['QS03'] == 'Netral') {
                    $QS03 = 3;
                }
                if ($result['QS03'] == 'Toleransi') {
                    $QS03 = 2;
                }
                if($result['QS03'] == 'Tidak Suka') {
                    $QS03 = 1;
                }

                if ($result['QS04'] == 'Suka') {
                    $QS04 = 5;
                }
                if ($result['QS04'] == 'Harap') {
                    $QS04 = 4;
                }
                if ($result['QS04'] == 'Netral') {
                    $QS04 = 3;
                }
                if ($result['QS04'] == 'Toleransi') {
                    $QS04 = 2;
                }
                if($result['QS04'] == 'Tidak Suka') {
                    $QS04 = 1;
                }

                if ($result['QS05'] == 'Suka') {
                    $QS05 = 5;
                }
                if ($result['QS05'] == 'Harap') {
                    $QS05 = 4;
                }
                if ($result['QS05'] == 'Netral') {
                    $QS05 = 3;
                }
                if ($result['QS05'] == 'Toleransi') {
                    $QS05 = 2;
                }
                if($result['QS05'] == 'Tidak Suka') {
                    $QS05 = 1;
                }

                if ($result['QS06'] == 'Suka') {
                    $QS06 = 5;
                }
                if ($result['QS06'] == 'Harap') {
                    $QS06 = 4;
                }
                if ($result['QS06'] == 'Netral') {
                    $QS06 = 3;
                }
                if ($result['QS06'] == 'Toleransi') {
                    $QS06 = 2;
                }
                if($result['QS06'] == 'Tidak Suka') {
                    $QS06 = 1;
                }

                if ($result['QS07'] == 'Suka') {
                    $QS07 = 5;
                }
                if ($result['QS07'] == 'Harap') {
                    $QS07 = 4;
                }
                if ($result['QS07'] == 'Netral') {
                    $QS07 = 3;
                }
                if ($result['QS07'] == 'Toleransi') {
                    $QS07 = 2;
                }
                if($result['QS07'] == 'Tidak Suka') {
                    $QS07 = 1;
                }

                if ($result['QS08'] == 'Suka') {
                    $QS08 = 5;
                }
                if ($result['QS08'] == 'Harap') {
                    $QS08 = 4;
                }
                if ($result['QS08'] == 'Netral') {
                    $QS08 = 3;
                }
                if ($result['QS08'] == 'Toleransi') {
                    $QS08 = 2;
                }
                if($result['QS08'] == 'Tidak Suka') {
                    $QS08 = 1;
                }

                if ($result['QS09'] == 'Suka') {
                    $QS09 = 5;
                }
                if ($result['QS09'] == 'Harap') {
                    $QS09 = 4;
                }
                if ($result['QS09'] == 'Netral') {
                    $QS09 = 3;
                }
                if ($result['QS09'] == 'Toleransi') {
                    $QS09 = 2;
                }
                if($result['QS09'] == 'Tidak Suka') {
                    $QS09 = 1;
                }

                if ($result['QS10'] == 'Suka') {
                    $QS10 = 5;
                }
                if ($result['QS10'] == 'Harap') {
                    $QS10 = 4;
                }
                if ($result['QS10'] == 'Netral') {
                    $QS10 = 3;
                }
                if ($result['QS10'] == 'Toleransi') {
                    $QS10 = 2;
                }
                if($result['QS10'] == 'Tidak Suka') {
                    $QS10 = 1;
                }

                if ($result['QS11'] == 'Suka') {
                    $QS11 = 5;
                }
                if ($result['QS11'] == 'Harap') {
                    $QS11 = 4;
                }
                if ($result['QS11'] == 'Netral') {
                    $QS11 = 3;
                }
                if ($result['QS11'] == 'Toleransi') {
                    $QS11 = 2;
                }
                if ($result['QS11'] == 'Tidak Suka'){
                    $QS11 = 1;
                }

                if ($result['QS12'] == 'Suka') {
                    $QS12 = 5;
                }
                if ($result['QS12'] == 'Harap') {
                    $QS12 = 4;
                }
                if ($result['QS12'] == 'Netral') {
                    $QS12 = 3;
                }
                if ($result['QS12'] == 'Toleransi') {
                    $QS12 = 2;
                }
                if($result['QS12'] == 'Tidak Suka') {
                    $QS12 = 1;
                }

                if ($result['QS13'] == 'Suka') {
                    $QS13 = 5;
                }
                if ($result['QS13'] == 'Harap') {
                    $QS13 = 4;
                }
                if ($result['QS13'] == 'Netral') {
                    $QS13 = 3;
                }
                if ($result['QS13'] == 'Toleransi') {
                    $QS13 = 2;
                }
                if($result['QS13'] == 'Tidak Suka') {
                    $QS13 = 1;
                }

                if ($result['QS14'] == 'Suka') {
                    $QS14 = 5;
                }
                if ($result['QS14'] == 'Harap') {
                    $QS14 = 4;
                }
                if ($result['QS14'] == 'Netral') {
                    $QS14 = 3;
                }
                if ($result['QS14'] == 'Toleransi') {
                    $QS14 = 2;
                }
                if($result['QS14'] == 'Tidak Suka') {
                    $QS14 = 1;
                }

                if ($result['QS15'] == 'Suka') {
                    $QS15 = 5;
                }
                if ($result['QS15'] == 'Harap') {
                    $QS15 = 4;
                }
                if ($result['QS15'] == 'Netral') {
                    $QS15 = 3;
                }
                if ($result['QS15'] == 'Toleransi') {
                    $QS15 = 2;
                }
                if($result['QS15'] == 'Tidak Suka') {
                    $QS15 = 1;
                }

                if ($result['QS16'] == 'Suka') {
                    $QS16 = 5;
                }
                if ($result['QS16'] == 'Harap') {
                    $QS16 = 4;
                }
                if ($result['QS16'] == 'Netral') {
                    $QS16 = 3;
                }
                if ($result['QS16'] == 'Toleransi') {
                    $QS16 = 2;
                }
                if($result['QS16'] == 'Tidak Suka') {
                    $QS16 = 1;
                }

                if ($result['QS17'] == 'Suka') {
                    $QS17 = 5;
                }
                if ($result['QS17'] == 'Harap') {
                    $QS17 = 4;
                }
                if ($result['QS17'] == 'Netral') {
                    $QS17 = 3;
                }
                if ($result['QS17'] == 'Toleransi') {
                    $QS17 = 2;
                }
                if($result['QS17'] == 'Tidak Suka') {
                    $QS17 = 1;
                }

                if ($result['QS18'] == 'Suka') {
                    $QS18 = 5;
                }
                if ($result['QS18'] == 'Harap') {
                    $QS18 = 4;
                }
                if ($result['QS18'] == 'Netral') {
                    $QS18 = 3;
                }
                if ($result['QS18'] == 'Toleransi') {
                    $QS18 = 2;
                }
                if($result['QS18'] == 'Tidak Suka') {
                    $QS18 = 1;
                }
          $database[] = array(
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
            'total'=> $total = $QS01+$QS02+$QS03+$QS04+$QS05+$QS06+$QS07+$QS08+$QS09+$QS10+$QS11+$QS12+$QS13+$QS14+$QS15+$QS16+$QS17+$QS18
         );
        }
        for ($i=0; $i < count($database); $i++) { 
            // Mencari nilai X^2 
            $Xpangkat1[$i] = pow($database[$i]['QS01'], 2);
            $pangkatX1 = array_sum($Xpangkat1);
            $Xpangkat2[$i] = pow($database[$i]['QS02'], 2);
            $pangkatX2 = array_sum($Xpangkat2);
            $Xpangkat3[$i] = pow($database[$i]['QS03'], 2);
            $pangkatX3 = array_sum($Xpangkat3);
            $Xpangkat4[$i] = pow($database[$i]['QS04'], 2);
            $pangkatX4 = array_sum($Xpangkat4);
            $Xpangkat5[$i] = pow($database[$i]['QS05'], 2);
            $pangkatX5 = array_sum($Xpangkat5);
            $Xpangkat6[$i] = pow($database[$i]['QS06'], 2);
            $pangkatX6 = array_sum($Xpangkat6);
            $Xpangkat7[$i] = pow($database[$i]['QS07'], 2);
            $pangkatX7 = array_sum($Xpangkat7);
            $Xpangkat8[$i] = pow($database[$i]['QS08'], 2);
            $pangkatX8 = array_sum($Xpangkat8);
            $Xpangkat9[$i] = pow($database[$i]['QS09'], 2);
            $pangkatX9 = array_sum($Xpangkat9);
            $Xpangkat10[$i] = pow($database[$i]['QS10'], 2);
            $pangkatX10 = array_sum($Xpangkat10);
            $Xpangkat11[$i] = pow($database[$i]['QS11'], 2);
            $pangkatX11 = array_sum($Xpangkat11);
            $Xpangkat12[$i] = pow($database[$i]['QS12'], 2);
            $pangkatX12 = array_sum($Xpangkat12);
            $Xpangkat13[$i] = pow($database[$i]['QS13'], 2);
            $pangkatX13 = array_sum($Xpangkat13);
            $Xpangkat14[$i] = pow($database[$i]['QS14'], 2);
            $pangkatX14 = array_sum($Xpangkat14);
            $Xpangkat15[$i] = pow($database[$i]['QS15'], 2);
            $pangkatX15 = array_sum($Xpangkat15);
            $Xpangkat16[$i] = pow($database[$i]['QS16'], 2);
            $pangkatX16 = array_sum($Xpangkat16);
            $Xpangkat17[$i] = pow($database[$i]['QS17'], 2);
            $pangkatX17 = array_sum($Xpangkat17);
            $Xpangkat18[$i] = pow($database[$i]['QS18'], 2);
            $pangkatX18 = array_sum($Xpangkat18);
            $totalpangkat[$i] = pow($database[$i]['total'], 2);
            $Ykuadrat = array_sum($totalpangkat);

            $dataXkuadrat[$i] = array(
                'P1' => $Xpangkat1[$i],
                'P2' => $Xpangkat2[$i],
                'P3' => $Xpangkat3[$i],
                'P4' => $Xpangkat4[$i],
                'P5' => $Xpangkat5[$i],
                'P6' => $Xpangkat6[$i],
                'P7' => $Xpangkat7[$i],
                'P8' => $Xpangkat8[$i],
                'P9' => $Xpangkat9[$i],
                'P10' => $Xpangkat10[$i],
                'P11' => $Xpangkat11[$i],
                'P12' => $Xpangkat12[$i],
                'P13' => $Xpangkat13[$i],
                'P14' => $Xpangkat14[$i],
                'P15' => $Xpangkat15[$i],
                'P16' => $Xpangkat16[$i],
                'P17' => $Xpangkat17[$i],
                'P18' => $Xpangkat18[$i],
                'Y' => $totalpangkat[$i]
            );
        }
        $data = array(
        'Xkuadrat' => $dataXkuadrat,
        'pangkatX1'=>$pangkatX1,
        'pangkatX2'=>$pangkatX2,
        'pangkatX3'=>$pangkatX3,
        'pangkatX4'=>$pangkatX4,
        'pangkatX5'=>$pangkatX5,
        'pangkatX6'=>$pangkatX6,
        'pangkatX7'=>$pangkatX7,
        'pangkatX8'=>$pangkatX8,
        'pangkatX9'=>$pangkatX9,
        'pangkatX10'=>$pangkatX10,
        'pangkatX11'=>$pangkatX11,
        'pangkatX12'=>$pangkatX12,
        'pangkatX13'=>$pangkatX13,
        'pangkatX14'=>$pangkatX14,
        'pangkatX15'=>$pangkatX15,
        'pangkatX16'=>$pangkatX16,
        'pangkatX17'=>$pangkatX17,
        'pangkatX18'=>$pangkatX18,
        'Ykuadrat'=>$Ykuadrat
        );
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}
// END mencari validitas pertanyaan fungsional












// Mencari validitas quesioner difungsional
function TampilkanDatadis()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT name, disQS01, disQS02, disQS03, disQS04, disQS05, disQS06, disQS07, disQS08, disQS09, disQS10, disQS11, disQS12, disQS13, disQS14, disQS15, disQS16, disQS17, disQS18 FROM jawaban LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            if ($result['disQS01'] == 'Suka') {
                $QS01 = 5;
            }
            if ($result['disQS01'] == 'Harap') {
                $QS01 = 4;
            }
            if ($result['disQS01'] == 'Netral') {
                $QS01 = 3;
            }
            if ($result['disQS01'] == 'Toleransi') {
                $QS01 = 2;
            }
            if ($result['disQS01'] == 'Tidak Suka'){
                $QS01 = 1;
            }

            if ($result['disQS02'] == 'Suka') {
                $QS02 = 5;
            }
            if ($result['disQS02'] == 'Harap') {
                $QS02 = 4;
            }
            if ($result['disQS02'] == 'Netral') {
                $QS02 = 3;
            }
            if ($result['disQS02'] == 'Toleransi') {
                $QS02 = 2;
            }
            if($result['disQS02'] == 'Tidak Suka') {
                $QS02 = 1;
            }

            if ($result['disQS03'] == 'Suka') {
                $QS03 = 5;
            }
            if ($result['disQS03'] == 'Harap') {
                $QS03 = 4;
            }
            if ($result['disQS03'] == 'Netral') {
                $QS03 = 3;
            }
            if ($result['disQS03'] == 'Toleransi') {
                $QS03 = 2;
            }
            if($result['disQS03'] == 'Tidak Suka') {
                $QS03 = 1;
            }

            if ($result['disQS04'] == 'Suka') {
                $QS04 = 5;
            }
            if ($result['disQS04'] == 'Harap') {
                $QS04 = 4;
            }
            if ($result['disQS04'] == 'Netral') {
                $QS04 = 3;
            }
            if ($result['disQS04'] == 'Toleransi') {
                $QS04 = 2;
            }
            if($result['disQS04'] == 'Tidak Suka') {
                $QS04 = 1;
            }

            if ($result['disQS05'] == 'Suka') {
                $QS05 = 5;
            }
            if ($result['disQS05'] == 'Harap') {
                $QS05 = 4;
            }
            if ($result['disQS05'] == 'Netral') {
                $QS05 = 3;
            }
            if ($result['disQS05'] == 'Toleransi') {
                $QS05 = 2;
            }
            if($result['disQS05'] == 'Tidak Suka') {
                $QS05 = 1;
            }

            if ($result['disQS06'] == 'Suka') {
                $QS06 = 5;
            }
            if ($result['disQS06'] == 'Harap') {
                $QS06 = 4;
            }
            if ($result['disQS06'] == 'Netral') {
                $QS06 = 3;
            }
            if ($result['disQS06'] == 'Toleransi') {
                $QS06 = 2;
            }
            if($result['disQS06'] == 'Tidak Suka') {
                $QS06 = 1;
            }

            if ($result['disQS07'] == 'Suka') {
                $QS07 = 5;
            }
            if ($result['disQS07'] == 'Harap') {
                $QS07 = 4;
            }
            if ($result['disQS07'] == 'Netral') {
                $QS07 = 3;
            }
            if ($result['disQS07'] == 'Toleransi') {
                $QS07 = 2;
            }
            if($result['disQS07'] == 'Tidak Suka') {
                $QS07 = 1;
            }

            if ($result['disQS08'] == 'Suka') {
                $QS08 = 5;
            }
            if ($result['disQS08'] == 'Harap') {
                $QS08 = 4;
            }
            if ($result['disQS08'] == 'Netral') {
                $QS08 = 3;
            }
            if ($result['disQS08'] == 'Toleransi') {
                $QS08 = 2;
            }
            if($result['disQS08'] == 'Tidak Suka') {
                $QS08 = 1;
            }

            if ($result['disQS09'] == 'Suka') {
                $QS09 = 5;
            }
            if ($result['disQS09'] == 'Harap') {
                $QS09 = 4;
            }
            if ($result['disQS09'] == 'Netral') {
                $QS09 = 3;
            }
            if ($result['disQS09'] == 'Toleransi') {
                $QS09 = 2;
            }
            if($result['disQS09'] == 'Tidak Suka') {
                $QS09 = 1;
            }

            if ($result['disQS10'] == 'Suka') {
                $QS10 = 5;
            }
            if ($result['disQS10'] == 'Harap') {
                $QS10 = 4;
            }
            if ($result['disQS10'] == 'Netral') {
                $QS10 = 3;
            }
            if ($result['disQS10'] == 'Toleransi') {
                $QS10 = 2;
            }
            if($result['disQS10'] == 'Tidak Suka') {
                $QS10 = 1;
            }

            if ($result['disQS11'] == 'Suka') {
                $QS11 = 5;
            }
            if ($result['disQS11'] == 'Harap') {
                $QS11 = 4;
            }
            if ($result['disQS11'] == 'Netral') {
                $QS11 = 3;
            }
            if ($result['disQS11'] == 'Toleransi') {
                $QS11 = 2;
            }
            if ($result['disQS11'] == 'Tidak Suka'){
                $QS11 = 1;
            }

            if ($result['disQS12'] == 'Suka') {
                $QS12 = 5;
            }
            if ($result['disQS12'] == 'Harap') {
                $QS12 = 4;
            }
            if ($result['disQS12'] == 'Netral') {
                $QS12 = 3;
            }
            if ($result['disQS12'] == 'Toleransi') {
                $QS12 = 2;
            }
            if($result['disQS12'] == 'Tidak Suka') {
                $QS12 = 1;
            }

            if ($result['disQS13'] == 'Suka') {
                $QS13 = 5;
            }
            if ($result['disQS13'] == 'Harap') {
                $QS13 = 4;
            }
            if ($result['disQS13'] == 'Netral') {
                $QS13 = 3;
            }
            if ($result['disQS13'] == 'Toleransi') {
                $QS13 = 2;
            }
            if($result['disQS13'] == 'Tidak Suka') {
                $QS13 = 1;
            }

            if ($result['disQS14'] == 'Suka') {
                $QS14 = 5;
            }
            if ($result['disQS14'] == 'Harap') {
                $QS14 = 4;
            }
            if ($result['disQS14'] == 'Netral') {
                $QS14 = 3;
            }
            if ($result['disQS14'] == 'Toleransi') {
                $QS14 = 2;
            }
            if($result['disQS14'] == 'Tidak Suka') {
                $QS14 = 1;
            }

            if ($result['disQS15'] == 'Suka') {
                $QS15 = 5;
            }
            if ($result['disQS15'] == 'Harap') {
                $QS15 = 4;
            }
            if ($result['disQS15'] == 'Netral') {
                $QS15 = 3;
            }
            if ($result['disQS15'] == 'Toleransi') {
                $QS15 = 2;
            }
            if($result['disQS15'] == 'Tidak Suka') {
                $QS15 = 1;
            }

            if ($result['disQS16'] == 'Suka') {
                $QS16 = 5;
            }
            if ($result['disQS16'] == 'Harap') {
                $QS16 = 4;
            }
            if ($result['disQS16'] == 'Netral') {
                $QS16 = 3;
            }
            if ($result['disQS16'] == 'Toleransi') {
                $QS16 = 2;
            }
            if($result['disQS16'] == 'Tidak Suka') {
                $QS16 = 1;
            }

            if ($result['disQS17'] == 'Suka') {
                $QS17 = 5;
            }
            if ($result['disQS17'] == 'Harap') {
                $QS17 = 4;
            }
            if ($result['disQS17'] == 'Netral') {
                $QS17 = 3;
            }
            if ($result['disQS17'] == 'Toleransi') {
                $QS17 = 2;
            }
            if($result['disQS17'] == 'Tidak Suka') {
                $QS17 = 1;
            }

            if ($result['disQS18'] == 'Suka') {
                $QS18 = 5;
            }
            if ($result['disQS18'] == 'Harap') {
                $QS18 = 4;
            }
            if ($result['disQS18'] == 'Netral') {
                $QS18 = 3;
            }
            if ($result['disQS18'] == 'Toleransi') {
                $QS18 = 2;
            }
            if($result['disQS18'] == 'Tidak Suka') {
                $QS18 = 1;
            }
          $data[] = array(
            'nama' => $result['name'],
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
            'total'=> $total = $QS01+$QS02+$QS03+$QS04+$QS05+$QS06+$QS07+$QS08+$QS09+$QS10+$QS11+$QS12+$QS13+$QS14+$QS15+$QS16+$QS17+$QS18
         );
        }
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}

function cariSigmaXdanYdis()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            if ($result['disQS01'] == 'Suka') {
                $QS01 = 5;
            }
            if ($result['disQS01'] == 'Harap') {
                $QS01 = 4;
            }
            if ($result['disQS01'] == 'Netral') {
                $QS01 = 3;
            }
            if ($result['disQS01'] == 'Toleransi') {
                $QS01 = 2;
            }
            if ($result['disQS01'] == 'Tidak Suka'){
                $QS01 = 1;
            }

            if ($result['disQS02'] == 'Suka') {
                $QS02 = 5;
            }
            if ($result['disQS02'] == 'Harap') {
                $QS02 = 4;
            }
            if ($result['disQS02'] == 'Netral') {
                $QS02 = 3;
            }
            if ($result['disQS02'] == 'Toleransi') {
                $QS02 = 2;
            }
            if($result['disQS02'] == 'Tidak Suka') {
                $QS02 = 1;
            }

            if ($result['disQS03'] == 'Suka') {
                $QS03 = 5;
            }
            if ($result['disQS03'] == 'Harap') {
                $QS03 = 4;
            }
            if ($result['disQS03'] == 'Netral') {
                $QS03 = 3;
            }
            if ($result['disQS03'] == 'Toleransi') {
                $QS03 = 2;
            }
            if($result['disQS03'] == 'Tidak Suka') {
                $QS03 = 1;
            }

            if ($result['disQS04'] == 'Suka') {
                $QS04 = 5;
            }
            if ($result['disQS04'] == 'Harap') {
                $QS04 = 4;
            }
            if ($result['disQS04'] == 'Netral') {
                $QS04 = 3;
            }
            if ($result['disQS04'] == 'Toleransi') {
                $QS04 = 2;
            }
            if($result['disQS04'] == 'Tidak Suka') {
                $QS04 = 1;
            }

            if ($result['disQS05'] == 'Suka') {
                $QS05 = 5;
            }
            if ($result['disQS05'] == 'Harap') {
                $QS05 = 4;
            }
            if ($result['disQS05'] == 'Netral') {
                $QS05 = 3;
            }
            if ($result['disQS05'] == 'Toleransi') {
                $QS05 = 2;
            }
            if($result['disQS05'] == 'Tidak Suka') {
                $QS05 = 1;
            }

            if ($result['disQS06'] == 'Suka') {
                $QS06 = 5;
            }
            if ($result['disQS06'] == 'Harap') {
                $QS06 = 4;
            }
            if ($result['disQS06'] == 'Netral') {
                $QS06 = 3;
            }
            if ($result['disQS06'] == 'Toleransi') {
                $QS06 = 2;
            }
            if($result['disQS06'] == 'Tidak Suka') {
                $QS06 = 1;
            }

            if ($result['disQS07'] == 'Suka') {
                $QS07 = 5;
            }
            if ($result['disQS07'] == 'Harap') {
                $QS07 = 4;
            }
            if ($result['disQS07'] == 'Netral') {
                $QS07 = 3;
            }
            if ($result['disQS07'] == 'Toleransi') {
                $QS07 = 2;
            }
            if($result['disQS07'] == 'Tidak Suka') {
                $QS07 = 1;
            }

            if ($result['disQS08'] == 'Suka') {
                $QS08 = 5;
            }
            if ($result['disQS08'] == 'Harap') {
                $QS08 = 4;
            }
            if ($result['disQS08'] == 'Netral') {
                $QS08 = 3;
            }
            if ($result['disQS08'] == 'Toleransi') {
                $QS08 = 2;
            }
            if($result['disQS08'] == 'Tidak Suka') {
                $QS08 = 1;
            }

            if ($result['disQS09'] == 'Suka') {
                $QS09 = 5;
            }
            if ($result['disQS09'] == 'Harap') {
                $QS09 = 4;
            }
            if ($result['disQS09'] == 'Netral') {
                $QS09 = 3;
            }
            if ($result['disQS09'] == 'Toleransi') {
                $QS09 = 2;
            }
            if($result['disQS09'] == 'Tidak Suka') {
                $QS09 = 1;
            }

            if ($result['disQS10'] == 'Suka') {
                $QS10 = 5;
            }
            if ($result['disQS10'] == 'Harap') {
                $QS10 = 4;
            }
            if ($result['disQS10'] == 'Netral') {
                $QS10 = 3;
            }
            if ($result['disQS10'] == 'Toleransi') {
                $QS10 = 2;
            }
            if($result['disQS10'] == 'Tidak Suka') {
                $QS10 = 1;
            }

            if ($result['disQS11'] == 'Suka') {
                $QS11 = 5;
            }
            if ($result['disQS11'] == 'Harap') {
                $QS11 = 4;
            }
            if ($result['disQS11'] == 'Netral') {
                $QS11 = 3;
            }
            if ($result['disQS11'] == 'Toleransi') {
                $QS11 = 2;
            }
            if ($result['disQS11'] == 'Tidak Suka'){
                $QS11 = 1;
            }

            if ($result['disQS12'] == 'Suka') {
                $QS12 = 5;
            }
            if ($result['disQS12'] == 'Harap') {
                $QS12 = 4;
            }
            if ($result['disQS12'] == 'Netral') {
                $QS12 = 3;
            }
            if ($result['disQS12'] == 'Toleransi') {
                $QS12 = 2;
            }
            if($result['disQS12'] == 'Tidak Suka') {
                $QS12 = 1;
            }

            if ($result['disQS13'] == 'Suka') {
                $QS13 = 5;
            }
            if ($result['disQS13'] == 'Harap') {
                $QS13 = 4;
            }
            if ($result['disQS13'] == 'Netral') {
                $QS13 = 3;
            }
            if ($result['disQS13'] == 'Toleransi') {
                $QS13 = 2;
            }
            if($result['disQS13'] == 'Tidak Suka') {
                $QS13 = 1;
            }

            if ($result['disQS14'] == 'Suka') {
                $QS14 = 5;
            }
            if ($result['disQS14'] == 'Harap') {
                $QS14 = 4;
            }
            if ($result['disQS14'] == 'Netral') {
                $QS14 = 3;
            }
            if ($result['disQS14'] == 'Toleransi') {
                $QS14 = 2;
            }
            if($result['disQS14'] == 'Tidak Suka') {
                $QS14 = 1;
            }

            if ($result['disQS15'] == 'Suka') {
                $QS15 = 5;
            }
            if ($result['disQS15'] == 'Harap') {
                $QS15 = 4;
            }
            if ($result['disQS15'] == 'Netral') {
                $QS15 = 3;
            }
            if ($result['disQS15'] == 'Toleransi') {
                $QS15 = 2;
            }
            if($result['disQS15'] == 'Tidak Suka') {
                $QS15 = 1;
            }

            if ($result['disQS16'] == 'Suka') {
                $QS16 = 5;
            }
            if ($result['disQS16'] == 'Harap') {
                $QS16 = 4;
            }
            if ($result['disQS16'] == 'Netral') {
                $QS16 = 3;
            }
            if ($result['disQS16'] == 'Toleransi') {
                $QS16 = 2;
            }
            if($result['disQS16'] == 'Tidak Suka') {
                $QS16 = 1;
            }

            if ($result['disQS17'] == 'Suka') {
                $QS17 = 5;
            }
            if ($result['disQS17'] == 'Harap') {
                $QS17 = 4;
            }
            if ($result['disQS17'] == 'Netral') {
                $QS17 = 3;
            }
            if ($result['disQS17'] == 'Toleransi') {
                $QS17 = 2;
            }
            if($result['disQS17'] == 'Tidak Suka') {
                $QS17 = 1;
            }

            if ($result['disQS18'] == 'Suka') {
                $QS18 = 5;
            }
            if ($result['disQS18'] == 'Harap') {
                $QS18 = 4;
            }
            if ($result['disQS18'] == 'Netral') {
                $QS18 = 3;
            }
            if ($result['disQS18'] == 'Toleransi') {
                $QS18 = 2;
            }
            if($result['disQS18'] == 'Tidak Suka') {
                $QS18 = 1;
            }
          $database[] = array(
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
            'total'=> $total = $QS01+$QS02+$QS03+$QS04+$QS05+$QS06+$QS07+$QS08+$QS09+$QS10+$QS11+$QS12+$QS13+$QS14+$QS15+$QS16+$QS17+$QS18
         );
        }
        for ($i=0; $i < count($database); $i++) { 
            // MENCARI NILAI X
            $X01[$i] = $database[$i]['QS01'];
            $sumX01 = array_sum($X01);
            $sumXpangkat01 = pow($sumX01, 2);
            $X02[$i] = $database[$i]['QS02'];
            $sumX02 = array_sum($X02);
            $sumXpangkat02 = pow($sumX02, 2);
            $X03[$i] = $database[$i]['QS03'];
            $sumX03 = array_sum($X03);
            $sumXpangkat03 = pow($sumX03, 2);
            $X04[$i] = $database[$i]['QS04'];
            $sumX04 = array_sum($X04);
            $sumXpangkat04 = pow($sumX04, 2);
            $X05[$i] = $database[$i]['QS05'];
            $sumX05 = array_sum($X05);
            $sumXpangkat05 = pow($sumX05, 2);
            $X06[$i] = $database[$i]['QS06'];
            $sumX06 = array_sum($X06);
            $sumXpangkat06 = pow($sumX06, 2);
            $X07[$i] = $database[$i]['QS07'];
            $sumX07 = array_sum($X07);
            $sumXpangkat07 = pow($sumX07, 2);
            $X08[$i] = $database[$i]['QS08'];
            $sumX08 = array_sum($X08);
            $sumXpangkat08 = pow($sumX08, 2);
            $X09[$i] = $database[$i]['QS09'];
            $sumX09 = array_sum($X09);
            $sumXpangkat09 = pow($sumX09, 2);
            $X10[$i] = $database[$i]['QS10'];
            $sumX10 = array_sum($X10);
            $sumXpangkat10 = pow($sumX10, 2);
            $X11[$i] = $database[$i]['QS11'];
            $sumX11 = array_sum($X11);
            $sumXpangkat11 = pow($sumX11, 2);
            $X12[$i] = $database[$i]['QS12'];
            $sumX12 = array_sum($X12);
            $sumXpangkat12 = pow($sumX12, 2);
            $X13[$i] = $database[$i]['QS13'];
            $sumX13 = array_sum($X13);
            $sumXpangkat13 = pow($sumX13, 2);
            $X14[$i] = $database[$i]['QS14'];
            $sumX14 = array_sum($X14);
            $sumXpangkat14 = pow($sumX14, 2);
            $X15[$i] = $database[$i]['QS15'];
            $sumX15 = array_sum($X15);
            $sumXpangkat15 = pow($sumX15, 2);
            $X16[$i] = $database[$i]['QS16'];
            $sumX16 = array_sum($X16);
            $sumXpangkat16 = pow($sumX16, 2);
            $X17[$i] = $database[$i]['QS17'];
            $sumX17 = array_sum($X17);
            $sumXpangkat17 = pow($sumX17, 2);
            $X18[$i] = $database[$i]['QS18'];
            $sumX18 = array_sum($X18);
            $sumXpangkat18 = pow($sumX18, 2);
            // END MENCARI NILAI X

             // MENCARI NILAI Y
             $Y01[$i] = $database[$i]['total'];
             $sumY = array_sum($Y01);
             // akhir mencari nilai Y
        }
        $data = array(
            'X01' => $sumX01,
            'X02' => $sumX02,
            'X03' => $sumX03,
            'X04' => $sumX04,
            'X05' => $sumX05,
            'X06' => $sumX06,
            'X07' => $sumX07,
            'X08' => $sumX08,
            'X09' => $sumX09,
            'X10' => $sumX10,
            'X11' => $sumX11,
            'X12' => $sumX12,
            'X13' => $sumX13,
            'X14' => $sumX14,
            'X15' => $sumX15,
            'X16' => $sumX16,
            'X17' => $sumX17,
            'X18' => $sumX18,
            'SigmaY' => $sumY,
        );
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}

function XYdisfungsional()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            if ($result['disQS01'] == 'Suka') {
                $QS01 = 5;
            }
            if ($result['disQS01'] == 'Harap') {
                $QS01 = 4;
            }
            if ($result['disQS01'] == 'Netral') {
                $QS01 = 3;
            }
            if ($result['disQS01'] == 'Toleransi') {
                $QS01 = 2;
            }
            if ($result['disQS01'] == 'Tidak Suka'){
                $QS01 = 1;
            }

            if ($result['disQS02'] == 'Suka') {
                $QS02 = 5;
            }
            if ($result['disQS02'] == 'Harap') {
                $QS02 = 4;
            }
            if ($result['disQS02'] == 'Netral') {
                $QS02 = 3;
            }
            if ($result['disQS02'] == 'Toleransi') {
                $QS02 = 2;
            }
            if($result['disQS02'] == 'Tidak Suka') {
                $QS02 = 1;
            }

            if ($result['disQS03'] == 'Suka') {
                $QS03 = 5;
            }
            if ($result['disQS03'] == 'Harap') {
                $QS03 = 4;
            }
            if ($result['disQS03'] == 'Netral') {
                $QS03 = 3;
            }
            if ($result['disQS03'] == 'Toleransi') {
                $QS03 = 2;
            }
            if($result['disQS03'] == 'Tidak Suka') {
                $QS03 = 1;
            }

            if ($result['disQS04'] == 'Suka') {
                $QS04 = 5;
            }
            if ($result['disQS04'] == 'Harap') {
                $QS04 = 4;
            }
            if ($result['disQS04'] == 'Netral') {
                $QS04 = 3;
            }
            if ($result['disQS04'] == 'Toleransi') {
                $QS04 = 2;
            }
            if($result['disQS04'] == 'Tidak Suka') {
                $QS04 = 1;
            }

            if ($result['disQS05'] == 'Suka') {
                $QS05 = 5;
            }
            if ($result['disQS05'] == 'Harap') {
                $QS05 = 4;
            }
            if ($result['disQS05'] == 'Netral') {
                $QS05 = 3;
            }
            if ($result['disQS05'] == 'Toleransi') {
                $QS05 = 2;
            }
            if($result['disQS05'] == 'Tidak Suka') {
                $QS05 = 1;
            }

            if ($result['disQS06'] == 'Suka') {
                $QS06 = 5;
            }
            if ($result['disQS06'] == 'Harap') {
                $QS06 = 4;
            }
            if ($result['disQS06'] == 'Netral') {
                $QS06 = 3;
            }
            if ($result['disQS06'] == 'Toleransi') {
                $QS06 = 2;
            }
            if($result['disQS06'] == 'Tidak Suka') {
                $QS06 = 1;
            }

            if ($result['disQS07'] == 'Suka') {
                $QS07 = 5;
            }
            if ($result['disQS07'] == 'Harap') {
                $QS07 = 4;
            }
            if ($result['disQS07'] == 'Netral') {
                $QS07 = 3;
            }
            if ($result['disQS07'] == 'Toleransi') {
                $QS07 = 2;
            }
            if($result['disQS07'] == 'Tidak Suka') {
                $QS07 = 1;
            }

            if ($result['disQS08'] == 'Suka') {
                $QS08 = 5;
            }
            if ($result['disQS08'] == 'Harap') {
                $QS08 = 4;
            }
            if ($result['disQS08'] == 'Netral') {
                $QS08 = 3;
            }
            if ($result['disQS08'] == 'Toleransi') {
                $QS08 = 2;
            }
            if($result['disQS08'] == 'Tidak Suka') {
                $QS08 = 1;
            }

            if ($result['disQS09'] == 'Suka') {
                $QS09 = 5;
            }
            if ($result['disQS09'] == 'Harap') {
                $QS09 = 4;
            }
            if ($result['disQS09'] == 'Netral') {
                $QS09 = 3;
            }
            if ($result['disQS09'] == 'Toleransi') {
                $QS09 = 2;
            }
            if($result['disQS09'] == 'Tidak Suka') {
                $QS09 = 1;
            }

            if ($result['disQS10'] == 'Suka') {
                $QS10 = 5;
            }
            if ($result['disQS10'] == 'Harap') {
                $QS10 = 4;
            }
            if ($result['disQS10'] == 'Netral') {
                $QS10 = 3;
            }
            if ($result['disQS10'] == 'Toleransi') {
                $QS10 = 2;
            }
            if($result['disQS10'] == 'Tidak Suka') {
                $QS10 = 1;
            }

            if ($result['disQS11'] == 'Suka') {
                $QS11 = 5;
            }
            if ($result['disQS11'] == 'Harap') {
                $QS11 = 4;
            }
            if ($result['disQS11'] == 'Netral') {
                $QS11 = 3;
            }
            if ($result['disQS11'] == 'Toleransi') {
                $QS11 = 2;
            }
            if ($result['disQS11'] == 'Tidak Suka'){
                $QS11 = 1;
            }

            if ($result['disQS12'] == 'Suka') {
                $QS12 = 5;
            }
            if ($result['disQS12'] == 'Harap') {
                $QS12 = 4;
            }
            if ($result['disQS12'] == 'Netral') {
                $QS12 = 3;
            }
            if ($result['disQS12'] == 'Toleransi') {
                $QS12 = 2;
            }
            if($result['disQS12'] == 'Tidak Suka') {
                $QS12 = 1;
            }

            if ($result['disQS13'] == 'Suka') {
                $QS13 = 5;
            }
            if ($result['disQS13'] == 'Harap') {
                $QS13 = 4;
            }
            if ($result['disQS13'] == 'Netral') {
                $QS13 = 3;
            }
            if ($result['disQS13'] == 'Toleransi') {
                $QS13 = 2;
            }
            if($result['disQS13'] == 'Tidak Suka') {
                $QS13 = 1;
            }

            if ($result['disQS14'] == 'Suka') {
                $QS14 = 5;
            }
            if ($result['disQS14'] == 'Harap') {
                $QS14 = 4;
            }
            if ($result['disQS14'] == 'Netral') {
                $QS14 = 3;
            }
            if ($result['disQS14'] == 'Toleransi') {
                $QS14 = 2;
            }
            if($result['disQS14'] == 'Tidak Suka') {
                $QS14 = 1;
            }

            if ($result['disQS15'] == 'Suka') {
                $QS15 = 5;
            }
            if ($result['disQS15'] == 'Harap') {
                $QS15 = 4;
            }
            if ($result['disQS15'] == 'Netral') {
                $QS15 = 3;
            }
            if ($result['disQS15'] == 'Toleransi') {
                $QS15 = 2;
            }
            if($result['disQS15'] == 'Tidak Suka') {
                $QS15 = 1;
            }

            if ($result['disQS16'] == 'Suka') {
                $QS16 = 5;
            }
            if ($result['disQS16'] == 'Harap') {
                $QS16 = 4;
            }
            if ($result['disQS16'] == 'Netral') {
                $QS16 = 3;
            }
            if ($result['disQS16'] == 'Toleransi') {
                $QS16 = 2;
            }
            if($result['disQS16'] == 'Tidak Suka') {
                $QS16 = 1;
            }

            if ($result['disQS17'] == 'Suka') {
                $QS17 = 5;
            }
            if ($result['disQS17'] == 'Harap') {
                $QS17 = 4;
            }
            if ($result['disQS17'] == 'Netral') {
                $QS17 = 3;
            }
            if ($result['disQS17'] == 'Toleransi') {
                $QS17 = 2;
            }
            if($result['disQS17'] == 'Tidak Suka') {
                $QS17 = 1;
            }

            if ($result['disQS18'] == 'Suka') {
                $QS18 = 5;
            }
            if ($result['disQS18'] == 'Harap') {
                $QS18 = 4;
            }
            if ($result['disQS18'] == 'Netral') {
                $QS18 = 3;
            }
            if ($result['disQS18'] == 'Toleransi') {
                $QS18 = 2;
            }
            if($result['disQS18'] == 'Tidak Suka') {
                $QS18 = 1;
            }
          $database[] = array(
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
            'total'=> $total = $QS01+$QS02+$QS03+$QS04+$QS05+$QS06+$QS07+$QS08+$QS09+$QS10+$QS11+$QS12+$QS13+$QS14+$QS15+$QS16+$QS17+$QS18
         );
        }
        for ($i=0; $i < count($database); $i++) { 
            // mencari nilai X.Y
            $P1[$i] = $database[$i]['QS01'] * $database[$i]['total'];
            $sumP1 = array_sum($P1);
            $P2[$i] = $database[$i]['QS02'] * $database[$i]['total'];
            $sumP2 = array_sum($P2);
            $P3[$i] = $database[$i]['QS03'] * $database[$i]['total'];
            $sumP3 = array_sum($P3);
            $P4[$i] = $database[$i]['QS04'] * $database[$i]['total'];
            $sumP4 = array_sum($P4);
            $P5[$i] = $database[$i]['QS05'] * $database[$i]['total'];
            $sumP5 = array_sum($P5);
            $P6[$i] = $database[$i]['QS06'] * $database[$i]['total'];
            $sumP6 = array_sum($P6);
            $P7[$i] = $database[$i]['QS07'] * $database[$i]['total'];
            $sumP7 = array_sum($P7);
            $P8[$i] = $database[$i]['QS08'] * $database[$i]['total'];
            $sumP8 = array_sum($P8);
            $P9[$i] = $database[$i]['QS09'] * $database[$i]['total'];
            $sumP9 = array_sum($P9);
            $P10[$i] = $database[$i]['QS10'] * $database[$i]['total'];
            $sumP10 = array_sum($P10);
            $P11[$i] = $database[$i]['QS11'] * $database[$i]['total'];
            $sumP11 = array_sum($P11);
            $P12[$i] = $database[$i]['QS12'] * $database[$i]['total'];
            $sumP12 = array_sum($P12);
            $P13[$i] = $database[$i]['QS13'] * $database[$i]['total'];
            $sumP13 = array_sum($P13);
            $P14[$i] = $database[$i]['QS14'] * $database[$i]['total'];
            $sumP14 = array_sum($P14);
            $P15[$i] = $database[$i]['QS15'] * $database[$i]['total'];
            $sumP15 = array_sum($P15);
            $P16[$i] = $database[$i]['QS16'] * $database[$i]['total'];
            $sumP16 = array_sum($P16);
            $P17[$i] = $database[$i]['QS17'] * $database[$i]['total'];
            $sumP17 = array_sum($P17);
            $P18[$i] = $database[$i]['QS18'] * $database[$i]['total'];
            $sumP18 = array_sum($P18);
            // END Mencari nilai X.Y

            $dataXY[$i] = array(
                'P1' => $P1[$i],
                'P2' => $P2[$i],
                'P3' => $P3[$i],
                'P4' => $P4[$i],
                'P5' => $P5[$i],
                'P6' => $P6[$i],
                'P7' => $P7[$i],
                'P8' => $P8[$i],
                'P9' => $P9[$i],
                'P10' => $P10[$i],
                'P11' => $P11[$i],
                'P12' => $P12[$i],
                'P13' => $P13[$i],
                'P14' => $P14[$i],
                'P15' => $P15[$i],
                'P16' => $P16[$i],
                'P17' => $P17[$i],
                'P18' => $P18[$i],
            );
        }
        $data = array(
            'dataXY'=> $dataXY,
            'sumP1' => $sumP1,
            'sumP2' => $sumP2,
            'sumP3' => $sumP3,
            'sumP4' => $sumP4,
            'sumP5' => $sumP5,
            'sumP6' => $sumP6,
            'sumP7' => $sumP7,
            'sumP8' => $sumP8,
            'sumP9' => $sumP9,
            'sumP10' => $sumP10,
            'sumP11' => $sumP11,
            'sumP12' => $sumP12,
            'sumP13' => $sumP13,
            'sumP14' => $sumP14,
            'sumP15' => $sumP15,
            'sumP16' => $sumP16,
            'sumP17' => $sumP17,
            'sumP18' => $sumP18,
        );
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}
function Xkuadratdisfungsional()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
                if ($result['disQS01'] == 'Suka') {
                    $QS01 = 5;
                }
                if ($result['disQS01'] == 'Harap') {
                    $QS01 = 4;
                }
                if ($result['disQS01'] == 'Netral') {
                    $QS01 = 3;
                }
                if ($result['disQS01'] == 'Toleransi') {
                    $QS01 = 2;
                }
                if ($result['disQS01'] == 'Tidak Suka'){
                    $QS01 = 1;
                }

                if ($result['disQS02'] == 'Suka') {
                    $QS02 = 5;
                }
                if ($result['disQS02'] == 'Harap') {
                    $QS02 = 4;
                }
                if ($result['disQS02'] == 'Netral') {
                    $QS02 = 3;
                }
                if ($result['disQS02'] == 'Toleransi') {
                    $QS02 = 2;
                }
                if($result['disQS02'] == 'Tidak Suka') {
                    $QS02 = 1;
                }

                if ($result['disQS03'] == 'Suka') {
                    $QS03 = 5;
                }
                if ($result['disQS03'] == 'Harap') {
                    $QS03 = 4;
                }
                if ($result['disQS03'] == 'Netral') {
                    $QS03 = 3;
                }
                if ($result['disQS03'] == 'Toleransi') {
                    $QS03 = 2;
                }
                if($result['disQS03'] == 'Tidak Suka') {
                    $QS03 = 1;
                }

                if ($result['disQS04'] == 'Suka') {
                    $QS04 = 5;
                }
                if ($result['disQS04'] == 'Harap') {
                    $QS04 = 4;
                }
                if ($result['disQS04'] == 'Netral') {
                    $QS04 = 3;
                }
                if ($result['disQS04'] == 'Toleransi') {
                    $QS04 = 2;
                }
                if($result['disQS04'] == 'Tidak Suka') {
                    $QS04 = 1;
                }

                if ($result['disQS05'] == 'Suka') {
                    $QS05 = 5;
                }
                if ($result['disQS05'] == 'Harap') {
                    $QS05 = 4;
                }
                if ($result['disQS05'] == 'Netral') {
                    $QS05 = 3;
                }
                if ($result['disQS05'] == 'Toleransi') {
                    $QS05 = 2;
                }
                if($result['disQS05'] == 'Tidak Suka') {
                    $QS05 = 1;
                }

                if ($result['disQS06'] == 'Suka') {
                    $QS06 = 5;
                }
                if ($result['disQS06'] == 'Harap') {
                    $QS06 = 4;
                }
                if ($result['disQS06'] == 'Netral') {
                    $QS06 = 3;
                }
                if ($result['disQS06'] == 'Toleransi') {
                    $QS06 = 2;
                }
                if($result['disQS06'] == 'Tidak Suka') {
                    $QS06 = 1;
                }

                if ($result['disQS07'] == 'Suka') {
                    $QS07 = 5;
                }
                if ($result['disQS07'] == 'Harap') {
                    $QS07 = 4;
                }
                if ($result['disQS07'] == 'Netral') {
                    $QS07 = 3;
                }
                if ($result['disQS07'] == 'Toleransi') {
                    $QS07 = 2;
                }
                if($result['disQS07'] == 'Tidak Suka') {
                    $QS07 = 1;
                }

                if ($result['disQS08'] == 'Suka') {
                    $QS08 = 5;
                }
                if ($result['disQS08'] == 'Harap') {
                    $QS08 = 4;
                }
                if ($result['disQS08'] == 'Netral') {
                    $QS08 = 3;
                }
                if ($result['disQS08'] == 'Toleransi') {
                    $QS08 = 2;
                }
                if($result['disQS08'] == 'Tidak Suka') {
                    $QS08 = 1;
                }

                if ($result['disQS09'] == 'Suka') {
                    $QS09 = 5;
                }
                if ($result['disQS09'] == 'Harap') {
                    $QS09 = 4;
                }
                if ($result['disQS09'] == 'Netral') {
                    $QS09 = 3;
                }
                if ($result['disQS09'] == 'Toleransi') {
                    $QS09 = 2;
                }
                if($result['disQS09'] == 'Tidak Suka') {
                    $QS09 = 1;
                }

                if ($result['disQS10'] == 'Suka') {
                    $QS10 = 5;
                }
                if ($result['disQS10'] == 'Harap') {
                    $QS10 = 4;
                }
                if ($result['disQS10'] == 'Netral') {
                    $QS10 = 3;
                }
                if ($result['disQS10'] == 'Toleransi') {
                    $QS10 = 2;
                }
                if($result['disQS10'] == 'Tidak Suka') {
                    $QS10 = 1;
                }

                if ($result['disQS11'] == 'Suka') {
                    $QS11 = 5;
                }
                if ($result['disQS11'] == 'Harap') {
                    $QS11 = 4;
                }
                if ($result['disQS11'] == 'Netral') {
                    $QS11 = 3;
                }
                if ($result['disQS11'] == 'Toleransi') {
                    $QS11 = 2;
                }
                if ($result['disQS11'] == 'Tidak Suka'){
                    $QS11 = 1;
                }

                if ($result['disQS12'] == 'Suka') {
                    $QS12 = 5;
                }
                if ($result['disQS12'] == 'Harap') {
                    $QS12 = 4;
                }
                if ($result['disQS12'] == 'Netral') {
                    $QS12 = 3;
                }
                if ($result['disQS12'] == 'Toleransi') {
                    $QS12 = 2;
                }
                if($result['disQS12'] == 'Tidak Suka') {
                    $QS12 = 1;
                }

                if ($result['disQS13'] == 'Suka') {
                    $QS13 = 5;
                }
                if ($result['disQS13'] == 'Harap') {
                    $QS13 = 4;
                }
                if ($result['disQS13'] == 'Netral') {
                    $QS13 = 3;
                }
                if ($result['disQS13'] == 'Toleransi') {
                    $QS13 = 2;
                }
                if($result['disQS13'] == 'Tidak Suka') {
                    $QS13 = 1;
                }

                if ($result['disQS14'] == 'Suka') {
                    $QS14 = 5;
                }
                if ($result['disQS14'] == 'Harap') {
                    $QS14 = 4;
                }
                if ($result['disQS14'] == 'Netral') {
                    $QS14 = 3;
                }
                if ($result['disQS14'] == 'Toleransi') {
                    $QS14 = 2;
                }
                if($result['disQS14'] == 'Tidak Suka') {
                    $QS14 = 1;
                }

                if ($result['disQS15'] == 'Suka') {
                    $QS15 = 5;
                }
                if ($result['disQS15'] == 'Harap') {
                    $QS15 = 4;
                }
                if ($result['disQS15'] == 'Netral') {
                    $QS15 = 3;
                }
                if ($result['disQS15'] == 'Toleransi') {
                    $QS15 = 2;
                }
                if($result['disQS15'] == 'Tidak Suka') {
                    $QS15 = 1;
                }

                if ($result['disQS16'] == 'Suka') {
                    $QS16 = 5;
                }
                if ($result['disQS16'] == 'Harap') {
                    $QS16 = 4;
                }
                if ($result['disQS16'] == 'Netral') {
                    $QS16 = 3;
                }
                if ($result['disQS16'] == 'Toleransi') {
                    $QS16 = 2;
                }
                if($result['disQS16'] == 'Tidak Suka') {
                    $QS16 = 1;
                }

                if ($result['disQS17'] == 'Suka') {
                    $QS17 = 5;
                }
                if ($result['disQS17'] == 'Harap') {
                    $QS17 = 4;
                }
                if ($result['disQS17'] == 'Netral') {
                    $QS17 = 3;
                }
                if ($result['disQS17'] == 'Toleransi') {
                    $QS17 = 2;
                }
                if($result['disQS17'] == 'Tidak Suka') {
                    $QS17 = 1;
                }

                if ($result['disQS18'] == 'Suka') {
                    $QS18 = 5;
                }
                if ($result['disQS18'] == 'Harap') {
                    $QS18 = 4;
                }
                if ($result['disQS18'] == 'Netral') {
                    $QS18 = 3;
                }
                if ($result['disQS18'] == 'Toleransi') {
                    $QS18 = 2;
                }
                if($result['disQS18'] == 'Tidak Suka') {
                    $QS18 = 1;
                }
          $database[] = array(
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
            'total'=> $total = $QS01+$QS02+$QS03+$QS04+$QS05+$QS06+$QS07+$QS08+$QS09+$QS10+$QS11+$QS12+$QS13+$QS14+$QS15+$QS16+$QS17+$QS18
         );
        }
        for ($i=0; $i < count($database); $i++) { 
            // Mencari nilai X^2 
            $Xpangkat1[$i] = pow($database[$i]['QS01'], 2);
            $pangkatX1 = array_sum($Xpangkat1);
            $Xpangkat2[$i] = pow($database[$i]['QS02'], 2);
            $pangkatX2 = array_sum($Xpangkat2);
            $Xpangkat3[$i] = pow($database[$i]['QS03'], 2);
            $pangkatX3 = array_sum($Xpangkat3);
            $Xpangkat4[$i] = pow($database[$i]['QS04'], 2);
            $pangkatX4 = array_sum($Xpangkat4);
            $Xpangkat5[$i] = pow($database[$i]['QS05'], 2);
            $pangkatX5 = array_sum($Xpangkat5);
            $Xpangkat6[$i] = pow($database[$i]['QS06'], 2);
            $pangkatX6 = array_sum($Xpangkat6);
            $Xpangkat7[$i] = pow($database[$i]['QS07'], 2);
            $pangkatX7 = array_sum($Xpangkat7);
            $Xpangkat8[$i] = pow($database[$i]['QS08'], 2);
            $pangkatX8 = array_sum($Xpangkat8);
            $Xpangkat9[$i] = pow($database[$i]['QS09'], 2);
            $pangkatX9 = array_sum($Xpangkat9);
            $Xpangkat10[$i] = pow($database[$i]['QS10'], 2);
            $pangkatX10 = array_sum($Xpangkat10);
            $Xpangkat11[$i] = pow($database[$i]['QS11'], 2);
            $pangkatX11 = array_sum($Xpangkat11);
            $Xpangkat12[$i] = pow($database[$i]['QS12'], 2);
            $pangkatX12 = array_sum($Xpangkat12);
            $Xpangkat13[$i] = pow($database[$i]['QS13'], 2);
            $pangkatX13 = array_sum($Xpangkat13);
            $Xpangkat14[$i] = pow($database[$i]['QS14'], 2);
            $pangkatX14 = array_sum($Xpangkat14);
            $Xpangkat15[$i] = pow($database[$i]['QS15'], 2);
            $pangkatX15 = array_sum($Xpangkat15);
            $Xpangkat16[$i] = pow($database[$i]['QS16'], 2);
            $pangkatX16 = array_sum($Xpangkat16);
            $Xpangkat17[$i] = pow($database[$i]['QS17'], 2);
            $pangkatX17 = array_sum($Xpangkat17);
            $Xpangkat18[$i] = pow($database[$i]['QS18'], 2);
            $pangkatX18 = array_sum($Xpangkat18);
            $totalpangkat[$i] = pow($database[$i]['total'], 2);
            $Ykuadrat = array_sum($totalpangkat);

            $dataXkuadrat[$i] = array(
                'P1' => $Xpangkat1[$i],
                'P2' => $Xpangkat2[$i],
                'P3' => $Xpangkat3[$i],
                'P4' => $Xpangkat4[$i],
                'P5' => $Xpangkat5[$i],
                'P6' => $Xpangkat6[$i],
                'P7' => $Xpangkat7[$i],
                'P8' => $Xpangkat8[$i],
                'P9' => $Xpangkat9[$i],
                'P10' => $Xpangkat10[$i],
                'P11' => $Xpangkat11[$i],
                'P12' => $Xpangkat12[$i],
                'P13' => $Xpangkat13[$i],
                'P14' => $Xpangkat14[$i],
                'P15' => $Xpangkat15[$i],
                'P16' => $Xpangkat16[$i],
                'P17' => $Xpangkat17[$i],
                'P18' => $Xpangkat18[$i],
                'Y' => $totalpangkat[$i]
            );
        }
        $data = array(
        'Xkuadrat' => $dataXkuadrat,
        'pangkatX1'=>$pangkatX1,
        'pangkatX2'=>$pangkatX2,
        'pangkatX3'=>$pangkatX3,
        'pangkatX4'=>$pangkatX4,
        'pangkatX5'=>$pangkatX5,
        'pangkatX6'=>$pangkatX6,
        'pangkatX7'=>$pangkatX7,
        'pangkatX8'=>$pangkatX8,
        'pangkatX9'=>$pangkatX9,
        'pangkatX10'=>$pangkatX10,
        'pangkatX11'=>$pangkatX11,
        'pangkatX12'=>$pangkatX12,
        'pangkatX13'=>$pangkatX13,
        'pangkatX14'=>$pangkatX14,
        'pangkatX15'=>$pangkatX15,
        'pangkatX16'=>$pangkatX16,
        'pangkatX17'=>$pangkatX17,
        'pangkatX18'=>$pangkatX18,
        'Ykuadrat'=>$Ykuadrat
        );
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}
// END mencari validitas pertanyaan disfungsional








function hitungRumus($SigmaX, $SigmaXY, $SigmaY)
{

    for ($i=0; $i < count($SigmaX['sigmaX']); $i++) { 

        $hitungatas[$i] = (15 * $SigmaXY[$i]) - ($SigmaX['sigmaX'][$i] * $SigmaY['sigmaY']);
        $hitungbawahsatu[$i] = (15 * $SigmaX['X^2'][$i]) - pow($SigmaX['sigmaX'][$i], 2);
        $hitungbawahdua[$i] = (15 * $SigmaY['sigmaY^2']) - pow($SigmaY['sigmaY'], 2);
        $hitungbawah[$i] = $hitungbawahsatu[$i] * $hitungbawahdua[$i];
        $rXY[$i] =  $hitungatas[$i] / sqrt($hitungbawah[$i]);
    }
    return $rXY;

}

// Hitung rumus reabilitas fungsional
function hitungReabilitasFungsional()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
                if ($result['QS01'] == 'Suka') {
                    $QS01 = 5;
                }
                if ($result['QS01'] == 'Harap') {
                    $QS01 = 4;
                }
                if ($result['QS01'] == 'Netral') {
                    $QS01 = 3;
                }
                if ($result['QS01'] == 'Toleransi') {
                    $QS01 = 2;
                }
                if ($result['QS01'] == 'Tidak Suka'){
                    $QS01 = 1;
                }

                if ($result['QS02'] == 'Suka') {
                    $QS02 = 5;
                }
                if ($result['QS02'] == 'Harap') {
                    $QS02 = 4;
                }
                if ($result['QS02'] == 'Netral') {
                    $QS02 = 3;
                }
                if ($result['QS02'] == 'Toleransi') {
                    $QS02 = 2;
                }
                if($result['QS02'] == 'Tidak Suka') {
                    $QS02 = 1;
                }

                if ($result['QS03'] == 'Suka') {
                    $QS03 = 5;
                }
                if ($result['QS03'] == 'Harap') {
                    $QS03 = 4;
                }
                if ($result['QS03'] == 'Netral') {
                    $QS03 = 3;
                }
                if ($result['QS03'] == 'Toleransi') {
                    $QS03 = 2;
                }
                if($result['QS03'] == 'Tidak Suka') {
                    $QS03 = 1;
                }

                if ($result['QS04'] == 'Suka') {
                    $QS04 = 5;
                }
                if ($result['QS04'] == 'Harap') {
                    $QS04 = 4;
                }
                if ($result['QS04'] == 'Netral') {
                    $QS04 = 3;
                }
                if ($result['QS04'] == 'Toleransi') {
                    $QS04 = 2;
                }
                if($result['QS04'] == 'Tidak Suka') {
                    $QS04 = 1;
                }

                if ($result['QS05'] == 'Suka') {
                    $QS05 = 5;
                }
                if ($result['QS05'] == 'Harap') {
                    $QS05 = 4;
                }
                if ($result['QS05'] == 'Netral') {
                    $QS05 = 3;
                }
                if ($result['QS05'] == 'Toleransi') {
                    $QS05 = 2;
                }
                if($result['QS05'] == 'Tidak Suka') {
                    $QS05 = 1;
                }

                if ($result['QS06'] == 'Suka') {
                    $QS06 = 5;
                }
                if ($result['QS06'] == 'Harap') {
                    $QS06 = 4;
                }
                if ($result['QS06'] == 'Netral') {
                    $QS06 = 3;
                }
                if ($result['QS06'] == 'Toleransi') {
                    $QS06 = 2;
                }
                if($result['QS06'] == 'Tidak Suka') {
                    $QS06 = 1;
                }

                if ($result['QS07'] == 'Suka') {
                    $QS07 = 5;
                }
                if ($result['QS07'] == 'Harap') {
                    $QS07 = 4;
                }
                if ($result['QS07'] == 'Netral') {
                    $QS07 = 3;
                }
                if ($result['QS07'] == 'Toleransi') {
                    $QS07 = 2;
                }
                if($result['QS07'] == 'Tidak Suka') {
                    $QS07 = 1;
                }

                if ($result['QS08'] == 'Suka') {
                    $QS08 = 5;
                }
                if ($result['QS08'] == 'Harap') {
                    $QS08 = 4;
                }
                if ($result['QS08'] == 'Netral') {
                    $QS08 = 3;
                }
                if ($result['QS08'] == 'Toleransi') {
                    $QS08 = 2;
                }
                if($result['QS08'] == 'Tidak Suka') {
                    $QS08 = 1;
                }

                if ($result['QS09'] == 'Suka') {
                    $QS09 = 5;
                }
                if ($result['QS09'] == 'Harap') {
                    $QS09 = 4;
                }
                if ($result['QS09'] == 'Netral') {
                    $QS09 = 3;
                }
                if ($result['QS09'] == 'Toleransi') {
                    $QS09 = 2;
                }
                if($result['QS09'] == 'Tidak Suka') {
                    $QS09 = 1;
                }

                if ($result['QS10'] == 'Suka') {
                    $QS10 = 5;
                }
                if ($result['QS10'] == 'Harap') {
                    $QS10 = 4;
                }
                if ($result['QS10'] == 'Netral') {
                    $QS10 = 3;
                }
                if ($result['QS10'] == 'Toleransi') {
                    $QS10 = 2;
                }
                if($result['QS10'] == 'Tidak Suka') {
                    $QS10 = 1;
                }

                if ($result['QS11'] == 'Suka') {
                    $QS11 = 5;
                }
                if ($result['QS11'] == 'Harap') {
                    $QS11 = 4;
                }
                if ($result['QS11'] == 'Netral') {
                    $QS11 = 3;
                }
                if ($result['QS11'] == 'Toleransi') {
                    $QS11 = 2;
                }
                if ($result['QS11'] == 'Tidak Suka'){
                    $QS11 = 1;
                }

                if ($result['QS12'] == 'Suka') {
                    $QS12 = 5;
                }
                if ($result['QS12'] == 'Harap') {
                    $QS12 = 4;
                }
                if ($result['QS12'] == 'Netral') {
                    $QS12 = 3;
                }
                if ($result['QS12'] == 'Toleransi') {
                    $QS12 = 2;
                }
                if($result['QS12'] == 'Tidak Suka') {
                    $QS12 = 1;
                }

                if ($result['QS13'] == 'Suka') {
                    $QS13 = 5;
                }
                if ($result['QS13'] == 'Harap') {
                    $QS13 = 4;
                }
                if ($result['QS13'] == 'Netral') {
                    $QS13 = 3;
                }
                if ($result['QS13'] == 'Toleransi') {
                    $QS13 = 2;
                }
                if($result['QS13'] == 'Tidak Suka') {
                    $QS13 = 1;
                }

                if ($result['QS14'] == 'Suka') {
                    $QS14 = 5;
                }
                if ($result['QS14'] == 'Harap') {
                    $QS14 = 4;
                }
                if ($result['QS14'] == 'Netral') {
                    $QS14 = 3;
                }
                if ($result['QS14'] == 'Toleransi') {
                    $QS14 = 2;
                }
                if($result['QS14'] == 'Tidak Suka') {
                    $QS14 = 1;
                }

                if ($result['QS15'] == 'Suka') {
                    $QS15 = 5;
                }
                if ($result['QS15'] == 'Harap') {
                    $QS15 = 4;
                }
                if ($result['QS15'] == 'Netral') {
                    $QS15 = 3;
                }
                if ($result['QS15'] == 'Toleransi') {
                    $QS15 = 2;
                }
                if($result['QS15'] == 'Tidak Suka') {
                    $QS15 = 1;
                }

                if ($result['QS16'] == 'Suka') {
                    $QS16 = 5;
                }
                if ($result['QS16'] == 'Harap') {
                    $QS16 = 4;
                }
                if ($result['QS16'] == 'Netral') {
                    $QS16 = 3;
                }
                if ($result['QS16'] == 'Toleransi') {
                    $QS16 = 2;
                }
                if($result['QS16'] == 'Tidak Suka') {
                    $QS16 = 1;
                }

                if ($result['QS17'] == 'Suka') {
                    $QS17 = 5;
                }
                if ($result['QS17'] == 'Harap') {
                    $QS17 = 4;
                }
                if ($result['QS17'] == 'Netral') {
                    $QS17 = 3;
                }
                if ($result['QS17'] == 'Toleransi') {
                    $QS17 = 2;
                }
                if($result['QS17'] == 'Tidak Suka') {
                    $QS17 = 1;
                }

                if ($result['QS18'] == 'Suka') {
                    $QS18 = 5;
                }
                if ($result['QS18'] == 'Harap') {
                    $QS18 = 4;
                }
                if ($result['QS18'] == 'Netral') {
                    $QS18 = 3;
                }
                if ($result['QS18'] == 'Toleransi') {
                    $QS18 = 2;
                }
                if($result['QS18'] == 'Tidak Suka') {
                    $QS18 = 1;
                }
          $database[] = array(
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
            'total'=> $total = $QS01+$QS02+$QS03+$QS04+$QS05+$QS06+$QS07+$QS08+$QS09+$QS10+$QS11+$QS12+$QS13+$QS14+$QS15+$QS16+$QS17+$QS18
         );
        }
        for ($i=0; $i < count($database); $i++) { 
            // Mencari sigmaX
            $sigmaX1[$i] = array($database[$i]['QS01']);
            $sum_sigmaX1 = array_sum($sigmaX1);
            $sigmaX2[$i] = array($database[$i]['QS02']);
            $sum_sigmaX2 = array_sum($sigmaX2);
            $sigmaX3[$i] = array($database[$i]['QS03']);
            $sum_sigmaX3 = array_sum($sigmaX3);
            $sigmaX4[$i] = array($database[$i]['QS04']);
            $sum_sigmaX4 = array_sum($sigmaX4);
            $sigmaX5[$i] = array($database[$i]['QS05']);
            $sum_sigmaX5 = array_sum($sigmaX5);
            $sigmaX6[$i] = array($database[$i]['QS06']);
            $sum_sigmaX6 = array_sum($sigmaX6);
            $sigmaX7[$i] = array($database[$i]['QS07']);
            $sum_sigmaX7 = array_sum($sigmaX7);
            $sigmaX8[$i] = array($database[$i]['QS08']);
            $sum_sigmaX8 = array_sum($sigmaX8);
            $sigmaX9[$i] = array($database[$i]['QS09']);
            $sum_sigmaX9 = array_sum($sigmaX9);
            $sigmaX10[$i] = array($database[$i]['QS10']);
            $sum_sigmaX10 = array_sum($sigmaX10);
            $sigmaX11[$i] = array($database[$i]['QS11']);
            $sum_sigmaX11 = array_sum($sigmaX11);
            $sigmaX12[$i] = array($database[$i]['QS12']);
            $sum_sigmaX12 = array_sum($sigmaX12);
            $sigmaX13[$i] = array($database[$i]['QS13']);
            $sum_sigmaX13 = array_sum($sigmaX13);
            $sigmaX14[$i] = array($database[$i]['QS14']);
            $sum_sigmaX14 = array_sum($sigmaX14);
            $sigmaX15[$i] = array($database[$i]['QS15']);
            $sum_sigmaX15 = array_sum($sigmaX15);
            $sigmaX16[$i] = array($database[$i]['QS16']);
            $sum_sigmaX16 = array_sum($sigmaX16);
            $sigmaX17[$i] = array($database[$i]['QS17']);
            $sum_sigmaX17 = array_sum($sigmaX17);
            $sigmaX18[$i] = array($database[$i]['QS18']);
            $sum_sigmaX18 = array_sum($sigmaX18);
            $sigmaXtotal[$i] = array($database[$i]['total']);
            $sum_sigmaXtotal = array_sum($sigmaXtotal);
            // End Mencari sigmaX
            // Mencari nilai (X)^2 
            $Xpangkat1[$i] = pow($database[$i]['QS01'], 2);
            $pangkatX1 = array_sum($Xpangkat1);
            $Xpangkat2[$i] = pow($database[$i]['QS02'], 2);
            $pangkatX2 = array_sum($Xpangkat2);
            $Xpangkat3[$i] = pow($database[$i]['QS03'], 2);
            $pangkatX3 = array_sum($Xpangkat3);
            $Xpangkat4[$i] = pow($database[$i]['QS04'], 2);
            $pangkatX4 = array_sum($Xpangkat4);
            $Xpangkat5[$i] = pow($database[$i]['QS05'], 2);
            $pangkatX5 = array_sum($Xpangkat5);
            $Xpangkat6[$i] = pow($database[$i]['QS06'], 2);
            $pangkatX6 = array_sum($Xpangkat6);
            $Xpangkat7[$i] = pow($database[$i]['QS07'], 2);
            $pangkatX7 = array_sum($Xpangkat7);
            $Xpangkat8[$i] = pow($database[$i]['QS08'], 2);
            $pangkatX8 = array_sum($Xpangkat8);
            $Xpangkat9[$i] = pow($database[$i]['QS09'], 2);
            $pangkatX9 = array_sum($Xpangkat9);
            $Xpangkat10[$i] = pow($database[$i]['QS10'], 2);
            $pangkatX10 = array_sum($Xpangkat10);
            $Xpangkat11[$i] = pow($database[$i]['QS11'], 2);
            $pangkatX11 = array_sum($Xpangkat11);
            $Xpangkat12[$i] = pow($database[$i]['QS12'], 2);
            $pangkatX12 = array_sum($Xpangkat12);
            $Xpangkat13[$i] = pow($database[$i]['QS13'], 2);
            $pangkatX13 = array_sum($Xpangkat13);
            $Xpangkat14[$i] = pow($database[$i]['QS14'], 2);
            $pangkatX14 = array_sum($Xpangkat14);
            $Xpangkat15[$i] = pow($database[$i]['QS15'], 2);
            $pangkatX15 = array_sum($Xpangkat15);
            $Xpangkat16[$i] = pow($database[$i]['QS16'], 2);
            $pangkatX16 = array_sum($Xpangkat16);
            $Xpangkat17[$i] = pow($database[$i]['QS17'], 2);
            $pangkatX17 = array_sum($Xpangkat17);
            $Xpangkat18[$i] = pow($database[$i]['QS18'], 2);
            $pangkatX18 = array_sum($Xpangkat18);
            $totalpangkat[$i] = pow($database[$i]['total'], 2);
            $Ykuadrat = array_sum($totalpangkat);

            $dataXkuadrat[$i] = array(
                'P1' => $Xpangkat1[$i],
                'P2' => $Xpangkat2[$i],
                'P3' => $Xpangkat3[$i],
                'P4' => $Xpangkat4[$i],
                'P5' => $Xpangkat5[$i],
                'P6' => $Xpangkat6[$i],
                'P7' => $Xpangkat7[$i],
                'P8' => $Xpangkat8[$i],
                'P9' => $Xpangkat9[$i],
                'P10' => $Xpangkat10[$i],
                'P11' => $Xpangkat11[$i],
                'P12' => $Xpangkat12[$i],
                'P13' => $Xpangkat13[$i],
                'P14' => $Xpangkat14[$i],
                'P15' => $Xpangkat15[$i],
                'P16' => $Xpangkat16[$i],
                'P17' => $Xpangkat17[$i],
                'P18' => $Xpangkat18[$i],
                'Y' => $totalpangkat[$i]
            );
            // Data hitung S^2
            $S2QS1 = (10 * $dataXkuadrat[$i]['P1']) - pow($sum_sigmaX1, 2) / 10*(10-1);
            $S2QS2 = (10 * $dataXkuadrat[$i]['P2']) - pow($sum_sigmaX2, 2) / 10*(10-1);
            $S2QS3 = (10 * $dataXkuadrat[$i]['P3']) - pow($sum_sigmaX3, 2) / 10*(10-1);
            $S2QS4 = (10 * $dataXkuadrat[$i]['P4']) - pow($sum_sigmaX4, 2) / 10*(10-1);
            $S2QS5 = (10 * $dataXkuadrat[$i]['P5']) - pow($sum_sigmaX5, 2) / 10*(10-1);
            $S2QS6 = (10 * $dataXkuadrat[$i]['P6']) - pow($sum_sigmaX6, 2) / 10*(10-1);
            $S2QS7 = (10 * $dataXkuadrat[$i]['P7']) - pow($sum_sigmaX7, 2) / 10*(10-1);
            $S2QS8 = (10 * $dataXkuadrat[$i]['P8']) - pow($sum_sigmaX8, 2) / 10*(10-1);
            $S2QS9 = (10 * $dataXkuadrat[$i]['P9']) - pow($sum_sigmaX9, 2) / 10*(10-1);
            $S2QS10 = (10 * $dataXkuadrat[$i]['P10']) - pow($sum_sigmaX10, 2) / 10*(10-1);
            $S2QS11 = (10 * $dataXkuadrat[$i]['P11']) - pow($sum_sigmaX11, 2) / 10*(10-1);
            $S2QS12 = (10 * $dataXkuadrat[$i]['P12']) - pow($sum_sigmaX12, 2) / 10*(10-1);
            $S2QS13 = (10 * $dataXkuadrat[$i]['P13']) - pow($sum_sigmaX13, 2) / 10*(10-1);
            $S2QS14 = (10 * $dataXkuadrat[$i]['P14']) - pow($sum_sigmaX14, 2) / 10*(10-1);
            $S2QS15 = (10 * $dataXkuadrat[$i]['P15']) - pow($sum_sigmaX15, 2) / 10*(10-1);
            $S2QS16 = (10 * $dataXkuadrat[$i]['P16']) - pow($sum_sigmaX16, 2) / 10*(10-1);
            $S2QS17 = (10 * $dataXkuadrat[$i]['P17']) - pow($sum_sigmaX17, 2) / 10*(10-1);
            $S2QS18 = (10 * $dataXkuadrat[$i]['P18']) - pow($sum_sigmaX18, 2) / 10*(10-1);
            $S2total = (10 * $dataXkuadrat[$i]['Y']) - pow($sum_sigmaXtotal, 2) / 10*(10-1);
        }
        $S2 = array($S2QS1,$S2QS2,$S2QS3,$S2QS4,$S2QS5,$S2QS6,$S2QS7,$S2QS8,$S2QS9,$S2QS10,$S2QS11,$S2QS12,$S2QS13,$S2QS14,$S2QS15,$S2QS16,$S2QS17,$S2QS18);
        $S2Sum = array_sum($S2);
        // var_dump($S2Sum);
        // var_dump($S2total);
        $atas = 18 / (18-1);
        $bawah = 1 - ( $S2Sum / $S2total );
        $Cralpha = $atas * $bawah;
        $reabilitas = array('Xkuadrat'=>$dataXkuadrat, 'S2QS1'=> $S2QS1, 'S2QS2'=> $S2QS2, 'S2QS3'=> $S2QS3, 'S2QS4'=> $S2QS4, 'S2QS5'=> $S2QS5, 'S2QS6'=> $S2QS6, 'S2QS7'=> $S2QS7, 'S2QS8'=> $S2QS8, 'S2QS9'=> $S2QS9, 'S2QS10'=> $S2QS10, 'S2QS11'=> $S2QS11, 'S2QS12'=> $S2QS12, 'S2QS13'=> $S2QS13, 'S2QS14'=> $S2QS14, 'S2QS15'=> $S2QS15, 'S2QS16'=> $S2QS16, 'S2QS17'=> $S2QS17, 'S2QS18'=> $S2QS18, 'S2total'=> $S2total, 'Cralpha'=>$Cralpha) ;

        return $reabilitas;
    }
}
// End Hitung rumus Reabilitas fungsional



// Hitung rumus reabilitas disfungsional
function hitungReabilitasdisFungsional()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            if ($result['disQS01'] == 'Suka') {
                $QS01 = 5;
            }
            if ($result['disQS01'] == 'Harap') {
                $QS01 = 4;
            }
            if ($result['disQS01'] == 'Netral') {
                $QS01 = 3;
            }
            if ($result['disQS01'] == 'Toleransi') {
                $QS01 = 2;
            }
            if ($result['disQS01'] == 'Tidak Suka'){
                $QS01 = 1;
            }

            if ($result['disQS02'] == 'Suka') {
                $QS02 = 5;
            }
            if ($result['disQS02'] == 'Harap') {
                $QS02 = 4;
            }
            if ($result['disQS02'] == 'Netral') {
                $QS02 = 3;
            }
            if ($result['disQS02'] == 'Toleransi') {
                $QS02 = 2;
            }
            if($result['disQS02'] == 'Tidak Suka') {
                $QS02 = 1;
            }

            if ($result['disQS03'] == 'Suka') {
                $QS03 = 5;
            }
            if ($result['disQS03'] == 'Harap') {
                $QS03 = 4;
            }
            if ($result['disQS03'] == 'Netral') {
                $QS03 = 3;
            }
            if ($result['disQS03'] == 'Toleransi') {
                $QS03 = 2;
            }
            if($result['disQS03'] == 'Tidak Suka') {
                $QS03 = 1;
            }

            if ($result['disQS04'] == 'Suka') {
                $QS04 = 5;
            }
            if ($result['disQS04'] == 'Harap') {
                $QS04 = 4;
            }
            if ($result['disQS04'] == 'Netral') {
                $QS04 = 3;
            }
            if ($result['disQS04'] == 'Toleransi') {
                $QS04 = 2;
            }
            if($result['disQS04'] == 'Tidak Suka') {
                $QS04 = 1;
            }

            if ($result['disQS05'] == 'Suka') {
                $QS05 = 5;
            }
            if ($result['disQS05'] == 'Harap') {
                $QS05 = 4;
            }
            if ($result['disQS05'] == 'Netral') {
                $QS05 = 3;
            }
            if ($result['disQS05'] == 'Toleransi') {
                $QS05 = 2;
            }
            if($result['disQS05'] == 'Tidak Suka') {
                $QS05 = 1;
            }

            if ($result['disQS06'] == 'Suka') {
                $QS06 = 5;
            }
            if ($result['disQS06'] == 'Harap') {
                $QS06 = 4;
            }
            if ($result['disQS06'] == 'Netral') {
                $QS06 = 3;
            }
            if ($result['disQS06'] == 'Toleransi') {
                $QS06 = 2;
            }
            if($result['disQS06'] == 'Tidak Suka') {
                $QS06 = 1;
            }

            if ($result['disQS07'] == 'Suka') {
                $QS07 = 5;
            }
            if ($result['disQS07'] == 'Harap') {
                $QS07 = 4;
            }
            if ($result['disQS07'] == 'Netral') {
                $QS07 = 3;
            }
            if ($result['disQS07'] == 'Toleransi') {
                $QS07 = 2;
            }
            if($result['disQS07'] == 'Tidak Suka') {
                $QS07 = 1;
            }

            if ($result['disQS08'] == 'Suka') {
                $QS08 = 5;
            }
            if ($result['disQS08'] == 'Harap') {
                $QS08 = 4;
            }
            if ($result['disQS08'] == 'Netral') {
                $QS08 = 3;
            }
            if ($result['disQS08'] == 'Toleransi') {
                $QS08 = 2;
            }
            if($result['disQS08'] == 'Tidak Suka') {
                $QS08 = 1;
            }

            if ($result['disQS09'] == 'Suka') {
                $QS09 = 5;
            }
            if ($result['disQS09'] == 'Harap') {
                $QS09 = 4;
            }
            if ($result['disQS09'] == 'Netral') {
                $QS09 = 3;
            }
            if ($result['disQS09'] == 'Toleransi') {
                $QS09 = 2;
            }
            if($result['disQS09'] == 'Tidak Suka') {
                $QS09 = 1;
            }

            if ($result['disQS10'] == 'Suka') {
                $QS10 = 5;
            }
            if ($result['disQS10'] == 'Harap') {
                $QS10 = 4;
            }
            if ($result['disQS10'] == 'Netral') {
                $QS10 = 3;
            }
            if ($result['disQS10'] == 'Toleransi') {
                $QS10 = 2;
            }
            if($result['disQS10'] == 'Tidak Suka') {
                $QS10 = 1;
            }

            if ($result['disQS11'] == 'Suka') {
                $QS11 = 5;
            }
            if ($result['disQS11'] == 'Harap') {
                $QS11 = 4;
            }
            if ($result['disQS11'] == 'Netral') {
                $QS11 = 3;
            }
            if ($result['disQS11'] == 'Toleransi') {
                $QS11 = 2;
            }
            if ($result['disQS11'] == 'Tidak Suka'){
                $QS11 = 1;
            }

            if ($result['disQS12'] == 'Suka') {
                $QS12 = 5;
            }
            if ($result['disQS12'] == 'Harap') {
                $QS12 = 4;
            }
            if ($result['disQS12'] == 'Netral') {
                $QS12 = 3;
            }
            if ($result['disQS12'] == 'Toleransi') {
                $QS12 = 2;
            }
            if($result['disQS12'] == 'Tidak Suka') {
                $QS12 = 1;
            }

            if ($result['disQS13'] == 'Suka') {
                $QS13 = 5;
            }
            if ($result['disQS13'] == 'Harap') {
                $QS13 = 4;
            }
            if ($result['disQS13'] == 'Netral') {
                $QS13 = 3;
            }
            if ($result['disQS13'] == 'Toleransi') {
                $QS13 = 2;
            }
            if($result['disQS13'] == 'Tidak Suka') {
                $QS13 = 1;
            }

            if ($result['disQS14'] == 'Suka') {
                $QS14 = 5;
            }
            if ($result['disQS14'] == 'Harap') {
                $QS14 = 4;
            }
            if ($result['disQS14'] == 'Netral') {
                $QS14 = 3;
            }
            if ($result['disQS14'] == 'Toleransi') {
                $QS14 = 2;
            }
            if($result['disQS14'] == 'Tidak Suka') {
                $QS14 = 1;
            }

            if ($result['disQS15'] == 'Suka') {
                $QS15 = 5;
            }
            if ($result['disQS15'] == 'Harap') {
                $QS15 = 4;
            }
            if ($result['disQS15'] == 'Netral') {
                $QS15 = 3;
            }
            if ($result['disQS15'] == 'Toleransi') {
                $QS15 = 2;
            }
            if($result['disQS15'] == 'Tidak Suka') {
                $QS15 = 1;
            }

            if ($result['disQS16'] == 'Suka') {
                $QS16 = 5;
            }
            if ($result['disQS16'] == 'Harap') {
                $QS16 = 4;
            }
            if ($result['disQS16'] == 'Netral') {
                $QS16 = 3;
            }
            if ($result['disQS16'] == 'Toleransi') {
                $QS16 = 2;
            }
            if($result['disQS16'] == 'Tidak Suka') {
                $QS16 = 1;
            }

            if ($result['disQS17'] == 'Suka') {
                $QS17 = 5;
            }
            if ($result['disQS17'] == 'Harap') {
                $QS17 = 4;
            }
            if ($result['disQS17'] == 'Netral') {
                $QS17 = 3;
            }
            if ($result['disQS17'] == 'Toleransi') {
                $QS17 = 2;
            }
            if($result['disQS17'] == 'Tidak Suka') {
                $QS17 = 1;
            }

            if ($result['disQS18'] == 'Suka') {
                $QS18 = 5;
            }
            if ($result['disQS18'] == 'Harap') {
                $QS18 = 4;
            }
            if ($result['disQS18'] == 'Netral') {
                $QS18 = 3;
            }
            if ($result['disQS18'] == 'Toleransi') {
                $QS18 = 2;
            }
            if($result['disQS18'] == 'Tidak Suka') {
                $QS18 = 1;
            }
          $database[] = array(
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
            'total'=> $total = $QS01+$QS02+$QS03+$QS04+$QS05+$QS06+$QS07+$QS08+$QS09+$QS10+$QS11+$QS12+$QS13+$QS14+$QS15+$QS16+$QS17+$QS18
         );
        }
        for ($i=0; $i < count($database); $i++) { 
            // Mencari sigmaX
            $sigmaX1[$i] = array($database[$i]['QS01']);
            $sum_sigmaX1 = array_sum($sigmaX1);
            $sigmaX2[$i] = array($database[$i]['QS02']);
            $sum_sigmaX2 = array_sum($sigmaX2);
            $sigmaX3[$i] = array($database[$i]['QS03']);
            $sum_sigmaX3 = array_sum($sigmaX3);
            $sigmaX4[$i] = array($database[$i]['QS04']);
            $sum_sigmaX4 = array_sum($sigmaX4);
            $sigmaX5[$i] = array($database[$i]['QS05']);
            $sum_sigmaX5 = array_sum($sigmaX5);
            $sigmaX6[$i] = array($database[$i]['QS06']);
            $sum_sigmaX6 = array_sum($sigmaX6);
            $sigmaX7[$i] = array($database[$i]['QS07']);
            $sum_sigmaX7 = array_sum($sigmaX7);
            $sigmaX8[$i] = array($database[$i]['QS08']);
            $sum_sigmaX8 = array_sum($sigmaX8);
            $sigmaX9[$i] = array($database[$i]['QS09']);
            $sum_sigmaX9 = array_sum($sigmaX9);
            $sigmaX10[$i] = array($database[$i]['QS10']);
            $sum_sigmaX10 = array_sum($sigmaX10);
            $sigmaX11[$i] = array($database[$i]['QS11']);
            $sum_sigmaX11 = array_sum($sigmaX11);
            $sigmaX12[$i] = array($database[$i]['QS12']);
            $sum_sigmaX12 = array_sum($sigmaX12);
            $sigmaX13[$i] = array($database[$i]['QS13']);
            $sum_sigmaX13 = array_sum($sigmaX13);
            $sigmaX14[$i] = array($database[$i]['QS14']);
            $sum_sigmaX14 = array_sum($sigmaX14);
            $sigmaX15[$i] = array($database[$i]['QS15']);
            $sum_sigmaX15 = array_sum($sigmaX15);
            $sigmaX16[$i] = array($database[$i]['QS16']);
            $sum_sigmaX16 = array_sum($sigmaX16);
            $sigmaX17[$i] = array($database[$i]['QS17']);
            $sum_sigmaX17 = array_sum($sigmaX17);
            $sigmaX18[$i] = array($database[$i]['QS18']);
            $sum_sigmaX18 = array_sum($sigmaX18);
            $sigmaXtotal[$i] = array($database[$i]['total']);
            $sum_sigmaXtotal = array_sum($sigmaXtotal);
            // End Mencari sigmaX
            // Mencari nilai (X)^2 
            $Xpangkat1[$i] = pow($database[$i]['QS01'], 2);
            $pangkatX1 = array_sum($Xpangkat1);
            $Xpangkat2[$i] = pow($database[$i]['QS02'], 2);
            $pangkatX2 = array_sum($Xpangkat2);
            $Xpangkat3[$i] = pow($database[$i]['QS03'], 2);
            $pangkatX3 = array_sum($Xpangkat3);
            $Xpangkat4[$i] = pow($database[$i]['QS04'], 2);
            $pangkatX4 = array_sum($Xpangkat4);
            $Xpangkat5[$i] = pow($database[$i]['QS05'], 2);
            $pangkatX5 = array_sum($Xpangkat5);
            $Xpangkat6[$i] = pow($database[$i]['QS06'], 2);
            $pangkatX6 = array_sum($Xpangkat6);
            $Xpangkat7[$i] = pow($database[$i]['QS07'], 2);
            $pangkatX7 = array_sum($Xpangkat7);
            $Xpangkat8[$i] = pow($database[$i]['QS08'], 2);
            $pangkatX8 = array_sum($Xpangkat8);
            $Xpangkat9[$i] = pow($database[$i]['QS09'], 2);
            $pangkatX9 = array_sum($Xpangkat9);
            $Xpangkat10[$i] = pow($database[$i]['QS10'], 2);
            $pangkatX10 = array_sum($Xpangkat10);
            $Xpangkat11[$i] = pow($database[$i]['QS11'], 2);
            $pangkatX11 = array_sum($Xpangkat11);
            $Xpangkat12[$i] = pow($database[$i]['QS12'], 2);
            $pangkatX12 = array_sum($Xpangkat12);
            $Xpangkat13[$i] = pow($database[$i]['QS13'], 2);
            $pangkatX13 = array_sum($Xpangkat13);
            $Xpangkat14[$i] = pow($database[$i]['QS14'], 2);
            $pangkatX14 = array_sum($Xpangkat14);
            $Xpangkat15[$i] = pow($database[$i]['QS15'], 2);
            $pangkatX15 = array_sum($Xpangkat15);
            $Xpangkat16[$i] = pow($database[$i]['QS16'], 2);
            $pangkatX16 = array_sum($Xpangkat16);
            $Xpangkat17[$i] = pow($database[$i]['QS17'], 2);
            $pangkatX17 = array_sum($Xpangkat17);
            $Xpangkat18[$i] = pow($database[$i]['QS18'], 2);
            $pangkatX18 = array_sum($Xpangkat18);
            $totalpangkat[$i] = pow($database[$i]['total'], 2);
            $Ykuadrat = array_sum($totalpangkat);

            $dataXkuadrat[$i] = array(
                'P1' => $Xpangkat1[$i],
                'P2' => $Xpangkat2[$i],
                'P3' => $Xpangkat3[$i],
                'P4' => $Xpangkat4[$i],
                'P5' => $Xpangkat5[$i],
                'P6' => $Xpangkat6[$i],
                'P7' => $Xpangkat7[$i],
                'P8' => $Xpangkat8[$i],
                'P9' => $Xpangkat9[$i],
                'P10' => $Xpangkat10[$i],
                'P11' => $Xpangkat11[$i],
                'P12' => $Xpangkat12[$i],
                'P13' => $Xpangkat13[$i],
                'P14' => $Xpangkat14[$i],
                'P15' => $Xpangkat15[$i],
                'P16' => $Xpangkat16[$i],
                'P17' => $Xpangkat17[$i],
                'P18' => $Xpangkat18[$i],
                'Y' => $totalpangkat[$i]
            );
            // Data hitung S^2
            $S2QS1 = (10 * $dataXkuadrat[$i]['P1']) - pow($sum_sigmaX1, 2) / 10*(10-1);
            $S2QS2 = (10 * $dataXkuadrat[$i]['P2']) - pow($sum_sigmaX2, 2) / 10*(10-1);
            $S2QS3 = (10 * $dataXkuadrat[$i]['P3']) - pow($sum_sigmaX3, 2) / 10*(10-1);
            $S2QS4 = (10 * $dataXkuadrat[$i]['P4']) - pow($sum_sigmaX4, 2) / 10*(10-1);
            $S2QS5 = (10 * $dataXkuadrat[$i]['P5']) - pow($sum_sigmaX5, 2) / 10*(10-1);
            $S2QS6 = (10 * $dataXkuadrat[$i]['P6']) - pow($sum_sigmaX6, 2) / 10*(10-1);
            $S2QS7 = (10 * $dataXkuadrat[$i]['P7']) - pow($sum_sigmaX7, 2) / 10*(10-1);
            $S2QS8 = (10 * $dataXkuadrat[$i]['P8']) - pow($sum_sigmaX8, 2) / 10*(10-1);
            $S2QS9 = (10 * $dataXkuadrat[$i]['P9']) - pow($sum_sigmaX9, 2) / 10*(10-1);
            $S2QS10 = (10 * $dataXkuadrat[$i]['P10']) - pow($sum_sigmaX10, 2) / 10*(10-1);
            $S2QS11 = (10 * $dataXkuadrat[$i]['P11']) - pow($sum_sigmaX11, 2) / 10*(10-1);
            $S2QS12 = (10 * $dataXkuadrat[$i]['P12']) - pow($sum_sigmaX12, 2) / 10*(10-1);
            $S2QS13 = (10 * $dataXkuadrat[$i]['P13']) - pow($sum_sigmaX13, 2) / 10*(10-1);
            $S2QS14 = (10 * $dataXkuadrat[$i]['P14']) - pow($sum_sigmaX14, 2) / 10*(10-1);
            $S2QS15 = (10 * $dataXkuadrat[$i]['P15']) - pow($sum_sigmaX15, 2) / 10*(10-1);
            $S2QS16 = (10 * $dataXkuadrat[$i]['P16']) - pow($sum_sigmaX16, 2) / 10*(10-1);
            $S2QS17 = (10 * $dataXkuadrat[$i]['P17']) - pow($sum_sigmaX17, 2) / 10*(10-1);
            $S2QS18 = (10 * $dataXkuadrat[$i]['P18']) - pow($sum_sigmaX18, 2) / 10*(10-1);
            $S2total = (10 * $dataXkuadrat[$i]['Y']) - pow($sum_sigmaXtotal, 2) / 10*(10-1);
        }
        $S2 = array($S2QS1,$S2QS2,$S2QS3,$S2QS4,$S2QS5,$S2QS6,$S2QS7,$S2QS8,$S2QS9,$S2QS10,$S2QS11,$S2QS12,$S2QS13,$S2QS14,$S2QS15,$S2QS16,$S2QS17,$S2QS18);
        $S2Sum = array_sum($S2);
        $atas = 18 / (18-1);
        $bawah = 1 - ( $S2Sum / $S2total );
        $Cralpha = $atas * $bawah;
        $reabilitas = array('Xkuadrat'=>$dataXkuadrat, 'S2QS1'=> $S2QS1, 'S2QS2'=> $S2QS2, 'S2QS3'=> $S2QS3, 'S2QS4'=> $S2QS4, 'S2QS5'=> $S2QS5, 'S2QS6'=> $S2QS6, 'S2QS7'=> $S2QS7, 'S2QS8'=> $S2QS8, 'S2QS9'=> $S2QS9, 'S2QS10'=> $S2QS10, 'S2QS11'=> $S2QS11, 'S2QS12'=> $S2QS12, 'S2QS13'=> $S2QS13, 'S2QS14'=> $S2QS14, 'S2QS15'=> $S2QS15, 'S2QS16'=> $S2QS16, 'S2QS17'=> $S2QS17, 'S2QS18'=> $S2QS18, 'S2total'=> $S2total, 'Cralpha'=>$Cralpha) ;

        return $reabilitas;
    }
}
// End Hitung rumus Reabilitas disfungsional


// Cust requirement kano model
function cust()
{
    $conn = koneksi();
    mysqli_query($conn, "TRUNCATE tmp_cust");
    mysqli_query($conn, "TRUNCATE tmp_sactifaction");
    $cek = mysqli_query($conn, "SELECT * FROM jawaban");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            // customer requirement QS01
            // I
            if ($result['QS01'] == 'Suka' && $result['disQS01'] == 'Suka') {
                $QS01 = "Q";
            }
            if ($result['QS01'] == 'Suka' && $result['disQS01'] == 'Harap') {
                $QS01 = "A";
            }
            if ($result['QS01'] == 'Suka' && $result['disQS01'] == 'Netral') {
                $QS01 = "A";
            }
            if ($result['QS01'] == 'Suka' && $result['disQS01'] == 'Toleransi') {
                $QS01 = "A";
            }
            if ($result['QS01'] == 'Suka' && $result['disQS01'] == 'Tidak Suka'){
                $QS01 = "Q";
            }
            // II
            if ($result['QS01'] == 'Harap' && $result['disQS01'] == 'Suka') {
                $QS01 = "R";
            }
            if ($result['QS01'] == 'Harap' && $result['disQS01'] == 'Harap') {
                $QS01 = "I";
            }
            if ($result['QS01'] == 'Harap' && $result['disQS01'] == 'Netral') {
                $QS01 = "I";
            }
            if ($result['QS01'] == 'Harap' && $result['disQS01'] == 'Toleransi') {
                $QS01 = "I";
            }
            if ($result['QS01'] == 'Harap' && $result['disQS01'] == 'Tidak Suka'){
                $QS01 = "M";
            }
            // II
            if ($result['QS01'] == 'Netral' && $result['disQS01'] == 'Suka') {
                $QS01 = "R";
            }
            if ($result['QS01'] == 'Netral' && $result['disQS01'] == 'Harap') {
                $QS01 = "I";
            }
            if ($result['QS01'] == 'Netral' && $result['disQS01'] == 'Netral') {
                $QS01 = "I";
            }
            if ($result['QS01'] == 'Netral' && $result['disQS01'] == 'Toleransi') {
                $QS01 = "I";
            }
            if ($result['QS01'] == 'Netral' && $result['disQS01'] == 'Tidak Suka'){
                $QS01 = "M";
            }
           // III
            if ($result['QS01'] == 'Toleransi' && $result['disQS01'] == 'Suka') {
                $QS01 = "R";
            }
            if ($result['QS01'] == 'Toleransi' && $result['disQS01'] == 'Harap') {
                $QS01 = "I";
            }
            if ($result['QS01'] == 'Toleransi' && $result['disQS01'] == 'Netral') {
                $QS01 = "I";
            }
            if ($result['QS01'] == 'Toleransi' && $result['disQS01'] == 'Toleransi') {
                $QS01 = "I";
            }
            if ($result['QS01'] == 'Toleransi' && $result['disQS01'] == 'Tidak Suka'){
                $QS01 = "M";
            }
            // IV
            if ($result['QS01'] == 'Tidak Suka' && $result['disQS01'] == 'Suka') {
                $QS01 = "R";
            }
            if ($result['QS01'] == 'Tidak Suka' && $result['disQS01'] == 'Harap') {
                $QS01 = "R";
            }
            if ($result['QS01'] == 'Tidak Suka' && $result['disQS01'] == 'Netral') {
                $QS01 = "R";
            }
            if ($result['QS01'] == 'Tidak Suka' && $result['disQS01'] == 'Toleransi') {
                $QS01 = "R";
            }
            if ($result['QS01'] == 'Tidak Suka' && $result['disQS01'] == 'Tidak Suka'){
                $QS01 = "Q";
            }
            // End Customer requirement QS01

            // customer requirement QS02
            // I
            if ($result['QS02'] == 'Suka' && $result['disQS02'] == 'Suka') {
                $QS02 = "Q";
            }
            if ($result['QS02'] == 'Suka' && $result['disQS02'] == 'Harap') {
                $QS02 = "A";
            }
            if ($result['QS02'] == 'Suka' && $result['disQS02'] == 'Netral') {
                $QS02 = "A";
            }
            if ($result['QS02'] == 'Suka' && $result['disQS02'] == 'Toleransi') {
                $QS02 = "A";
            }
            if ($result['QS02'] == 'Suka' && $result['disQS02'] == 'Tidak Suka'){
                $QS02 = "Q";
            }
            // II
            if ($result['QS02'] == 'Harap' && $result['disQS02'] == 'Suka') {
                $QS02 = "R";
            }
            if ($result['QS02'] == 'Harap' && $result['disQS02'] == 'Harap') {
                $QS02 = "I";
            }
            if ($result['QS02'] == 'Harap' && $result['disQS02'] == 'Netral') {
                $QS02 = "I";
            }
            if ($result['QS02'] == 'Harap' && $result['disQS02'] == 'Toleransi') {
                $QS02 = "I";
            }
            if ($result['QS02'] == 'Harap' && $result['disQS02'] == 'Tidak Suka'){
                $QS02 = "M";
            }
            // II
            if ($result['QS02'] == 'Netral' && $result['disQS02'] == 'Suka') {
                $QS02 = "R";
            }
            if ($result['QS02'] == 'Netral' && $result['disQS02'] == 'Harap') {
                $QS02 = "I";
            }
            if ($result['QS02'] == 'Netral' && $result['disQS02'] == 'Netral') {
                $QS02 = "I";
            }
            if ($result['QS02'] == 'Netral' && $result['disQS02'] == 'Toleransi') {
                $QS02 = "I";
            }
            if ($result['QS02'] == 'Netral' && $result['disQS02'] == 'Tidak Suka'){
                $QS02 = "M";
            }
           // III
            if ($result['QS02'] == 'Toleransi' && $result['disQS02'] == 'Suka') {
                $QS02 = "R";
            }
            if ($result['QS02'] == 'Toleransi' && $result['disQS02'] == 'Harap') {
                $QS02 = "I";
            }
            if ($result['QS02'] == 'Toleransi' && $result['disQS02'] == 'Netral') {
                $QS02 = "I";
            }
            if ($result['QS02'] == 'Toleransi' && $result['disQS02'] == 'Toleransi') {
                $QS02 = "I";
            }
            if ($result['QS02'] == 'Toleransi' && $result['disQS02'] == 'Tidak Suka'){
                $QS02 = "M";
            }
            // IV
            if ($result['QS02'] == 'Tidak Suka' && $result['disQS02'] == 'Suka') {
                $QS02 = "R";
            }
            if ($result['QS02'] == 'Tidak Suka' && $result['disQS02'] == 'Harap') {
                $QS02 = "R";
            }
            if ($result['QS02'] == 'Tidak Suka' && $result['disQS02'] == 'Netral') {
                $QS02 = "R";
            }
            if ($result['QS02'] == 'Tidak Suka' && $result['disQS02'] == 'Toleransi') {
                $QS02 = "R";
            }
            if ($result['QS02'] == 'Tidak Suka' && $result['disQS02'] == 'Tidak Suka'){
                $QS02 = "Q";
            }
            // End Customer requirement QS02

            // customer requirement QS03
            // I
            if ($result['QS03'] == 'Suka' && $result['disQS03'] == 'Suka') {
                $QS03 = "Q";
            }
            if ($result['QS03'] == 'Suka' && $result['disQS03'] == 'Harap') {
                $QS03 = "A";
            }
            if ($result['QS03'] == 'Suka' && $result['disQS03'] == 'Netral') {
                $QS03 = "A";
            }
            if ($result['QS03'] == 'Suka' && $result['disQS03'] == 'Toleransi') {
                $QS03 = "A";
            }
            if ($result['QS03'] == 'Suka' && $result['disQS03'] == 'Tidak Suka'){
                $QS03 = "Q";
            }
            // II
            if ($result['QS03'] == 'Harap' && $result['disQS03'] == 'Suka') {
                $QS03 = "R";
            }
            if ($result['QS03'] == 'Harap' && $result['disQS03'] == 'Harap') {
                $QS03 = "I";
            }
            if ($result['QS03'] == 'Harap' && $result['disQS03'] == 'Netral') {
                $QS03 = "I";
            }
            if ($result['QS03'] == 'Harap' && $result['disQS03'] == 'Toleransi') {
                $QS03 = "I";
            }
            if ($result['QS03'] == 'Harap' && $result['disQS03'] == 'Tidak Suka'){
                $QS03 = "M";
            }
            // II
            if ($result['QS03'] == 'Netral' && $result['disQS03'] == 'Suka') {
                $QS03 = "R";
            }
            if ($result['QS03'] == 'Netral' && $result['disQS03'] == 'Harap') {
                $QS03 = "I";
            }
            if ($result['QS03'] == 'Netral' && $result['disQS03'] == 'Netral') {
                $QS03 = "I";
            }
            if ($result['QS03'] == 'Netral' && $result['disQS03'] == 'Toleransi') {
                $QS03 = "I";
            }
            if ($result['QS03'] == 'Netral' && $result['disQS03'] == 'Tidak Suka'){
                $QS03 = "M";
            }
           // III
            if ($result['QS03'] == 'Toleransi' && $result['disQS03'] == 'Suka') {
                $QS03 = "R";
            }
            if ($result['QS03'] == 'Toleransi' && $result['disQS03'] == 'Harap') {
                $QS03 = "I";
            }
            if ($result['QS03'] == 'Toleransi' && $result['disQS03'] == 'Netral') {
                $QS03 = "I";
            }
            if ($result['QS03'] == 'Toleransi' && $result['disQS03'] == 'Toleransi') {
                $QS03 = "I";
            }
            if ($result['QS03'] == 'Toleransi' && $result['disQS03'] == 'Tidak Suka'){
                $QS03 = "M";
            }
            // IV
            if ($result['QS03'] == 'Tidak Suka' && $result['disQS03'] == 'Suka') {
                $QS03 = "R";
            }
            if ($result['QS03'] == 'Tidak Suka' && $result['disQS03'] == 'Harap') {
                $QS03 = "R";
            }
            if ($result['QS03'] == 'Tidak Suka' && $result['disQS03'] == 'Netral') {
                $QS03 = "R";
            }
            if ($result['QS03'] == 'Tidak Suka' && $result['disQS03'] == 'Toleransi') {
                $QS03 = "R";
            }
            if ($result['QS03'] == 'Tidak Suka' && $result['disQS03'] == 'Tidak Suka'){
                $QS03 = "Q";
            }
            // End Customer requirement QS03

            // customer requirement QS04
            // I
            if ($result['QS04'] == 'Suka' && $result['disQS04'] == 'Suka') {
                $QS04 = "Q";
            }
            if ($result['QS04'] == 'Suka' && $result['disQS04'] == 'Harap') {
                $QS04 = "A";
            }
            if ($result['QS04'] == 'Suka' && $result['disQS04'] == 'Netral') {
                $QS04 = "A";
            }
            if ($result['QS04'] == 'Suka' && $result['disQS04'] == 'Toleransi') {
                $QS04 = "A";
            }
            if ($result['QS04'] == 'Suka' && $result['disQS04'] == 'Tidak Suka'){
                $QS04 = "Q";
            }
            // II
            if ($result['QS04'] == 'Harap' && $result['disQS04'] == 'Suka') {
                $QS04 = "R";
            }
            if ($result['QS04'] == 'Harap' && $result['disQS04'] == 'Harap') {
                $QS04 = "I";
            }
            if ($result['QS04'] == 'Harap' && $result['disQS04'] == 'Netral') {
                $QS04 = "I";
            }
            if ($result['QS04'] == 'Harap' && $result['disQS04'] == 'Toleransi') {
                $QS04 = "I";
            }
            if ($result['QS04'] == 'Harap' && $result['disQS04'] == 'Tidak Suka'){
                $QS04 = "M";
            }
            // II
            if ($result['QS04'] == 'Netral' && $result['disQS04'] == 'Suka') {
                $QS04 = "R";
            }
            if ($result['QS04'] == 'Netral' && $result['disQS04'] == 'Harap') {
                $QS04 = "I";
            }
            if ($result['QS04'] == 'Netral' && $result['disQS04'] == 'Netral') {
                $QS04 = "I";
            }
            if ($result['QS04'] == 'Netral' && $result['disQS04'] == 'Toleransi') {
                $QS04 = "I";
            }
            if ($result['QS04'] == 'Netral' && $result['disQS04'] == 'Tidak Suka'){
                $QS04 = "M";
            }
            // III
            if ($result['QS04'] == 'Toleransi' && $result['disQS04'] == 'Suka') {
                $QS04 = "R";
            }
            if ($result['QS04'] == 'Toleransi' && $result['disQS04'] == 'Harap') {
                $QS04 = "I";
            }
            if ($result['QS04'] == 'Toleransi' && $result['disQS04'] == 'Netral') {
                $QS04 = "I";
            }
            if ($result['QS04'] == 'Toleransi' && $result['disQS04'] == 'Toleransi') {
                $QS04 = "I";
            }
            if ($result['QS04'] == 'Toleransi' && $result['disQS04'] == 'Tidak Suka'){
                $QS04 = "M";
            }
            // IV
            if ($result['QS04'] == 'Tidak Suka' && $result['disQS04'] == 'Suka') {
                $QS04 = "R";
            }
            if ($result['QS04'] == 'Tidak Suka' && $result['disQS04'] == 'Harap') {
                $QS04 = "R";
            }
            if ($result['QS04'] == 'Tidak Suka' && $result['disQS04'] == 'Netral') {
                $QS04 = "R";
            }
            if ($result['QS04'] == 'Tidak Suka' && $result['disQS04'] == 'Toleransi') {
                $QS04 = "R";
            }
            if ($result['QS04'] == 'Tidak Suka' && $result['disQS04'] == 'Tidak Suka'){
                $QS04 = "Q";
            }
            // End Customer requirement QS04

            // Customer requirement QS05
            // I
            if ($result['QS05'] == 'Suka' && $result['disQS05'] == 'Suka') {
                $QS05 = "Q";
            }
            if ($result['QS05'] == 'Suka' && $result['disQS05'] == 'Harap') {
                $QS05 = "A";
            }
            if ($result['QS05'] == 'Suka' && $result['disQS05'] == 'Netral') {
                $QS05 = "A";
            }
            if ($result['QS05'] == 'Suka' && $result['disQS05'] == 'Toleransi') {
                $QS05 = "A";
            }
            if ($result['QS05'] == 'Suka' && $result['disQS05'] == 'Tidak Suka'){
                $QS05 = "Q";
            }
            // II
            if ($result['QS05'] == 'Harap' && $result['disQS05'] == 'Suka') {
                $QS05 = "R";
            }
            if ($result['QS05'] == 'Harap' && $result['disQS05'] == 'Harap') {
                $QS05 = "I";
            }
            if ($result['QS05'] == 'Harap' && $result['disQS05'] == 'Netral') {
                $QS05 = "I";
            }
            if ($result['QS05'] == 'Harap' && $result['disQS05'] == 'Toleransi') {
                $QS05 = "I";
            }
            if ($result['QS05'] == 'Harap' && $result['disQS05'] == 'Tidak Suka'){
                $QS05 = "M";
            }
            // II
            if ($result['QS05'] == 'Netral' && $result['disQS05'] == 'Suka') {
                $QS05 = "R";
            }
            if ($result['QS05'] == 'Netral' && $result['disQS05'] == 'Harap') {
                $QS05 = "I";
            }
            if ($result['QS05'] == 'Netral' && $result['disQS05'] == 'Netral') {
                $QS05 = "I";
            }
            if ($result['QS05'] == 'Netral' && $result['disQS05'] == 'Toleransi') {
                $QS05 = "I";
            }
            if ($result['QS05'] == 'Netral' && $result['disQS05'] == 'Tidak Suka'){
                $QS05 = "M";
            }
            // III
            if ($result['QS05'] == 'Toleransi' && $result['disQS05'] == 'Suka') {
                $QS05 = "R";
            }
            if ($result['QS05'] == 'Toleransi' && $result['disQS05'] == 'Harap') {
                $QS05 = "I";
            }
            if ($result['QS05'] == 'Toleransi' && $result['disQS05'] == 'Netral') {
                $QS05 = "I";
            }
            if ($result['QS05'] == 'Toleransi' && $result['disQS05'] == 'Toleransi') {
                $QS05 = "I";
            }
            if ($result['QS05'] == 'Toleransi' && $result['disQS05'] == 'Tidak Suka'){
                $QS05 = "M";
            }
            // IV
            if ($result['QS05'] == 'Tidak Suka' && $result['disQS05'] == 'Suka') {
                $QS05 = "R";
            }
            if ($result['QS05'] == 'Tidak Suka' && $result['disQS05'] == 'Harap') {
                $QS05 = "R";
            }
            if ($result['QS05'] == 'Tidak Suka' && $result['disQS05'] == 'Netral') {
                $QS05 = "R";
            }
            if ($result['QS05'] == 'Tidak Suka' && $result['disQS05'] == 'Toleransi') {
                $QS05 = "R";
            }
            if ($result['QS05'] == 'Tidak Suka' && $result['disQS05'] == 'Tidak Suka'){
                $QS05 = "Q";
            }
            // End Customer requirement QS05
            // Customer requirement QS06
            // I
            if ($result['QS06'] == 'Suka' && $result['disQS06'] == 'Suka') {
                $QS06 = "Q";
            }
            if ($result['QS06'] == 'Suka' && $result['disQS06'] == 'Harap') {
                $QS06 = "A";
            }
            if ($result['QS06'] == 'Suka' && $result['disQS06'] == 'Netral') {
                $QS06 = "A";
            }
            if ($result['QS06'] == 'Suka' && $result['disQS06'] == 'Toleransi') {
                $QS06 = "A";
            }
            if ($result['QS06'] == 'Suka' && $result['disQS06'] == 'Tidak Suka'){
                $QS06 = "Q";
            }
            // II
            if ($result['QS06'] == 'Harap' && $result['disQS06'] == 'Suka') {
                $QS06 = "R";
            }
            if ($result['QS06'] == 'Harap' && $result['disQS06'] == 'Harap') {
                $QS06 = "I";
            }
            if ($result['QS06'] == 'Harap' && $result['disQS06'] == 'Netral') {
                $QS06 = "I";
            }
            if ($result['QS06'] == 'Harap' && $result['disQS06'] == 'Toleransi') {
                $QS06 = "I";
            }
            if ($result['QS06'] == 'Harap' && $result['disQS06'] == 'Tidak Suka'){
                $QS06 = "M";
            }
            // II
            if ($result['QS06'] == 'Netral' && $result['disQS06'] == 'Suka') {
                $QS06 = "R";
            }
            if ($result['QS06'] == 'Netral' && $result['disQS06'] == 'Harap') {
                $QS06 = "I";
            }
            if ($result['QS06'] == 'Netral' && $result['disQS06'] == 'Netral') {
                $QS06 = "I";
            }
            if ($result['QS06'] == 'Netral' && $result['disQS06'] == 'Toleransi') {
                $QS06 = "I";
            }
            if ($result['QS06'] == 'Netral' && $result['disQS06'] == 'Tidak Suka'){
                $QS06 = "M";
            }
            // III
            if ($result['QS06'] == 'Toleransi' && $result['disQS06'] == 'Suka') {
                $QS06 = "R";
            }
            if ($result['QS06'] == 'Toleransi' && $result['disQS06'] == 'Harap') {
                $QS06 = "I";
            }
            if ($result['QS06'] == 'Toleransi' && $result['disQS06'] == 'Netral') {
                $QS06 = "I";
            }
            if ($result['QS06'] == 'Toleransi' && $result['disQS06'] == 'Toleransi') {
                $QS06 = "I";
            }
            if ($result['QS06'] == 'Toleransi' && $result['disQS06'] == 'Tidak Suka'){
                $QS06 = "M";
            }
            // IV
            if ($result['QS06'] == 'Tidak Suka' && $result['disQS06'] == 'Suka') {
                $QS06 = "R";
            }
            if ($result['QS06'] == 'Tidak Suka' && $result['disQS06'] == 'Harap') {
                $QS06 = "R";
            }
            if ($result['QS06'] == 'Tidak Suka' && $result['disQS06'] == 'Netral') {
                $QS06 = "R";
            }
            if ($result['QS06'] == 'Tidak Suka' && $result['disQS06'] == 'Toleransi') {
                $QS06 = "R";
            }
            if ($result['QS06'] == 'Tidak Suka' && $result['disQS06'] == 'Tidak Suka'){
                $QS06 = "Q";
            }
            // End customer requirement QS06
            // Customer requirement QS07
            // I
            if ($result['QS07'] == 'Suka' && $result['disQS07'] == 'Suka') {
                $QS07 = "Q";
            }
            if ($result['QS07'] == 'Suka' && $result['disQS07'] == 'Harap') {
                $QS07 = "A";
            }
            if ($result['QS07'] == 'Suka' && $result['disQS07'] == 'Netral') {
                $QS07 = "A";
            }
            if ($result['QS07'] == 'Suka' && $result['disQS07'] == 'Toleransi') {
                $QS07 = "A";
            }
            if ($result['QS07'] == 'Suka' && $result['disQS07'] == 'Tidak Suka'){
                $QS07 = "Q";
            }
            // II
            if ($result['QS07'] == 'Harap' && $result['disQS07'] == 'Suka') {
                $QS07 = "R";
            }
            if ($result['QS07'] == 'Harap' && $result['disQS07'] == 'Harap') {
                $QS07 = "I";
            }
            if ($result['QS07'] == 'Harap' && $result['disQS07'] == 'Netral') {
                $QS07 = "I";
            }
            if ($result['QS07'] == 'Harap' && $result['disQS07'] == 'Toleransi') {
                $QS07 = "I";
            }
            if ($result['QS07'] == 'Harap' && $result['disQS07'] == 'Tidak Suka'){
                $QS07 = "M";
            }
            // II
            if ($result['QS07'] == 'Netral' && $result['disQS07'] == 'Suka') {
                $QS07 = "R";
            }
            if ($result['QS07'] == 'Netral' && $result['disQS07'] == 'Harap') {
                $QS07 = "I";
            }
            if ($result['QS07'] == 'Netral' && $result['disQS07'] == 'Netral') {
                $QS07 = "I";
            }
            if ($result['QS07'] == 'Netral' && $result['disQS07'] == 'Toleransi') {
                $QS07 = "I";
            }
            if ($result['QS07'] == 'Netral' && $result['disQS07'] == 'Tidak Suka'){
                $QS07 = "M";
            }
            // III
            if ($result['QS07'] == 'Toleransi' && $result['disQS07'] == 'Suka') {
                $QS07 = "R";
            }
            if ($result['QS07'] == 'Toleransi' && $result['disQS07'] == 'Harap') {
                $QS07 = "I";
            }
            if ($result['QS07'] == 'Toleransi' && $result['disQS07'] == 'Netral') {
                $QS07 = "I";
            }
            if ($result['QS07'] == 'Toleransi' && $result['disQS07'] == 'Toleransi') {
                $QS07 = "I";
            }
            if ($result['QS07'] == 'Toleransi' && $result['disQS07'] == 'Tidak Suka'){
                $QS07 = "M";
            }
            // IV
            if ($result['QS07'] == 'Tidak Suka' && $result['disQS07'] == 'Suka') {
                $QS07 = "R";
            }
            if ($result['QS07'] == 'Tidak Suka' && $result['disQS07'] == 'Harap') {
                $QS07 = "R";
            }
            if ($result['QS07'] == 'Tidak Suka' && $result['disQS07'] == 'Netral') {
                $QS07 = "R";
            }
            if ($result['QS07'] == 'Tidak Suka' && $result['disQS07'] == 'Toleransi') {
                $QS07 = "R";
            }
            if ($result['QS07'] == 'Tidak Suka' && $result['disQS07'] == 'Tidak Suka'){
                $QS07 = "Q";
            }
            // End customer requirement QS07

            // Customer requirement QS08

            // I
            if ($result['QS08'] == 'Suka' && $result['disQS08'] == 'Suka') {
                $QS08 = "Q";
            }
            if ($result['QS08'] == 'Suka' && $result['disQS08'] == 'Harap') {
                $QS08 = "A";
            }
            if ($result['QS08'] == 'Suka' && $result['disQS08'] == 'Netral') {
                $QS08 = "A";
            }
            if ($result['QS08'] == 'Suka' && $result['disQS08'] == 'Toleransi') {
                $QS08 = "A";
            }
            if ($result['QS08'] == 'Suka' && $result['disQS08'] == 'Tidak Suka'){
                $QS08 = "Q";
            }
            // II
            if ($result['QS08'] == 'Harap' && $result['disQS08'] == 'Suka') {
                $QS08 = "R";
            }
            if ($result['QS08'] == 'Harap' && $result['disQS08'] == 'Harap') {
                $QS08 = "I";
            }
            if ($result['QS08'] == 'Harap' && $result['disQS08'] == 'Netral') {
                $QS08 = "I";
            }
            if ($result['QS08'] == 'Harap' && $result['disQS08'] == 'Toleransi') {
                $QS08 = "I";
            }
            if ($result['QS08'] == 'Harap' && $result['disQS08'] == 'Tidak Suka'){
                $QS08 = "M";
            }
            // III
            if ($result['QS08'] == 'Netral' && $result['disQS08'] == 'Suka') {
                $QS08 = "R";
            }
            if ($result['QS08'] == 'Netral' && $result['disQS08'] == 'Harap') {
                $QS08 = "I";
            }
            if ($result['QS08'] == 'Netral' && $result['disQS08'] == 'Netral') {
                $QS08 = "I";
            }
            if ($result['QS08'] == 'Netral' && $result['disQS08'] == 'Toleransi') {
                $QS08 = "I";
            }
            if ($result['QS08'] == 'Netral' && $result['disQS08'] == 'Tidak Suka'){
                $QS08 = "M";
            }
            // IV
            if ($result['QS08'] == 'Toleransi' && $result['disQS08'] == 'Suka') {
                $QS08 = "R";
            }
            if ($result['QS08'] == 'Toleransi' && $result['disQS08'] == 'Harap') {
                $QS08 = "I";
            }
            if ($result['QS08'] == 'Toleransi' && $result['disQS08'] == 'Netral') {
                $QS08 = "I";
            }
            if ($result['QS08'] == 'Toleransi' && $result['disQS08'] == 'Toleransi') {
                $QS08 = "I";
            }
            if ($result['QS08'] == 'Toleransi' && $result['disQS08'] == 'Tidak Suka'){
                $QS08 = "M";
            }
            // V
            if ($result['QS08'] == 'Tidak Suka' && $result['disQS08'] == 'Suka') {
                $QS08 = "R";
            }
            if ($result['QS08'] == 'Tidak Suka' && $result['disQS08'] == 'Harap') {
                $QS08 = "R";
            }
            if ($result['QS08'] == 'Tidak Suka' && $result['disQS08'] == 'Netral') {
                $QS08 = "R";
            }
            if ($result['QS08'] == 'Tidak Suka' && $result['disQS08'] == 'Toleransi') {
                $QS08 = "R";
            }
            if ($result['QS08'] == 'Tidak Suka' && $result['disQS08'] == 'Tidak Suka'){
                $QS08 = "Q";
            }
            // End customer requirement QS08

            // Customet requirement QS09

            // I
            if ($result['QS09'] == 'Suka' && $result['disQS09'] == 'Suka') {
                $QS09 = "Q";
            }
            if ($result['QS09'] == 'Suka' && $result['disQS09'] == 'Harap') {
                $QS09 = "A";
            }
            if ($result['QS09'] == 'Suka' && $result['disQS09'] == 'Netral') {
                $QS09 = "A";
            }
            if ($result['QS09'] == 'Suka' && $result['disQS09'] == 'Toleransi') {
                $QS09 = "A";
            }
            if ($result['QS09'] == 'Suka' && $result['disQS09'] == 'Tidak Suka'){
                $QS09 = "Q";
            }
            // II
            if ($result['QS09'] == 'Harap' && $result['disQS09'] == 'Suka') {
                $QS09 = "R";
            }
            if ($result['QS09'] == 'Harap' && $result['disQS09'] == 'Harap') {
                $QS09 = "I";
            }
            if ($result['QS09'] == 'Harap' && $result['disQS09'] == 'Netral') {
                $QS09 = "I";
            }
            if ($result['QS09'] == 'Harap' && $result['disQS09'] == 'Toleransi') {
                $QS09 = "I";
            }
            if ($result['QS09'] == 'Harap' && $result['disQS09'] == 'Tidak Suka'){
                $QS09 = "M";
            }
            // II
            if ($result['QS09'] == 'Netral' && $result['disQS09'] == 'Suka') {
                $QS09 = "R";
            }
            if ($result['QS09'] == 'Netral' && $result['disQS09'] == 'Harap') {
                $QS09 = "I";
            }
            if ($result['QS09'] == 'Netral' && $result['disQS09'] == 'Netral') {
                $QS09 = "I";
            }
            if ($result['QS09'] == 'Netral' && $result['disQS09'] == 'Toleransi') {
                $QS09 = "I";
            }
            if ($result['QS09'] == 'Netral' && $result['disQS09'] == 'Tidak Suka'){
                $QS09 = "M";
            }
            // III
            if ($result['QS09'] == 'Toleransi' && $result['disQS09'] == 'Suka') {
                $QS09 = "R";
            }
            if ($result['QS09'] == 'Toleransi' && $result['disQS09'] == 'Harap') {
                $QS09 = "I";
            }
            if ($result['QS09'] == 'Toleransi' && $result['disQS09'] == 'Netral') {
                $QS09 = "I";
            }
            if ($result['QS09'] == 'Toleransi' && $result['disQS09'] == 'Toleransi') {
                $QS09 = "I";
            }
            if ($result['QS09'] == 'Toleransi' && $result['disQS09'] == 'Tidak Suka'){
                $QS09 = "M";
            }
            // IV
            if ($result['QS09'] == 'Tidak Suka' && $result['disQS09'] == 'Suka') {
                $QS09 = "R";
            }
            if ($result['QS09'] == 'Tidak Suka' && $result['disQS09'] == 'Harap') {
                $QS09 = "R";
            }
            if ($result['QS09'] == 'Tidak Suka' && $result['disQS09'] == 'Netral') {
                $QS09 = "R";
            }
            if ($result['QS09'] == 'Tidak Suka' && $result['disQS09'] == 'Toleransi') {
                $QS09 = "R";
            }
            if ($result['QS09'] == 'Tidak Suka' && $result['disQS09'] == 'Tidak Suka'){
                $QS09 = "Q";
            }
            // End Customer requirement QS09

            // Customer requirement QS10

            // I
            if ($result['QS10'] == 'Suka' && $result['disQS10'] == 'Suka') {
                $QS10 = "Q";
            }
            if ($result['QS10'] == 'Suka' && $result['disQS10'] == 'Harap') {
                $QS10 = "A";
            }
            if ($result['QS10'] == 'Suka' && $result['disQS10'] == 'Netral') {
                $QS10 = "A";
            }
            if ($result['QS10'] == 'Suka' && $result['disQS10'] == 'Toleransi') {
                $QS10 = "A";
            }
            if ($result['QS10'] == 'Suka' && $result['disQS10'] == 'Tidak Suka'){
                $QS10 = "Q";
            }
            // II
            if ($result['QS10'] == 'Harap' && $result['disQS10'] == 'Suka') {
                $QS10 = "R";
            }
            if ($result['QS10'] == 'Harap' && $result['disQS10'] == 'Harap') {
                $QS10 = "I";
            }
            if ($result['QS10'] == 'Harap' && $result['disQS10'] == 'Netral') {
                $QS10 = "I";
            }
            if ($result['QS10'] == 'Harap' && $result['disQS10'] == 'Toleransi') {
                $QS10 = "I";
            }
            if ($result['QS10'] == 'Harap' && $result['disQS10'] == 'Tidak Suka'){
                $QS10 = "M";
            }
            // III
            if ($result['QS10'] == 'Netral' && $result['disQS10'] == 'Suka') {
                $QS10 = "R";
            }
            if ($result['QS10'] == 'Netral' && $result['disQS10'] == 'Harap') {
                $QS10 = "I";
            }
            if ($result['QS10'] == 'Netral' && $result['disQS10'] == 'Netral') {
                $QS10 = "I";
            }
            if ($result['QS10'] == 'Netral' && $result['disQS10'] == 'Toleransi') {
                $QS10 = "I";
            }
            if ($result['QS10'] == 'Netral' && $result['disQS10'] == 'Tidak Suka'){
                $QS10 = "M";
            }
            // IV
            if ($result['QS10'] == 'Toleransi' && $result['disQS10'] == 'Suka') {
                $QS10 = "R";
            }
            if ($result['QS10'] == 'Toleransi' && $result['disQS10'] == 'Harap') {
                $QS10 = "I";
            }
            if ($result['QS10'] == 'Toleransi' && $result['disQS10'] == 'Netral') {
                $QS10 = "I";
            }
            if ($result['QS10'] == 'Toleransi' && $result['disQS10'] == 'Toleransi') {
                $QS10 = "I";
            }
            if ($result['QS10'] == 'Toleransi' && $result['disQS10'] == 'Tidak Suka'){
                $QS10 = "M";
            }
            // V
            if ($result['QS10'] == 'Tidak Suka' && $result['disQS10'] == 'Suka') {
                $QS10 = "R";
            }
            if ($result['QS10'] == 'Tidak Suka' && $result['disQS10'] == 'Harap') {
                $QS10 = "R";
            }
            if ($result['QS10'] == 'Tidak Suka' && $result['disQS10'] == 'Netral') {
                $QS10 = "R";
            }
            if ($result['QS10'] == 'Tidak Suka' && $result['disQS10'] == 'Toleransi') {
                $QS10 = "R";
            }
            if ($result['QS10'] == 'Tidak Suka' && $result['disQS10'] == 'Tidak Suka'){
                $QS10 = "Q";
            }
            // End customer requirement QS10

            // customer requirement QS01
            // I
            if ($result['QS11'] == 'Suka' && $result['disQS11'] == 'Suka') {
                $QS11 = "Q";
            }
            if ($result['QS11'] == 'Suka' && $result['disQS11'] == 'Harap') {
                $QS11 = "A";
            }
            if ($result['QS01'] == 'Suka' && $result['disQS11'] == 'Netral') {
                $QS11 = "A";
            }
            if ($result['QS11'] == 'Suka' && $result['disQS11'] == 'Toleransi') {
                $QS11 = "A";
            }
            if ($result['QS11'] == 'Suka' && $result['disQS11'] == 'Tidak Suka'){
                $QS11 = "Q";
            }
            // II
            if ($result['QS11'] == 'Harap' && $result['disQS11'] == 'Suka') {
                $QS11 = "R";
            }
            if ($result['QS11'] == 'Harap' && $result['disQS11'] == 'Harap') {
                $QS11 = "I";
            }
            if ($result['QS11'] == 'Harap' && $result['disQS11'] == 'Netral') {
                $QS11 = "I";
            }
            if ($result['QS11'] == 'Harap' && $result['disQS11'] == 'Toleransi') {
                $QS11 = "I";
            }
            if ($result['QS11'] == 'Harap' && $result['disQS11'] == 'Tidak Suka'){
                $QS11 = "M";
            }
            // II
            if ($result['QS11'] == 'Netral' && $result['disQS11'] == 'Suka') {
                $QS11 = "R";
            }
            if ($result['QS11'] == 'Netral' && $result['disQS11'] == 'Harap') {
                $QS11 = "I";
            }
            if ($result['QS11'] == 'Netral' && $result['disQS11'] == 'Netral') {
                $QS11 = "I";
            }
            if ($result['QS11'] == 'Netral' && $result['disQS11'] == 'Toleransi') {
                $QS11 = "I";
            }
            if ($result['QS11'] == 'Netral' && $result['disQS11'] == 'Tidak Suka'){
                $QS11 = "M";
            }
           // III
            if ($result['QS11'] == 'Toleransi' && $result['disQS11'] == 'Suka') {
                $QS11 = "R";
            }
            if ($result['QS11'] == 'Toleransi' && $result['disQS11'] == 'Harap') {
                $QS11 = "I";
            }
            if ($result['QS11'] == 'Toleransi' && $result['disQS11'] == 'Netral') {
                $QS11 = "I";
            }
            if ($result['QS11'] == 'Toleransi' && $result['disQS11'] == 'Toleransi') {
                $QS11 = "I";
            }
            if ($result['QS11'] == 'Toleransi' && $result['disQS11'] == 'Tidak Suka'){
                $QS11 = "M";
            }
            // IV
            if ($result['QS11'] == 'Tidak Suka' && $result['disQS11'] == 'Suka') {
                $QS11 = "R";
            }
            if ($result['QS11'] == 'Tidak Suka' && $result['disQS11'] == 'Harap') {
                $QS11 = "R";
            }
            if ($result['QS11'] == 'Tidak Suka' && $result['disQS11'] == 'Netral') {
                $QS11 = "R";
            }
            if ($result['QS11'] == 'Tidak Suka' && $result['disQS11'] == 'Toleransi') {
                $QS11 = "R";
            }
            if ($result['QS11'] == 'Tidak Suka' && $result['disQS11'] == 'Tidak Suka'){
                $QS11 = "Q";
            }
            // End Customer requirement QS11

            // customer requirement QS12
            // I
            if ($result['QS12'] == 'Suka' && $result['disQS12'] == 'Suka') {
                $QS12 = "Q";
            }
            if ($result['QS12'] == 'Suka' && $result['disQS12'] == 'Harap') {
                $QS12 = "A";
            }
            if ($result['QS12'] == 'Suka' && $result['disQS12'] == 'Netral') {
                $QS12 = "A";
            }
            if ($result['QS12'] == 'Suka' && $result['disQS12'] == 'Toleransi') {
                $QS12 = "A";
            }
            if ($result['QS12'] == 'Suka' && $result['disQS12'] == 'Tidak Suka'){
                $QS12 = "Q";
            }
            // II
            if ($result['QS12'] == 'Harap' && $result['disQS12'] == 'Suka') {
                $QS12 = "R";
            }
            if ($result['QS12'] == 'Harap' && $result['disQS12'] == 'Harap') {
                $QS12 = "I";
            }
            if ($result['QS12'] == 'Harap' && $result['disQS12'] == 'Netral') {
                $QS12 = "I";
            }
            if ($result['QS12'] == 'Harap' && $result['disQS12'] == 'Toleransi') {
                $QS12 = "I";
            }
            if ($result['QS12'] == 'Harap' && $result['disQS12'] == 'Tidak Suka'){
                $QS12 = "M";
            }
            // II
            if ($result['QS12'] == 'Netral' && $result['disQS12'] == 'Suka') {
                $QS12 = "R";
            }
            if ($result['QS12'] == 'Netral' && $result['disQS12'] == 'Harap') {
                $QS12 = "I";
            }
            if ($result['QS12'] == 'Netral' && $result['disQS12'] == 'Netral') {
                $QS12 = "I";
            }
            if ($result['QS12'] == 'Netral' && $result['disQS12'] == 'Toleransi') {
                $QS12 = "I";
            }
            if ($result['QS12'] == 'Netral' && $result['disQS12'] == 'Tidak Suka'){
                $QS12 = "M";
            }
           // III
            if ($result['QS12'] == 'Toleransi' && $result['disQS12'] == 'Suka') {
                $QS12 = "R";
            }
            if ($result['QS12'] == 'Toleransi' && $result['disQS12'] == 'Harap') {
                $QS12 = "I";
            }
            if ($result['QS12'] == 'Toleransi' && $result['disQS12'] == 'Netral') {
                $QS12 = "I";
            }
            if ($result['QS12'] == 'Toleransi' && $result['disQS12'] == 'Toleransi') {
                $QS12 = "I";
            }
            if ($result['QS12'] == 'Toleransi' && $result['disQS12'] == 'Tidak Suka'){
                $QS12 = "M";
            }
            // IV
            if ($result['QS12'] == 'Tidak Suka' && $result['disQS12'] == 'Suka') {
                $QS12 = "R";
            }
            if ($result['QS12'] == 'Tidak Suka' && $result['disQS12'] == 'Harap') {
                $QS12 = "R";
            }
            if ($result['QS12'] == 'Tidak Suka' && $result['disQS12'] == 'Netral') {
                $QS12 = "R";
            }
            if ($result['QS12'] == 'Tidak Suka' && $result['disQS12'] == 'Toleransi') {
                $QS12 = "R";
            }
            if ($result['QS12'] == 'Tidak Suka' && $result['disQS12'] == 'Tidak Suka'){
                $QS12 = "Q";
            }
            // End Customer requirement QS12

            // customer requirement QS13
            // I
            if ($result['QS13'] == 'Suka' && $result['disQS13'] == 'Suka') {
                $QS13 = "Q";
            }
            if ($result['QS13'] == 'Suka' && $result['disQS13'] == 'Harap') {
                $QS13 = "A";
            }
            if ($result['QS13'] == 'Suka' && $result['disQS13'] == 'Netral') {
                $QS13 = "A";
            }
            if ($result['QS13'] == 'Suka' && $result['disQS13'] == 'Toleransi') {
                $QS13 = "A";
            }
            if ($result['QS13'] == 'Suka' && $result['disQS13'] == 'Tidak Suka'){
                $QS13 = "Q";
            }
            // II
            if ($result['QS13'] == 'Harap' && $result['disQS13'] == 'Suka') {
                $QS13 = "R";
            }
            if ($result['QS13'] == 'Harap' && $result['disQS13'] == 'Harap') {
                $QS13 = "I";
            }
            if ($result['QS13'] == 'Harap' && $result['disQS13'] == 'Netral') {
                $QS13 = "I";
            }
            if ($result['QS13'] == 'Harap' && $result['disQS13'] == 'Toleransi') {
                $QS13 = "I";
            }
            if ($result['QS13'] == 'Harap' && $result['disQS13'] == 'Tidak Suka'){
                $QS13 = "M";
            }
            // II
            if ($result['QS13'] == 'Netral' && $result['disQS13'] == 'Suka') {
                $QS13 = "R";
            }
            if ($result['QS13'] == 'Netral' && $result['disQS13'] == 'Harap') {
                $QS13 = "I";
            }
            if ($result['QS13'] == 'Netral' && $result['disQS13'] == 'Netral') {
                $QS13 = "I";
            }
            if ($result['QS13'] == 'Netral' && $result['disQS13'] == 'Toleransi') {
                $QS13 = "I";
            }
            if ($result['QS13'] == 'Netral' && $result['disQS13'] == 'Tidak Suka'){
                $QS13 = "M";
            }
           // III
            if ($result['QS13'] == 'Toleransi' && $result['disQS13'] == 'Suka') {
                $QS13 = "R";
            }
            if ($result['QS13'] == 'Toleransi' && $result['disQS13'] == 'Harap') {
                $QS13 = "I";
            }
            if ($result['QS13'] == 'Toleransi' && $result['disQS13'] == 'Netral') {
                $QS13 = "I";
            }
            if ($result['QS13'] == 'Toleransi' && $result['disQS13'] == 'Toleransi') {
                $QS13 = "I";
            }
            if ($result['QS13'] == 'Toleransi' && $result['disQS13'] == 'Tidak Suka'){
                $QS13 = "M";
            }
            // IV
            if ($result['QS13'] == 'Tidak Suka' && $result['disQS13'] == 'Suka') {
                $QS13 = "R";
            }
            if ($result['QS13'] == 'Tidak Suka' && $result['disQS13'] == 'Harap') {
                $QS13 = "R";
            }
            if ($result['QS13'] == 'Tidak Suka' && $result['disQS13'] == 'Netral') {
                $QS13 = "R";
            }
            if ($result['QS13'] == 'Tidak Suka' && $result['disQS13'] == 'Toleransi') {
                $QS13 = "R";
            }
            if ($result['QS13'] == 'Tidak Suka' && $result['disQS13'] == 'Tidak Suka'){
                $QS13 = "Q";
            }
            // End Customer requirement QS13

            // customer requirement QS14
            // I
            if ($result['QS14'] == 'Suka' && $result['disQS14'] == 'Suka') {
                $QS14 = "Q";
            }
            if ($result['QS14'] == 'Suka' && $result['disQS14'] == 'Harap') {
                $QS14 = "A";
            }
            if ($result['QS14'] == 'Suka' && $result['disQS14'] == 'Netral') {
                $QS14 = "A";
            }
            if ($result['QS14'] == 'Suka' && $result['disQS14'] == 'Toleransi') {
                $QS14 = "A";
            }
            if ($result['QS14'] == 'Suka' && $result['disQS14'] == 'Tidak Suka'){
                $QS14 = "Q";
            }
            // II
            if ($result['QS14'] == 'Harap' && $result['disQS14'] == 'Suka') {
                $QS14 = "R";
            }
            if ($result['QS14'] == 'Harap' && $result['disQS14'] == 'Harap') {
                $QS14 = "I";
            }
            if ($result['QS14'] == 'Harap' && $result['disQS14'] == 'Netral') {
                $QS14 = "I";
            }
            if ($result['QS14'] == 'Harap' && $result['disQS14'] == 'Toleransi') {
                $QS14 = "I";
            }
            if ($result['QS14'] == 'Harap' && $result['disQS14'] == 'Tidak Suka'){
                $QS14 = "M";
            }
            // II
            if ($result['QS14'] == 'Netral' && $result['disQS14'] == 'Suka') {
                $QS14 = "R";
            }
            if ($result['QS14'] == 'Netral' && $result['disQS14'] == 'Harap') {
                $QS14 = "I";
            }
            if ($result['QS14'] == 'Netral' && $result['disQS14'] == 'Netral') {
                $QS14 = "I";
            }
            if ($result['QS14'] == 'Netral' && $result['disQS14'] == 'Toleransi') {
                $QS14 = "I";
            }
            if ($result['QS14'] == 'Netral' && $result['disQS14'] == 'Tidak Suka'){
                $QS14 = "M";
            }
            // III
            if ($result['QS14'] == 'Toleransi' && $result['disQS14'] == 'Suka') {
                $QS14 = "R";
            }
            if ($result['QS14'] == 'Toleransi' && $result['disQS14'] == 'Harap') {
                $QS14 = "I";
            }
            if ($result['QS14'] == 'Toleransi' && $result['disQS14'] == 'Netral') {
                $QS14 = "I";
            }
            if ($result['QS14'] == 'Toleransi' && $result['disQS14'] == 'Toleransi') {
                $QS14 = "I";
            }
            if ($result['QS14'] == 'Toleransi' && $result['disQS14'] == 'Tidak Suka'){
                $QS14 = "M";
            }
            // IV
            if ($result['QS14'] == 'Tidak Suka' && $result['disQS14'] == 'Suka') {
                $QS14 = "R";
            }
            if ($result['QS14'] == 'Tidak Suka' && $result['disQS14'] == 'Harap') {
                $QS14 = "R";
            }
            if ($result['QS14'] == 'Tidak Suka' && $result['disQS14'] == 'Netral') {
                $QS14 = "R";
            }
            if ($result['QS14'] == 'Tidak Suka' && $result['disQS14'] == 'Toleransi') {
                $QS14 = "R";
            }
            if ($result['QS14'] == 'Tidak Suka' && $result['disQS14'] == 'Tidak Suka'){
                $QS14 = "Q";
            }
            // End Customer requirement QS14

            // Customer requirement QS15
            // I
            if ($result['QS15'] == 'Suka' && $result['disQS15'] == 'Suka') {
                $QS15 = "Q";
            }
            if ($result['QS15'] == 'Suka' && $result['disQS15'] == 'Harap') {
                $QS15 = "A";
            }
            if ($result['QS15'] == 'Suka' && $result['disQS15'] == 'Netral') {
                $QS15 = "A";
            }
            if ($result['QS15'] == 'Suka' && $result['disQS15'] == 'Toleransi') {
                $QS15 = "A";
            }
            if ($result['QS15'] == 'Suka' && $result['disQS15'] == 'Tidak Suka'){
                $QS15 = "Q";
            }
            // II
            if ($result['QS15'] == 'Harap' && $result['disQS15'] == 'Suka') {
                $QS15 = "R";
            }
            if ($result['QS15'] == 'Harap' && $result['disQS15'] == 'Harap') {
                $QS15 = "I";
            }
            if ($result['QS15'] == 'Harap' && $result['disQS15'] == 'Netral') {
                $QS15 = "I";
            }
            if ($result['QS15'] == 'Harap' && $result['disQS15'] == 'Toleransi') {
                $QS15 = "I";
            }
            if ($result['QS15'] == 'Harap' && $result['disQS15'] == 'Tidak Suka'){
                $QS15 = "M";
            }
            // II
            if ($result['QS15'] == 'Netral' && $result['disQS15'] == 'Suka') {
                $QS15 = "R";
            }
            if ($result['QS15'] == 'Netral' && $result['disQS15'] == 'Harap') {
                $QS15 = "I";
            }
            if ($result['QS15'] == 'Netral' && $result['disQS15'] == 'Netral') {
                $QS15 = "I";
            }
            if ($result['QS15'] == 'Netral' && $result['disQS15'] == 'Toleransi') {
                $QS15 = "I";
            }
            if ($result['QS15'] == 'Netral' && $result['disQS15'] == 'Tidak Suka'){
                $QS15 = "M";
            }
            // III
            if ($result['QS15'] == 'Toleransi' && $result['disQS15'] == 'Suka') {
                $QS15 = "R";
            }
            if ($result['QS15'] == 'Toleransi' && $result['disQS15'] == 'Harap') {
                $QS15 = "I";
            }
            if ($result['QS15'] == 'Toleransi' && $result['disQS15'] == 'Netral') {
                $QS15 = "I";
            }
            if ($result['QS15'] == 'Toleransi' && $result['disQS15'] == 'Toleransi') {
                $QS15 = "I";
            }
            if ($result['QS15'] == 'Toleransi' && $result['disQS15'] == 'Tidak Suka'){
                $QS15 = "M";
            }
            // IV
            if ($result['QS15'] == 'Tidak Suka' && $result['disQS15'] == 'Suka') {
                $QS15 = "R";
            }
            if ($result['QS15'] == 'Tidak Suka' && $result['disQS15'] == 'Harap') {
                $QS15 = "R";
            }
            if ($result['QS15'] == 'Tidak Suka' && $result['disQS15'] == 'Netral') {
                $QS15 = "R";
            }
            if ($result['QS15'] == 'Tidak Suka' && $result['disQS15'] == 'Toleransi') {
                $QS15 = "R";
            }
            if ($result['QS15'] == 'Tidak Suka' && $result['disQS15'] == 'Tidak Suka'){
                $QS15 = "Q";
            }
            // End Customer requirement QS15
            // Customer requirement QS16
            // I
            if ($result['QS16'] == 'Suka' && $result['disQS16'] == 'Suka') {
                $QS16 = "Q";
            }
            if ($result['QS16'] == 'Suka' && $result['disQS16'] == 'Harap') {
                $QS16 = "A";
            }
            if ($result['QS16'] == 'Suka' && $result['disQS16'] == 'Netral') {
                $QS16 = "A";
            }
            if ($result['QS16'] == 'Suka' && $result['disQS16'] == 'Toleransi') {
                $QS16 = "A";
            }
            if ($result['QS16'] == 'Suka' && $result['disQS16'] == 'Tidak Suka'){
                $QS16 = "Q";
            }
            // II
            if ($result['QS16'] == 'Harap' && $result['disQS16'] == 'Suka') {
                $QS16 = "R";
            }
            if ($result['QS16'] == 'Harap' && $result['disQS16'] == 'Harap') {
                $QS16 = "I";
            }
            if ($result['QS16'] == 'Harap' && $result['disQS16'] == 'Netral') {
                $QS16 = "I";
            }
            if ($result['QS16'] == 'Harap' && $result['disQS16'] == 'Toleransi') {
                $QS16 = "I";
            }
            if ($result['QS16'] == 'Harap' && $result['disQS16'] == 'Tidak Suka'){
                $QS16 = "M";
            }
            // II
            if ($result['QS16'] == 'Netral' && $result['disQS16'] == 'Suka') {
                $QS16 = "R";
            }
            if ($result['QS16'] == 'Netral' && $result['disQS16'] == 'Harap') {
                $QS16 = "I";
            }
            if ($result['QS16'] == 'Netral' && $result['disQS16'] == 'Netral') {
                $QS16 = "I";
            }
            if ($result['QS16'] == 'Netral' && $result['disQS16'] == 'Toleransi') {
                $QS16 = "I";
            }
            if ($result['QS16'] == 'Netral' && $result['disQS16'] == 'Tidak Suka'){
                $QS16 = "M";
            }
            // III
            if ($result['QS16'] == 'Toleransi' && $result['disQS16'] == 'Suka') {
                $QS16 = "R";
            }
            if ($result['QS16'] == 'Toleransi' && $result['disQS16'] == 'Harap') {
                $QS16 = "I";
            }
            if ($result['QS16'] == 'Toleransi' && $result['disQS16'] == 'Netral') {
                $QS16 = "I";
            }
            if ($result['QS16'] == 'Toleransi' && $result['disQS16'] == 'Toleransi') {
                $QS16 = "I";
            }
            if ($result['QS16'] == 'Toleransi' && $result['disQS16'] == 'Tidak Suka'){
                $QS16 = "M";
            }
            // IV
            if ($result['QS16'] == 'Tidak Suka' && $result['disQS16'] == 'Suka') {
                $QS16 = "R";
            }
            if ($result['QS16'] == 'Tidak Suka' && $result['disQS16'] == 'Harap') {
                $QS16 = "R";
            }
            if ($result['QS16'] == 'Tidak Suka' && $result['disQS16'] == 'Netral') {
                $QS16 = "R";
            }
            if ($result['QS16'] == 'Tidak Suka' && $result['disQS16'] == 'Toleransi') {
                $QS16 = "R";
            }
            if ($result['QS16'] == 'Tidak Suka' && $result['disQS16'] == 'Tidak Suka'){
                $QS16 = "Q";
            }
            // End customer requirement QS16
            // Customer requirement QS17
            // I
            if ($result['QS17'] == 'Suka' && $result['disQS17'] == 'Suka') {
                $QS17 = "Q";
            }
            if ($result['QS17'] == 'Suka' && $result['disQS17'] == 'Harap') {
                $QS17 = "A";
            }
            if ($result['QS17'] == 'Suka' && $result['disQS17'] == 'Netral') {
                $QS17 = "A";
            }
            if ($result['QS17'] == 'Suka' && $result['disQS17'] == 'Toleransi') {
                $QS17 = "A";
            }
            if ($result['QS17'] == 'Suka' && $result['disQS17'] == 'Tidak Suka'){
                $QS17 = "Q";
            }
            // II
            if ($result['QS17'] == 'Harap' && $result['disQS17'] == 'Suka') {
                $QS17 = "R";
            }
            if ($result['QS17'] == 'Harap' && $result['disQS17'] == 'Harap') {
                $QS17 = "I";
            }
            if ($result['QS17'] == 'Harap' && $result['disQS17'] == 'Netral') {
                $QS17 = "I";
            }
            if ($result['QS17'] == 'Harap' && $result['disQS17'] == 'Toleransi') {
                $QS17 = "I";
            }
            if ($result['QS17'] == 'Harap' && $result['disQS17'] == 'Tidak Suka'){
                $QS17 = "M";
            }
            // II
            if ($result['QS17'] == 'Netral' && $result['disQS17'] == 'Suka') {
                $QS17 = "R";
            }
            if ($result['QS17'] == 'Netral' && $result['disQS17'] == 'Harap') {
                $QS17 = "I";
            }
            if ($result['QS17'] == 'Netral' && $result['disQS17'] == 'Netral') {
                $QS17 = "I";
            }
            if ($result['QS17'] == 'Netral' && $result['disQS17'] == 'Toleransi') {
                $QS17 = "I";
            }
            if ($result['QS17'] == 'Netral' && $result['disQS17'] == 'Tidak Suka'){
                $QS17 = "M";
            }
            // III
            if ($result['QS17'] == 'Toleransi' && $result['disQS17'] == 'Suka') {
                $QS17 = "R";
            }
            if ($result['QS17'] == 'Toleransi' && $result['disQS17'] == 'Harap') {
                $QS17 = "I";
            }
            if ($result['QS17'] == 'Toleransi' && $result['disQS17'] == 'Netral') {
                $QS17 = "I";
            }
            if ($result['QS17'] == 'Toleransi' && $result['disQS17'] == 'Toleransi') {
                $QS17 = "I";
            }
            if ($result['QS17'] == 'Toleransi' && $result['disQS17'] == 'Tidak Suka'){
                $QS17 = "M";
            }
            // IV
            if ($result['QS17'] == 'Tidak Suka' && $result['disQS17'] == 'Suka') {
                $QS17 = "R";
            }
            if ($result['QS17'] == 'Tidak Suka' && $result['disQS17'] == 'Harap') {
                $QS17 = "R";
            }
            if ($result['QS17'] == 'Tidak Suka' && $result['disQS17'] == 'Netral') {
                $QS17 = "R";
            }
            if ($result['QS17'] == 'Tidak Suka' && $result['disQS17'] == 'Toleransi') {
                $QS17 = "R";
            }
            if ($result['QS17'] == 'Tidak Suka' && $result['disQS17'] == 'Tidak Suka'){
                $QS17 = "Q";
            }
            // End customer requirement QS17

            // Customer requirement QS18

            // I
            if ($result['QS18'] == 'Suka' && $result['disQS18'] == 'Suka') {
                $QS18 = "Q";
            }
            if ($result['QS18'] == 'Suka' && $result['disQS18'] == 'Harap') {
                $QS18 = "A";
            }
            if ($result['QS08'] == 'Suka' && $result['disQS08'] == 'Netral') {
                $QS18 = "A";
            }
            if ($result['QS18'] == 'Suka' && $result['disQS18'] == 'Toleransi') {
                $QS18 = "A";
            }
            if ($result['QS18'] == 'Suka' && $result['disQS18'] == 'Tidak Suka'){
                $QS18 = "Q";
            }
            // II
            if ($result['QS18'] == 'Harap' && $result['disQS18'] == 'Suka') {
                $QS18 = "R";
            }
            if ($result['QS18'] == 'Harap' && $result['disQS18'] == 'Harap') {
                $QS18 = "I";
            }
            if ($result['QS18'] == 'Harap' && $result['disQS18'] == 'Netral') {
                $QS18 = "I";
            }
            if ($result['QS18'] == 'Harap' && $result['disQS18'] == 'Toleransi') {
                $QS18 = "I";
            }
            if ($result['QS18'] == 'Harap' && $result['disQS18'] == 'Tidak Suka'){
                $QS18 = "M";
            }
            // III
            if ($result['QS18'] == 'Netral' && $result['disQS18'] == 'Suka') {
                $QS18 = "R";
            }
            if ($result['QS18'] == 'Netral' && $result['disQS18'] == 'Harap') {
                $QS18 = "I";
            }
            if ($result['QS18'] == 'Netral' && $result['disQS18'] == 'Netral') {
                $QS18 = "I";
            }
            if ($result['QS18'] == 'Netral' && $result['disQS18'] == 'Toleransi') {
                $QS18 = "I";
            }
            if ($result['QS18'] == 'Netral' && $result['disQS18'] == 'Tidak Suka'){
                $QS18 = "M";
            }
            // IV
            if ($result['QS18'] == 'Toleransi' && $result['disQS18'] == 'Suka') {
                $QS18 = "R";
            }
            if ($result['QS18'] == 'Toleransi' && $result['disQS18'] == 'Harap') {
                $QS18 = "I";
            }
            if ($result['QS18'] == 'Toleransi' && $result['disQS18'] == 'Netral') {
                $QS18 = "I";
            }
            if ($result['QS18'] == 'Toleransi' && $result['disQS18'] == 'Toleransi') {
                $QS18 = "I";
            }
            if ($result['QS18'] == 'Toleransi' && $result['disQS18'] == 'Tidak Suka'){
                $QS18 = "M";
            }
            // V
            if ($result['QS18'] == 'Tidak Suka' && $result['disQS18'] == 'Suka') {
                $QS18 = "R";
            }
            if ($result['QS18'] == 'Tidak Suka' && $result['disQS18'] == 'Harap') {
                $QS18 = "R";
            }
            if ($result['QS18'] == 'Tidak Suka' && $result['disQS18'] == 'Netral') {
                $QS18 = "R";
            }
            if ($result['QS18'] == 'Tidak Suka' && $result['disQS18'] == 'Toleransi') {
                $QS18 = "R";
            }
            if ($result['QS18'] == 'Tidak Suka' && $result['disQS18'] == 'Tidak Suka'){
                $QS18 = "Q";
            }
            // End customer requirement QS18

          $database[] = array(
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
         );
        }
        for ($i=0; $i < count($database); $i++) { 
            $QS1[$i] = $database[$i]['QS01'];
            $QS2[$i] = $database[$i]['QS02'];
            $QS3[$i] = $database[$i]['QS03'];
            $QS4[$i] = $database[$i]['QS04'];
            $QS5[$i] = $database[$i]['QS05'];
            $QS6[$i] = $database[$i]['QS06'];
            $QS7[$i] = $database[$i]['QS07'];
            $QS8[$i] = $database[$i]['QS08'];
            $QS9[$i] = $database[$i]['QS09'];
            $QS010[$i] = $database[$i]['QS10'];
            $QS011[$i] = $database[$i]['QS11'];
            $QS012[$i] = $database[$i]['QS12'];
            $QS013[$i] = $database[$i]['QS13'];
            $QS014[$i] = $database[$i]['QS14'];
            $QS015[$i] = $database[$i]['QS15'];
            $QS016[$i] = $database[$i]['QS16'];
            $QS017[$i] = $database[$i]['QS17'];
            $QS018[$i] = $database[$i]['QS18'];

            $query = "INSERT INTO tmp_cust(Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, Q11, Q12, Q13, Q14, Q15, Q16, Q17, Q18) VALUES(" . "'" . $QS1[$i] . "'" . ", " . "'" . $QS2[$i] . "'" . ", " . "'" . $QS3[$i] . "'" . ", " . "'" . $QS4[$i] . "'" . ", " . "'" . $QS5[$i] . "'" . ", " . "'" . $QS6[$i] . "'" . ", " . "'" . $QS7[$i] . "'" . ", " . "'" . $QS8[$i] . "'" . ", " . "'" . $QS9[$i] . "'" . ", " . "'" . $QS010[$i] . "'" . ", " . "'" . $QS011[$i] . "'" . ", " . "'" . $QS012[$i] . "'" . ", " . "'" . $QS013[$i] . "'" . ", " . "'" . $QS014[$i] . "'" . ", " . "'" . $QS015[$i] . "'" . ", " . "'" . $QS016[$i] . "'" . ", " . "'" . $QS017[$i] . "'" . ", " . "'" . $QS018[$i] . "'" . ")";
            mysqli_query($conn, $query);
        }
        $Q1_cust = showCustQS1();
        $Q2_cust = showCustQS2();
        $Q3_cust = showCustQS3();
        $Q4_cust = showCustQS4();
        $Q5_cust = showCustQS5();
        $Q6_cust = showCustQS6();
        $Q7_cust = showCustQS7();
        $Q8_cust = showCustQS8();
        $Q9_cust = showCustQS9();
        $Q10_cust = showCustQS10();
        $Q11_cust = showCustQS11();
        $Q12_cust = showCustQS12();
        $Q13_cust = showCustQS13();
        $Q14_cust = showCustQS14();
        $Q15_cust = showCustQS15();
        $Q16_cust = showCustQS16();
        $Q17_cust = showCustQS17();
        $Q18_cust = showCustQS18();

        $data = array($Q1_cust, $Q2_cust, $Q3_cust, $Q4_cust, $Q5_cust, $Q6_cust, $Q7_cust, $Q8_cust, $Q9_cust, $Q10_cust, $Q11_cust, $Q12_cust, $Q13_cust, $Q14_cust, $Q15_cust, $Q16_cust, $Q17_cust, $Q18_cust);
        // var_dump($QS1Q);

    }
    return $data;
}
// start menampilkan data tmp_customer recuirement
function showCustQS1(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q1='Q') AS Q1Q,
    SUM(Q1='M') AS Q1M,
    SUM(Q1='0') AS Q1O,
    SUM(Q1='I') AS Q1I,
    SUM(Q1='A') AS Q1A,
    SUM(Q1='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS2(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q2='Q') AS Q1Q,
    SUM(Q2='M') AS Q1M,
    SUM(Q2='0') AS Q1O,
    SUM(Q2='I') AS Q1I,
    SUM(Q2='A') AS Q1A,
    SUM(Q2='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS3(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q3='Q') AS Q1Q,
    SUM(Q3='M') AS Q1M,
    SUM(Q3='0') AS Q1O,
    SUM(Q3='I') AS Q1I,
    SUM(Q3='A') AS Q1A,
    SUM(Q3='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS4(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q4='Q') AS Q1Q,
    SUM(Q4='M') AS Q1M,
    SUM(Q4='0') AS Q1O,
    SUM(Q4='I') AS Q1I,
    SUM(Q4='A') AS Q1A,
    SUM(Q4='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS5(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q5='Q') AS Q1Q,
    SUM(Q5='M') AS Q1M,
    SUM(Q5='0') AS Q1O,
    SUM(Q5='I') AS Q1I,
    SUM(Q5='A') AS Q1A,
    SUM(Q5='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS6(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q6='Q') AS Q1Q,
    SUM(Q6='M') AS Q1M,
    SUM(Q6='0') AS Q1O,
    SUM(Q6='I') AS Q1I,
    SUM(Q6='A') AS Q1A,
    SUM(Q6='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS7(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q7='Q') AS Q1Q,
    SUM(Q7='M') AS Q1M,
    SUM(Q7='0') AS Q1O,
    SUM(Q7='I') AS Q1I,
    SUM(Q7='A') AS Q1A,
    SUM(Q7='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS8(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q8='Q') AS Q1Q,
    SUM(Q8='M') AS Q1M,
    SUM(Q8='0') AS Q1O,
    SUM(Q8='I') AS Q1I,
    SUM(Q8='A') AS Q1A,
    SUM(Q8='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS9(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q9='Q') AS Q1Q,
    SUM(Q9='M') AS Q1M,
    SUM(Q9='0') AS Q1O,
    SUM(Q9='I') AS Q1I,
    SUM(Q9='A') AS Q1A,
    SUM(Q9='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS10(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q10='Q') AS Q1Q,
    SUM(Q10='M') AS Q1M,
    SUM(Q10='0') AS Q1O,
    SUM(Q10='I') AS Q1I,
    SUM(Q10='A') AS Q1A,
    SUM(Q10='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS11(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q11='Q') AS Q1Q,
    SUM(Q11='M') AS Q1M,
    SUM(Q11='0') AS Q1O,
    SUM(Q11='I') AS Q1I,
    SUM(Q11='A') AS Q1A,
    SUM(Q11='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS12(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q12='Q') AS Q1Q,
    SUM(Q12='M') AS Q1M,
    SUM(Q12='0') AS Q1O,
    SUM(Q12='I') AS Q1I,
    SUM(Q12='A') AS Q1A,
    SUM(Q12='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS13(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q13='Q') AS Q1Q,
    SUM(Q13='M') AS Q1M,
    SUM(Q13='0') AS Q1O,
    SUM(Q13='I') AS Q1I,
    SUM(Q13='A') AS Q1A,
    SUM(Q13='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS14(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q14='Q') AS Q1Q,
    SUM(Q14='M') AS Q1M,
    SUM(Q14='0') AS Q1O,
    SUM(Q14='I') AS Q1I,
    SUM(Q14='A') AS Q1A,
    SUM(Q14='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS15(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q15='Q') AS Q1Q,
    SUM(Q15='M') AS Q1M,
    SUM(Q15='0') AS Q1O,
    SUM(Q15='I') AS Q1I,
    SUM(Q15='A') AS Q1A,
    SUM(Q15='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS16(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q16='Q') AS Q1Q,
    SUM(Q16='M') AS Q1M,
    SUM(Q16='0') AS Q1O,
    SUM(Q16='I') AS Q1I,
    SUM(Q16='A') AS Q1A,
    SUM(Q16='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS17(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q17='Q') AS Q1Q,
    SUM(Q17='M') AS Q1M,
    SUM(Q17='0') AS Q1O,
    SUM(Q17='I') AS Q1I,
    SUM(Q17='A') AS Q1A,
    SUM(Q17='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
function showCustQS18(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT SUM(Q18='Q') AS Q1Q,
    SUM(Q18='M') AS Q1M,
    SUM(Q18='0') AS Q1O,
    SUM(Q18='I') AS Q1I,
    SUM(Q18='A') AS Q1A,
    SUM(Q18='R') AS Q1R,
    COUNT(*) AS total
FROM tmp_cust");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data = array(
                'Q'=>$result['Q1Q'],
                'M'=>$result['Q1M'],
                'O'=>$result['Q1O'],
                'I'=>$result['Q1I'],
                'A' => $result['Q1A'],
                'R'=>$result['Q1R'],
                'total'=>$result['total']
            );
        }
        return $data;
    }
}
// End fungsi menampilkan tmp customer requirement
// start fungsi menentukan grade
function grade($A, $M, $O, $R, $Q, $I)
{
    $array = array('A'=>intval($A), 'M'=>intval($M), 'O'=>intval($O), 'R'=>intval($R), 'Q'=>intval($Q), 'I'=>intval($I));   
    $maxValue = max($array);
    $maxIndex = array_search(max($array), $array); 
    return $maxIndex;
}
// end fungsing menentukan grade


// start fungsi menghitung better
function better($A, $O, $M, $I)
{
    $A = intval($A);
    $O = intval($O);
    $M = intval($M);
    $I = intval($I);
    // $atas = $A + $O;
    // $bawah = ($A + $O) + ($M + $I);
    // $better = $atas / $bawah;
    $better = ($A + $O) / (($A + $O) + ($M + $I));
    // var_dump($atas);
    return $better;
}
// end fungsi menghitung better


// start fungsi menghitung worse
function worse($A, $O, $M, $I)
{
    $A = intval($A);
    $O = intval($O);
    $M = intval($M);
    $I = intval($I);
    // $atas = $A + $O;
    // $bawah = ($A + $O) + ($M + $I);
    // $better = $atas / $bawah;
    $better = ($O + $M) / ((($A + $O) + ($M + $I))*-1);
    // var_dump($atas);
    return $better;
}
// end fungsi menghitung worse


// start fungsi menghitung averange
function averange($Array)
{
    $sum = array_sum($Array);
    $count = count($Array);
    $averange = $sum / $count;
    return $averange;
}
// end fungsi menghitung averange

// start inputTMPsactisfaction
function inputTMPsactisfaction($kode_array, $better, $worse)
{
    $conn = koneksi();
    for ($i=0; $i < count($kode_array); $i++) { 
        if ($kode_array[$i] == "QS01" OR $kode_array[$i] == "QS02" OR $kode_array[$i] == "QS03" OR $kode_array[$i] == "QS04" OR $kode_array[$i] == "QS05") {
            $label = "Jasa";
        }
        if ($kode_array[$i] == "QS06" OR $kode_array[$i] == "QS09" OR $kode_array[$i] == "QS10" OR $kode_array[$i] == "QS11") {
            $label = "Kenyamanan";
        }
        if ($kode_array[$i] == "QS07" OR $kode_array[$i] == "QS08") {
            $label = "Keamanan";
        }
        if ($kode_array[$i] == "QS12" OR $kode_array[$i] == "QS13" OR $kode_array[$i] == "QS14" OR $kode_array[$i] == "QS15") {
            $label = "Pelayanan";
        }
        if ($kode_array[$i] == "QS16" OR $kode_array[$i] == "QS17" OR $kode_array[$i] == "QS18") {
            $label = "Citra";
        }
        $input[$i] = array('kode'=>$kode_array[$i], 'better'=>$better[$i], 'worse'=>$worse[$i], 'label'=>$label);
    }
    $count_input = count($input);
    for ($u=0; $u < $count_input; $u++) {
        $query = "INSERT INTO tmp_sactifaction(kode, satisfaction, disactifaction, labels) VALUES(" . "'" . $input[$u]['kode'] . "'" . ", " . "'" . $input[$u]['better'] . "'" . ", " . "'" . $input[$u]['worse'] . "'" . ", " . "'" . $input[$u]['label'] . "'" . ")";
        mysqli_query($conn, $query); 
    }
}
// end inputTMPsactisfaction

// start fungsi generate chart
function generateChart()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT 
    SUM(IF(labels='Jasa', satisfaction, 0)) AS jasa_sum,
    SUM(IF(labels='Kenyamanan', satisfaction, 0)) AS kenyamanan_sum,
    SUM(IF(labels='Keamanan', satisfaction, 0)) AS keamanan_sum,
    SUM(IF(labels='Pelayanan', satisfaction, 0)) AS pelayanan_sum,
    SUM(IF(labels='Citra', satisfaction, 0)) AS citra_sum
     FROM tmp_sactifaction");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $jasa = floatval($result['jasa_sum']) / 5;
            $kenyamanan = floatval($result['kenyamanan_sum']) / 4;
            $keamanan = floatval($result['keamanan_sum']) / 2;
            $pelayanan = floatval($result['pelayanan_sum']) / 4;
            $citra = floatval($result['citra_sum']) / 3;
            $database = array(floatval($jasa), floatval($kenyamanan), floatval($keamanan), floatval($pelayanan), floatval($citra));
        }
    }else{
        $database = 0;
    }
    return $database;
}
function generateChartLine()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT 
    SUM(IF(labels='Jasa', disactifaction, 0)) AS jasa_sum,
    SUM(IF(labels='Kenyamanan', disactifaction, 0)) AS kenyamanan_sum,
    SUM(IF(labels='Keamanan', disactifaction, 0)) AS keamanan_sum,
    SUM(IF(labels='Pelayanan', disactifaction, 0)) AS pelayanan_sum,
    SUM(IF(labels='Citra', disactifaction, 0)) AS citra_sum
     FROM tmp_sactifaction");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $jasa = floatval($result['jasa_sum']) / 5;
            $kenyamanan = floatval($result['kenyamanan_sum']) / 4;
            $keamanan = floatval($result['keamanan_sum']) / 2;
            $pelayanan = floatval($result['pelayanan_sum']) / 4;
            $citra = floatval($result['citra_sum']) / 3;
            $database = array(floatval($jasa), floatval($kenyamanan), floatval($keamanan), floatval($pelayanan), floatval($citra));
        }
        return $database;
    }
}
// end fungsi generate chart
// End cust requirement kano model

// Start fungsi Kmeans
// Fungsi olah data quesioner

function olahData(){
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
                if ($result['QS01'] == 'Suka') {
                    $QS01 = 5;
                }
                if ($result['QS01'] == 'Harap') {
                    $QS01 = 4;
                }
                if ($result['QS01'] == 'Netral') {
                    $QS01 = 3;
                }
                if ($result['QS01'] == 'Toleransi') {
                    $QS01 = 2;
                }
                if ($result['QS01'] == 'Tidak Suka'){
                    $QS01 = 1;
                }

                if ($result['QS02'] == 'Suka') {
                    $QS02 = 5;
                }
                if ($result['QS02'] == 'Harap') {
                    $QS02 = 4;
                }
                if ($result['QS02'] == 'Netral') {
                    $QS02 = 3;
                }
                if ($result['QS02'] == 'Toleransi') {
                    $QS02 = 2;
                }
                if($result['QS02'] == 'Tidak Suka') {
                    $QS02 = 1;
                }

                if ($result['QS03'] == 'Suka') {
                    $QS03 = 5;
                }
                if ($result['QS03'] == 'Harap') {
                    $QS03 = 4;
                }
                if ($result['QS03'] == 'Netral') {
                    $QS03 = 3;
                }
                if ($result['QS03'] == 'Toleransi') {
                    $QS03 = 2;
                }
                if($result['QS03'] == 'Tidak Suka') {
                    $QS03 = 1;
                }

                if ($result['QS04'] == 'Suka') {
                    $QS04 = 5;
                }
                if ($result['QS04'] == 'Harap') {
                    $QS04 = 4;
                }
                if ($result['QS04'] == 'Netral') {
                    $QS04 = 3;
                }
                if ($result['QS04'] == 'Toleransi') {
                    $QS04 = 2;
                }
                if($result['QS04'] == 'Tidak Suka') {
                    $QS04 = 1;
                }

                if ($result['QS05'] == 'Suka') {
                    $QS05 = 5;
                }
                if ($result['QS05'] == 'Harap') {
                    $QS05 = 4;
                }
                if ($result['QS05'] == 'Netral') {
                    $QS05 = 3;
                }
                if ($result['QS05'] == 'Toleransi') {
                    $QS05 = 2;
                }
                if($result['QS05'] == 'Tidak Suka') {
                    $QS05 = 1;
                }

                if ($result['QS06'] == 'Suka') {
                    $QS06 = 5;
                }
                if ($result['QS06'] == 'Harap') {
                    $QS06 = 4;
                }
                if ($result['QS06'] == 'Netral') {
                    $QS06 = 3;
                }
                if ($result['QS06'] == 'Toleransi') {
                    $QS06 = 2;
                }
                if($result['QS06'] == 'Tidak Suka') {
                    $QS06 = 1;
                }

                if ($result['QS07'] == 'Suka') {
                    $QS07 = 5;
                }
                if ($result['QS07'] == 'Harap') {
                    $QS07 = 4;
                }
                if ($result['QS07'] == 'Netral') {
                    $QS07 = 3;
                }
                if ($result['QS07'] == 'Toleransi') {
                    $QS07 = 2;
                }
                if($result['QS07'] == 'Tidak Suka') {
                    $QS07 = 1;
                }

                if ($result['QS08'] == 'Suka') {
                    $QS08 = 5;
                }
                if ($result['QS08'] == 'Harap') {
                    $QS08 = 4;
                }
                if ($result['QS08'] == 'Netral') {
                    $QS08 = 3;
                }
                if ($result['QS08'] == 'Toleransi') {
                    $QS08 = 2;
                }
                if($result['QS08'] == 'Tidak Suka') {
                    $QS08 = 1;
                }

                if ($result['QS09'] == 'Suka') {
                    $QS09 = 5;
                }
                if ($result['QS09'] == 'Harap') {
                    $QS09 = 4;
                }
                if ($result['QS09'] == 'Netral') {
                    $QS09 = 3;
                }
                if ($result['QS09'] == 'Toleransi') {
                    $QS09 = 2;
                }
                if($result['QS09'] == 'Tidak Suka') {
                    $QS09 = 1;
                }

                if ($result['QS10'] == 'Suka') {
                    $QS10 = 5;
                }
                if ($result['QS10'] == 'Harap') {
                    $QS10 = 4;
                }
                if ($result['QS10'] == 'Netral') {
                    $QS10 = 3;
                }
                if ($result['QS10'] == 'Toleransi') {
                    $QS10 = 2;
                }
                if($result['QS10'] == 'Tidak Suka') {
                    $QS10 = 1;
                }

                if ($result['QS11'] == 'Suka') {
                    $QS11 = 5;
                }
                if ($result['QS11'] == 'Harap') {
                    $QS11 = 4;
                }
                if ($result['QS11'] == 'Netral') {
                    $QS11 = 3;
                }
                if ($result['QS11'] == 'Toleransi') {
                    $QS11 = 2;
                }
                if ($result['QS11'] == 'Tidak Suka'){
                    $QS11 = 1;
                }

                if ($result['QS12'] == 'Suka') {
                    $QS12 = 5;
                }
                if ($result['QS12'] == 'Harap') {
                    $QS12 = 4;
                }
                if ($result['QS12'] == 'Netral') {
                    $QS12 = 3;
                }
                if ($result['QS12'] == 'Toleransi') {
                    $QS12 = 2;
                }
                if($result['QS12'] == 'Tidak Suka') {
                    $QS12 = 1;
                }

                if ($result['QS13'] == 'Suka') {
                    $QS13 = 5;
                }
                if ($result['QS13'] == 'Harap') {
                    $QS13 = 4;
                }
                if ($result['QS13'] == 'Netral') {
                    $QS13 = 3;
                }
                if ($result['QS13'] == 'Toleransi') {
                    $QS13 = 2;
                }
                if($result['QS13'] == 'Tidak Suka') {
                    $QS13 = 1;
                }

                if ($result['QS14'] == 'Suka') {
                    $QS14 = 5;
                }
                if ($result['QS14'] == 'Harap') {
                    $QS14 = 4;
                }
                if ($result['QS14'] == 'Netral') {
                    $QS14 = 3;
                }
                if ($result['QS14'] == 'Toleransi') {
                    $QS14 = 2;
                }
                if($result['QS14'] == 'Tidak Suka') {
                    $QS14 = 1;
                }

                if ($result['QS15'] == 'Suka') {
                    $QS15 = 5;
                }
                if ($result['QS15'] == 'Harap') {
                    $QS15 = 4;
                }
                if ($result['QS15'] == 'Netral') {
                    $QS15 = 3;
                }
                if ($result['QS15'] == 'Toleransi') {
                    $QS15 = 2;
                }
                if($result['QS15'] == 'Tidak Suka') {
                    $QS15 = 1;
                }

                if ($result['QS16'] == 'Suka') {
                    $QS16 = 5;
                }
                if ($result['QS16'] == 'Harap') {
                    $QS16 = 4;
                }
                if ($result['QS16'] == 'Netral') {
                    $QS16 = 3;
                }
                if ($result['QS16'] == 'Toleransi') {
                    $QS16 = 2;
                }
                if($result['QS16'] == 'Tidak Suka') {
                    $QS16 = 1;
                }

                if ($result['QS17'] == 'Suka') {
                    $QS17 = 5;
                }
                if ($result['QS17'] == 'Harap') {
                    $QS17 = 4;
                }
                if ($result['QS17'] == 'Netral') {
                    $QS17 = 3;
                }
                if ($result['QS17'] == 'Toleransi') {
                    $QS17 = 2;
                }
                if($result['QS17'] == 'Tidak Suka') {
                    $QS17 = 1;
                }

                if ($result['QS18'] == 'Suka') {
                    $QS18 = 5;
                }
                if ($result['QS18'] == 'Harap') {
                    $QS18 = 4;
                }
                if ($result['QS18'] == 'Netral') {
                    $QS18 = 3;
                }
                if ($result['QS18'] == 'Toleransi') {
                    $QS18 = 2;
                }
                if($result['QS18'] == 'Tidak Suka') {
                    $QS18 = 1;
                }
          $database[] = array(
            'Nama'=> $result['name'],
            'QS01' => $QS01,
            'QS02' => $QS02,
            'QS03' => $QS03,
            'QS04' => $QS04,
            'QS05' => $QS05,
            'QS06' => $QS06,
            'QS07' => $QS07,
            'QS08' => $QS08,
            'QS09' => $QS09,
            'QS10' => $QS10,
            'QS11' => $QS11,
            'QS12' => $QS12,
            'QS13' => $QS13,
            'QS14' => $QS14,
            'QS15' => $QS15,
            'QS16' => $QS16,
            'QS17' => $QS17,
            'QS18' => $QS18,
         );
        }
        for ($i=0; $i < count($database); $i++) { 
            $jasa[$i] = array($database[$i]['QS01'], $database[$i]['QS02'], $database[$i]['QS03'], $database[$i]['QS04'], $database[$i]['QS05']);
            $jasa_sum[$i] = array_sum($jasa[$i]);
            $kenyamanan[$i] = array($database[$i]['QS06'], $database[$i]['QS09'], $database[$i]['QS10'], $database[$i]['QS11']);
            $kenyamanan_sum[$i] = array_sum($kenyamanan[$i]);
            $keamanan[$i] = array($database[$i]['QS07'], $database[$i]['QS08']);
            $keamanan_sum[$i] = array_sum($keamanan[$i]);
            $pelayanan[$i] = array($database[$i]['QS12'], $database[$i]['QS13'], $database[$i]['QS14'], $database[$i]['QS15']);
            $pelayanan_sum[$i] = array_sum($pelayanan[$i]);
            $Citra[$i] = array($database[$i]['QS16'], $database[$i]['QS17'], $database[$i]['QS18']);
            $citra_sum[$i] = array_sum($Citra[$i]);

            $data[$i] = array('nama'=>$database[$i]['Nama'], 'jasa'=>$jasa_sum[$i], 'kenyamanan'=>$kenyamanan_sum[$i], 'keamanan'=>$keamanan_sum[$i], 'pelayanan'=>$pelayanan_sum[$i], 'citra'=>$citra_sum[$i]);
        }
    }
    // var_dump($data);
    return $data;

}
// end fungsi olah data quesioner


// Start fungsi tampil centroid
function tampilcentroid()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM centroid");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
            $data[] = array(
                'centroid' => $result['centroid'],
                'jasa'=> $result['jasa'],
                'kenyamanan'=> $result['kenyamanan'],
                'keamanan'=> $result['keamanan'],
                'pelayanan'=>$result['pelayanan'],
                'citra'=> $result['citra'],
                'label'=> $result['labels'],
            );
        }
        return $data;
    }    
}
// End fungsi tampil centroid

// start fungsi hitung iterasi
function iterasi()
{
    $ds = olahdata();
    $conn = koneksi();
    $centroid = tampilcentroid();
    for ($i=0; $i < count($ds); $i++) { 
        # hitung C1
        $C1[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid[0]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid[0]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid[0]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid[0]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid[0]['citra']), 2));
        
        // hitung c2
        $C2[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid[1]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid[1]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid[1]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid[1]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid[1]['citra']), 2)); 

        // hitung c3
        $C3[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid[2]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid[2]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid[2]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid[2]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid[2]['citra']), 2)); 

        // hitung c4
        $C4[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid[3]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid[3]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid[3]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid[3]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid[3]['citra']), 2)); 

        // hitung c5
        $C5[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid[4]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid[4]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid[4]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid[4]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid[4]['citra']), 2)); 

        // Array iterasi1
        $centroid1[$i] = array('c1'=>$C1[$i], 'c2'=>$C2[$i], 'c3'=>$C3[$i], 'c4'=>$C4[$i], 'c5'=>$C5[$i]);

        $literasi1[$i] = array('nama'=>$ds[$i]['nama'], 'jasa'=>$ds[$i]['jasa'], 'kenyamanan'=>$ds[$i]['kenyamanan'], 'keamanan'=>$ds[$i]['keamanan'], 'pelayanan'=>$ds[$i]['pelayanan'], 'citra'=>$ds[$i]['citra'], 'c1'=>$C1[$i], 'c2'=>$C2[$i], 'c3'=>$C3[$i], 'c4'=>$C4[$i], 'c5'=>$C5[$i], 'kedekatan'=>min($centroid1[$i]), 'cluster'=>miniterasi($centroid1[$i]['c1'], $centroid1[$i]['c2'], $centroid1[$i]['c3'], $centroid1[$i]['c4'], $centroid1[$i]['c5']));

        $query = "INSERT INTO tmp_literasi1(nama, jasa, kenyamanan, keamanan, pelayanan, citra, c1, c2, c3, c4, c5, cluster) VALUES(" . "'" . $literasi1[$i]['nama'] . "'" . ", " . "'" . $literasi1[$i]['jasa'] . "'" . ", " . "'" . $literasi1[$i]['kenyamanan'] . "'" . ", " . "'" . $literasi1[$i]['keamanan'] . "'" . ", " . "'" . $literasi1[$i]['pelayanan'] . "'" . ", " . "'" . $literasi1[$i]['citra'] . "'" . " , " . "'" . $literasi1[$i]['c1'] . "'" . ", " . "'" . $literasi1[$i]['c2'] . "'" . " , " . "'" . $literasi1[$i]['c3'] . "'" . ", " . "'" . $literasi1[$i]['c4'] . "'" . ", " . "'" . $literasi1[$i]['c5'] . "'" . " , " . "'" . $literasi1[$i]['cluster'] . "'" . ")";
        $insert = mysqli_query($conn, $query);
    }
    // var_dump($iterasi1);
    return $literasi1;
}
// end fungsi hitung iterasi


// start fungsi minimal
function miniterasi($A, $M, $O, $R, $Q)
{
    $array = array('C1'=>floatval($A), 'C2'=>floatval($M), 'C3'=>floatval($O), 'C4'=>floatval($R), 'C5'=>floatval($Q));   
    $maxValue = min($array);
    $maxIndex = array_search(min($array), $array); 
    return $maxIndex;
}
// end fungsi minimals

// start fungsi literasi ke-2
function iterasike2()
{
    $conn = koneksi();
    // update centroid
    // nilai c1
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi1 WHERE cluster='c1' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent1[] = $resultcent;
        }
    }else{
        // $cent1 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent1 = 0;
    }

    // nilai c2
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi1 WHERE cluster='c2' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent2[] = $resultcent;
        }
    }else{
        // $cent2 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent2 = 0;
    }

    // nilai c3
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi1 WHERE cluster='c3' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent3[] = $resultcent;
        }
    }else{
        // $cent3 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent3 = 0;
    }

    // nilai c4
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi1 WHERE cluster='c4' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent4[] = $resultcent;
        }
    }else{
        // $cent4 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent4 = 0;
    }

    // nilai c5
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi1 WHERE cluster='c5' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent5[] = $resultcent;
        }
    }else{
        // $cent5 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent5 = 0;
    }
    // update nilai centroid
    // C1
    if ($cent1 != 0) {
        $cent1_count = count($cent1);
        for ($i=0; $i < $cent1_count; $i++) { 
            $jasac1[$i] = $cent1[$i]['jasa'];
            $jasac1_sum = array_sum($jasac1);

            $kenyamananc1[$i] = $cent1[$i]['kenyamanan'];
            $kenyamananc1_sum = array_sum($kenyamananc1);

            $keamananc1[$i] = $cent1[$i]['keamanan'];
            $keamananc1_sum = array_sum($keamananc1);

            $pelayananc1[$i] = $cent1[$i]['pelayanan'];
            $pelayananc1_sum = array_sum($pelayananc1);

            $citrac1[$i] = $cent1[$i]['citra'];
            $citrac1_sum = array_sum($citrac1);
        }
        $c1 = array('jasa'=>($jasac1_sum / $cent1_count), 'kenyamanan'=>($kenyamananc1_sum / $cent1_count), 'keamanan'=>($keamananc1_sum / $cent1_count), 'pelayanan'=>($pelayananc1_sum / $cent1_count), 'citra'=>($citrac1_sum / $cent1_count));
    }else{
        $c1 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C2
    if ($cent2 != 0) {
        $cent2_count = count($cent2);
        // var_dump($cent2);
        for ($o=0; $o < $cent2_count; $o++) {  
            $jasac2[$o] = $cent2[$o]['jasa'];
            $jasac2_sum = array_sum($jasac2);
    
            $kenyamananc2[$o] = $cent2[$o]['kenyamanan'];
            $kenyamananc2_sum = array_sum($kenyamananc2);
    
            $keamananc2[$o] = $cent2[$o]['keamanan'];
            $keamananc2_sum = array_sum($keamananc2);
    
            $pelayananc2[$o] = $cent2[$o]['pelayanan'];
            $pelayananc2_sum = array_sum($pelayananc2);

            $citrac2[$o] = $cent2[$o]['citra'];
            $citrac2_sum = array_sum($citrac2);
        }
            $c2 = array('jasa'=>($jasac2_sum / $cent2_count), 'kenyamanan'=>($kenyamananc2_sum / $cent2_count), 'keamanan'=>($keamananc2_sum / $cent2_count), 'pelayanan'=>($pelayananc2_sum / $cent2_count), 'citra'=>($citrac2_sum / $cent2_count));
        }else{
            $c2 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        }
    // C3
    if ($cent3 != 0) {
        $cent3_count = count($cent3);
        for ($p=0; $p < $cent3_count; $p++) { 
            $jasac3[$p] = $cent3[$p]['jasa'];
            $jasac3_sum = array_sum($jasac3);
        
            $kenyamananc3[$p] = $cent3[$p]['kenyamanan'];
            $kenyamananc3_sum = array_sum($kenyamananc3);
        
            $keamananc3[$p] = $cent3[$p]['keamanan'];
            $keamananc3_sum = array_sum($keamananc3);
        
            $pelayananc3[$p] = $cent3[$p]['pelayanan'];
            $pelayananc3_sum = array_sum($pelayananc3);

            $citrac3[$p] = $cent3[$p]['citra'];
            $citrac3_sum = array_sum($citrac3);
        }
            $c3 = array('jasa'=>($jasac3_sum / $cent3_count), 'kenyamanan'=>($kenyamananc3_sum / $cent3_count), 'keamanan'=>($keamananc3_sum / $cent3_count), 'pelayanan'=>($pelayananc3_sum / $cent3_count));
    }else{
        $c3 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C4
    if ($cent4 != 0) {
        $cent4_count = count($cent4);
        for ($l=0; $l < $cent4_count; $l++) { 
            $jasac4[$l] = $cent4[$l]['jasa'];
            $jasac4_sum = array_sum($jasac4);
        
            $kenyamananc4[$l] = $cent4[$l]['kenyamanan'];
            $kenyamananc4_sum = array_sum($kenyamananc4);
        
            $keamananc4[$l] = $cent4[$l]['keamanan'];
            $keamananc4_sum = array_sum($keamananc4);
        
            $pelayananc4[$p] = $cent4[$l]['pelayanan'];
            $pelayananc4_sum = array_sum($pelayananc4);

            $citrac4[$l] = $cent4[$l]['citra'];
            $citrac4_sum = array_sum($citrac4);
        }
            $c4 = array('jasa'=>($jasac4_sum / $cent4_count), 'kenyamanan'=>($kenyamananc4_sum / $cent4_count), 'keamanan'=>($keamananc4_sum / $cent4_count), 'pelayanan'=>($pelayananc4_sum / $cent4_count), 'citra'=>($citrac4_sum / $cent4_count));
    }else{
        $c4 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C5
    if ($cent5 != 0) {
        $cent5_count = count($cent5);
        for ($k=0; $k < $cent5_count; $k++) { 
            $jasac5[$p] = $cent5[$k]['jasa'];
            $jasac5_sum = array_sum($jasac5);
        
            $kenyamananc5[$k] = $cent5[$k]['kenyamanan'];
            $kenyamananc5_sum = array_sum($kenyamananc5);
        
            $keamananc5[$k] = $cent5[$k]['keamanan'];
            $keamananc5_sum = array_sum($keamananc5);
        
            $pelayananc5[$k] = $cent5[$k]['pelayanan'];
            $pelayananc5_sum = array_sum($pelayananc5);

            $citrac5[$k] = $cent5[$k]['citra'];
            $citrac5_sum = array_sum($citrac5);
        }
            $c5 = array('jasa'=>($jasac5_sum / $cent5_count), 'kenyamanan'=>($kenyamananc5_sum / $cent5_count), 'keamanan'=>($keamananc5_sum / $cent5_count), 'pelayanan'=>($pelayananc5_sum / $cent5_count), 'citra'=>($citrac5_sum / $cent5_count));
    }else{
        $c5 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }
    $centroid_baru = array(['centroid'=>'c1', 'jasa'=>$c1['jasa'], 'kenyamanan'=>$c1['kenyamanan'], 'keamanan'=>$c1['keamanan'], 'pelayanan'=>$c1['pelayanan'], 'citra'=>$c1['citra']], ['centroid'=>'c2', 'jasa'=>$c2['jasa'], 'kenyamanan'=>$c2['kenyamanan'], 'keamanan'=>$c2['keamanan'], 'pelayanan'=>$c2['pelayanan'], 'citra'=>$c2['citra']], ['centroid'=>'c3', 'jasa'=>$c3['jasa'], 'kenyamanan'=>$c3['kenyamanan'], 'keamanan'=>$c3['keamanan'], 'pelayanan'=>$c3['pelayanan'], 'citra'=>$c3['citra']], ['centroid'=>'c4', 'jasa'=>$c4['jasa'], 'kenyamanan'=>$c4['kenyamanan'], 'keamanan'=>$c4['keamanan'], 'pelayanan'=>$c4['pelayanan'], 'citra'=>$c4['citra']], ['centroid'=>'c5', 'jasa'=>$c5['jasa'], 'kenyamanan'=>$c5['kenyamanan'], 'keamanan'=>$c5['keamanan'], 'pelayanan'=>$c5['pelayanan'], 'citra'=>$c5['citra']]);

    $ds = olahdata();
    for ($i=0; $i < count($ds); $i++) { 
        # hitung C1
        $C1[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[0]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[0]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[0]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[0]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[0]['citra']), 2));
        
        // hitung c2
        $C2[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[1]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[1]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[1]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[1]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[1]['citra']), 2)); 

        // hitung c3
        $C3[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[2]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[2]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[2]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[2]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[2]['citra']), 2)); 

        // hitung c4
        $C4[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[3]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[3]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[3]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[3]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[3]['citra']), 2)); 

        // hitung c5
        $C5[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[4]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[4]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[4]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[4]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[4]['citra']), 2)); 

        // Array iterasi1
        $centroid1[$i] = array('c1'=>$C1[$i], 'c2'=>$C2[$i], 'c3'=>$C3[$i], 'c4'=>$C4[$i], 'c5'=>$C5[$i]);

        $literasi1[$i] = array('nama'=>$ds[$i]['nama'], 'jasa'=>$ds[$i]['jasa'], 'kenyamanan'=>$ds[$i]['kenyamanan'], 'keamanan'=>$ds[$i]['keamanan'], 'pelayanan'=>$ds[$i]['pelayanan'], 'citra'=>$ds[$i]['citra'], 'c1'=>$C1[$i], 'c2'=>$C2[$i], 'c3'=>$C3[$i], 'c4'=>$C4[$i], 'c5'=>$C5[$i], 'kedekatan'=>min($centroid1[$i]), 'cluster'=>miniterasi($centroid1[$i]['c1'], $centroid1[$i]['c2'], $centroid1[$i]['c3'], $centroid1[$i]['c4'], $centroid1[$i]['c5']));

        $query = "INSERT INTO tmp_literasi2(nama, jasa, kenyamanan, keamanan, pelayanan, citra, c1, c2, c3, c4, c5, cluster) VALUES(" . "'" . $literasi1[$i]['nama'] . "'" . ", " . "'" . $literasi1[$i]['jasa'] . "'" . ", " . "'" . $literasi1[$i]['kenyamanan'] . "'" . ", " . "'" . $literasi1[$i]['keamanan'] . "'" . ", " . "'" . $literasi1[$i]['pelayanan'] . "'" . ", " . "'" . $literasi1[$i]['citra'] . "'" . " , " . "'" . $literasi1[$i]['c1'] . "'" . ", " . "'" . $literasi1[$i]['c2'] . "'" . " , " . "'" . $literasi1[$i]['c3'] . "'" . ", " . "'" . $literasi1[$i]['c4'] . "'" . ", " . "'" . $literasi1[$i]['c5'] . "'" . " , " . "'" . $literasi1[$i]['cluster'] . "'" . ")";
        mysqli_query($conn, $query);
    }
    return $literasi1;
}
// end fungsi literasi ke-2

// fungsi literasi ke3

function iterasike3()
{
    $conn = koneksi();
    // update centroid
    // nilai c1
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi2 WHERE cluster='c1' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent1[] = $resultcent;
        }
    }else{
        // $cent1 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent1 = 0;
    }

    // nilai c2
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi2 WHERE cluster='c2' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent2[] = $resultcent;
        }
    }else{
        // $cent2 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent2 = 0;
    }

    // nilai c3
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi2 WHERE cluster='c3' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent3[] = $resultcent;
        }
    }else{
        // $cent3 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent3 = 0;
    }

    // nilai c4
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi2 WHERE cluster='c4' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent4[] = $resultcent;
        }
    }else{
        // $cent4 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent4 = 0;
    }

    // nilai c5
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi2 WHERE cluster='c5' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent5[] = $resultcent;
        }
    }else{
        // $cent5 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent5 = 0;
    }
    // update nilai centroid
    // C1
    if ($cent1 != 0) {
        $cent1_count = count($cent1);
        for ($i=0; $i < $cent1_count; $i++) { 
            $jasac1[$i] = $cent1[$i]['jasa'];
            $jasac1_sum = array_sum($jasac1);

            $kenyamananc1[$i] = $cent1[$i]['kenyamanan'];
            $kenyamananc1_sum = array_sum($kenyamananc1);

            $keamananc1[$i] = $cent1[$i]['keamanan'];
            $keamananc1_sum = array_sum($keamananc1);

            $pelayananc1[$i] = $cent1[$i]['pelayanan'];
            $pelayananc1_sum = array_sum($pelayananc1);

            $citrac1[$i] = $cent1[$i]['citra'];
            $citrac1_sum = array_sum($citrac1);
        }
        $c1 = array('jasa'=>($jasac1_sum / $cent1_count), 'kenyamanan'=>($kenyamananc1_sum / $cent1_count), 'keamanan'=>($keamananc1_sum / $cent1_count), 'pelayanan'=>($pelayananc1_sum / $cent1_count), 'citra'=>($citrac1_sum / $cent1_count));
    }else{
        $c1 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C2
    if ($cent2 != 0) {
        $cent2_count = count($cent2);
        for ($o=0; $o < $cent2_count; $o++) { 
            $jasac2[$o] = $cent2[$o]['jasa'];
            $jasac2_sum = array_sum($jasac2);
    
            $kenyamananc2[$o] = $cent2[$o]['kenyamanan'];
            $kenyamananc2_sum = array_sum($kenyamananc2);
    
            $keamananc2[$o] = $cent2[$o]['keamanan'];
            $keamananc2_sum = array_sum($keamananc2);
    
            $pelayananc2[$o] = $cent2[$o]['pelayanan'];
            $pelayananc2_sum = array_sum($pelayananc2);

            $citrac2[$o] = $cent2[$o]['citra'];
            $citrac2_sum = array_sum($citrac2);
        }
            $c2 = array('jasa'=>($jasac2_sum / $cent2_count), 'kenyamanan'=>($kenyamananc2_sum / $cent2_count), 'keamanan'=>($keamananc2_sum / $cent2_count), 'pelayanan'=>($pelayananc2_sum / $cent2_count), 'citra'=>($citrac2_sum / $cent2_count));
        }else{
            $c2 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        }
    // C3
    if ($cent3 != 0) {
        $cent3_count = count($cent3);
        for ($p=0; $p < $cent3_count; $p++) { 
            $jasac3[$p] = $cent3[$p]['jasa'];
            $jasac3_sum = array_sum($jasac3);
        
            $kenyamananc3[$p] = $cent3[$p]['kenyamanan'];
            $kenyamananc3_sum = array_sum($kenyamananc3);
        
            $keamananc3[$p] = $cent3[$p]['keamanan'];
            $keamananc3_sum = array_sum($keamananc3);
        
            $pelayananc3[$p] = $cent3[$p]['pelayanan'];
            $pelayananc3_sum = array_sum($pelayananc3);

            $citrac3[$p] = $cent3[$p]['citra'];
            $citrac3_sum = array_sum($citrac3);
        }
            $c3 = array('jasa'=>($jasac3_sum / $cent3_count), 'kenyamanan'=>($kenyamananc3_sum / $cent3_count), 'keamanan'=>($keamananc3_sum / $cent3_count), 'pelayanan'=>($pelayananc3_sum / $cent3_count));
    }else{
        $c3 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C4
    if ($cent4 != 0) {
        $cent4_count = count($cent4);
        for ($l=0; $l < $cent4_count; $l++) { 
            $jasac4[$l] = $cent4[$l]['jasa'];
            $jasac4_sum = array_sum($jasac4);
        
            $kenyamananc4[$l] = $cent4[$l]['kenyamanan'];
            $kenyamananc4_sum = array_sum($kenyamananc4);
        
            $keamananc4[$l] = $cent4[$l]['keamanan'];
            $keamananc4_sum = array_sum($keamananc4);
        
            $pelayananc4[$p] = $cent4[$l]['pelayanan'];
            $pelayananc4_sum = array_sum($pelayananc4);

            $citrac4[$l] = $cent4[$l]['citra'];
            $citrac4_sum = array_sum($citrac4);
        }
            $c4 = array('jasa'=>($jasac4_sum / $cent4_count), 'kenyamanan'=>($kenyamananc4_sum / $cent4_count), 'keamanan'=>($keamananc4_sum / $cent4_count), 'pelayanan'=>($pelayananc4_sum / $cent4_count), 'citra'=>($citrac4_sum / $cent4_count));
    }else{
        $c4 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C5
    if ($cent5 != 0) {
        $cent5_count = count($cent5);
        for ($k=0; $k < $cent5_count; $k++) { 
            $jasac5[$p] = $cent5[$k]['jasa'];
            $jasac5_sum = array_sum($jasac5);
        
            $kenyamananc5[$k] = $cent5[$k]['kenyamanan'];
            $kenyamananc5_sum = array_sum($kenyamananc5);
        
            $keamananc5[$k] = $cent5[$k]['keamanan'];
            $keamananc5_sum = array_sum($keamananc5);
        
            $pelayananc5[$k] = $cent5[$k]['pelayanan'];
            $pelayananc5_sum = array_sum($pelayananc5);

            $citrac5[$k] = $cent5[$k]['citra'];
            $citrac5_sum = array_sum($citrac5);
        }
            $c5 = array('jasa'=>($jasac5_sum / $cent5_count), 'kenyamanan'=>($kenyamananc5_sum / $cent5_count), 'keamanan'=>($keamananc5_sum / $cent5_count), 'pelayanan'=>($pelayananc5_sum / $cent5_count), 'citra'=>($citrac5_sum / $cent5_count));
    }else{
        $c5 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }
    $centroid_baru = array(['centroid'=>'c1', 'jasa'=>$c1['jasa'], 'kenyamanan'=>$c1['kenyamanan'], 'keamanan'=>$c1['keamanan'], 'pelayanan'=>$c1['pelayanan'], 'citra'=>$c1['citra']], ['centroid'=>'c2', 'jasa'=>$c2['jasa'], 'kenyamanan'=>$c2['kenyamanan'], 'keamanan'=>$c2['keamanan'], 'pelayanan'=>$c2['pelayanan'], 'citra'=>$c2['citra']], ['centroid'=>'c3', 'jasa'=>$c3['jasa'], 'kenyamanan'=>$c3['kenyamanan'], 'keamanan'=>$c3['keamanan'], 'pelayanan'=>$c3['pelayanan'], 'citra'=>$c3['citra']], ['centroid'=>'c4', 'jasa'=>$c4['jasa'], 'kenyamanan'=>$c4['kenyamanan'], 'keamanan'=>$c4['keamanan'], 'pelayanan'=>$c4['pelayanan'], 'citra'=>$c4['citra']], ['centroid'=>'c5', 'jasa'=>$c5['jasa'], 'kenyamanan'=>$c5['kenyamanan'], 'keamanan'=>$c5['keamanan'], 'pelayanan'=>$c5['pelayanan'], 'citra'=>$c5['citra']]);

    $ds = olahdata();
    for ($i=0; $i < count($ds); $i++) { 
        # hitung C1
        $C1[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[0]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[0]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[0]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[0]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[0]['citra']), 2));
        
        // hitung c2
        $C2[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[1]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[1]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[1]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[1]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[1]['citra']), 2)); 

        // hitung c3
        $C3[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[2]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[2]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[2]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[2]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[2]['citra']), 2)); 

        // hitung c4
        $C4[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[3]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[3]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[3]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[3]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[3]['citra']), 2)); 

        // hitung c5
        $C5[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[4]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[4]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[4]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[4]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[4]['citra']), 2)); 

        // Array iterasi1
        $centroid1[$i] = array('c1'=>$C1[$i], 'c2'=>$C2[$i], 'c3'=>$C3[$i], 'c4'=>$C4[$i], 'c5'=>$C5[$i]);

        $literasi1[$i] = array('nama'=>$ds[$i]['nama'], 'jasa'=>$ds[$i]['jasa'], 'kenyamanan'=>$ds[$i]['kenyamanan'], 'keamanan'=>$ds[$i]['keamanan'], 'pelayanan'=>$ds[$i]['pelayanan'], 'citra'=>$ds[$i]['citra'], 'c1'=>$C1[$i], 'c2'=>$C2[$i], 'c3'=>$C3[$i], 'c4'=>$C4[$i], 'c5'=>$C5[$i], 'kedekatan'=>min($centroid1[$i]), 'cluster'=>miniterasi($centroid1[$i]['c1'], $centroid1[$i]['c2'], $centroid1[$i]['c3'], $centroid1[$i]['c4'], $centroid1[$i]['c5']));

        $query = "INSERT INTO tmp_literasi3(nama, jasa, kenyamanan, keamanan, pelayanan, citra, c1, c2, c3, c4, c5, cluster) VALUES(" . "'" . $literasi1[$i]['nama'] . "'" . ", " . "'" . $literasi1[$i]['jasa'] . "'" . ", " . "'" . $literasi1[$i]['kenyamanan'] . "'" . ", " . "'" . $literasi1[$i]['keamanan'] . "'" . ", " . "'" . $literasi1[$i]['pelayanan'] . "'" . ", " . "'" . $literasi1[$i]['citra'] . "'" . " , " . "'" . $literasi1[$i]['c1'] . "'" . ", " . "'" . $literasi1[$i]['c2'] . "'" . " , " . "'" . $literasi1[$i]['c3'] . "'" . ", " . "'" . $literasi1[$i]['c4'] . "'" . ", " . "'" . $literasi1[$i]['c5'] . "'" . " , " . "'" . $literasi1[$i]['cluster'] . "'" . ")";
        mysqli_query($conn, $query);
    }
    return $literasi1;
}
// end fungsi literasi ke3


// fungsi literasi ke4

function iterasike4()
{
    $conn = koneksi();
    // update centroid
    // nilai c1
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi3 WHERE cluster='c1' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent1[] = $resultcent;
        }
    }else{
        // $cent1 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent1 = 0;
    }

    // nilai c2
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi3 WHERE cluster='c2' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent2[] = $resultcent;
        }
    }else{
        // $cent2 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent2 = 0;
    }

    // nilai c3
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi3 WHERE cluster='c3' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent3[] = $resultcent;
        }
    }else{
        // $cent3 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent3 = 0;
    }

    // nilai c4
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi3 WHERE cluster='c4' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent4[] = $resultcent;
        }
    }else{
        // $cent4 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent4 = 0;
    }

    // nilai c5
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi3 WHERE cluster='c5' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent5[] = $resultcent;
        }
    }else{
        // $cent5 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        $cent5 = 0;
    }
    // update nilai centroid
    // C1
    if ($cent1 != 0) {
        $cent1_count = count($cent1);
        for ($i=0; $i < $cent1_count; $i++) { 
            $jasac1[$i] = $cent1[$i]['jasa'];
            $jasac1_sum = array_sum($jasac1);

            $kenyamananc1[$i] = $cent1[$i]['kenyamanan'];
            $kenyamananc1_sum = array_sum($kenyamananc1);

            $keamananc1[$i] = $cent1[$i]['keamanan'];
            $keamananc1_sum = array_sum($keamananc1);

            $pelayananc1[$i] = $cent1[$i]['pelayanan'];
            $pelayananc1_sum = array_sum($pelayananc1);

            $citrac1[$i] = $cent1[$i]['citra'];
            $citrac1_sum = array_sum($citrac1);
        }
        $c1 = array('jasa'=>($jasac1_sum / $cent1_count), 'kenyamanan'=>($kenyamananc1_sum / $cent1_count), 'keamanan'=>($keamananc1_sum / $cent1_count), 'pelayanan'=>($pelayananc1_sum / $cent1_count), 'citra'=>($citrac1_sum / $cent1_count));
    }else{
        $c1 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C2
    if ($cent2 != 0) {
        $cent2_count = count($cent2);
        for ($o=0; $o < $cent2_count; $o++) { 
            $jasac2[$o] = $cent2[$o]['jasa'];
            $jasac2_sum = array_sum($jasac2);
    
            $kenyamananc2[$o] = $cent2[$o]['kenyamanan'];
            $kenyamananc2_sum = array_sum($kenyamananc2);
    
            $keamananc2[$o] = $cent2[$o]['keamanan'];
            $keamananc2_sum = array_sum($keamananc2);
    
            $pelayananc2[$o] = $cent1[$o]['pelayanan'];
            $pelayananc2_sum = array_sum($pelayananc2);

            $citrac2[$o] = $cent1[$o]['citra'];
            $citrac2_sum = array_sum($citrac2);
        }
            $c2 = array('jasa'=>($jasac2_sum / $cent2_count), 'kenyamanan'=>($kenyamananc2_sum / $cent2_count), 'keamanan'=>($keamananc2_sum / $cent2_count), 'pelayanan'=>($pelayananc2_sum / $cent2_count), 'citra'=>($citrac2_sum / $cent2_count));
        }else{
            $c2 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        }
    // C3
    if ($cent3 != 0) {
        $cent3_count = count($cent3);
        for ($p=0; $p < $cent3_count; $p++) { 
            $jasac3[$p] = $cent3[$p]['jasa'];
            $jasac3_sum = array_sum($jasac3);
        
            $kenyamananc3[$p] = $cent3[$p]['kenyamanan'];
            $kenyamananc3_sum = array_sum($kenyamananc3);
        
            $keamananc3[$p] = $cent3[$p]['keamanan'];
            $keamananc3_sum = array_sum($keamananc3);
        
            $pelayananc3[$p] = $cent3[$p]['pelayanan'];
            $pelayananc3_sum = array_sum($pelayananc3);

            $citrac3[$p] = $cent3[$p]['citra'];
            $citrac3_sum = array_sum($citrac3);
        }
            $c3 = array('jasa'=>($jasac3_sum / $cent3_count), 'kenyamanan'=>($kenyamananc3_sum / $cent3_count), 'keamanan'=>($keamananc3_sum / $cent3_count), 'pelayanan'=>($pelayananc3_sum / $cent3_count));
    }else{
        $c3 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C4
    if ($cent4 != 0) {
        $cent4_count = count($cent4);
        for ($l=0; $l < $cent4_count; $l++) { 
            $jasac4[$l] = $cent4[$l]['jasa'];
            $jasac4_sum = array_sum($jasac4);
        
            $kenyamananc4[$l] = $cent4[$l]['kenyamanan'];
            $kenyamananc4_sum = array_sum($kenyamananc4);
        
            $keamananc4[$l] = $cent4[$l]['keamanan'];
            $keamananc4_sum = array_sum($keamananc4);
        
            $pelayananc4[$p] = $cent4[$l]['pelayanan'];
            $pelayananc4_sum = array_sum($pelayananc4);

            $citrac4[$l] = $cent4[$l]['citra'];
            $citrac4_sum = array_sum($citrac4);
        }
            $c4 = array('jasa'=>($jasac4_sum / $cent4_count), 'kenyamanan'=>($kenyamananc4_sum / $cent4_count), 'keamanan'=>($keamananc4_sum / $cent4_count), 'pelayanan'=>($pelayananc4_sum / $cent4_count), 'citra'=>($citrac4_sum / $cent4_count));
    }else{
        $c4 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C5
    if ($cent5 != 0) {
        $cent5_count = count($cent5);
        for ($k=0; $k < $cent5_count; $k++) { 
            $jasac5[$p] = $cent5[$k]['jasa'];
            $jasac5_sum = array_sum($jasac5);
        
            $kenyamananc5[$k] = $cent5[$k]['kenyamanan'];
            $kenyamananc5_sum = array_sum($kenyamananc5);
        
            $keamananc5[$k] = $cent5[$k]['keamanan'];
            $keamananc5_sum = array_sum($keamananc5);
        
            $pelayananc5[$k] = $cent5[$k]['pelayanan'];
            $pelayananc5_sum = array_sum($pelayananc5);

            $citrac5[$k] = $cent5[$k]['citra'];
            $citrac5_sum = array_sum($citrac5);
        }
            $c5 = array('jasa'=>($jasac5_sum / $cent5_count), 'kenyamanan'=>($kenyamananc5_sum / $cent5_count), 'keamanan'=>($keamananc5_sum / $cent5_count), 'pelayanan'=>($pelayananc5_sum / $cent5_count), 'citra'=>($citrac5_sum / $cent5_count));
    }else{
        $c5 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }
    $centroid_baru = array(['centroid'=>'c1', 'jasa'=>$c1['jasa'], 'kenyamanan'=>$c1['kenyamanan'], 'keamanan'=>$c1['keamanan'], 'pelayanan'=>$c1['pelayanan'], 'citra'=>$c1['citra']], ['centroid'=>'c2', 'jasa'=>$c2['jasa'], 'kenyamanan'=>$c2['kenyamanan'], 'keamanan'=>$c2['keamanan'], 'pelayanan'=>$c2['pelayanan'], 'citra'=>$c2['citra']], ['centroid'=>'c3', 'jasa'=>$c3['jasa'], 'kenyamanan'=>$c3['kenyamanan'], 'keamanan'=>$c3['keamanan'], 'pelayanan'=>$c3['pelayanan'], 'citra'=>$c3['citra']], ['centroid'=>'c4', 'jasa'=>$c4['jasa'], 'kenyamanan'=>$c4['kenyamanan'], 'keamanan'=>$c4['keamanan'], 'pelayanan'=>$c4['pelayanan'], 'citra'=>$c4['citra']], ['centroid'=>'c5', 'jasa'=>$c5['jasa'], 'kenyamanan'=>$c5['kenyamanan'], 'keamanan'=>$c5['keamanan'], 'pelayanan'=>$c5['pelayanan'], 'citra'=>$c5['citra']]);

    $ds = olahdata();
    for ($i=0; $i < count($ds); $i++) { 
        # hitung C1
        $C1[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[0]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[0]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[0]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[0]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[0]['citra']), 2));
        
        // hitung c2
        $C2[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[1]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[1]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[1]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[1]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[1]['citra']), 2)); 

        // hitung c3
        $C3[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[2]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[2]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[2]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[2]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[2]['citra']), 2)); 

        // hitung c4
        $C4[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[3]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[3]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[3]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[3]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[3]['citra']), 2)); 

        // hitung c5
        $C5[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[4]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[4]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[4]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[4]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[4]['citra']), 2)); 

        // Array iterasi1
        $centroid1[$i] = array('c1'=>$C1[$i], 'c2'=>$C2[$i], 'c3'=>$C3[$i], 'c4'=>$C4[$i], 'c5'=>$C5[$i]);

        $literasi1[$i] = array('nama'=>$ds[$i]['nama'], 'jasa'=>$ds[$i]['jasa'], 'kenyamanan'=>$ds[$i]['kenyamanan'], 'keamanan'=>$ds[$i]['keamanan'], 'pelayanan'=>$ds[$i]['pelayanan'], 'citra'=>$ds[$i]['citra'], 'c1'=>$C1[$i], 'c2'=>$C2[$i], 'c3'=>$C3[$i], 'c4'=>$C4[$i], 'c5'=>$C5[$i], 'kedekatan'=>min($centroid1[$i]), 'cluster'=>miniterasi($centroid1[$i]['c1'], $centroid1[$i]['c2'], $centroid1[$i]['c3'], $centroid1[$i]['c4'], $centroid1[$i]['c5']));

        $query = "INSERT INTO tmp_literasi4(nama, jasa, kenyamanan, keamanan, pelayanan, citra, c1, c2, c3, c4, c5, cluster) VALUES(" . "'" . $literasi1[$i]['nama'] . "'" . ", " . "'" . $literasi1[$i]['jasa'] . "'" . ", " . "'" . $literasi1[$i]['kenyamanan'] . "'" . ", " . "'" . $literasi1[$i]['keamanan'] . "'" . ", " . "'" . $literasi1[$i]['pelayanan'] . "'" . ", " . "'" . $literasi1[$i]['citra'] . "'" . " , " . "'" . $literasi1[$i]['c1'] . "'" . ", " . "'" . $literasi1[$i]['c2'] . "'" . " , " . "'" . $literasi1[$i]['c3'] . "'" . ", " . "'" . $literasi1[$i]['c4'] . "'" . ", " . "'" . $literasi1[$i]['c5'] . "'" . " , " . "'" . $literasi1[$i]['cluster'] . "'" . ")";
        mysqli_query($conn, $query);
    }
    return $literasi1;
}
// end fungsi literasi ke4


// fungsi literasi ke5

function iterasike5()
{
    $conn = koneksi();
    // update centroid
    // nilai c1
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi4 WHERE cluster='c1' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent1[] = $resultcent;
        }
    }else{
        $cent1 = 0;
    }

    // nilai c2
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi4 WHERE cluster='c2' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent2[] = $resultcent;
        }
    }else{
        $cent2 = 0;
    }

    // nilai c3
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi4 WHERE cluster='c3' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent3[] = $resultcent;
        }
    }else{
        $cent3 = 0;
    }

    // nilai c4
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi4 WHERE cluster='c4' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent4[] = $resultcent;
        }
    }else{
        $cent4 = 0;
    }

    // nilai c5
    $cekcent = mysqli_query($conn, "SELECT jasa, kenyamanan, keamanan, pelayanan, citra FROM tmp_literasi4 WHERE cluster='c5' GROUP BY jasa, kenyamanan, keamanan, pelayanan, citra");
    $Row = mysqli_num_rows($cekcent);
    if ($Row > 0) {
        while ($resultcent = mysqli_fetch_assoc($cekcent)) {
            $cent5[] = $resultcent;
        }
    }else{
        $cent5 = 0;
    }
    // update nilai centroid
    // C1
    if ($cent1 != 0) {
        $cent1_count = count($cent1);
        for ($i=0; $i < $cent1_count; $i++) { 
            $jasac1[$i] = $cent1[$i]['jasa'];
            $jasac1_sum = array_sum($jasac1);

            $kenyamananc1[$i] = $cent1[$i]['kenyamanan'];
            $kenyamananc1_sum = array_sum($kenyamananc1);

            $keamananc1[$i] = $cent1[$i]['keamanan'];
            $keamananc1_sum = array_sum($keamananc1);

            $pelayananc1[$i] = $cent1[$i]['pelayanan'];
            $pelayananc1_sum = array_sum($pelayananc1);

            $citrac1[$i] = $cent1[$i]['citra'];
            $citrac1_sum = array_sum($citrac1);
        }
        $c1 = array('jasa'=>($jasac1_sum / $cent1_count), 'kenyamanan'=>($kenyamananc1_sum / $cent1_count), 'keamanan'=>($keamananc1_sum / $cent1_count), 'pelayanan'=>($pelayananc1_sum / $cent1_count), 'citra'=>($citrac1_sum / $cent1_count));
    }else{
        $c1 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C2
    if ($cent2 != 0) {
        $cent2_count = count($cent2);
        for ($o=0; $o < $cent2_count; $o++) { 
            $jasac2[$o] = $cent2[$o]['jasa'];
            $jasac2_sum = array_sum($jasac2);
    
            $kenyamananc2[$o] = $cent2[$o]['kenyamanan'];
            $kenyamananc2_sum = array_sum($kenyamananc2);
    
            $keamananc2[$o] = $cent2[$o]['keamanan'];
            $keamananc2_sum = array_sum($keamananc2);
    
            $pelayananc2[$o] = $cent1[$o]['pelayanan'];
            $pelayananc2_sum = array_sum($pelayananc2);

            $citrac2[$o] = $cent1[$o]['citra'];
            $citrac2_sum = array_sum($citrac2);
        }
            $c2 = array('jasa'=>($jasac2_sum / $cent2_count), 'kenyamanan'=>($kenyamananc2_sum / $cent2_count), 'keamanan'=>($keamananc2_sum / $cent2_count), 'pelayanan'=>($pelayananc2_sum / $cent2_count), 'citra'=>($citrac2_sum / $cent2_count));
        }else{
            $c2 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
        }
    // C3
    if ($cent3 != 0) {
        $cent3_count = count($cent3);
        for ($p=0; $p < $cent3_count; $p++) { 
            $jasac3[$p] = $cent3[$p]['jasa'];
            $jasac3_sum = array_sum($jasac3);
        
            $kenyamananc3[$p] = $cent3[$p]['kenyamanan'];
            $kenyamananc3_sum = array_sum($kenyamananc3);
        
            $keamananc3[$p] = $cent3[$p]['keamanan'];
            $keamananc3_sum = array_sum($keamananc3);
        
            $pelayananc3[$p] = $cent3[$p]['pelayanan'];
            $pelayananc3_sum = array_sum($pelayananc3);

            $citrac3[$p] = $cent3[$p]['citra'];
            $citrac3_sum = array_sum($citrac3);
        }
            $c3 = array('jasa'=>($jasac3_sum / $cent3_count), 'kenyamanan'=>($kenyamananc3_sum / $cent3_count), 'keamanan'=>($keamananc3_sum / $cent3_count), 'pelayanan'=>($pelayananc3_sum / $cent3_count));
    }else{
        $c3 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C4
    if ($cent4 != 0) {
        $cent4_count = count($cent4);
        for ($l=0; $l < $cent4_count; $l++) { 
            $jasac4[$l] = $cent4[$l]['jasa'];
            $jasac4_sum = array_sum($jasac4);
        
            $kenyamananc4[$l] = $cent4[$l]['kenyamanan'];
            $kenyamananc4_sum = array_sum($kenyamananc4);
        
            $keamananc4[$l] = $cent4[$l]['keamanan'];
            $keamananc4_sum = array_sum($keamananc4);
        
            $pelayananc4[$p] = $cent4[$l]['pelayanan'];
            $pelayananc4_sum = array_sum($pelayananc4);

            $citrac4[$l] = $cent4[$l]['citra'];
            $citrac4_sum = array_sum($citrac4);
        }
            $c4 = array('jasa'=>($jasac4_sum / $cent4_count), 'kenyamanan'=>($kenyamananc4_sum / $cent4_count), 'keamanan'=>($keamananc4_sum / $cent4_count), 'pelayanan'=>($pelayananc4_sum / $cent4_count), 'citra'=>($citrac4_sum / $cent4_count));
    }else{
        $c4 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }

    // C5
    if ($cent5 != 0) {
        $cent5_count = count($cent5);
        for ($k=0; $k < $cent5_count; $k++) { 
            $jasac5[$p] = $cent5[$k]['jasa'];
            $jasac5_sum = array_sum($jasac5);
        
            $kenyamananc5[$k] = $cent5[$k]['kenyamanan'];
            $kenyamananc5_sum = array_sum($kenyamananc5);
        
            $keamananc5[$k] = $cent5[$k]['keamanan'];
            $keamananc5_sum = array_sum($keamananc5);
        
            $pelayananc5[$k] = $cent5[$k]['pelayanan'];
            $pelayananc5_sum = array_sum($pelayananc5);

            $citrac5[$k] = $cent5[$k]['citra'];
            $citrac5_sum = array_sum($citrac5);
        }
            $c5 = array('jasa'=>($jasac5_sum / $cent5_count), 'kenyamanan'=>($kenyamananc5_sum / $cent5_count), 'keamanan'=>($keamananc5_sum / $cent5_count), 'pelayanan'=>($pelayananc5_sum / $cent5_count), 'citra'=>($citrac5_sum / $cent5_count));
    }else{
        $c5 = array('jasa'=>0, 'kenyamanan'=>0, 'keamanan'=>0, 'pelayanan'=>0, 'citra'=>0);
    }
    $centroid_baru = array(['centroid'=>'c1', 'jasa'=>$c1['jasa'], 'kenyamanan'=>$c1['kenyamanan'], 'keamanan'=>$c1['keamanan'], 'pelayanan'=>$c1['pelayanan'], 'citra'=>$c1['citra']], ['centroid'=>'c2', 'jasa'=>$c2['jasa'], 'kenyamanan'=>$c2['kenyamanan'], 'keamanan'=>$c2['keamanan'], 'pelayanan'=>$c2['pelayanan'], 'citra'=>$c2['citra']], ['centroid'=>'c3', 'jasa'=>$c3['jasa'], 'kenyamanan'=>$c3['kenyamanan'], 'keamanan'=>$c3['keamanan'], 'pelayanan'=>$c3['pelayanan'], 'citra'=>$c3['citra']], ['centroid'=>'c4', 'jasa'=>$c4['jasa'], 'kenyamanan'=>$c4['kenyamanan'], 'keamanan'=>$c4['keamanan'], 'pelayanan'=>$c4['pelayanan'], 'citra'=>$c4['citra']], ['centroid'=>'c5', 'jasa'=>$c5['jasa'], 'kenyamanan'=>$c5['kenyamanan'], 'keamanan'=>$c5['keamanan'], 'pelayanan'=>$c5['pelayanan'], 'citra'=>$c5['citra']]);

    $ds = olahdata();
    for ($i=0; $i < count($ds); $i++) { 
        # hitung C1
        $C1[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[0]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[0]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[0]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[0]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[0]['citra']), 2));
        
        // hitung c2
        $C2[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[1]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[1]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[1]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[1]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[1]['citra']), 2)); 

        // hitung c3
        $C3[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[2]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[2]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[2]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[2]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[2]['citra']), 2)); 

        // hitung c4
        $C4[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[3]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[3]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[3]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[3]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[3]['citra']), 2)); 

        // hitung c5
        $C5[$i] = SQRT(pow(($ds[$i]['jasa']-$centroid_baru[4]['jasa']), 2) + pow(($ds[$i]['kenyamanan']-$centroid_baru[4]['kenyamanan']), 2) + pow(($ds[$i]['keamanan']-$centroid_baru[4]['keamanan']), 2) + pow(($ds[$i]['pelayanan']-$centroid_baru[4]['pelayanan']), 2) + pow(($ds[$i]['citra']-$centroid_baru[4]['citra']), 2)); 

        // Array iterasi1
        $centroid1[$i] = array('c1'=>$C1[$i], 'c2'=>$C2[$i], 'c3'=>$C3[$i], 'c4'=>$C4[$i], 'c5'=>$C5[$i]);

        $literasi1[$i] = array('nama'=>$ds[$i]['nama'], 'jasa'=>$ds[$i]['jasa'], 'kenyamanan'=>$ds[$i]['kenyamanan'], 'keamanan'=>$ds[$i]['keamanan'], 'pelayanan'=>$ds[$i]['pelayanan'], 'citra'=>$ds[$i]['citra'], 'c1'=>$C1[$i], 'c2'=>$C2[$i], 'c3'=>$C3[$i], 'c4'=>$C4[$i], 'c5'=>$C5[$i], 'kedekatan'=>min($centroid1[$i]), 'cluster'=>miniterasi($centroid1[$i]['c1'], $centroid1[$i]['c2'], $centroid1[$i]['c3'], $centroid1[$i]['c4'], $centroid1[$i]['c5']));

        $query = "INSERT INTO tmp_literasi5(nama, jasa, kenyamanan, keamanan, pelayanan, citra, c1, c2, c3, c4, c5, cluster) VALUES(" . "'" . $literasi1[$i]['nama'] . "'" . ", " . "'" . $literasi1[$i]['jasa'] . "'" . ", " . "'" . $literasi1[$i]['kenyamanan'] . "'" . ", " . "'" . $literasi1[$i]['keamanan'] . "'" . ", " . "'" . $literasi1[$i]['pelayanan'] . "'" . ", " . "'" . $literasi1[$i]['citra'] . "'" . " , " . "'" . $literasi1[$i]['c1'] . "'" . ", " . "'" . $literasi1[$i]['c2'] . "'" . " , " . "'" . $literasi1[$i]['c3'] . "'" . ", " . "'" . $literasi1[$i]['c4'] . "'" . ", " . "'" . $literasi1[$i]['c5'] . "'" . " , " . "'" . $literasi1[$i]['cluster'] . "'" . ")";
        mysqli_query($conn, $query);
    }
    return $literasi1;
}
// end fungsi literasi ke5
// End fungsi Kmeans