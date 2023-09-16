@extends('layouts.app')



@section('contenido')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Texto a Binario</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Texto a Binario</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Texto a binario</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="texto">Texto:</label>
                                    <textarea class="form-control" id="texto" rows="4"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary" id="convertirTexto">Convertir a Binario</button>
                                <div class="form-group">
                                    <label for="resultado">Resultado:</label>
                                    <textarea class="form-control" id="resultado1" rows="4" readonly></textarea>
                                </div>
                            </form>


                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Binario a  binario</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="texto">Binario:</label>
                                    <textarea class="form-control" id="binario" rows="4"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary" id="convertirBinario">Convertir a Texto</button>
                                <div class="form-group">
                                    <label for="resultado">Resultado:</label>
                                    <textarea class="form-control" id="resultado2" rows="4" readonly></textarea>
                                </div>
                            </form>



                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>


        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('scripts')

    <script>
        document.getElementById('convertirTexto').addEventListener('click', function () {
            const texto = document.getElementById('texto').value;
            const binario = textoToBinario8Bits(texto);
            document.getElementById('resultado1').value = binario;
        });

        function textoToBinario8Bits(texto) {
            let binario = '';
            for (let i = 0; i < texto.length; i++) {
                const charCode = texto.charCodeAt(i);
                const binaryChar = charCode.toString(2).padStart(8, '0'); // Asegurar 8 bits
                binario += binaryChar + ' ';
            }
            return binario.trim(); // Eliminar espacio final
        }

        document.getElementById('convertirBinario').addEventListener('click', function () {
            const binario = document.getElementById('binario').value;
            const texto = binarioToTexto(binario);
            document.getElementById('resultado2').value = texto;
        });

        function binarioToTexto(binario) {
            const bytes = binario.match(/.{1,9}/g);

            console.log(bytes);

            let texto = '';
            for (let i = 0; i < bytes.length; i++) {
                const byte = parseInt(bytes[i], 2);
                texto += String.fromCharCode(byte);
            }
            return texto;
        }
    </script>


@endpush
