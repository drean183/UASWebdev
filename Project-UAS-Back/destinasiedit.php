<!DOCTYPE html>
<?php
        include "includes/config.php";

        if(isset($_POST['Edit'])){
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

            mysqli_query($connection, "update destinasi set destinasinama='$destinasinama', destinasialamat='$alamat', kategoriID='$kodekategori', areaID='$kodearea'
                                        where destinasiID = '$destinasikode'");
            header("location:destinasi.php");
        }

        $datakategori = mysqli_query($connection, "select * from kategori2");
        $dataarea = mysqli_query($connection,"select * from area");

        // untuk menampilkan data pada form edit
        $kodedestinasi = $_GET["ubah"];
        $editdestinasi = mysqli_query($connection, "Select * from destinasi where destinasiID = '$kodedestinasi'");
        $rowedit = mysqli_fetch_array($editdestinasi);

        $editkategori = mysqli_query($connection, "select * from destinasi, kategori2 where destinasiID = '$kodedestinasi' and destinasi.kategoriID = kategori2.kategoriID");
        $rowedit2 = mysqli_fetch_array($editkategori);

        $editarea = mysqli_query($connection, "select * from destinasi, area where destinasiID = '$kodedestinasi' and destinasi.areaID = area.areaID");
        $rowedit3 = mysqli_fetch_array($editarea);
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
        <div class="row">
    <div class="col-sm-1"></div>
<div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Input Destinasi Wisata</h1>
                </div>
            </div>
    <form method="POST">
        <div class="form-group row">
            <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kodedestinasi" placeholder="Kode" name="inputkode" maxlength="4" value="<?php echo $rowedit["destinasiID"]?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="namadestinasi" placeholder="Nama Destinasi" name="inputnama" value="<?php echo $rowedit["destinasinama"]?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat Destinasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" placeholder="Alamat Destinasi" name="alamat" value="<?php echo $rowedit["destinasialamat"]?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="refkategori" class="col-sm-2 col-form-label">Kategori Wisata</label>
            <div class="col-sm-10">
                <select class="form-control" id="kodekategori" name="kodekategori">
                    <option value="<?php echo $rowedit["kategoriID"]?>"><?php echo $rowedit['kategoriID'] ?> <?php echo $rowedit2['destinasinama']?></option>
                        <?php 
                        
                        while($row = mysqli_fetch_array($datakategori)) { ?>

                            <option value="<?php echo $row["kategoriID"]?>">
                                <?php echo $row["kategoriID"]?>
                                <?php echo $row["kategorinama"]?>
                            </option>
                        <?php
                        }
                        ?>

                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="refkategori" class="col-sm-2 col-form-label">Area Wisata</label>
            <div class="col-sm-10">
                <select class="form-control" id="kodearea" name="kodearea">
                <option value="<?php echo $rowedit["areaID"]?>"><?php echo $rowedit['areaID'] ?> <?php echo $rowedit3['areanama']?></option>
                        <?php 
                        while($row = mysqli_fetch_array($dataarea)) { ?>
                            <option value="<?php echo $row["areaID"]?>">
                                <?php echo $row["areaID"]?>
                                <?php echo $row["areanama"]?>
                            </option>
                        <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-success" value="Edit" name="Edit">Simpan</button>
                <button type="reset" class="btn btn-danger" value="batal" name="batal">Batal</button>
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
                    <h1 class="display-4">Daftar Destinasi Wisata</h1>
                    <h2>Hasil Entri data pada Tabel Destinasi</h2>
                </div>
            </div>
            <form method="POST">
                <div class="form-group row mb-2">
                    <label for="search" class="col-sm-3">Nama Destinasi</label>
                    <div class="col-sm-6">
                        <input type="text" name="search" class="form-control" id="search" placeholder="Cari Nama Destinasi" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>">
                    </div>
                    <input type="submit" name="kirim" class="col-sm-1 btn btn-secondary" value="Search">
                </div>
            </form>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Destinasi Wisata</th>
                        <th>Alamat</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Kode Area</th>
                        <th>Nama Area</th>

                        <th colspan="2" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                if(isset($_POST["kirim"]))
                {
                    $search = $_POST['search'];
                    $query = mysqli_query($connection, "select destinasi.*,  
                        kategori2.kategoriID, kategori2.kategorinama, 
                        area.areaID, area.areanama
                        from destinasi, kategori2, area
                        where destinasinama like '$search%'
                        and destinasi.kategoriID = kategori2.kategoriID
                        and destinasi.areaID = area.areaID");
                    } else {
                        $query = mysqli_query($connection, "select destinasi.*,  
                            kategori2.kategoriID, kategori2.kategorinama, 
                            area.areaID, area.areanama
                            from destinasi, kategori2, area
                            where destinasi.kategoriID = kategori2.kategoriID
                            and destinasi.areaID = area.areaID");
                }
                    $nomor = 1;
                    while($row = mysqli_fetch_array($query))
                    {
                        ?>

                        <tr>
                            <td><?php echo $nomor;?></td>
                            <td><?php echo $row['destinasiID'];?></td>
                            <td><?php echo $row['destinasinama'];?></td>
                            <td><?php echo $row['destinasialamat'];?></td>
                            <td><?php echo $row['kategoriID'];?></td>
                            <td><?php echo $row['kategorinama'];?></td>
                            <td><?php echo $row['areaID'];?></td>
                            <td><?php echo $row['areanama'];?></td>

                            <!-- icon edit dan delete -->
                            <td>
                                <a href="destinasiedit.php?ubah=<?php echo $row["destinasiID"]?>" class="btn btn-success btn-sm" title="EDIT">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                
                            </td>
                            <td>
                                <a href="destinasihapus.php?hapus=<?php echo $row["destinasiID"]?>" class="btn btn-danger btn-sm" title="DELETE">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <?php
                        $nomor = $nomor + 1;
                    }
                    ?>
                </tbody>

            </table>
        </div>
        <div class="col-sm-1"></div>
    </div>
    </div>
</div>
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
    <?php include "footer.php" ?>

    <?php 
    mysqli_close($connection);
    ob_end_flush();
    ?>
</html>