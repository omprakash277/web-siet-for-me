<?php 
include 'header.php';

// Database connection
$conn = mysqli_connect("localhost", "root", "", "site");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Product query
$sql = "SELECT id, name, description, price, offer_price, image 
        FROM tbl_product 
        WHERE id IN (1,2,3,4,5,6)";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TMT Bars</title>

  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0; padding: 0;
      background: #f9f9f9;
      color: #333;
    }

    .breadcrumb {
      font-size: 14px;
      margin: 10px 20px;
      color: #555;
    }

    .main-container {
      display: flex;
      justify-content: space-between;
      max-width: 1200px;
      margin: auto;
      padding: 20px;
    }

    .products { flex: 3; }

    /* Product Card */
   .product-card {
  border: 1px solid #ddd;
  padding: 14px;              /* 10px → thoda bada */
  border-radius: 8px;
  margin-bottom: 20px;        /* spacing bhi thoda zyada */
  background: #fff;
  display: flex;
  gap: 14px;                  /* image aur content gap 25% zyada */
  align-items: center;
  transition: all 0.3s ease-in-out;
  position: relative;
  overflow: hidden;
  max-width: 810px;           /* 600px → 25% increase */
}

    .product-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.15);
    }

    /* Red border animation */
    .product-card::after {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 0;
      height: 100%;
      border: 2px solid red;
      border-radius: 10px;
      transition: all 0.6s ease;
      box-sizing: border-box;
    }
    .product-card:hover::after {
      width: 100%;
      height: 100%;
    }

  .product-card img {
  width: 135px;               /* 100px → 25% increase */
  border-radius: 6px;
  transition: transform 0.3s ease;
}
   .product-card:hover img {
  transform: scale(1.05);
}

/* Product info */
.product-info h3 {
  font-size: 18px;         /* 16px → thoda bada */
  margin: 4px 0;
}

.product-info p {
  font-size: 15px;         /* 14px → thoda bada */
  margin: 3px 0;
}

.inputs input {
  padding: 6px;
  width: 162px;            /* 120px → 35% increase */
  font-size: 14px;
}
    .product-info { flex: 1; }
    .product-card h3 { margin: 5px 0; }
    .price { color: #e74c3c; font-weight: bold; }
    .discount { color: green; font-weight: bold; }

    .inputs { flex: 1; }
    input {
      padding: 8px;
      margin: 5px 0;
      width: 160px;
    }

    /* Sidebar */
    .sidebar {
      width: 300px;
      position: fixed;
      right: 50px;
      top: 80px;
    }

    .summary {
      padding: 20px;
      background: #eef7ee;
      border: 1px solid #ddd;
      border-radius: 8px;
      text-align: center;
    }

    .btn {
      display: inline-block;
      background: #1e2a38;
      color: #fff;
      padding: 12px 20px;
      border-radius: 6px;
      text-decoration: none;
      margin-top: 15px;
      transition: background 0.3s ease, transform 0.2s;
    }
    .btn:hover {
      background: #e74c3c;
      transform: scale(1.05);
    }

    /* Brands Section */
    .brands-section {
      padding: 20px;
      background: #fff;
    }
    .brands-list {
      list-style:none; 
      display:flex; 
      gap:20px; 
      padding:0; 
      margin:0; 
      justify-content:flex-start; 
      align-items:center; 
      flex-wrap:wrap;
    }
    .brands-list li { 
      text-align:center; 
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
    }
    .brands-list li:hover {
      transform: translateY(-8px) scale(1.05);
      box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.15);
    }
    .brands-list img {
      width:80px; 
      display:block; 
      margin:0 auto 5px;
      transition: transform 0.3s ease;
    }
    .brands-list li:hover img { transform: scale(1.15); }
    .brands-list p {
      font-size:14px; 
      margin:0;
      position: relative;
      display: inline-block;
      padding-bottom: 3px;
    }
    .brands-list p::after {
      content: "";
      position: absolute;
      width: 0%;
      height: 2px;
      left: 0;
      bottom: 0;
      background: red;
      transition: width 0.4s ease;
    }
    .brands-list li:hover p::after { width: 100%; }
  </style>
</head>
<body>

<!-- Breadcrumb -->
<div class="breadcrumb">Home > Products > TMT Bars</div>

<!-- Top Selling Brands -->
<div class="brands-section">
  <h2 style="margin-bottom:15px; font-size:22px; color:#333;">Top Selling Brands</h2>
  <ul class="brands-list">
    <li data-aos="zoom-in" data-aos-duration="600">
      <a href="Top Selling Brands/APOLLO/apollo TMT.php" style="text-decoration:none; color:#333;">
        <img src="https://steeloncall.com/media/brand/image/Apollo.png" alt="Apollo">
        <p>apollo TMT</p>
      </a>
    </li>
    <li data-aos="zoom-in" data-aos-duration="700">
      <a href="Top Selling Brands/Jspl Panther/Jspl Panther TMT.php" style="text-decoration:none; color:#333;">
        <img src="https://steeloncall.com/media/brand/image/jspl-panther.png" alt="Jspl Panther">
        <p>Jspl Panther TMT</p>
      </a>
    </li>
    <li data-aos="zoom-in" data-aos-duration="800">
      <a href="Top Selling Brands/Kamdhenu/Kamdhenu TMT.php" style="text-decoration:none; color:#333;">
        <img src="https://steeloncall.com/media/brand/image/kamdhenu-tmt_1.jpg" alt="Kamdhenu">
        <p>Kamdhenu TMT</p>
      </a>
    </li>
    <li data-aos="zoom-in" data-aos-duration="900">
      <a href="Top Selling Brands/SHRISHTI/SHRISHTI TMT.php" style="text-decoration:none; color:#333;">
        <img src="https://steeloncall.com/media/brand/image/shristti-tmt.jpg" alt="Shrishti">
        <p>SHRISHTI TMT</p>
      </a>
    </li>
    <li data-aos="zoom-in" data-aos-duration="1000">
      <a href="Top Selling Brands/TATA tiscon/TATA tiscon TMT.php" style="text-decoration:none; color:#333;">
        <img src="https://steeloncall.com/media/brand/image/tatatiscon.png" alt="Tata">
        <p>TATA tiscon TMT</p>
      </a>
    </li>
  </ul>
</div>

<!-- Main Section -->
<div class="main-container">
  <!-- Left Products -->
  <div class="products">
    <h2>TMT Bars</h2>
    <p>Starts from <b>₹69,300</b></p>

    <h3>Select size</h3>
    <p>Choose from various diameter</p>

    <div class="group-content active" data-group="construction">
      <div class="product-list scrollable">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $imagePath = $row['image'];
              if (!preg_match('/\//', $imagePath)) {
                  $imagePath = "admin/uploads/" . $imagePath;
              }
        ?>
          <div class="product-card" 
               data-price="<?php echo $row['price']; ?>" 
               data-discount="<?php echo $row['offer_price']; ?>"
               data-aos="fade-up" data-aos-duration="800">

            <img src="<?php echo $imagePath; ?>" 
                 alt="<?php echo htmlspecialchars($row['name']); ?>">

            <div class="product-info">
              <h3><?php echo htmlspecialchars($row['name']); ?></h3>
              <p class="price">₹<?php echo number_format($row['price']); ?></p>
              <p class="discount">Discount Price: ₹<?php echo number_format($row['offer_price']); ?></p>
            </div>

            <div class="inputs">
              <label>Enter Pieces: </label>
              <input type="number" class="pieces" placeholder="0">
              <br>
              <label>Or Enter Tonnes: </label>
              <input type="number" class="tonnes" placeholder="0">
            </div>

          </div>
        <?php 
            }
        } else {
            echo "<p>No products found</p>";
        }
        ?>
      </div>
    </div>
  </div><!-- Products End -->

  <!-- Sidebar -->
  <div class="sidebar" data-aos="fade-left" data-aos-duration="1000">
    <div class="summary">
      <h3>Order Summary</h3>
      <p><b>Total Tonnes:</b> <span id="total-tonnes">0</span></p>
      <p><b>Total Amount:</b> ₹<span id="total-amount">0</span></p>
      <a class="btn">CONTINUE</a>
    </div>
  </div><!-- Sidebar End -->
</div><!-- Main Container End -->

<!-- Script -->
<script>
const sizeItems = document.querySelectorAll('.product-card');
const totalTonnesEl = document.getElementById('total-tonnes');
const totalAmountEl = document.getElementById('total-amount');

function calculateTotals() {
  let totalTonnes = 0;
  let totalAmount = 0;

  sizeItems.forEach(item => {
    const discountPrice = parseFloat(item.dataset.discount);

    const piecesInput = item.querySelector('.pieces');
    const tonnesInput = item.querySelector('.tonnes');

    let pieces = parseFloat(piecesInput.value) || 0;
    let tonnes = parseFloat(tonnesInput.value) || 0;

    if (pieces > 0) {
      tonnes = pieces * 0.01; // example conversion
    }

    totalTonnes += tonnes;
    totalAmount += tonnes * discountPrice;
  });

  totalTonnesEl.textContent = totalTonnes.toFixed(2);
  totalAmountEl.textContent = totalAmount.toFixed(2);
}

document.querySelectorAll('.pieces, .tonnes').forEach(input => {
  input.addEventListener('input', calculateTotals);
});
</script>

<!-- AOS Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script> AOS.init(); </script>

</body>
</html>

<?php include 'footer.php'; ?>
