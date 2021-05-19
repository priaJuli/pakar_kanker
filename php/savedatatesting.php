<?php

try {
  $con = new PDO(
      'mysql:host=127.0.0.1;dbname=pakar',
      'malau',
      'password');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query_create_table =
  "CREATE TABLE IF NOT EXISTS testing (
      id int NOT NULL AUTO_INCREMENT,
      age_of_diagnosis INT NOT NULL,
      cancer_type VARCHAR(255) NOT NULL,
      cancer_type_detailed VARCHAR(255) NOT NULL,
      type_of_breast_surgery VARCHAR(255) NOT NULL,
      cellularity VARCHAR(255) NOT NULL,
      chemotherapy VARCHAR(255) NOT NULL,
      hormone_therapy  VARCHAR(255) NOT NULL,
      radio_therapy VARCHAR(255) NOT NULL,
      pam50  VARCHAR(255) NOT NULL,
      er_status  VARCHAR(255) NOT NULL,
      er_status_measured_by_ihc VARCHAR(255) NOT NULL,
      neoplasm_histologic_grade  int NOT NULL,
      her2_status VARCHAR(255) NOT NULL,
      her2_status_measured_by_snp6 VARCHAR(255) NOT NULL,
      tumor_other_histologic_subtype VARCHAR(255) NOT NULL,
      inferred_menopausal_state VARCHAR(255) NOT NULL,
      integrative_cluster VARCHAR(255) NOT NULL,
      primary_tumor_laterality VARCHAR(255) NOT NULL,
      lymph_nodes_examined_positive int not null,
      mutation_count int not null,
      nottingham_prognostic_index float not null,
      oncotree_code  VARCHAR(255) NOT NULL,
      pr_status VARCHAR(255) NOT NULL,
      gene_classifier_subtype VARCHAR(255) NOT NULL,
      tumor_size int not null,
      tumor_stage int not null,
      predict_class VARCHAR(255) NOT NULL,
      PRIMARY KEY (id)
  )";

  $con->exec($query_create_table);

  $con = null;
} catch (\Exception $e) {
    echo $e->getMessage();
}

function save_testing($datatesting){

  try {
    $con = new mysqli('127.0.0.1', 'malau', 'password', 'pakar');

        // Check connection
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }


    $query_insert = "INSERT INTO testing ( age_of_diagnosis,cancer_type,cancer_type_detailed,type_of_breast_surgery,cellularity,
        chemotherapy,hormone_therapy,radio_therapy,pam50,er_status,er_status_measured_by_ihc,neoplasm_histologic_grade,
        her2_status,her2_status_measured_by_snp6,tumor_other_histologic_subtype,inferred_menopausal_state,
        integrative_cluster,primary_tumor_laterality,lymph_nodes_examined_positive,mutation_count,
        nottingham_prognostic_index,oncotree_code,pr_status,gene_classifier_subtype,tumor_size,tumor_stage,predict_class ) VALUES (?,?,?,?,?,
            ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";

    $stmt = $con->prepare($query_insert);

    $stmt->bind_param('issssssssssisssssssidsssiis', $datatesting["age_of_diagnosis"],
    $datatesting["cancer_type"], $datatesting["cancer_type_detailed"],
    $datatesting["type_of_breast_surgery"], $datatesting["cellularity"],
    $datatesting["chemotherapy"],$datatesting["hormone_therapy"],$datatesting["radio_therapy"],
    $datatesting["pam50_+_claudin-low_subtype"],$datatesting["er_status"],$datatesting["er_status_measured_by_ihc"],
    $datatesting["neoplasm_histologic_grade"],$datatesting["her2_status"],$datatesting["her2_status_measured_by_snp6"],
    $datatesting["tumor_other_histologic_subtype"],$datatesting["inferred_menopausal_state"],$datatesting["integrative_cluster"],
    $datatesting["primary_tumor_laterality"],$datatesting["lymph_nodes_examined_positive"],$datatesting["mutation_count"],
    $datatesting["nottingham_prognostic_index"],$datatesting["oncotree_code"],$datatesting["pr_status"],
    $datatesting["3-gene_classifier_subtype"],$datatesting["tumor_size"],$datatesting["tumor_stage"], $datatesting["predict_class"]);

    if($stmt->execute()){

    }
    else{

    }

    $stmt->close();

    $con->close();
  } catch (\Exception $e) {
      echo $e->getMessage();
  }


}

?>
