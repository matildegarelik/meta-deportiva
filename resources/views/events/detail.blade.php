@extends('layouts.admin')

@section('pagetitle','Detalles evento')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detalles de evento #{{$event->id}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.events')}}">Eventos</a></li>
            <li class="breadcrumb-item active">{{$event->id}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Datos evento</h3>
                  <a href="{{ route('admin.event.edit',['id'=>$event->id]) }}" class="btn btn-info pull-right">Editar</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{$event->name}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm">
                          <label for="name">Organizador</label>
                          <input type="text" class="form-control" name="organizer" value="{{$event->organizer->user->name}} ({{$event->organizer->organization->name}})" readonly>
                      </div>
                  </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="type">Tipo</label>
                            <input type="text" class="form-control" name="type"  value="{{$event->type}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="casification">Clasificación</label>
                            <input type="text" class="form-control" name="clasification"  @if($event->clasification) value="{{$event->clasification->name}}" @endif readonly>
                        </div>
                        <div class="form-check col-sm">
                            <input type="checkbox" class="form-check-input mt-4" name="featured" @if($event->featured_event) checked @endif disabled>
                            <label class="form-check-label ml-5 mt-4" for="featured">Featured event?</label>
                            <input type="checkbox" class="form-check-input mt-4" name="published" @if($event->published) checked @endif disabled>
                            <label class="form-check-label ml-5 mt-4" for="published">Published event?</label>
                          
                          </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="start_date">Fecha inicio</label>
                            <input type="text" class="form-control" name="start_date"  value="{{$event->start_date}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="end_date">Fecha fin</label>
                            <input type="text" class="form-control" name="end_date"  value="{{$event->end_date}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="name">Descripción</label>
                            <textarea class="form-control" rows="5" name="description" readonly>{{$event->description}}</textarea>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="location">Ubicación</label>
                            <input type="text" class="form-control" name="location"  value="{{$event->location}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="main_image">Imagen principal</label>
                            <p><img src="{{ asset(env('PUBLIC_PATH').'images/eventos/'.$event->main_image) }}" style="max-height: 70px;"></p>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm">
                          <label for="results">Resultados</label>
                          <input type="text" class="form-control" name="results"  value="{{$event->results}}" readonly>
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="website">Sitio web</label>
                            <input type="text" class="form-control" name="website"  value="{{$event->website}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="type">Link externo</label>
                            <input type="text" class="form-control" name="external_link"  value="{{$event->external_link}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="fb_page">Página de Facebook</label>
                            <input type="text" class="form-control" name="fb_page"  value="{{$event->fb_page}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="ig_page">Página de Instagram</label>
                            <input type="text" class="form-control" name="ig_page"  value="{{$event->ig_page}}" readonly>
                        </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- INSCRIPTOS -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Inscriptos</h3>
                </div>
                <div class="card-body">
                  <div class="card-body">
                   
                    <table id="inscriptos-table" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Modalidad</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($inscriptos as $inscripto)
                          <tr>
                              <td>{{$inscripto->user_id}}</td>
                              <td>{{$inscripto->name}}</td>
                              <td>{{$inscripto->email}}</td>
                              <td>{{$inscripto->categoria}}</td>
                              <td>
                                <a href="{{ route('admin.inscripcion', ['id'=>$inscripto->inscripcion_id]) }}"><i class="fas fa-eye ml-1"></i></a>
                                <a href="#" class="btn-link" onclick="deleteInscripcion({{$inscripto->inscripcion_id}})"><i class="fas fa-trash ml-1"></i></a>
                              </td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
  
              <!-- CATEGORIES -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Modalidades</h3>
                  <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target='#add-category-modal'>Agregar</button>
                </div>
                <div class="card-body">
                  <div class="card-body">
                   
                    <table id="categories-table" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Capacidad</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                          <tr>
                              <td>{{$category->id}}</td>
                              <td>{{$category->name}}</td>
                              <td>${{$category->price}}</td>
                              <td>{{$category->availability}}</td>
                              <td>
                                <a href="#" class="btn-link" data-toggle="modal" data-target='#edit-category-modal' data-obj="{{$category}}"><i class="fas fa-pencil-alt ml-1"></i></a>
                                <a href="#" class="btn-link" onclick="deleteCategory({{$category->id}})"><i class="fas fa-trash ml-1"></i></a>
                              </td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- CUPONES -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Cupones</h3>
                  <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target='#add-cupon-modal'>Agregar</button>
                </div>
                <div class="card-body">
                  <div class="card-body">
                   
                    <table id="coupons-table" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Código</th>
                        <th>Descuento</th>
                        <th>Validez</th>
                        <th>Límite de uso</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($cupons as $cupon)
                          <tr>
                              <td>{{$cupon->id}}</td>
                              <td>{{$cupon->code}}</td>
                              <td>@if($cupon->discount_amount) ${{$cupon->discount_amount}} @else {{$cupon->percentage}}% @endif</td>
                              <td>{{$cupon->valid_from}} - {{$cupon->valid_to}}</td>
                              <td>{{$cupon->usage_limit}}</td>
                              <td>
                                <a href="#" class="btn-link" data-toggle="modal" data-target='#edit-cupon-modal' data-obj="{{$cupon}}"><i class="fas fa-pencil-alt ml-1"></i></a>
                                <a href="#" class="btn-link" onclick="deleteCupon({{$cupon->id}})"><i class="fas fa-trash ml-1"></i></a>
                              </td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- PREGUNTAS -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Preguntas</h3>
                  <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target='#add-question-modal'>Agregar</button>
                </div>
                <div class="card-body">
                  <div class="card-body">
                   
                    <table id="questions-table" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Contenido</th>
                        <th>Requerida</th>
                        <th>Modalidad</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($questions as $question)
                          <tr>
                              <td>{{$question->id}}</td>
                              <td>@if($question->type==1) PREGUNTA ABIERTA @elseif($question->type==2) PREGUNTA SI / NO @else OPCIÓN MÚLTIPLE @endif</td>
                              <td>{{$question->content}}</td>
                              <td>@if($question->required) SI @else NO @endif</td>
                              <td>{{$question->category? $question->category->name : 'Todas'}}</td>
                              <td>
                                <a href="#" class="btn-link" data-toggle="modal" data-target='#edit-question-modal' data-obj="{{$question}}"><i class="fas fa-pencil-alt ml-1"></i></a>
                                <a href="#" class="btn-link" onclick="deleteQuestion({{$question->id}})"><i class="fas fa-trash ml-1"></i></a>
                              </td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- SPONSORS -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Sponsors</h3>
                  <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target='#add-sponsor-modal'>Agregar</button>
                </div>
                <div class="card-body">
                  <div class="card-body">
                   
                    <table id="sponsors-table" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($event->sponsors as $sponsor)
                          <tr>
                              <td>{{$sponsor->id}}</td>
                              <td><img style="max-height:30px;" class="sponsor-img-tbl" src="{{asset(env('PUBLIC_PATH').'images/eventos/sponsors/'.$sponsor->image)}}"></td>
                              <td>{{$sponsor->name}}</td>
                              <td>
                                <a href="#" class="btn-link" data-toggle="modal" data-target='#edit-sponsor-modal' data-obj="{{$sponsor}}"><i class="fas fa-pencil-alt ml-1"></i></a>
                                <a href="#" class="btn-link" onclick="deleteSponsor({{$sponsor->id}})"><i class="fas fa-trash ml-1"></i></a>
                              </td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div><!-- /.container-fluid -->
    @include('events.modals.add-category',['id'=>$event->id])
    @include('events.modals.edit-category')
    @include('events.modals.add-cupon',['id'=>$event->id])
    @include('events.modals.edit-cupon')
    @include('events.modals.add-question',['id'=>$event->id,'event'=>$event])
    @include('events.modals.edit-question',['event'=>$event])
    @include('events.modals.add-sponsor',['id'=>$event->id])
    @include('events.modals.edit-sponsor')
  </div>
  <!-- /.content-header -->

@endsection

@section('js')
<script>
    $(function () {
      $('#inscriptos-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#inscriptos-table_wrapper .col-md-6:eq(0)');

      $('#categories-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#categories-table_wrapper .col-md-6:eq(0)');

      $('#coupons-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#coupons-table_wrapper .col-md-6:eq(0)');

      $('#questions-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#questions-table_wrapper .col-md-6:eq(0)');

      $('#sponsors-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#sponsors-table_wrapper .col-md-6:eq(0)');

    });

    $('#edit-category-modal').on('show.bs.modal', function(e) {

      var category = $(e.relatedTarget).data('obj');
      //console.log(category)
      $(e.currentTarget).find('span#id-cat').html(category.id);
      $(e.currentTarget).find('input[name="id"]').val(category.id);
      $(e.currentTarget).find('input[name="name"]').val(category.name);
      $(e.currentTarget).find('input[name="price"]').val(category.price);
      $(e.currentTarget).find('input[name="availability"]').val(category.availability);
      $(e.currentTarget).find('input[name="age_from"]').val(category.age_from);
      $(e.currentTarget).find('input[name="age_to"]').val(category.age_to);
      $(e.currentTarget).find('select[name="gender"]').val(category.gender);
    });
    function deleteCategory(id){
      Swal.fire({
        title: 'Estás seguro?',
        text: "Esto no se va a poder revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borrar!'
      }).then((result) => {
        if (result.isConfirmed) {
          var url = '{{ route("admin.event.delete_category", ":id") }}';
          url = url.replace(':id', id);
          $.ajax({
            method:'GET',
            url: url

          }).done((response)=>{
            Swal.fire(
                'Eliminada!',
                'La modalidad fue eliminada.',
                'success'
              ).then(()=>{
                document.location.reload(true)
              })
          }).fail((response)=>{
            Swal.fire(
                'No eliminada!',
                'Tu modalidad no fue eliminada.',
                'warning'
              )
          })
          
        }
      })
    }

    $('#edit-cupon-modal').on('show.bs.modal', function(e) {
      var cupon = $(e.relatedTarget).data('obj');
      //console.log(cupon)
      $(e.currentTarget).find('span#id-cup').html(cupon.id);
      $(e.currentTarget).find('input[name="id"]').val(cupon.id);
      $(e.currentTarget).find('input[name="code"]').val(cupon.code);
      if(cupon.discount_amount && cupon.discount_amount!=null){
        $(e.currentTarget).find('input[name="discount_amount"]').val(cupon.discount_amount);
        $(e.currentTarget).find('select[name="tipo-desc"]').val('Monto');
      }else{
        $(e.currentTarget).find('input[name="discount_amount"]').val(cupon.percentage);
        $(e.currentTarget).find('select[name="tipo-desc"]').val('Porcentaje');
      }
      $(e.currentTarget).find('input[name="valid_from"]').val(cupon.valid_from);
      $(e.currentTarget).find('input[name="valid_to"]').val(cupon.valid_to);
      $(e.currentTarget).find('input[name="usage_limit"]').val(cupon.usage_limit);
    });
    function deleteCupon(id){
      Swal.fire({
        title: 'Estás seguro?',
        text: "No vas a poder deshacer esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borrar!'
      }).then((result) => {
        if (result.isConfirmed) {
          var url = '{{ route("admin.event.delete_cupon", ":id") }}';
          url = url.replace(':id', id);
          $.ajax({
            method:'GET',
            url: url

          }).done((response)=>{
            Swal.fire(
                'Eliminado!',
                'Su cupón fue eliminado.',
                'success'
              ).then(()=>{
                document.location.reload(true)
              })
          }).fail((response)=>{
            Swal.fire(
                'No eliminado!',
                'Su cupón no fue eliminado.',
                'warning'
              )
          })
    
        }
      })
    }

    $('#edit-question-modal').on('show.bs.modal', function(e) {
      var question = $(e.relatedTarget).data('obj');
      //console.log(category)
      $(e.currentTarget).find('span#id-quest').html(question.id);
      $(e.currentTarget).find('input[name="id"]').val(question.id);
      $(e.currentTarget).find('select[name="type"]').val(question.type);
      $(e.currentTarget).find('input[name="content"]').val(question.content);
      $(e.currentTarget).find('select[name="required"]').val(question.required);
      $(e.currentTarget).find('input[name="order"]').val(question.order);
      $(e.currentTarget).find('input[name="options"]').val(question.options);
      $(e.currentTarget).find('select[name="category"]').val(question.category_id);
      $('#tipo-edit').on('change',function(){
        if($('#tipo-edit').val()==3){
          $('#options-edit').show()
        }else{
          $('#options-edit').hide()
        }
      })
      if(question.type==3){
        $('#options-edit').show()
      }
    });
    function deleteQuestion(id){
      Swal.fire({
        title: 'Estás seguro?',
        text: "Esto no va a poder deshacerse!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borrar!'
      }).then((result) => {
        if (result.isConfirmed) {
          var url = '{{ route("admin.event.delete_question", ":id") }}';
          url = url.replace(':id', id);
          $.ajax({
            method:'GET',
            url: url

          }).done((response)=>{
            Swal.fire(
                'Eliminado!',
                'Su pregunta fue eliminada.',
                'success'
              ).then(()=>{
                document.location.reload(true)
              })
          }).fail((response)=>{
            Swal.fire(
                'No eliminada!',
                'Su pregunta no fue eliminada.',
                'warning'
              )
          })
          
        }
      })
    }

    $('#edit-sponsor-modal').on('show.bs.modal', function(e) {
      var sponsor = $(e.relatedTarget).data('obj');
      //console.log(category)
      $(e.currentTarget).find('span#id-sponsor').html(sponsor.id);
      $(e.currentTarget).find('input[name="id"]').val(sponsor.id);
      $(e.currentTarget).find('input[name="name"]').val(sponsor.name);
      $(e.currentTarget).find('img#image').prop('src',"{{asset('images/eventos/sponsors/')}}"+'/'+sponsor.image);
      
    });
    function deleteSponsor(id){
      Swal.fire({
        title: 'Estás seguro?',
        text: "Esto no va a poder deshacerse!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borrar!'
      }).then((result) => {
        if (result.isConfirmed) {
          var url = '{{ route("admin.event.delete_sponsor", ":id") }}';
          url = url.replace(':id', id);
          $.ajax({
            method:'GET',
            url: url

          }).done((response)=>{
            Swal.fire(
                'Eliminado!',
                'El sponsor fue eliminado',
                'success'
              ).then(()=>{
                document.location.reload(true)
              })
          }).fail((response)=>{
            Swal.fire(
                'No eliminada!',
                'El sponsor no fue eliminado',
                'warning'
              )
          })
          
        }
      })
    }

    $('#select-tipo').on('change',function(){
      if($('#select-tipo').val()==3){
        $('#options').show()
      }else{
        $('#options').hide()
      }
    })

    function deleteInscripcion(id){
      Swal.fire({
        title: 'Estás seguro?',
        text: "No vas a poder deshacer esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borrar!'
      }).then((result) => {
        if (result.isConfirmed) {
          var url = '{{ route("admin.event.delete_inscripcion", ":id") }}';
          url = url.replace(':id', id);
          $.ajax({
            method:'GET',
            url: url

          }).done((response)=>{
            Swal.fire(
                'Eliminada!',
                'La inscripción fue eliminada.',
                'success'
              ).then(()=>{
                document.location.reload(true)
              })
          }).fail((response)=>{
            Swal.fire(
                'No eliminada!',
                'La inscripción no fue eliminada.',
                'warning'
              )
          })
    
        }
      })
    }
  </script>
@endsection