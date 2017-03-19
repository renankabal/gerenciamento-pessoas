<?php

class HomeController extends BaseController {

	public function home(){
        $dataHoje   = date('Y-m-d');

        $aniversarios   = Cliente::where(DB::raw("date_part('month', data_nascimento)"), date('m'))
                                   ->where(DB::raw("date_part('day', data_nascimento)"), date('d'))
                                   ->get();

        $eventos_avisos = Evento::select('eventos.id', 'eventos.data_evento', 'eventos.hora_evento',
                                        'eventos.nome', 'eventos.anual','eventos_icones.nome as icone',
                                        DB::raw("to_char(eventos.data_evento, 'mm-dd') as niver"))
                                ->leftJoin('eventos_icones', 'eventos_icones.id', '=', 'eventos.evento_icone_id')
                                ->where(DB::raw("date_part('month', eventos.data_evento)"), date('m'))
                                ->orderBy('eventos.hora_evento')
                                ->get();
        // de($eventos_avisos->toArray());

        foreach($eventos_avisos as $eventosAvisos){
            if($eventosAvisos->data_evento == $dataHoje || $eventosAvisos->niver == date('m-d')){
                $eventosHoje[] = [
                                'nome'        => $eventosAvisos->nome ,
                                'hora_evento' => $eventosAvisos->hora_evento,
                                'icone'       => $eventosAvisos->icone,
                                'data_evento' => $eventosAvisos->data_evento
                ];
            }
        }
        // de($eventosHoje);

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

        $eventos  = Evento::select('eventos.id', 'eventos.data_evento', 'eventos.nome', 'eventos.anual',
                                    'eventos_icones.nome as icone')
                    ->leftJoin('eventos_icones', 'eventos_icones.id', '=', 'eventos.evento_icone_id')
                    ->get();
        // de($eventos->toArray());

        $events = [];
        foreach($eventos as $dado){
            if($dado->anual){
                list($anoEvento, $mesEvento, $diaEvento) = explode("-",$dado->data_evento);
                $events += [date('Y-').$mesEvento.'-'.$diaEvento => [$dado->nome, $dado->icone, $dado->id, date('Y-').$mesEvento.'-'.$diaEvento]];
            }else{
                $events += [$dado->data_evento => [$dado->nome, $dado->icone, $dado->id, $dado->data_evento]];
            }
        }
        // de($events);
        $julius = Julius::make();//https://github.com/SUKOHI/Julius | http://wrapbootstrap.com/preview/WB0573SK0

        $julius->setStartDate(\Request::get('base_date'))
                ->showNavigation(true)
                ->showDayOfWeek(true)
                ->setMode(\Request::get('mode'))
                ->setHours('8:10', '18:20')
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
        ->setEvents($events, $callback = function($events, $start_dt, $end_dt){

        $html = '<div>'. $start_dt->day .'</div>';

        foreach($events as $evento){
            $html.='<a href="#myModal" id="selecionaEvento" data-toggle="modal" data-evento="'.$evento[3].'">';
                $html.='<i class="fa fa-bell-o"></i>';
            $html.='</a>';
        }

        return $html;

    });

		return View::make('home.inicio', compact('quantidade_valores', 'pessoas_sexo', 'projecao', 'julius', 'eventosHoje', 'aniversarios'));
	}

}