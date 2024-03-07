<?php
/**
 * class.prevent_gift_and_physical.php
 * @copyright 2021-2024 webchills (www.webchills.at)
 * @copyright Portions Copyright 2003-2024 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: class.prevent_gift_and_physical.php 2024-03-07 14:12:06 webchills $
 */

/**
 * Observer class used to check if gift certificates and physical goods with weight > 0 are together in cart
 *
 */
class prevent_gift_and_physical extends base {
  /**
   * constructor method
   *
   * Attaches our class to the ... and watches for 4 notifier events.
   */
  public function __construct() {
    global $zco_notifier;
    $zco_notifier->attach($this, array('NOTIFY_HEADER_END_SHOPPING_CART', 'NOTIFY_HEADER_START_CHECKOUT_SHIPPING', 'NOTIFY_HEADER_START_CHECKOUT_PAYMENT', 'NOTIFY_HEADER_START_CHECKOUT_CONFIRMATION'));
  }
  /**
   * Update Method
   *
   * Called by observed class when any of our notifiable events occur
   *
   * @param object $class
   * @param string $eventID
   */
  public function update(&$class, $eventID) {
    global $messageStack;
    global $currencies;
	  global $db;
    switch ($eventID) {
      case 'NOTIFIER_CART_GET_PRODUCTS_END':
      case 'NOTIFY_HEADER_END_SHOPPING_CART': 
			if ($_SESSION['cart']->show_weight() > 0){
			$chk_gift_and_physical = $_SESSION['cart']->get_products();
			for ($i=0, $n=sizeof($chk_gift_and_physical); $i<$n; $i++) {
		 if (preg_match('/^GIFT/', addslashes($chk_gift_and_physical[$i]['model']))) {
              $_SESSION['valid_to_checkout'] = false;
              $messageStack->add('shopping_cart', TEXT_PREVENT_GIFT_AND_PHYSICAL, 'caution');               
            }
		}
		}
        break;
      case 'NOTIFY_HEADER_START_CHECKOUT_SHIPPING':
      case 'NOTIFY_HEADER_START_CHECKOUT_PAYMENT':
      case 'NOTIFY_HEADER_START_CHECKOUT_CONFIRMATION':
      if ($_SESSION['cart']->show_weight() > 0){
	    $chk_gift_and_physical = $_SESSION['cart']->get_products();
	    for ($i=0, $n=sizeof($chk_gift_and_physical); $i<$n; $i++) {
			if (preg_match('/^GIFT/', addslashes($chk_gift_and_physical[$i]['model']))) {
              zen_redirect(zen_href_link(FILENAME_SHOPPING_CART));
            }
          }
		}
        break;
      default:
        break;
    }
  }
}