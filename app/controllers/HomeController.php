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

        $projecao = DB::select("SELECT
                                    date_part('month', data_vencimento) as mes,
                                    sum(parcelas.valor_parcela) as valor
                                FROM
                                    parcelas
                                WHERE parcela_finalizada=false and date_part('year', created_at) = 2017
                                GROUP BY date_part('month', data_vencimento) ORDER BY mes");

        $eventos = Evento::select('nome', 'data_evento')->get();

        $events = [];
        foreach($eventos as $dado){
            $events += [$dado->data_evento => $dado->nome];
        }

        $julius = Julius::make();//https://github.com/SUKOHI/Julius

        $julius->setStartDate(\Request::get('base_date'))
                ->showNavigation(true)
                ->showDayOfWeek(true)
                ->setMode(\Request::get('mode'))
                // ->setHours('8:10', '18:20')
                ->setClasses([
                        'table' => 'table table-bordered', 
                        'header' => 'table-header', 
                        'time' => 'time', 
                        'prev' => 'btn', 
                        'next' => 'btn', 
                        'day_label' => 'text-success',
                        'today' => 'text-danger',
                        'year_month' => 'text-center', 
                        'day' => 'text-muted',
                ])
        ->setDayLabels(['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'])
        ->setMonthLabels(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'])
        ->setInterval('+10 minutes')
        ->setEvents($events, $callback = function($events, $start_dt, $end_dt){

        $html = '<div>'. $start_dt->day .'</div>';

        foreach($events as $evento){
            $html .= '<code><span style="font-size:10px;">'.$evento.'</span></code>';
        }

        return $html;

    });

		return View::make('home.inicio', compact('quantidade_valores', 'pessoas_sexo', 'projecao', 'julius'));
	}

}