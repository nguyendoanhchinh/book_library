
<?php

	if(!isset($_SESSION['k_email']) && !isset($_SESSION['k_avatar'])){
		header('location:login.php');
	}
	include "database/connect.php";
	
?>
<header id="tg-header" class="tg-header tg-haslayout">
            <div class="tg-topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="tg-userlogin">
                                <figure>
                                    <a href="index.php"><img src="images/image/avatar/<?php echo $_SESSION['k_avatar'] ?>" alt="image description"></a>
                                </figure>
                                <span><a href="logout.php">Đăng xuất</a></span>
                                <span><?php echo ( $_SESSION['k_email']) ?></span>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-middlecontainer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <strong class="tg-logo"><a href="index.php"><img src="images/logo.png" alt="company name here"></a></strong>
                            <div class="tg-wishlistandcart">
                                <div class="dropdown tg-themedropdown tg-wishlistdropdown">
                                    <a href="#" id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="tg-themebadge">3</span>
                                        <i class="icon-heart"></i>
                                        <span>Wishlist</span>
                                    </a>
                                    <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
                                        <div class="tg-description">
                                            <p>No products were added to the wishlist!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown tg-themedropdown tg-minicartdropdown">
                                    <a href="#" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="tg-themebadge">3</span>
                                        <i class="icon-cart"></i>
                                        <span>$123.00</span>
                                    </a>
                                    <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                                        <div class="tg-minicartbody">
                                            <div class="tg-minicarproduct">
                                                <figure>
                                                    <img src="images/products/img-01.jpg" alt="image description">

                                                </figure>
                                                <div class="tg-minicarproductdata">
                                                    <h5><a href="#">Our State Fair Is A Great Function</a></h5>
                                                    <h6><a href="#">$ 12.15</a></h6>
                                                </div>
                                            </div>
                                            <div class="tg-minicarproduct">
                                                <figure>
                                                    <img src="images/products/img-02.jpg" alt="image description">

                                                </figure>
                                                <div class="tg-minicarproductdata">
                                                    <h5><a href="#">Bring Me To Light</a></h5>
                                                    <h6><a href="#">$ 12.15</a></h6>
                                                </div>
                                            </div>
                                            <div class="tg-minicarproduct">
                                                <figure>
                                                    <img src="images/products/img-03.jpg" alt="image description">

                                                </figure>
                                                <div class="tg-minicarproductdata">
                                                    <h5><a href="#">Have Faith In Your Soul</a></h5>
                                                    <h6><a href="#">$ 12.15</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tg-minicartfoot">
                                            <a class="tg-btnemptycart" href="#">
                                                <i class="fa fa-trash-o"></i>
                                                <span>Clear Your Cart</span>
                                            </a>
                                            <span class="tg-subtotal">Subtotal: <strong>35.78</strong></span>
                                            <div class="tg-btns">
                                                <a class="tg-btn tg-active" href="#">View Cart</a>
                                                <a class="tg-btn" href="#">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tg-searchbox">
                                <form class="tg-formtheme tg-formsearch">
                                    <fieldset>
                                        <input type="text" name="search" class="typeahead form-control" placeholder="Search by title, author, keyword, ISBN...">
                                        <button type="submit"><i class="icon-magnifier"></i></button>
                                    </fieldset>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-navigationarea">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <nav id="tg-nav" class="tg-nav">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                                </div>
                                <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                                    <ul>
                                        
                                        <li class="menu-item-has-children current-menu-item">
                                            <a href="index.php">Home</a>
                                            
                                        </li>
                                        <li class="menu-item-has-children">
                                                    <a href="aboutus.php">Products</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="products.php">Products</a></li>
                                                        <li><a href="productdetail.php">Product Detail</a></li>
                                                    </ul>
                                                </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Authors</a>
                                            <ul class="sub-menu">
                                                <li><a href="authors.php">Authors</a></li>
                                                <li><a href="authordetail.php">Author Detail</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="products.php">Best Selling</a></li>
                                        <li><a href="products.php">Weekly Sale</a></li>
                                        
                                        <li><a href="contactus.php">Contact</a></li>
                                        <li class="menu-item-has-children current-menu-item">
                                            <a href="#"><i class="icon-menu"></i></a>
                                            <ul class="sub-menu">
                                                
                                                <li><a href="aboutus.php">About Us</a></li>
                                                <li><a href="404error.php">404 Error</a></li>
                                              
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>