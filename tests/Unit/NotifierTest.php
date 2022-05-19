<?php

namespace Tests\Unit;


use Tests\TestCase;

class NotifierTest extends TestCase
{
    private array $request;

    public function setUp(): void
    {
        parent::setUp();

        $this->request = [
            'pizza' => [
                'type' => 'mozzarella',
                'quantity' => 1,
                'sauce' => ''
            ],
        ];
    }

    public function test_a_it_sends_email_notification_after_ordering_pizza()
    {
        $this->withoutExceptionHandling();

        $this->request['broadcasting-channels'] = ['email'];

        $response = $this->postJson(route('pizza.store'), $this->request);

        $response->assertSeeText("your notification has been sent, via email");
    }

    public function test_a_it_sends_facebook_notification_after_ordering_pizza()
    {
        $this->withoutExceptionHandling();

        $this->request['broadcasting-channels'] = ['facebook'];

        $response = $this->postJson(route('pizza.store'), $this->request);

        $response->assertSeeText("your notification has been sent, via facebook");
        $response->assertDontSeeText("your notification has been sent, via email");
    }

    public function test_a_it_sends_slack_notification_after_ordering_pizza()
    {
        $this->withoutExceptionHandling();

        $this->request['broadcasting-channels'] = ['slack'];

        $response = $this->postJson(route('pizza.store'), $this->request);

        $response->assertSeeText("your notification has been sent, via slack");
        $response->assertDontSeeText("your notification has been sent, via facebook");
        $response->assertDontSeeText("your notification has been sent, via email");
    }


    public function test_a_it_sends_sms_notification_after_ordering_pizza()
    {
        $this->withoutExceptionHandling();

        $this->request['broadcasting-channels'] = ['sms'];

        $response = $this->postJson(route('pizza.store'), $this->request);

        $response->assertSeeText("your notification has been sent, via sms");
        $response->assertDontSeeText("your notification has been sent, via facebook");
        $response->assertDontSeeText("your notification has been sent, via email");
        $response->assertDontSeeText("your notification has been sent, via slack");
    }

    public function test_a_it_sends_multiple_notification_after_ordering_pizza()
    {
        $this->withoutExceptionHandling();

        $this->request['broadcasting-channels'] = [
            'email',
            'sms'
        ];

        $response = $this->postJson(route('pizza.store'), $this->request);

        $response->assertSeeText("your notification has been sent, via sms");
        $response->assertDontSeeText("your notification has been sent, via facebook");
        $response->assertSeeText("your notification has been sent, via email");
        $response->assertDontSeeText("your notification has been sent, via slack");


        $this->request['broadcasting-channels'] = [
            'facebook',
            'slack'
        ];

        $response = $this->postJson(route('pizza.store'), $this->request);

        $response->assertDontSeeText("your notification has been sent, via sms");
        $response->assertSeeText("your notification has been sent, via facebook");
        $response->assertDontSeeText("your notification has been sent, via email");
        $response->assertSeeText("your notification has been sent, via slack");
    }
}
