<?php

namespace FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi;

use Codeception\Test\Unit;
use Spryker\Glue\Kernel\Container;

class ConditionalAvailabilityRestrictionRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\ConditionalAvailabilityRestrictionRestApiDependencyProvider
     */
    protected $conditionalAvailabilityRestrictionRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityRestrictionRestApiDependencyProvider = new ConditionalAvailabilityRestrictionRestApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->conditionalAvailabilityRestrictionRestApiDependencyProvider->provideDependencies(
                $this->containerMock
            )
        );
    }
}
