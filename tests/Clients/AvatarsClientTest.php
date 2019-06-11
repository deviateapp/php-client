<?php

namespace Deviate\Clients\Tests\Clients;

use Deviate\Clients\Clients\AvatarsClient;
use Deviate\Clients\Tests\TestCase;
use Illuminate\Http\UploadedFile;

class AvatarsClientTest extends TestCase
{
    /** @test */
    public function it_can_make_a_request_to_upload_a_new_avatar()
    {
        $client = new AvatarsClient($this->transport);
        $file = UploadedFile::fake()->image('avatar.jpg');

        $client->addAvatar(1, $file);

        $this->assertCalled('POST', '/users/1/avatars', [
            'content' => base64_encode(file_get_contents($file->path())),
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_set_the_users_default_avatar()
    {
        $client = new AvatarsClient($this->transport);

        $client->addDefaultAvatar(1);

        $this->assertCalled('POST', '/users/1/avatars', [
            'content' => null,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_delete_an_avatar()
    {
        $client = new AvatarsClient($this->transport);

        $client->deleteAvatar(1);

        $this->assertCalled('DELETE', '/users/1/avatars');
    }

    /** @test */
    public function it_can_make_a_request_to_get_a_users_avatar()
    {
        $client = new AvatarsClient($this->transport);

        $client->fetchAvatar(1);

        $this->assertCalled('GET', '/users/1/avatars');
    }
}
