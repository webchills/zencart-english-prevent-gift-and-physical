<?php
/**
 * @copyright 2021-2024 webchills (www.webchills.at)
 * @copyright Portions Copyright 2003-2024 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: config.prevent_gift_and_physical.php 2024-03-07 14:12:04 webchills$
 */ 
$autoLoadConfig[190][] = array('autoType'=>'class',
                              'loadFile'=>'observers/class.prevent_gift_and_physical.php');
$autoLoadConfig[190][] = array('autoType'=>'classInstantiate',
                              'className'=>'prevent_gift_and_physical',
                              'objectName'=>'prevent_gift_and_physical');