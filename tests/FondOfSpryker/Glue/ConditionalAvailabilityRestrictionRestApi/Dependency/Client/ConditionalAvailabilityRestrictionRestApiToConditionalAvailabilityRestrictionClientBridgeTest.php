<?php

namespace FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client;

use Codeception\Test\Unit;
use FondOfSpryker\Client\ConditionalAvailabilityRestriction\ConditionalAvailabilityRestrictionClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ConditionalAvailabilityRestrictionRestApi\Dependency\Client\ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientBridge
     */
    protected $conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\ConditionalAvailabilityRestriction\ConditionalAvailabilityRestrictionClientInterface
     */
    protected $conditionalAvailabilityRestrictionClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityRestrictionClientInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityRestrictionClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientBridge = new ConditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientBridge(
            $this->conditionalAvailabilityRestrictionClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpandCustomerTransferWithHasAvailabilityRestrictions(): void
    {
        $this->conditionalAvailabilityRestrictionClientInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithHasAvailabilityRestrictions')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->conditionalAvailabilityRestrictionRestApiToConditionalAvailabilityRestrictionClientBridge->expandCustomerTransferWithHasAvailabilityRestrictions(
                $this->customerTransferMock
            )
        );
    }
}
