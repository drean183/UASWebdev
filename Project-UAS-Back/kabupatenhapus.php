<?php 
    include "includes/config.php";
    if(isset($_GET['hapusfoto']))
    {
        $kodekabupaten = $_GET['hapusfoto'];
        $hapuskabupaten = mysqli_query($connection, "SELECT * FROM kabupaten WHERE kabupatenKODE = '$kodekabupaten'");

        $hapus = mysqli_fetch_array($hapuskabupaten);
        $namafile = $hapus['kabupatenFOTOICON'];

        mysqli_query($connection, "DELETE FROM kabupaten WHERE kabupatenKODE = '$kodekabupaten'");
        unlink('img/imgdata/kabupaten/'.$namafile);
        
        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location = 'kabupaten.php'</script>";
    }
?>