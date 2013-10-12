<?php
/**
 * Test clank client eventlistener
 */

namespace Graviton\MessagingBundle\Tests\EventListener;

use Graviton\MessagingBundle\EventListener\ClankClientEventListener;

/**
 * ClankClientEventListenerTest
 * 
 * @category Tests
 * @package  GravitonMessagingBundle
 * @author   Lucas Bickel <lucas.bickel@swisscom.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.com
 */
class ClankClientEventListenerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test onClientConnect method
     *
     * @return void
     */
    public function testOnClientConnect()
    {
        $logger = $this->getLoggerMock('clank connected 1234');
        $event = $this->getClientEventMock(1234);

        $sut = new ClankClientEventListener();
        $sut->setLogger($logger);

        $sut->onClientConnect($event);
    }

    /**
     * test onClientDisconnect method
     *
     * @return void
     */
    public function testOnClientDisconnect()
    {
        $logger = $this->getLoggerMock('clank disconnected 1234');
        $event = $this->getClientEventMock(1234);

        $sut = new ClankClientEventListener();
        $sut->setLogger($logger);

        $sut->onClientDisconnect($event);
    }

    /**
     * test onClientError method
     *
     * @return void
     */
    public function testOnClientError()
    {
        $logger = $this->getLoggerMock(
            'clank connection error: error-msg',
            'err'
        );
        $exception = new \Exception('error-msg');
        $event = $this->getClientEventMock(
            1234,
            'JDare\ClankBundle\Event\ClientErrorEvent'
        );
        $event->expects($this->once())
            ->method('getException')
            ->will($this->returnValue($exception));

        $sut = new ClankClientEventListener();
        $sut->setLogger($logger);

        $sut->onClientError($event);
    }

    /**
     * get mock for monolog logger bridge
     *
     * @param String $msg    Message to check for
     * @param String $method logger method to check for
     *
     * @return Symfony\Bridge\Monolog\Logger
     */
    protected function getLoggerMock($msg, $method = 'info')
    {
        $logger = $this->getMockBuilder('Symfony\Bridge\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $logger->expects($this->once())
            ->method($method)
            ->with($msg);

        return $logger;
    }

    /**
     * get mock for clank event
     *
     * @param Integer $resourceId resource id to set on the mocked object
     * @param String  $className  event class to mock (used for error test)
     *
     * @return JDare\ClankBundle\Event\ClientEvent|Object
     */
    protected function getClientEventMock(
        $resourceId,
        $className = 'JDare\ClankBundle\Event\ClientEvent'
    )
    {
        $clientEvent = $this->getMockBuilder($className)
            ->disableOriginalConstructor()
            ->getMock();
        $clientEvent->resourceId = $resourceId;
        return $clientEvent;
    }
}
