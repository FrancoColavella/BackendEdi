<?php

class peliculasController{

        public function RetornarPeliculas($request, $response, $args){
            $listaDeParametros = $request->getParsedBody();

            $jsonpeliculas = Peliculas::obtenerPeliculas();
            $response->getBody()->Write(json_encode($jsonpeliculas));
            return $response ->withHeader('Content-Type', 'application/json');

        }
        public function Alta($request, $response, $args){
            $listaDeParametros = $request->getParsedBody();
        

                $peliculas = new Peliculas();
                $peliculas->id_pelicula = $listaDeParametros['id_pelicula'];
                $peliculas->titulo = $listaDeParametros['titulo'];
                $peliculas->duracion = $listaDeParametros['duracion'];
                $peliculas->descripcion = $listaDeParametros['descripcion'];
                $peliculas->puntaje = $listaDeParametros['puntaje'];
                $peliculas->imagen = $listaDeParametros['imagen'];
                $peliculas->anio = $listaDeParametros['anio'];
                $peliculas->trailer = $listaDeParametros['trailer'];

                Peliculas::CrearPeliculas($peliculas);
                $response->getBody()->write(json_encode($peliculas));

                return $response;
        }
        public function obtenerFormMod($request, $response, $args){
            $listaDeParametros = $request->getParsedBody();
            $peliculas = new Peliculas();
            $peliculas->id_pelicula = $listaDeParametros['id_pelicula'];

            $jsonpeliculas = Peliculas::FormModPelicula($peliculas);

            $response->getBody()->Write(json_encode($jsonpeliculas));
            return $response ->withHeader('Content-Type', 'application/json');


        }
        public function ModPelicula($request, $response, $args){
            $listaDeParametros = $request->getParsedBody();

            $peliculas = new Peliculas();
            $peliculas->titulo = $listaDeParametros['titulo'];
            $peliculas->duracion = $listaDeParametros['duracion'];
            $peliculas->descripcion = $listaDeParametros['descripcion'];
            $peliculas->puntaje = $listaDeParametros['puntaje'];
            $peliculas->imagen = $listaDeParametros['imagen'];
            $peliculas->anio = $listaDeParametros['anio'];
            $peliculas->trailer = $listaDeParametros['trailer'];
            $peliculas->id_pelicula = $listaDeParametros['id_pelicula'];

            Peliculas::ModificarPeliculas($peliculas);
            $response->getBody()->write("pelicula modificada");

            return $response;

        }
        public function DeletePelicula($request, $response, $args){
            $listaDeParametros = $request->getParsedBody();
            $peliculas=  new Peliculas();
            $peliculas->id_pelicula =  $listaDeParametros['id_pelicula'];

            Peliculas::EliminarPelicula($peliculas);
            $response->getBody()->Write("pelicula eliminada");
            return $response;

        }


}

?>