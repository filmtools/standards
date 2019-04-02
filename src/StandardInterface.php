<?php
namespace FilmTools\Standards;

interface StandardInterface
{

    /**
     * Returns a name or short description of this developing standard.
     * @return string
     */
    public function getName() : string;

    /**
     * Returns the file name with norm data
     * @return string
     */
    public function getNormDataFile() : string;

    /**
     * Returns the minimum film density of interest
     * @return float
     */
    public function getDmin() : float;

    /**
     * Returns the maximum film density of interest
     * @return float
     */
    public function getDmax() : float;
}
