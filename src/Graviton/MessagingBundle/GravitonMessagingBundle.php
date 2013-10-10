<?php

namespace Graviton\MessagingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use JDare\ClankBundle\JDareClankBundle;

class GravitonMessagingBundle extends Bundle implements GravitonBundleInterface
{
    public function getBundles()
    {
        return array(
	    new JDareClankBundle(),
	);
    }
}
