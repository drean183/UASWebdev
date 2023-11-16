<?php 
    include "includes/config.php";
    if(isset($_GET['hapuskategori']))
    {
        $kodeKategori = $_GET['hapuskategori'];

        mysqli_query($connection, "DELETE FROM kategori2 WHERE kategoriID = '$kodeKategori'");
        
        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location = 'kategori.php'</script>";
    }
?>