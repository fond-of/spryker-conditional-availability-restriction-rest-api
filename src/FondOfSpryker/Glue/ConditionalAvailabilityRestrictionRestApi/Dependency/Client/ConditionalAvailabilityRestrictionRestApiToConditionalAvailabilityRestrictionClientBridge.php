<?php

namespace FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client;

use FondOfSpryker\Client\ConditionalAvailabilityRestriction\ConditionalAvailabilityRestrictionClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientBridge implements ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface
{
    /**
     * @var \FondOfSpryker\Client\ConditionalAvailabilityRestriction\ConditionalAvailabilityRestrictionClientInterface
     */
    protected $conditionalAvailabilityRestrictionClient;

    /**
     * @param \FondOfSpryker\Client\ConditionalAvailabilityRestriction\ConditionalAvailabilityRestrictionClientInterface $conditionalAvailabilityRestrictionClient
     */
    public function __construct(
        ConditionalAvailabilityRestrictionClientInterface $conditionalAvailabilityRestrictionClient
    ) {
        $this->conditionalAvailabilityRestrictionClient = $conditionalAvailabilityRestrictionClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithHasAvailabilityRestrictions(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer {
        return $this->conditionalAvailabilityRestrictionClient->expandCustomerTransferWithHasAvailabilityRestrictions(
            $customerTransfer
        );
    }
}
