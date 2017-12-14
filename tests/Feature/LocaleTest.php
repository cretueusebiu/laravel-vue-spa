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
            ->postJson('/api/login')
            ->dump();
    }
}
