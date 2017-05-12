# Hell Triangle
Given a triangle of numbers, return the maximum total from top to bottom.
Example:
```
   6
  3 5
 9 7 1
4 6 8 4
```
In this triangle the maximum total is `6 + 5 + 7 + 8 = 26`.
An element can only be summed with one of the two nearest elements in the next row. So the element `3` in row 2 can be summed with `9` and `7`, but not with `1`.
## Why PHP?
This is the programming language I am more experienced.
I implemented this in Ruby too, but I could not search a test framework in time.
## Install
```
git clone https://github.com/joaoeduardo/hell-triangle.git
cd hell-triangle
composer install
```
## Use
```
php bin/hell-triangle maximum [[6],[3,5],[9,7,1],[4,6,8,4]]
```

## Test
```
php vendor/bin/phpunit test/MaximumTest
```