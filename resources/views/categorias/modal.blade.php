<!-- Modal -->
<div class="modal fade shadow p-3 mb-5 rounded" id="addCart" tabindex="-1" role="dialog" aria-labelledby="addCartLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCartLabel">Añadir producto al carrito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="modal-body">
       {!!Form::open(['action' => 'CartDetailController@store', 'method' => 'POST'])!!}
            {{ Form::hidden('product_id', $producto->id) }}
            {!!Form::label('Cantidad: ')!!}
            {!!Form::number('cantidad',null,['class'=>'form-control'])!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Añadir</button>
      </div>
    </div>
    {!!Form::close()!!}
  </div>
</div>
</div>