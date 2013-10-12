<?php
/**
 * Test bundle
 */

namespace Graviton\MessagingBundle\Tests;

use Graviton\MessagingBundle\GravitonMessagingBundle;
use JDare\ClankBundle\JDareClankBundle;

/**
 * GravitonMessagingBundleTest
 * 
 * @category Tests
 * @package  GravitonMessagingBundle
 * @author   Lucas Bickel <lucas.bickel@swisscom.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.com
 */
class GravitonMessageBundleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * set up system under test
     *
     * @return void
     */
    public function setUp()
    {
        $this->sut = new GravitonMessagingBundle();
    }
    
    /**
     * test getBundle method
     *
     * @return void
     */
    public function testGetBundle()
    {
        $bundles = $this->sut->getBundles();

        $this->assertInstanceOf(
            'JDare\ClankBundle\JDareClankBundle',
            $bundles[0]
        );
    }
}
