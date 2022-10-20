<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title translate="no">Info Signos</title>
</head>

<body>
  <section>
    <h2>Informações sobre o seu signo</h2>
    <?php
    //Define o vetor data com os dados que vem do formulário
    //e separa eles entre o -
    $data = explode("-", $_POST["data"]);
    $dia = $data[2];
    $mes = $data[1];

    //carrega o arquivo XML e retornando um Array
    $xml = simplexml_load_file("./signos.xml");

    //faz o loop nas tag com o nome "item"
    foreach ($xml->item as $item) {
      //Utiliza-se a função "utf8_decode" para exibir os caracteres corretamente
      $dataInc = explode("/", utf8_decode($item->dataInicio));
      $diaInc = $dataInc[0];
      $mesInc = $dataInc[1];

      $dataFim = explode("/", utf8_decode($item->dataFim));
      $diaFim = $dataFim[0];
      $mesFim = $dataFim[1];


      //Realiza a verificação, valida se ele está entre o dia inicial e o dia final
      // após verifica se ele estra entre o mes inicial e o mes final
      if ($dia > $diaInc && $dia < $diaFim && $mes > $mesInc && $mes < $mesFim) {
        //mostra o resultado corretamente via Tags do HTML
        echo "<strong>Signo:</strong> "
          . utf8_decode($item->signoNome) . "<br />";
        echo "<strong>Caracteristicas:</strong> "
          . utf8_decode($item->descricao) . "<br />";
      }
    }
    ?>
  </section>
</body>

</html>