<div id="relatoriosCliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Documentos de <span id="pessoaNome"></span></h4>
      <div class="modal-body">
      </div>
        <input type="hidden" name="pessoaId">
        <table class="table table-hover" width="100%">
          <tr class="info">
              <td width="95%">Nome</td>
              <td width="5%">Ação</td>
          </tr>
          <tr style="cursor:pointer" class="relatorio_pessoa" link="/home/carteirinha/">
              <td>Carteirinhas</td>
              <td><i class="fa fa-search"></i></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
