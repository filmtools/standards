<?php
namespace FilmTools\Standards;

interface StandardAwareInterface extends StandardProviderInterface
{

    /**
     * Sets the Standard instance.
     *
     * @param StandardInterface $standard
     */
    public function setStandard( StandardInterface $standard);
}
