  <? include "includes/db.php";
    ?>

  <div id="sidebar" class="span3">
      <div class="well well-small"><a id="myCart" href="product_summary.php">
              <img src="themes/images/ico-cart.png" alt="cart"><?php items(); ?>
              Items in your cart <span style="float:none;" class="badge badge-warning pull-right">Rs.
                  <?php total_price() ?></span></a></div>
      <ul id="sideManu" class="nav nav-tabs nav-stacked">
          <li class="subMenu open"><a> Categories</a>



              <ul>
                  <!-- display db categories in looped -->


                  <!-- sql-query -->
                  <?php get_cat() ?>
                  <!-- <li><a href="products.html"><i class="icon-chevron-right"></i>Computers, Tablets & laptop (30)</a></li> -->

              </ul>
          </li>
          <li class="subMenu"><a> Brands </a>
              <ul style="display:none">



                  <?php

                    getbrand();


                    ?>
                  <!-- <li><a href="products.html"><i class="icon-chevron-right"></i>Women's Clothing (45)</a></li> -->

              </ul>
          </li>
          <!-- <li class="subMenu"><a>FOOD AND BEVERAGES [1000]</a>
              <ul style="display:none">
                  <li><a href="products.html"><i class="icon-chevron-right"></i>Angoves (35)</a></li>
                  <li><a href="products.html"><i class="icon-chevron-right"></i>Bouchard Aine & Fils (8)</a></li>
                  <li><a href="products.html"><i class="icon-chevron-right"></i>French Rabbit (5)</a></li>
                  <li><a href="products.html"><i class="icon-chevron-right"></i>Louis Bernard (45)</a></li>
                  <li><a href="products.html"><i class="icon-chevron-right"></i>BIB Wine (Bag in Box) (8)</a></li>
                  <li><a href="products.html"><i class="icon-chevron-right"></i>Other Liquors & Wine (5)</a></li>
                  <li><a href="products.html"><i class="icon-chevron-right"></i>Garden (3)</a></li>
                  <li><a href="products.html"><i class="icon-chevron-right"></i>Khao Shong (11)</a></li>
              </ul>
          </li>
          <li><a href="products.html">HEALTH & BEAUTY [18]</a></li>
          <li><a href="products.html">SPORTS & LEISURE [58]</a></li>
          <li><a href="products.html">BOOKS & ENTERTAINMENTS [14]</a></li>
      </ul> -->
          <br />
          <br />
          <div class="thumbnail">
              <img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
              <div class="caption">
                  <h5>Payment Methods</h5>
              </div>
          </div>
  </div>
  <!-- Sidebar end=============================================== -->