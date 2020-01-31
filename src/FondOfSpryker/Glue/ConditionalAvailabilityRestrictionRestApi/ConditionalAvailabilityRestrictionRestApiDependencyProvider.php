<?php

namespace FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi;

use FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientBridge;
use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

class ConditionalAvailabilityRestrictionRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_CONDITIONAL_AVAILABILITY_RESTRICTION = 'CLIENT_CONDITIONAL_AVAILABILITY_RESTRICTION';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        $container = $this->addConditionalAvailabilityRestrictionClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addConditionalAvailabilityRestrictionClient(Container $container): Container
    {
        $container[static::CLIENT_CONDITIONAL_AVAILABILITY_RESTRICTION] = static function (Container $container) {
            return new ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientBridge(
                $container->getLocator()->conditionalAvailabilityRestriction()->client()
            );
        };

        return $container;
    }
}
