@extends('template.relatorios.relatorio')

@section('layout-conteudo')
	{{-- dos dados do cliente --}}
    <div style="width:100%;text-align:center;background:#77BFA5;font-size:12px;">
    	<b>CONTRATO FENIX LIFE – PLANO DE ASSISTENCIA A VIDA</b>
    </div>
    <div style="width:100%;text-align:justify;font-size:12px;">
    	Pelo presente instrumentode prestação de serviços de Assistência Familiar um lado a empresa <u>FÊNIX LIFE ADMINISTRAÇÃO DE SERVIÇOS</u>, pessoa jurídica de direto privado, sediada nesta cidade, devidamente registrada no CNPJ sob n° 15.208.781/0001-81, neste ato representado pelo seu diretor responsável Marcelo Ribeiro Fiel, portador da carteira de identidade nº. 143538, CPF 526.252.652-72, doravante denominada simplesmente de CONTRATADO, e de outro lado como CONTRATANTE, devidamente identificado(a) o, (a) Senhor(a) {{ $clientes->nome }} pessoa física, portador(a) do CPF {{ $clientes->cpf }} e RG n° {{ $clientes->rg }}, Residente  a___________________________, Bairro __________, Cidade de ________________, Estado ______.	
    </div>
    {{-- dados do plano --}}
    <div style="width:100%;text-align:left;background:#77BFA5;font-size:12px;">
    	<b>DO PLANO FENIX LIFE:</b>
    </div>
    <div style="width:100%;text-align:justify;font-size:12px;">
    	° <b>CLÁUSULA PRIMEIRA - Fundamentação</b> – Os termos deste ato estão fulcrados nas normas cogentes do Art.170, caput. E do respeito Parágrafo Único, da CONSTITUIÇÃO FEDERAL, nas disposições contidas no CONDIGO CIVIL BRASILEIRO Arts.74,81,82,85 e 114.<br>
		° <b>CLÁUSULA SEGUNDA - Finalidade</b> - Sob princípios de integridade de propósitos, transparência de conduta e respeito aos direitos do cidadão, o programa tem por finalidade a PRESTAÇÃO DE SERVIÇOS DE ASSITENCIA A VIDA FAMILIAR - via proposta de Adesão espontânea á reciprocidade econômica estipula na forma de Taxa de Adesão (TA) e Taxa de Administração (TA), conforme constante nas cláusulas deste instrumento.<br>
		° <b>CLÁUSULA TERCEIRA –Definições</b> – Os termos e condições estipuladas neste instrumento serão sempre interpretados observando-se as seguintes definições:<br>
		<b>3.1 Adesão:</b>Assentimento espontâneo ao plano de assistência, por livre iniciativa do interessado, mediante proposta impressa com qualificação do titular e identificação de dependentes; no anexo 02.<br>
		<b>3.2 Administradora:</b> estipulante do programa, com poderes de gestão, controle e fiscalização da FÊNIX LIFE – PLANO DE ASSISTENCIA A VIDA;<br>
		<b>3.3 Associado:</b> O titular e os dependentes vinculados ao plano de acordo com as condições expressamente previstas;<br>
		<b>3.4 Atendimento:</b> Cada ato operacionalde resgate de obrigação e geração de benefícios;<br>
		<b>3.5 Benefício:</b> Vantagem, ganho, proveito, serviço e direito conferido ao Associado;<br>
		<b>3.6 Cancelamento:</b> A exclusão de Adesão a qualquer tempo, por vontade unilateral da Administradora;<br>
		<b>3.7 Carência:</b> Período incorrido entre a formulação da proposta de adesão e a expedição do Certificado de Adesão ou a disponibilização de benefício específico;<br>
		<b>3.8 Certificado:</b> Documento comprobatório da aprovação da Proposta de Adesão vinculando os associados ao programa;<br>
		<b>3.9 Taxa de Adesão (TA):</b> valor básicode referência para adesão e associação ao Plano;<br>
		<b>3.10 Cônjuge:</b> Esposa(o) ou companheiro(a) do titular, na forma da lei;<br>
		<b>3.11 Dependente:</b> Filhos naturais e adotivos ou que vivam a expensas do Titular, como também seu ascendente e as exceções em conseqüência de decisões Judiciais especificam;<br>
		<b>3.12Desistência:</b> A deserção ou a renúncia tácita á Adesão por vontade unilateral do Titular, caracterizada pela inadimplência;<br>
		<b>3.13Extinção:</b> O irrecorrível encerramento coletivo do programa, em razão de fato superveniente, alheio ao controle e gestão da Administradora, que venha inviabilizar sua sustentação operacional;<br>
		<b>3.14 Intermediação:</b> Ação que visa um atendimento suplementar sob o regime de convênio objetivando custos especiais para favorecer o Associado em questão específico;<br>
		<b>3.15 Multa:</b> Penalidade administrativa pela inobservância das partes a qualquer das disposições deste instrumento;<br>
		<b>3.16 Planilha:</b> Formuláriodiscriminativo de benefícios, contendo normas e obrigação recíprocas;<br>
		<b>3.17 Rescisão:</b> Rompimento consensual da Adesão<br>
		<b>3.18 Taxa (TM):</b> Retribuição pecuniário mensal, compulsória e obrigatória, a título de contrapartida pela disponibilização de benefícios, destinada a cobrir despesas e custo administrativos na implementação dos serviços;<br>
		<b>3.19 Titular:</b> Associado usuário principal, signatário e responsável econômico pela manifestação de adesão ao programa.<br>
		<b>3.20 Suspensão:</b> Em caso de guerras, catástrofes, rebeliões ou quaisquer acontecimentos desta natureza ficasuspenso o contrato.<br>
		<b>° CLÁUSULA QUARTA –Duração</b> – O prazo de duração do programa é indeterminado, obrigando-se a administradora pela adoção de medidas preventivas necessárias para resguardar e proteger o interesse dos associados, assegurando seus objetivos sem risco á solução de continuidade.<br>
		<b>° CLÁUSULA QUINTA – Área Operacional</b> – O programa será implantado nas regiões definidas pela administradora, mediante anotação ou registro deste instrumento no competente cartório de atendimento, fora do local ou da respectiva Comarca Judiciária, como condição operacional.<br>
		Parágrafo Único – Em situação excepcionais e a exclusivo critério de Administradora, presentes razões de relevância, e mediante prévia autorização, poderá ser efetuado o atendimento fora do local da base operativa do programa, limitando-se as despesas aos valores estimados dos serviços mencionado no Anexo Único.
    </div>
    {{-- dos dados da adesao --}}
    <div style="width:100%;text-align:left;background:#77BFA5;font-size:12px;">
    	<b>DA ADESÃO:</b>
    </div>
    <div style="width:100%;text-align:justify;font-size:12px;">
    	<b>° CLÁUSULA PRIMEIRA – Da adesão</b> – Os interessados poderão espontaneamente aderir áFÊNIX LIFE – PLANO DE ASSISTÊNCIA Á VIDA, na forma legal, mediante formulação de proposta e adesão, na qual se qualificarão como Titular, identificando o cônjuge e filhos até 21 anos e dependentes.<br>
		<b>° CLÁUSULA SEGUNDA – Da aprovação</b> – A proposta de adesão será considerada recebida e aprovada após a expedição pela administradora, do indispensável Certificado de Adesão que será entregue ao titular no ato do pagamento da segunda parcela da taxa de adesão.<br>
		<b>° CLÁUSULA TERCEIRA – Do Certificado de Adesão e Ficha do Titular e Dependentes </b>– O documento comprobatório do recebimento e aprovação da proposta, como explicado na cláusula vigésima sexta.<br>
		<b>° CLÁUSULA QUARTA – Da Solicitação de Benefícios</b> – Para fazer jus aos benefícios gerados pela adesão, o titular ou associado deverá apresentar o certificado adesão e estar em plena regularidade com o pagamento das obrigações assumidas.<br>
		<b>° CLÁUSULA QUINTA – Dos Custos </b>– Para aderir a FÊNIX LIFE – PLANO DE ASSISTÊNCIA Á VIDA, o Titular se obriga pelas seguintes contrapartidas pecuniárias.<br>
		<b>° CLÁUSULA SEXTA</b> – Compulsória, referente a adesão, estipulada em 50,00(Cinquenta reais), pago no ato de formalização.<br>
		<b>° CLÁUSULA SÉTIMA - TAXA DE ADMINISTRAÇÃO (TA)</b> – O pagamento inicial á “ FÊNIX LIFE – PLANO DE ASSISTÊNCIA Á VIDA “ cuja a finalidade profícua e exclusiva é o de recompensá-la  pela administração e despesas de empreendimentos, não  será exigida do contratante qualquer prestação antecipada, competindo-lhe tão somente, uma contribuição mensal correspondente como consta em Anexo 1 neste contrato, no padrão Pax(valor do óbito) destinada a cobertura das despesas com matérias e serviços para o sepultamento do associado. Havendo necessidade de prestação de serviços funerários fora área onde fora realizado a adesão, fica a inteira responsabilidade do contratante todas as despesas relativas ao transporte.
    </div>
    {{-- dos dados de deveres --}}
    <div style="width:100%;text-align:left;background:#77BFA5;font-size:12px;">
    	<b>DEVERES DAS PARTES:</b>
    </div>
    {{-- dos dados de deveres do associado --}}
    <div style="width:100%;text-align:left;background:#77BFA5;font-size:12px;">
    	<b>CONSTITUI DEVERES DO ASSOCIADO:</b>
    </div>
    <div style="width:100%;text-align:justify;font-size:12px;">
    	<b>° CLÁUSULA PRIMEIRA -</b> Efetuar com pontualidade o pagamento das parcelas assumidas para evitar transtornos operacionais;<br>
		<b>° CLÁUSULA SEGUNDA -</b> Responsabilizar-se pelas informações e declarações prestadas, sob pena de cominações legais;<br>
		<b>° CLÁUSULA TERCEIRA -</b> Fornece a documentação julgada necessária para as finalidades do programa;<br>
		<b>° CLÁUSULA QUARTA -</b> Manter atualizados os dados cadastrais (endereço correto e atualizado), sob pena de caducidade de benefícios; <br>
		<b>° CLÁUSULA QUINTA -</b> Dispensar aos agentes da Administradora tratamento respeitoso;<br>
		<b>° CLÁUSULA SEXTA -</b> Colaborar com as normas de execução dos serviços, facilitando o desempenho de atividade operacional.<br>
		<b>Parágrafo Primeiro -</b> Perderão os direitos assegurados por este contrato os dependentes que vierem contrair matrimônio ou mantiverem união estável ou concubinato.<br>
		<b>Parágrafo Segundo – </b>Os valores atualizados monetariamente na forma admitida pela legislação vigente são de acordo com os parâmetros permitidos, tendo como a base, a do competente registro deste instrumento no Cartório de Registros de Títulos e Documentos de Macapá, sede da Administrativa.
    </div>
    {{-- dos dados de deveres da administradora--}}
    <div style="width:100%;text-align:left;background:#77BFA5;font-size:12px;">
    	<b>DEVERES DAS PARTES:</b>
    </div>
    <div style="width:100%;text-align:justify;font-size:12px;">
    	<b>° CLÁUSULA PRIMEIRA – Das Multas </b>– As mensalidades em atraso serão acrescido de acordo com os índices disposto no mercado financeiro.<br>
		<b>° CLÁUSULA SEGUNDA – Da Suspensão – </b> Os benefícios estarão automaticamente suspensos, no eventual atraso do resgate da contrapartida pecuniária de vida. Admite-se o restabelecimento mediante regularização da(s) parcela(s) em atraso, observadas, ainda as Cláusulas de desistência e de rescisão.<br>
		<b>° CLÁUSULA TERCEIRA – Da Desistência </b>-  ocorre á desistência quando o titular ou preposto, torna-se inadimplente com suas obrigações por mais de 90(noventa) dias. Fato este, que ensejara o entendimento de manifestação unilateral de vontade de desertar e renunciar á proposta de adesão, configurando a caducidade dos benefícios.<br>
		<b>°CLÁUSULA QUARTA – Do Cancelamento </b>– A administradora poderá unilateralmente e , atendendo conveniências de ordem administrativa ou no interesse de gestão, cancelar de adesão do associado, mediante e devolução do valor da taxa de adesão efetivamente paga, corrigida monetariamente.<br>
		<b>° CLÁUSULA QUINTA – Da Rescisão</b> – Na hipótese de se configurar a inviabilidade operativa, por razões imperiosas e supervenientes que restringem ou comprometem o equilíbrio inicial, admitir-se-á a a rescisão consensual do contrato.<br>
		<b>° CLÁUSULA SEXTA – Da Extinção</b> – Será considerada extinto o programa, se ocorrer a incidência de fatos superveniente alheio a vontade da administradora e que imponha a cessação das operações, mesmo que parcialmente, porem motivadora da inviabilidade operacional e do desequilíbrio econômico que comprometa o conjunto do programa em sua concepção inicial.<br>
		<b>° CLÁUSULA SÉTIMA – Da Sucessão</b> – Na eventualidade da falta ou impedimento do titular admitir-se-á sua substituição mediante manifestação formal dos associados vinculados ou por decisão judicial.<br>
		<b>° CLÁUSULA OITAVA – Da Transferência</b> – O presente contrato poderá ser transferido a terceiros, sem que haja qualquer devido emolumento, desde que sejam observadas as normas especificas para associados novos, e as condições constantes da planilha única.<br>
		<b>Parágrafo primeiro –</b> No caso de transferência de contrato não terá carência e serão mantidos todos os direitos contratuais adquiridos anteriormente inclusive o tempo de contribuição, (data retroativa do primeiro contrato), desde que o mesmo se encontre em dias com suas obrigações.<br>
		<b>Obs.:</b> desde que as normas, regras e o atendimento da empresa anterior sejam compatíveis com nossa empresa. <br>
		<b>° CLÁUSULA NONA –</b> Da Responsabilidade Solidaria –Os sócios, diretores e sucessores da administradora responderão solidariamente pelas obrigações sociais, nos limites e normas dispostas na legislação vigente nesta data e em especial, os preceitos da lei n° 5.768/71.<br>
		<b>°CLÁUSULA DÉCIMA – </b>Na hipótese do falecimento do CONTRATANTE ou seus, os herdeiros responderão pelas obrigações ora assumidas, assistindo-lhes por igual todos os direitos decorrentes deste contrato.<br>
		<b>° CLÁUSULA DÉCIMAPRIMEIRA – Do Registro </b>– Este instrumento, que consubstancia o propósito e a vontade da Administradora qualificada no preâmbulo do texto, na concepção da <b>FÊNIX LIFE – PLANO DE ASSITÊNCIA Á VIDA</b>, é encaminhado ao competente cartório, para o devido registro na forma capitulada no Art.136, inciso III, da lei n°3.071, de 1° de janeiro de 1916 – CÓDIGOS CIVEIL BRASILEIRO, como forma jurídica do ato, gerando eficácia para terceiros, e para todos os fins de direito.<br>
		<b>° CLÁUSULA DÉCIMASEGUNDA – </b>As partes elegem o foro da comarca de Macapá renuncia expressaa qualquer outro, por mais privilegiado que seja para dirimir possíveis duvidas emergentes do presente contrato.<br>
		<b>° CLÁUSULA DECIMA TERCEIRA – </b> O programa <b>FÊNIX LIFE – PLANO DE ASSISTÊNCIA Á VIDA</b>, tem como continuidade no contrato na Certidão de ADESÃO em anexo 02 contento do Plano do Anexo 01. E a ficha do Titular e Dependentes em Anexo 03.<br>
		<b>° CLÁUSULA DÉCIMA QUARTA – </b>No caso dos Dependentes Adicionais será cobrado adicionalmente ao valor de R$ 10,00 (dez reais) mensalmente por cada dependente.<br>
		<b>° CLÁUSULA DECIMA QUINTA – </b>O índice de reajuste anual terá como base o indicador do salário mínimo,com objetivo de corrigir as Taxas de Administração conforme recomendação do PROCON.<br>
		<b>° CLÁUSULA DECIMA - BENEFÍCIOS POR INTERMEDIAÇÃO:</b><br>
		- Relacionados ao plano FÊNIX LIFE:
		<b>a)</b> A Administradora, em caráter liberal intermediará convênios com prestadores de serviços e fornecedores de produtos de interesse do associado, preferencialmente nas áreas medicas, odontológicas e outras relacionadas ao bem estar da pessoa, objetivando a minimização de custos mediante vantagens decorrente de descontos e outros benefícios. Ficando isenta a administradora de responder pelas partes em caso de litigio.<br>
		<b>° CLÁUSULA DECIMA PRIMEIRA:</b> Serviços Póstumos para todos os associados e dependentes do Plano de Saúde Fênix Lifeno valor de R$ 2.000,00 com as seguintes carências abaixo:
		- 06Meses de Plano de saúde Fênix Life devidamente quitados, o cliente tem direito 30% do valor total do serviço.<br>
		- 12 Meses de Plano de saúde Fênix Life devidamente quitados, o cliente tem direito 40% do valor total do serviço.<br>
		- 18 Mesesde Plano de saúde Fênix Life devidamente quitados, o cliente tem direito a 100% do valor total do serviço.<br>
		<b>CLÁUSULA DÉCIMA SEGUNDA:</b> Auxilio Funerário<br>
		No caso de falecimento do titular ou dependentes do plano, a cobertura oferece reembolso com as despesas do funeral limitado a R$ 2.000,00. Esta cobertura já está inclusa no plano, não é necessária sua contratação respeitando a tabela abaixo:<br>
		Seis Meses de pagamento reembolso de  R$ 500,00<br>
		Doze Meses de pagamento reembolso de  R$ 1.000,00<br>
		Dezoito meses de pagamento reembolso de  R$ 1.500,00<br>
		Vinte e quatro Meses de pagamento reembolso de  R$ 2.000,00<br>
    </div>
    {{-- dos dados de servicos e beneficios--}}
    <div style="width:100%;text-align:left;background:#77BFA5;font-size:12px;">
    	<b>ANEXO 01 NESTE CONTRATO –PLANOS DE SERVIÇOS E BENEFÍCIOS:</b>
    </div>
    <div style="width:100%;text-align:justify;font-size:12px;">

    <span style="font-color:red;">- PLANO LIFE 01-R$: 39,40 – REAJUSTE DE 5% DO SALÁRIO MÍNIMO ANUAL.</span><br>
	<b>a)</b>Cartão de descontos em clinicas medicas, odontológicas, laboratórios e outros na área da saúde para todo família.<br>
	<b>b)</b>Atendimento via Call Center (atendimento por telefone e internet)<br>
	<b>c)</b>Serviços póstumos para o titular cônjuge e filhos no valor de R$: 2.000,00<br>

	<p><b><i>HAVENDO NECESSIDADE DE PRESTAÇÃO DE SERVIÇOS FUNERÁRIOS FORA DA ÁREA ONDE FORA REALIZADO A ADESÃO, FICA Á INTEIRA RESPONSABILIDADE DO CONTRATANTE TODAS AS DESPESAS RELATIVAS AO TRANSPORTE.</i></b></p>
	
@stop