<?php

namespace FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface;
use FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\Container;

class ConditionalAvailabilityRestrictionRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\ConditionalAvailabilityRestrictionRestApiFactory
     */
    protected $conditionalAvailabilityRestrictionRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface
     */
    protected $conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityRestrictionRestApiFactory = new ConditionalAvailabilityRestrictionRestApiFactory();
        $this->conditionalAvailabilityRestrictionRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateCustomerExpander(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(ConditionalAvailabilityRestrictionRestApiDependencyProvider::CLIENT_CONDITIONAL_AVAILABILITY_RESTRICTION)
            ->willReturn($this->conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterfaceMock);

        $this->assertInstanceOf(
            CustomerExpanderInterface::class,
            $this->conditionalAvailabilityRestrictionRestApiFactory->createCustomerExpander()
        );
    }
}
