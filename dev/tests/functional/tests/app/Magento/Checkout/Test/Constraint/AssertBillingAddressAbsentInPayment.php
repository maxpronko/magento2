<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Checkout\Test\Constraint;

use Magento\Checkout\Test\Page\CheckoutOnepage;
use Magento\Mtf\Constraint\AbstractConstraint;

/**
 * Assert billing address is not present in selected payment method.
 */
class AssertBillingAddressAbsentInPayment extends AbstractConstraint
{
    /**
     * Assert billing address is not present in selected payment method.
     *
     * @param CheckoutOnepage $checkoutOnepage
     * @return void
     */
    public function processAssert(CheckoutOnepage $checkoutOnepage)
    {
        \PHPUnit_Framework_Assert::assertFalse(
            $checkoutOnepage->getPaymentBlock()
                ->getSelectedPaymentMethodBlock()
                ->getBillingBlock()
                ->isVisible(),
            'Billing address is present in payment method'
        );
    }

    /**
     * Returns string representation of successful assertion
     *
     * @return string
     */
    public function toString()
    {
        return 'Billing address is absent in payment method';
    }
}
