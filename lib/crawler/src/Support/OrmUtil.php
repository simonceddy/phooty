<?php
namespace Phooty\Crawler\Support;

use Doctrine\ORM\EntityManagerInterface;

class OrmUtil
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
}
