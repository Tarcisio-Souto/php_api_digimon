<?php


$nome_digimon = '';
$url = '';
$msg_usuario = '';
$pesq_nome = false;
$pesq_nivel = false;
$cont_retorno = 0;

if (isset($_POST['btn_pesq_nome'])) {
    $nome_digimon = $_POST['txtDigimon'];
    $url = "https://digimon-api.herokuapp.com/api/digimon/name/".$nome_digimon;
    $msg_usuario = 'Digimon não encontrado =/';
    $pesq_nome = true;

    $url = str_replace(' ', "%20", $url);

} else if (isset($_POST['btn_pesq_nivel'])) {
    $nivel_digimon = $_POST['txtNivel'];
    $url = "https://digimon-api.herokuapp.com/api/digimon/level/".$nivel_digimon;
    $msg_usuario = 'Nível não conhecido =/';
    $pesq_nivel = true;

    $url = str_replace(' ', "%20", $url);

}


if ($pesq_nome == true || $pesq_nivel == true) {

    function pesquisa_digimon() {        

        $cod_http = '';
            
        $req = curl_init($GLOBALS['url']);
        curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
        $result = json_decode(curl_exec($req));    
            
        $cod_http = curl_getinfo($req);
    
        switch ($cod_http['http_code']) {
    
            case 500:
                echo 'Serviço indisponível =/';
                die();
                break;
            case 400:
                echo '<div align="center" class="msg-usuario">'.$GLOBALS['msg_usuario'].'</div>';
                echo '<script>'.
                'setTimeout(function(){'. 
                    'var msg = document.getElementsByClassName("msg-usuario");'.
                    'while(msg.length > 0){'.
                        'msg[0].parentNode.removeChild(msg[0]);'.
                    '}'.
                '}, 2000);'.
                '</script>';
                die();
                break;
            case 200:

                $nome = $result[0]->name;
                $imagem = $result[0]->img;
                $nivel = $result[0]->level;
                
                $array = array($nome, $imagem, $nivel);
                
                if (count($result) > 1) {

                    for ($i = 0; $i < count($result); $i++) {

                        $GLOBALS['cont_retorno'] = count($result);

                        foreach ($result as $digimon) {
    
                            $nome = $result[$i]->name;
                            $imagem = $result[$i]->img;
                            $nivel = $result[$i]->level;
       
                        }

                        array_push($array, $nome, $imagem, $nivel);
                    } 
                }

                return $array;
                break;
        }            
    }
}


?>