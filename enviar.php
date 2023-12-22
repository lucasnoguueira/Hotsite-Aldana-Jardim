<?php 
 // Assuming the $_POST data has been sanitized and assigned to variables
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone']; 


// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, 'https://crm.anapro.com.br/webcrm/webapi/integracao/v2/CadastrarProspect');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'cache-control: no-cache',
    'content-type: application/x-www-form-urlencoded',
));

// Set the data to be sent
$postData = http_build_query(array(
    'Key' => 'BverVLsdvPQ1',
    'CampanhaKey' => 'OFJPqOGfbMA1',
    'ProdutoKey' => 'Fe2OE1PAjP81',
    'PoliticaPrivacidadeKey' => '',
    'CanalKey' => '	_R4k4H6aONk1',
    'Midia' => 'Pre-Hotsite',
    'PessoaNome' => $nome,
    'PessoaEmail' => $email,
    'KeyIntegradora' => '981acd55-c0f7-48d7-81c1-cde4bba25ee0',
    'PessoaTelefones[0].Numero' => $telefone,
));

curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

// Execute the cURL session
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    // Redirect if the request was successful
    header("Location: obrigado.php");
    // echo $response;
    exit();
}

// Close cURL session
curl_close($ch);
?>

