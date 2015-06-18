<?php


namespace JA\CableBundle\Controller;

use JA\CableBundle\Entity\Cable;
use JA\CableBundle\Form\CableType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('JACableBundle:Brands');
        $allBrands = $em->findAll();

        return $this->render('JACableBundle:Advert:index.html.twig', array('brands'=>$allBrands));
    }

    public function addAction(Request $request)
    {
        $cable = new Cable();

        $form = $this->get('form.factory')->create(new CableType, $cable);

        $form->handleRequest($request);

        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($cable);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée !');

            return $this->render('JACableBundle:Advert:view.html.twig', array(
                'cable' => $cable
            ));
        }


        return $this->render('JACableBundle:Advert:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $cable = $em->getRepository('JACableBundle:Cable')->find($id);

        if (null === $cable){
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }

        return $this->render('JACableBundle:Advert:view.html.twig', array('cable' => $cable));
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