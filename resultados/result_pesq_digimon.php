<?php

    if (function_exists('pesquisa_digimon')) {

        $result = pesquisa_digimon();
        $qtd = sizeof($result);       


        if ($pesq_nome && $qtd == 3) {
            echo '<div class="row result_pesq_nome">'.
            '<div class="col-md-12">'.
            '<img src="'.$result[1].'" class="img-fluid"><br><hr>'.
            '<p><span>Nome: </span>'.$result[0].'</p>'.
            '<p><span>Nível: </span>'.$result[2].'</p><br>'.
            '</div>'.
            '</div>';            

        } else if ($pesq_nivel && $qtd > 3) {

            $cont = 0;

            for ($i = 0; $i < count($result); $i++) { 

                    $cont++;                          

                    /* Rookie */

                    if ($cont == 94 && $GLOBALS['cont_retorno'] == 31) {
                      break;

                    /* Champion */  
                  } else if  ($cont == 202 && $GLOBALS['cont_retorno'] == 67) {
                      break;

                    /* Ultimate */                    
                  } else if  ($cont == 139 && $GLOBALS['cont_retorno'] == 46) {
                      break;

                    /* Mega */
                  } else if  ($cont == 97 && $GLOBALS['cont_retorno'] == 32) {
                      break;

                    /* Armor */  
                  } else if  ($cont == 37 && $GLOBALS['cont_retorno'] == 12) {
                      break;

                    /* In Training */  
                  } else if  ($cont == 28 && $GLOBALS['cont_retorno'] == 9) {
                      break;
                  } else {
                    echo '<div class="row result_pesq_nivel">'.
                    '<div class="col-md-6">'.
                    '<img src="'.$result[3+$cont].'" class="img-fluid"><br><hr>'.
                    '<p><span>Nome: </span>'.$result[3+$cont-1].'</p>'.
                    '<p><span>Nível: </span>'.$result[2].'</p><br>'.
                    '</div>'.
                    '<div class="col-md-6">';
                    $cont += 3;
                  }


                    /* Rookie */

                    if ($cont == 94 && $GLOBALS['cont_retorno'] == 31) {
                        break;

                      /* Champion */  
                    } else if  ($cont == 202 && $GLOBALS['cont_retorno'] == 67) {
                        break;

                      /* Ultimate */                    
                    } else if  ($cont == 139 && $GLOBALS['cont_retorno'] == 46) {
                        break;

                      /* Mega */
                    } else if  ($cont == 97 && $GLOBALS['cont_retorno'] == 32) {
                        break;

                      /* Armor */  
                    } else if  ($cont == 37 && $GLOBALS['cont_retorno'] == 12) {
                        break;

                      /* In Training */  
                    } else if  ($cont == 28 && $GLOBALS['cont_retorno'] == 9) {
                        break;
                    } else {
                        echo '<img src="'.$result[3+$cont].'" class="img-fluid"><br><hr>'.
                        '<p><span>Nome: </span>'.$result[3+$cont-1].'</p>'.
                        '<p><span>Nível: </span>'.$result[2].'</p><br>'.
                        '</div>'.
                        '</div>';
                        $cont += 2;
                    }
                   
            } 
        } 
        
    }












?>


