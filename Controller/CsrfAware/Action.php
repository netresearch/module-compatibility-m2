<?php

namespace Netresearch\Compatibility\Controller\CsrfAware;

use Magento\Framework\App\Action\Action as CoreAction;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultInterface;

abstract class Action extends CoreAction
{
    abstract public function execute();

    /**
     * @param RequestInterface $request
     * @return ResultInterface
     */
    abstract protected function getCsrfExceptionResponse(RequestInterface $request);

    /**
     * @param RequestInterface $request
     * @return bool
     */
    abstract protected function proxyValidateForCsrf(RequestInterface $request);

}
