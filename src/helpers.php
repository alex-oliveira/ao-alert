<?php

if (!function_exists('alert')) {

    /**
     * Get the available alert instance.
     *
     * @return \AoAlert\Alert
     */
    function alert()
    {
        return app('alert');
    }

}