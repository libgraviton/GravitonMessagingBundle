<?php
/**
 * Bundle for all things messaging
 */

namespace Graviton\MessagingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use JDare\ClankBundle\JDareClankBundle;
use Graviton\BundleBundle\GravitonBundleInterface;

/**
 * GravitonMessagingBundle
 * 
 * @category GravitonBundle
 * @package  GravitonMessagingBundle
 * @author   Lucas Bickel <lucas.bickel@swisscom.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.com
 */
class GravitonMessagingBundle extends Bundle implements GravitonBundleInterface
{
    /**
     * instanciate bundles for bundle-bundle bundle
     *
     * Gravitons bundle-bundle uses this to let loaded bundles
     * automagically instanciate bundles.
     *
     * @return Array
     */
    public function getBundles()
    {
        return array(
            new JDareClankBundle(),
        );
    }
}
