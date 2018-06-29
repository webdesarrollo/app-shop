<div class="col-lg-6">
  {!! Form::open(
       array('url'=>'admin/buscar','method'=>'GET','autocomplete'=>'off','role'=>'search'))
  !!}
  <div class="form-group">
  <div class="input-group">
    <input type="text" class="form-control" name="query"  placeholder="Buscar..." value="" id="search">
    <span class="input-group-btn">
    <button type="submit" class="btn btn-primary" title="buscar"><span class="mdi mdi-search-web"></span></button>
    </span>
  </div>
  </div>
  {!!Form::close()!!}
</div>
