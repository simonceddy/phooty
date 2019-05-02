<?php
namespace Phooty\Crawler\Factory;

use Phooty\Crawler\Transport\TeamTransport;

class TeamFactory extends BaseFactory
{
    public function build(array $data = [])
    {
        $data = [
            'id' => $this->generateUuid(),
            'name' => trim($data['name']) ?? '',
            'city' => trim($data['city']) ?? '',
            'short' => $data['short'] ?? ''
        ];

        return new TeamTransport($data);
    }
}
