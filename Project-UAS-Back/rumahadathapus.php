<?php 
    include "includes/config.php";
    if(isset($_GET['hapusrumah']))
    {
        $kodeRumah = $_GET['hapusrumah'];

        mysqli_query($connection, "DELETE FROM rumahadat WHERE rumahID = '$kodeRumah'");
        
        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location = 'rumahadat.php'</script>";
    }
?>