<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Gowes</title>";
echo "<meta charset='utf-8'>";
echo "<link rel='icon' href='".base_url('assets/img/brand/sepeda_update1.png')."' type='image/png'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>";
echo "<link rel='stylesheet' href='".base_url('assets/vendor/nucleo/css/nucleo.css')."' type='text/css'>";
echo "<link rel='stylesheet' href='".base_url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')."' type='text/css'>";
echo "<link href='".base_url('assets/bootstrap-3.3.7-dist/css/argon.css?v=1.2.0')."' rel='stylesheet'>";
echo "<script src='".base_url('assets/vendor/jquery/dist/jquery.min.js')."'></script>";
echo "<script src='".base_url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')."'></script>";
echo "<script src='".base_url('assets/vendor/js-cookie/js.cookie.js')."'></script>";
echo "<script src='".base_url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')."'></script>";
echo "<script src='".base_url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')."'></script>";
echo "<script src='".base_url('assets/js/argon.js?v=1.2.0')."'></script>";
echo "<script>
        $( document ).ready(function() {
          $('#content-transaksi').hide();
          $('#test').hide();
          $('#nav-menu-active-dashboard').css('background-color', 'grey');
            ajax_request = $.ajax({ url: '".site_url('Home/getDataUser')."',
              type: 'get',
              async: 'true',
              dataType: 'json',
              success: function (data) {
                var path = '".site_url('Home/form_data/')."';
                $.each(data, function(key, value) {
                  $('#tbl_data_user').append(
                    '<tr>' +
                      '<td>' + value['name'] + '</td>' +
                      '<td>' + value['alamat'] + '</td>' +
                      '<td>' + value['kota'] + '</td>' +
                      '<td>' + value['phone'] + '</td>'+
                      '<td>' +
                          '<a href= ' + path + value['name']+'>Edit</a>'+
                      '</td>'+
                     '</tr>');
                });
              },
              error: function (data, error) {
                request = false;
                alert('Load data failed, ' + error);
              }
         });
        });

        function testDataProduk() {
              var request = false;
              ajax_request = $.ajax({ url: '".site_url('Home/getDataProduct')."',
                type: 'get',
                async: 'true',
                dataType: 'json',
                success: function (data) {
                  request = true;
                  $('#tbl_data_produk tr').remove();
                  $.each(data, function(key, value) {
                    $('#tbl_data_produk').append(
                      '<tr>' +
                        '<td>' +
                            '<input name=sport type=checkbox  value= ' + value['idMaster'] + '></input>'+
                        '</td>'+
                        '<td>' + value['namaMaster'] + '</td>' +
                        '<td>' + value['harga'] + '</td>' +
                        '<td>' + value['qty'] + '</td>' +
                        '<td>'+ '<input name=textQty type=number min=10 max=100>'+ '</input>'+'</td>' +
                       '</tr>')
                  });
              },
                error: function (data, error) {
                alert('Load data failed, ' + error);
              }
            });
        }
        function ambilData() {
          // var inputChecked = $( 'input:checked' ).val();
          // alert(inputChecked);
          var favorite = [];
          $.each($('input[name=sport]:checked'), function(){
              favorite.push($(this).val());
          });
          localStorage.setItem('myCat', favorite);
        }

        function menuContent(param) {
          if(param === 1) {
            $('#content-user').show();
            $('#cardDasboard').show();
            $('#test').hide();
            // $('#content-transaksi').hide();
            $('#nav-menu-active-icons').css('background-color', 'white');
            $('#nav-menu-active-dashboard').css('background-color', 'grey');
          } else if (param === 2) {
            $('#cardDasboard').hide();
            $('#test').show();
            $('#nav-menu-active-dashboard').css('background-color', 'white');
            $('#nav-menu-active-icons').css('background-color', 'grey');
            // $('#cardDasboard').show();
            // $('#content-transaksi').show();
          }
        }
    </script>";
echo "</head>";
echo "<body class='g-sidenav-show g-sidenav-pinned'>";
echo "<nav class='sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white' id='sidenav-main'>";
echo "<div class='scroll-wrapper scrollbar-inner' style='position: relative;'>
            <div class='sidenav-header  align-items-center'>
              <a class='navbar-brand' href='javascript:void(0)'>
                    <img src='".base_url('assets/img/brand/blue.png')."' class='navbar-brand-img' alt='...'>
               </a>
            </div>
        <div class='navbar-inner'>
           <div class='collapse navbar-collapse' id='sidenav-collapse-main'>
                <ul class='navbar-nav'>
                   <li class='nav-item'>
                      <a class='nav-link' id='nav-menu-active-dashboard' href='javascript:void(0)' onclick='menuContent(1)'>
                            <i class='ni ni-single-02 text-yellow'></i>
                            <span class='nav-link-text'>User</span>
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' id='nav-menu-active-icons' href='javascript:void(0)' onclick='menuContent(2)'>
                          <i class='ni ni-bullet-list-67 text-default'></i>
                          <span class='nav-link-text'>Transaksi</span>
                        </a>
                    </li>
                    <li class='nav-item'>
                            <a class='nav-link'>
                            <i class='ni ni-pin-3 text-primary'></i>
                            <span class='nav-link-text'>Hadiah</span>
                        </a>
                    </li>
                </ul>
           </div>
        </div>
     </div>";
echo "</nav>";
echo "<div class='main-content'>
         <nav class='navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom'>
              <div class='container-fluid'>
                  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav align-items-center  ml-md-auto'>
                    <li class='nav-item d-xl-none'>
                      <!-- Sidenav toggler -->
                      <div class='pr-3 sidenav-toggler sidenav-toggler-dark' data-action='sidenav-pin' data-target='#sidenav-main'>
                        <div class='sidenav-toggler-inner'>
                          <i class='sidenav-toggler-line'></i>
                          <i class='sidenav-toggler-line'></i>
                          <i class='sidenav-toggler-line'></i>
                        </div>
                      </div>
                    </li>
                    <li class='nav-item d-sm-none'>
                      <a class='nav-link' href='#' data-action='search-show' data-target='#navbar-search-main'>
                        <i class='ni ni-zoom-split-in'></i>
                      </a>
                    </li>
                    <li class='nav-item dropdown'>
                      <a class='nav-link' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='ni ni-bell-55'></i>
                      </a>
                      <div class='dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden'>
                        <!-- Dropdown header -->
                        <div class='px-3 py-3'>
                          <h6 class='text-sm text-muted m-0'>You have <strong class='text-primary'>13</strong> notifications.</h6>
                        </div>
                        <!-- List group -->
                        <div class='list-group list-group-flush'>
                          <a href='#!' class='list-group-item list-group-item-action'>
                            <div class='row align-items-center'>
                              <div class='col-auto'>
                                <!-- Avatar -->
                                <img alt='Image placeholder' src='".base_url('assets/img/theme/team-1.jpg')."' class='avatar rounded-circle'>
                              </div>
                              <div class='col ml--2'>
                                <div class='d-flex justify-content-between align-items-center'>
                                  <div>
                                    <h4 class='mb-0 text-sm'>John Snow</h4>
                                  </div>
                                  <div class='text-right text-muted'>
                                    <small>2 hrs ago</small>
                                  </div>
                                </div>
                                <p class='text-sm mb-0'>Let's meet at Starbucks at 11:30. Wdyt?</p>
                              </div>
                            </div>
                          </a>
                          <a href='#!' class='list-group-item list-group-item-action'>
                            <div class='row align-items-center'>
                              <div class='col-auto'>
                                <!-- Avatar -->
                                <img alt='Image placeholder' src='".base_url('assets/img/theme/team-2.jpg')."' class='avatar rounded-circle'>
                              </div>
                              <div class='col ml--2'>
                                <div class='d-flex justify-content-between align-items-center'>
                                  <div>
                                    <h4 class='mb-0 text-sm'>John Snow</h4>
                                  </div>
                                  <div class='text-right text-muted'>
                                    <small>3 hrs ago</small>
                                  </div>
                                </div>
                                <p class='text-sm mb-0'>A new issue has been reported for Argon.</p>
                              </div>
                            </div>
                          </a>
                          <a href='#!' class='list-group-item list-group-item-action'>
                            <div class='row align-items-center'>
                              <div class='col-auto'>
                                <!-- Avatar -->
                                <img alt='Image placeholder' src='".base_url('assets/img/theme/team-3.jpg')."' class='avatar rounded-circle'>
                              </div>
                              <div class='col ml--2'>
                                <div class='d-flex justify-content-between align-items-center'>
                                  <div>
                                    <h4 class='mb-0 text-sm'>John Snow</h4>
                                  </div>
                                  <div class='text-right text-muted'>
                                    <small>5 hrs ago</small>
                                  </div>
                                </div>
                                <p class='text-sm mb-0'>Your posts have been liked a lot.</p>
                              </div>
                            </div>
                          </a>
                          <a href='#!' class='list-group-item list-group-item-action'>
                            <div class='row align-items-center'>
                              <div class='col-auto'>
                                <!-- Avatar -->
                                <img alt='Image placeholder' src='".base_url('assets/img/theme/team-4.jpg')."' class='avatar rounded-circle'>
                              </div>
                              <div class='col ml--2'>
                                <div class='d-flex justify-content-between align-items-center'>
                                  <div>
                                    <h4 class='mb-0 text-sm'>John Snow</h4>
                                  </div>
                                  <div class='text-right text-muted'>
                                    <small>2 hrs ago</small>
                                  </div>
                                </div>
                                <p class='text-sm mb-0'>Let's meet at Starbucks at 11:30. Wdyt?</p>
                              </div>
                            </div>
                          </a>
                          <a href='#!' class='list-group-item list-group-item-action'>
                            <div class='row align-items-center'>
                              <div class='col-auto'>
                                <!-- Avatar -->
                                <img alt='Image placeholder' src='".base_url('assets/img/theme/team-5.jpg')."' class='avatar rounded-circle'>
                              </div>
                              <div class='col ml--2'>
                                <div class='d-flex justify-content-between align-items-center'>
                                  <div>
                                    <h4 class='mb-0 text-sm'>John Snow</h4>
                                  </div>
                                  <div class='text-right text-muted'>
                                    <small>3 hrs ago</small>
                                  </div>
                                </div>
                                <p class='text-sm mb-0'>A new issue has been reported for Argon.</p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <!-- View all -->
                        <a href='#!' class='dropdown-item text-center text-primary font-weight-bold py-3'>View all</a>
                      </div>
                    </li>
                    <li class='nav-item dropdown'>
                      <a class='nav-link' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='ni ni-ungroup'></i>
                      </a>
                      <div class='dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right'>
                        <div class='row shortcuts px-4'>
                          <a href='#!' class='col-4 shortcut-item'>
                            <span class='shortcut-media avatar rounded-circle bg-gradient-red'>
                              <i class='ni ni-calendar-grid-58'></i>
                            </span>
                            <small>Calendar</small>
                          </a>
                          <a href='#!' class='col-4 shortcut-item'>
                            <span class='shortcut-media avatar rounded-circle bg-gradient-orange'>
                              <i class='ni ni-email-83'></i>
                            </span>
                            <small>Email</small>
                          </a>
                          <a href='#!' class='col-4 shortcut-item'>
                            <span class='shortcut-media avatar rounded-circle bg-gradient-info'>
                              <i class='ni ni-credit-card'></i>
                            </span>
                            <small>Payments</small>
                          </a>
                          <a href='#!' class='col-4 shortcut-item'>
                            <span class='shortcut-media avatar rounded-circle bg-gradient-green'>
                              <i class='ni ni-books'></i>
                            </span>
                            <small>Reports</small>
                          </a>
                          <a href='#!' class='col-4 shortcut-item'>
                            <span class='shortcut-media avatar rounded-circle bg-gradient-purple'>
                              <i class='ni ni-pin-3'></i>
                            </span>
                            <small>Maps</small>
                          </a>
                          <a href='#!' class='col-4 shortcut-item'>
                            <span class='shortcut-media avatar rounded-circle bg-gradient-yellow'>
                              <i class='ni ni-basket'></i>
                            </span>
                            <small>Shop</small>
                          </a>
                        </div>
                      </div>
                    </li>
                  </ul>
                    <ul class='navbar-nav align-items-center  ml-auto ml-md-0 '>
                      <li class='nav-item dropdown'>
                        <a class='nav-link pr-0' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          <div class='media align-items-center'>
                          <span class='avatar avatar-sm rounded-circle'>
                            <img alt='Image placeholder' src='".base_url('assets/img/theme/team-4.jpg')."'>
                          </span>
                          <div class='media-body  ml-2  d-none d-lg-block'>
                            <span class='mb-0 text-sm  font-weight-bold'>John Snow</span>
                          </div>
                        </div>
                      </a>
                      <div class='dropdown-menu  dropdown-menu-right'>
                        <div class='dropdown-header noti-title'>
                          <h6 class='text-overflow m-0'>Welcome!</h6>
                        </div>
                        <a href='#!' class='dropdown-item'>
                          <i class='ni ni-single-02'></i>
                          <span>My profile</span>
                        </a>
                        <a href='#!' class='dropdown-item'>
                          <i class='ni ni-settings-gear-65'></i>
                          <span>Settings</span>
                        </a>
                        <a href='#!' class='dropdown-item'>
                          <i class='ni ni-calendar-grid-58'></i>
                          <span>Activity</span>
                        </a>
                        <a href='#!' class='dropdown-item'>
                          <i class='ni ni-support-16'></i>
                          <span>Support</span>
                        </a>
                        <div class='dropdown-divider'></div>
                          <a href='#!' class='dropdown-item'>
                            <i class='ni ni-user-run'></i>
                          <span>Logout</span>
                          </a>
                      </div>
                    </li>
                  </ul>
              </div>
            </div>
         </nav>

          <div class='header bg-primary pb-6' id='content'>
              <div class='container-fluid'>
                 <div class='header-body'>
                    <div class='row align-items-center py-4'>
                      <div class='col-lg-6 col-7'>
                          <nav aria-label='breadcrumb' class='d-none d-md-inline-block ml-md-4'>
                            <ol class='breadcrumb breadcrumb-links breadcrumb-dark'>
                              <li class='breadcrumb-item'><a href='#'><i class='fas fa-home'></i></a></li>
                              <li class='breadcrumb-item'><a href='#'>User</a></li>
                           </ol>
                        </nav>
                        <nav aria-label='breadcrumb' class='d-none d-md-inline-block'>
                          <ol class='breadcrumb breadcrumb-links breadcrumb-dark' id='content-transaksi'>
                            <li class='breadcrumb-item'><a href='#'><i class='fas fa-home'></i></a></li>
                            <li class='breadcrumb-item'><a href='#'>Transaksi</a></li>
                        </ol>
                      </nav>
                      </div>
                    </div>
                    </div>
                  </div>
            </div>

                 <div  class='container-fluid mt--6'>
                   <div class='row'>
                        <div class='col'>
                            <div id='cardDasboard' class='card'>
                              <div class='card-header border-0'>
                                <div class='row align-items-center'>
                                  <div class='col'>
                                    <h3 class='mb-0'>Data User</h3>
                                  </div>

                                  <div class='col text-right'>
                                    <a href='".site_url('Home/form_data')."' class='btn btn-sm btn-primary'>Tambah Data</a>
                                  </div>

                                </div>
                              </div>

                                <div class='table-responsive' id='tbl_all_user'>
                                    <table class='table align-items-center table-flush'>
                                        <thead class='thead-light'>
                                          <tr>
                                          <th scope='col'>Full Name</th>
                                          <th scope='col'>Alamat</th>
                                          <th scope='col'>Kota</th>
                                          <th scope='col'>Phone</th>
                                          <th scope='col'>Action</th>
                                          </tr>
                                        </thead>
                                          <tbody id='tbl_data_user'>
                                          </tbody>
                                    </table>
                                </div>


                            </div>


                            <div class='row' id='test'>
                              <div class='col'>
                                  <div class='card'>
                                    <div class='card-header border-0'>
                                        <div class='row align-items-center'>
                                            <div class='col'>
                                              <h3 class='mb-0'>Data Transaksi</h3>
                                            </div>
                                            <div class='col text-right'>
                                              <a type='button' onclick='testDataProduk()' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'>Pesan</a>
                                           </div>
                                        </div>
                                    </div>
                                    <div class='table-responsive'>
                                    <table class='table align-items-center table-flush'>
                                    <col>
                                    <col>
                                    <colgroup span='3'></colgroup>
                                        <thead class='thead-light'>
                                          <tr>
                                          <th scope='col'>No Pesanan</th>
                                          <th scope='col'>Nama Barang</th>
                                          <th colspan='col'>Harga</th>
                                          <th colspan='col'>qty</th>
                                          <th colspan='col'>Action</th>
                                          </tr>

                                        </thead>
                                          <tbody>
                                              <tr>
                                                <th rowspan='3' scope='rowgroup'>C01</th>
                                                <th scope='row'>Kaos Sepeda</th>
                                                <td>Rp.50.000</td>
                                                <td>1</td>
                                                <td>Delete</td>
                                              </tr> 
                                              <tr>
                                                <th scope='row'>Sarung Jog  </th>
                                                <td>Rp.10.000</td>
                                                <td>2</td>
                                                <td>Delete</td>
                                              </tr>
                                              <tr>
                                                <th scope='row'>Topi</th>
                                                <td>Rp.100.000</td>
                                                <td>2</td>
                                                <td>Delete</td>
                                            </tr>
                                          </tbody>
                                          <tbody>
                                          <tr>
                                            <th rowspan='2' scope='rowgroup'>C02</th>
                                            <th scope='row'>Rantai</th>
                                            <td>Rp.20.000</td>
                                            <td>1</td>
                                            <td>Delete</td>
                                          </tr>
                                          <tr>
                                            <th scope='row'>Masker</th>
                                            <td>Rp.10.000</td>
                                            <td>2</td>
                                            <td>Delete</td>
                                          </tr>
                                        </tbody>
                                        <thead class='thead-light'>
                                          <th scope='row'>Total Harga</th>
                                          <td></td>
                                          <td>Rp.50,000</td>
                                          <td></td>
                                          <td>
                                            <div class='col text-right'>
                                              <a href='".site_url('Home/form_data')."' class='btn btn-sm btn-danger'>Bayar</a>
                                            </div>
                                          </td>
                                        </thead>

                                    </table>
                                </div>

                                  </div>


                              </div>
                            </div>
                              

                        </div>

                        
                   </div>
                </div>
              </div> 
          </div>

          <!-- Modal -->
          <div class='modal fade' id='myModal' role='dialog'>
            <div class='modal-dialog'>
            
              <!-- Modal content-->
              <div class='modal-content'>
                <div class='modal-header'>
                  <h4 class='modal-title'>Data Produk</h4>
                </div>
                <div class='modal-body'>
                  <div class='table-responsive'>
                        <table class='table align-items-center table-flush'>
                          <thead class='thead-light'>
                          <tr>
                            <th scope='col'></th>
                            <th scope='col'>Nama Barang</th>
                            <th scope='col'>Harga</th>
                            <th scope='col'>Stok</th>
                            <th scope='col'>Qty</th>
                          </tr>
                          </thead>
                          <tbody id='tbl_data_produk'>
                          </tbody>
                            <thead class='thead-light'>
                              <td></td>
                              <td></td>
                              <td></td>
                              <th scope='row'>
                                <div>
                                  <button onclick='ambilData()' class='btn btn-sm btn-danger'>Ambil</button>
                                </div>
                              </th>
                          </thead>
                        </table>
                  </div>
                </div>
                <div class='modal-footer'>
                  <button type='button' onclick='testDataProduk()' class='btn btn-default' data-dismiss='modal'>Close</button>
                </div>
              </div>
              
            </div>
          </div>
          <!-- Modal -->
      </div>";
echo "</body>";
echo "</html>";
?>