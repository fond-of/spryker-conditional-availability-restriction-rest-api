<?php

namespace FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Processor\Expander;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Processor\Expander\CustomerExpander
     */
    protected $customerExpander;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface
     */
    protected $conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpander = new CustomerExpander(
            $this->conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpandCustomerTransferWithHasAvailabilityRestrictions(): void
    {
        $this->conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithHasAvailabilityRestrictions')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerExpander->expandCustomerTransferWithHasAvailabilityRestrictions(
                $this->customerTransferMock
            )
        );
    }
}
