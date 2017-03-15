<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Helpers\StatusCodeHelper;

class StatusCodeHelperTest extends TestCase
{
    /** @test */
    public function it_should_return_true_with_successful_status_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isSuccessful(190)
        );
        $this->assertTrue(
            StatusCodeHelper::isPermanentStatus(190)
        );
        $this->assertFalse(
            StatusCodeHelper::isCancelled(190)
        );
        $this->assertFalse(
            StatusCodeHelper::isFailed(190)
        );
        $this->assertFalse(
            StatusCodeHelper::isPending(190)
        );
        $this->assertFalse(
            StatusCodeHelper::isRejected(190)
        );
        $this->assertFalse(
            StatusCodeHelper::isTemporaryStatus(190)
        );
    }

    /** @test */
    public function it_should_return_true_with_failed_status_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isFailed(490)
        );
        $this->assertTrue(
            StatusCodeHelper::isPermanentStatus(490)
        );
        $this->assertFalse(
            StatusCodeHelper::isCancelled(490)
        );
        $this->assertFalse(
            StatusCodeHelper::isSuccessful(490)
        );
        $this->assertFalse(
            StatusCodeHelper::isPending(490)
        );
        $this->assertFalse(
            StatusCodeHelper::isRejected(490)
        );
        $this->assertFalse(
            StatusCodeHelper::isTemporaryStatus(490)
        );
    }

    /** @test */
    public function it_should_return_true_with_validation_failure_status_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isFailed(491)
        );
        $this->assertTrue(
            StatusCodeHelper::isPermanentStatus(491)
        );
        $this->assertFalse(
            StatusCodeHelper::isCancelled(491)
        );
        $this->assertFalse(
            StatusCodeHelper::isSuccessful(491)
        );
        $this->assertFalse(
            StatusCodeHelper::isPending(491)
        );
        $this->assertFalse(
            StatusCodeHelper::isRejected(491)
        );
        $this->assertFalse(
            StatusCodeHelper::isTemporaryStatus(491)
        );
    }

    /** @test */
    public function it_should_return_true_with_technical_failure_status_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isFailed(492)
        );
        $this->assertTrue(
            StatusCodeHelper::isPermanentStatus(492)
        );
        $this->assertFalse(
            StatusCodeHelper::isCancelled(492)
        );
        $this->assertFalse(
            StatusCodeHelper::isSuccessful(492)
        );
        $this->assertFalse(
            StatusCodeHelper::isPending(492)
        );
        $this->assertFalse(
            StatusCodeHelper::isRejected(492)
        );
        $this->assertFalse(
            StatusCodeHelper::isTemporaryStatus(492)
        );
    }

    /** @test */
    public function it_should_return_true_with_rejected_status_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isRejected(690)
        );
        $this->assertTrue(
            StatusCodeHelper::isPermanentStatus(690)
        );
        $this->assertFalse(
            StatusCodeHelper::isCancelled(690)
        );
        $this->assertFalse(
            StatusCodeHelper::isSuccessful(690)
        );
        $this->assertFalse(
            StatusCodeHelper::isPending(690)
        );
        $this->assertFalse(
            StatusCodeHelper::isFailed(690)
        );
        $this->assertFalse(
            StatusCodeHelper::isTemporaryStatus(690)
        );
    }

    /** @test */
    public function it_should_return_true_with_cancelled_by_user_status_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isCancelled(890)
        );
        $this->assertTrue(
            StatusCodeHelper::isPermanentStatus(890)
        );
        $this->assertFalse(
            StatusCodeHelper::isRejected(890)
        );
        $this->assertFalse(
            StatusCodeHelper::isSuccessful(890)
        );
        $this->assertFalse(
            StatusCodeHelper::isPending(890)
        );
        $this->assertFalse(
            StatusCodeHelper::isFailed(890)
        );
        $this->assertFalse(
            StatusCodeHelper::isTemporaryStatus(890)
        );
    }

    /** @test */
    public function it_should_return_true_with_cancelled_by_user_merchant_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isCancelled(891)
        );
        $this->assertTrue(
            StatusCodeHelper::isPermanentStatus(891)
        );
        $this->assertFalse(
            StatusCodeHelper::isRejected(891)
        );
        $this->assertFalse(
            StatusCodeHelper::isSuccessful(891)
        );
        $this->assertFalse(
            StatusCodeHelper::isPending(891)
        );
        $this->assertFalse(
            StatusCodeHelper::isFailed(891)
        );
        $this->assertFalse(
            StatusCodeHelper::isTemporaryStatus(891)
        );
    }

    /** @test */
    public function it_should_return_true_with_awaiting_input_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isPending(790)
        );
        $this->assertTrue(
            StatusCodeHelper::isTemporaryStatus(790)
        );
        $this->assertFalse(
            StatusCodeHelper::isRejected(790)
        );
        $this->assertFalse(
            StatusCodeHelper::isSuccessful(790)
        );
        $this->assertFalse(
            StatusCodeHelper::isCancelled(790)
        );
        $this->assertFalse(
            StatusCodeHelper::isFailed(790)
        );
        $this->assertFalse(
            StatusCodeHelper::isPermanentStatus(790)
        );
    }

    /** @test */
    public function it_should_return_true_with_awaiting_processing_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isPending(791)
        );
        $this->assertTrue(
            StatusCodeHelper::isTemporaryStatus(791)
        );
        $this->assertFalse(
            StatusCodeHelper::isRejected(791)
        );
        $this->assertFalse(
            StatusCodeHelper::isSuccessful(791)
        );
        $this->assertFalse(
            StatusCodeHelper::isCancelled(791)
        );
        $this->assertFalse(
            StatusCodeHelper::isFailed(791)
        );
        $this->assertFalse(
            StatusCodeHelper::isPermanentStatus(791)
        );
    }

    /** @test */
    public function it_should_return_true_with_awaiting_customer_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isPending(792)
        );
        $this->assertTrue(
            StatusCodeHelper::isTemporaryStatus(792)
        );
        $this->assertFalse(
            StatusCodeHelper::isRejected(792)
        );
        $this->assertFalse(
            StatusCodeHelper::isSuccessful(792)
        );
        $this->assertFalse(
            StatusCodeHelper::isCancelled(792)
        );
        $this->assertFalse(
            StatusCodeHelper::isFailed(792)
        );
        $this->assertFalse(
            StatusCodeHelper::isPermanentStatus(792)
        );
    }

    /** @test */
    public function it_should_return_true_with_awaiting_hold_code()
    {
        $this->assertTrue(
            StatusCodeHelper::isPending(793)
        );
        $this->assertTrue(
            StatusCodeHelper::isTemporaryStatus(793)
        );
        $this->assertFalse(
            StatusCodeHelper::isRejected(793)
        );
        $this->assertFalse(
            StatusCodeHelper::isSuccessful(793)
        );
        $this->assertFalse(
            StatusCodeHelper::isCancelled(793)
        );
        $this->assertFalse(
            StatusCodeHelper::isFailed(793)
        );
        $this->assertFalse(
            StatusCodeHelper::isPermanentStatus(793)
        );
    }
}