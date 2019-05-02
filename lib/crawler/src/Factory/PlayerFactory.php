<?php
namespace Phooty\Crawler\Factory;

use Phooty\Crawler\Transport\PlayerTransport;

class PlayerFactory extends BaseFactory
{
    public function build(array $data = [])
    {
        $data = [
            'id' => $this->generateUuid(),
            'surname' => trim($data['surname']) ?? '',
            'given_names' => trim($data['given_names']) ?? '',
        ];

        return new PlayerTransport($data);
    }
}
