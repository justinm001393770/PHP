<?php

/*
 * Adds new row to test table
 * @return Boolean
 */
function createTestData($dataone, $datatwo, $datathree, $datafour) {
    $result = false;
    
    $db = getDatabase();
    
    $stmt = $db->prepare("INSERT INTO actors SET firstName = :dataone, lastName = :datatwo, dob = :datathree, height = :datafour");

    $binds = array(
                ":dataone" => $dataone,
                ":datatwo" => $datatwo,
                ":datathree" => $datathree,
                ":datafour" => $datafour
            );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $result = true;
            }
    return $result;
}
/** 
 *Gets all data from test Table
 * 
 * @return Array
 */
function viewAllFromTest() {
    $db = getDatabase();
    $stmt = $db->prepare("SELECT * FROM actors");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;

}
?>