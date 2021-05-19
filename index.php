<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pakar Sistem</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Pakar Sistem</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
             <a href="index.php" class="nav-link">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>
                 Dashboard
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="testingresult.php?feature=5" class="nav-link">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>
                 Result Pakar
               </p>
             </a>
           </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pakar Test</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form_test">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Patient Age</label>
                    <input name="age_of_diagnosis" type="number" class="form-control" id="age_of_diagnosis" min="15" max="100" required>
                  </div>
                  <div class="form-group">
                    <label>Cancer Type</label>
                    <select id="cancer_type" name="cancer_type" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="Breast Cancer">Breast Cancer</option>
                      <option value="Breast Sarcoma">Breast Sarcoma</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Detail Cancer Type</label>
                    <select id="cancer_type_detailed" name="cancer_type_detailed" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="Breast Invasive Ductal Carcinoma">Breast Invasive Ductal Carcinoma</option>
                      <option value="Breast Mixed Ductal and Lobular Carcinoma">Breast Mixed Ductal and Lobular Carcinoma</option>
                      <option value="Breast Invasive Lobular Carcinoma">Breast Invasive Lobular Carcinoma</option>
                      <option value="Breast Invasive Mixed Mucinous Carcinoma">Breast Invasive Mixed Mucinous Carcinoma</option>
                      <option value="Breast">Breast</option>
                      <option value="Metaplastic Breast Cancer">Metaplastic Breast Cancer</option>
                      <option value="UNDEF">Bukan Opsidi atas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Type Of Breast Surgery</label>
                    <select id="type_of_breast_surgery" name="type_of_breast_surgery" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="MASTECTOMY">MASTECTOMY</option>
                      <option value="BREAST CONVSERVING">BREAST CONVSERVING</option>
                      <option value="UNDEF">Bukan Opsidi atas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Sel Kanker</label>
                    <select id="cellularity" name="cellularity" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="High">High</option>
                      <option value="Moderate">Moderate</option>
                      <option value="Low">Low</option>
                      <option value="UNDEF">Bukan Opsidi atas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Terapi yang telah dilakukan</label>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="chemotherapy" name="chemotherapy" value="true">
                      <label for="chemotherapy" class="custom-control-label">Kemoterapi</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="hormone_therapy" name="hormone_therapy" value="true">
                      <label for="hormone_therapy" class="custom-control-label">Hormon Terapi</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="radio_therapy" name="radio_therapy" value="true">
                      <label for="radio_therapy" class="custom-control-label">Radio Terapi</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>PAM50. Tumor Profiling Test</label>
                    <select id="pam50_" name="pam50_+_claudin-low_subtype" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="claudin-low">Claudin-Low</option>
                      <option value="lumA">LumA</option>
                      <option value="lumB">LumB</option>
                      <option value="Her2">Her2</option>
                      <option value="Normal">Normal</option>
                      <option value="Basal">Basal</option>
                      <option value="UNDEF">Bukan Opsidi atas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Test Estrogen Receptors Cell Cancer</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="er_status" id="er_status" value="positif" required>
                      <label class="form-check-label">Positif</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="er_status" id="er_status" value="negative" required>
                      <label class="form-check-label">Negative</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Test Estrogen Receptors IHC</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="er_status_measured_by_ihc" id="er_status_measured_by_ihc" value="positif" required>
                      <label class="form-check-label">Positif</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="er_status_measured_by_ihc" id="er_status_measured_by_ihc" value="negative" required>
                      <label class="form-check-label">Negative</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Neoplasma Histologic Grade</label>
                    <select id="neoplasm_histologic_grade" name="neoplasm_histologic_grade" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="3">Aggresive</option>
                      <option value="2">Moderate</option>
                      <option value="1">Low</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Test Cancer HER2</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="her2_status" id="her2_status" value="positif" required>
                      <label class="form-check-label">Positif</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="her2_status" id="her2_status" value="negative" required>
                      <label class="form-check-label">Negative</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Test Cancer HER2 Molecular Techniques</label>
                    <select id="her2_status_measured_by_snp6" name="her2_status_measured_by_snp6" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="NEUTRAL">NEUTRAL</option>
                      <option value="LOSS">LOSS</option>
                      <option value="GAIN">GAIN</option>
                      <option value="UNDEF">Bukan Opsidi atas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Test Tumor Histologic SubType</label>
                    <select id="tumor_other_histologic_subtype" name="tumor_other_histologic_subtype" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="Ductal/NST">Ductal/NST</option>
                      <option value="Mixed">Mixed</option>
                      <option value="Lobular">Lobular</option>
                      <option value="Tobular/cribriform">Tobular/cribriform</option>
                      <option value="Mucinous">Mucinous</option>
                      <option value="Medullary">Medullary</option>
                      <option value="Other">Other</option>
                      <option value="Metaplastic">Metaplastic</option>
                      <option value="UNDEF">Bukan Opsidi atas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kondisi Menopause</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="inferred_menopausal_state" id="inferred_menopausal_state" value="Post" required>
                      <label class="form-check-label">Post Menopause</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="inferred_menopausal_state" id="inferred_menopausal_state" value="Pre" required>
                      <label class="form-check-label">Pre Menopause</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Cluster Molecular Cancer</label>
                    <select id="integrative_cluster" name="integrative_cluster" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4ER-">4ER-</option>
                      <option value="4ER+">4ER+</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Involving Breast</label>
                    <select id="primary_tumor_laterality" name="primary_tumor_laterality" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="Right">Right</option>
                      <option value="Left">Left</option>
                      <option value="UNDEF">Bukan Opsidi atas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Lymph Nodes Examined Count</label>
                    <input type="number" id="lymph_nodes_examined_positive" name="lymph_nodes_examined_positive" class="form-control select2" style="width: 100%;" min="0" max="45" required>
                  </div>
                  <div class="form-group">
                    <label>Mutation Count</label>
                    <input type="number" id="mutation_count" name="mutation_count" class="form-control select2" style="width: 100%;" min="1" max="85" required>
                  </div>
                  <div class="form-group">
                    <label>Nottingham Prognostic Index</label>
                    <input type="number" id="nottingham_prognostic_index" name="nottingham_prognostic_index" class="form-control select2" style="width: 100%;" min="1" max="10" step="0.01" required>
                  </div>
                  <div class="form-group">
                    <label>Ontology Memory Sloan Kettering Cancer Center</label>
                    <select id="oncotree_code" name="oncotree_code" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="IDC">IDC</option>
                      <option value="MDLC">MDLC</option>
                      <option value="ILC">ILC</option>
                      <option value="MMC">MMC</option>
                      <option value="BREAST">BREAST</option>
                      <option value="MBC">MBC</option>
                      <option value="UNDEF">Bukan Opsidi atas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Cancel Cell Test Progresterone Receptors</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pr_status" id="pr_status" value="Positif" required>
                      <label class="form-check-label">Positif</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pr_status" id="pr_status" value="Negative" required>
                      <label class="form-check-label">Negative</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>3-Gene Classifier Subtype</label>
                    <select id="3-gene_classifier_subtype" name="3-gene_classifier_subtype" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="">Select Option</option>
                      <option value="ER-/HER2-">ER-/HER2-</option>
                      <option value="ER+/HER2- High Prolif">ER+/HER2- High Prolif</option>
                      <option value="ER+/HER2- Low Prolif">ER+/HER2- Low Prolif</option>
                      <option value="HER2+">HER2+</option>
                      <option value="UNDEF">Bukan Opsidi atas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tumor Size</label>
                    <input type="number" id="tumor_size" name="tumor_size" class="form-control select2" style="width: 100%;" min="1" max="185" required>
                  </div>
                  <div class="form-group">
                    <label>Tumor Stage</label>
                    <input type="number" id="tumor_stage" name="tumor_stage" class="form-control select2" style="width: 100%;" min="0" max="4" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();

  $('#form_test').on('submit', function(event){
      event.preventDefault();
      $.post( "php/readrulesnaive.php", $( "#form_test" ).serialize(), function(data, status){
            let results = JSON.parse(data);
            alert(results.predict);
      });
  });

});
</script>
</body>
</html>
