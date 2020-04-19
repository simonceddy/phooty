<?php
namespace Phooty\Contracts;

interface Factory
{
    /**
     * Create a new Model instance.
     *
     * @param array $data Any relevant data given here should be used instead of Faker
     * @param array $options Additional factory options
     *
     * @return object A model object instance.
     */
    public function create(array $data = [], array $options = []);
}
