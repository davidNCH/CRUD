<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/",name="base_index")
     */
    public function indexAction(): Response
    {
        return $this->render("/base.html.twig");
    }


    /**
     * @Route("/cliente", name="pag_clientes")
     */
    public function clientesAction(): Response
    {

        return $this->render('cliente/index.html.twig');
    }

    /**
     * @Route("/concesionario", name="pag_concesionario")
     */
    public function concesionarioAction():Response
    {

        return $this->render('concesionario/index.html.twig');
    }

   /**
    * @Route("/marca", name="marca_index")
    */

    public function marcaAction(): Response
    {
        return $this->render('marca/index.html.twig');
    }

    /**
     * @Route("/venta", name="venta_index")
     */
    public function ventaAction(): Response
    {
        return $this->render('venta/index.html.twig');
    }

}
