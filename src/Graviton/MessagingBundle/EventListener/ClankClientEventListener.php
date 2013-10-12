<?php
/**
 * listener for clank events
 */

namespace Graviton\MessagingBundle\EventListener;

use Symfony\Bridge\Monolog\Logger;
use JDare\ClankBundle\Event\ClientEvent;
use JDare\ClankBundle\Event\ClientErrorEvent;

/**
 * ClankClientEventListener
 *
 * @category EventListener
 * @package  GravitonMessagingBundle
 * @author   Lucas Bickel <lucas.bickel@swisscom.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.com
 */
class ClankClientEventListener
{
    /**
     * set a di service container
     *
     * @param Logger $logger service conatiner
     *
     * @return void
     */
    public function setLogger(Logger $logger = null)
    {
        $this->logger = $logger;
    }

    /**
     * Called whenever a client connects
     *
     * @param ClientEvent $event clank client event
     *
     * @return void
     */
    public function onClientConnect(ClientEvent $event)
    {
        if ($this->logger) {
            $this->logger->info('clank connected '.$event->resourceId);
        }
    }

    /**
     * Called whenever a client disconnects
     *
     * @param ClientEvent $event clank client event
     *
     * @return void
     */
    public function onClientDisconnect(ClientEvent $event)
    {
        if ($this->logger) {
            $this->logger->info('clank disconnected '.$event->resourceId);
        }
    }

    /**
     * Called whenever a client errors
     *
     * @param ClientErrorEvent $event clank client error event
     *
     * @return void
     */
    public function onClientError(ClientErrorEvent $event)
    {
        if ($this->logger) {
            $message = $event->getException()->getMessage();
            $this->logger->err('clank connection error: '.$message);
        }
    }
}
