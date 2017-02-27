<?php

class HomeController extends BaseController {

	public function home(){
        $pessoas_sexo = DB::select('select count(sexo) as total, sexo from clientes GROUP BY sexo');

        $faturamentos_valores = DB::select("
            SELECT
                date_part('month', data_pagamento) as mes,
                sum(parcelas.valor_pago) as valor
            FROM
                parcelas
            WHERE parcela_finalizada=true and date_part('year', data_pagamento) = 2017
            GROUP BY date_part('month', data_pagamento)
            ");


        $quantidade_valores = '';
        for ($i = 1; $i <= 12; $i++) {
            $faturou = 'nao';
            foreach ($faturamentos_valores as $dados) {
                if ($dados->mes == $i) {
                    $quantidade_valores = $quantidade_valores.$dados->valor.', ';
                    $faturou            = 'sim';
                }
            }
            if ($faturou == 'nao') {
                $quantidade_valores = $quantidade_valores.'0'.', ';
            }
        }
		return View::make('home.inicio', compact('quantidade_valores', 'pessoas_sexo'));
	}

}