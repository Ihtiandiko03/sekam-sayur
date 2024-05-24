<?php
    $total_quantity = 0;
    $total_price = 0;
?>

<!-- MOBILE NAV -->
<div class="mb-nav">
    <div class="mb-move-item"></div>
    <div class="mb-nav-item {{ ($active === "Home") ? 'active' : '' }}">
        <a href="#home">
            <i class="bx bxs-home"></i>
        </a>
    </div>
    <div class="mb-nav-item">
        <a href="#about">
            <i class='bx bxs-wink-smile'></i>
        </a>
    </div>
    <div class="mb-nav-item">
        <a href="#food-menu-section">
            <i class='bx bxs-food-menu'></i>
        </a>
    </div>
    <div class="mb-nav-item">
        <a href="#testimonial">
            <i class='bx bxs-comment-detail'></i>
        </a>
    </div>
</div>
<!-- END MOBILE NAV -->
<!-- BACK TO TOP BTN -->
<a href="#home" class="back-to-top">
    <i class="bx bxs-to-top"></i>
</a>
<!-- END BACK TO TOP BTN -->


{{-- CEKOUT --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Keranjang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <a id="btnEmpty" href="/katalog/checkout?action=empty" class="text-danger"><b>Kosongkan Keranjang</b></a>
          <?php 
              $session = session('cart_item');
              // var_dump($session);
          ?>
          @if (isset($session))
              <?php
                  $total_quantity = 0;
                  $total_price = 0;
              ?>
              <table class="tbl-cart mt-3" cellpadding="10" cellspacing="1" style="font-size: 10pt;">
              <tbody>
              <tr>
              <th>Produk</th>
              <th style="text-align:right;" width="5%">Quantity</th>
              <th style="text-align:right;" width="10%">Unit Price</th>
              <th style="text-align:center;" width="10%">Price</th>
              <th style="text-align:center;" width="5%">Remove</th>
              </tr>
              @foreach ($session as $item)
                  <?php $item_price = $item["quantity"]*$item["harga"]; ?>
                  <tr>
                      <td><img src="{{ asset('storage/product' . '/' . $item['gambar']) }}" width="50" class="cart-item-image" style="margin-bottom: 20px; margin-right: 20px;"/><?php echo $item["nama_produk"]; ?></td>
                      <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                      <td  style="text-align:right;"><?php echo "Rp ".$item["harga"]; ?></td>
                      <td  style="text-align:right;"><?php echo "Rp ". number_format($item_price,2); ?></td>
                      <td style="text-align:center;"><a href="/katalog/checkout?action=remove&code={{ $item['id'] }}" class="btnRemoveAction text-danger">Hapus</a></td>
                  </tr>
                  <?php
                      $total_quantity += $item["quantity"];
                      $total_price += ($item["harga"]*$item["quantity"]);
                  ?>
              @endforeach
  
              <tr>
              <td colspan="1" align="right">Total:</td>
              <td align="right"><?php echo $total_quantity; ?></td>
              <td align="right" colspan="2"><strong><?php echo "Rp ".number_format($total_price, 2); ?></strong></td>
              <td></td>
              </tr>
              </tbody>
              </table>
          @else
              <div class="no-records">Your Cart is Empty</div>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <a href="/katalog/isiform" class="btn btn-success">Checkout</a>
          {{-- <button type="button" class="btn btn-primary">Checkout</button> --}}
        </div>
      </div>
    </div>
  </div>



<!-- TOP NAVIGATION -->
<div class="nav">
    <div class="menu-wrap">
        <a href="#home">
            <div class="logo">
                Metro Sayur
            </div>
        </a>
        <div class="menu h-xs">
            <a href="/">
                <div class="menu-item {{ ($active === "Home") ? 'active' : '' }}">
                    Home
                </div>
            </a>
            <a href="/katalog">
                <div class="menu-item {{ ($active === "Katalog") ? 'active' : '' }}">
                    Katalog
                </div>
            </a>
            {{-- <a href="#about">
                <div class="menu-item">
                    About
                </div>
            </a> --}}
            <a href="#food-menu-section">
                <div class="menu-item">
                    Menu
                </div>
            </a>
            {{-- <a href="#testimonial">
                <div class="menu-item">
                    Testimonials
                </div>
            </a> --}}
            @if (auth()->user())
            <div class="menu-item">
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    {{-- <a href="{{ route('logout') }}"
                        class="nav-link text-secondary font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Logout</span>
                    </a> --}}
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
            </div>

            @else
            <a href="/login">
                <div class="menu-item {{ ($active === "Login") ? 'active' : '' }}">
                    Login
                </div>
            </a>
            @endif

            
        </div>
        {{-- <div class="right-menu">
            <div class="cart-btn">
                <i class='bx bx-cart-alt'></i>
            </div>
        </div> --}}
        <div class="right-menu">
            <div class="cart-btn">
                <button type="button" style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bx bx-cart-alt" value=<?=  $total_quantity; ?> ></i>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END TOP NAVIGATION -->