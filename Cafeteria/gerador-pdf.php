<?php 

    require "vendor/autoload.php";

    // reference the Dompdf namespace
    use Dompdf\Dompdf;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

    ob_start(); //buffer de saida para o conteudo-pdf.php e quando chamar o ob_get_clen ele pega o conteudo e joga dentro da variavel
    require "conteudo-pdf.php";
    $html = ob_get_clean();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();

?>