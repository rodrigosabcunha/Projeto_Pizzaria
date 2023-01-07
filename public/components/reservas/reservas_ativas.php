<main>

    
        <table>
            <thead>
                <tr>
                    <th>Dia</th>
                    <th>Início</th>
                    <th>Termino</th>
                    <th>Mesa</th>
                    <th>Pessoas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $mesa = 0;
                    $situation = 1; 
                    $dia = 2;
                    $qtd_persons = 3;  
                    $id = 4;
                    foreach($registros as $dados){
                        $valueSituation = '';
                        $dados[$situation] == 1 ? $valueSituation = "Confirmado" : $valueSituation = "Cancelado";
                        echo('
                            <tr>
                                <td>'.$dados[$dia].'</td>
                                <td>18:00</td>
                                <td>22:00</td>
                                <td>'.$dados[$mesa].'</td>
                                <td>'.$dados[$qtd_persons].'</td>
                                <td>'.$valueSituation.'</td>
                                <td><a href="./../src/action/cancel.php?local='.$dados[$id].'" class="btn-cancel">Cancelar</a></td>
                                </tr>
                                ');
                              }
                              
                              
                              ?>
            </tbody>
          </table>
        </main>