    <?php include "header.php"?>
    <?php 
        function make_slides($connection)
        {
            $output = '';
            $count = 0;
            $result = mysqli_query($connection, "SELECT * FROM kuliner");
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
                    <img src="../Project-UAS-Back/img/imgdata/kuliner/'.$row["kulinerfoto"].'" alt="'.$row["kulinernama"].'" class="d-block w-100" />
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
            <h2 class="display-1">Kuliner</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, eveniet.</p>
        </div>
        <div class="carousel-inner">
            <?php echo make_slides($connection)?>
        </div>
    </div>
    <!-- tampilan objek -->
    <div class="container">
        <div class="row">
                <div class="container-fluid p-5 text-center">
                    <h2>Kuliner</h2>
                    <p>Kuliner dari berbagai provinsi</p>
                </div>
                    <form method="POST">
                        <div class="form-group row mb-5">
                            <div class="col-sm-6">
                                <input type="text" name="search" class="form-control" id="search" placeholder="Cari kuliner dengan nama provinsi" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>">
                            </div>
                            <input type="submit" name="kirim" class="col-sm-1 btn btn-secondary" value="Search">
                        </div>
                    </form>
                    <div class="d-flex flex-wrap justify-content-around">
                    <?php
                        if(isset($_POST["kirim"]))
                        {
                                $search = $_POST['search'];
                                $querySearch = mysqli_query($connection, "SELECT * FROM kuliner, provinsi WHERE kuliner.provinsiID = provinsi.provinsiID AND provinsinama LIKE '$search%'");
                            } else {
                                $querySearch = mysqli_query($connection, "SELECT * FROM kuliner, provinsi WHERE kuliner.provinsiID = provinsi.provinsiID");
                        }
                        ?>
                    <?php 
                            while($row2 = mysqli_fetch_array($querySearch))
                            
                            { ?>
                            <div class="card my-2 text-center border-dark" style="width: 18rem;">
                                <img src="../Project-UAS-Back/img/imgdata/kuliner/<?php echo $row2['kulinerfoto']?>" class="card-img-top" alt="<?php echo $row2['kulinernama']?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row2['kulinernama']?></h5>
                                    <p class="card-text"><?php echo $row2['kulinerketerangan']?></p>
                                    <a href="#" class="btn btn-primary"><?php echo $row2['provinsinama']?></a>
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