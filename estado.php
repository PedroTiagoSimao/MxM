<?php

    /*

     Template Name: Estado

     */

    get_header();

    

    get_template_part('menu_section');

    

    if (have_posts()) : while (have_posts()) : the_post();

    

    global $post;

    

    $post_name = $post->post_name;

    

    $post_id = get_the_ID();

    

    $registo = $_POST["registo"];

    

    if ($registo == "") unset($registo);

    

    $datafim = "";



?>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/forms-min.css">

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/buttons-min.css">

<style type="text/css">

.button-warning {

    background: rgb(223, 117, 20); /* this is an orange */

color: #fff;

}

table.bottomBorder { border-collapse:collapse; }

table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:5px; }

</style>



    <div id="<?php echo $post_name; ?>" class="page<?php echo $post_id; ?> section<?php if((get_post_meta($post_id, "rnr_assign_home") == true) ){ echo ' fullscreen home';} else { echo ' '.$post_name; }?>"><!-- SECTION -->





    <?php if((get_post_meta( get_the_ID(), 'rnr_disable_title', true )!= true) && (get_post_meta($post_id, 'rnr_assign_home', true)!= true) ){ ?>    

		<div class="container">

	            <!-- START TITLE -->	            

				<div class="title">

				  <h1 class="header-text"><?php if(get_post_meta( get_the_ID(), 'rnr_alt_title', true )){ echo get_post_meta( get_the_ID(), 'rnr_alt_title', true ); } else { the_title(); } ?></h1>

                </div><!-- END TITLE -->

          </div><!-- END CONTAINER -->       

  <?php } ?>



      <div class="container">

        <div class="full-width" style="color: #333333;background: #f6f6f6;">

        <?php

            if(isset($registo))

            {

                $mydb = new wpdb('mxmultim_hduser','@12345','mxmultim_HelpDesk','localhost');

                

                $query_assistencia = "select Clientes.nomecliente, Equipamentos.tipoequip, Equipamentos.descricaoequip, TipoReparacao.tiporeparacao, Assistencias.descricaoassist, Lojas.localizacao, Assistencias.datafim from Assistencias ".

                "left join Clientes on Clientes.numcliente=Assistencias.idcliente ".

                "left join Equipamentos on Equipamentos.numequip=Assistencias.idequipamento ".

                "left join TipoReparacao on TipoReparacao.id=Assistencias.idtipo ".

                "left join Lojas on Lojas.id=Assistencias.idloja ".

                "where Assistencias.registo='".$registo."'";

                

                $assist = mysql_query($query_assistencia);

                

                $num_rows = mysql_num_rows($assist);

                

                if ($num_rows == 0){

                    

                    unset($registo);?>

                    <h3 style='text-align:center'>Lamentamos, mas o nº de registo que utilizou não foi encontrado na nossa base de dados. Se o problema persistir, por favor contacte-nos.</h3>

                    <form method="post" class="pure-form">

                        <fieldset>

                            <legend>Insira o nº de registo da sua assistência</legend>

                            <input type="text" id="registo" name="registo" style="width:150px;"  placeholder="Nº Registo" />

                            <button type="submit" class="button-warning pure-button">Procurar</button>

                        </fieldset>

                    </form>

                <?php }

                else

                {

                    while($row = mysql_fetch_array($assist))

                    {

                        echo "<table style='width:50%; margin: 0 auto'>";

                        echo "<tr>";

                        echo "<td>".$row[0]."<br>".$row[1]. " ". $row[2]."<br>".$row[5]."<td>";

                        echo "<td><b><h4 style='text-align: center'>Nº de Registo: ".$registo."</h4><td>";

                        echo "</tr>";

                        echo "</table>";

                        echo "<br>";

                        echo "<h4 style='text-align: center'>Descrição: ".$row[4]."</h4>";

                        $datafim = $row[6];

                    }

                    

                    $linhasquery = mysql_query("select AssLinhas.dataassist, AssLinhas.descricaolinha, AssLinhas.quant, AssLinhas.custo from AssLinhas left join Assistencias on Assistencias.registo=AssLinhas.registo where Assistencias.registo='".$registo."'");

                    $total = 0;

                    

                    echo "<br><br>";

                    echo"<div class='subtitle'><p style='text-align:center'>Intervenções/Componentes</p></div>";

                    echo "<table class='bottomBorder' style='margin: 0 auto'>".

                        "<tr>".

                            "<td style='width:16%; text-align:center'><strong>Data</strong></td>".

                            "<td style='width:62%; text-align:center'><strong>Descricao</strong></td>".

                            "<td style='width:10%; text-align:right'><strong>Quant</strong></td>".

                            "<td style='width:10%; text-align:right'><strong>Custo</strong></td>".

                        "</tr>";

                    

                    while($linhas = mysql_fetch_array($linhasquery))

                    {

                        echo "<tr> ".

                        "<td style='text-align:center;width:16%'>".$linhas[0]."</td>".

                        "<td style='width:62%; text-align:center'>".$linhas[1]."</td>".

                        "<td style='text-align:right; width:10%'>".$linhas[2]."</td>".

                        "<td style='text-align:right; width:10%'>".$linhas[3]."</td>".

                        "</tr>";

                        

                        $total = $total+($linhas[2]*$linhas[3]);

                        $total = number_format($total, 2, ',', ' ');

                    }

                    echo "<tr>".

                    "<td style='width:16%; text-align:center'></td>".

                    "<td style='width:62%; text-align:center'></td>".

                    "<td style='width:10%; text-align:right'>Total</td>".

                    "<td style='width:10%; text-align:right'><strong><strong>".$total."</strong></strong></td>".

                    "</tr>";

                    //echo "<p style='text-align:right'>Total: </p>";

                    echo "</table>";

                    echo "<br>";

                    if($datafim != "1999-01-01")

                    {

                        $date = explode("-", $datafim);

                        echo "<p style='text-align:center'>Estado: Pronto a partir de ".$date[2]."-".$date[1]."-".$date[0]."</p>";

                        echo "<p style='text-align:center'>Preços com IVA incluído à taxa em vigor.</p>";

                        ?>

                            <div style="width:100%">

                                <div style="display:table; margin:0 auto">

                                    <form method="post" class="pure-form">

                                        <fieldset>

                                            <input type="hidden" id="registo" name="registo"/>

                                            <button type="submit" class="button-warning pure-button">Procurar outro registo</button>

                                        </fieldset>

                                    </form>

                                </div>

                            </div>

                        <?php

                    }

                    else

                    {

                        echo "<p style='display: inline; text-align:center'>Estado: Por concluir!</p>";

                        echo "<p style='display: inline; text-align:center'>Preços com IVA incluído à taxa em vigor.</p>";

                        ?>

                            <div style="width:100%">

                                <div style="display:table; margin:0 auto">

                                    <form method="post" class="pure-form">

                                        <fieldset>

                                            <input type="hidden" id="registo" name="registo"/>

                                            <button type="submit" class="button-warning pure-button">Procurar outro registo</button>

                                        </fieldset>

                                    </form>

                                </div>

                            </div>

                        <?php

                    }

                }

            }

            else

            {?>

            <form method="post" class="pure-form">

                <fieldset>

                    <legend>Insira o nº de registo da sua assistência</legend>

                    <input type="text" id="registo" name="registo" style="width:150px;"  placeholder="Nº Registo" />

                    <button type="submit" class="button-warning pure-button">Procurar</button>

                </fieldset>

            </form>

            <?php

            }?>

        </div>

           <?php the_content(); ?>

           <?php //wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

           <?php //comments_template(); ?>

      </div>	  



				



    </div><!--END SECTION -->

<?php

  

    endwhile;

    endif; 

	wp_reset_query();

?>









<?php get_footer(); ?>

