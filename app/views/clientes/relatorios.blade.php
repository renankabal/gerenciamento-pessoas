<div id="relatoriosCliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Documentos do Cliente</h4>
      <div class="modal-body">
      </div>
        <table class="table table-hover" width="100%">
          <tr class="info">
              <td width="95%">Nome</td>
              <td width="5%">Ação</td>
          </tr>
          <tr>
              <td>Carteirinhas</td>
              <td title="Visualizar"><a href="{{  action('RelatoriosController@carteirinha') }}" target="_blank"><i class="fa fa-search"></i></a></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
