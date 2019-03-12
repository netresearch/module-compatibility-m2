<?php
/**
 * See LICENSE.md for license details.
 */

namespace Netresearch\Compatibility\Controller\CsrfAware;

use Magento\Framework\App\Action\Action as CoreAction;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Action for providing forward compatibility for controllers that need to implement
 * \Magento\Framework\App\CsrfAwareActionInterface following Magento's 2.3 release
 *
 * @author Paul Siedler <paul.siedler@netresearch.de>
 * @link http://www.netresearch.de/
 */
abstract class Action extends CoreAction implements CsrfAwareActionInterface
{
    /**
     * {@inheritdoc}
     */
    abstract public function execute();

    /**
     * Generates the response object to use for creating a \Magento\Framework\App\Request\InvalidRequestException
     * instance
     *
     * @param RequestInterface $request
     * @return ResultInterface
     */
    abstract protected function getCsrfExceptionResponse(RequestInterface $request);

    /**
     * Proxy function for \Magento\Framework\App\CsrfAwareActionInterface::validateForCsrf
     *
     * Should return true, if the request is valid, otherwise false.
     *
     * @param RequestInterface $request
     * @return bool
     */
    abstract protected function proxyValidateForCsrf(RequestInterface $request);

    /**
     * {@inheritdoc}
     */
    public function createCsrfValidationException(RequestInterface $request): InvalidRequestException
    {
        $response = $this->getCsrfExceptionResponse($request);

        return new InvalidRequestException($response);
    }

    /**
     * {@inheritdoc}
     */
    public function validateForCsrf(RequestInterface $request): bool
    {
        return $this->proxyValidateForCsrf($request);
    }
}
