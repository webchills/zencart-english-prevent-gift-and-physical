# zencart-prevent-gift-and-physical
Prevent the checkout of gift certificates and physical goods together in Zen Cart

## Purpose
If you are offering free shipping over a certain order value in your Zen Cart store and are selling gift certificates as well you might suffer from the following problem:
* A customer puts physical goods in his cart with an order value of 50 Euro
* You are offering free shipping over 100 Euro
* Then the customer adds a 100 gift certificate to the cart and is checking out with an order value of 150 Euro and gets free shipping.
* This is unwanted behavior in most cases and fraud in the end.

## Functionality
This addon for Zen Cart 1.5.6/1.5.7/1.5.8/2.0.0 prevents the checkout in such cases
* If the weight of the goods in the cart is greater than 0, it will be checked if there is a gift certificate.
* If yes, the checkout will be prevented.
* A corresponding note appears via message stack on the shopping cart page.

## Note
Just make sure that all your normal physical goods have a weight greater than 0 before you install this plugin!

## Installation
Just upload the content of the NEW FILES folder in the given structure to your Zen Cart installation.
No core files will be modified.
