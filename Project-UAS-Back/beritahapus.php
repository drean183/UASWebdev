<?php 
    include "includes/config.php";
    if(isset($_GET['hapusberita']))
    {
        $kodeberita = $_GET['hapusberita'];

        mysqli_query($connection, "DELETE FROM berita WHERE beritaID = '$kodeberita'");
        
        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location = 'berita.php'</script>";
    }
?>