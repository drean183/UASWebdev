<!DOCTYPE html>
<?php 
    include "includes/config.php";
    if(isset($_POST['Simpan']))
    {
        $kodeFoto = $_POST['inputkode'];
        $namaFoto = $_POST['inputnama'];
        $kodeDestinasi = $_POST['kodeDestinasi'];

        $nama = $_FILES['file']['name'];
        $file_tmp = $_FILES["file"]["tmp_name"];
        
        if(empty($nama))
        {
            mysqli_query($connection, "update fotodestinasi set fotonama='$namaFoto', destinasiID ='$kodeDestinasi' where fotoID = '$kodeFoto'");
            header("location:fotodestinasi.php");
        }
        $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

        //PERIKSA EKSTENSI FILE
        if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "jpeg"))
        {
            move_uploaded_file($file_tmp, 'img/imgdata/fotodestinasi/'.$nama);

            mysqli_query($connection, "update fotodestinasi set fotonama='$namaFoto', destinasiID = '$kodeDestinasi', fotofile = '$nama' where fotoID = '$kodeFoto'");
            header("location:fotodestinasi.php");
        }
    }

    
    $kode = $_GET["ubahfoto"];
    $editfoto = mysqli_query($connection, "select * from fotodestinasi where fotoID = '$kode'");
    $rowedit = mysqli_fetch_array($editfoto);
    $editdestinasi = mysqli_query($connection, "select * from destinasi, fotodestinasi where fotoID = '$kode' and destinasi.destinasiID = fotodestinasi.destinasiID");
    $rowedit2 = mysqli_fetch_array($editdestinasi);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <title>Kabupaten</title>
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
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Input Tabel Foto Destinasi</h1>
                    </div>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="kodefoto" class="col-sm-2 col-form-label">Kode Foto</label>
                        <div class="col-sm-10">
                            <input type="text" readonly value="<?php echo $rowedit['fotoID']?>" class="form-control" id="kodeFoto" name="inputkode" placeholder="Kode Foto" maxlength="4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namafoto" class="col-sm-2 col-form-label">Nama Foto</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $rowedit['fotonama']?>" class="form-control" id="namaFoto" name="inputnama" placeholder="Nama Foto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="refkategori" class="col-sm-2 col-form-label">Destinasi</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="kodedestinasi" name="kodeDestinasi">
                            <option value="<?php echo $rowedit['destinasiID']?>"><?php echo $rowedit['destinasiID']?> <?php echo $rowedit2['destinasinama']?></option>
                                    <?php 
                                    $datadestinasi = mysqli_query($connection,"SELECT * FROM destinasi");
                                    while($row = mysqli_fetch_array($datadestinasi)) { ?>

                                        <option value="<?php echo $row["destinasiID"]?>">
                                            <?php echo $row["destinasiID"]?>
                                            <?php echo $row["destinasinama"]?>
                                        </option>
                                    <?php
                                    }
                                    ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">Foto Destinasi</label>
                        <div class="col-sm-10">
                            <input type="file" id="file" name="file">
                            <img src="img/imgdata/fotodestinasi/<?php echo $rowedit['fotofile']?>" style="width : 200px; height: 200px;">
                            <p class="help-block">Field ini digunakan untuk unggah file</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
                            <input type="submit" name="Batal" value="Batal" class="btn btn-danger">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-1"></div>
        </div>

            <div class="row">
                <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Daftar Foto Destinasi</h1>
                            </div>
                        </div>
                    
                    
                        <table class="table table-hover table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Foto</th>
                                    <th>Nama Foto</th>
                                    <th>Kode Destinasi</th>
                                    <th>Foto Destinasi</th>
                                    <th colspan="2" style="text-align: center;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    $query = mysqli_query($connection, "select * from fotodestinasi");
                                    $nomor = 1;
                                    while($row = mysqli_fetch_array($query))
                                    { ?>
                                        <tr>
                                            <td><?php echo $nomor;?></td>
                                            <td><?php echo $row['fotoID'];?></td>
                                            <td><?php echo $row['fotonama'];?></td>
                                            <td><?php echo $row['destinasiID'];?></td>
                                            <td>
                                                <?php 
                                                    if(is_file("img/imgdata/fotodestinasi/".$row['fotofile']))
                                                    { ?>
                                                        <img src="img/imgdata/fotodestinasi/<?php echo $row['fotofile']?>" width="80">
                                            <?php   } else
                                                        echo "<img src='img/noimage.png' width='80'>"
                                                    ?>
                                            </td>      
                                            <td>
                                                <a href="fotodestinasiedit.php?ubahfoto=<?php echo $row['fotoID']?>" class="btn btn-success btn-sm" title="EDIT">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                                </a>
                                            </td>

                                            <td>
                                                <a href="fotodestinasihapus.php?hapusfoto=<?php echo $row['fotoID']?>" class="btn btn-danger btn-sm" title="DELETE">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                </svg>
                                                </a>
                                            </td>
                                        </tr>

                                        <?php $nomor = $nomor + 1;?>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-1"></div>
        </div>
        </div>
    </div>

    </body>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <?php include "footer.php" ?>

    <?php 
    mysqli_close($connection);
    ob_end_flush();
?>
</html>