@extends('layouts.main')

@section('relleno')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Agrega Categorias:</h1>
                            <p>agrega una nueva categoria</p>

                            <div class="row py-5">
                                <form class="col-md-9 m-auto" method="post" action="{{route('categories.store')}}" role="form">

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputname">Nombre</label>
                                        <input type="text" class="form-control mt-1" id="name" name="name"
                                            placeholder="nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputmessage">Descripcion</label>
                                        <textarea class="form-control mt-1" id="description" name="description" placeholder="descripcion" rows="8"></textarea>
                                    </div>
                                    
                                    <div class="row">
                                        <form action="" method="GET">
                                            <input type="hidden" name="product-title" value="Activewear">
                                            <div class="row pb-3">
                                                <div class="col d-grid">
                                                    <button type="submit" class="btn btn-success btn-lg" name="submit"
                                                        value="buy">Agregar</button>
                                                </div>
                                     
                                            </div>
                                    </div>
                                </form>
                            </div>

                           
                            </form>

                        </div>
                        <div class="card-body">
                            

                            <div class="table-responsive">
                                <table class="table align-middle mb-0 bg-white">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                                        class="btn btn-primary btn-sm rounded-square">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-eye"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 12c-4 0-8 .248-8-2.5C0 7.497 3.989 7 8 7s8 .497 8 2.5C16 12.248 12 12 8 12zm0-4a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                                        </svg>

                                                    </a>
                                                    <form
                                                        action="{{ route('categories.destroy', ['id' => $category->id]) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm rounded-square">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-trash"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M1.5 4.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .5.5v.5H1v-.5zm1 1V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5.5h1V14a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3V5.5h1z" />
                                                                <path
                                                                    d="M0 5.5V4.51a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 .5.5V5.5H0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M5.5 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5V2h-5v-.5zm6 .5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1V2h6v.5z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
@endsection
