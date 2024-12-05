<?php

include '../utils/connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // var_dump($_POST); die ();
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kelas = $_POST['kelas'];
    $masalah = $_POST['masalah'];

  
    if (!empty($nama) && !empty($email) && !empty($kelas) && !empty($masalah)) {
      
        $sql = "INSERT INTO report (nama, email, kelas, masalah) VALUES (?, ?, ?, ?)";

        
        $stmt = mysqli_prepare($connection, $sql);

        
        mysqli_stmt_bind_param($stmt, "ssss", $nama, $email, $kelas, $masalah);

        
        if (mysqli_stmt_execute($stmt)) {
            return "<script>
            Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!'',
            icon: 'success'
            });
            </Script>";
        } else {
            echo "Gagal mengirim laporan: " . mysqli_error($connection);
        }


        mysqli_stmt_close($stmt);
    } else {
        echo "Semua kolom harus diisi!";
    }
}

// Tutup koneksi
mysqli_close($connection);
?>


