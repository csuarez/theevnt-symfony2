<?php

namespace TheEvnt\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use TheEvnt\LibraryBundle\Entity\Book;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name) {
        return array('name' => $name);
    }

    /**
     * @Route("/createBook")
     */
     public function createBookAction() {
     	$book = new Book();
    	$book->setTitle('Las Uvas de la Ira');
    	$book->setYear(1939);

    	$em = $this->getDoctrine()->getEntityManager();
    	$em->persist($book);
    	$em->flush();

    	return new Response('Libro creado con ID: '.$book->getId());
     }

     /**
     * @Route("/deleteBook/{id}")
     */
     public function deleteBookAction($id) {

     	$book = $this->getDoctrine()
        		->getRepository('TheEvntLibraryBundle:Book')
        		->find($id);

        if (!$book) {
        	throw $this->createNotFoundException('Este libro no existe');
        }

    	$em = $this->getDoctrine()->getEntityManager();
    	$em->remove($book);
    	$em->flush();

    	return new Response('Se ha borrado el libro con ID: '.$id);
     }

     /**
     * @Route("/incrementYear/{id}")
     */
     public function incrementYearAction($id) {

     	$book = $this->getDoctrine()
        		->getRepository('TheEvntLibraryBundle:Book')
        		->find($id);

        if (!$book) {
        	throw $this->createNotFoundException('Este libro no existe');
        }

        $book->incrementYear();

    	$em = $this->getDoctrine()->getEntityManager();
    	$em->flush();

    	return new Response(
	    	'Se ha actualizado el libro ' . $id . ' al año: '. $book->getYear());
     }

     /**
     * @Route("/booksBefore/{year}")
     */
     public function beforeYearAction($year) {

        $books = $this->getDoctrine()
                ->getRepository('TheEvntLibraryBundle:Book')
                ->findBooksBeforeYear($year);

        if (!$books) {
            throw $this->createNotFoundException('No hay resultados');
        }

        return new Response("Número de resultados: " . sizeof($books));
     }
}
