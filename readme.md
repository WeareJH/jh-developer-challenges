# JH Developer Challenge

## Setup
 1. Install composer on your machine if it isn't already installed [https://getcomposer.org/doc/00-intro.md]
 2. Install GIT on your local machine if it isn't already installed [https://git-scm.com/book/en/v2/Getting-Started-Installing-Git]
 3. Fork the repo to your account
 3. Pull down the project onto your local machine
 4. Change directory to the project root
 5. run `git checkout -b YOURNAME`
 5. Run `composer update`
 6. Run `./vendor/bin/phpunit` to display the failing tests, you can do this at any point to test your code.

## Challenge 1
The challenge is to write the logic for a delivery date calculation within the ShippingDates class.

### Requirements
 1. The class must conform to the requirements of the defined interface implementing the calculateDeliveryDate method.
 2. All deliveries are on a 3 working day service, there is no time calculation for simplicity.
 3. Orders are dispatched same day.
 4. No parcel can be dispatched on a Saturday or Sunday.
 5. No parcel can be delivered on a Saturday or Sunday.
 6. The code must pass all tests.
 7. Only work in ./src/ShippingDates.php
 8. Code must conform to PSR-1 and PSR-2 standards.
    1. https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
    2. https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
 9. Methods should be commented with Docblock for parameters and return types.

 ## Challenge 2
 The challenge is an extension on challenge 1 adding cut off times for dispatch dates.

 ### Requirements
 1. The class must conform to the requirements of the defined interface implementing the calculateDeliveryDate method.
 2. All deliveries are on a 3 working day service.
 3. Orders are dispatched the same day unless ordered after 17:00 when they will be dispatched the next working day.
 4. No parcel can be dispatched on a Saturday or Sunday.
 5. No parcel can be delivered on a Saturday or Sunday.
 6. The code must pass all tests.
 7. Only work in ./src/ShippingDates.php
 8. Code must conform to PSR-1 and PSR-2 standards.
   1. https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
   2. https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
 9. Methods should be commented with Docblock for parameters and return types.

## Submission
Once you have complete your work add your changes to the stage and commit. Once you have successfully
commit `git push origin YOURNAME`. Submit the link to your repo to JH. Do not create a pull request to
the JH repo.
