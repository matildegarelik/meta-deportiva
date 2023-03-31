@extends('layouts.admin')

@section('pagetitle','Frontend')

@section('css')
<style>
    .img-thumb{
        margin-top:5px;
        max-height: 75px !important;
    }
</style>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Frontend</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Frontend</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <form action="{{route('admin.update_frontend')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Página principal</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                                <label>Título</label>
                                <input name="titulo" class="form-control" value="{{env('TITULO')}}">
                        </div>
                        <div class="row">
                                <label>Subtítulo</label>
                                <input name="subtitulo" class="form-control" value="{{env('SUBTITULO')}}">
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label>Color principal:</label>
                                <div class="row justify-content-between">
                                    <div class="input-group my-colorpicker2 col-8">
                                        <input type="text" class="form-control" name="color" value="#{{env('color')}}">
                    
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group col-3">
                                        <input type="text" name="opacity" class="form-control" value="{{env('OPACITY')}}" id="alpha">
                                        <div class="input-group-append">
                                            <span class="input-group-text"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group col-sm">
                                <label>Ubicación</label>
                                <input name="ubicacion" class="form-control" value="{{env('UBICACION')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label>Logo</label>
                                <input type="file" name="logo">
                                <img src="{{ asset(env('PUBLIC_PATH').'images/main/'.env('IMG_LOGO')) }}" alt="logo" class="img-thumb">
                            </div>
                            <div class="form-group col-sm">
                                <label>Términos y condiciones / Aviso de privacidad</label>
                                <input type="file" name="notice" accept="application/pdf">
                                <p><a href="{{ asset(env('PUBLIC_PATH').'notice.pdf') }}" target="_blank">Ver actual</a></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label>Imagen 1</label>
                                <input type="file" name="img1">
                                <img src="{{ asset(env('PUBLIC_PATH').'images/main/'.env('IMG_1')) }}" alt="img1" class="img-thumb">
                            </div>
                            <div class="form-group col-sm">
                                <label>Imagen 2</label>
                                <input type="file" name="img2">
                                <img src="{{ asset(env('PUBLIC_PATH').'images/main/'.env('IMG_2')) }}" alt="img2" class="img-thumb">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">

                                <label>Imagen 3</label>
                                <input type="file" name="img3">
                                <img src="{{ asset(env('PUBLIC_PATH').'images/main/'.env('IMG_3')) }}" alt="img3" class="img-thumb">
                            </div>
                            <!--<div class="form-group col-sm">
                                <label>Imagen 4</label>
                                <input type="file" name="img4">
                                <img src="{{ asset(env('PUBLIC_PATH').'images/main/'.env('IMG_4')) }}" alt="img4" class="img-thumb">
                            </div>-->
                        </div>
                        <br>
                        <h4>Clasificaciones</h4><hr>
                        <table id="clasifications-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Clasificacion</th>
                                    <th>Imagen (371x260)</th>
                                    <th>Cambiar imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clasifications as $clasif)
                                <tr>
                                    <td>{{$clasif->name}}</td>
                                    <td>
                                        @if($clasif->image)
                                            <img src="{{ asset(env('PUBLIC_PATH').'images/main/clasifications/'.$clasif->image) }}" alt="{{$clasif->name}}" style="max-height:30px;">
                                        @else
                                            No hay imagen actualmente
                                        @endif
                                    </td>
                                    <td><input type="file" name="clasif_{{$clasif->id}}"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Páginas extra</h3>
                    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target='#add-page-modal'>Agregar</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="extra-pages-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Mostrar en menu</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($extra_pages as $page)
                                <tr>
                                    <td>{{$page->nombre}}</td>
                                    <td>
                                        @if($page->menu)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link" data-toggle="modal" data-target='#edit-page-modal' data-obj="{{$page}}"><i class="fas fa-pencil-alt ml-1"></i></a>
                                        <a href="#" class="btn-link" onclick="deletePage({{$page->id}})"><i class="fas fa-trash ml-1"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <input type="submit">
      </form>
    </div>
    
    @include('administrador.add-page')
    @include('administrador.edit-page')
</div>
@endsection

@section('js')
<script>
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        //let alpha = event.color.alpha;
        //console.log(event.color.alpha);
        //$('#alpha').val(alpha)
    })

    $('#edit-page-modal').on('show.bs.modal', function(e) {
        var page = $(e.relatedTarget).data('obj');
        //console.log(category)
        $(e.currentTarget).find('span#id-pag').html(page.id);
        $(e.currentTarget).find('input[name="id"]').val(page.id);
        $(e.currentTarget).find('input[name="nombre"]').val(page.nombre);
        $(e.currentTarget).find('img').attr('src',"{{ asset(env('PUBLIC_PATH').'images/extra_pages/') }}/"+page.image);
        if(page.menu=='1'){
            $(e.currentTarget).find('input[name="menu"]').prop('checked',true);
        }else{
            $(e.currentTarget).find('input[name="menu"]').prop('checked',false);
        }   
        CKEDITOR.instances.editor2.setData(page.content)
        //$(e.currentTarget).find('textarea[name="content"]').html(page.content);
    });
    function deletePage(id){
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
            var url = '{{ route("admin.delete_page", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                method:'GET',
                url: url

            }).done((response)=>{
            Swal.fire(
                'Eliminada!',
                'La página extra fue eliminada.',
                'success'
                ).then(()=>{
                document.location.reload(true)
                })
            }).fail((response)=>{
            Swal.fire(
                'No eliminada!',
                'Tu página extra no fue eliminada.',
                'warning'
                )
            })
            
        }
        })
    }

</script>
@endsection