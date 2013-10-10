<?php

namespace Graviton\MessagingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use JDare\ClankBundle\JDareClankBundle;
use Graviton\BundleBundle\GravitonBundleInterface;

class GravitonMessagingBundle extends Bundle implements GravitonBundleInterface
{
    public function getBundles()
    {
        return array(
	    new JDareClankBundle(),
	);
    }
}
