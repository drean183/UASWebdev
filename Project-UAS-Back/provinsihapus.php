<?php 
    include "includes/config.php";
    if(isset($_GET['hapusprovinsi']))
    {
        $kodeProvinsi = $_GET['hapusprovinsi'];

        mysqli_query($connection, "DELETE FROM provinsi WHERE provinsiID = '$kodeProvinsi'");
        
        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location = 'provinsi.php'</script>";
    }
?>