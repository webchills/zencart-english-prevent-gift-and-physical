<?php
/**
 * @copyright 2021 webchills (www.webchills.at)
 * @copyright Portions Copyright 2003-2021 Zen Cart Development Team
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: config.prevent_gift_and_physical.php 2021-11-26 15:56:04 webchills$
 */ 
$autoLoadConfig[190][] = array('autoType'=>'class',
                              'loadFile'=>'observers/class.prevent_gift_and_physical.php');
$autoLoadConfig[190][] = array('autoType'=>'classInstantiate',
                              'className'=>'prevent_gift_and_physical',
                              'objectName'=>'prevent_gift_and_physical');