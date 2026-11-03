<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "pgweb9";

$conn = new mysqli($servername,$username, $password,$dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM sma_smk_sby";
$result = $conn->query($sql);

echo "<h2>Data Sekolah SMA/SMK/SLB Surabaya</h2>";
echo "<a href='input/index.html'>Input Data Baru</a><br><br>";

if ($result &&$result->num_rows > 0) {
    echo "<table border='1px'>
            <tr>
                <th>ID</th>
                <th>NPSN</th>
                <th>Nama Sekolah</th>
                <th>Status</th>
                <th>Alamat</th>
                <th>Desa/Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kabupaten/Kota</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th colspan='2'>Aksi</th>
            </tr>";

    while($row =$result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["NPSN"]."</td>
                <td>".$row["Nama"]."</td>
                <td>".$row["Status"]."</td>
                <td>".$row["Alamat"]."</td>
                <td>".$row["Desa"]."</td>
                <td>".$row["Kecamatan"]."</td>
                <td>".$row["Kabupaten"]."</td>
                <td>".$row["Latitude"]."</td>
                <td>".$row["Longitude"]."</td>
                <td><a href='hapus.php?id=".$row["id"]."' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a></td>
                <td><a href='edit/index.php?id=".$row["id"]."'>Edit</a></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Belum ada data sekolah.";
}

$conn->close();
?>