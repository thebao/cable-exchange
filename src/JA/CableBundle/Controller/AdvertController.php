<?php


namespace JA\CableBundle\Controller;

use JA\CableBundle\Entity\Cable;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
    public function indexAction()
    {
        return $this->render('JACableBundle:Advert:index.html.twig');
    }

    public function addAction()
    {
        return $this->render('JACableBundle:Advert:index.html.twig');
    }

    public function viewAction($id)
    {
        return $this->render('JACableBundle:Advert:view.html.twig', array('cable'=>$id));
    }

    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $cable = $em->getRepository('JACableBundle:Cable')->find($id);

        if (null === $cable){
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }

        $em->remove($cable);
        $em->flush();

        return $this->redirect($this->generateUrl('ja_cable_home'));
    }

    public function returnJsonAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('JACableBundle:Cable');
        $cables = $repository->findAll();

        $array = array();
        foreach ($cables as $cable) {
            /** @var $cable Cable */
            $array[] = $cable->getJSONArray();
        }

        return new JsonResponse($array);
    }
}
?>