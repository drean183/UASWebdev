<!DOCTYPE html>
<?php
            include "includes/config.php";

            if(isset($_POST['simpan'])){
                if(isset($_REQUEST['inputkode'])) {
                    $destinasikode = $_REQUEST['inputkode'];
                }
                if(!empty($destinasikode)) {
                    $destinasikode = $_POST['inputkode'];
                } else {
                    die('Anda harus memasukkan data');
                }

                $destinasinama = $_POST['inputnama'];
                $alamat = $_POST['alamat'];
                $kodekategori = $_POST['kodekategori'];
                $kodearea = $_POST['kodearea'];

                mysqli_query($connection, "insert into destinasi values ('$destinasikode','$destinasinama','$alamat', '$kodekategori', '$kodearea')");
                header("location:destinasi.php");
            }

            $datakategori = mysqli_query($connection, "select * from kategori2");
            $dataarea = mysqli_query($connection,"select * from area");
        ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <title>WISATA</title>
</head>
    <?php 
        ob_start();
        session_start();

        if(!isset($_SESSION['emailuser']))
        {
            header("location:login.php");
        }
    ?>
    <?php include "header.php"?>

    <body>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#kodekategori').select2({
                        allowClear: true,
                        placeholder: "Pilih Kategori Wisata"
                    });
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#kodearea').select2({
                        allowClear: true,
                        placeholder: "Pilih Area Wisata"
                    });
                });
            </script>
        </div>
    </div>
    <?php include "footer.php" ?>

    <?php 
    mysqli_close($connection);
    ob_end_flush();
?>
</html>