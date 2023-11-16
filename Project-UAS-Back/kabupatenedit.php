<!DOCTYPE html>
<?php 
    include "includes/config.php";
    if(isset($_POST["Batal"]))
    {
        header("location:kabupaten.php");
    }
    if(isset($_POST['Simpan']))
    {
        $kodekabupaten = $_POST['inputkode'];
        $namakabupaten = $_POST['inputnama'];
        $alamatkabupaten = $_POST['inputalamat'];
        $keterangankabupaten = $_POST['inputketerangan'];
        $keteranganicon = $_POST['inputketeranganicon'];

        $nama = $_FILES['file']['name'];
        $file_tmp = $_FILES["file"]["tmp_name"];

        if(empty($nama))
        {
            mysqli_query($connection,"update kabupaten set kabupatenNAMA = '$namakabupaten', kabupatenALAMAT = '$alamatkabupaten',kabupatenKET = '$keterangankabupaten',kabupatenFOTOICONKET = '$keteranganicon' where kabupatenKODE = '$kodekabupaten'");
            header("location:kabupaten.php");
        }
        $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

        //PERIKSA EKSTENSI FILE
        if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
        {
            move_uploaded_file($file_tmp, 'img/imgdata/kabupaten'.$nama);

            mysqli_query($connection, "update kabupaten set kabupatenNAMA = '$namakabupaten', kabupatenALAMAT = '$alamatkabupaten',kabupatenKET = '$keterangankabupaten',kabupatenFOTOICON = '$nama',kabupatenFOTOICONKET = '$keteranganicon' where kabupatenKODE = '$kodekabupaten'");
            header("location:kabupaten.php");
        }
    }

    $kode = $_GET["ubahfoto"];
    $editfoto = mysqli_query($connection, "select * from kabupaten where kabupatenKODE = '$kode'");
    $rowedit = mysqli_fetch_array($editfoto);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <title>Edit Kabupaten</title>
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
                        <h1 class="display-4">Input Tabel Kabupaten</h1>
                    </div>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="kodefoto" class="col-sm-2 col-form-label">Kode Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $rowedit['kabupatenKODE'] ?>" class="form-control" id="kodeKabupaten" name="inputkode" placeholder="Kode Kabupaten" readonly maxlength="4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namafoto" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $rowedit['kabupatenNAMA'] ?>" class="form-control" id="namaKabupaten" name="inputnama" placeholder="Nama Kabupaten">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namafoto" class="col-sm-2 col-form-label">Alamat Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $rowedit['kabupatenALAMAT'] ?>" class="form-control" id="alamatKabupaten" name="inputalamat" placeholder="Alamat Kabupaten">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namafoto" class="col-sm-2 col-form-label">Keterangan Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $rowedit['kabupatenKET'] ?>" class="form-control" id="keteranganKabupaten" name="inputketerangan" placeholder="Keterangan Kabupaten">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">Icon Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="file" id="file" name="file">
                            <img src="img/imgdata/kabupaten/<?php echo $rowedit['kabupatenFOTOICON']?>" style="width : 200px; height: 200px;">
                            <p class="help-block">Field ini digunakan untuk unggah file</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="namafoto" class="col-sm-2 col-form-label">Keterangan Icon</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $rowedit['kabupatenFOTOICONKET']?>"class="form-control" id="keteranganicon" name="inputketeranganicon" placeholder="Keterangan Icon Kabupaten">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
                            <input type="submit" name="Batal" value="Batal" class="btn btn-secondary">
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
                                <h1 class="display-4">Daftar Kabupaten</h1>
                            </div>
                        </div>
                    
                    
                        <table class="table table-hover table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kabupaten</th>
                                    <th>Nama Kabupaten</th>
                                    <th>Alamat Kabupaten</th>
                                    <th>Keterangan Kabupaten</th>
                                    <th>Icon Kabupaten</th>
                                    <th>Keterangan Icon</th>
                                    <th colspan="2" style="text-align: center;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    $query = mysqli_query($connection, "select * from kabupaten");
                                    $nomor = 1;
                                    while($row = mysqli_fetch_array($query))
                                    { ?>
                                        <tr>
                                            <td><?php echo $nomor;?></td>
                                            <td><?php echo $row['kabupatenKODE'];?></td>
                                            <td><?php echo $row['kabupatenNAMA'];?></td>
                                            <td><?php echo $row['kabupatenALAMAT'];?></td>
                                            <td><?php echo $row['kabupatenKET'];?></td>
                                            <td>
                                                <?php 
                                                    if(is_file("img/imgdata/kabupaten/".$row['kabupatenFOTOICON']))
                                                    { ?>
                                                        <img src="img/imgdata/kabupaten/<?php echo $row['kabupatenFOTOICON']?>" width="80">
                                            <?php   } else
                                                        echo "<img src='img/noimage.png' width='80'>"
                                                    ?>
                                            </td>
                                            <td><?php echo $row['kabupatenFOTOICONKET'];?></td>          
                                            <td>
                                                <a href="kabupatenedit.php?ubahfoto=<?php echo $row['kabupatenKODE']?>" class="btn btn-success btn-sm" title="EDIT">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                                </a>
                                            </td>

                                            <td>
                                                <a href="kabupatenhapus.php?hapusfoto=<?php echo $row['kabupatenKODE']?>" class="btn btn-danger btn-sm" title="DELETE">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
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

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        </div>
    </div>
    <?php include "footer.php" ?>

    <?php 
    mysqli_close($connection);
    ob_end_flush();
?>
</html>