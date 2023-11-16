<!doctype html>
<?php 
    include "../Project-UAS-Back/includes/config.php";
    $query = mysqli_query($connection, "SELECT * FROM area");
    $query2 = mysqli_query($connection, "SELECT * FROM provinsi");
    $query3 = mysqli_query($connection, "SELECT * FROM kabupaten");
    
    $kuliner = mysqli_query($connection,"SELECT * FROM kuliner");
    $rumahadat = mysqli_query($connection,"SELECT * FROM rumahadat");
    $hotel = mysqli_query($connection,"SELECT * FROM hotel");
    $fotodestinasi = mysqli_query($connection, "SELECT * FROM fotodestinasi");
    $berita = mysqli_query($connection, "SELECT * FROM berita");

    $countKuliner = mysqli_num_rows($kuliner);
    $countRumahAdat = mysqli_num_rows($rumahadat);
    $countHotel = mysqli_num_rows($hotel);

    
?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="style/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Wisata</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
                <div class="container-fluid">
                    <a class="navbar-brand mx-5" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane" viewBox="0 0 16 16">
                            <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z"/>
                        </svg> Wisata
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hotel.php">Hotel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kuliner.php">Kuliner</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rumahadat.php">Rumah Adat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#berita">Berita</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Area
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php if(mysqli_num_rows($query)>0)
                                    {
                                        while($row = mysqli_fetch_array($query))
                                        { ?>
                                            <a class="dropdown-item" href="#"><?php echo $row["areanama"]?></a>

                                            <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Provinsi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php if(mysqli_num_rows($query2)>0)
                                    {
                                        while($row = mysqli_fetch_array($query2))
                                        { ?>
                                            <a class="dropdown-item" href="#"><?php echo $row["provinsinama"]?></a>

                                            <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kabupaten
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php if(mysqli_num_rows($query3)>0)
                                    {
                                        while($row = mysqli_fetch_array($query3))
                                        { ?>
                                            <a class="dropdown-item" href="#"><?php echo $row["kabupatenNAMA"]?></a>

                                            <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
