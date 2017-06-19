<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader"><span class=" title">BIENVENIDO AL SISTEMA DE PUNTOS UNIMARK</span></div>
</header>

<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">       
        <div class="row TextColor center">catálogo de premios</div>
        
        <div class="row" style="width:100%">
          <div class="container">
            <div class="Buscar row column">               
              <div class="col s1 m1 l1 offset-l3 offset-m2"><i onclick="ekisde()" class="material-icons ColorS">search</i></div>
                <div class="input-field col s11 m6 l5">
                    <input  id="searchCatalogo" type="text" placeholder="Buscar" class="validate mayuscula">
                    <label for="search"></label>
                </div>
            </div>
          </div>
        <div class="row center">
            <?php 
            $cont = 0;
                for ($i=1; $i <=4 ; $i++) { 
                   echo '<div class="col s3 noPading">
                        <table id="tblCatalogo'.$i.'" class="TableBlank transparente">
                            <thead>
                                <tr><th></th></tr>
                            </thead>                            
                            <tbody>';
                            $bar = "cat".$i;
                                    foreach ($$bar as $key) {
                                        echo "<tr>";
                                            if ($key['v_Puntos'.$i]!="0" and $key['v_Nombre'.$i]!="") {

                                                echo"<td>
                                                        <div class='images_ca'>                              
                                                            <img src=".base_url()."assets/img/catalogo/".$key['v_IMG'.$i]." alt=''>
                                                            <div class='descripImg'>
                                                            <p class='codP'>COD: ".$key['v_IdIMG'.$i]."</p>
                                                            <p class='descript'>".str_replace(array("/A%", "/E%","/I%","/O%","/U%","/-%"),array("á", "é", "í","ó","ú","ñ"),  $key['v_Nombre'.$i])."</p>
                                                            <p class='ptsdes'>".$key['v_Puntos'.$i]." puntos</p>
                                                            </div>
                                                        </div>
                                                    </td>"; 
                                                } else {
                                                    echo"<td style ='display:none;'></td>";
                                                }                          
                                        echo "</tr>"; $cont++;
                                    }                                
                            echo '</tbody>
                        </table>
                      </div>';
                }
            ?>
        </div>
  </div>
</div>
</main>
</div>