<?php include_once 'config/init.php'; ?>

<?php

$session = new Session;

$Numero = isset($_GET['id']) ? $_GET['id'] : null; 

if (isset($_POST['submit'])) {
    // Create Data Array
    $data = array();
    $data['Annee'] = $_POST['Annee'];
    $data['Sem'] = $_POST['Sem'];
    $data['SemAb'] = $_POST['SemAb'];
    $data['Debut'] = $_POST['Debut'];
    $data['Fin'] = $_POST['Fin'];
    $data['Debsem'] = $_POST['Debsem'];
    $data['Finsem'] = $_POST['Finsem'];
    $data['Annea'] = $_POST['Annea'];
    $data['Anneab'] = $_POST['Anneab'];
    
    if ($session->updateSession($Numero, $data)) {
        redirect('index.php', 'Votre session a ete mis a jour', 'success');
    } else {
        redirect('index.php', 'Erreur lors de la mise a jour de la session', 'error');
        //var_dump($data);
        //print_r($Numero);
    }
}





$template = new Template('templates/session-edit.php');
$template->session = $session->getSession($Numero);
echo $template;