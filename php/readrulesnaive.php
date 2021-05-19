<?php

include '../vendor/autoload.php';
include 'savedatatesting.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

$filePath = 'naiverules.csv';

// $newfilepath = 'newhaberman.csv';
// $newfile = fopen($newfilepath,"w");
// $arr_new_content = array();

$reader = ReaderEntityFactory::createReaderFromFile($filePath);
/** All of these methods have to be called before opening the reader. */
$reader->open($filePath);
$reader->setFieldDelimiter(';');

$index_arr = [];
$rules_prob = [];
$rules_numeric = [];

$three = ['Living' => 0, 'Died of Disease' => 0, 'Died of Other Cause'];

$testings = [
"age_of_diagnosis" => 0
,"cancer_type" => ""
,"cancer_type_detailed" => ""
,"type_of_breast_surgery" => ""
,"cellularity" => ""
,"chemotherapy" => "false"
,"hormone_therapy" => "false"
,"radio_therapy" => "false"
,"pam50_+_claudin-low_subtype" => ""
,"er_status" => ""
,"er_status_measured_by_ihc" => ""
,"neoplasm_histologic_grade" => ""
,"her2_status" => ""
,"her2_status_measured_by_snp6" => ""
,"tumor_other_histologic_subtype" => ""
,"inferred_menopausal_state" => ""
,"integrative_cluster" => 0
,"primary_tumor_laterality" => ""
,"lymph_nodes_examined_positive" => ""
,"mutation_count" => ""
,"nottingham_prognostic_index" => ""
,"oncotree_code" => ""
,"pr_status" => ""
,"3-gene_classifier_subtype" => ""
,"tumor_size" => ""
,"tumor_stage" => ""
];

foreach ($reader->getSheetIterator() as $sheet) {
    // only read data from "summary" sheet
    // $arr_new_content[] = $index_arr;
    // fputcsv($newfile, $index_arr, ";");
    $idx = 0;
    foreach ($sheet->getRowIterator() as $row) {
        $idx++;
        $content = implode(array_map(function($cell) {
            return $cell;
        }, $row->getCells()), ";");
        $arr_content = explode(";", $content);
        $temp_content = [];
        $missingvalue = false;
        if($idx == 1){ continue; }

        // if("pam50_+_claudin-low_subtype" == $arr_content[0]){
        //     $arr_content[0] = "pam50_%2B_claudin-low_subtype";
        // }

        if(in_array($arr_content[1], ['mean', 'standard deviation'])){
            $dups = $three;
            $dups['Living'] = $arr_content[2];
            $dups['Died of Disease'] = $arr_content[3];
            $dups['Died of Other Cause'] = $arr_content[4];
            $rules_numeric[$arr_content[0]][$arr_content[1]] = $dups;
        }

        if(substr($arr_content[1], 0, 6) == "value="){
            $dups = $three;
            $dups['Living'] = $arr_content[2];
            $dups['Died of Disease'] = $arr_content[3];
            $dups['Died of Other Cause'] = $arr_content[4];
            $value_attr = substr($arr_content[1], 6);
            $rules_prob[$arr_content[0]][$value_attr] = $dups;
        }

    }

}

function fnumeric($mean, $standart, $values_testing){
    return (1/($standart * sqrt( pi() * 2 ) )) * pow( exp(1) ,-(pow(($values_testing - $mean), 2)/(2* pow($standart, 2) )));
}

if($_POST['age_of_diagnosis']){

    $postall = file_get_contents('php://input');

    $exp_post = explode("&", $postall);

    $probs_living = 1;
    $probs_death_disease = 1;
    $probs_death_other = 1;

    foreach ($exp_post as $key => $value) {
        $value_exp = explode("=", $value);
        // echo "".$value_exp[0]."<br>";
        $attr = urldecode($value_exp[0]);
        $val_attr = urldecode($value_exp[1]);
        $testings[$attr] = $val_attr;

        // echo "Loop living probabilitas = $probs_living <br>";
        // echo "Loop Died of Disease probabilitas = $probs_death_disease <br>";
        // echo "Loop Died of Other Cause probabilitas = $probs_death_other <br>";

        if(isset($rules_prob[$attr])){
            // echo "Key ".$attr.". Rules probabilitas <br>";

            if(isset($rules_prob[$attr][$val_attr]) ){
                // print_r($rules_prob[$attr][$val_attr]);
                // echo "<br><br>";
                $probs_living = $probs_living * $rules_prob[$attr][$val_attr]['Living'];
                $probs_death_disease = $probs_death_disease * $rules_prob[$attr][$val_attr]['Died of Disease'];
                $probs_death_other = $probs_death_other * $rules_prob[$attr][$val_attr]['Died of Other Cause'];
            }
            else if(isset($rules_prob[$attr][ucfirst($val_attr)])){
                // print_r($rules_prob[$attr][ucfirst($val_attr)]);
                $probs_living = $probs_living * $rules_prob[$attr][ucfirst($val_attr)]['Living'];
                $probs_death_disease = $probs_death_disease * $rules_prob[$attr][ucfirst($val_attr)]['Died of Disease'];
                $probs_death_other = $probs_death_other * $rules_prob[$attr][ucfirst($val_attr)]['Died of Other Cause'];
                // echo "<br><br>";
            }
        }
        else if(isset($rules_numeric[$attr])){
            $mean = $rules_numeric[$attr]['mean']['Living'];
            $standart = $rules_numeric[$attr]['standard deviation']['Living'];
            $num_living = fnumeric($mean, $standart, $val_attr);
            $probs_living = $probs_living * $num_living;

            $mean = $rules_numeric[$attr]['mean']['Died of Disease'];
            $standart = $rules_numeric[$attr]['standard deviation']['Died of Disease'];
            $num_death_disease = fnumeric($mean, $standart, $val_attr);
            $probs_death_disease = $probs_death_disease * $num_death_disease;

            $mean = $rules_numeric[$attr]['mean']['Died of Other Cause'];
            $standart = $rules_numeric[$attr]['standard deviation']['Died of Other Cause'];
            $num_death_other = fnumeric($mean, $standart, $val_attr);
            $probs_death_other = $probs_death_other * $num_death_other;

            // echo "Key ".$attr.". Rules numeric <br>";
            // print_r($rules_numeric[$attr]);
            // echo "<br><br>";
        }
        else{
            // echo "!!!!!!!!!! ".$attr.". Not listed probabilitas and numeric <br><br>";
        }

        // echo "<br><br>";
    }
}

$results = [];

$results['Living'] = $probs_living;
$results['Death cancer'] = $probs_death_disease;
$results['Death other'] = $probs_death_other;
$results['predict'] = "";
$results['testing'] = $testings;

// echo "Probs Living = ".$probs_living."<br>";
// echo "Probs Died of Disease = ".$probs_death_disease."<br>";
// echo "Probs Died of Other Cause = ".$probs_death_other."<br>";

if(max($probs_living, $probs_death_other, $probs_death_disease) == $probs_living){
    $results['predict'] = "Predict Class is Living";
    $testings['predict_class'] = "Living";
}
else if(max($probs_living, $probs_death_other, $probs_death_disease) == $probs_death_disease){
    $results['predict'] = "Predict Class is Death because Cancer";
    $testings['predict_class'] = "Died of Disease";
}
else {
    $results['predict'] = "Predict Class is Death because Other Causes";
    $testings['predict_class'] = "Died of Other Cause";
}

save_testing($testings);

echo json_encode($results);

?>
