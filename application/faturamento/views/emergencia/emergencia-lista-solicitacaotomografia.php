<div class="content"> <!-- Inicio da DIV content -->


    <div id="accordion">
        <h3><a href="#">Lista de tomografia:</a></h3>
        <div>
            <table><!-- Início da lista de pensionistas -->

                <thead>
                    <tr>
                        <th colspan="5" class="tabela_title">
                            <form name="form_busca" method="post" action="<?= base_url() ?>emergencia/emergencia/pesquisarsoliciatatomografia">
                                <input type="text" name="filtro" value="<?= @$filtro; ?>" />
                                <button type="submit" id="enviar">Pesquisar</button>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th class="tabela_header">Paciente</th>
                        <th class="tabela_header">Especialidade</th>
                        <th class="tabela_header">Data/Hora da solicitação</th>
                        <th class="tabela_header">Prioridade</th>
                        <th class="tabela_header">&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    <?
                    if (count($lista) > 0) :
                        $i=0;
                        foreach ($lista as $item) :
                            if ($i%2 == 0) : $classe = "tabela_content01";
                            else: $classe = "tabela_content02";
                            endif;
                            //$ficha_id = $item->ficha_id;
                            ?>
                    <tr>
                        <td class="<?=$classe;?>"><?=$item->nome;?></td>
                        <td class="<?=$classe;?>"><?=$item->especialidade;?></td>
                        <td class="<?= $classe; ?>"><?$ano= substr($item->datasolicitacao,0,4);?>
                                                            <?$mes= substr($item->datasolicitacao,5,2);?>
                                                            <?$dia= substr($item->datasolicitacao,8,2);?>
                                                            <?$datafinal= $dia . '/' . $mes . '/' . $ano; ?>
                                                            <?=$datafinal?>
                                                            - <?$hora= substr($item->horasolicitacao,0,2); ?>
                                                            <?$minuto= substr($item->horasolicitacao,3,2); ?>
                                                            <?$horafinal = $hora . ':' . $minuto;?>
                                                            <?=$horafinal?> </td>
                        <td class="<?=$classe;?>"><?=$item->prioridade;?></td>
                        <td class="<?=$classe;?>">
                            <a  onclick="javascript: return confirm('Deseja realmente retirar da lista o paciente: <?=$item->nome;?>');"
                                href="<?=  base_url()?>emergencia/emergencia/tomografiaatendida/<?=$item->tomografia_id;?>">
                                <img border="0" title="Parecer" alt="Parecer"
                                     src="<?=  base_url()?>img/form/page_white_edit.png" />
                            </a>
                            <a onclick="javascript: return confirm('Deseja realmente modificar a prioridade do paciente: <?=$item->nome;?>');"
                                href="<?=  base_url()?>emergencia/emergencia/adiamentotomografia/<?=$item->tomografia_id;?>">
                                <img border="0" title="Parecer" alt="Parecer"
                                     src="<?=  base_url()?>img/form/page_white_gear.png" />
                            </a>
                            <a  href="<?=  base_url()?>emergencia/emergencia/relatorioevolucao/<?=$item->evolucao_id;?>">
                                <img border="0" title="Evolucao" alt="Evolucao"
                                     src="<?=  base_url()?>img/form/page_white_acrobat.png" />
                            </a>
                            <a  href="<?=  base_url()?>emergencia/emergencia/relatorioparecer/<?=$item->evolucao_id;?>/<?=$item->parecer_id;?>">
                                <img border="0" title="Parecer" alt="Parecer"
                                     src="<?=  base_url()?>img/form/page_white_acrobat.png" />
                            </a>
                        </td>
                    </tr>
                            <?
                            $i++;
                        endforeach;
                    else :
                        ?>
                    <tr>
                        <td class="tabela_content01" colspan="5">Sem Solicita&ccedil;&otilde;es cadastrada.</td>
                    </tr>
                    <? endif; ?>
              </tbody>
                <tfoot>
                    <tr>
                        <th class="tabela_footer" colspan="5">Solicita&ccedil;&otilde;es: <?=count($lista); ?></th>
                    </tr>
                </tfoot>
            </table><!-- Fim da lista de pensionistas -->
        </div>
     </div>
</div> <!-- Final da DIV content -->
<link rel="stylesheet" href="<?= base_url()?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript">

    $(function() {
        $( "#servidor" ).accordion();
        $( "#accordion" ).accordion();
    });

  </script>
