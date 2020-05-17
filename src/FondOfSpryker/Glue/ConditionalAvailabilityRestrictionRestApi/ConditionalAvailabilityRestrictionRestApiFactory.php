<?php

namespace FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi;

use FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface;
use FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Processor\Expander\CustomerExpander;
use FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class ConditionalAvailabilityRestrictionRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Processor\Expander\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander(
            $this->getConditionalAvailabilityRestrictionClient()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface
     */
    protected function getConditionalAvailabilityRestrictionClient(): ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface
    {
        return $this->getProvidedDependency(ConditionalAvailabilityRestrictionRestApiDependencyProvider::CLIENT_CONDITIONAL_AVAILABILITY_RESTRICTION);
    }
}
