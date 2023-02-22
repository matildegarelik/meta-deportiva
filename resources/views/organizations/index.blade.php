@extends('layouts.admin')

@section('pagetitle','Organizations')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Organizaciones</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Organizaciones</li>
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
                  <h3 class="card-title">Listado</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Sitio web</th>
                      <th>Contacto principal</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($organizations as $organization)
                        <tr>
                            <td>{{$organization->id}}</td>
                            <td>{{$organization->name}}</td>
                            <td>{{$organization->website}}</td>
                            <td>{{$organization->user->name}}</td>
                            <td>
                              <a href="{{ route('admin.organization', ['id'=>$organization->id]) }}"><i class="fas fa-eye ml-1"></i></a>
                              <a href="{{ route('admin.organization.edit', ['id'=>$organization->id]) }}"><i class="fas fa-pencil-alt ml-1"></i></a>
                              <a href="#" onclick="deleteOrganization({{$organization->id}})"><i class="fas fa-trash ml-1"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Sitio web</th>
                          <th>Contacto principal</th>
                          <th>Acciones</th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

@endsection

@section('js')
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "language": {
            "lengthMenu": "Display _MENU_ registros por página",
            "zeroRecords": "No se hallaron datos - Disculpa",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrados de _MAX_ registros totales)",
            "paginate": {
              "previous": "Previa",
              "next": "Próxima"
            }
        }
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    function deleteOrganization(id){
      Swal.fire({
        title: 'Estás seguro?',
        text: "Esta acción no podrá deshacerse! Todos los organizadores serán eliminados también.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          var url = '{{ route("admin.organization.delete", ":id") }}';
          url = url.replace(':id', id);
          $.ajax({
            method:'GET',
            url: url

          }).done((response)=>{
            Swal.fire(
                'Eliminada!',
                'La organización fue eliminada.',
                'success'
              ).then(()=>{
                document.location.reload(true)
              })
            
            
          }).fail((response)=>{
            Swal.fire(
                'No eliminada!',
                'La organización no ha sido eliminada.',
                'warning'
              )
          })
          
        }
      })
    }
  </script>
@endsection