@extends('layouts.main')
@section('relleno')


    <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>Sobre Nosotros</h1>
                    <p>
                        Nuestra repostería se llamará "RosSweet" y ofrecerá una
amplia variedad de productos de repostería de alta calidad,
incluyendo pasteles, cupcakes, panadería, postres
personalizados y catering para eventos. Estamos ubicados en
una zona céntrica y accesible de la ciudad y nos enfocaremos
en satisfacer a un público objetivo de jóvenes adultos y
familias que buscan productos artesanales y de excelente
calidad. Nuestros objetivos son crecer en el mercado local y
expandirnos en línea. Esperamos generar ingresos anuales
de $100,000 y obtener un margen de beneficio del 20% en el
primer año.
                    </p>
                </div>
                <div class="col-md-4">
                    <img width="70%"  src="{{ asset('img/sobre-nosotros.jpg') }}" alt="About Hero">
                </div>
            </div>
        </div>
    </section>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Misión, Visión y Valores</h1>
                <p>
                    Poner texto
                </p>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center">
                        <i class="fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-envelope-paper-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="m3 7.5 3.5 2L8 8.75l1.5.75 3.5-2v-6A1.5 1.5 0 0 0 11.5 0h-7A1.5 1.5 0 0 0 3 1.5v6ZM2 3.133l-.941.502A2 2 0 0 0 0 5.4v.313l2 1.173V3.133Zm12 3.753 2-1.173V5.4a2 2 0 0 0-1.059-1.765L14 3.133v3.753Zm-3.693 3.324L16 6.873v6.5l-5.693-3.163Zm5.634 4.274L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516ZM5.693 10.21 0 13.372v-6.5l5.693 3.338ZM8 1.982C9.664.309 13.825 3.236 8 7 2.175 3.236 6.336.31 8 1.982Z" />
                            </svg>
                        </i>
                    </div>
                    <h2 class="h5 mt-4 text-center">Misión</h2>
                    <p class="text-center"> Poder brindar postres de calidad y eficiencia, en donde podamos crear un sentido de pertenencia con el cliente 
                        al este interecatuar con nuestro servicio </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center">

                        <i class="fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                                <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z" />
                                <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z" />
                            </svg>
                        </i>
                        <i class="fad fa-pie"></i>
                    </div>
                    <h2 class="h5 mt-4 text-center">Visión</h2>
                    <p class="text-center">Ser reconocidos como una de las resposterias online mas grande de la ciudad 
                        con un nivel de eficiencia y rendimiento superior</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center">
                        <i class="fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z" />
                            </svg>
                        </i>
                    </div>
                    <h2 class="h5 mt-4 text-center">Valores</h2>
                    <p class="text-center">
                        Trabajo en equipo <br>
                        calidad <br>
                        transparencia <br>
                        carisma <br>
                        responsabilidad <br></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Poner texto</h1>
                    <p>
                        Poner texto
                    </p>
                </div>
              
            </div>
        </div>
    </section>
    <!--End Brands-->
@endsection