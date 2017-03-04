<?php
/*
|--------------------------------------------------------------------------
| Arquivos de Helpers locais
|--------------------------------------------------------------------------
|
| Helpers são funções que não possuem dependência. Para ser uma função eficaz
| verifique se sua lógica depende do composer, ou quem sabe de downloads extras
| ou até bibliotécas externas em caso negativo,
| parabéns você e todos da sua equipe terão menos dor de cabeça.
|
| Caso sua função dependa de muitas classes ou tenha muita lógica, então é recomendado
| fazer um utilitário. O diretório de utilitários fica em app/utilities.
|
| Tanto os helpers quanto os utilitários são globais para o app.
 */
if (!function_exists('de')) {
    /**
     * Semelhante a função dd do laravel, porem sem o bloqueio do script
     *
     * @param  indefinido quantos paramentros passar
     * @return string
     */
    function de() {
        array_map(function ($x) {
                echo ' <pre>';
                print_r($x);
                echo '</pre>';
            }, func_get_args());

        die;
    }
}
/**
 * Formata valores float para o formato moeda
 */
if (!function_exists('formataMoeda')) {
    function formataMoeda($valor) {
        $valor = number_format($valor, 2, ',', '.');
        return $valor;
    }
}

/**
* Formata datas.
*
* @todo Caso a data não seja válida não será exibida
* @param  string $date   data do banco, sistema de arquivo ou so.
* @param  string $format formato aceito pelo linguagem
* @return string
*/
function format_date($date, $format = 'd/m/Y') {
    $date      = str_replace('/', '-', $date);
    $timestamp = strtotime($date);
    if ($timestamp !== false) {
        return date($format, strtotime($date));
    }
}

/**
 * Formata datas.
 *
 * @todo Caso não seja passado um parâmetro ele retorna a data atual
 * @param  string $date   parâmetro de data.
 * @return string
 */
function formata_mes($mes = null) {
    if ($mes == '1') {$mes = 'JANEIRO';}
    if ($mes == '2') {$mes = 'FEVEREIRO';}
    if ($mes == '3') {$mes = 'MARÇO';}
    if ($mes == '4') {$mes = 'ABRIL';}
    if ($mes == '5') {$mes = 'MAIO';}
    if ($mes == '6') {$mes = 'JUNHO';}
    if ($mes == '7') {$mes = 'JULHO';}
    if ($mes == '8') {$mes = 'AGOSTO';}
    if ($mes == '9') {$mes = 'SETEMBRO';}
    if ($mes == '10') {$mes = 'OUTUBRO';}
    if ($mes == '11') {$mes = 'NOVEMBRO';}
    if ($mes == '12') {$mes = 'DEZEMBRO';}

    return $mes;
}

/**
 * Formata hora
 */
if (!function_exists('formata_hora')) {
    function formata_hora($valor) {
        list($hora, $minuto, $segundo) = explode(":", $valor);
        $valor = $hora.':'.$minuto;
        return $valor;
    }
}