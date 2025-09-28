<?php
$conn = mysqli_connect("localhost","root","","site");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Construction category (IDs 7–9)
$sql_construction = "SELECT * FROM tbl_category WHERE id BETWEEN 7 AND 9";
$result_construction = mysqli_query($conn,$sql_construction);

// Fabrication category (IDs 11–22)
$sql_fabrication = "SELECT * FROM tbl_category WHERE id BETWEEN 11 AND 22";
$result_fabrication = mysqli_query($conn,$sql_fabrication);

// Special category (IDs 24–33)
$sql_special = "SELECT * FROM tbl_category WHERE id BETWEEN 24 AND 33";
$result_special = mysqli_query($conn,$sql_special);
?>


<?php 
include 'header.php';

?>
		<!-- ========== Header ========== -->
<header class="site-header py-2 border-bottom">
  <div class="container d-flex justify-content-between align-items-center">

    

   

  </div>
</header>

<!-- ========== Categories Navbar ========== -->


<!-- 🔻 Header ke niche Categories Navbar -->
<nav class="categories-nav bg-light py-3 border-bottom mt-5"> 
  <div class="container d-flex flex-wrap gap-4 justify-content-center">

    <a href="tmtbar.php" class="d-flex flex-column align-items-center text-decoration-none">
      <img src="tmtmmtmtbars.jpg" alt="TMT Bars" class="mb-1" width="40">
      <span>TMT Bars</span>
    </a>

    <a href="binding-wires" class="d-flex flex-column align-items-center text-decoration-none">
      <img src="bindingwira.jpg" alt="Binding Wires" class="mb-1" width="40">
      <span>Binding Wires</span>
    </a>

    <a href="sheets" class="d-flex flex-column align-items-center text-decoration-none">
      <img src="mssheet1250X2500X3mm.jpg" alt="Sheets" class="mb-1" width="40">
      <span>Sheets</span>
    </a>

    <a href="squares" class="d-flex flex-column align-items-center text-decoration-none">
      <img src="squares.jpg" alt="Squares" class="mb-1" width="40">
      <span>Squares</span>
    </a>

    <a href="angles" class="d-flex flex-column align-items-center text-decoration-none">
      <img src="angles.jpg" alt="Angles" class="mb-1" width="40">
      <span>Angles</span>
    </a>

    <a href="flats" class="d-flex flex-column align-items-center text-decoration-none">
      <img src="flats.jpg" alt="Flats" class="mb-1" width="40">
      <span>Flats</span>
    </a>

    <a href="plates" class="d-flex flex-column align-items-center text-decoration-none">
      <img src="plates.jpg" alt="Plates" class="mb-1" width="40">
      <span>Plates</span>
    </a>

    <a href="channels" class="d-flex flex-column align-items-center text-decoration-none">
      <img src="channel.jpg" alt="Channels" class="mb-1" width="40">
      <span>Channels</span>
    </a>

    <a href="roofing-sheets" class="d-flex flex-column align-items-center text-decoration-none">
      <img src="roofingsheet.jpg" alt="Roofing Sheets" class="mb-1" width="40">
      <span>Roofing Sheets</span>
    </a>

  </div>
</nav>


  
<style>
/* 🔹 Categories Nav Styling */
.categories-nav a {
  width: 100px; /* हर item fix size */
  text-align: center;
  color: #333;
  transition: transform 0.3s ease;
}

.categories-nav a img {
  width: 60px;
  height: 60px;
  object-fit: contain;
  border-radius: 8px;
  border: 2px solid transparent; /* default transparent border */
  padding: 6px;                  /* frame space */
  transition: transform 0.4s ease, 
              box-shadow 0.4s ease, 
              border-color 0.3s ease, 
              background 0.3s ease;
}

.categories-nav a span {
  font-size: 0.9rem;
  margin-top: 6px;
  display: block;
  font-weight: 500;
  transition: color 0.3s ease;
}

/* 🔹 Hover Effects */
.categories-nav a:hover img {
  transform: scale(1.2) rotate(3deg); /* Zoom + हल्का tilt */
  box-shadow: 0 6px 15px rgba(0,0,0,0.25);
  border-color: red;                  /* red border */
  background: rgba(255,0,0,0.1);      /* हल्का red background */
}

.categories-nav a:hover span {
  color: red;
  font-weight: 600;
}

/* 🔹 Responsive */
@media (max-width: 768px) {
  .categories-nav a {
    width: 80px;
  }
  .categories-nav a img {
    width: 50px;
    height: 50px;
  }
}
.categories-nav {
  margin-top: 40px; /* header aur navbar ke beech 40px space */
}

</style>



<!-- ========== Categories Highlight ========== -->
<section class="steel-categories py-5">
  <div class="container">
    <div class="row">
      
      <!-- LEFT SIDE : Category List -->
     <div class="col-md-3">
  <ul class="list-group category-list">
    <li class="list-group-item category-link" data-target="#construction">Construction Steel</li>
    <li class="list-group-item category-link" data-target="#fabrication">Fabrication Steel</li>
    <li class="list-group-item category-link" data-target="#special">All Special Steel</li>
  </ul>
</div>

      <!-- RIGHT SIDE : Product Preview -->
      <div class="col-md-9">

<div id="construction" class="products-preview shadow rounded p-3 bg-white d-none">
  <div class="d-flex gap-4 justify-content-start flex-wrap">
    <?php
    if (mysqli_num_rows($result_construction) > 0) {
        while($row = mysqli_fetch_assoc($result_construction)) {
            // default link
            $link = "category.php?id=" . $row['id'];

            // specific ids के लिए अलग link
            if ($row['id'] == 7) {
                $link = "tmtbar.php";
                // $link = $row['slug'].".php";
            } elseif ($row['id'] == 8) {
                $link = "binding-wire.php";
                // $link = $row['slug'].".php";
            } elseif ($row['id'] == 9) {
                $link = "stirrups.php";
                $link = $row['slug'].".php";
            }
    ?>
      <a href="<?php echo $link; ?>" 
         class="text-center text-decoration-none product-item">
        <img src="/site/admin/uploads/<?php echo urlencode($row['image']); ?>" 
             alt="<?php echo htmlspecialchars($row['name']); ?>" 
             class="mb-2 rounded construction-img">
        <br>
        <small><?php echo htmlspecialchars($row['name']); ?></small>
      </a>
    <?php 
        }
    } else {
        echo "<p>No categories found</p>";
    }
    ?>
  </div>
</div>



<div id="fabrication" class="products-preview shadow rounded p-3 bg-white d-none">
  <div class="d-flex gap-4 justify-content-start flex-wrap">
    <?php
    if (mysqli_num_rows($result_fabrication) > 0) {
        while($row = mysqli_fetch_assoc($result_fabrication)) {
    ?>
      <a href="category.php?id=<?php echo $row['id']; ?>" 
         class="text-center text-decoration-none product-item">
        <img src="/site/admin/uploads/<?php echo urlencode($row['image']); ?>" 
             alt="<?php echo htmlspecialchars($row['name']); ?>" 
             class="mb-2 rounded fabrication-img">
        <br>
        <small><?php echo htmlspecialchars($row['name']); ?></small>
      </a>
    <?php 
        }
    } else {
        echo "<p>No categories found</p>";
    }
    ?>
  </div>
</div>





      <div id="special" class="products-preview shadow rounded p-3 bg-white d-none">
  <div class="d-flex gap-4 justify-content-start flex-wrap">
    <?php
    if (mysqli_num_rows($result_special) > 0) {
        while($row = mysqli_fetch_assoc($result_special)) {
    ?>
      <a href="category.php?id=<?php echo $row['id']; ?>" 
         class="text-center text-decoration-none product-item">
        <img src="/site/admin/uploads/<?php echo urlencode($row['image']); ?>" 
             alt="<?php echo htmlspecialchars($row['name']); ?>" 
             class="mb-2 rounded special-img">
        <br>
        <small><?php echo htmlspecialchars($row['name']); ?></small>
      </a>
    <?php 
        }
    } else {
        echo "<p>No categories found</p>";
    }
    ?>
  </div>
</div>


      </div>
    </div>
  </div>
</section>

<!-- CSS -->
<<!-- Extra CSS Animations -->
<!-- CSS -->
<style>
/* Category list styling (20% बड़ा + spacing) */
.category-list .list-group-item {
  font-size: 1.2rem;      /* 20% बड़ा */
  padding: 12px 18px;     /* spacing भी 20% ज्यादा */
  margin-bottom: 8px;     /* items के बीच gap */
  cursor: pointer;
  font-weight: bold;
  transition: all 0.3s ease;
}

.category-list .list-group-item:hover {
  background: red;
  color: #fff;
}

/* Category hover underline animation */
.category-list .list-group-item {
  position: relative;
}
.category-list .list-group-item::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 0;
  background: red;
  transition: width 0.3s ease;
}
.category-list .list-group-item:hover::after {
  width: 100%;
}

/* Product box animation */
.products-preview {
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.5s ease;

  /* Scroll fix */
  max-height: 400px;   /* जितना चाहिए उतना adjust कर लो */
  overflow-y: auto;
}

/* Scrollbar styling */
.products-preview::-webkit-scrollbar {
  width: 8px;
}
.products-preview::-webkit-scrollbar-thumb {
  background: red;
  border-radius: 4px;
}
.products-preview::-webkit-scrollbar-track {
  background: #f1f1f1;
}

.products-preview.active {
  opacity: 1;
  transform: translateY(0);
}

/* Product image styling */
.products-preview img {
  width: 180px;
  height: 180px;
  object-fit: contain;
  border: 2px solid transparent;  /* default transparent border */
  border-radius: 8px;
  padding: 8px;
  background: #fff;
  transition: transform 0.4s ease, 
              box-shadow 0.4s ease, 
              border-color 0.3s ease, 
              background 0.3s ease;
}

/* Product image hover effect */
.products-preview img:hover {
  transform: scale(1.1) rotate(2deg); /* zoom + tilt effect */
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  border-color: red;                  /* red border */
  background: rgba(255,0,0,0.08);     /* हल्का red background */
}

/* Text animation */
.products-preview small {
  display: block;
  margin-top: 8px;
  font-weight: 600;
  transition: color 0.3s ease;
}
.products-preview a:hover small {
  color: red;
}
/* Fabrication / Special Preview Items */
.fabrication-img {
  width: 170px;   /* 30% बड़ा */
  height: 170px;  /* 30% बड़ा */
  object-fit: contain;
  border: 2px solid transparent;
  border-radius: 10px;
  padding: 8px;
  background: #fff;
  transition: transform 0.4s ease, 
              box-shadow 0.4s ease, 
              border-color 0.3s ease, 
              background 0.3s ease;
}

#fabrication .d-flex {
  display: grid !important;
  grid-template-columns: repeat(3, 1fr); /* 3 images per row */
  gap: 20px; /* space between images */
  justify-items: center; /* center align */
}


.products-preview .product-item:hover img {
  transform: scale(1.15) rotate(2deg);
  box-shadow: 0 6px 18px rgba(0,0,0,0.25);
  border-color: red;
  background: rgba(255,0,0,0.08);
}

.products-preview .product-item small {
  display: block;
  margin-top: 6px;
  font-weight: 600;
  transition: color 0.3s ease;
}

.products-preview .product-item:hover small {
  color: red;
}



</style>


<!-- JS Animation Trigger -->
<script>
const links = document.querySelectorAll('.category-link');
const previews = document.querySelectorAll('.products-preview');
const defaultBox = document.querySelector('#default-products');

function showPreview(targetId) {
  previews.forEach(box => {
    box.classList.add('d-none');
    box.classList.remove('active');
  });

  const target = document.querySelector(targetId);
  if (target) {
    target.classList.remove('d-none');
    setTimeout(() => {
      target.classList.add('active');
    }, 50);
  }
}

// पहले default products दिखाओ
document.addEventListener("DOMContentLoaded", () => {
  defaultBox.classList.add('active');
});

// अब mouseover की जगह click या mouseenter use करें
links.forEach(item => {
  item.addEventListener('mouseenter', function() {
    showPreview(this.getAttribute('data-target'));
  });
});
</script>





<!-- ========== Top Selling Brands ========== -->
<section class="brands-showcase py-5 bg-light">
  <div class="container text-center">
    <h2 class="mb-4 red-heading">Top Selling Brands</h2>

<style>
.red-heading {
  color: #e60000;  /* Bright Red */
  font-weight: 700;
}
</style>

    <p class="mb-5">Choose from India’s most trusted steel brands available with Apna Steel</p>

    <div class="row justify-content-center">
      <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
        <a href="tmtbar.php">
          <img src="tata_stel.png" alt="Tata" class="img-fluid">
          <small>Tata</small>
        </a>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
        <a href="brands/jsw">
          <img src="jindal.png" alt="JSW" class="img-fluid">
          <small>JSW</small>
        </a>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
        <a href="brands/vizag">
          <img src="vizag.jpg" alt="Vizag" class="img-fluid">
          <small>Vizag</small>
        </a>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
        <a href="brands/apollo">
          <img src="apollo.png" alt="Apollo" class="img-fluid">
          <small>Apollo</small>
        </a>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
        <a href="brands/shrishti">
          <img src="shrishti.jpg" alt="Shrishti" class="img-fluid">
          <small>Shrishti</small>
        </a>
      </div>
    </div>
  </div>
</section>
 

 <style>
  /* Brand logos container */
.brands-showcase .col-lg-2 {
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}

/* Brand logos image styling */
.brands-showcase img {
  width: 150px;
  height: 150px;
  object-fit: contain;
  border: 2px solid transparent;
  border-radius: 10px;
  padding: 10px;
  background: #fff;
  transition: transform 0.4s ease, 
              box-shadow 0.4s ease, 
              border-color 0.3s ease, 
              background 0.3s ease;
}

/* Hover effect */
.brands-showcase img:hover {
  transform: scale(1.15) rotate(2deg);   /* zoom + tilt */
  box-shadow: 0 6px 18px rgba(0,0,0,0.25);
  border-color: red;
  background: rgba(255,0,0,0.08);
}

/* Small name text (अगर add करना चाहो) */
.brands-showcase small {
  display: block;
  margin-top: 8px;
  font-weight: 600;
  transition: color 0.3s ease;
}
.brands-showcase a:hover small {
  color: red;
}

 </style>

<!-- ========== Footer Contact ========== -->

									
												Partners					</span>
				<h2 class="title rs-split-text-disable ">Partners who trust Industrie</h2>
			</div>
					</div>
				</div>
				</div>
		
				<div class="elementor-element elementor-element-462b78f elementor-widget elementor-widget-rs-logo" data-id="462b78f" data-element_type="widget" data-widget_type="rs-logo.default">
				<div class="elementor-widget-container">
					
        <div class="rs-logo-grid logo-grid-style1  rsl_logo_style1">
    <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6 logo-grid-item   ">
                <div class="rs-grid-figure">
                    <div class="logo-img">
                                                    <a>
                                                                <img decoding="async" class="rs-grid-img " src="wp-content/uploads/2024/02/ptnr-metal-i1.png" title="" alt="">
                            </a>
                        
                    </div>
                </div>
            </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6 logo-grid-item   ">
                <div class="rs-grid-figure">
                    <div class="logo-img">
                                                    <a>
                                                                <img decoding="async" class="rs-grid-img " src="wp-content/uploads/2024/02/ptnr-metal-i2.png" title="" alt="">
                            </a>
                        
                    </div>
                </div>
            </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6 logo-grid-item  pre-last ">
                <div class="rs-grid-figure">
                    <div class="logo-img">
                                                    <a>
                                                                <img decoding="async" class="rs-grid-img " src="wp-content/uploads/2024/02/ptnr-metal-i3.png" title="" alt="">
                            </a>
                        
                    </div>
                </div>
            </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6 logo-grid-item   pre-last-row">
                <div class="rs-grid-figure">
                    <div class="logo-img">
                                                    <a>
                                                                <img decoding="async" class="rs-grid-img " src="wp-content/uploads/2024/02/ptnr-metal-i4.png" title="" alt="">
                            </a>
                        
                    </div>
                </div>
            </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6 logo-grid-item   pre-last-row">
                <div class="rs-grid-figure">
                    <div class="logo-img">
                                                    <a>
                                                                <img decoding="async" class="rs-grid-img " src="wp-content/uploads/2024/02/ptnr-metal-i5.png" title="" alt="">
                            </a>
                        
                    </div>
                </div>
            </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6 logo-grid-item  pre-last pre-last-row">
                <div class="rs-grid-figure">
                    <div class="logo-img">
                                                    <a>
                                                                <img decoding="async" class="rs-grid-img " src="wp-content/uploads/2024/02/ptnr-metal-i6.png" title="" alt="">
                            </a>
                        
                    </div>
                </div>
            </div>
            </div>
</div>				</div>
				</div>
					</div>
				</div>
				</div>
				<?php include 'footer.php'; ?>