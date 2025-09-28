<?php
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

// Check if query failed
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

    .product-card {
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      background: #fff;
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .product-card img {
      width: 150px;
      border-radius: 8px;
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

    .sidebar {
      flex: 1;
      margin-left: 20px;
      position: sticky;
      top: 20px;
      height: fit-content;
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
    }

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
    }
    .brands-list img {
      width:80px; 
      display:block; 
      margin:0 auto 5px;
    }
    .brands-list p {
      font-size:14px; 
      margin:0;
    }
  </style>
</head>
<body>

<!-- 🔹 Include Header -->
<?php include 'header.php'; ?>

<div class="breadcrumb"></div>

<!-- 🔹 Top Selling Brands -->
<div class="brands-section">
  <h2 style="margin-bottom:15px; font-size:22px; color:#333;">Top Selling Brands</h2>
  <ul class="brands-list">
    <li>
      <a href="Top Selling Brands/APOLLO/apollo TMT.php" style="text-decoration:none; color:#333;">
        <img src="https://steeloncall.com/media/brand/image/Apollo.png" alt="Apollo">
        <p>apollo TMT</p>
      </a>
    </li>
    <li>
      <a href="Top Selling Brands/Jspl Panther/Jspl Panther TMT.php" style="text-decoration:none; color:#333;">
        <img src="https://steeloncall.com/media/brand/image/jspl-panther.png" alt="Jspl Panther">
        <p>Jspl Panther TMT</p>
      </a>
    </li>
    <li>
      <a href="Top Selling Brands/Kamdhenu/Kamdhenu TMT.php" style="text-decoration:none; color:#333;">
        <img src="https://steeloncall.com/media/brand/image/kamdhenu-tmt_1.jpg" alt="Kamdhenu">
        <p>Kamdhenu TMT</p>
      </a>
    </li>
    <li>
      <a href="Top Selling Brands/SHRISHTI/SHRISHTI TMT.php" style="text-decoration:none; color:#333;">
        <img src="https://steeloncall.com/media/brand/image/shristti-tmt.jpg" alt="Shrishti">
        <p>SHRISHTI TMT</p>
      </a>
    </li>
    <li>
      <a href="Top Selling Brands/TATA tiscon/TATA tiscon TMT.php" style="text-decoration:none; color:#333;">
        <img src="https://steeloncall.com/media/brand/image/tatatiscon.png" alt="Tata">
        <p>TATA tiscon TMT</p>
      </a>
    </li>
  </ul>
</div>

<!-- 🔹 Main Section -->
<div class="main-container">
  <!-- Left Side Products -->
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
        ?>
          <div class="product-card" 
               data-price="<?php echo $row['price']; ?>" 
               data-discount="<?php echo $row['offer_price']; ?>">

            <img src="/site/admin/uploads/<?php echo urlencode($row['image']); ?>" 
                 alt="<?php echo htmlspecialchars($row['name']); ?>">

            <div class="product-info">
              <h3><?php echo $row['name']; ?></h3>
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
  </div>

  <!-- Right Side Summary -->
  <div class="sidebar">
    <div class="summary">
      <h3>Order Summary</h3>
      <p><b>Total Tonnes:</b> <span id="total-tonnes">0</span></p>
      <p><b>Total Amount:</b> ₹<span id="total-amount">0</span></p>
      <a class="btn">CONTINUE</a>
    </div>
  </div>
</div>

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

    // Example: 1 piece = 0.01 tonnes
    if (pieces > 0) {
      tonnes = pieces * 0.01;
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

</body>
</html>
