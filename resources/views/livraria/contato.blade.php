@extends('livraria/master')

@section('content')

<div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Contacte Nos</h1>
            <p>
                Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>

    

    <!-- Inicio Contacto -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Nome</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nome">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="inputsubject">Assunto</label>
                    <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Assunto">
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Messagem</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="Message" rows="8"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Emviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection