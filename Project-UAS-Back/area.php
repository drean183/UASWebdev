<!DOCTYPE html>
<?php 
    include "includes/config.php";
    if(isset($_POST['Simpan']))
    {
        $kodeArea = $_POST['inputKodeArea'];
        $namaArea = $_POST['inputNamaArea'];
        $areaWilayah = $_POST['inputWilayah'];
        $keteranganArea = $_POST['inputKeteranganArea'];
        $namakabupaten = $_POST['kodekabupaten'];

        mysqli_query($connection, "insert into area value ('$kodeArea', '$namaArea','$areaWilayah','$keteranganArea','$namakabupaten')");
        header("location:area.php");
        
    }

    $datakabupaten = mysqli_query($connection, "select * from kabupaten");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <title>Area</title>
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
                        <h1 class="display-4">Input Tabel Area</h1>
                    </div>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="kodefoto" class="col-sm-2 col-form-label">Kode Area</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kodeArea" name="inputKodeArea" placeholder="Kode Area" maxlength="4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namafoto" class="col-sm-2 col-form-label">Nama Area</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaArea" name="inputNamaArea" placeholder="Nama Area">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namafoto" class="col-sm-2 col-form-label">Area Wilayah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="wilayahArea" name="inputWilayah" placeholder="Area Wilayah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namafoto" class="col-sm-2 col-form-label">Keterangan Area</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keteranganArea" name="inputKeteranganArea" placeholder="Keterangan Area">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama kabupaten" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                        <div class="col-sm-10">
                            <select name="kodekabupaten" id="namakabupaten" class="form-control">
                                <?php while($row = mysqli_fetch_array($datakabupaten)) 
                                { ?> 
                                        <option value="<?php echo $row["kabupatenKODE"]?>">
                                            <?php echo $row["kabupatenKODE"]?>
                                            <?php echo $row["kabupatenNAMA"]?>
                                        </option> 
                                <?php }?>
                            </select>
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
                                <h1 class="display-4">Daftar Area</h1>
                            </div>
                        </div>
                    
                    
                        <table class="table table-hover table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Area</th>
                                    <th>Nama Area</th>
                                    <th>Area Wilayah</th>
                                    <th>Keterangan Area</th>
                                    <th>Kode Kabupaten</th>
                                    <th colspan="2" style="text-align: center;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    $query = mysqli_query($connection, "select * from area");
                                    $nomor = 1;
                                    while($row = mysqli_fetch_array($query))
                                    { ?>
                                        <tr>
                                            <td><?php echo $nomor;?></td>
                                            <td><?php echo $row['areaID'];?></td>
                                            <td><?php echo $row['areanama'];?></td>
                                            <td><?php echo $row['areawilayah'];?></td>
                                            <td><?php echo $row['areaketerangan'];?></td>
                                            <td><?php echo $row['kabupatenKODE'];?></td>          
                                            <td>
                                                <a href="areaedit.php?ubaharea=<?php echo $row['areaID']?>" class="btn btn-success btn-sm" title="EDIT">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                                </a>
                                            </td>

                                            <td>
                                                <a href="areahapus.php?hapusarea=<?php echo $row['areaID']?>" class="btn btn-danger btn-sm" title="DELETE">
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