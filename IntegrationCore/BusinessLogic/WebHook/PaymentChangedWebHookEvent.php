<?php

namespace Mollie\Bundle\PaymentBundle\IntegrationCore\BusinessLogic\WebHook;

use Mollie\Bundle\PaymentBundle\IntegrationCore\BusinessLogic\Http\DTO\Payment;
use Mollie\Bundle\PaymentBundle\IntegrationCore\BusinessLogic\OrderReference\Model\OrderReference;
use Mollie\Bundle\PaymentBundle\IntegrationCore\Infrastructure\Utility\Events\Event;

/**
 * Class PaymentChangedWebHookEvent
 *
 * @package Mollie\Bundle\PaymentBundle\IntegrationCore\BusinessLogic\WebHook
 */
class PaymentChangedWebHookEvent extends Event
{
    /**
     * Fully qualified name of this class.
     */
    const CLASS_NAME = __CLASS__;

    /**
     * @var OrderReference
     */
    private $orderReference;
    /**
     * @var Payment
     */
    private $currentPayment;
    /**
     * @var Payment
     */
    private $newPayment;

    /**
     * PaymentChangedWebHookEvent constructor.
     *
     * @param OrderReference $orderReference
     * @param Payment $newPayment
     */
    public function __construct(OrderReference $orderReference, Payment $newPayment)
    {
        $this->orderReference = $orderReference;
        $this->currentPayment = Payment::fromArray($orderReference->getPayload());
        $this->newPayment = $newPayment;
    }

    /**
     * @return OrderReference
     */
    public function getOrderReference()
    {
        return $this->orderReference;
    }

    /**
     * @return Payment
     */
    public function getCurrentPayment()
    {
        return $this->currentPayment;
    }

    /**
     * @return Payment
     */
    public function getNewPayment()
    {
        return $this->newPayment;
    }
}
