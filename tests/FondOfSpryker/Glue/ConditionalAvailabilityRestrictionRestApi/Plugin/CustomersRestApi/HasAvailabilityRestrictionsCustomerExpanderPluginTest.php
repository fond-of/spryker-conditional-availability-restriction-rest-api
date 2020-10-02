<?php

namespace FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Plugin\CustomersRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\ConditionalAvailabilityRestrictionRestApiFactory;
use FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Processor\Expander\CustomerExpanderInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class HasAvailabilityRestrictionsCustomerExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Plugin\CustomersRestApi\HasAvailabilityRestrictionsCustomerExpanderPlugin
     */
    protected $hasAvailabilityRestrictionsCustomerExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\ConditionalAvailabilityRestrictionRestApiFactory
     */
    protected $conditionalAvailabilityRestrictionRestApiFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Processor\Expander\CustomerExpanderInterface
     */
    protected $customerExpanderInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityRestrictionRestApiFactoryMock = $this->getMockBuilder(ConditionalAvailabilityRestrictionRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpanderInterfaceMock = $this->getMockBuilder(CustomerExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->hasAvailabilityRestrictionsCustomerExpanderPlugin = new class (
            $this->conditionalAvailabilityRestrictionRestApiFactoryMock
        ) extends HasAvailabilityRestrictionsCustomerExpanderPlugin {
            /**
             * @var \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\ConditionalAvailabilityRestrictionRestApiFactory
             */
            protected $conditionalAvailabilityRestrictionRestApiFactory;

            /**
             * @param \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\ConditionalAvailabilityRestrictionRestApiFactory $conditionalAvailabilityRestrictionRestApiFactory
             */
            public function __construct(ConditionalAvailabilityRestrictionRestApiFactory $conditionalAvailabilityRestrictionRestApiFactory)
            {
                $this->conditionalAvailabilityRestrictionRestApiFactory = $conditionalAvailabilityRestrictionRestApiFactory;
            }

            /**
             * @return \Spryker\Glue\Kernel\AbstractFactory
             */
            protected function getFactory(): AbstractFactory
            {
                return $this->conditionalAvailabilityRestrictionRestApiFactory;
            }
        };
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->conditionalAvailabilityRestrictionRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createCustomerExpander')
            ->willReturn($this->customerExpanderInterfaceMock);

        $this->customerExpanderInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithHasAvailabilityRestrictions')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->hasAvailabilityRestrictionsCustomerExpanderPlugin->expand(
                $this->customerTransferMock,
                $this->restRequestInterfaceMock
            )
        );
    }
}
