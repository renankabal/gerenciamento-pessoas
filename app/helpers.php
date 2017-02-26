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