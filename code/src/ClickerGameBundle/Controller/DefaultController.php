<?php

namespace ClickerGameBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DefaultController extends UserAwareController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $user = $this->getAuthorizedUser();

        $request = $this->container->get('main_request');
        var_dump($request);

        $playerRequest = $this->container->get('player_request');
        var_dump($playerRequest);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/stream", name="stream")
     */
    public function streamAction(Request $request)
    {
        $response = new StreamedResponse(function () {
            for($i =0; $i <= 50; $i++) {
                echo $i;echo "<br>";
                sleep(3);
            }
        });

        return $response;
    }

}
