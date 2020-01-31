<?php

namespace FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client;

use Generated\Shared\Transfer\CustomerTransfer;

interface ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithHasAvailabilityRestrictions(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer;
}
