<?php 
    include "includes/config.php";
    if(isset($_GET['hapuskuliner']))
    {
        $kodeKuliner = $_GET['hapuskuliner'];

        mysqli_query($connection, "DELETE FROM kuliner WHERE kulinerID = '$kodeKuliner'");
        
        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location = 'kuliner.php'</script>";
    }
?>