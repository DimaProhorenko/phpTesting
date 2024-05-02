<?php

declare(strict_types=1);

namespace Tests\Unit;

use app\Core\Invoice;
use app\Core\Services\EmailService;
use app\Core\Services\GatewayService;
use app\Core\Services\SalesTaxService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{

    private Invoice $invoice;
    private array $customer;
    private float $amount;

    protected function setUp(): void
    {
        parent::setUp();
        $this->customer = ['name' => 'Dima'];
        $this->amount = 150;
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $gatewayServiceMock = $this->createMock(GatewayService::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        $gatewayServiceMock
            ->method('charge')
            ->willReturn(true);
        $emailServiceMock
            ->expects($this->once())
            ->method('send')
            ->with($this->customer, 'receipt');
        $this->invoice = new Invoice($salesTaxServiceMock, $gatewayServiceMock, $emailServiceMock);
    }

    public function test_it_processes_invoice(): void
    {

        $result = $this->invoice->process($this->customer, $this->amount);

        $this->assertEquals(true, $result);
    }

    public function test_it_sends_email_when_invoice_processed()
    {
        $result = $this->invoice->process($this->customer, $this->amount);
    }
}
