<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocaleTest extends TestCase
{
    /** @test */
    public function fetch_translations()
    {
        $this->getJson('/api/translations/en')
            ->assertSuccessful()
            ->assertJson(['ok' => 'Ok']);
    }

    /** @test */
    function set_locale_from_header()
    {
        $this->withHeaders(['Accept-Language' => 'zh-CN'])
            ->postJson('/api/login');

        $this->assertEquals('zh-CN', $this->app->getLocale());
    }

    /** @test */
    function set_locale_from_header_short()
    {
        $this->withHeaders(['Accept-Language' => 'en-US'])
            ->postJson('/api/login');

        $this->assertEquals('en', $this->app->getLocale());
    }
}
