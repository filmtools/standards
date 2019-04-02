<?php
namespace FilmTools\Standards;

interface StandardProviderInterface
{

    /**
     * Returns the Standard instance.
     *
     * @return StandardInterface|null
     */
    public function getStandard() : ?StandardInterface;
}
