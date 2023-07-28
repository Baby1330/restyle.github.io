<?php
session_start();
$host = "localhost:3307";
$user = "root";
$pass = "";
$db   ="website";

$koneksi  = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    die("Gagal");
}else{
    echo "berhasil";
}

function cart($id, $nama, $harga) {
  global $conn;

  // Periksa apakah produk sudah ada di keranjang belanja
  $sql = "SELECT * FROM cart WHERE id_produk = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Jika produk sudah ada, tingkatkan jumlahnya
    $row = $result->fetch_assoc();
    $newQuantity = $row["quantity"] + 1;
    $sql = "UPDATE cart SET quantity = $newQuantity WHERE id_produk = $id";
  } else {
    $sql = "INSERT INTO cart (id_produk, nama_produk, harga_pesanan, quantity) 
            VALUES ($id, '$nama', $harga, 1)";
  }

  if ($conn->query($sql) === TRUE) {
    echo "<p>Produk berhasil ditambahkan ke keranjang belanja.</p>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Order</title>
</head>
  <section id="order" class="h-100 h-custom" style="background-color: #d2c9ff;">
  <link href="index.php" rel="stylesheet">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                      <h6 class="mb-0 text-muted">3 items</h6>
                    </div>
                    <hr class="my-4">
  
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img
                        src="assets/img/portfolio/gambar9.jpeg"
                          class="img-fluid rounded-3" alt="Top White Classy">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted">Top</h6>
                        <h6 class="text-black mb-0">White Classy</h6>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="btn btn-link px-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button>
  
                        <input id="form1" min="0" name="quantity" value="1" type="number"
                          class="form-control form-control-sm" />
  
                        <button class="btn btn-link px-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0">Rp. 399.000</h6>
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                      </div>
                    </div>
  
                    <hr class="my-4">
  
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img
                          src="assets/img/portfolio/gambar4.jpeg"
                          class="img-fluid rounded-3" alt="White Dress Formal">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted">Dress</h6>
                        <h6 class="text-black mb-0">White Dress Formal</h6>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="btn btn-link px-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button>
  
                        <input id="form1" min="0" name="quantity" value="1" type="number"
                          class="form-control form-control-sm" />
  
                        <button class="btn btn-link px-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0">Rp. 159.000</h6>
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                      </div>
                    </div>
  
                    <hr class="my-4">
  
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img
                        src="assets/img/portfolio/gambar8.jpeg"
                          class="img-fluid rounded-3" alt="Sweatshirt - White Skirt">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted">1 Set</h6>
                        <h6 class="text-black mb-0">Sweatshirt - White Skirt</h6>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="btn btn-link px-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button>
  
                        <input id="form1" min="0" name="quantity" value="1" type="number"
                          class="form-control form-control-sm" />
  
                        <button class="btn btn-link px-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0">Rp. 299.000</h6>
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                      </div>
                    </div>
  
                    <hr class="my-4">
  
                    <div class="pt-5">
                      <h6 class="mb-0"><a href="#!" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">ITEMS</h5>
                      <h5>3</h5>
                    </div>
  
  
                    <div class="mb-5">
                      <div class="form-outline">
                      </div>
                    </div>
  
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <h5>Rp.857.000</h5>
                    </div>
                    <?php
                    function generateWhatsAppLink($phoneNumber, $message = '')
                    {
                        // Hapus karakter non-digit dari nomor telepon
                        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

                        $phoneNumber = '62' . ltrim($phoneNumber, '0');

                        // URL encode pesan
                        $message = urlencode($message);

                        // Buat tautan WhatsApp
                        $whatsAppLink = "https://api.whatsapp.com/send?phone={$phoneNumber}&text={$message}";

                        return $whatsAppLink;
                    }
                    ?>

                      <?php
                      // Nomor telepon yang dituju dan pesan (opsional)
                      $phoneNumber = '089616296009';
                      $message = 'Halo, ini pesan dari website saya!';

                      // Generate tautan WhatsApp
                      $whatsAppLink = generateWhatsAppLink($phoneNumber, $message);
                      ?>

                    <a href="<?php echo $whatsAppLink; ?>" target="_blank">
                    <button type="button" class="btn btn-dark btn-block btn-lg"
                      data-mdb-ripple-color="dark">Payment</button>
                    </a>
                    </body>
                    </html>

  