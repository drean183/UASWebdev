<?php 
    include "includes/config.php";
    if(isset($_GET['hapushotel']))
    {
        $kodeHotel = $_GET['hapushotel'];
        $hapusHotel = mysqli_query($connection, "SELECT * FROM hotel WHERE hotelID = '$kodeHotel'");

        $hapus = mysqli_fetch_array($hapusHotel);
        $namafile = $hapus['hotelfoto'];

        mysqli_query($connection, "DELETE FROM hotel WHERE hotelID = '$kodeHotel'");
        unlink('img/imgdata/hotel/'.$namafile);
        
        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location = 'hotel.php'</script>";
    }
?>