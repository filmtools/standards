<?php
namespace FilmTools\Standards;

class Standard implements StandardInterface
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    protected $norm_data_file;


    /**
     * @var float
     */
    public $dmin;


    /**
     * @var float
     */
    public $dmax;



    public function __toString()
    {
        return $this->getName();
    }


    /**
     * @inheritDoc
     */
    public function getNormDataFile() : string
    {
        return join(\DIRECTORY_SEPARATOR, [
            dirname(__DIR__),
            'normdata',
            $this->norm_data_file
        ]);
    }


    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->name;
    }


    /**
     * @inheritDoc
     */
    public function getDmin() : float
    {
        return $this->dmin;
    }



    /**
     * @inheritDoc
     */
    public function getDmax() : float
    {
        return $this->dmax;
    }



}
