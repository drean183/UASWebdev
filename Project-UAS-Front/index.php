    <?php include "header.php"?>
    <?php 
        function make_slides($connection)
        {
            $output = '';
            $count = 0;
            $result = mysqli_query($connection, "SELECT * FROM fotodestinasi");
            while($row = mysqli_fetch_array($result))
            {
            if($count == 0)
            {
                $output .= '<div class="carousel-item active">';
            }
            else
            {
                $output .= '<div class="carousel-item">';
            }

                $output .= '
                    <img src="../Project-UAS-Back/img/imgdata/fotodestinasi/'.$row["fotofile"].'" alt="'.$row["fotonama"].'" class="d-block w-100" />
                    </div>
                    ';
                $count = $count + 1;
            }

            return $output;
        }
    ?>
    <!-- slider -->
    <div id="carouselExampleSlidesOnly" class="carousel slide .carousel-fade" data-bs-ride="carousel">
        <div class="midle-text text-center">
            <h2 class="display-1">Wisata</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, eveniet.</p>
        </div>
        <div class="carousel-inner">
            <?php echo make_slides($connection)?>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="../Project-UAS-Back/img/imgdata/kuliner/Makanan_khas_ACEH_1.width-1000.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4 text-primary">Kuliner</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="kuliner.php">Read More <span class="badge text-bg-danger"><?php echo $countKuliner ?></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6" style="min-height: 400px;">
                    <h1 class="mb-4 text-primary">Hotel</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="hotel.php">Read More <span class="badge text-bg-danger"><?php echo $countHotel ?></span></a>
                    </div>
                <div class="col-lg-6">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="../Project-UAS-Back/img/imgdata/hotel/edvin-johansson-rlwE8f8anOc-unsplash.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="../Project-UAS-Back/img/imgdata/rumah-adat/Gonjong-Ampek-Baanjuang.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4 text-primary">Rumah Adat</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="rumahadat.php">Read More <span class="badge text-bg-danger"><?php echo $countRumahAdat ?></span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- bagian test tambahan -->
    <div class="row">
                <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Daftar Area Destinasi Wisata</h1>
                            </div>
                        </div>
                        <table class="table table-hover table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Wilayah</th>
                                    <th>Keterangan</th>
                                    <th>Nama Kabupaten</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = mysqli_query($connection, "select * from area, kabupaten where area.kabupatenKODE = kabupaten.kabupatenKODE");
                                    $nomor = 1;
                                    while($row = mysqli_fetch_array($query))
                                    { ?>
                                        <tr>
                                            <td><?php echo $nomor;?></td>
                                            <td><?php echo $row['areanama'];?></td>
                                            <td><?php echo $row['areawilayah'];?></td>
                                            <td><?php echo $row['areaketerangan'];?></td>
                                            <td><?php echo $row['kabupatenNAMA'];?></td>          
                                        </tr>
                                        <?php $nomor = $nomor + 1;?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <div class="col-sm-1"></div>
        </div>
    
    <div class="container" id="berita">
        <div class="row">
                <div class="container-sm p-5 text-center">
                    <h2>Berita</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, in.</p>
                </div>
                <div class="container">
                <?php 
                            while($row = mysqli_fetch_array($berita))
                            
                            { ?>
                            <div class="card my-5 border-dark" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['beritajudul']?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['tanggalterbit']?></h6>
                                    <p class="card-text"><?php echo $row['beritainti']?></p>
                                    <p class="cart-text text-secondary">Penulis : <?php echo $row['penulis']?></p>
                                    <p class="cart-text text-secondary">Penerbit : <?php echo $row['penerbit']?></p>
                                </div>
                            </div>
                    <?php
                            }
                    ?>
                    
                </div>
        </div>
    </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        -->
    </body>
</html>