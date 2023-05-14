<?php
class MuestraGraficos{

    public static function grafico(){
    $data = array(1,3,4,7,9,5,2);
    // Crear un gráfico de líneas
    $graph = new Graph(400,300);
    $graph->SetScale('textlin');
    $graph->img->SetMargin(40, 30, 20, 40);
    $graph->title->Set('Mi gráfico');
    $graph->xaxis->SetTickLabels(array('Ene','Feb','Mar','Abr','May','Jun','Jul'));
    $lineplot = new LinePlot($data);
    $graph->Add($lineplot);
    $lineplot->SetColor('blue');
    // Mostrar el gráfico
    $graph->Stroke();
    }
}
?>