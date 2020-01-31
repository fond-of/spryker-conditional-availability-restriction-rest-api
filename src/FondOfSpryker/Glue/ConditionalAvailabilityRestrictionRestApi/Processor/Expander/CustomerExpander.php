<?php

namespace FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Processor\Expander;

use FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpander implements CustomerExpanderInterface
{
    /**
     * @var \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface
     */
    protected $conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClient;

    /**
     * @param \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface $conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClient
     */
    public function __construct(
        ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface $conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClient
    ) {
        $this->conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClient = $conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithHasAvailabilityRestrictions(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer {
        return $this->conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClient
            ->expandCustomerTransferWithHasAvailabilityRestrictions($customerTransfer);
    }
}
