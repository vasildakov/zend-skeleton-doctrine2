<?php
// ./module/Backoffice/src/Backoffice/Controller/CampaignController.php
namespace Backoffice\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class CampaignController extends AbstractActionController
{

    public function indexAction()
    {

        return new ViewModel(array(

        ));
    }


    public function createAction()
    {
        #$form = new \Core\Form\Campaign\TestForm();
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TestForm');

        $request = $this->getRequest();

        if($request->isPost()) {

            $form->setData($request->getPost());

            if ($form->isValid()) {

                $campaign = new \Core\Entity\Campaign;
                $campaign->setName($request->getPost('name'));
                $campaign->setStartedAt($request->getPost('started_at'));
                $campaign->setEndedAt($request->getPost('ended_at'));
                // var_dump($campaign);

                var_dump( array($request->getPost()));  
                
            }else {
                $messages = $form->getMessages();
                #var_dump($messages);
            }

        }


        return new ViewModel(array(
            "form" => $form,
            #"campaign" => $campaign
        ));
    }    


}