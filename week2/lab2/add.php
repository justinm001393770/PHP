<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';
        include './crud.php';

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();
            

            //$stmt = $db->prepare("INSERT INTO test SET dataone = :dataone, datatwo = :datatwo");

            $dataone = filter_input(INPUT_POST, 'firstName');
            $datatwo = filter_input(INPUT_POST, 'lastName');
            $datathree = filter_input(INPUT_POST, 'dob');
            $datafour = filter_input(INPUT_POST, 'height');
            $confirm = createTestData($dataone, $datatwo, $datathree, $datafour);
        if ($confirm == true){
            $results = 'Data Added';
        }
        else
        {
            $results = 'Error, data not added';
        }
            
            
            
            /*$binds = array(
                ":dataone" => $dataone,
                ":datatwo" => $datatwo 
            );*/

            /*
             * empty()
             * isset()
             */

            /*if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
             * */
             
        }
        ?>

        <h1>Add Actors</h1>
        <p>
            <a href ="view.php">View Results</a>
        </p>
        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            First Name: <input type="text" value="" name="firstName" />
            <br />
            Last Name: <input type="text" value="" name="lastName" />
            <br />
            Date of Birth: <input type="text" value="" name="dob" />
            <br />
            Height: <input type="text" value="" name="height" />
            <br />

            <input type="submit" value="Submit" class="btn btn-success" />
        </form>
    </body>
</html>
