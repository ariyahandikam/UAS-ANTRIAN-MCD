<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Data Antrian MCD</title>
</head>

<body>
  
<nav class="navbar "style="background-color:#D53032">
  <div class="container-fluid">
       <a class="navbar-brand">
         <img src="http://localhost/AntrianMCD/img/mcd2.gif" width="100"></a>
    <button class="navbar-toggler text-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start text-light" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel"style="background-color:#fdc210">
    <div class="offcanvas-header">

                 <span class="border-bottom"> 
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="http://localhost/AntrianMCD/img/Nav.png" width="100" data-aos="flip-left" data-aos-duration="2000">
     <p class="text-danger">Selamat datang...</p>
    </h5> </span>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link text-danger" aria-current="page" href="#"><i class="bi bi-house-door-fill"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" aria-current="page" href="#"><i class="bi bi-clipboard-data-fill"></i> Data Antrian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" aria-current="page" href="#"><i class="bi bi-thermometer-snow"></i> Suhu Ac</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="http://localhost/AntrianMCD/view/antrianmcd/index.php"><i class="bi bi-arrow-left-circle-fill"></i> Logout</a>
          </li>

        </ul>

      </div>
    </div>
  </div>
</nav>
  
    <div class="container">
        <div id="message">
        </div>
        <br>
        <br>
        <h1 class="mt-5 mb-4 text-center text-danger">ANTRIAN KONSUMEN GERAI MCD</h1>

        <span id="message"></span>
        <div class="card shadow-lg">
            <div class="card-header" style="background-color: #C31F26;">
                <div class="row">
                    <div class="col col-sm-9"style="color: #FDCE04;">Data Kasir</div>
                    <div class="col col-sm-2">
                        <button type="button" id="generate" class="btn btn-warning btn-sm float-end mx-2">Generate</i></button>
                                            </div>
                   <div class="col col-sm-1">
                        <button type="button" id="add_data" class="btn btn-primary btn-sm float-end">Tambah</button>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="sample_data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kedatangan</th>
                                <th>Selisih Kedatangan</th>
                                <th>Waktu Awal Pelayanan</th>
                                <th>Selisih Pelayanan Kasir</th>
                                <th>Waktu Selesai</th>
                                <th>Selisih Keluar Antrian (menit)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="action_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="sample_form">
                    <div class="modal-header"style="background-color: #FDCE04;" >
                        <h5 class="modal-title" id="dynamic_modal_title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Waktu Kedatangan</label>
                            <input type="time" name="w_datang" id="w_datang" class="form-control" />
                            <span id="waktu_kedatangan_error" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Selisih Kedatangan</label>
                            <input type="text" name="s_kedatangan" id="s_kedatangan" class="form-control" />
                            <span id="s_kedatangan" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Waktu Awal Pelayanan</label>
                            <input type="time" name="awalpelayanan" id="awalpelayanan" class="form-control" />
                            <span id="waktu_awal_pelayanan_error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Selisih Pelayanan Kasir</label>
                            <input type="text" name="s_pelayanankasir" id="s_pelayanankasir" class="form-control" />
                            <span id="selisih_pelayanan_kasir_error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Waktu Selesai</label>
                            <input type="time" name="selesai" id="selesai" class="form-control" />
                            <span id="waktu_selesai_error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Selisih Keluar Antrian</label>
                            <input type="text" name="s_keluarantrian" id="s_keluarantrian" class="form-control" />
                            <span id="selisih_keluar_antrian_error" class="text-danger"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" />
                        <input type="hidden" name="action" id="action" value="Add" />
                        <button type="button" class="btn text-warning" style="background-color: #C31F26;" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="action_button">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="generate_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header"style="background-color: #FDCE04;">
                    <h5 class="modal-title" id="dynamic_modal_title_generate"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
   <p> Terdapat <b id="total"></b> kali pelayanan yang terjadi <b>di Gerai MCD Solo Grand Mall</b>, Kemudian dari hasil pemodelan <b> LOGIKA FUZZY</b> dapat di simpulkan sebagai berikut :</p>

                    <ul>

<li id='kesimpulan_waktu_tunggu'></li>
                        <li id='kesimpulan_banyak_antrian'></li>
                        <li>Berdasarkan simulasi yang dibuat maka dapat disimpulkan bahwa penambahan jumlah
kasir dapat mengurangi lama waktu yang dibutuhkan untuk mengantri dan memaksimalkan
jumlah konsumen yang dapat dilayani.</li>
                    </ul>
                    </p>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn text-warning"style="background-color: #C31F26;"  data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
<footer class="text-center position-absolute top-100 start-50 translate-middle">
  <p>Created By<a class="" href="https://instagram.com/arhndka.m__?igshid=ZGUzMzM3NWJiOQ==">Ariya Handika</a></p>
  
      
</footer>
    <script>
        $(document).ready(function() {
            showAll();

            $('#add_data').click(function() {
                $('#dynamic_modal_title').text('Add Data konsumen Gerai MCD');
                $('#sample_form')[0].reset();
                $('#action').val('Add');
                $('#action_button').text('Add');
                $('.text-danger').text('');
                $('#action_modal').modal('show');
            });

            $('#generate').click(function() {
                $('#dynamic_modal_title_generate').text('Simpulan antrian pelanggan MCD');
                $('.text-danger').text('');
                $('#generate_modal').modal('show');

                $.ajax({
                    type: "GET",
                    contentType: "application/json",
                    url: "http://localhost/AntrianMCD/api/operasi/generate-by-avg.php",
                    success: function(response) {
                            // Update modal content based on fuzzy logic conclusion
                           
                            $('#kesimpulan_waktu_tunggu').text(response.kesimpulan_waktu_tunggu);
                            $('#kesimpulan_banyak_antrian').text(response.kesimpulan_banyak_antrian);
                      
                    },
                    error: function(err) {
                        console.error('An error occurred:', err);
                        // Display an error message to the user if needed
                    }
                });
            });




            $('#sample_form').on('submit', function(event) {
                event.preventDefault();

                if ($('#action').val() == "Add") {
                    var formData = {
                        'w_datang': $('#w_datang').val(),
                        's_kedatangan': $('#s_kedatangan').val(),
                        'awalpelayanan': $('#awalpelayanan').val(),
                        's_pelayanankasir': $('#s_pelayanankasir').val(),
                        'selesai': $('#selesai').val(),
                        's_keluarantrian': $('#s_keluarantrian').val(),
                    };


                    $.ajax({
                        url: "http://localhost/AntrianMCD/api/operasi/create.php",
                        method: "POST",
                        data: JSON.stringify(formData),
                        success: function(data) {
                            $('#action_button').attr('disabled', false);
                            $('#message').html('<div class="alert alert-success mt-3">' + data.message + '</div>');
                            $('#action_modal').modal('hide');
                            $('#sample_data').DataTable().destroy();
                            showAll();
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } else if($('#action').val() == "Update"){
                    var formData = {
                        'id': $('#id').val(),
                        'w_datang': $('#w_datang').val(),
                        's_kedatangan': $('#s_kedatangan').val(),
                        'awalpelayanan': $('#awalpelayanan').val(),
                        's_pelayanankasir': $('#s_pelayanankasir').val(),
                        'selesai': $('#selesai').val(), 
                        's_keluarantrian': $('#s_keluarantrian').val()
                    }
                    $.ajax({
                        url:"http://localhost/AntrianMCD/api/operasi/create.php",
                        method:"PUT",
                        data: JSON.stringify(formData),
                        success:function(data){
                            $('#action_button').attr('disabled', false);
                            $('#message').html('<div class="alert alert-success">'+data.message+'</div>');
                            $('#action_modal').modal('hide');
                            $('#sample_data').DataTable().destroy();
                            showAll();
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }

            });
        });

        function showAll() {
            $.ajax({
                type: "GET",
                contentType: "application/json",
                url: "http://localhost/AntrianMCD/api/operasi/read.php",
                success: function(response) {
                    var json = response.body;
                     $('#total').html(response.itemCount)
                    var dataSet = [];
                    for (var i = 0; i < json.length; i++) {
                        var sub_array = {
                          'no' : i+1,
                            'w_datang': json[i].w_datang,
                            's_kedatangan': json[i].s_kedatangan,
                            'awalpelayanan': json[i].awalpelayanan,
                            's_pelayanankasir': json[i].s_pelayanankasir,
                            'selesai': json[i].selesai,
                            's_keluarantrian': json[i].s_keluarantrian,
                            'action': '<div class="btn-group" role="group">' +
                                '<button onclick="showOne('+json[i].id+')" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button>' +
                                '<button onclick="deleteAntrian(' + json[i].id + ')" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></button>' +
                                '</div>'

                        };
                        dataSet.push(sub_array);
                    }

                    $('#sample_data').DataTable({
                        data: dataSet,
                        columns: [
                                                  { data : "no" },
                          {
                                data: "w_datang"
                            },
                            {
                                data: "s_kedatangan"
                            },
                            {
                                data: "awalpelayanan"
                            },
                            {
                                data: "s_pelayanankasir"
                            },
                            {
                                data: "selesai"
                            },
                            {
                                data: "s_keluarantrian"
                            },
                            {
                                data: "action"
                            }
                        ]
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

        function showOne(id) {
            $('#dynamic_modal_title').text('Edit Data');
            $('#sample_form')[0].reset();
            $('#action').val('Update');
            $('#action_button').text('Update');
            $('.text-danger').text('');
            $('#action_modal').modal('show');
            $.ajax({
                type: "GET",
                contentType: "application/json",
                url: "http://localhost/AntrianMCD/api/operasi/read.php?id="+id,
                success: function(response) {
                    $('#id').val(response.id);
                    $('#w_datang').val(response.w_datang);
                    $('#s_kedatangan').val(response.s_kedatangan);
                    $('#awalpelayanan').val(response.awalpelayanan);
                    $('#s_pelayanankasir').val(response.s_pelayanankasir);
                    $('#selesai').val(response.selesai);
                    $('#s_keluarantrian').val(response.s_keluarantrian);

                },
                error: function(err) {
                    console.log(err);
                }
            });


        }

        function deleteAntrian(id) {
            alert('Yakin untuk hapus data ?');
            $.ajax({
                url: "http://localhost/AntrianMCD/api/operasi/delete.php",
                method: "DELETE",
                data: JSON.stringify({
                    "id": id
                }),
                success: function(data) {
                    $('#action_button').attr('disabled', false);
                    $('#message').html('<div class="alert alert-success">' + data + '</div>');
                    $('#action_modal').modal('hide');
                    $('#sample_data').DataTable().destroy();
                    showAll();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        
    </script>
    <!-- js dari AOS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
