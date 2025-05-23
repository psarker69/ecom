          <!-- Menu Start -->
          <div class="menu-container flex-grow-1">
            <ul id="menu" class="menu">
              <li>
                <a href="{{ route('admin.dashboard') }}">
                  <i data-cs-icon="shop" class="icon" data-cs-size="18"></i>
                  <span class="label">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="#categories" data-href="{{asset(route('category.index'))}}">
                  <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                  <span class="label">Categories</span>
                </a>
                <ul id="categories">
                  <li>
                    <a href="{{asset(route('category.index'))}}">
                      <span class="label">List</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{asset(route('category.create'))}}">
                      <span class="label">Add New</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
              <li>
                <a href="#products" data-href="{{asset(route('category.index'))}}">
                  <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                  <span class="label">Products</span>
                </a>
                <ul id="products">
                  <li>
                    <a href="{{asset(route('products.index'))}}">
                      <span class="label">List</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{asset(route('products.create'))}}">
                      <span class="label">Add New</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#testimonials" data-href="{{asset(route('testimonial.index'))}}">
                  <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                  <span class="label">Testimonials</span>
                </a>
                <ul id="testimonials">
                  <li>
                    <a href="{{asset(route('testimonial.index'))}}">
                      <span class="label">List</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{asset(route('testimonial.create'))}}">
                      <span class="label">Add New</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#products" data-href="Products.html">
                  <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                  <span class="label">Products</span>
                </a>
                <ul id="products">
                  <li>
                    <a href="Products.List.html">
                      <span class="label">List</span>
                    </a>
                  </li>
                  <li>
                    <a href="Products.Detail.html">
                      <span class="label">Detail</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#orders" data-href="Orders.html">
                  <i data-cs-icon="cart" class="icon" data-cs-size="18"></i>
                  <span class="label">Orders</span>
                </a>
                <ul id="orders">
                  <li>
                    <a href="Orders.List.html">
                      <span class="label">List</span>
                    </a>
                  </li>
                  <li>
                    <a href="Orders.Detail.html">
                      <span class="label">Detail</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#customers" data-href="Customers.html">
                  <i data-cs-icon="user" class="icon" data-cs-size="18"></i>
                  <span class="label">Customers</span>
                </a>
                <ul id="customers">
                  <li>
                    <a href="Customers.List.html">
                      <span class="label">List</span>
                    </a>
                  </li>
                  <li>
                    <a href="Customers.Detail.html">
                      <span class="label">Detail</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#storefront" data-href="Storefront.html">
                  <i data-cs-icon="screen" class="icon" data-cs-size="18"></i>
                  <span class="label">Storefront</span>
                </a>
                <ul id="storefront">
                  <li>
                    <a href="Storefront.Home.html">
                      <span class="label">Home</span>
                    </a>
                  </li>
                  <li>
                    <a href="Storefront.Filters.html">
                      <span class="label">Filters</span>
                    </a>
                  </li>
                  <li>
                    <a href="Storefront.Categories.html">
                      <span class="label">Categories</span>
                    </a>
                  </li>
                  <li>
                    <a href="Storefront.Detail.html">
                      <span class="label">Detail</span>
                    </a>
                  </li>
                  <li>
                    <a href="Storefront.Cart.html">
                      <span class="label">Cart</span>
                    </a>
                  </li>
                  <li>
                    <a href="Storefront.Checkout.html">
                      <span class="label">Checkout</span>
                    </a>
                  </li>
                  <li>
                    <a href="Storefront.Invoice.html">
                      <span class="label">Invoice</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="Shipping.html">
                  <i data-cs-icon="shipping" class="icon" data-cs-size="18"></i>
                  <span class="label">Shipping</span>
                </a>
              </li>
              <li>
                <a href="Discount.html">
                  <i data-cs-icon="tag" class="icon" data-cs-size="18"></i>
                  <span class="label">Discount</span>
                </a>
              </li>
              <li>
                <a href="Settings.html">
                  <i data-cs-icon="gear" class="icon" data-cs-size="18"></i>
                  <span class="label">Settings</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- Menu End -->

          <!-- Mobile Buttons Start -->
          <div class="mobile-buttons-container">
            <!-- Menu Button Start -->
            <a href="#" id="mobileMenuButton" class="menu-button">
              <i data-cs-icon="menu"></i>
            </a>
            <!-- Menu Button End -->
          </div>
          <!-- Mobile Buttons End -->
