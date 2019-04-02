<?php
namespace FilmTools\Standards;

trait StandardProviderTrait
{

    /**
     * @var StandardInterface|null
     */
    public $standard;


    /**
     * Returns the Standard instance.
     *
     * @return StandardInterface|null
     */
    public function getStandard() : ?StandardInterface
    {
        return $this->standard;
    }
}
