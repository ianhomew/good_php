<?php

include_once 'AbstractArea.php';

class Desert extends AbstractArea
{
    public function treasure()
    {
        return 10;
    }
}
