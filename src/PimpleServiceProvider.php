<?php
namespace FilmTools\Standards;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * This ServiceProvider refines and customizes the services defined
 * in other ServiceProviders and makes them work in this application.
 */
class PimpleServiceProvider implements ServiceProviderInterface
{


    /**
     * @param  Container $dic
     */
    public function register(Container $dic)
    {

        /**
         * @return string
         */
        $dic['DevelopingStandard.default'] = function($dic) {
            'iso6';
        };


        /**
         * @return StandardsFactory;
         */
        $dic['DevelopingStandard.Factory'] = function($dic) {
            $standard_name = $dic['DevelopingStandard.default'];

            return new StandardsFactory( $standard_name);
        };


        /**
         * @return StandardInterface;
         */
        $dic['DevelopingStandard'] = function($dic) {
            $factory = $dic['DevelopingStandard.Factory'];
            $name    = $dic['DevelopingStandard.default'];

            return $factory( $name );
        };



    }
}
