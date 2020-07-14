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
        var request = false;
        var textName,textAlamat,textKota,textEmail,textPhone;
        $( document ).ready(function() {
          var url = window.location.pathname;
          var paramName = url.substring(url.lastIndexOf('/')+1);
          if (paramName === 'form_data') {
            $('#deleteData').hide();
          } else {
            $('#deleteData').show();
          }
            ajax_request = $.ajax({url: '".site_url('Home/getEditDataUser')."',
              data: {'paramName' : paramName},
              type: 'post',
              async: 'true',
              dataType: 'json',
              success: function (data) {
                $.each(data, function(key, value) {
                  $('#textName').val(value['name']);
                  $('#textAlamat').val(value['alamat']);
                  $('#textKota').val(value['kota']);
                  $('#textEmail').val(value['email']);
                  $('#textPhone').val(value['phone']);
                });
              },
              error: function (data, error) {
                request = false;
                alert('Load data failed....' + error);
              }
           });
        });
        $(function(){
           $('#submitData').on('click',function(){
              request = true;
              var path = '';
              var url = window.location.pathname;
              var paramName = url.substring(url.lastIndexOf('/')+1);
              textName = $('#textName').val();
              textAlamat = $('#textAlamat').val();
              textKota = $('#textKota').val();
              textEmail = $('#textEmail').val();
              textPhone = $('#textPhone').val();


              if (paramName === 'form_data') {
                path = '".site_url('Home/insertData')."';
                $('#textName').hide();
              } else {
                path = '".site_url('Home/submitDataEditUser')."';
              }
              
              ajax_request = $.ajax({url: path,
                  data: {'paramName' : paramName, 'textName' : textName, 'textAlamat' : textAlamat, 'textKota': textKota, 'textEmail': textEmail , 'textPhone' : textPhone},
                  type: 'post',
				          async: 'true',
                  dataType: 'json',
                  success: function (data) {
                    window.location.href = '".site_url('/')."';
                  },
                  error: function (data, error) {
                    request = false;
                    alert('Load data failed....' + error);
                  }
              });
           });
           $('#deleteData').on('click',function(){
              var url = window.location.pathname;
              var paramName = url.substring(url.lastIndexOf('/')+1);

              ajax_request = $.ajax({url: '".site_url('Home/deleteDataUser')."',
                data: {'paramName' : paramName},
                type: 'post',
                async: 'true',
                dataType: 'json',
                success: function (data) {
                  window.location.href = '".site_url('/')."';
                },
                error: function (data, error) {
                  request = false;
                  alert('Load data failed....' + error);
                }
            });
          }); 
        });
      </script>";
echo "</head>";
echo "<body class='g-sidenav-show g-sidenav-pinned'>";
echo "<div class='main-content'>
          <div class='container mt--8 pb-5'>
              <div class='row justify-content-center'>
                <div class='col-lg-6 col-md-8' style='margin-top: 17%'>
                    <div class='card bg-secondary border-0'>
                      <div class='card-header bg-transparent'>
                        <div class='text-muted text-center mt-2 mb-4'>
                                  <small>Form User</small>
                        </div>
                        <div style='float: right'>
                          <small><a href='".site_url('Home')."'>Back</a></small>
                        </div>
                      </div>
                      <div class='card-body px-lg-5 py-lg-5'>
                          <form>
                            <div class='form-group'>
                              <div class='input-group input-group-merge input-group-alternative mb-3'>
                                  <div class='input-group-prepend'>
                                    <span class='input-group-text'><i class='ni ni-circle-08'></i></span>
                                  </div>
                                <input class='form-control' name='textName' id ='textName' placeholder='Name' type='text'>
                              </div>
                            </div>
                            <div class='form-group'>
                              <div class='input-group input-group-merge input-group-alternative mb-3'>
                                <div class='input-group-prepend'>
                                  <span class='input-group-text'><i class='ni ni-collection'></i></span>
                                </div>
                                <input class='form-control' name='textAlamat' id ='textAlamat' placeholder='Alamat' type='text'>
                              </div>
                           </div>
                           <div class='form-group'>
                              <div class='input-group input-group-merge input-group-alternative mb-3'>
                                <div class='input-group-prepend'>
                                  <span class='input-group-text'><i class='ni ni-pin-3'></i></span>
                                </div>
                                <input class='form-control' name='textKota' id ='textKota' placeholder='Kota' type='text'>
                              </div>
                           </div>
                           <div class='form-group'>
                              <div class='input-group input-group-merge input-group-alternative mb-3'>
                                <div class='input-group-prepend'>
                                  <span class='input-group-text'><i class='ni ni-email-83'></i></span>
                                </div>
                                <input class='form-control' name='textEmail' id ='textEmail' placeholder='Email' type='text'>
                              </div>
                           </div>
                            <div class='form-group'>
                                <div class='input-group input-group-merge input-group-alternative mb-3'>
                                  <div class='input-group-prepend'>
                                    <span class='input-group-text'><i class='ni ni-tablet-button'></i></span>
                                  </div>
                                  <input class='form-control' name='textPhone' id ='textPhone' placeholder='Phone' type='text'>
                                </div>
                            </div>
                            <div class='text-center'>
                                <button type='button' id='submitData'class='btn btn-primary mt-4'>Submit</button>
                                <button type='button' id='deleteData'class='btn btn-danger mt-4'>Delete</button>
                            </div>
                          </form>
                      </div>
                    </div>
                </div>
              </div>
          </div>
      </div>";
echo "</body>";
?>