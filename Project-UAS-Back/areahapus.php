<?php 
    include "includes/config.php";
    if(isset($_GET['hapusarea']))
    {
        $kodeArea = $_GET['hapusarea'];

        mysqli_query($connection, "DELETE FROM area WHERE areaID = '$kodeArea'");
        
        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location = 'area.php'</script>";
    }
?>