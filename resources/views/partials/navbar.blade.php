<?php
    $total_quantity = 0;
    $total_price = 0;
?>

<!-- MOBILE NAV -->
<style>
    .mb-nav-item {
        background-color: transparent; /* Warna background default */
    }
    
    .mb-nav-item.active {
        background-color: green; /* Warna background hijau saat aktif */
    }
    </style>
<div class="mb-nav">
    <div class="mb-nav-item {{ ($active === "Home") ? 'active' : '' }}">
        <a href="/">
            <i class="bx bxs-home"></i>
        </a>
    </div>
    <div class="mb-nav-item {{ ($active === "Katalog") ? 'active' : '' }}">
        <a href="/katalog">
            <i class='bx bxs-cart'></i>
        </a>
    </div>
    

    @auth
    <div class="mb-nav-item {{ ($active === "Riwayat") ? 'active' : '' }}">
        <a href="/riwayat">
            <i class='bx bxs-time'></i>  
        </a>
    </div>
    <div class="mb-nav-item {{ ($active === "Logout") ? 'active' : '' }}">
        <a href="/logout">
            <i class='bx bxs-log-out'></i>
        </a>
    </div>
    @else
        <div class="mb-nav-item {{ ($active === "Login") ? 'active' : '' }}">
            <a href="/login">
                <i class='bx bxs-log-in'></i>
            </a>
        </div>
    @endauth
        
    
    
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
            @if (auth()->user())
            <a href="/riwayat">
                <div class="menu-item {{ ($active === "Riwayat") ? 'active' : '' }}">
                    Riwayat
                </div>
            </a>
            <a href="/dashboard">
                <div class="menu-item {{ ($active === "Riwayat") ? 'active' : '' }}">
                    Helpdesk
                </div>
            </a>
            @endif
            {{-- <a href="#about">
                <div class="menu-item">
                    About
                </div>
            </a> --}}
            {{-- <a href="#food-menu-section">
                <div class="menu-item">
                    Menu
                </div>
            </a> --}}
            {{-- <a href="#testimonial">
                <div class="menu-item">
                    Testimonials
                </div>
            </a> --}}
            @if (auth()->user())
                <a href="/logout">
                    <div class="menu-item {{ ($active === "Logout") ? 'active' : '' }}">
                        Logout
                    </div>
                </a>
                

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